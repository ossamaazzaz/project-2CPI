<div class="modal-bg animated fadeIn"></div>
<div class="confir-modal animated jackInTheBox" id="myDiv">
    <div class="confir-modal-text">
        <span class="close-confmodal" onclick="closeConfModal()">&times;</span>
        Are you sure ?
    </div>
    <div class="btn yes" onclick="deleteOneProduct()">yes,i'm sure</div>
    <div class="btn no" onclick="closeConfModal()">no</div>
</div>
<div class="card">
<div id="products" class="container">
    <button class="btn btn-primary" id="addnew" style="max-width: 150px;display: inline;" onclick="goadd()">add new product</button>  
    <button type="button" class="btn btn-danger" style="max-width: 100px;display: inline;" id="delete">delete all</button>
    <input type="hidden" id="productid">
    <div class="table-responsive">
    <table id="productsDataTable" class="table">
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
                <th>Tools</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($products as $product)
                <tr id="{{ $product->id }}">
                    <td>
                      <input type="checkbox" class="custom-checkbox" value="{{ $product->id }}" onchange="selected(this)">
                    </td>
                    <td>{{ $product->id }}</td>
                    <td>{{ $product->name }}</td>
                    <td><img src="{{ $product->image }}" width="50px"></td>
                    <td>{{ $product->brand }}</td>
                    <td>{{ $product->price }}</td>
                    <td>{{ $product->categoryId }}</td>
                    <td>{{ $product->quantity }}</td>
                    <td>{{ $product->quantitySale }}</td>
                    <td>{{ $product->productDetails->rating }}</td>
                    <td class="showTools">
                            <button type="button" class="btn btn-primary" value="{{ $product->id }}" onclick="edit(this)"><i class="fa fa-edit"></i></button>
                            <button type="button" class="btn btn-danger" value="{{ $product->id }}" onclick="showConfModal('{{ $product->id }}')"><i class="fa fa-times"></i></button>
                    </td>
                </tr>
                @endforeach 
        </tbody>
    </table>
</div>
</div>  
</div>
