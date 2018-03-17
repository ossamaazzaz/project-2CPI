<form id="users" action="#">
	<?php echo csrf_field(); ?>
	<table id="productsTable" class="table <?php echo e($class); ?>">
		<thead>
			<tr>
				<th>User Name</th>
				<th>First Name</th>
				<th>Last Name</th>
				<th>Address</th>
				<th>Email</th>
				<th>Phone Number</th>
				<th>Card Id</th>
				<th>State</th>
				<th>Group</th>
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
					<td><button type="button" class="btn btn-info active" id="<?php echo e($user->id); ?>" onclick="addApprovedUser(this,<?php echo e($user->id); ?>,'<?php echo e($user->approveState); ?>')"><?php echo e($user->approveState); ?></button></td>
					<td><?php echo e($user->groupId); ?></td>
				</tr>
			<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
		</tbody>
	</table>
	<input type="submit" id="sub" value="Save" class="btn btn-primary">
</form>