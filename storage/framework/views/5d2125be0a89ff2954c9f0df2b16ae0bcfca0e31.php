<form method="POST" action="<?php echo e(action('UsersController@users')); ?>">
	<table class="table <?php echo e($class); ?>">
		<thead>
			<tr>
				<th>First Name</th>
				<th>Last Name</th>
				<th>Address</th>
				<th>Email</th>
				<th>Phone Number</th>
				<th>State</th>
				<th>Group</th>
			</tr>
		</thead>
		<tbody> 
			<?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
				<tr>
					<td><?php echo e($user); ?></td>
					<td></td>
					<td></td>
					<td></td>
					<td></td>
					<td></td>
					<td></td>
				</tr>
			<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
			<tr>
				<td>John</td>
				<td>big head</td>
				<td>London, UK</td>
				<td>john@gmail.com</td>
				<td>7468327676732</td>
				<td><button type="button" class="btn btn-info active">Aprove</button></td>
				<td>Silver</td>
			</tr>
			<tr>
				<td>John</td>
				<td>big head</td>
				<td>London, UK</td>
				<td>john@gmail.com</td>
				<td>7468327676732</td>
				<td><button type="button" class="btn btn-info disabled">Aproved</button></td>
				<td>Gold</td>
			</tr>
		</tbody>
	</table>
</form>