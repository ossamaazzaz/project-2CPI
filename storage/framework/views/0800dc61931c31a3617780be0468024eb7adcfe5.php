<?php  /*
dashboard prinicpale view
*/
?>


<?php $__env->startSection('body'); ?>
 <div id="wrapper">

        <!-- Navigation -->
        <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="<?php echo e(url ('')); ?>">Dashboard</a>
            </div>
            <!-- /.navbar-header -->

            <ul class="nav navbar-top-links navbar-right">
                <?php if(Auth::guest()): ?>
                        <li><a class="nav-link" href="<?php echo e(route('login')); ?>"><?php echo e(__('Login')); ?></a></li>
                            <li><a class="nav-link" href="<?php echo e(route('register')); ?>"><?php echo e(__('Register')); ?></a></li>
                    <?php else: ?>
                        <li class="dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    <?php echo e(Auth::user()->firstName . " " .Auth::user()->lastName); ?> <span class="caret"></span>
                                </a>

                                <div class="dropdown-menu" aria-labelledby="navbarDropdown">

                                    <a class="dropdown-item" href="/home/edit" >Edit</a>

                                    <div class="dropdown-divider"></div>
                                    <a class="dropdown-item" href="<?php echo e(route('logout')); ?>"
                                       onclick="event.preventDefault();
                                                    document.getElementById('logout-form').submit();">
                                        <?php echo e(__('Logout')); ?>

                                    </a>

                                    <form id="logout-form" action="<?php echo e(route('logout')); ?>" method="POST" style="display: none;">
                                    </form>
                                </div>
                            </li>
                    <?php endif; ?>
            </ul>
            <!-- /.navbar-top-links -->

            <!-- Side bar -->
            <div class="navbar-default sidebar" role="navigation">
                <div class="sidebar-nav navbar-collapse">
                    <ul class="nav" id="side-menu">
                        <li class="sidebar-search">
                            <div class="input-group custom-search-form">
                                <input type="text" class="form-control" placeholder="Search...">
                                <span class="input-group-btn">
                                <button class="btn btn-default" type="button">
                                    <i class="fa fa-search"></i>
                                </button>
                            </span>
                            </div>
                            <!-- /input-group -->
                        </li>
                        <li <?php echo e((Request::is('/admin') ? 'class="active"' : '')); ?>>
                            <a href="<?php echo e(url ('admin')); ?>"><i class="fa fa-dashboard fa-fw"></i> Dashboard</a>
                        </li>

                        <li <?php echo e((Request::is('*users') ? 'class="active"' : '')); ?>>
                            <a href="<?php echo e(url ('admin/users')); ?>"><i class="fa fa-table fa-fw"></i> Users
                            </a>
                                    <!-- /.nav-second-level -->
                        </li>
                        <li <?php echo e((Request::is('products') ? 'class="active"' : '')); ?>>
                            <a href="<?php echo e(url ('admin/products')); ?>"><i class="fa fa-table fa-fw"></i> Products
                            </a>
                                    <!-- /.nav-second-level -->
                        </li>

                        <li <?php echo e((Request::is('categories') ? 'class="active"' : '')); ?>>
                            <a href="<?php echo e(url ('categories')); ?>"><i class="fa fa-folder fa-fw"></i> Categories
                            </a>
                                    <!-- /.nav-theird-level -->
                        </li>
                        <li <?php echo e((Request::is('orders') ? 'class="active"' : '')); ?>>
                            <a href="<?php echo e(url ('admin/orders')); ?>"><i class="fa fa-folder fa-fw"></i> Orders
                            </a>
                                    <!-- /.nav-theird-level -->
                        </li>
                        <li <?php echo e((Request::is('preparation') ? 'class="active"' : '')); ?>>
                            <a href="<?php echo e(url ('admin/preparation')); ?>"><i class="fa fa-folder fa-fw"></i> Preparation
                            </a>
                                    <!-- /.nav-theird-level -->
                        </li>
                        <li <?php echo e((Request::is('check') ? 'class="active"' : '')); ?>>
                            <a href="<?php echo e(url ('admin/check')); ?>"><i class="fa fa-folder fa-fw"></i> Check
                            </a>
                                    <!-- /.nav-theird-level -->
                        </li>

                    </ul>
                </div>
                <!-- /.sidebar-collapse -->
            </div>
            <!-- /.navbar-static-side -->
        </nav>

        <!-- the content of the page -->
        <div id="page-wrapper">
			       <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header"><?php echo $__env->yieldContent('page_heading'); ?></h1>
                </div>
                <!-- /.col-lg-12 -->
             </div>
			<div class="row">
				<?php echo $__env->yieldContent('section'); ?>

            </div>
            <!-- /#page-wrapper -->
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.plane', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>