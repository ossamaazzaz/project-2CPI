<div class="panel panel-<?php echo e(isset($class) ? $class : 'default'); ?>">
	<?php if( isset($header)): ?>  
		<div class="panel-heading">
		<h3 class="panel-title"><?php echo $__env->yieldContent($as . '_panel_title'); ?>
		<?php if( isset($controls)): ?>  
	<div class="panel-control pull-right">
		<a class="panelButton"><i class="fa fa-refresh"></i></a>
		<a class="panelButton"><i class="fa fa-minus"></i></a>
		<a class="panelButton"><i class="fa fa-remove"></i></a>
	</div>
	<?php endif; ?>
	</h3>
	
	</div>
	<?php endif; ?>
	
	<div class="panel-body">
		<?php echo $__env->yieldContent($as . '_panel_body'); ?>
	</div>
	<?php if( isset($footer)): ?>
		<div class="panel-footer"><?php echo $__env->yieldContent($as . '_panel_footer'); ?></div>
	<?php endif; ?>
</div>

