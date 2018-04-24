<br>
<center><h1>Pending Orders</h1></center>
<form id="Orders" action="">
    <table id="PendingOrdersTable" class="table {{ $class }}">
        <thead>
            <tr>
                <th>Order ID</th>
                <th>Order Date</th>
                <th>User name</th>
                <th>Total to pay</th>
                <th>State</th>
                <th>Out Of Stock</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($Pending_Orders as $pendingOrder)
                <tr id="{{ $pendingOrder->id }}">
                    <td>{{ $pendingOrder->id }}</td>
                    <td>{{ $pendingOrder->created_at }}</td>
                    <td>{{ $pendingOrder->user->username }}</td>
                    <td>{{ $pendingOrder->total_paid }}</td>
                    <!-- buttons for Accept/Refuse -->
                    <td><button type="button" class="btn btn-success" id="validate{{ $pendingOrder->id }}" onclick="validate('{{ $pendingOrder->id }}','{{ $pendingOrder->state }}')">Validate</button>
                    <button type="button" class="btn btn-warning" id="refuse{{ $pendingOrder->id }}" onclick="refuse('{{ $pendingOrder->id }}','{{ $pendingOrder->state }}')">Refuse</button>
                    </td>
                    <td id="outofstock{{ $pendingOrder->id }}">Fine</td>

                </tr>
                @endforeach 
        </tbody>
    </table>
</form>