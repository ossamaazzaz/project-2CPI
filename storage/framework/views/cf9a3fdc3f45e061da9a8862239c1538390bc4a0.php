<?php $__env->startSection('content'); ?>
<div class="container">
    <div class="row">

        <div class="col-lg-3">

          <h1 class="my-4">Categories</h1>
          <div class="list-group">
            <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cat): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <a onclick="leftcategorylist(this)" id="<?php echo e($cat->id); ?>" class="list-group-item"><?php echo e($cat->name); ?></a>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
          </div>

        </div>
        <!-- /.col-lg-3 -->

        <div class="col-lg-9">

          <div id="carouselExampleIndicators" class="carousel slide my-4" data-ride="carousel">
            <ol class="carousel-indicators">
              <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
              <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
              <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
            </ol>
            <div class="carousel-inner" role="listbox">
              <div class="carousel-item active">
                <img class="d-block img-fluid" src="http://placehold.it/900x350" alt="First slide">
              </div>
              <div class="carousel-item">
                <img class="d-block img-fluid" src="http://placehold.it/900x350" alt="Second slide">
              </div>
              <div class="carousel-item">
                <img class="d-block img-fluid" src="http://placehold.it/900x350" alt="Third slide">
              </div>
            </div>
            <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
              <span class="carousel-control-prev-icon" aria-hidden="true"></span>
              <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
              <span class="carousel-control-next-icon" aria-hidden="true"></span>
              <span class="sr-only">Next</span>
            </a>
          </div>

          <div class="row">
            <?php $__currentLoopData = $result; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $pro): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

            <div class="col-lg-4 col-md-6 mb-4">
              <div class="card h-100">
                <a href="#"><img class="card-img-top" src="<?php echo e($pro->image); ?>" alt=""></a>
                <div class="card-body">
                  <h4 class="card-title">
                    <a href="#"><?php echo e($pro->name); ?></a>
                  </h4>
                  <h5><?php echo e($pro->price); ?> DA</h5>
                  <p class="card-text"><?php echo e($pro->desc); ?></p>
                </div>
                <div class="card-footer">
                  <small class="text-muted">&#9733; &#9733; &#9733; &#9733; &#9734;</small>
                </div>
              </div>
            </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
          </div>
          <!-- /.row -->

        </div>
        <!-- /.col-lg-9 -->

      </div>
      <!-- /.row -->
      <div class="container card">
            <input type="hidden" id="currentPage" value="<?php echo e($currentPage); ?>">
            <input type="hidden" id="lastPage" value="<?php echo e($lastPage); ?>">
             <div class="pagination">
              <a onclick="prePage(<?php echo e($currentPage); ?>)">&laquo;</a>
              <?php for($i = 1;$i<=$lastPage;$i++): ?>
              <a id="<?php echo e('page' . $i); ?>" onclick="page(<?php echo e($i); ?>)"><?php echo e($i); ?></a>
              <?php endfor; ?>
              <a onclick="nexPage(<?php echo e($currentPage); ?>)">&raquo;</a>
            </div> 
          </div>

</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>