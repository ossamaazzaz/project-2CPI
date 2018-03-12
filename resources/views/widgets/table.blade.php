<table class="table {{ $class }}">
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
		@foreach ($users as $data)
	   	<tr>
				<td>{{$data->firstName}}</td>
				<td>{{$data->lastName}}</td>
				<td>{{$data->adr}}</td>
				<td>{{$data->email}}</td>
				<td>{{$data->phoneNum}}</td>
				<td><button type="button" class="btn btn-info active">Aprove</button></td>
				<td>Silver</td>
		</tr>
		@endforeach
	</tbody>
</table>
