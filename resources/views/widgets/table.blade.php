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
				<td><button type="button" class="btn btn-info active" onclick="Aprove(this)" >Aprove</button></td>
				<td>Silver</td>
		</tr>
		@endforeach
	</tbody>
</table>
<script type="text/javascript">
	function Aprove(button) {
		if(button.innerHTML =='Aproved' ){
			button.innerHTML = 'Pending';
		}else{
			button.innerHTML = 'Aproved';
		}
		// body...
	}
</script>
