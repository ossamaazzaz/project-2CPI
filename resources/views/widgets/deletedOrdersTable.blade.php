<br>
<h3>Retrieve Orders</h3>
<table id="deletedOrdersTable" class="table">
        <thead>
            <tr>
                <th>Order ID</th>
                <th>Order Date</th>
                <th>Details</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            @foreach ($dOrders as $Order)
                <tr id="retrieved{{ $Order->id }}">
                    <td>{{ $Order->id }}</td>
                    <td>{{ $Order->created_at }}</td>
                    <td>
                    <button type="button" class="btn btn-info" id="details{{ $Order->id }}" onclick="details('{{ $Order->code }}')">Details</button>
                    </td>   
                    <td>
                    <button type="button" class="btn btn-success" id="retrieve{{ $Order->id }}" onclick="Retrieved('{{ $Order->id }}')">Retrieved</button>
                    </td>
                </tr>
                @endforeach 
        </tbody>
    </table>