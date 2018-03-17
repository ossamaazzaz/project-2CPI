<form id="products" action="#">
    @csrf
    <button class="btn btn-primary" id="addnew" onclick=window.location='{{ url("admin/products/add") }}'>add new</button>
    <select id="selectList">
        <option id="delete" value="delete">delete</option>
         <option id="compare" value="compare">compare</option>
    </select>
    <input type="submit" id="execute" name="excute" value="Execute">
    <table id="DataTable" class="table {{ $class }}">
        <thead>
            <tr>
                <th><input id="checkboxAll" type="checkbox" value=""></th>
                <th>ID</th>
                <th>Name</th>
                <th>Photo</th>
                <th>Brand</th>
                <th>Price</th>
                <th>Category</th>
                <th>quantity</th>
                <th>quantitySale</th>
                <th>Rate</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($products as $product)
                <tr id="{{ $product->id }}">
                    <td>
                      <input type="checkbox" class="custom-checkbox" value="{{ $product->id }}" value="" onchange="selected(this)">
                    </td>
                    <td class="showTools"> {{ $product->id }}
                        <div class="tools">
                            <button class="fa fa-edit" value="{{ $product->id }}" onclick="edit(this)"></button>
                            <button class="fa fa-times" value="{{ $product->id }}" onclick="deleteOneProduct(this)"></button>
                        </div>
                    </td>
                   
                    <td>{{ $product->name }}</td>
                    <td>image</td>
                    <td>{{ $product->brand }}</td>
                    <td>{{ $product->price }}</td>
                    <td>{{ $product->categoryId }}</td>
                    <td>{{ $product->quantity }}</td>
                    <td>{{ $product->quantitySale }}</td>
                    <td>rate</td>
                </tr>
                @endforeach 
        </tbody>
    </table>
</form>