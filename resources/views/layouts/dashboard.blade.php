<?php  /*
dashboard prinicpale view
*/
?>
@extends('layouts.plane')
@section('body')
<style type="text/css">
#go-to-top {
  display: none;
  position: fixed;
  bottom: 40px;
  right: 40px;
  z-index: 99;
  font-size: 23px;
  border: none;
  outline: none;
  color: white;
  cursor: pointer;
  padding: 15px;
  border-radius: 50%;
  background-color: rgb(25,34,45); 
}
.detailsMenu{
    display: inline;
}
</style>
    <!-- Preloader - style you can find in spinners.css -->
    <div class="preloader">
        <svg class="circular" viewBox="25 25 50 50">
            <circle class="path" cx="50" cy="50" r="20" fill="none" stroke-width="2" stroke-miterlimit="10" /> </svg>
    </div>
    <!-- go top button-->
    <div id="go-to-top" class="animated fadeIn">
        <i class="fa fa-arrow-up"></i>
    </div>
    <!-- Main wrapper  -->
    <div id="main-wrapper">
        <!-- header header  -->
        <div class="header dark" style="background-color: rgb(25,34,45);">
            <nav class="navbar top-navbar navbar-expand-md navbar-light">
                <!-- Logo -->
                <div class="navbar-header dark">
                    <a class="navbar-brand" href="{{ url ('/admin') }}">
                        <!-- Logo icon -->
                        <b><img src="{{ $shop->logo }}" class="dark-logo" width="100" height="50" /></b>
                        <!--End Logo icon -->
                      
                    </a>
                </div>
                <!-- End Logo -->
                <div class="navbar-collapse dark">
                    <!-- toggle and nav items -->
                    <ul class="navbar-nav mr-auto mt-md-0">
                        <!-- This is  -->
                        <li class="nav-item"> <a class="nav-link nav-toggler hidden-md-up text-muted  " href="javascript:void(0)"><i class="mdi mdi-menu"></i></a> </li>
                    </ul>
                    <!-- User profile and search -->
                    <ul class="navbar-nav my-lg-0">
                        <!-- Comment -->
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle text-muted text-muted  " href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="fa fa-bell"></i>
                                <div class="notify"> <span class="heartbit"></span> <span class="point"></span> </div>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right mailbox animated zoomIn">
                                <ul>
                                    <li>
                                        <div class="drop-title">Notifications</div>
                                    </li>
                                    <li>
                                        <div class="message-center">
                                            <!-- Message -->
                                            <a href="#">
                                                <div class="btn btn-danger btn-circle m-r-10"><i class="fa fa-link"></i></div>
                                                <div class="mail-contnet">
                                                    <h5>This is title</h5> <span class="mail-desc">Just see the my new admin!</span> <span class="time">9:30 AM</span>
                                                </div>
                                            </a>
                                            
                                        </div>
                                    </li>
                                    <li>
                                        <a class="nav-link text-center" href="javascript:void(0);"> <strong>Check all notifications</strong> <i class="fa fa-angle-right"></i> </a>
                                    </li>
                                </ul>
                            </div>
                        </li>
                        <!-- End Comment -->
                        <!-- Messages -->
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle text-muted  " href="#" id="2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="fa fa-envelope"></i>
                                <div class="notify"> <span class="heartbit"></span> <span class="point"></span> </div>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right mailbox animated zoomIn" aria-labelledby="2">
                                <ul>
                                    <li>
                                        <div class="drop-title">You have 4 new messages</div>
                                    </li>
                                    <li>
                                        <div class="message-center">
                                            <!-- Message -->
                                            <a href="#">
                                                <div class="user-img"> <img src="{{  Auth::user()->avatar }}" alt="user" class="img-circle"> <span class="profile-status online pull-right"></span> </div>
                                                <div class="mail-contnet">
                                                    <h5>Michael Qin</h5> <span class="mail-desc">Just see the my admin!</span> <span class="time">9:30 AM</span>
                                                </div>
                                            </a>
                                            
                                        </div>
                                    </li>
                                    <li>
                                        <a class="nav-link text-center" href="javascript:void(0);"> <strong>See all e-Mails</strong> <i class="fa fa-angle-right"></i> </a>
                                    </li>
                                </ul>
                            </div>
                        </li>
                        <!-- End Messages -->
                        <!-- Profile -->
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle text-muted  " href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><img src="{{  Auth::user()->avatar }}" alt="user" class="profile-pic" /></a>
                            <div class="dropdown-menu dropdown-menu-right animated zoomIn">
                                <ul class="dropdown-user">
                                    <li><a href="#"><i class="ti-settings"></i> Setting</a></li>
                                    <li><a class="fa fa-power-off" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                    document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>
                                    </li>
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    </form>
                                </ul>
                            </div>
                        </li>
                    </ul>
                </div>
            </nav>
        </div>

        <!-- End header header -->
        <!-- Left Sidebar  -->
        <div class="left-sidebar" style="background-color: rgb(25,34,45);">
            <!-- Sidebar scroll-->
            <div class="scroll-sidebar">
                <!-- Sidebar navigation-->
                <nav class="sidebar-nav" style="margin-top: 40px;">
                    <ul id="sidebarnav" class="dark">

                        @if(\Auth::user()->groupId == 0)
                        </li>
                        <li {{ (Request::is('admin') ? 'class=active' : '') }}>
                            <a href="{{ url ('admin') }}"><i class="fa fa-tachometer"></i><span class="hide-menu">tableau de bord</span></a>
                        </li>

                        <li {{ (Request::is('*users') ? 'class=active' : '') }}>
                             <a href="{{ url ('admin/users') }}" ><i class="fa fa-user"></i><span class="hide-menu">utilisateurs</span></a>
                                    <!-- /.nav-second-level -->
                        </li>
                        <li {{ (Request::is('*products') ? 'class=active' : '') }}>
                            <a href="{{ url ('admin/products') }}"><i class="fa fa-shopping-bag"></i><span class="hide-menu">Produits</span></a>
                                    <!-- /.nav-second-level -->
                        </li>

                        <li {{ (Request::is('*categories') ? 'class=active' : '') }}>
                            <a href="{{ url ('admin/categories') }}" aria-expanded="false"><i class="fa fa-list"></i><span class="hide-menu">catégories</span></a>
                                    <!-- /.nav-theird-level -->
                        </li>
                        <li {{ (Request::is('*orders') ? 'class=active' : '') }}>
                            <a href="{{ url ('admin/orders') }}"><i class="fa fa-shopping-cart"></i><span class="hide-menu">les commandes</span></a>
                                    <!-- /.nav-theird-level -->
                        </li>
                        

                        <li {{ (Request::is('*settings') ? 'class=active' : '') }}>

                            <a href="{{ url ('admin/settings') }}"><i class="ti-settings"></i><span class="hide-menu">paramètres</span></a>
                                    <!-- /.nav-theird-level -->
                        </li>
                        @endif
                        <li {{ (Request::is('*check') ? 'class=active' : '') }}>
                            <a href="{{ url ('admin/check') }}"><i class="fa fa-calendar-check-o"></i><span class="hide-menu">Vérifier commandes</span></a>
                                    <!-- /.nav-theird-level -->
                        </li>
                        <li {{ (Request::is('*preparation') ? 'class=active' : '') }}>
                            <a href="{{ url ('admin/preparation') }}"><i class="fa fa-archive"></i><span class="hide-menu">Préparation</span></a>
                                    <!-- /.nav-theird-level -->
                        </li>
                    </ul>
                </nav>
                <!-- End Sidebar navigation -->
            </div>
            <!-- End Sidebar scroll-->
        </div>
        <!-- End Left Sidebar  -->


        <div class="page-wrapper">
            <!-- Bread crumb -->
            <div class="row page-titles">
                <div class="col-md-5 align-self-center">
                    <h3 class="text-primary">@yield('page_heading')</h3> </div>
                <div class="col-md-7 align-self-center">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ url ('/admin') }}">Home</a></li>
                        <li class="breadcrumb-item active">@yield('page_heading')</li>
                    </ol>
                </div>
            </div>
            <!-- End Bread crumb -->
            <!-- Container fluid  -->
            <div class="container-fluid">
                @yield('section')
            </div>

      </div>

    </div>

@stop

