<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />

    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css"
      rel="stylesheet"
      crossorigin="anonymous"
    />
    <link rel="stylesheet" href="{{asset('css/app.css')}}">
    <title>@yield('title','Tienda Online')</title>
  <link rel="stylesheet" type="text/css" href="https://www3.gobiernodecanarias.org/educacion/cau_ce/cookies/cookieconsent.min.css"/><script  type="text/javascript" src="https://www3.gobiernodecanarias.org/educacion/cau_ce/cookies/cookieconsent.min.js"></script><script type="text/javascript" src="https://www3.gobiernodecanarias.org/educacion/cau_ce/cookies/cauce_cookie.js"></script><script type="text/javascript" src="https://www3.gobiernodecanarias.org/educacion/cau_ce/estadisticasweb/scripts/piwik-base.js"></script><script type="text/javascript" src="https://www3.gobiernodecanarias.org/educacion/cau_ce/estadisticasweb/scripts/piwik-eforma.js"></script></head>
  @if(Session::has('font'))
    <body style="font-family: {{ Session::get('font') }}">
  @else
    <body>
  @endif
    
    <!-- header -->
    
    <nav class="navbar navbar-expand-lg navbar-dark bg-secondary py-4">
      <div class="container">
        <a class="navbar-brand" href="{{route('home.index')}}">@yield('title','Tienda Online')</a>
        <button
          class="navbar-toggler"
          type="button"
          data-bs-toggle="collapse"
          data-bs-target="#navbarNavAltMarkup"
          aria-controls="navbarNavAltMarkup"
          aria-expanded="false"
          aria-label="Toggle navigation"
        >
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
          <div class="navbar-nav ms-auto">
            <a class="nav-link active" href="{{route('home.index')}}">Home</a>
            <a class="nav-link active" href="{{route('home.about')}}">About</a>
            <a class="nav-link active" href="{{route('products.index')}}">Products</a>
            
            @if (Auth::user() && Auth::user()->getRole() == 'admin') 
              <a class="nav-link active" href="{{route('admin.home.index')}}">Control Panel</a>              
            @endif
            @if (!Auth::user())
                <a class="nav-link active" href="{{route('login')}}">Log In</a>
                <a class="nav-link active" href="{{route('register')}}">Register</a>
            @else
            <a class="nav-link active" href="{{route('home.configuration')}}">{{Auth::user()->getName()}}</a>
            <a class="nav-link active" href="{{'logout'}}">Log Out</a>
            @endif
            
          </div>
        </div>
      </div>
    </nav>
    
    @if (Session::has('headerColor'))
    <header class="masthead  text-white text-center py-4" style="background-color: {{Session::get('headerColor')}}">
    @else
        <header class="masthead bg-primary text-white text-center py-4">
    @endif
    
      <div class="container d-flex align-items-center flex-column">
        <h2>@yield('subtitle','Una tienda online Laravel')</h2>
      </div>
    </header>
    
    <!-- header -->
    
    <div class="container my-4">@yield('content')</div>

    <!-- footer -->
    <div class="copyright py-4 text-center text-white">
        <div class="container">
          <small>
            Desarrollo web en entorno servidor - 2º DAW
          </small>
          <p>{{now()->format('d/m/Y H:i:s')}}</p>
        </div>
      </div>
    <!-- footer -->
    
    <script
      src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js"
      crossorigin="anonymous"
    ></script>
  </body>
</html>