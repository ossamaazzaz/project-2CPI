<table class="table {{ $class $users }}">
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
			@foreach ($users as $user)
				<tr>
					<td>{{ $user }}</td>
					<td></td>
					<td></td>
					<td></td>
					<td></td>
					<td></td>
					<td></td>
				</tr>
			@endforeach
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
