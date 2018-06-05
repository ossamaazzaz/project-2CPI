<br>
<div class="card" style="margin: 10px;">
    <div class="card-title">
       <h2 style="text-align: center;">Commandes Gelées</h2>
    </div>
         <div class="card-body">
                <div class="table-responsive">
                    <form id="Orders" action="">
                        <table id="PendingOrdersTable" class="table">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Date</th>
                                    <th>Username</th>
                                    <th>Total à payer</th>
                                    <th>Status</th>
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