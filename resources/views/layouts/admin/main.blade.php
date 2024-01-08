<!DOCTYPE html>
<!--
Template Name: Conquer - Responsive Admin Dashboard Template build with Twitter Bootstrap 3.2.0
Version: 2.0
Author: KeenThemes
Website: http://www.keenthemes.com/
Contact: support@keenthemes.com
Follow: www.twitter.com/keenthemes
Like: www.facebook.com/keenthemes
Purchase: http://themeforest.net/item/conquer-responsive-admin-dashboard-template/3716838?ref=keenthemes
License: You must have a valid license purchased only from themeforest(the above link) in order to legally use the theme for your project.
-->
<!--[if IE 8]> <html lang="en" class="ie8 no-js"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9 no-js"> <![endif]-->
<!--[if !IE]><!-->
<html lang="en" class="no-js">
<!--<![endif]-->
<!-- BEGIN HEAD -->

<head>
    <meta charset="utf-8" />
    <title>ACEZ | Admin Dashboard</title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta content="width=device-width, initial-scale=1.0" name="viewport" />
    <meta content="" name="description" />
    <meta content="" name="author" />
    <meta name="MobileOptimized" content="320">
    <!-- BEGIN GLOBAL MANDATORY STYLES -->
    <link href="http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700&subset=all" rel="stylesheet"
        type="text/css" />
    <link href="/assets/plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
    <link href="/assets/plugins/simple-line-icons/simple-line-icons.min.css" rel="stylesheet" type="text/css" />
    <link href="/assets/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <link href="/assets/plugins/uniform/css/uniform.default.css" rel="stylesheet" type="text/css" />
    <link href="/assets/css/table.css" rel="stylesheet" type="text/css" />
    <!-- END GLOBAL MANDATORY STYLES -->
    <!-- BEGIN PAGE LEVEL PLUGIN STYLES -->
    <link href="/assets/plugins/bootstrap-daterangepicker/daterangepicker-bs3.css" rel="stylesheet" type="text/css" />
    <link href="/assets/plugins/fullcalendar/fullcalendar/fullcalendar.css" rel="stylesheet" type="text/css" />
    <link href="/assets/plugins/jqvmap/jqvmap/jqvmap.css" rel="stylesheet" type="text/css" />
    <!-- END PAGE LEVEL PLUGIN STYLES -->
    <!-- BEGIN THEME STYLES -->
    <link href="/assets/css/style-conquer.css" rel="stylesheet" type="text/css" />
    <link href="/assets/css/style.css" rel="stylesheet" type="text/css" />
    <link href="/assets/css/style-responsive.css" rel="stylesheet" type="text/css" />
    <link href="/assets/css/plugins.css" rel="stylesheet" type="text/css" />
    <link href="/assets/css/pages/tasks.css" rel="stylesheet" type="text/css" />
    <link href="/assets/css/themes/default.css" rel="stylesheet" type="text/css" id="style_color" />
    <link href="/assets/css/custom.css" rel="stylesheet" type="text/css" />

    <link rel="shortcut icon" href="{{ asset('sandbox360/img/admin-icon.png') }}">
    <link rel="stylesheet" href="{{ asset('sandbox360/css/plugins.css') }}">
    <link rel="stylesheet" href="{{ asset('sandbox360/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('sandbox360/css/colors/orange.css') }}">
    <!-- END THEME STYLES -->
    <link rel="shortcut icon" href="favicon.ico" />

    <style>
        .table.dataTable .dataTables_wrapper .dataTables_paginate .paginate_button {
            font-size: 14px;
            padding: 5px 10px;
            margin-right: 5px;
        }

        .dataTables_length {
            margin-top: 20px;
            display: inline-block;
            min-width: 25%;
        }

        .dataTables_length select {
            display: inline-block;
        }

        .dataTables_length .form-select {
            width: 60px;
        }

        .dataTables_wrapper .dataTables_paginate {
            float: right;
        }

        .pagination .page-link {
            width: 65px;
        }

        .dataTables_filter {
            text-align: right;
            display: flex;
            justify-content: flex-end;
            margin-bottom: 10px;
        }

        .dataTables_filter label {
            display: flex;
            flex-direction: column;
            align-items: flex-end;
            margin-bottom: 0;
        }

        .dataTables_length,
        .dataTables_filter {
            margin-bottom: 10px;
            text-align: right !important;
        }

        .dataTables_filter input {
            width: 100% !important;
        }
    </style>

    {{-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.7/css/dataTables.bootstrap5.min.css"> --}}
</head>
<!-- END HEAD -->
<!-- BEGIN BODY -->

<body class="page-header-fixed">
    <!-- BEGIN HEADER -->
    @include('layouts.admin.header')
    <!-- END HEADER -->
    <div class="clearfix">
    </div>
    <!-- BEGIN CONTAINER -->
    <div class="page-container">
        <!-- BEGIN SIDEBAR -->
        @include('layouts.admin.navbar')
        <!-- END SIDEBAR -->
        <!-- BEGIN CONTENT -->
        <div class="page-content-wrapper">
            <div class="page-content">
                @yield('content')
            </div>
        </div>
        <!-- END CONTENT -->
    </div>
    <!-- END CONTAINER -->
    <!-- BEGIN FOOTER -->
    <div class="footer" style="display: flex;align-items: center;justify-content: space-between;min-height: 50px;">
        <div class="footer-inner">
            2023 &copy; ACEZ.
        </div>
    </div>
    <!-- END FOOTER -->
    <!-- BEGIN JAVASCRIPTS(Load javascripts at bottom, this will reduce page load time) -->
    <!-- BEGIN CORE PLUGINS -->
    <script src="/assets/plugins/jquery-1.11.0.min.js" type="text/javascript"></script>
    <script src="/assets/plugins/jquery-migrate-1.2.1.min.js" type="text/javascript"></script>
    <!-- IMPORTANT! Load jquery-ui-1.10.3.custom.min.js before bootstrap.min.js to fix bootstrap tooltip conflict with jquery ui tooltip -->
    <script src="/assets/plugins/jquery-ui/jquery-ui-1.10.3.custom.min.js" type="text/javascript"></script>
    <script src="/assets/plugins/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
    <script src="/assets/plugins/bootstrap-hover-dropdown/bootstrap-hover-dropdown.min.js" type="text/javascript"></script>
    <script src="/assets/plugins/jquery-slimscroll/jquery.slimscroll.min.js" type="text/javascript"></script>
    <script src="/assets/plugins/jquery.blockui.min.js" type="text/javascript"></script>
    <script src="/assets/plugins/uniform/jquery.uniform.min.js" type="text/javascript"></script>
    <!-- END CORE PLUGINS -->
    <!-- BEGIN PAGE LEVEL PLUGINS -->
    <script src="/assets/plugins/jqvmap/jqvmap/jquery.vmap.js" type="text/javascript"></script>
    <script src="/assets/plugins/jqvmap/jqvmap/maps/jquery.vmap.russia.js" type="text/javascript"></script>
    <script src="/assets/plugins/jqvmap/jqvmap/maps/jquery.vmap.world.js" type="text/javascript"></script>
    <script src="/assets/plugins/jqvmap/jqvmap/maps/jquery.vmap.europe.js" type="text/javascript"></script>
    <script src="/assets/plugins/jqvmap/jqvmap/maps/jquery.vmap.germany.js" type="text/javascript"></script>
    <script src="/assets/plugins/jqvmap/jqvmap/maps/jquery.vmap.usa.js" type="text/javascript"></script>
    <script src="/assets/plugins/jqvmap/jqvmap/data/jquery.vmap.sampledata.js" type="text/javascript"></script>
    <script src="/assets/plugins/jquery.peity.min.js" type="text/javascript"></script>
    <script src="/assets/plugins/jquery.pulsate.min.js" type="text/javascript"></script>
    <script src="/assets/plugins/jquery-knob/js/jquery.knob.js" type="text/javascript"></script>
    <script src="/assets/plugins/flot/jquery.flot.js" type="text/javascript"></script>
    <script src="/assets/plugins/flot/jquery.flot.resize.js" type="text/javascript"></script>
    <script src="/assets/plugins/bootstrap-daterangepicker/moment.min.js" type="text/javascript"></script>
    <script src="/assets/plugins/bootstrap-daterangepicker/daterangepicker.js" type="text/javascript"></script>
    <script src="/assets/plugins/gritter/js/jquery.gritter.js" type="text/javascript"></script>
    <!-- IMPORTANT! fullcalendar depends on jquery-ui-1.10.3.custom.min.js for drag & drop support -->
    <script src="/assets/plugins/fullcalendar/fullcalendar/fullcalendar.min.js" type="text/javascript"></script>
    <script src="/assets/plugins/jquery-easypiechart/jquery.easypiechart.min.js" type="text/javascript"></script>
    <script src="/assets/plugins/jquery.sparkline.min.js" type="text/javascript"></script>
    <!-- END PAGE LEVEL PLUGINS -->
    <!-- BEGIN PAGE LEVEL SCRIPTS -->
    <script src="/assets/scripts/app.js" type="text/javascript"></script>
    <script src="/assets/scripts/index.js" type="text/javascript"></script>
    <script src="/assets/scripts/tasks.js" type="text/javascript"></script>
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <!-- END PAGE LEVEL SCRIPTS -->
    <script>
        jQuery(document).ready(function() {
            App.init(); // initlayout and core plugins
            Index.init();
            Index.initJQVMAP(); // init index page's custom scripts
            Index.initCalendar(); // init index page's custom scripts
            Index.initCharts(); // init index page's custom scripts
            Index.initChat();
            Index.initMiniCharts();
            Index.initPeityElements();
            Index.initKnowElements();
            Index.initDashboardDaterange();
            Tasks.initDashboardWidget();
        });
    </script>
    {{-- <script src="https://code.jquery.com/jquery-3.7.0.js"></script> --}}
    {{-- <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script> --}}
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.7/js/dataTables.bootstrap5.min.js"></script>


    <script>
        $(document).ready(function() {
            // Retrieve sort_by and sort_order parameters from the URL
            var urlParams = new URLSearchParams(window.location.search);
            var sort_by = urlParams.get('sort_by') || 'id'; // Default to sorting by ID if not provided
            var sort_order = urlParams.get('sort_order') || 'asc'; // Default to ascending order if not provided

            $('table').DataTable({
                "pagingType": "full_numbers", // Specify the paging type you want
                "ordering": false, // Enable sorting
                "order": [
                    [1, 'asc']
                ], // Initial sorting by column index 1 in ascending order (can be overridden below)
                "responsive": true, // Enable responsiveness
            });

            // Apply the dynamic sorting based on the URL parameters
            var columnIndex = getColumnIndexByFieldName(sort_by); // You need to implement this function
            $('table').DataTable().order([columnIndex, sort_order]).draw();

            $('form').submit(function(event) {
                event.preventDefault(); // Prevent the default form submission

                // Log the form data to the console
                console.log('Form submitted with data:', $(this).serialize());

                // Add any additional logic you may need for form submission

                // Finally, submit the form
                this.submit();
            });


        });
    </script>

    <script>
        $(document).ready(function() {
            // Toggle sidebar on hamburger icon click
            $('.sidebar-toggler').on('click', function() {
                $('.page-sidebar').toggleClass('collapse');
            });
        });
    </script>


    <script>
        $('.page-sidebar-menu li').on('click', function(event) {
            var subMenu = $(this).find('ul.sub-menu');

            // Check if the clicked item has a sub-menu
            if (subMenu.length > 0) {
                event.preventDefault();
                subMenu.slideToggle();
                event.stopPropagation();
            } else {
                // If there is no sub-menu, handle the regular link click
                window.location.href = $(this).find('a').attr('href');
            }

            // Highlight active menu item
            $('.page-sidebar-menu li').removeClass('active');
            $(this).addClass('active');
        });
    </script>

    {{-- <script>
        $(document).ready(function() {
            // Initialize DataTable
            $('table').DataTable();

            // Toggle sub-menus on sidebar item mousedown
            $('.page-sidebar-menu li').on('click', function(event) {
                // Check if the clicked item has a sub-menu
                var subMenu = $(this).find('ul.sub-menu');
                if (subMenu.length > 0) {
                    // Prevent the default behavior of the anchor link
                    event.preventDefault();

                    // Toggle sub-menu visibility using slideToggle
                    subMenu.slideToggle();

                    // Stop event propagation to prevent the menu from closing immediately
                    event.stopPropagation();

                    console.log('Sub-menu clicked. Is visible:', subMenu.is(':visible'));
                }

                // Highlight active menu item
                // Remove "active" class from all menu items
                $('.page-sidebar-menu li').removeClass('active');

                // Add "active" class to the clicked menu item
                $(this).addClass('active');
            });
        });
    </script> --}}




    @yield('scripts')
    <!-- END JAVASCRIPTS -->
</body>
<!-- END BODY -->

</html>
