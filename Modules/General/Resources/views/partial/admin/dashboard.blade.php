<!DOCTYPE HTML>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title')</title>
<?php $lang='ar'?>
    <link rel="stylesheet" type="text/css" href="{{ asset('control/lang/'.$lang.'') }}/css/bootstrap.css" media="all" />
    @if($lang =='ar')
    <link rel="stylesheet" type="text/css" href="{{ asset('control/lang/'.$lang.'') }}/css/bootstrap-rtl.css" media="all" />
    @endif

    <link rel="stylesheet" type="text/css" href="{{ asset('control/lang/'.$lang.'') }}/css/style.css" media="all" />
    <link rel="stylesheet" type="text/css" href="{{ asset('control/lang/'.$lang.'') }}/css/font-awesome.css" media="all" />
    <!--dataTables-->
    <link rel="stylesheet" type="text/css" href="{{ asset('control/lang/'.$lang.'') }}/css/dataTables.bootstrap.min.css"
        media="all" />
    <!--<link rel="stylesheet" type="text/css" href="{{ asset('control/lang/'.$lang.'') }}/css/rowReorder.dataTables.min.css">-->
    <link rel="stylesheet" type="text/css" href="{{ asset('control/lang/'.$lang.'') }}/css/responsive.dataTables.min.css">
    <!--dataTables-->
    <link rel="stylesheet" type="text/css" href="{{ asset('control/lang/'.$lang.'') }}/css/font-awesome1.css" media="all" />
    <link rel="stylesheet" type="text/css" href="{{ asset('control/lang/'.$lang.'') }}/css/font-awesome.css" media="all" />
    <script src="{{ asset('control/lang/'.$lang.'') }}/js/jquery-1.12.1.js"></script>
    <script src="{{ asset('control/lang/'.$lang.'') }}/js/jquery-migrate-1.2.1.min.js"></script>
    <!--dataTables-->

    <script src="{{ asset('control/lang/'.$lang.'') }}/js/jquery.dataTables.min.js"></script>
    <script src="{{ asset('control/lang/'.$lang.'') }}/js/dataTables.bootstrap.min.js"></script>
    <script type="text/javascript" language="javascript"
        src="{{ asset('control/lang/'.$lang.'') }}/js/dataTables.responsive.min.js"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css" rel="stylesheet" />


    <script type="text/javascript" class="init">
        $(document).ready(function () {
            var table = $('#example').DataTable({
                },
                        responsive: true;
                }
            );
        });
    </script>
    <!--<script type="text/javascript" language="javascript" src="js/dataTables.rowReorder.min.js"></script>-->
    <link href="{{asset('control')}}/panel/toastr.css" rel="stylesheet" />
    <script src="{{asset('control')}}/panel/toastr.min.js"></script>

    <link rel="stylesheet" href="{{ asset('control/lang/'.$lang.'') }}/css/responsive.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css" rel="stylesheet" />
    <script src="https://cdn.ckeditor.com/4.6.2/full/ckeditor.js"></script>
    <!--[if lt IE 9]>
                  <script src="{{ asset('control/lang/'.$lang.'') }}/js/html5shiv.min.js"></script>
                  <script src="{{ asset('control/lang/'.$lang.'') }}/js/respond.min.js"></script>
         <![endif]-->
    @yield('style')
    <style>
        .select2-search {
            background-color: #362B3E;
        }

        .select2-search input {
            background-color: #362B3E;
        }

        .select2-results {
            background-color: #362B3E;
        }

        .select2-drop {
            height: 80px;
            /* !important not needed */
        }
    </style>
</head>

