<div class="modal-bg animated fadeIn"></div>
<div class="confir-modal animated jackInTheBox" id="deleteOrderModal">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Deleting an order</h5>
        <button type="button" class="close" onclick="closeConfModal()" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <label>The mistake of who ?</label>
        <div class="radio">
          <label><input type="radio" id="sellerRadio" name="optradio">Seller mistake</label>
        </div>
        <div class="radio">
          <label><input type="radio" id="buyerRadio" name="optradio">Buyer mistake</label>
        </div>
        <label for="cmt">Comment:</label>
        <textarea class="form-control" rows="5" id="commentOrder"></textarea>
        <br>
        <div class="btn btn-warning" onclick="deleteOrders('admin')">Deletee</div>
        <div class="btn btn-info" onclick="closeConfModal()">Close</div>
      </div>

    </div>
    
</div>
<input type="hidden" id="orderid" name="">
<br>
<div class="card" style="margin: 10px;">
    <div class="card-title">
       <h2 style="text-align: center;">Confirm Deleted Orders</h2>
    </div>
         <div class="card-body">
                <div class="table-responsive">
<table id="delOrdersTable" class="table">
    <thead>
        <tr>
            <th>Order ID</th>
            <th>Order Date</th>
            <th>User name</th>
            <th>Total to pay</th>
            <th>Buyer comment</th>
            <th></th>
        </tr>
    </thead>
    <tbody>
        @foreach ($ConfirmDeletedOrders as $delOrder)
            <tr id="{{ $delOrder->id }}">
                <td>{{ $delOrder->id }}</td>
                <td>{{ $delOrder->created_at }}</td>
                <td>{{ $delOrder->user->username }}</td>
                <td>{{ $delOrder->total_paid }}</td>
                <td id="row{{ $delOrder->id }}">
                    <p>
                      <button class="btn btn-success" type="button" data-toggle="collapse" data-target="#userComment" aria-expanded="false" aria-controls="userComment">
                        <i class="fa fa-chevron-circle-down" aria-hidden="true"></i>
                      </button>
                    </p>
                    <div class="collapse" id="userComment">
                      <div class="card card-body">
                        <p>{{ $delOrder->archive($delOrder)->buyercomment }}</p>
                      </div>
                    </div>
                </td>
                <td>
                  <button class="btn btn-warning" onclick="wantdel({{ $delOrder->id }},'admin')">Delete</button>
                  <button type="button" class="btn btn-success" id="" onclick="">Contact {{ $delOrder->user->username }}</button>
                </td>
            </tr>
            @endforeach 
    </tbody>
</table>
</div>
</div>
</div>