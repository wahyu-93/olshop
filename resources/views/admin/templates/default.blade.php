<!DOCTYPE html>
<html lang="en">

@include('admin.templates._head')

<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">

  @include('admin.templates._header')
  
  @include('admin.templates._sidebar')

  <div class="content-wrapper">
    {{-- @include('admin.templates._broadcrumb') --}}

    <section class="content">
      <div class="container-fluid">
        @yield('content')
      </div>
    </section>
  </div>

  @include('admin.templates._footer')
  
  @include('admin.templates._control-sidebar')
</div>

@include('admin.templates._scripts')

</body>
</html>
