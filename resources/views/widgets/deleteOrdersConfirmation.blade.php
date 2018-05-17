<input type="hidden" id="orderid" name="">
<br>
<center><h1>Confirm Deleted Orders</h1></center>
<table id="delOrdersTable" class="table {{ $class }}">
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
                <td>
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
                  <button class="btn btn-warning" data-toggle="modal" data-target="#adminDeleteorderModal" onclick="wantdel({{ $delOrder->id }})">Delete</button>
                  <button type="button" class="btn btn-success" id="" onclick="">Contact {{ $delOrder->user->username }}</button>
                </td>
            </tr>
            @endforeach 
    </tbody>
</table>