<table class="table {{ $class }}">
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
					<td><button type="button" class="btn btn-info active">{{ $user->approveState }}</button></td>
				</tr>
			@endforeach
		</tbody>
</table>
