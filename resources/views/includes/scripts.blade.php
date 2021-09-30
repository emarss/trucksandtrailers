<script src="{{ asset('js/common_scripts.js') }}"></script>
<script src="{{ asset('js/scripts.js') }}"></script>
<script src="{{ asset('js/markerclusterer.js') }}"></script>


@if (Session::has("feedback"))
    <div id="sign-in-dialog" class="zoom-anim-dialog mfp-hide">
        <div class="small-dialog-header">
            <h3>{{ Session("title") }}</h3>
        </div>
        <div class="text-center">
            {{ Session("message") }}
        </div>
    </div>

    <script>
        $(document).ready(function() {
            // Modal Sign In
            $.magnificPopup.open({
                items: {
                    src: '#sign-in-dialog'
                },
                type: 'inline',
                closeMarkup: '<button title="%title%" type="button" class="mfp-close"></button>',
            });

        });
    </script>
@endif
