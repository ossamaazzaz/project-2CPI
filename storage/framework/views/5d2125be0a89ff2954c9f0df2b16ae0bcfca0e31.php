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
		<?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
	   	<tr>
				<td><?php echo e($data->firstName); ?></td>
				<td><?php echo e($data->lastName); ?></td>
				<td><?php echo e($data->adr); ?></td>
				<td><?php echo e($data->email); ?></td>
				<td><?php echo e($data->phoneNum); ?></td>
				<td><button type="button" class="btn btn-info active">Aprove</button></td>
				<td>Silver</td>
		</tr>
		<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
	</tbody>
</table>
