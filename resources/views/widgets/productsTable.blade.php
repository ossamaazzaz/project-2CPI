<button class="btn btn-primary" id="addnew" onclick="goadd()">add new</button>
<form id="products" action="">
    <select id="selectList">
        <option id="delete" value="delete" selected="selected">delete</option>
         <option id="compare" value="compare">compare</option>
    </select>
    <input type="button" value="execute" id="execute">
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
                      <input type="checkbox" class="custom-checkbox" value="{{ $product->id }}" onchange="selected(this)">
                    </td>
                    <td class="showTools"> {{ $product->id }}
                        <div class="tools">
                            <button type="button" class="fa fa-edit" value="{{ $product->id }}" onclick="edit(this)"></button>
                            <button type="button" class="fa fa-times" value="{{ $product->id }}" onclick="deleteOneProduct(this)"></button>
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