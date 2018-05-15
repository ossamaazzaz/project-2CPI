<br>
<div class="card" style="margin: 10px;">
    <div class="card-title">
       <h2 style="text-align: center;">Users</h2>
    </div>
	<table id="usersDataTable" class="table">
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
				<th></th>
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
					<td><button type="button" class="btn btn-danger" id="delete<?php echo e($user->id); ?>" onclick="deleteUser(<?php echo e($user->id); ?>)">Delete</button></td>
				</tr>
			<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
		</tbody>
	</table>
	<input type="submit" id="sub" value="Save" class="btn btn-primary">
          </div>
    </div>
</div>