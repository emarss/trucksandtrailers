<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
  <title> {{ config('app.name', "Staff") }} Admin | {{ $pageTitle }}</title>
  @include('admin.includes.head')
  @yield('styles')
</head>
<body>
  <div class="mdk-drawer-layout js-mdk-drawer-layout" data-fullbleed data-push data-responsive-width="992px" data-has-scrolling-region>

    <div class="mdk-drawer-layout__content">
      <!-- header-layout -->
      <div class="mdk-header-layout js-mdk-header-layout  mdk-header--fixed  mdk-header-layout__content--scrollable">
        <!-- header -->
        <div class="mdk-header js-mdk-header bg-primary" data-fixed>
            <div class="mdk-header__content">
                @include('admin.includes.nav_bar')
            </div>
        </div>

        <!-- content -->
        <div class="mdk-header-layout__content top-navbar mdk-header-layout__content--scrollable h-100">
            <!-- main content -->
            @include('admin.includes.messages')
            @yield('content')
        </div>
      </div>

    </div>
    <!-- // END drawer-layout__content -->

    <!-- drawer -->
    <div class="mdk-drawer js-mdk-drawer" id="default-drawer">
      <div class="mdk-drawer__content">
        <div class="mdk-drawer__inner" data-simplebar data-simplebar-force-enabled="true">
            @include('admin.includes.sidebar')
        </div>
      </div>
    </div>
    <!-- // END drawer -->


  </div>
  <!-- // END drawer-layout -->

  @include('admin.includes.modals')
  @include('admin.includes.scripts')
  @yield('scripts')

</body>
</html>