<table class="table {{ $class }}">
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
		@foreach ($users as $user)
	   		<tr>
	   			<td>{{ $user->username }}</td>
				<td>{{ $user->firstName }}</td>
				<td>{{ $user->lastName }}</td>
				<td>{{ $user->adr }}</td>
				<td>{{ $user->email }}</td>
				<td>{{ $user->phoneNum }}</td>
				<td>{{ $user->idCard }}</td>
				<td>{{ $user->groupId }}</td>
				<td><button type="button" class="btn btn-info active" onclick="approvefun(this,{{ $user->id }},'{{ $user->approveState }}')">{{ $user->approveState }}</button></td>
			</tr>
		@endforeach
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