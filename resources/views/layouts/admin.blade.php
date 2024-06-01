<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <link href="../../../template/css/bootstrap.min.css" rel="stylesheet">
        <link href="../../../template/css/datepicker3.css" rel="stylesheet">
        <link href="../../../template/css/styles.css" rel="stylesheet">
        <link src="https://cdn.datatables.net/1.13.1/css/jquery.dataTables.min.css" rel="stylesheet">
        <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.13.1/css/jquery.dataTables.css">
        <link src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
        <!-- Select2 CSS -->
        <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
        <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css" rel="stylesheet" />
        <link href="https://cdnjs.cloudflare.com/ajax/libs/select2-bootstrap-5-theme/1.0.0-beta.3/select2-bootstrap-5-theme.min.css" rel="stylesheet" />
    </head>
        <body>
        {{-- header --}}
        <div id="preloader"></div>
        <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation"> @include('admin.blocks.header')</nav>
        {{-- sidebar --}}
        <div id="sidebar-collapse" class="col-sm-3 col-lg-2 sidebar"> @include('admin.blocks.sidebar')</div>
        {{-- main --}}     
	    <div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main"> @yield('content')</div>
        {{-- footer --}}
        </body>

<script src="../../../template/js/lumino.glyphs.js"></script>
<script type="text/javascript" src="../../../template/ckeditor/ckeditor.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
<!-- Latest compiled and minified JavaScript -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
<script src="https://code.jquery.com/jquery-3.6.2.min.js" ></script>
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.13.1/js/jquery.dataTables.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js" ></script>
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js"></script>
        <Script>
            $(document).ready( function () {
            $('.table').DataTable();
        } );
        </Script>
        <script>
            $('#calendar').datepicker({
            });
            !function ($) {
                $(document).on("click", "ul.nav li.parent > a > span.icon", function () {
                    $(this).find('em:first').toggleClass("glyphicon-minus");
                });
                $(".sidebar span.icon").find('em:first').addClass("glyphicon-plus");
            }(window.jQuery);

            $(window).on('resize', function () {
                if ($(window).width() > 768)
                    $('#sidebar-collapse').collapse('show')
            })
            $(window).on('resize', function () {
                if ($(window).width() <= 767)
                    $('#sidebar-collapse').collapse('hide')
            })
        </script>	
        <script type="text/javascript">
            CKEDITOR.replace('chi_tiet_bv');
        </script>
        <script>
            $(document).ready(function() {
                function formatState(state) {
                    if (!state.id) {
                        return state.text;
                    }
                    var baseUrl = state.element.getAttribute('data-image');
                    var $state = $(
                        '<span><img src="' + baseUrl + '" class="img-flag" style="height: 50px; width: 50px; margin-right: 10px; object-fit: cover; vertical-align: middle;" /> ' + state.text + '</span>'
                    );
                    return $state;
                }
        
                $('#brand-select').select2({
                    templateResult: formatState,
                    templateSelection: formatState
                });
                $('#category-select').select2({
                    templateResult: formatState,
                    templateSelection: formatState
                });
            });
        </script>

            <script>
                $(document).ready(function() {

                    // Add custom color display
                    // function formatColor (color) {
                    //     if (!color.id) { return color.text; }
                    //     var $color = $(
                    //         '<span><span class="color-box" style="background-color:' + $(color.element).data('color-code') + ';"></span>' + color.text + '</span>'
                    //     );
                    //     return $color;
                    // };
                    function formatColor (color) {
                    if (!color.id) { return color.text; }
                    var colorCode = $(color.element).data('color-code');
                    var $color = $(
                                    '<span><span class="color-box" style="background-color:' + colorCode + ';margin-left: 10px; width: 25px;height: 22px;"></span>' + color.text + '</span>'
                    );
                    return $color;
    };
                

                    $('#colors').select2({
                        templateResult: formatColor,
                        templateSelection: formatColor,
                    });
                });
                </script>
</html>
