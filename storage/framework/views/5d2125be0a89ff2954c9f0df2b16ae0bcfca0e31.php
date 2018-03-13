<table class="table <?php echo e($class); ?>">
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
				<td><?php echo e($user->groupId); ?></td>
				<td><button type="button" class="btn btn-info active" onclick="approvefun(this,<?php echo e($user->id); ?>,'<?php echo e($user->approveState); ?>')"><?php echo e($user->approveState); ?></button></td>
			</tr>
		<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
	</tbody>
</table>
<button type="submit" class="btn btn-primary" onclick="save()" name="Save">Save</button>
<script>
var approvedUsers = [];
function approvefun(id,userId,userState) {
	if ( userState == 'pending' && !approvedUsers.includes(userId)) {
		id.innerHTML = "Approved";
    	approvedUsers.push(userId);
    	console.log(approvedUsers);
	}
}
function save(){
	console.log("saved");
	var jsonString = JSON.stringify(approvedUsers);
	   $.ajax({
        type: "POST",
        url: "users",
        data: {data : jsonString}, 
        cache: false,

        success: function(){
            alert("OK");
        }
    });
}
</script>