<br>
<center><h1>Asked Orders</h1></center>
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
            @foreach ($askedOrders as $order)
                <tr id="{{ $order->id }}">
                    <td>{{ $order->id }}</td>
                    <td>{{ $order->created_at }}</td>
                    <td>{{ $order->user->username }}</td>
                    <td>{{ $order->total_paid }}</td>
                    <td>{{ $order->state }}</td>
                </tr>
                @endforeach 
        </tbody>
    </table>
</form>