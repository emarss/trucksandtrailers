<!-- jQuery -->
<script src="{{ asset('admin/vendor/jquery.min.js') }}"></script>

<!-- Bootstrap -->
<script src="{{ asset('admin/vendor/popper.js') }}"></script>
<script src="{{ asset('admin/vendor/bootstrap.min.js') }}"></script>

<!-- Simplebar -->
<!-- Used for adding a custom scrollbar to the drawer -->
<script src="{{ asset('admin/vendor/simplebar.js') }}"></script>


<!-- Vendor -->
<script src="{{ asset('admin/vendor/Chart.min.js') }}"></script>
<script src="{{ asset('admin/vendor/moment.min.js') }}"></script>


<!-- APP -->
<script src="{{ asset('admin/js/color_variables.js') }}"></script>
<script src="{{ asset('admin/js/app.js') }}"></script>
<script src="{{ asset('admin/js/script.js') }}"></script>
<script src="{{ asset('admin/vendor/jquery.dataTables.js') }}"></script>
<script src="{{ asset('admin/vendor/dataTables.bootstrap4.js') }}"></script>


<script src="{{ asset('admin/vendor/dom-factory.js') }}"></script> <!-- DOM Factory -->
<script src="{{ asset('admin/vendor/material-design-kit.js') }}"></script> <!-- MDK -->
<script>
  (function () {
   'use strict';
    // Self Initialize DOM Factory Components
    domFactory.handler.autoInit()


    // Connect button(s) to drawer(s)
    var sidebarToggle = document.querySelectorAll('[data-toggle="sidebar"]')

    sidebarToggle.forEach(function (toggle) {
      toggle.addEventListener('click', function (e) {
        var selector = e.currentTarget.getAttribute('data-target') || '#default-drawer'
        var drawer = document.querySelector(selector)
        if (drawer) {
          if (selector == '#default-drawer') {
            $('.container-fluid').toggleClass('container--max');
          }
          drawer.mdkDrawer.toggle();
        }
      })
    })
  })();

  function confirmDelete(url) {
    $("#confirmDelete #actionButton").attr('href', url);
    $('#confirmDelete').modal('show');
  }
</script>