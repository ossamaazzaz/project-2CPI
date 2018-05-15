<br>
<div class="card" style="margin: 10px;">
    <div class="card-title">
       <h2 style="text-align: center;">Refused Orders</h2>
    </div>
         <div class="card-body">
                <div class="table-responsive">
    <table id="PendingOrdersTable" class="table">
        <thead>
            <tr>
                <th>Order ID</th>
                <th>Order Date</th>
                <th>User name</th>
                <th>Total to pay</th>
                <th>State</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($Refused_Orders as $pendingOrder)
                <tr id="{{ $pendingOrder->id }}">
                    <td>{{ $pendingOrder->id }}</td>
                    <td>{{ $pendingOrder->created_at }}</td>
                    <td>{{ $pendingOrder->user->username }}</td>
                    <td>{{ $pendingOrder->total_paid }}</td>
                    <td>{{ $pendingOrder->state }}</td>
                </tr>
                @endforeach 
        </tbody>
    </table>
            </div>
        </div>
</div>