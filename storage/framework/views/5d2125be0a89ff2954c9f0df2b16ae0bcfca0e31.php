<table class="table <?php echo e($class); ?>">
		<thead>
			<tr>
				<th>User Name</th>
				<th>First Name</th>
				<th>Last Name</th>
				<th>Address</th>
				<th>Email</th>
				<th>Phone number</th>
				<th>Card Id</th>
				<th>Group</th>
				<th>State</th>
			</tr>
		</thead>
		<tbody> 
			<?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
				<tr>
					<td><?php echo e($user->username); ?></td>
					<td><?php echo e($user->firstName); ?></td>
					<td><?php echo e($user->lastName); ?></td>
					<td><?php echo e($user->adr); ?></td>
					<td><?php echo e($user->email); ?></td>
					<td><?php echo e($user->phoneNum); ?></td>
					<td><?php echo e($user->idCard); ?></td>
					<td><?php echo e($user->groupId); ?></td>
					<td><button type="button" class="btn btn-info active"><?php echo e($user->approveState); ?></button></td>
				</tr>
			<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
		</tbody>
</table>
