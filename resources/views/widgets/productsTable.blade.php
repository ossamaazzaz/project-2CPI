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

<button class="btn btn-primary" id="addnew" onclick="goadd()">add new</button>
<form id="products" action="">
    <select id="selectList">
        <option id="delete" value="delete" selected="selected">delete</option>
         <option id="compare" value="compare">compare</option>
    </select>
    <input type="button" value="execute" id="execute">
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
                            <button type="button" class="fa fa-times" value="{{ $product->id }}" onclick="showConfModal('{{ $product->id }}')"></button>
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
</div>
</form>  
</div>
