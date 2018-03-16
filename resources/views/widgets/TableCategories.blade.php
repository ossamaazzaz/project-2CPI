<table class="table {{ $class }}" >
	<thead>
		<tr>
			
			<th>Picture</th>
			<th>Name</th>
			<th>   Id   </th>
			<th>Parent Category</th>
			<th>Description</th>
			<th>Created_at </th>
			<th>Number Of Products</th>
			<th>Edit/QuickEdit/Delete</th>
			
		</tr>
	</thead>
	<tbody>
		@foreach ($categories as $categorie)
	   		<tr>
	   			<td>Picture</td>
				<td>Name</td>
				<td>Id</td>
				<td>Parent Category</td>
				<td>Description</td>
				<td>Created_At</td>
				<td>Number Of Products</td>
				<td>  <button type="button" class="btn btn-danger">Delete</button> 
					  <button type="button" class="btn btn-primary">Edit</button>
					  <button type="button" class="btn">Quick Edit</button>
             	</td>
			</tr>
		@endforeach
	</tbody>
</table>
