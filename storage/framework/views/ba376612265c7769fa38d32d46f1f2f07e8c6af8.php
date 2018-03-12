<?php  /*
Users manager view 
its used to show up the users table
*/
?>

<?php $__env->startSection('page_heading','Users Manager'); ?>
<?php $__env->startSection('section'); ?>
<div class="col-sm-50">	
<div class="row">
	<div class="col-sm-10">
		<?php $__env->startSection('atable_panel_title','Users'); ?>
		<?php $__env->startSection('atable_panel_body'); ?>
		<?php  /*
		i used here a widget table /widget/table.blade.php
		*/
		?>
		<?php echo $__env->make('widgets.table', array('class'=>'table-condensed table-bordered table-striped table table-responsive'), array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
		<?php $__env->stopSection(); ?>
		<?php echo $__env->make('widgets.panel', array('header'=>true, 'as'=>'atable'), array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
	</div>
</div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.dashboard', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>