<?php  /*
this the Dashbaord home view
*/
?>

<?php $__env->startSection('page_heading','Dashboard'); ?>
<?php $__env->startSection('section'); ?>
<i></i>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.dashboard', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>