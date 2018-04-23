<br>
<center><h1>Accpeted Orders</h1></center>
<form id="Orders" action="">
    <select id="selectList">
        <option id="delete" value="delete" selected="selected">delete</option>
        <option id="compare" value="compare">compare</option>
    </select>
    <input type="button" value="execute" id="execute">
    <table id="PendingOrdersTable" class="table {{ $class }}">
        <thead>
            <tr>
                <th><input id="checkboxAll" type="checkbox" value=""></th>
                <th>Order ID</th>
                <th>Order Date</th>
                <th>User name</th>
                <th>Total to pay</th>
                <th>State</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($Accepted_Orders as $pendingOrder)
                <tr id="{{ $pendingOrder->id }}">
                    <td>
                      <input type="checkbox" class="custom-checkbox" value="{{ $pendingOrder->id }}" onchange="selected(this)">
                    </td>
                  
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