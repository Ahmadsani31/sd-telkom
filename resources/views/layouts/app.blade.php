<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="apple-mobile-web-app-capable" content="yes" />
    <meta name="description" content="">
    <meta name="keywords" content="thema bootstrap template, thema admin, bootstrap, admin template, bootstrap admin">

    <meta name="author" content="LanceCoder">

    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <link rel="shortcut icon" href="">
    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Start Global plugin css -->
    <link href="{{ asset('assets/css/global-plugins.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/vendors/jquery-icheck/skins/all.css') }}" rel="stylesheet" />
    <!--Start button plugins-->
    <link href="{{ asset('assets/vendors/rippler/dist/css/rippler.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/vendors/ladda/dist/ladda-themeless.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/vendors/raty/lib/jquery.raty.css') }}" rel="stylesheet">
    <!--End button plugins-->
    <!--This css plugins uses on this page only-->
    <link href="{{ asset('assets/vendors/summernote/summernote.css') }}" rel="stylesheet" />
    <link href="{{ asset('assets/vendors/bootstrap-datepicker/css/bootstrap-datepicker.css') }}" rel="stylesheet" />
    <link href="{{ asset('assets/vendors/bootstrap-timepicker/css/bootstrap-timepicker.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('assets/vendors/bootstrap-colorpicker/css/bootstrap-colorpicker.css') }}" rel="stylesheet" />
    <link href="{{ asset('assets/vendors/bootstrap-tagsinput/bootstrap-tagsinput.css') }}" rel="stylesheet" />
    <link href="{{ asset('assets/vendors/summernote/summernote-bs3.css') }}" rel="stylesheet" />
    <link href="{{ asset('assets/vendors/bootstrap-daterangepicker/daterangepicker.css') }}" rel="stylesheet" />
    <link href="{{ asset('assets/vendors/jquery.multi-select/css/multi-select.css') }}" rel="stylesheet" />
    <link href="{{ asset('assets/vendors/typeahead/css/typeahead.css') }}" rel="stylesheet" />
    <link href="{{ asset('assets/vendors/select2/select2.css') }}" rel="stylesheet" />
    <link href="{{ asset('assets/vendors/ios-switch/css/switch.css') }}" rel="stylesheet" />
    <link href="{{ asset('assets/vendors/bootstrap-star-rating/css/star-rating.css') }}" rel="stylesheet" />
    <link href="{{ asset('assets/vendors/bootstrap-fileupload/css/bootstrap-fileupload.css') }}" rel="stylesheet" />

    <!-- Custom styles for this template -->
    <link href="{{ asset('assets/css/theme.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/style-responsive.css') }}" rel="stylesheet"/>
    <link href="{{ asset('assets/css/class-helpers.css') }}" rel="stylesheet"/>

    <!--Color schemes-->
    <link href="{{ asset('assets/css/colors/green.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/colors/turquoise.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/colors/blue.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/colors/amethyst.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/colors/cloud.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/colors/sun-flower.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/colors/carrot.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/colors/alizarin.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/colors/concrete.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/colors/wet-asphalt.css') }}" rel="stylesheet">

    <!--Fonts-->
    <link href="{{ asset('assets/fonts/Indie-Flower/indie-flower.css') }}" rel="stylesheet" />
    <link href="{{ asset('assets/fonts/Open-Sans/open-sans.css?family=Open+Sans:300,400,700') }}" rel="stylesheet" />

    <!--This page uses this plugin css only-->
    <link href="{{ asset('assets/vendors/sweetalert/sweetalert.css') }}" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="{{ asset('rating-emoji/main.css') }}">

</head>


