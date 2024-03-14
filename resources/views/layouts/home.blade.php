<!DOCTYPE html>
<html lang="en">
@include('components.partials.home.heade')

<body class="leading-normal tracking-normal text-white gradient" style="font-family: 'Source Sans Pro', sans-serif;">
  <!--Nav-->
  @include('components.partials.home.navbar')
  @include('components.partials.home.jumbotron')
  <!--Hero-->
  {{ $slot }}
  <!--Footer-->
  @include('components.partials.home.footer')
  <!-- jQuery if you need it
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  -->
  @include('components.partials.home.javascript')
</body>

</html>