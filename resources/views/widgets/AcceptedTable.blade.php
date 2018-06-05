<br>
<div class="card" style="margin: 10px;">
    <div class="card-title">
       <h2 style="text-align: center;">Commandes Acceptées</h2>
    </div>
         <div class="card-body">
                <div class="table-responsive">
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
            @foreach ($Accepted_Orders as $pendingOrder)
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