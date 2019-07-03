<!DOCTYPE HTML>
<html>
    <head>
        
        <meta charset="utf-8"/>
        <meta http-equiv="X-UA-Compatible" content="IE=11" />
        <title>Oronite</title>
        <link rel="stylesheet" href='css/style.css'/>
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
        <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css" integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay" crossorigin="anonymous">
        <link rel="stylesheet" href='css/crud.css'/>
        <link rel="shortcut icon" href="favicon.ico" type="image/x-icon" />
        <link rel="stylesheet" href='css/custom.css'/>
        
        
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
        <script src="js/pdf.js"></script>
        <script src="js/pdf.worker.js"></script>

        <!--<script src="https://raw.githubusercontent.com/mozilla/pdf.js/master/web/ui_utils.js"></script>-->
        <style type="text/css">
            a#show-sidebar {
                top: 0;
                bottom: 0;
                border: 0;
                border-radius: 0;
                background: #ff602d;
            }
            #toolbar {
                padding: 10px 50px;
            }
            .chiller-theme .sidebar-wrapper {
                background: #ff602d;
            }
            .chiller-theme .sidebar-wrapper .sidebar-menu .sidebar-dropdown div, .chiller-theme .sidebar-wrapper .sidebar-search input.search-menu, .chiller-theme .sidebar-wrapper .sidebar-search .input-group-text {
                background: #ff602d;
            }
            .chiller-theme .sidebar-wrapper .sidebar-menu ul li:hover>a, .chiller-theme .sidebar-wrapper .sidebar-menu .sidebar-dropdown.active>a, .chiller-theme .sidebar-wrapper .sidebar-header .user-info, .chiller-theme .sidebar-wrapper .sidebar-brand>a:hover, .chiller-theme .sidebar-footer>a:hover i {
                color: #ffffff;
            }
            .chiller-theme .sidebar-wrapper .sidebar-header .user-info .user-role, .chiller-theme .sidebar-wrapper .sidebar-header .user-info .user-status, .chiller-theme .sidebar-wrapper .sidebar-search input.search-menu, .chiller-theme .sidebar-wrapper .sidebar-search .input-group-text, .chiller-theme .sidebar-wrapper .sidebar-brand>a, .chiller-theme .sidebar-wrapper .sidebar-menu ul li a, .chiller-theme .sidebar-footer>a {
                color: #ffffff;
            }
            .chiller-theme .sidebar-wrapper .sidebar-menu .header-menu span {
                color: #000000;
            }
            .page-wrapper.chiller-theme.toggled #close-sidebar {
                color: #000000;
            }
            #canvasTextLayerDiv {
                width: 90%;
                max-width: 90%;
                margin: 25px auto;
            }
            #toolbar a{
                background-color: transparent;
                font: inherit;
                border: 1px solid currentColor;
                border-radius: 3px;
                padding: 0.25em 0.5em;
                display: inline-block;
                color: #000;
            }
        @media (max-width: 768px){
            #toolbar button ,#toolbar a{
                padding: 0;
                width: 25px;
                height: 25px;
                line-height: 25px;
                max-width: 25px;
                max-height: 25px;
                font-size: 12px;
                text-align: center;
            }
            .page-wrapper.toggled .sidebar-wrapper {
                left: 0px;
                max-width: 100%;
            }
            body{
                font-size: 12px;
                line-height: 16px;
            }
            .sidebar-wrapper .sidebar-menu ul li a {
                padding: 8px 8px 0px 8px;
            }
            .chiller-theme .sidebar-wrapper ul li a span{
                display: block;
                margin-left: 26px;
                margin-top: -20px;
            }
            canvas#pdf-canvas {
                /*width: 100% !important;
                max-width: 100% !important;*/
            }
            a#show-sidebar {
                top: 0;
                bottom: auto;
            }
            #canvasTextLayerDiv {
                width: 100%;
                max-width: 100%;
                margin: 50px auto;
            }

            div#searchBlock {
                /*display: block !important;*/
                text-align: center;
                width: 100%;
                position: fixed;
                z-index: 99999999999;
                bottom: 35px;
                top: auto;
                left: 0;
                right: 0;

            }
            #toolbar {
                padding: 6px;
            }
        }

        .fullscreen{
            background: #ffffff !important;
        }
        </style>
    </head>
    <body>
        <div class="page-wrapper chiller-theme">
            <a id="show-sidebar" class="btn btn-sm btn-dark" href="#">
                <i class="fas fa-bars"></i>
            </a>
            <nav id="sidebar" class="sidebar-wrapper">
                <div class="sidebar-content">
                    <div class="sidebar-brand">
                        <a href="#">Oronite</a>
                        <div id="close-sidebar">
                            <i class="fas fa-times"></i>
                        </div>
                    </div>
                    <!-- sidebar-search  -->
                    <div class="sidebar-menu">
                        <ul>
                            <li class="header-menu">
                                <span>Chapters</span>
                            </li>
                            <li class="">
                                <a href="#" onclick="(function (event){event.preventDefault();showPage(1);})(event)" >
                                    <i class="fas fa-circle"></i>
                                    <span>Divider</span>
                                </a>
                            </li>
                            <li class="sidebar-dropdown">
                                <a href="#">
                                    <i class="fas fa-circle"></i>
                                    <span>Chapter 1: Viscosity classifications - SAE J300</span>
                                </a>
                                <div class="sidebar-submenu">
                                    <ul>
                                        <li>
                                            <a onclick="(function (event){event.preventDefault();showPageMenu(7);})(event)" href="#">Divider</a>
                                        </li>
                                        <li>
                                            <a onclick="(function (event){event.preventDefault();showPageMenu(8);})(event)" href="#">SAE J300 revised January 2015 - SAE viscosity grades for engine oils</a>
                                        </li>
                                    </ul>
                                </div>
                            </li>
                            <li class="sidebar-dropdown">
                                <a href="#">
                                    <i class="fas fa-circle"></i>
                                    <span>Chapter 2: API and ILSAC requirements for gasoline and diesel engine oils API «S» and ILSAC Gasoline service categories engine and laboratory test requirement summ</span>
                                </a>
                                <div class="sidebar-submenu">
                                    <ul>
                                        <li>
                                            <a onclick="(function (event){event.preventDefault();showPageMenu(9);})(event)" href="#">Divider</a>
                                        </li>
                                        <li>
                                            <a onclick="(function (event){event.preventDefault();showPageMenu(10);})(event)" href="#">API “S” and ILSAC gasoline service categories engine and laboratory test requirement summary - Current -</a>
                                        </li>
                                        <li>
                                            <a onclick="(function (event){event.preventDefault();showPageMenu(11);})(event)" href="#">API “S” and ILSAC gasoline service categories engine and laboratory test requirement summary - Obsolete -</a>
                                        </li>
                                        <li>
                                            <a onclick="(function (event){event.preventDefault();showPageMenu(12);})(event)" href="#">API SM, SN, SN + RC gasoline service category laboratory test limits - 1 -</a>
                                        </li>
                                        <li>
                                            <a onclick="(function (event){event.preventDefault();showPageMenu(13);})(event)" href="#">API SM, SN, SN + RC gasoline service category laboratory test limits - 2 -</a>
                                        </li>
                                        <li>
                                            <a onclick="(function (event){event.preventDefault();showPageMenu(14);})(event)" href="#">API SH, SJ and SL gasoline service category laboratory test limits - 1 -</a>
                                        </li>
                                        <li>
                                            <a onclick="(function (event){event.preventDefault();showPageMenu(15);})(event)" href="#">API SH, SJ and SL gasoline service category laboratory test limits - 2 -</a>
                                        </li>
                                        <li>
                                            <a onclick="(function (event){event.preventDefault();showPageMenu(16);})(event)" href="#">API “S” gasoline service categories engine test limits - 1 -</a>
                                        </li>
                                        <li>
                                            <a onclick="(function (event){event.preventDefault();showPageMenu(17);})(event)" href="#">API “S” gasoline service categories engine test limits - 2 -</a>
                                        </li>
                                        <li>
                                            <a onclick="(function (event){event.preventDefault();showPageMenu(18);})(event)" href="#">API “S” gasoline service categories engine test limits - 3 -</a>
                                        </li>
                                        <li>
                                            <a onclick="(function (event){event.preventDefault();showPageMenu(19);})(event)" href="#">ILSAC GF-4 & GF-5 standard laboratory test limits - 1 -</a>
                                        </li>
                                        <li>
                                            <a onclick="(function (event){event.preventDefault();showPageMenu(20);})(event)" href="#">ILSAC GF-4 & GF-5 standard laboratory test limits - 2 -</a>
                                        </li>
                                        <li>
                                            <a onclick="(function (event){event.preventDefault();showPageMenu(21);})(event)" href="#"> ILSAC GF-1, GF-2 and GF-3 standard laboratory test limits</a>
                                        </li>
                                        <li>
                                            <a onclick="(function (event){event.preventDefault();showPageMenu(22);})(event)" href="#">ILSAC standard engine test limits - 1 -</a>
                                        </li>
                                        <li>
                                            <a onclick="(function (event){event.preventDefault();showPageMenu(23);})(event)" href="#">ILSAC standard engine test limits - 2 -</a>
                                        </li>
                                        <li>
                                            <a onclick="(function (event){event.preventDefault();showPageMenu(24);})(event)" href="#">ILSAC standard engine test limits - 2 -</a>
                                        </li>
                                        <li>
                                            <a onclick="(function (event){event.preventDefault();showPageMenu(25);})(event)" href="#">API “C” diesel service categories engine and laboratory test requirement summary - Current -</a>
                                        </li>
                                        <li>
                                            <a onclick="(function (event){event.preventDefault();showPageMenu(26);})(event)" href="#">API “C” diesel service categories laboratory test limits - Current - 1 -</a>
                                        </li>
                                        <li>
                                            <a onclick="(function (event){event.preventDefault();showPageMenu(27);})(event)" href="#">API “C” diesel service categories laboratory test limits - Current - 2 -</a>
                                        </li>
                                        <li>
                                            <a onclick="(function (event){event.preventDefault();showPageMenu(28);})(event)" href="#">API “C” diesel service categories engine test limits - Current - 1 -</a>
                                        </li>
                                        <li>
                                            <a onclick="(function (event){event.preventDefault();showPageMenu(29);})(event)" href="#">API “C” diesel service categories engine test limits - Current - 2 -</a>
                                        </li>
                                        <li>
                                            <a onclick="(function (event){event.preventDefault();showPageMenu(30);})(event)" href="#">API “C” diesel service categories engine test limits - Current - 3 -</a>
                                        </li>
                                        <li>
                                            <a onclick="(function (event){event.preventDefault();showPageMenu(31);})(event)" href="#">API “C” diesel service categories engine test limits - Current - 4 -</a>
                                        </li>
                                        <li>
                                            <a onclick="(function (event){event.preventDefault();showPageMenu(32);})(event)" href="#">API “C” diesel service categories engine and laboratory test requirement summary - Obsolete -</a>
                                        </li>
                                        <li>
                                            <a onclick="(function (event){event.preventDefault();showPageMenu(33);})(event)" href="#">API “C” diesel service categories engine test limits - Obsolete - 1 -</a>
                                        </li>
                                        <li>
                                            <a onclick="(function (event){event.preventDefault();showPageMenu(34);})(event)" href="#">API “C” diesel service categories engine test limits - Obsolete - 2 -</a>
                                        </li>
                                        <li>
                                            <a onclick="(function (event){event.preventDefault();showPageMenu(35);})(event)" href="#">API “C” diesel service categories engine test limits - Obsolete - 3 -</a>
                                        </li>
                                        
                                    </ul>
                                    
                                </div>
                            </li>
                            <li class="sidebar-dropdown">
                                <a href="#">
                                    <i class="fas fa-circle"></i>
                                    <span>Chapter 3: ACEA sequences for gasoline and diesel engine oils</span>
                                </a>
                                <div class="sidebar-submenu">
                                    <ul>
                                        <li>
                                            <a onclick="(function (event){event.preventDefault();showPageMenu(36);})(event)" href="#">Divider</a>
                                        </li>
                                        <li>
                                            <a onclick="(function (event){event.preventDefault();showPageMenu(37);})(event)" href="#">ACEA sequences - Overview of validity periods</a>
                                        </li>
                                        <li>
                                            <a onclick="(function (event){event.preventDefault();showPageMenu(38);})(event)" href="#">ACEA 2016 European oil sequence for service-fill oils for gasoline and diesel engines</a>
                                        </li>
                                        <li>
                                            <a onclick="(function (event){event.preventDefault();showPageMenu(39);})(event)" href="#">ACEA 2016 European oil sequence for service-fill oils for gasoline and diesel engines</a>
                                        </li>
                                        <li>
                                            <a onclick="(function (event){event.preventDefault();showPageMenu(40);})(event)" href="#">ACEA 2016 European oil sequence for service-fill oils for gasoline and diesel engines</a>
                                        </li>
                                        <li>
                                            <a onclick="(function (event){event.preventDefault();showPageMenu(41);})(event)" href="#">ACEA 2016 European oil sequence for service-fill oils for gasoline and diesel engines</a>
                                        </li>
                                        <li>
                                            <a onclick="(function (event){event.preventDefault();showPageMenu(42);})(event)" href="#">ACEA 2016 European oil sequence for service-fill oils for gasoline and diesel engines with after treatment devices</a>
                                        </li>
                                        <li>
                                            <a onclick="(function (event){event.preventDefault();showPageMenu(43);})(event)" href="#">ACEA 2016 European oil sequence for service-fill oils for gasoline and diesel engines with after treatment devices</a>
                                        </li>
                                        <li>
                                            <a onclick="(function (event){event.preventDefault();showPageMenu(44);})(event)" href="#">ACEA 2016 European oil sequence for service-fill oils for gasoline and diesel engines with after treatment devices</a>
                                        </li>
                                        <li>
                                            <a onclick="(function (event){event.preventDefault();showPageMenu(45);})(event)" href="#">ACEA 2016 European oil sequence for service-fill oils for gasoline and diesel engines with after treatment devices</a>
                                        </li>
                                        <li>
                                            <a onclick="(function (event){event.preventDefault();showPageMenu(46);})(event)" href="#">ACEA 2016 European oil sequence for service-fill oils for heavy duty diesel engines</a>
                                        </li>
                                        <li>
                                            <a onclick="(function (event){event.preventDefault();showPageMenu(47);})(event)" href="#">ACEA 2016 European oil sequence for service-fill oils for heavy duty diesel engines</a>
                                        </li>
                                        <li>
                                            <a onclick="(function (event){event.preventDefault();showPageMenu(48);})(event)" href="#">ACEA 2016 European oil sequence for service-fill oils for heavy duty diesel engines</a>
                                        </li>
                                        <li>
                                            <a onclick="(function (event){event.preventDefault();showPageMenu(49);})(event)" href="#">ACEA 2016 European oil sequence for service-fill oils for heavy duty diesel engines</a>
                                        </li>
                                        <li>
                                            <a onclick="(function (event){event.preventDefault();showPageMenu(50);})(event)" href="#">ACEA 2016 European oil sequence for service-fill oils for gasoline and diesel engines</a>
                                        </li>
                                        <li>
                                            <a onclick="(function (event){event.preventDefault();showPageMenu(51);})(event)" href="#">ACEA 2016 European oil sequence for service-fill oils for gasoline and diesel engines</a>
                                        </li>
                                        <li>
                                            <a onclick="(function (event){event.preventDefault();showPageMenu(52);})(event)" href="#">ACEA 2016 European oil sequence for service-fill oils for gasoline and diesel engines</a>
                                        </li>
                                        <li>
                                            <a onclick="(function (event){event.preventDefault();showPageMenu(53);})(event)" href="#">ACEA 2016 European oil sequence for service-fill oils for gasoline and diesel engines</a>
                                        </li>
                                        <li>
                                            <a onclick="(function (event){event.preventDefault();showPageMenu(54);})(event)" href="#">ACEA 2016 European oil sequence for service-fill oils for gasoline and diesel engines with after treatment devices</a>
                                        </li>
                                        <li>
                                            <a onclick="(function (event){event.preventDefault();showPageMenu(55);})(event)" href="#">ACEA 2016 European oil sequence for service-fill oils for gasoline and diesel engines with after treatment devices</a>
                                        </li>
                                        <li>
                                            <a onclick="(function (event){event.preventDefault();showPageMenu(56);})(event)" href="#">ACEA 2016 European oil sequence for service-fill oils for gasoline and diesel engines with after treatment devices</a>
                                        </li>
                                        <li>
                                            <a onclick="(function (event){event.preventDefault();showPageMenu(57);})(event)" href="#">ACEA 2016 European oil sequence for service-fill oils for gasoline and diesel engines with after treatment devices</a>
                                        </li>
                                        <li>
                                            <a onclick="(function (event){event.preventDefault();showPageMenu(58);})(event)" href="#">ACEA 2016 European oil sequence for service-fill oils for gasoline and diesel engines with after treatment devices</a>
                                        </li>
                                        <li>
                                            <a onclick="(function (event){event.preventDefault();showPageMenu(59);})(event)" href="#">ACEA 2016 European oil sequence for service-fill oils for heavy duty diesel engines</a>
                                        </li>
                                        <li>
                                            <a onclick="(function (event){event.preventDefault();showPageMenu(60);})(event)" href="#">ACEA 2016 European oil sequence for service-fill oils for heavy duty diesel engines</a>
                                        </li>
                                        <li>
                                            <a onclick="(function (event){event.preventDefault();showPageMenu(61);})(event)" href="#">ACEA 2016 European oil sequence for service-fill oils for heavy duty diesel engines</a>
                                        </li>
                                        <li>
                                            <a onclick="(function (event){event.preventDefault();showPageMenu(62);})(event)" href="#">ACEA 2016 European oil sequence for service-fill oils for heavy duty diesel engines</a>
                                        </li>
                                    </ul>
                                </div>
                            </li>
                            <li class="sidebar-dropdown">
                                <a href="#">
                                    <i class="fas fa-circle"></i>
                                    <span>Chapter 4: China GB, Global DHD-1, JASO HD-DL and US Military requirements for diesel engine oils</span>
                                </a>
                                <div class="sidebar-submenu">
                                    <ul>
                                        <li>
                                            <a onclick="(function (event){event.preventDefault();showPageMenu(63);})(event)" href="#">Divider</a>
                                        </li>
                                        <li>
                                            <a onclick="(function (event){event.preventDefault();showPageMenu(64);})(event)" href="#">GB 11121 - 2006 (#) - Passenger car gasoline engine oil - 1 -</a>
                                        </li>
                                        <li>
                                            <a onclick="(function (event){event.preventDefault();showPageMenu(65);})(event)" href="#">GB 11121 - 2006 (#) - Passenger car gasoline engine oil - 2 -</a>
                                        </li>
                                        <li>
                                            <a onclick="(function (event){event.preventDefault();showPageMenu(66);})(event)" href="#">GB 11122 - 2006 (#) - Heavy duty diesel engine oil - 1 -</a>
                                        </li>
                                        <li>
                                            <a onclick="(function (event){event.preventDefault();showPageMenu(67);})(event)" href="#">GB 11122 - 2006 (#) - Heavy duty diesel engine oil - 2 -</a>
                                        </li>
                                        <li>
                                            <a onclick="(function (event){event.preventDefault();showPageMenu(68);})(event)" href="#">GLOBAL DHD-1 specification - 1 -</a>
                                        </li>
                                        <li>
                                            <a onclick="(function (event){event.preventDefault();showPageMenu(69);})(event)" href="#">GLOBAL DHD-1 specification - 2 -</a>
                                        </li>
                                        <li>
                                            <a onclick="(function (event){event.preventDefault();showPageMenu(70);})(event)" href="#">JASO DH-1, DH-2, DH-2F, DL-0, DL-1 specification - Laboratory test - 1 -</a>
                                        </li>
                                        <li>
                                            <a onclick="(function (event){event.preventDefault();showPageMenu(71);})(event)" href="#">JASO DH-1, DH-2, DH-2F, DL-0, DL-1 specification - Laboratory test - 2 -</a>
                                        </li>
                                        <li>
                                            <a onclick="(function (event){event.preventDefault();showPageMenu(72);})(event)" href="#">JASO DH-1, DH-2, DH-2F, DL-0, DL-1 specification - Engine test - 1 -</a>
                                        </li>
                                        <li>
                                            <a onclick="(function (event){event.preventDefault();showPageMenu(73);})(event)" href="#">JASO DH-1, DH-2, DH-2F, DL-0, DL-1 specification - Engine test - 2 -</a>
                                        </li>
                                        <li>
                                            <a onclick="(function (event){event.preventDefault();showPageMenu(74);})(event)" href="#">MIL-PRF-2104H specification (2) - 1 -</a>
                                        </li>
                                        <li>
                                            <a onclick="(function (event){event.preventDefault();showPageMenu(75);})(event)" href="#">MIL-PRF-2104H specification (2) - 2 -</a>
                                        </li>
                                        <li>
                                            <a onclick="(function (event){event.preventDefault();showPageMenu(76);})(event)" href="#">MIL-PRF-2104H specification (2) - 3 -</a>
                                        </li>
                                        <li>
                                            <a onclick="(function (event){event.preventDefault();showPageMenu(77);})(event)" href="#">MIL-PRF-2104H specification (2) - 4 -</a>
                                        </li>
                                    </ul>
                                </div>
                            </li>
                            <li class="sidebar-dropdown">
                                <a href="#">
                                    <i class="fas fa-circle"></i>
                                    <span>Chapter 5: OEM requirements for gasoline and diesel engine oils</span>
                                </a>
                                <div class="sidebar-submenu">
                                    <ul>
                                        <li>
                                            <a onclick="(function (event){event.preventDefault();showPageMenu(78);})(event)" href="#">Divider</a>
                                        </li>
                                        <li>
                                            <a onclick="(function (event){event.preventDefault();showPageMenu(79);})(event)" href="#">BMW Long Life specification overview - 1 -</a>
                                        </li>
                                        <li>
                                            <a onclick="(function (event){event.preventDefault();showPageMenu(80);})(event)" href="#">BMW Long Life specification overview - 2 -</a>
                                        </li>
                                        <li>
                                            <a onclick="(function (event){event.preventDefault();showPageMenu(81);})(event)" href="#">CATERPILLAR Engine Crankcase Fluid (ECF) recommendations - 1 -</a>
                                        </li>
                                        <li>
                                            <a onclick="(function (event){event.preventDefault();showPageMenu(82);})(event)" href="#">CATERPILLAR Engine Crankcase Fluid (ECF) recommendations - 2 -</a>
                                        </li>
                                        <li>
                                            <a onclick="(function (event){event.preventDefault();showPageMenu(83);})(event)" href="#">CHRYSLER GROUP LLC requirements – MS-6395 specification</a>
                                        </li>
                                        <li>
                                            <a onclick="(function (event){event.preventDefault();showPageMenu(84);})(event)" href="#">CUMMINS Engineering Standards (CES) - 1 -</a>
                                        </li>
                                        <li>
                                            <a onclick="(function (event){event.preventDefault();showPageMenu(85);})(event)" href="#">CUMMINS Engineering Standards (CES) - 2 -</a>
                                        </li>
                                        <li>
                                            <a onclick="(function (event){event.preventDefault();showPageMenu(86);})(event)" href="#">CUMMINS Engineering Standards (CES) - 3 -</a>
                                        </li>
                                        <li>
                                            <a onclick="(function (event){event.preventDefault();showPageMenu(87);})(event)" href="#">CUMMINS Engineering Standards (CES) - 4 -</a>
                                        </li>
                                        <li>
                                            <a onclick="(function (event){event.preventDefault();showPageMenu(88);})(event)" href="#">CUMMINS Engineering Standards (CES) - 5 -</a>
                                        </li>
                                        <li>
                                            <a onclick="(function (event){event.preventDefault();showPageMenu(89);})(event)" href="#">CUMMINS Engineering Standards (CES) - 6 -</a>
                                        </li>
                                        <li>
                                            <a onclick="(function (event){event.preventDefault();showPageMenu(90);})(event)" href="#">DETROIT Fluids Specification (DFS) - 1 -</a>
                                        </li>
                                        <li>
                                            <a onclick="(function (event){event.preventDefault();showPageMenu(91);})(event)" href="#">DETROIT Fluids Specification (DFS) - 2 -</a>
                                        </li>
                                        <li>
                                            <a onclick="(function (event){event.preventDefault();showPageMenu(92);})(event)" href="#">DETROIT Fluids Specification (DFS) - 3 -</a>
                                        </li>
                                        <li>
                                            <a onclick="(function (event){event.preventDefault();showPageMenu(93);})(event)" href="#">DETROIT Fluids Specification (DFS) - 4 -</a>
                                        </li>
                                        <li>
                                            <a onclick="(function (event){event.preventDefault();showPageMenu(94);})(event)" href="#">DETROIT Fluids Specification (DFS) - 5 -</a>
                                        </li>
                                        <li>
                                            <a onclick="(function (event){event.preventDefault();showPageMenu(95);})(event)" href="#">DETROIT Fluids Specification (DFS) - 6 -</a>
                                        </li>
                                        <li>
                                            <a onclick="(function (event){event.preventDefault();showPageMenu(96);})(event)" href="#">DEUTZ lubricating oil Quality Classes (DQC) - 1 -</a>
                                        </li>
                                        <li>
                                            <a onclick="(function (event){event.preventDefault();showPageMenu(97);})(event)" href="#">DEUTZ lubricating oil Quality Classes (DQC) - 2 -</a>
                                        </li>
                                        <li>
                                            <a onclick="(function (event){event.preventDefault();showPageMenu(98);})(event)" href="#">DEUTZ lubricating oil Quality Classes (DQC) - 3 -</a>
                                        </li>
                                        <li>
                                            <a onclick="(function (event){event.preventDefault();showPageMenu(99);})(event)" href="#">DEUTZ lubricating oil Quality Classes (DQC) - 4 -</a>
                                        </li>
                                        <li>
                                            <a onclick="(function (event){event.preventDefault();showPageMenu(100);})(event)" href="#">FIAT service fill engine oil specifications, conventional SAPS</a>
                                        </li>
                                        <li>
                                            <a onclick="(function (event){event.preventDefault();showPageMenu(101);})(event)" href="#">FIAT service fill engine oil specifications, mid-SAPS - 1 -</a>
                                        </li>
                                        <li>
                                            <a onclick="(function (event){event.preventDefault();showPageMenu(102);})(event)" href="#">FIAT service fill engine oil specifications, mid-SAPS - 2 -</a>
                                        </li>
                                        <li>
                                            <a onclick="(function (event){event.preventDefault();showPageMenu(103);})(event)" href="#">FIAT service fill engine oil specifications, mid-SAPS - 3 -</a>
                                        </li>
                                        <li>
                                            <a onclick="(function (event){event.preventDefault();showPageMenu(104);})(event)" href="#">FPT Engine Oil Requirements</a>
                                        </li>
                                        <li>
                                            <a onclick="(function (event){event.preventDefault();showPageMenu(105);})(event)" href="#">FORD MOTOR COMPANY active Ford engine oil specifications - 1 -</a>
                                        </li>
                                        <li>
                                            <a onclick="(function (event){event.preventDefault();showPageMenu(106);})(event)" href="#">FORD MOTOR COMPANY active Ford engine oil specifications - 2 -</a>
                                        </li>
                                        <li>
                                            <a onclick="(function (event){event.preventDefault();showPageMenu(107);})(event)" href="#">GM engine oil specifications - 1 -</a>
                                        </li>
                                        <li>
                                            <a onclick="(function (event){event.preventDefault();showPageMenu(108);})(event)" href="#">GM engine oil specifications - 2 -</a>
                                        </li>
                                        <li>
                                            <a onclick="(function (event){event.preventDefault();showPageMenu(109);})(event)" href="#">GM engine oil specifications - 3 -</a>
                                        </li>
                                        <li>
                                            <a onclick="(function (event){event.preventDefault();showPageMenu(110);})(event)" href="#">GM engine oil specifications - 4 -</a>
                                        </li>
                                        <li>
                                            <a onclick="(function (event){event.preventDefault();showPageMenu(111);})(event)" href="#">GM engine oil specifications - 5 -</a>
                                        </li>
                                        <li>
                                            <a onclick="(function (event){event.preventDefault();showPageMenu(112);})(event)" href="#">Jaguar Land Rover Limited engine oil specifications</a>
                                        </li>
                                        <li>
                                            <a onclick="(function (event){event.preventDefault();showPageMenu(113);})(event)" href="#">MAN works standards - 1 -</a>
                                        </li>
                                        <li>
                                            <a onclick="(function (event){event.preventDefault();showPageMenu(114);})(event)" href="#">MAN works standards - 2 -</a>
                                        </li>
                                        <li>
                                            <a onclick="(function (event){event.preventDefault();showPageMenu(115);})(event)" href="#">MAN works standards - 3 -</a>
                                        </li>
                                        <li>
                                            <a onclick="(function (event){event.preventDefault();showPageMenu(116);})(event)" href="#">MERCEDES-BENZ specifications for passenger car (service fill) V2017.1 - 1 -</a>
                                        </li>
                                        <li>
                                            <a onclick="(function (event){event.preventDefault();showPageMenu(117);})(event)" href="#">MERCEDES-BENZ specifications for passenger car (service fill) V2017.1 - 2 -</a>
                                        </li>
                                        <li>
                                            <a onclick="(function (event){event.preventDefault();showPageMenu(118);})(event)" href="#">MERCEDES-BENZ specifications for passenger car (service fill) V2017.1 - 3 -</a>
                                        </li>
                                        <li>
                                            <a onclick="(function (event){event.preventDefault();showPageMenu(119);})(event)" href="#">MERCEDES-BENZ specifications for passenger car (service fill) V2017.1 - 4 -</a>
                                        </li>
                                        <li>
                                            <a onclick="(function (event){event.preventDefault();showPageMenu(120);})(event)" href="#">MERCEDES-BENZ specifications for passenger car (service fill) V2017.1 - 5 -</a>
                                        </li>
                                        <li>
                                            <a onclick="(function (event){event.preventDefault();showPageMenu(121);})(event)" href="#">MERCEDES-BENZ specifications for passenger car (service fill) V2017.1 - 6 -</a>
                                        </li>
                                        <li>
                                            <a onclick="(function (event){event.preventDefault();showPageMenu(122);})(event)" href="#">MERCEDES-BENZ specifications for passenger car (service fill) V2017.1 - 7 -</a>
                                        </li>
                                        <li>
                                            <a onclick="(function (event){event.preventDefault();showPageMenu(123);})(event)" href="#">MERCEDES-BENZ specifications for passenger car (service fill) V2017.1 - 8 -</a>
                                        </li>
                                        <li>
                                            <a onclick="(function (event){event.preventDefault();showPageMenu(124);})(event)" href="#">MERCEDES-BENZ specifications for passenger car (service fill) V2017.1 - 9 -</a>
                                        </li>
                                        <li>
                                            <a onclick="(function (event){event.preventDefault();showPageMenu(125);})(event)" href="#">MERCEDES-BENZ specifications for heavy duty (service fill) V2017.1 - 1 -</a>
                                        </li>
                                        <li>
                                            <a onclick="(function (event){event.preventDefault();showPageMenu(126);})(event)" href="#">MERCEDES-BENZ specifications for heavy duty (service fill) V2017.1 - 2 -</a>
                                        </li>
                                        <li>
                                            <a onclick="(function (event){event.preventDefault();showPageMenu(127);})(event)" href="#">MERCEDES-BENZ specifications for heavy duty (service fill) V2017.1 - 3 -</a>
                                        </li>
                                        <li>
                                            <a onclick="(function (event){event.preventDefault();showPageMenu(128);})(event)" href="#">MERCEDES-BENZ specifications for heavy duty (service fill) V2017.1 - 4 -</a>
                                        </li>
                                        <li>
                                            <a onclick="(function (event){event.preventDefault();showPageMenu(129);})(event)" href="#">MERCEDES-BENZ specifications for heavy duty (service fill) V2017.1 - 5 -</a>
                                        </li>
                                        <li>
                                            <a onclick="(function (event){event.preventDefault();showPageMenu(130);})(event)" href="#">MERCEDES-BENZ specifications for heavy duty (service fill) V2017.1 - 6 -</a>
                                        </li>
                                        <li>
                                            <a onclick="(function (event){event.preventDefault();showPageMenu(131);})(event)" href="#">MERCEDES-BENZ specifications for heavy duty (service fill) V2017.1 - 7 -</a>
                                        </li>
                                        <li>
                                            <a onclick="(function (event){event.preventDefault();showPageMenu(132);})(event)" href="#">MERCEDES-BENZ specifications for heavy duty (service fill) V2017.1 - 8 -</a>
                                        </li>
                                        <li>
                                            <a onclick="(function (event){event.preventDefault();showPageMenu(133);})(event)" href="#">MTU diesel engine oil specifications - MTL5044 - 1 -</a>
                                        </li>
                                        <li>
                                            <a onclick="(function (event){event.preventDefault();showPageMenu(134);})(event)" href="#">MTU diesel engine oil specifications - MTL5044 - 2 -</a>
                                        </li>
                                        <li>
                                            <a onclick="(function (event){event.preventDefault();showPageMenu(135);})(event)" href="#">MTU diesel engine eil specifications - MTL5044 - 3 -</a>
                                        </li>
                                        <li>
                                            <a onclick="(function (event){event.preventDefault();showPageMenu(136);})(event)" href="#">MTU diesel engine eil specifications - MTL5044 - 4 -</a>
                                        </li>
                                        <li>
                                            <a onclick="(function (event){event.preventDefault();showPageMenu(137);})(event)" href="#">PACCAR DAF engine oil requirements and oil drain intervals</a>
                                        </li>
                                        <li>
                                            <a onclick="(function (event){event.preventDefault();showPageMenu(138);})(event)" href="#">PORSCHE engine oil requirements</a>
                                        </li>
                                        <li>
                                            <a onclick="(function (event){event.preventDefault();showPageMenu(139);})(event)" href="#">PSA-PEUGEOT-CITROEN engine oil specifications - 1 -</a>
                                        </li>
                                        <li>
                                            <a onclick="(function (event){event.preventDefault();showPageMenu(140);})(event)" href="#">PSA-PEUGEOT-CITROEN engine oil specifications - 2 -</a>
                                        </li>
                                        <li>
                                            <a onclick="(function (event){event.preventDefault();showPageMenu(141);})(event)" href="#">PSA-PEUGEOT-CITROEN engine oil specifications - 3 -</a>
                                        </li>
                                        <li>
                                            <a onclick="(function (event){event.preventDefault();showPageMenu(142);})(event)" href="#">PSA-PEUGEOT-CITROEN engine oil specifications - 4 -</a>
                                        </li>
                                        <li>
                                            <a onclick="(function (event){event.preventDefault();showPageMenu(143);})(event)" href="#">PSA-PEUGEOT-CITROEN engine oil specifications - 5 -</a>
                                        </li>
                                        <li>
                                            <a onclick="(function (event){event.preventDefault();showPageMenu(144);})(event)" href="#">PSA-PEUGEOT-CITROEN engine oil specifications - 6 -</a>
                                        </li>
                                        <li>
                                            <a onclick="(function (event){event.preventDefault();showPageMenu(145);})(event)" href="#">RENAULT passenger car engine oil requirements - 1 -</a>
                                        </li>
                                        <li>
                                            <a onclick="(function (event){event.preventDefault();showPageMenu(146);})(event)" href="#">RENAULT passenger car engine oil requirements - 2 -</a>
                                        </li>
                                        <li>
                                            <a onclick="(function (event){event.preventDefault();showPageMenu(147);})(event)" href="#">RENAULT passenger car engine oil requirements - 3 -</a>
                                        </li>
                                        <li>
                                            <a onclick="(function (event){event.preventDefault();showPageMenu(148);})(event)" href="#">RENAULT passenger car engine oil requirements - 4 -</a>
                                        </li>
                                        <li>
                                            <a onclick="(function (event){event.preventDefault();showPageMenu(149);})(event)" href="#">SCANIA Long Drain Field (LDF) test requirements</a>
                                        </li>
                                        <li>
                                            <a onclick="(function (event){event.preventDefault();showPageMenu(150);})(event)" href="#">VOLVO CAR CORPORATION engine oil specifications - 1 -</a>
                                        </li>
                                        <li>
                                            <a onclick="(function (event){event.preventDefault();showPageMenu(151);})(event)" href="#">VOLVO CAR CORPORATION engine oil specifications - 2 -</a>
                                        </li>
                                        <li>
                                            <a onclick="(function (event){event.preventDefault();showPageMenu(152);})(event)" href="#">VOLVO VDS, MACK EO and RENAULT RLD standards - 1 -</a>
                                        </li>
                                        <li>
                                            <a onclick="(function (event){event.preventDefault();showPageMenu(153);})(event)" href="#">VOLVO VDS, MACK EO and RENAULT RLD standards - 2 -</a>
                                        </li>
                                        <li>
                                            <a onclick="(function (event){event.preventDefault();showPageMenu(154);})(event)" href="#">VOLVO VDS, MACK EO and RENAULT RLD standards - 3 -</a>
                                        </li>
                                        <li>
                                            <a onclick="(function (event){event.preventDefault();showPageMenu(155);})(event)" href="#">VOLVO VDS, MACK EO and RENAULT RLD standards - 4 -</a>
                                        </li>
                                        <li>
                                            <a onclick="(function (event){event.preventDefault();showPageMenu(156);})(event)" href="#">VOLKSWAGEN engine oil specifications - 1 -</a>
                                        </li>
                                        <li>
                                            <a onclick="(function (event){event.preventDefault();showPageMenu(157);})(event)" href="#">VOLKSWAGEN engine oil specifications - 2 -</a>
                                        </li>
                                        <li>
                                            <a onclick="(function (event){event.preventDefault();showPageMenu(158);})(event)" href="#">VOLKSWAGEN engine oil specifications - 3 -</a>
                                        </li>
                                        <li>
                                            <a onclick="(function (event){event.preventDefault();showPageMenu(159);})(event)" href="#">VOLKSWAGEN engine oil specifications - 4 -</a>
                                        </li>
                                    </ul>
                                </div>
                            </li>
                            <li class="sidebar-dropdown">
                                <a href="#">
                                    <i class="fas fa-circle"></i>
                                    <span>Chapter 6: ACC, API, ATC and ATIEL codes of practice (CoP)</span>
                                </a>
                                <div class="sidebar-submenu">
                                    <ul>
                                        <li>
                                            <a onclick="(function (event){event.preventDefault();showPageMenu(160);})(event)" href="#">Divider</a>
                                        </li>
                                        <li>
                                            <a onclick="(function (event){event.preventDefault();showPageMenu(161);})(event)" href="#">API and ATIEL base stock categories</a>
                                        </li>
                                        <li>
                                            <a onclick="(function (event){event.preventDefault();showPageMenu(162);})(event)" href="#">API EOLCS definitions for Base Oil Interchangeability guidelines</a>
                                        </li>
                                        <li>
                                            <a onclick="(function (event){event.preventDefault();showPageMenu(163);})(event)" href="#">ATIEL Code of Practice definitions for base stock interchange guidelines</a>
                                        </li>
                                        <li>
                                            <a onclick="(function (event){event.preventDefault();showPageMenu(164);})(event)" href="#">ATIEL base stock interchange guidelines Use of alternative base stocks in validated formulations</a>
                                        </li>
                                        <li>
                                            <a onclick="(function (event){event.preventDefault();showPageMenu(165);})(event)" href="#">ACC and ATC guidelines for minor formulation modifications - 1 -</a>
                                        </li>
                                        <li>
                                            <a onclick="(function (event){event.preventDefault();showPageMenu(166);})(event)" href="#">ACC and ATC guidelines for minor formulation modifications - 2 -</a>
                                        </li>
                                        <li>
                                            <a onclick="(function (event){event.preventDefault();showPageMenu(167);})(event)" href="#">ACC and ATC guidelines for minor formulation modifications - 3 -</a>
                                        </li>
                                        <li>
                                            <a onclick="(function (event){event.preventDefault();showPageMenu(168);})(event)" href="#">ACC and ATC guidelines for minor formulation modifications - 4 -</a>
                                        </li>
                                        <li>
                                            <a onclick="(function (event){event.preventDefault();showPageMenu(169);})(event)" href="#">ACC guidelines for program guidelines</a>
                                        </li>
                                        <li>
                                            <a onclick="(function (event){event.preventDefault();showPageMenu(170);})(event)" href="#">ACC and ATC guidelines data required for candidate data packages - 1 -</a>
                                        </li>
                                        <li>
                                            <a onclick="(function (event){event.preventDefault();showPageMenu(171);})(event)" href="#">ACC and ATC guidelines data required for candidate data packages - 2 -</a>
                                        </li>
                                    </ul>
                                </div>
                            </li>
                            <li class="sidebar-dropdown">
                                <a href="#">
                                    <i class="fas fa-circle"></i>
                                    <span>Chapter 7: API guidelines for: - Viscosity grade read-cross (VGRA) - Base oil interchange (BOI)</span>
                                </a>
                                <div class="sidebar-submenu">
                                    <ul>
                                        <li>
                                            <a onclick="(function (event){event.preventDefault();showPageMenu(172);})(event)" href="#">Divider</a>
                                        </li>
                                        <li>
                                            <a onclick="(function (event){event.preventDefault();showPageMenu(173);})(event)" href="#">API 1509 engine oil licensing and certification system guidelines: viscosity grades read across requirements for formulations containing Group I, II, III and IV base stocks</a>
                                        </li>
                                        <li>
                                            <a onclick="(function (event){event.preventDefault();showPageMenu(174);})(event)" href="#">API 1509 engine oil licensing and certification system guidelines: viscosity grades read across requirements for formulations containing Group I, II, III and IV base stocks</a>
                                        </li>
                                        <li>
                                            <a onclick="(function (event){event.preventDefault();showPageMenu(175);})(event)" href="#">API 1509 engine oil licensing and certification system guidelines: viscosity grades read across requirements for formulations containing Group I, II, III and IV base stocks</a>
                                        </li>
                                        <li>
                                            <a onclick="(function (event){event.preventDefault();showPageMenu(176);})(event)" href="#">API 1509 engine oil licensing and certification system guidelines: viscosity grades read across requirements for formulations containing Group I, II, III and IV base stocks</a>
                                        </li>
                                        <li>
                                            <a onclick="(function (event){event.preventDefault();showPageMenu(177);})(event)" href="#">API 1509 engine oil licensing and certification system guidelines: viscosity grades read across requirements for formulations containing Group I, II, III and IV base stocks</a>
                                        </li>
                                        <li>
                                            <a onclick="(function (event){event.preventDefault();showPageMenu(178);})(event)" href="#">API 1509 engine oil licensing and certification system guidelines: viscosity grades read across requirements for formulations containing Group I, II, III and IV base stocks</a>
                                        </li>
                                        <li>
                                            <a onclick="(function (event){event.preventDefault();showPageMenu(179);})(event)" href="#">API 1509 engine oil licensing and certification system guidelines: viscosity grades read across requirements for formulations containing Group I, II, III and IV base stocks</a>
                                        </li>
                                        <li>
                                            <a onclick="(function (event){event.preventDefault();showPageMenu(180);})(event)" href="#">API 1509 engine oil licensing and certification system guidelines: viscosity grades read across requirements for formulations containing Group I, II, III and IV base stocks</a>
                                        </li>
                                        <li>
                                            <a onclick="(function (event){event.preventDefault();showPageMenu(181);})(event)" href="#">API 1509 engine oil licensing and certification system guidelines: viscosity grades read across requirements for formulations containing Group I, II, III and IV base stocks</a>
                                        </li>
                                        <li>
                                            <a onclick="(function (event){event.preventDefault();showPageMenu(182);})(event)" href="#">API 1509 engine oil licensing and certification system guidelines: viscosity grades read across requirements for formulations containing Group I, II, III and IV base stocks</a>
                                        </li>
                                        <li>
                                            <a onclick="(function (event){event.preventDefault();showPageMenu(183);})(event)" href="#">API 1509 engine oil licensing and certification system guidelines: viscosity grades read across requirements for formulations containing Group I, II, III and IV base stocks</a>
                                        </li>
                                        <li>
                                            <a onclick="(function (event){event.preventDefault();showPageMenu(184);})(event)" href="#">API 1509 engine oil licensing and certification system guidelines: viscosity grades read across requirements for formulations containing Group I, II, III and IV base stocks</a>
                                        </li>
                                        <li>
                                            <a onclick="(function (event){event.preventDefault();showPageMenu(185);})(event)" href="#">API 1509 engine oil licensing and certification system guidelines: viscosity grades read across requirements for formulations containing Group I, II, III and IV base stocks</a>
                                        </li>
                                        <li>
                                            <a onclick="(function (event){event.preventDefault();showPageMenu(186);})(event)" href="#">API 1509 engine oil licensing and certification system guidelines: viscosity grades read across requirements for formulations containing Group I, II, III and IV base stocks</a>
                                        </li>
                                        <li>
                                            <a onclick="(function (event){event.preventDefault();showPageMenu(187);})(event)" href="#">API 1509 engine oil licensing and certification system guidelines: viscosity grades read across requirements for formulations containing Group I, II, III and IV base stocks</a>
                                        </li>
                                        <li>
                                            <a onclick="(function (event){event.preventDefault();showPageMenu(188);})(event)" href="#">API 1509 engine oil licensing and certification system guidelines: viscosity grades read across requirements for formulations containing Group I, II, III and IV base stocks</a>
                                        </li>
                                        <li>
                                            <a onclick="(function (event){event.preventDefault();showPageMenu(189);})(event)" href="#">API 1509 engine oil licensing and certification system guidelines: viscosity grades read across requirements for formulations containing Group I, II, III and IV base stocks</a>
                                        </li>
                                        <li>
                                            <a onclick="(function (event){event.preventDefault();showPageMenu(190);})(event)" href="#">API 1509 engine oil licensing and certification system guidelines: viscosity grades read across requirements for formulations containing Group I, II, III and IV base stocks</a>
                                        </li>
                                        <li>
                                            <a onclick="(function (event){event.preventDefault();showPageMenu(191);})(event)" href="#">API 1509 engine oil licensing and certification system guidelines: API base oil interchangeability guidelines for passenger car motor oils</a>
                                        </li>
                                        <li>
                                            <a onclick="(function (event){event.preventDefault();showPageMenu(192);})(event)" href="#">API 1509 engine oil licensing and certification system guidelines: API base oil interchangeability guidelines for passenger car motor oils</a>
                                        </li>
                                        <li>
                                            <a onclick="(function (event){event.preventDefault();showPageMenu(193);})(event)" href="#">API 1509 engine oil licensing and certification system guidelines: API base oil interchangeability guidelines for passenger car motor oils</a>
                                        </li>
                                        <li>
                                            <a onclick="(function (event){event.preventDefault();showPageMenu(194);})(event)" href="#">API 1509 engine oil licensing and certification system guidelines: API base oil interchangeability guidelines for passenger car motor oils</a>
                                        </li>
                                        <li>
                                            <a onclick="(function (event){event.preventDefault();showPageMenu(195);})(event)" href="#">API 1509 engine oil licensing and certification system guidelines: API base oil interchangeability guidelines for passenger car motor oils</a>
                                        </li>
                                        <li>
                                            <a onclick="(function (event){event.preventDefault();showPageMenu(196);})(event)" href="#">API 1509 engine oil licensing and certification system guidelines: API base oil interchangeability guidelines for passenger car motor oils</a>
                                        </li>
                                        <li>
                                            <a onclick="(function (event){event.preventDefault();showPageMenu(197);})(event)" href="#">API 1509 engine oil licensing and certification system guidelines: API base oil interchangeability guidelines for diesel engine oils</a>
                                        </li>
                                        <li>
                                            <a onclick="(function (event){event.preventDefault();showPageMenu(198);})(event)" href="#">API 1509 engine oil licensing and certification system guidelines: API base oil interchangeability guidelines for diesel engine oils</a>
                                        </li>
                                        <li>
                                            <a onclick="(function (event){event.preventDefault();showPageMenu(199);})(event)" href="#">API 1509 engine oil licensing and certification system guidelines: API base oil interchangeability guidelines for diesel engine oils</a>
                                        </li>
                                        <li>
                                            <a onclick="(function (event){event.preventDefault();showPageMenu(200);})(event)" href="#">API 1509 engine oil licensing and certification system guidelines: API base oil interchangeability guidelines for diesel engine oils</a>
                                        </li>
                                        <li>
                                            <a onclick="(function (event){event.preventDefault();showPageMenu(201);})(event)" href="#">API 1509 engine oil licensing and certification system guidelines: API base oil interchangeability guidelines for diesel engine oils</a>
                                        </li>
                                        <li>
                                            <a onclick="(function (event){event.preventDefault();showPageMenu(202);})(event)" href="#">API 1509 engine oil licensing and certification system guidelines: API base oil interchangeability guidelines for diesel engine oils</a>
                                        </li>
                                        <li>
                                            <a onclick="(function (event){event.preventDefault();showPageMenu(203);})(event)" href="#">API 1509 engine oil licensing and certification system guidelines: API base oil interchangeability guidelines for diesel engine oils</a>
                                        </li>
                                        <li>
                                            <a onclick="(function (event){event.preventDefault();showPageMenu(204);})(event)" href="#">API 1509 engine oil licensing and certification system guidelines: API base oil interchangeability guidelines for diesel engine oils</a>
                                        </li>
                                        <li>
                                            <a onclick="(function (event){event.preventDefault();showPageMenu(205);})(event)" href="#">API 1509 engine oil licensing and certification system guidelines: API base oil interchangeability guidelines for diesel engine oils</a>
                                        </li>
                                        <li>
                                            <a onclick="(function (event){event.preventDefault();showPageMenu(206);})(event)" href="#">API 1509 engine oil licensing and certification system guidelines: API base oil interchangeability guidelines for diesel engine oils</a>
                                        </li>
                                        <li>
                                            <a onclick="(function (event){event.preventDefault();showPageMenu(207);})(event)" href="#">API 1509 engine oil licensing and certification system guidelines: API base oil interchangeability guidelines for diesel engine oils</a>
                                        </li>
                                        <li>
                                            <a onclick="(function (event){event.preventDefault();showPageMenu(208);})(event)" href="#">API 1509 engine oil licensing and certification system guidelines: API base oil interchangeability guidelines for diesel engine oils</a>
                                        </li>
                                    </ul>
                                </div>
                            </li>
                            <li class="sidebar-dropdown">
                                <a href="#">
                                    <i class="fas fa-circle"></i>
                                    <span>Chapter 8: ATIEL guidelines for: - Viscosity grade read-across (VGRA)- Base oil interchange (BOI) - Viscosity modifier interchange (VMI)</span>
                                </a>
                                <div class="sidebar-submenu">
                                    <ul>
                                        <li>
                                            <a onclick="(function (event){event.preventDefault();showPageMenu(210);})(event)" href="#">Divider</a>
                                        </li>
                                        <li>
                                            <a onclick="(function (event){event.preventDefault();showPageMenu(211);})(event)" href="#">ATIEL viscosity grade read across guidelines - 2 -</a>
                                        </li>
                                        <li>
                                            <a onclick="(function (event){event.preventDefault();showPageMenu(212);})(event)" href="#">ATIEL viscosity grade read across guidelines - 3 -</a>
                                        </li>
                                        <li>
                                            <a onclick="(function (event){event.preventDefault();showPageMenu(213);})(event)" href="#">ATIEL viscosity grade read across guidelines - 4 -</a>
                                        </li>
                                        <li>
                                            <a onclick="(function (event){event.preventDefault();showPageMenu(214);})(event)" href="#">ATIEL viscosity grade read across guidelines - 5 -</a>
                                        </li>
                                        <li>
                                            <a onclick="(function (event){event.preventDefault();showPageMenu(215);})(event)" href="#">ATIEL viscosity grade read across guidelines - 6 -</a>
                                        </li>
                                        <li>
                                            <a onclick="(function (event){event.preventDefault();showPageMenu(216);})(event)" href="#">ATIEL viscosity grade read across guidelines - 7 -</a>
                                        </li>
                                        <li>
                                            <a onclick="(function (event){event.preventDefault();showPageMenu(217);})(event)" href="#">ATIEL viscosity grade read across guidelines - 8 -</a>
                                        </li>
                                        <li>
                                            <a onclick="(function (event){event.preventDefault();showPageMenu(218);})(event)" href="#">ATIEL viscosity grade read across guidelines - 9 -</a>
                                        </li>
                                        <li>
                                            <a onclick="(function (event){event.preventDefault();showPageMenu(219);})(event)" href="#">ATIEL base oil interchange guidelines for the M271Evo & M111SL</a>
                                        </li>
                                        <li>
                                            <a onclick="(function (event){event.preventDefault();showPageMenu(220);})(event)" href="#">ATIEL base oil interchange guidelines for the DV6C, DV4TD, TU3M</a>
                                        </li>
                                        <li>
                                            <a onclick="(function (event){event.preventDefault();showPageMenu(221);})(event)" href="#">ATIEL base oil interchange guidelines for the M111 FE test</a>
                                        </li>
                                        <li>
                                            <a onclick="(function (event){event.preventDefault();showPageMenu(222);})(event)" href="#">ATIEL base oil interchange guidelines for the OM646LA test</a>
                                        </li>
                                        <li>
                                            <a onclick="(function (event){event.preventDefault();showPageMenu(223);})(event)" href="#">ATIEL base oil interchange guidelines for the VW TDI, OM646LA Bio, EP6CDT, TU5JP & OM501LA</a>
                                        </li>
                                        <li>
                                            <a onclick="(function (event){event.preventDefault();showPageMenu(224);})(event)" href="#">ATC viscosity modifier interchange guidelines</a>
                                        </li>
                                    </ul>
                                </div>
                            </li>
                            <li class="sidebar-dropdown">
                                <a href="#">
                                    <i class="fas fa-circle"></i>
                                    <span>Chapter 9: Tests and engines</span>
                                </a>
                                <div class="sidebar-submenu">
                                    <ul>
                                        <li>
                                            <a onclick="(function (event){event.preventDefault();showPageMenu(225);})(event)" href="#">Divider</a>
                                        </li>
                                        <li>
                                            <a onclick="(function (event){event.preventDefault();showPageMenu(226);})(event)" href="#">Engine test conditions - 1 -</a>
                                        </li>
                                        <li>
                                            <a onclick="(function (event){event.preventDefault();showPageMenu(227);})(event)" href="#">Engine test conditions - 2 -</a>
                                        </li>
                                        <li>
                                            <a onclick="(function (event){event.preventDefault();showPageMenu(228);})(event)" href="#">Engine test conditions - 3 -</a>
                                        </li>
                                        <li>
                                            <a onclick="(function (event){event.preventDefault();showPageMenu(229);})(event)" href="#">Engine test conditions - 4 -</a>
                                        </li>
                                        <li>
                                            <a onclick="(function (event){event.preventDefault();showPageMenu(230);})(event)" href="#">Engine test conditions - 5 -</a>
                                        </li>
                                    </ul>
                                </div>
                            </li>
                            <li class="sidebar-dropdown">
                                <a href="#">
                                    <i class="fas fa-circle"></i>
                                    <span>Chapter  10:  Elastomer compatibility testing</span>
                                </a>
                                <div class="sidebar-submenu">
                                    <ul>
                                        <li>
                                            <a onclick="(function (event){event.preventDefault();showPageMenu(231);})(event)" href="#">Divider</a>
                                        </li>
                                        <li>
                                            <a onclick="(function (event){event.preventDefault();showPageMenu(232);})(event)" href="#">Elastomer compatibility operating conditions and limits - 1 -</a>
                                        </li>
                                        <li>
                                            <a onclick="(function (event){event.preventDefault();showPageMenu(233);})(event)" href="#">Elastomer compatibility operating conditions and limits - 2 -</a>
                                        </li>
                                        <li>
                                            <a onclick="(function (event){event.preventDefault();showPageMenu(234);})(event)" href="#">Elastomer compatibility operating conditions and limits - 3 -</a>
                                        </li>
                                        <li>
                                            <a onclick="(function (event){event.preventDefault();showPageMenu(235);})(event)" href="#">Elastomer compatibility operating conditions and limits - 4 -</a>
                                        </li>
                                        <li>
                                            <a onclick="(function (event){event.preventDefault();showPageMenu(236);})(event)" href="#">Elastomer compatibility operating conditions and limits - 5 -</a>
                                        </li>
                                        <li>
                                            <a onclick="(function (event){event.preventDefault();showPageMenu(237);})(event)" href="#">Elastomer compatibility operating conditions and limits - 6 -</a>
                                        </li>
                                        <li>
                                            <a onclick="(function (event){event.preventDefault();showPageMenu(238);})(event)" href="#">Elastomer compatibility operating conditions and limits - 7 -</a>
                                        </li>
                                        <li>
                                            <a onclick="(function (event){event.preventDefault();showPageMenu(239);})(event)" href="#">Elastomer compatibility operating conditions and limits - 8 -</a>
                                        </li>
                                        <li>
                                            <a onclick="(function (event){event.preventDefault();showPageMenu(240);})(event)" href="#">Elastomer compatibility operating conditions and limits - 9 -</a>
                                        </li>
                                        <li>
                                            <a onclick="(function (event){event.preventDefault();showPageMenu(241);})(event)" href="#">Elastomer compatibility operating conditions and limits - 10 -</a>
                                        </li>
                                        <li>
                                            <a onclick="(function (event){event.preventDefault();showPageMenu(242);})(event)" href="#">Elastomer compatibility operating conditions and limits - 11 -</a>
                                        </li>
                                        <li>
                                            <a onclick="(function (event){event.preventDefault();showPageMenu(243);})(event)" href="#">Elastomer compatibility operating conditions and limits - 12 -</a>
                                        </li>
                                    </ul>
                                </div>
                            </li>
                            <li class="sidebar-dropdown">
                                <a href="#">
                                    <i class="fas fa-circle"></i>
                                    <span>Chapter  11:  Elastomer compatibility testing</span>
                                </a>
                                <div class="sidebar-submenu">
                                    <ul>
                                        <li>
                                            <a onclick="(function (event){event.preventDefault();showPageMenu(244);})(event)" href="#">Divider</a>
                                        </li>
                                        <li>
                                            <a onclick="(function (event){event.preventDefault();showPageMenu(245);})(event)" href="#">Approvals and performance recognition - 1 -</a>
                                        </li>
                                        <li>
                                            <a onclick="(function (event){event.preventDefault();showPageMenu(246);})(event)" href="#">Approvals and performance recognition - 2 -</a>
                                        </li>
                                    </ul>
                                </div>
                            </li>
                            <li class="sidebar-dropdown">
                                <a href="#">
                                    <i class="fas fa-circle"></i>
                                    <span>Chapter 12: OEM requirements for natural gas engine oils</span>
                                </a>
                                <div class="sidebar-submenu">
                                    <ul>
                                        <li>
                                            <a onclick="(function (event){event.preventDefault();showPageMenu(247);})(event)" href="#">Divider</a>
                                        </li>
                                        <li>
                                            <a onclick="(function (event){event.preventDefault();showPageMenu(248);})(event)" href="#">Requirements for gas engine oils for busses and trucks - 1 -</a>
                                        </li>
                                        <li>
                                            <a onclick="(function (event){event.preventDefault();showPageMenu(249);})(event)" href="#">Requirements for gas engine oils for busses and trucks - 2 -</a>
                                        </li>
                                    </ul>
                                </div>
                            </li>
                            <li class="sidebar-dropdown">
                                <a href="#">
                                    <i class="fas fa-circle"></i>
                                    <span>Chapter 13:  Unit conversion</span>
                                </a>
                                <div class="sidebar-submenu">
                                    <ul>
                                        <li>
                                            <a onclick="(function (event){event.preventDefault();showPageMenu(250);})(event)" href="#">Divider</a>
                                        </li>
                                        <li>
                                            <a onclick="(function (event){event.preventDefault();showPageMenu(251);})(event)" href="#">Unit conversion tables: Temperature conversion</a>
                                        </li>
                                        <li>
                                            <a onclick="(function (event){event.preventDefault();showPageMenu(252);})(event)" href="#">Unit conversion tables: Temperature conversion</a>
                                        </li>
                                        <li>
                                            <a onclick="(function (event){event.preventDefault();showPageMenu(253);})(event)" href="#">Unit conversion tables: Temperature conversion</a>
                                        </li>
                                        <li>
                                            <a onclick="(function (event){event.preventDefault();showPageMenu(254);})(event)" href="#">Unit conversion tables: Measurement conversion from US to SI units - 1 -</a>
                                        </li>
                                        <li>
                                            <a onclick="(function (event){event.preventDefault();showPageMenu(255);})(event)" href="#">Unit conversion tables: Measurement conversion from US to SI units - 2 -</a>
                                        </li>
                                        <li>
                                            <a onclick="(function (event){event.preventDefault();showPageMenu(256);})(event)" href="#">Unit conversion tables</a>
                                        </li>
                                    </ul>
                                </div>
                            </li>
                            <li>
                                <a href="#" onclick="(function (event){event.preventDefault();showPageMenu(257);})(event)">
                                    <i class="fas fa-circle"></i>
                                    <span>Acronym table</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                    <!-- sidebar-menu  -->
                </div>
            </nav> 
        </div>

        <div id="thumbnail" style="left: -240px"></div>
        <div id="favoritesThumbnail" style="left: -240px"></div>

        <main class="page-content">
            <div id="pdf-main-container">
                <div id="pdf-loader">Loading document...</div>
                <div id="pdf-contents">
                    <div id="subPdfContents">
                        <div id="canvasTextLayerDiv">
                            <div id="viewerContainer">
                                <canvas id="pdf-canvas"></canvas>
                            </div>
                            <div id="text-layer"></div>
                        </div>

                        <div style="background: white;z-index: 3000" role="toolbar" id="toolbar">
                            <div id="pager">
                                <button id="pdf-first" title="Move to page"><i class="fas fa-fast-backward"></i></button>
                                <button id="pdf-prev" data-pager="prev"><i class="fas fa-chevron-circle-left"></i></button>
                                <button id="pdf-next" data-pager="next"><i class="fas fa-chevron-circle-right"></i></button>
                                <button id="pdf-last" title="Move to page"><i class="fas fa-fast-forward"></i></button>
                            </div>
                            <div>
                                <a title="Print" href="https://www.veniseactivation.com/oronite/v5/pdf/pdf.pdf" target="_blank"><i class="fas fa-print"></i></a>
                                <div style="display: inline-block;position:relative;">
                                    <div id="searchBlock" style="display: none">
                                        <input id="searchInput" type="search" placeholder="Search..."/>
                                        <button onclick="fidman(event)"><i id="searchIcon" class="fas fa-search"></i></button>
                                        <button onclick="previousSearch(event)" id="previous" title="Previous"><i class="fas fa-chevron-circle-left"></i></button>
                                        <button onclick="nextSearch(event)" id="next" title="Next"><i class="fas fa-chevron-circle-right"></i></button>
                                        <span><span id="currentSearchPage">0</span>/<span id="totalSearchPages">0</span></span>
                                    </div>
                                    <button id="searchBtn" title="Search"><i class="fas fa-search"></i></button>
                                </div>
                                <button id="zoominbutton" type="button" title="Zoom in"><i class="fas fa-search-plus"></i></button>
                                <button id="zoomoutbutton" type="button" title="Zoom out"><i class="fas fa-search-minus"></i></button>
                                <button id="favoriteBtn" type="button" title="Favorite"><i class="fas fa-spinner fa-spin"></i></button>
                                <div style="display: inline-block;position:relative;">
                                    <div id="moveToPageBlock" style="display: none;">
                                        <input id="moveToPageInput" type="text" placeholder="Go to page"/>
                                        <button onclick="moveToPage(event)"><i class="fas fa-search"></i></button>
                                    </div>
                                    <button id="moveToPageBtn" title="Move to page"><i class="far fa-file"></i></button>
                                </div>
                                <button id="toggleThumbnailBtn" title="Thumbnail"><i class="fas fa-th-list"></i></button>
                                <button id="toggleThumbnailFavoritesBtn" title="Bookmarks"><i class="fas fa-bookmark"></i></button>
                                <button id="fullscreenbtn" title="Full screen"><img src="toolbarButton-presentationMode.png" style="width: 15px;"></button>
                            </div>
                            <div>
                                <div id="page-count-container">Page <div id="pdf-current-page"></div> of <div id="pdf-total-pages"></div></div>
                            </div>
                        </div>
                    </div>
                    <div id="page-loader">Loading page...</div>
                </div>
            </div>
        </main>

        <script>
            <?php
                 $arr = isset($_COOKIE['favorite_pages']) ? unserialize($_COOKIE['favorite_pages']) : [];
            ?>
            var favoritePages = JSON.parse('<?php echo json_encode($arr); ?>');
        </script>
        <script src="js/script.js"></script>
        <script type="text/javascript" src="js/custom_pdf.js"></script>
    </body>
</html>