<!DOCTYPE html>
<html>
<head>
  <title>{{config('app.name')}}</title>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  
  <!-- CSRF Token -->
  <meta name="_token" content="{{ csrf_token() }}">
  
  <link rel="shortcut icon" href="{{ asset('/favicon.png') }}">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">

  <link rel="stylesheet" href="/assets/plugins/flatpickr-4.6.3/dist/flatpickr.min.css" />

  <!-- plugin css -->
  {!! Html::style('assets/plugins/@mdi/font/css/materialdesignicons.min.css') !!}
  {!! Html::style('assets/plugins/perfect-scrollbar/perfect-scrollbar.css') !!}
  <!-- end plugin css -->

  @stack('plugin-styles')

  <!-- common css -->
  {!! Html::style('css/app.css') !!}
  <!-- end common css -->
  
  @stack('style')
  <style>
    .form-control{
        line-height: 1.7!important;
    }
</style>
</head>
<body data-base-url="{{url('/')}}">

  <div class="container-scroller" id="app">
    @include('components.header')
    <div class="container-fluid page-body-wrapper">
      @include('components.sidebar')
      <div class="main-panel">
        <div class="content-wrapper">
          @yield('content')
        </div>
        @include('layout.footer')
      </div>
    </div>
  </div>
  <div id="loader" class="load">
    <svg width="70px" height="70px" viewBox="0 0 100 100" preserveAspectRatio="xMidYMid" class="lds-dual-ring">
      <circle cx="50" cy="50" fill="none" stroke-linecap="round" r="40" stroke-width="4" stroke="#f3f3f3" stroke-dasharray="62.83185307179586 62.83185307179586" transform="rotate(312 50 50)">
        <animateTransform attributeName="transform" type="rotate" calcMode="linear" values="0 50 50;360 50 50" keyTimes="0;1" dur="1s" begin="0s" repeatCount="indefinite">
        </animateTransform>
      </circle>
    </svg>
  </div>
  <!-- base js -->
  {!! Html::script('js/app.js') !!}
  {!! Html::script('assets/plugins/perfect-scrollbar/perfect-scrollbar.min.js') !!}
  <!-- end base js -->

  <!-- plugin js -->
  @stack('plugin-scripts')
  <!-- end plugin js -->

  <script src="{{ get_asset('js/utils.js') }}"></script>

  <!-- common js -->
  {!! Html::script('assets/js/off-canvas.js') !!}
  {!! Html::script('assets/js/hoverable-collapse.js') !!}
  {!! Html::script('assets/js/misc.js') !!}
  {!! Html::script('assets/js/settings.js') !!}
  {!! Html::script('assets/js/todolist.js') !!}
  <!-- end common js -->

  <script src="{{ get_asset('js/dashboard.js') }}"></script>

  <script src="/assets/plugins/flatpickr-4.6.3/dist/flatpickr.min.js"></script>
  <script src="/assets/plugins/flatpickr-4.6.3/dist/l10n/es.js"></script>

  <script type="text/javascript">
  flatpickr(".fp_date", {
  "locale": "es",
  altInput: true,
  altFormat: "j F Y",
  dateFormat: "Y-m-d",
  /*dateFormat: "Y-m-d H:i",*/
  enableTime: false,
  /*
  enableTime: true,
  noCalendar: true,
  dateFormat: "H:i",
  time_24hr: true,
  */
});

flatpickr(".fp_time", {
  locale: "es",
  enableTime: true,
  noCalendar: true,
  dateFormat: "H:i",
  time_24hr: true,
});

  </script>

  @stack('custom-scripts')
</body>
</html>