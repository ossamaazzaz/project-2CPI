<br>
<div class="card" style="margin: 10px;">
    <div class="card-title">
       <h2 style="text-align: center;">Asked Orders</h2>
    </div>
         <div class="card-body">
                <div class="table-responsive">
                    <form id="Orders" action="">
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
                </div>
            </div>
        </div>