<form id="users" action="#">
	<table id="usersDataTable" class="table {{ $class }}">
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
					<td><button type="button" class="btn btn-info active" id="{{ $user->id }}" onclick="addApprovedUser(this,{{ $user->id }},'{{ $user->approveState }}')">{{ $user->approveState }}</button></td>
					<td>{{ $user->groupId }}</td>
				</tr>
			@endforeach
		</tbody>
	</table>
	<input type="submit" id="sub" value="Save" class="btn btn-primary">
</form>