<body id="turquoise-scheme">

    <!--======== Start Style Switcher ========-->

    <!--======== End Style Switcher ========-->

    <section id="container">

        <!--header start-->
        <header class="header fixed-top clearfix">

            <!--logo start-->
            <div class="brand">

                <a href="{{ route('home') }}" class="logo">
                    <strong>SD-TELKOM</strong>
                </a>

            </div>
            <!--logo end-->

            <!--
                *****************************
                ** Start of top navigation **
                *****************************
             -->
            <div class="top-nav">

                <ul class="nav navbar-nav navbar-right">

                    @if (Auth::user()->level == 'guru' && Auth::user()->level == 'ortu')
                    <li role="presentation" class="dropdown">
                        <a href="javascript:void(0);" class="dropdown-toggle info-number" data-toggle="dropdown" aria-expanded="false">
                            <span class="pe-7s-mail" style="font-size:22.9px;"></span>
                            <span class="badge bg-color label-danger">0</span>
                        </a>

                        <ul id="menu" class="dropdown-menu list-unstyled msg_list animated" role="menu">
                            <li>
                                <a class="hvr-bounce-to-right">

                                    <span class="message">
                                        No notifikasi
                                    </span>
                                </a>
                            </li>

                        </ul>
                    </li>
                    @endif


                    <li class="dropdown">
                        <a href="javascript:void(0);" class="user-profile dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                            <img src="{{ asset('assets/images/profile.jpg') }}" alt="image">{{ Auth::user()->name }}
                            <span class=" fa fa-angle-down"></span>
                        </a>
                        <ul class="dropdown-menu dropdown-usermenu animated fadeInRight pull-right">
                            <li>
                                <a href="../app-pages/page-profile-dashboard.html" class="hvr-bounce-to-right">  Profile</a>
                            </li>
                            <li>
                                <a href="../app-pages/page-profile-settings.html" class="hvr-bounce-to-right">
                                    <span class="badge bg-red pull-right">50%</span>
                                    <span>Settings</span>
                                </a>
                            </li>
                            <li>
                                <a href="javascript:void(0);" class="hvr-bounce-to-right">Help</a>
                            </li>

                            <li><a href="{{ route('logout') }}" class="hvr-bounce-to-right" onclick="event.preventDefault();
                                document.getElementById('logout-form').submit();">
                                <i class=" icon-login pull-right"></i> Log Out</a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                            </li>
                        </ul>
                    </li>

                </ul>

            </div>

            <!--
                *****************************
                *** End of top navigation ***
                *****************************
             -->

        </header>
        <!--header end-->


        <!--main content start-->
        <section class="merge-left">

            <section class="wrapper">

                <!--======== START USER PROFILE MAIN ========-->
              @yield('content')
                <!--======== END USER PROFILE MAIN ========-->

            </section>
        </section>
        <!--======== Main Content End ========-->


    </section><!--/.container-->

    <!--===== Footer Start ========-->
    @include('sweetalert::alert')
    <!-- Placed js at the end of the document so the pages load faster -->

    <script src="{{ asset('assets/js/global-plugins.js') }}"></script>


    <!--common script init for all pages-->
    <script src="{{ asset('assets/js/theme.js') }}" type="text/javascript" ></script>

    <!-- For User Management Page Only -->
    <script src="{{ asset('assets/js/profile.js') }}"></script>
    <!-- For the page has tooltipslter only -->
    <script src="{{ asset('assets/js/tooltipster.js') }}" type="text/javascript" ></script>
    <!--Start button plugins-->
    <script src="{{ asset('assets/vendors/rippler/dist/js/jquery.rippler.min.js') }}"></script>
    <script src="{{ asset('assets/vendors/ladda/dist/spin.min.js') }}"></script>
    <script src="{{ asset('assets/vendors/ladda/dist/ladda.min.js') }}"></script>
    <script src="{{ asset('assets/vendors/raty/lib/jquery.raty.js') }}"></script>
    <script src="{{ asset('assets/vendors/raty/js/labs.js') }}" type="text/javascript"></script>

    <!-- For for the page that has form only -->
    <script src="{{ asset('assets/js/forms.js') }}"></script>
    <script src="{{ asset('assets/js/form-validation.js') }}"></script>
    <script src="{{ asset('assets/js/form-wizard.js') }}"></script>
    <script src="{{ asset('assets/js/form-plupload.js') }}"></script>
    <script src="{{ asset('assets/js/form-x-editable.js') }}"></script>

<script src="https://malsup.github.io/jquery.blockUI.js"></script>

    <!--For this page only-->
    <script src="{{ asset('assets/js/sweetalert.js') }}"></script>
    <script type="text/javascript">
        $(document).ready(function(){
            new WOW().init();

            App.initPage();
            App.initLeftSideBar();
            App.initCounter();
            App.initNiceScroll();
            App.initPanels();
            App.initProgressBar();
            App.initSlimScroll();
            App.initNotific8();
            App.initTooltipster();
            App.initStyleSwitcher();
            App.initMenuSelected();
            App.initRightSideBar();
            App.initSummernote();
            App.initAccordion();
            App.initModal();
            App.initPopover();

        });
    </script>


</body>

</html>

<!--===== Footer End ========-->
