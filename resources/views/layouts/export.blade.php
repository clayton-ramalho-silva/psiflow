<!doctype html>
<html lang="pt-br">
  <head>
    @includeIf('layouts.global.head')
    @include('layouts.partials.styles')

    @stack('css-custom')
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
  </head>
  <body>   

  <header>
      <!--    AQUI ENTRA O  HEADER LATERAL    -->
      @include('layouts.template.header')
      @include('layouts.template.headerResponsive')
      <!--    AQUI ENTRA O  HEADER LATERAL    -->
  </header>
  
    <main>
    

      <!--    AQUI ENTRA A PAGINA    -->
      @yield('content')
      <!--    AQUI ENTRA A PAGINA    -->
    </main>

    @include('layouts.partials.scripts')
    @stack('scripts-custom')
  </body>
</html>