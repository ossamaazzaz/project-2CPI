<br>
<center><h1>Refused Orders</h1></center>
<form id="Orders" action="">
    <table id="PendingOrdersTable" class="table {{ $class }}">
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
</form>