<body>

    @if (session('SuccessMsg'))
    <?php $SuccessMsg = session('SuccessMsg') ?>
    <script type="text/javascript">
        toastr.success('{{$SuccessMsg}}');
    </script>
    @endif

    @if(session('ErrorMsg'))
    <?php $ErrorMsg = session('ErrorMsg') ?>
    <script type="text/javascript">
        toastr.warning('{{$ErrorMsg}}');
    </script>
    @endif

    <div class="website_containner">
        <div class="top_block">

            <div class="top-navbar">
                <a data-original-title="Toggle navigation" class="toggle-side-nav pull-left"
                    href="{{ asset('control/lang/'.$lang.'') }}/#">
                    <i class="icon-reorder"></i>
                </a>
            </div>

            <div class="container">
                <div class="row">
                    <div class="col-md-3 col-xs-12">
                        <div class="logo">
                            <a href="{{ asset('control/lang/'.$lang.'') }}/"><img
                                    src="{{asset('control')}}/theme/img/logo.png"></a>
                        </div>
                    </div>
                    <div class="col-md-9 col-xs-12">
                        <div class="topblo">
                            <div class="account">
                                <ul class="list_acountdrop list_acountdrop_hsap">
                                    <li class="dropup">
                                        <a href="{{ asset('control/lang/'.$lang.'') }}/#" class="dropdown-toggle"
                                            data-toggle="dropdown" role="button" aria-haspopup="true"
                                            aria-expanded="false">
                                            {{ Auth::user()->username }} <i class="icon-angle-down"></i>
                                        </a>
                                        <ul class="dropdown-menu dropdown-menu_hsap show_drop">
                                            <li><a href="{{ url('MyAccount') }}">{{trans('panel.myaccount')}}</a></li>
                                            <li><a href="{{ url('MyOrders')}}">{{trans('panel.myorders')}}</a></li>
                                            <li><a
                                                    href="{{ url('ChangePassword') }}">{{trans('panel.changepassword')}}</a>
                                            </li>
                                            <li><a href="{{ url('wishlist') }}">{{trans('home.mywishlist')}} </a></li>
                                            <li><a href="{{ route('logout') }}">{{trans('home.Logout')}}</a></li>
                                        </ul>
                                    </li>
                                </ul>
                            </div>
                            <!--account-->
                            <div class="notiblog">
                                <ul class="list_acountdrop list_acountdrop_noti list_acountdrop_hsap">
                                    <li class="dropup">
                                    @if($lang == 'ar')
                                        <a href="{{url('/lang/en')}}/" aria-haspopup="true" aria-expanded="false">
                                            <i class="icon-globe"></i> English
                                        </a>
                                         @elseif($lang == 'en')
                                        <a href="{{url('/lang/ar')}}/" aria-haspopup="true" aria-expanded="false">
                                            <i class="icon-globe"></i> عربى
                                        </a>
                                          @endif

                                    </li>
                                </ul>
                            </div>
                            <!--                                <div class="notifications">
                                                                    <div class="notiblog">
                                                                        <ul class="list_acountdrop list_acountdrop_noti list_acountdrop_hsap">
                                                                            <li class="dropup">
                                                                                <a href="{{ asset('control/lang/'.$lang.'') }}/#" class="dropdown-toggle" data-toggle="dropdown" role="button"
                                                                                   aria-haspopup="true" aria-expanded="false">
                                                                                    <i class="icon-user"></i><span>5</span>
                                                                                </a>
                                                                                <ul class="dropdown-menu dropdown-menu_hsap show_drop">
                                                                                    <li><a href="{{ asset('control/lang/'.$lang.'') }}/#">My Account</a></li>
                                                                                    <li><a href="{{ asset('control/lang/'.$lang.'') }}/#">My Orders</a></li>
                                                                                    <li><a href="{{ asset('control/lang/'.$lang.'') }}/#">My Wishlist</a></li>
                                                                                    <li><a href="{{ asset('control/lang/'.$lang.'') }}/#">Comparison</a></li>
                                                                                    <li><a href="{{ asset('control/lang/'.$lang.'') }}/#">Change Password</a></li>
                                                                                    <li><a href="{{ asset('control/lang/'.$lang.'') }}/#">Logout</a></li>
                                                                                    <li><a href="{{ asset('control/lang/'.$lang.'') }}/#">Admin</a></li>
                                                                                </ul>
                                                                            </li>
                                                                        </ul>
                                                                    </div>
                                                                    <div class="notiblog">
                                                                        <ul class="list_acountdrop list_acountdrop_noti list_acountdrop_hsap">
                                                                            <li class="dropup">
                                                                                <a href="{{ asset('control/lang/'.$lang.'') }}/#" class="dropdown-toggle" data-toggle="dropdown" role="button"
                                                                                   aria-haspopup="true" aria-expanded="false">
                                                                                    <i class="icon-tasks"></i><span>5</span>
                                                                                </a>
                                                                                <ul class="dropdown-menu dropdown-menu_hsap show_drop">
                                                                                    <li><a href="{{ asset('control/lang/'.$lang.'') }}/#">My Account</a></li>
                                                                                    <li><a href="{{ asset('control/lang/'.$lang.'') }}/#">My Orders</a></li>
                                                                                    <li><a href="{{ asset('control/lang/'.$lang.'') }}/#">My Wishlist</a></li>
                                                                                    <li><a href="{{ asset('control/lang/'.$lang.'') }}/#">Comparison</a></li>
                                                                                    <li><a href="{{ asset('control/lang/'.$lang.'') }}/#">Change Password</a></li>
                                                                                    <li><a href="{{ asset('control/lang/'.$lang.'') }}/#">Logout</a></li>
                                                                                    <li><a href="{{ asset('control/lang/'.$lang.'') }}/#">Admin</a></li>
                                                                                </ul>
                                                                            </li>
                                                                        </ul>
                                                                    </div>
                                                                    <div class="notiblog">
                                                                        <ul class="list_acountdrop list_acountdrop_noti list_acountdrop_hsap">
                                                                            <li class="dropup">
                                                                                <a href="{{ asset('control/lang/'.$lang.'') }}/#" class="dropdown-toggle" data-toggle="dropdown" role="button"
                                                                                   aria-haspopup="true" aria-expanded="false">
                                                                                    <i class="icon-bell"></i><span>5</span>
                                                                                </a>
                                                                                <ul class="dropdown-menu dropdown-menu_hsap show_drop">
                                                                                    <li><a href="{{ asset('control/lang/'.$lang.'') }}/#">My Account</a></li>
                                                                                    <li><a href="{{ asset('control/lang/'.$lang.'') }}/#">My Orders</a></li>
                                                                                    <li><a href="{{ asset('control/lang/'.$lang.'') }}/#">My Wishlist</a></li>
                                                                                    <li><a href="{{ asset('control/lang/'.$lang.'') }}/#">Comparison</a></li>
                                                                                    <li><a href="{{ asset('control/lang/'.$lang.'') }}/#">Change Password</a></li>
                                                                                    <li><a href="{{ asset('control/lang/'.$lang.'') }}/#">Logout</a></li>
                                                                                    <li><a href="{{ asset('control/lang/'.$lang.'') }}/#">Admin</a></li>
                                                                                </ul>
                                                                            </li>
                                                                        </ul>
                                                                    </div>
                                                                </div>
                                                                <div class="search_block">
                                                                    <form>
                                                                        <div class="in_form_search">
                                                                            <input type="text" name="name" placeholder="Scents Library">
                                                                            <button>Search</button>
                                                                            <ul class="auto_complete2 show_drop">
                                                                                <li>Some of Our Scent Marketing Customers</li>
                                                                                <li>Some of Our Scent Customers</li>
                                                                                <li>Our Scent Marketing Customers</li>
                                                                                <li>Some of Our Scent Marketing Customers</li>
                                                                                <li>Some of Scent Customers</li>
                                                                                <li>Some of Our Scent Customers</li>
                                                                            </ul>
                                                                        </div>
                                                                    </form>
                                                                </div>-->
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="wrapper_cols">
            <div class="col_page_content">
                @yield('content')
            </div>
            <!--col_page_content-->
        </div>
        <!--wrapper_cols-->
        <div class="footer">{{trans('panel.developedbytremno')}}</div>
        <!--copy_site-->
        <div class="col_side_nav">
            <div id="side-nav">
                <ul id="nav">
                    <li class="{{(Request::is('dashboard'))?'active':''}}">
                        <a href="{{route('admin.dashboard')}}">
                            <i class="fa fa-dashboard fa-lg"></i> {{ trans('panel.dashboard') }}
                        </a>
                    </li>

                    <li class="{{(Request::is('admin/orders'))?'active':''}}">
                        <a href="{{url('admin/orders')}}">
                            <i class="fa fa-cubes fa-lg"></i> {{ trans('panel.Orders') }}
                        </a>
                    </li>
                    <li class="{{(Request::is('admin/brands'))?'active':''}}">
                        <a href="{{url('admin/brands')}}"><i class="fa fa-check fa-lg"></i> {{ trans('panel.brands') }}
                        </a>
                    </li>
                    <li
                        class="{{(Request::is('admin/products'))?'active':''}} {{(Request::is('admin/Pendingproducts'))?'active':''}} {{(Request::is('admin/AddProduct'))?'active':''}}">
                        <a href="{{ asset('control/lang/'.$lang.'') }}/#"> <i class="icon-picture"></i>
                            {{ trans('panel.products') }} <i class="arrow icon-angle-left"></i></a>
                        <ul class="sub-menu">
                            <li class="{{(Request::is('admin/products'))?'active':''}}"> <a
                                    href="{{url('admin/products')}}"> <i class="icon-angle-right"></i>
                                    {{ trans('panel.allproducts') }} </a>
                            </li>

                            <li class="{{(Request::is('admin/AddProduct'))?'active':''}}">
                                <a href="{{url('admin/AddProduct')}}"> <i class="icon-angle-right"></i>
                                    {{ trans('panel.addproduct') }}
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="{{(Request::is('admin/categories'))?'active':''}}">
                        <a href="{{url('admin/categories')}}">
                            <i class="fa fa-clone fa-lg"></i> {{ trans('panel.categories') }}
                        </a>
                    </li>
                    <li class="{{(Request::is('admin/users'))?'active':''}}">
                        <a href="{{url('admin/users')}}">
                            <i class="fa fa-users fa-lg"></i> {{ trans('panel.customers') }}
                        </a>
                    </li>
                    <li class="{{(Request::is('admin/Page/AboutUs'))?'active':''}}">
                        <a href="{{url('admin/Page/AboutUs')}}">
                            <i class="fa fa-file"></i> {{ trans('panel.Aboutus') }}
                        </a>
                    </li>
                    <li class="{{(Request::is('admin/homebanners'))?'active':''}}">
                        <a href="{{url('admin/homebanners')}}">
                            <i class="fa fa-image fa-lg"></i> {{ trans('panel.homebanners') }}
                        </a>
                    </li>
                    <li class="{{(Request::is('admin/SocialandApp'))?'active':''}}">
                        <a href="{{url('admin/SocialandApp')}}">
                            <i class="fa fa-star fa-lg"></i> {{ trans('panel.socialapps') }}
                        </a>
                    </li>
                    <li class="{{(Request::is('admin/CustomerService'))?'active':''}}">
                        <a href="{{url('admin/CustomerService')}}">
                            <i class="fa fa-envelope-o fa-lg"></i> {{ trans('panel.customerserviceforweb') }}
                        </a>
                    </li>
                    <li class="{{(Request::is('admin/mobileservice'))?'active':''}}">
                        <a href="{{url('admin/mobileservice')}}">
                            <i class="fa fa-envelope-o fa-lg"></i> {{ trans('panel.customerserviceformobile') }}
                        </a>
                    </li>
                    <li class="{{(Request::is('admin/sendnotfication'))?'active':''}}">
                        <a href="{{url('admin/sendnotfication')}}">
                            <i class="fa fa-phone"></i> {{ trans('panel.sendnotfication') }}
                        </a>
                    </li>
                    <li class="{{(Request::is('admin/sendmessage'))?'active':''}}">
                        <a href="{{url('admin/sendmessage')}}">
                            <i class="fa fa-phone"></i> {{ trans('panel.sendmessage') }}
                        </a>
                    </li>
                    <li class="{{(Request::is('admin/coupons'))?'active':''}}">
                        <a href="{{url('admin/coupons')}}">
                            <i class="fa fa-bolt fa-lg"></i> {{ trans('panel.coupons') }}
                        </a>
                    </li>
                    <li class="{{(Request::is('admin/googleanalytic'))?'active':''}}">
                        <a href="{{url('admin/googleanalytic')}}">
                            <i class="fa fa-google fa-lg"></i>{{ trans('panel.googleanalytics') }}
                        </a>
                    </li>
                </ul>
            </div>
            <!--side-nav-->
        </div>
        <!--col_side_nav-->
    </div>
    <!--website_containner-->
     <script>
        $(document).ready(function() {
    $('#example').DataTable();
    });
    </script>
    <script>
        $(document).ready(function () {
                $('.select2').select2();
            });
    </script>
    <!--        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script> -->
    <script src="{{ asset('control/lang/'.$lang.'') }}/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="{{ asset('control/lang/'.$lang.'') }}/js/index.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script>

    @yield('script')

</body>

</html>
