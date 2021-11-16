<!DOCTYPE html>
<html lang="en">
    <!-- BEGIN HEAD -->
    <head>
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <link rel="icon" href="{{env('APP_URL')}}/assets/layouts/layout3/img/9-512.png">
        <meta charset="utf-8" />
        <title>PMC - IMS v3</title>
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta content="width=device-width, initial-scale=1" name="viewport" />
        <meta content="Preview page of Metronic Admin Theme #3 for basic bootstrap tables with various options and styles" name="description" />
        <meta content="" name="author" />
        <!-- END LAYOUT FIRST STYLES -->

        <!-- BEGIN GLOBAL MANDATORY STYLES -->
        <link href="{{env('APP_URL')}}/assets/global/plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
        <link href="{{env('APP_URL')}}/assets/global/plugins/simple-line-icons/simple-line-icons.min.css" rel="stylesheet" type="text/css" />
        <link href="{{env('APP_URL')}}/assets/global/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <!-- END GLOBAL MANDATORY STYLES -->

        <!-- BEGIN THEME GLOBAL STYLES -->
        <link href="{{env('APP_URL')}}/assets/global/css/components-rounded.min.css" rel="stylesheet" id="style_components" type="text/css" />
        <link href="{{env('APP_URL')}}/assets/global/css/plugins-md.min.css" rel="stylesheet" type="text/css" />
        <!-- END THEME GLOBAL STYLES -->

        <!-- BEGIN THEME LAYOUT STYLES -->
        <link href="{{env('APP_URL')}}/assets/layouts/layout5/css/layout.min.css" rel="stylesheet" type="text/css" />
        <link href="{{env('APP_URL')}}/assets/layouts/layout5/css/custom.min.css" rel="stylesheet" type="text/css" />
        <link href="{{env('APP_URL')}}/assets/layouts/layout5/css/custom.min.css" rel="stylesheet" type="text/css" />
        <!-- END THEME LAYOUT STYLES -->
    
        <!-- BEGIN PAGE LEVEL PLUGINS -->
        <link href="{{env('APP_URL')}}/assets/global/plugins/bootstrap-toastr/toastr_notification.css" rel="stylesheet" type="text/css" />
        <style>
            .page-content {
                min-height: 860px !important;
            }

            /* cyrillic-ext */
            @font-face {
              font-family: 'Oswald';
              font-style: normal;
              font-weight: 300;
              src: url(https://fonts.gstatic.com/s/oswald/v33/TK3iWkUHHAIjg752FD8Ghe4.woff2) format('woff2');
              unicode-range: U+0460-052F, U+1C80-1C88, U+20B4, U+2DE0-2DFF, U+A640-A69F, U+FE2E-FE2F;
            }
            /* cyrillic */
            @font-face {
              font-family: 'Oswald';
              font-style: normal;
              font-weight: 300;
              src: url(https://fonts.gstatic.com/s/oswald/v33/TK3iWkUHHAIjg752HT8Ghe4.woff2) format('woff2');
              unicode-range: U+0400-045F, U+0490-0491, U+04B0-04B1, U+2116;
            }
            /* vietnamese */
            @font-face {
              font-family: 'Oswald';
              font-style: normal;
              font-weight: 300;
              src: url(https://fonts.gstatic.com/s/oswald/v33/TK3iWkUHHAIjg752Fj8Ghe4.woff2) format('woff2');
              unicode-range: U+0102-0103, U+0110-0111, U+0128-0129, U+0168-0169, U+01A0-01A1, U+01AF-01B0, U+1EA0-1EF9, U+20AB;
            }
            /* latin-ext */
            @font-face {
              font-family: 'Oswald';
              font-style: normal;
              font-weight: 300;
              src: url(https://fonts.gstatic.com/s/oswald/v33/TK3iWkUHHAIjg752Fz8Ghe4.woff2) format('woff2');
              unicode-range: U+0100-024F, U+0259, U+1E00-1EFF, U+2020, U+20A0-20AB, U+20AD-20CF, U+2113, U+2C60-2C7F, U+A720-A7FF;
            }
            /* latin */
            @font-face {
              font-family: 'Oswald';
              font-style: normal;
              font-weight: 300;
              src: url(https://fonts.gstatic.com/s/oswald/v33/TK3iWkUHHAIjg752GT8G.woff2) format('woff2');
              unicode-range: U+0000-00FF, U+0131, U+0152-0153, U+02BB-02BC, U+02C6, U+02DA, U+02DC, U+2000-206F, U+2074, U+20AC, U+2122, U+2191, U+2193, U+2212, U+2215, U+FEFF, U+FFFD;
            }
            /* cyrillic-ext */
            @font-face {
              font-family: 'Oswald';
              font-style: normal;
              font-weight: 400;
              src: url(https://fonts.gstatic.com/s/oswald/v33/TK3iWkUHHAIjg752FD8Ghe4.woff2) format('woff2');
              unicode-range: U+0460-052F, U+1C80-1C88, U+20B4, U+2DE0-2DFF, U+A640-A69F, U+FE2E-FE2F;
            }
            /* cyrillic */
            @font-face {
              font-family: 'Oswald';
              font-style: normal;
              font-weight: 400;
              src: url(https://fonts.gstatic.com/s/oswald/v33/TK3iWkUHHAIjg752HT8Ghe4.woff2) format('woff2');
              unicode-range: U+0400-045F, U+0490-0491, U+04B0-04B1, U+2116;
            }
            /* vietnamese */
            @font-face {
              font-family: 'Oswald';
              font-style: normal;
              font-weight: 400;
              src: url(https://fonts.gstatic.com/s/oswald/v33/TK3iWkUHHAIjg752Fj8Ghe4.woff2) format('woff2');
              unicode-range: U+0102-0103, U+0110-0111, U+0128-0129, U+0168-0169, U+01A0-01A1, U+01AF-01B0, U+1EA0-1EF9, U+20AB;
            }
            /* latin-ext */
            @font-face {
              font-family: 'Oswald';
              font-style: normal;
              font-weight: 400;
              src: url(https://fonts.gstatic.com/s/oswald/v33/TK3iWkUHHAIjg752Fz8Ghe4.woff2) format('woff2');
              unicode-range: U+0100-024F, U+0259, U+1E00-1EFF, U+2020, U+20A0-20AB, U+20AD-20CF, U+2113, U+2C60-2C7F, U+A720-A7FF;
            }
            /* latin */
            @font-face {
              font-family: 'Oswald';
              font-style: normal;
              font-weight: 400;
              src: url(https://fonts.gstatic.com/s/oswald/v33/TK3iWkUHHAIjg752GT8G.woff2) format('woff2');
              unicode-range: U+0000-00FF, U+0131, U+0152-0153, U+02BB-02BC, U+02C6, U+02DA, U+02DC, U+2000-206F, U+2074, U+20AC, U+2122, U+2191, U+2193, U+2212, U+2215, U+FEFF, U+FFFD;
            }
            /* cyrillic-ext */
            @font-face {
              font-family: 'Oswald';
              font-style: normal;
              font-weight: 700;
              src: url(https://fonts.gstatic.com/s/oswald/v33/TK3iWkUHHAIjg752FD8Ghe4.woff2) format('woff2');
              unicode-range: U+0460-052F, U+1C80-1C88, U+20B4, U+2DE0-2DFF, U+A640-A69F, U+FE2E-FE2F;
            }
            /* cyrillic */
            @font-face {
              font-family: 'Oswald';
              font-style: normal;
              font-weight: 700;
              src: url(https://fonts.gstatic.com/s/oswald/v33/TK3iWkUHHAIjg752HT8Ghe4.woff2) format('woff2');
              unicode-range: U+0400-045F, U+0490-0491, U+04B0-04B1, U+2116;
            }
            /* vietnamese */
            @font-face {
              font-family: 'Oswald';
              font-style: normal;
              font-weight: 700;
              src: url(https://fonts.gstatic.com/s/oswald/v33/TK3iWkUHHAIjg752Fj8Ghe4.woff2) format('woff2');
              unicode-range: U+0102-0103, U+0110-0111, U+0128-0129, U+0168-0169, U+01A0-01A1, U+01AF-01B0, U+1EA0-1EF9, U+20AB;
            }
            /* latin-ext */
            @font-face {
              font-family: 'Oswald';
              font-style: normal;
              font-weight: 700;
              src: url(https://fonts.gstatic.com/s/oswald/v33/TK3iWkUHHAIjg752Fz8Ghe4.woff2) format('woff2');
              unicode-range: U+0100-024F, U+0259, U+1E00-1EFF, U+2020, U+20A0-20AB, U+20AD-20CF, U+2113, U+2C60-2C7F, U+A720-A7FF;
            }
            /* latin */
            @font-face {
              font-family: 'Oswald';
              font-style: normal;
              font-weight: 700;
              src: url(https://fonts.gstatic.com/s/oswald/v33/TK3iWkUHHAIjg752GT8G.woff2) format('woff2');
              unicode-range: U+0000-00FF, U+0131, U+0152-0153, U+02BB-02BC, U+02C6, U+02DA, U+02DC, U+2000-206F, U+2074, U+20AC, U+2122, U+2191, U+2193, U+2212, U+2215, U+FEFF, U+FFFD;
            }
        </style>
        @yield('pagecss')
        <!-- END PAGE LEVEL PLUGINS -->
    </head>
    <!-- END HEAD -->

    <body>
        <div class="wrapper">
            <!-- BEGIN HEADER -->
            <header class="page-header navbar-fixed-top" style="margin-top: -1px;">
                @include('layouts.mega-menu')
            </header>
            <!-- END HEADER -->
            <div class="container-fluid">
                <br>
                @yield('content')

                
                <!-- BEGIN FOOTER -->
                <p class="copyright">&copy; {{ date('Y') }} Philsaga Mining Corporation &nbsp;|&nbsp;
                    <a href="#">Indent Monitoring System v3</a>
                </p>
                <a href="#index" class="go2top">
                    <i class="icon-arrow-up"></i>
                </a>
                <!-- END FOOTER -->
            </div>
        </div>

        <!-- BEGIN CORE PLUGINS -->
        <script src="{{env('APP_URL')}}/assets/global/plugins/jquery.min.js" type="text/javascript"></script>
        <script src="{{env('APP_URL')}}/assets/global/plugins/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
        <script src="{{env('APP_URL')}}/assets/global/plugins/jquery-slimscroll/jquery.slimscroll.min.js" type="text/javascript"></script>
        <!-- END CORE PLUGINS -->
        
        <!-- BEGIN PAGE LEVEL PLUGINS -->
        <script src="{{env('APP_URL')}}/assets/global/plugins/moment.min.js" type="text/javascript"></script>
        <script src="{{env('APP_URL')}}/assets/global/plugins/morris/morris.min.js" type="text/javascript"></script>
        <script src="{{env('APP_URL')}}/assets/global/plugins/counterup/jquery.waypoints.min.js" type="text/javascript"></script>
        <script src="{{env('APP_URL')}}/assets/global/plugins/counterup/jquery.counterup.min.js" type="text/javascript"></script>
        <!-- END PAGE LEVEL PLUGINS -->

        <!-- BEGIN THEME GLOBAL SCRIPTS -->
        <script src="{{env('APP_URL')}}/assets/global/scripts/app.min.js" type="text/javascript"></script>
        <!-- END THEME GLOBAL SCRIPTS -->

        <!-- BEGIN THEME LAYOUT SCRIPTS -->
        <script src="{{env('APP_URL')}}/assets/layouts/layout5/scripts/layout.min.js" type="text/javascript"></script>
        <script src="{{env('APP_URL')}}/assets/global/scripts/quick-sidebar.min.js" type="text/javascript"></script>
        <script src="{{env('APP_URL')}}/assets/global/scripts/quick-nav.min.js" type="text/javascript"></script>
        <!-- END THEME LAYOUT SCRIPTS -->

        <!-- PAGE LEVEL PLUGINS -->
        <script src="{{env('APP_URL')}}/assets/pages/scripts/toastr_notification.min.js" type="text/javascript"></script>
        @yield('pagejs')
        <!-- END PAGE LEVEL PLUGINS-->

        <script>
            @if(Session::has('notification'))
                var type = "{{ Session::get('notification.alert-type', 'info') }}";
                switch(type){
                    case 'info':
                        toastr.info("{{ Session::get('notification.message') }}");
                        break;
                
                    case 'warning':
                        toastr.warning("{{ Session::get('notification.message') }}");
                        break;
                    case 'success':
                        toastr.success("{{ Session::get('notification.message') }}");
                        break;
                    case 'error':
                        toastr.error("{{ Session::get('notification.message') }}");
                        break;
                }
            @endif
        </script>

    </body>

</html>