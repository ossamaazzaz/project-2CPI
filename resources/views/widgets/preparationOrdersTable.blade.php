<br>
<h3>Preparation of Orders</h3>
<table id="preparationOrdersTable" class="table {{ $class }}">
        <thead>
            <tr>
                <th>Order ID</th>
                <th>Order Date</th>
                <th>Details</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            @foreach ($Orders as $Order)
                <tr id="{{ $Order->id }}">
                    <td>{{ $Order->id }}</td>
                    <td>{{ $Order->created_at }}</td>
                    <!-- buttons for Accept/Refuse -->
                    <td>
                    <button type="button" class="btn btn-info" id="details{{ $Order->id }}" onclick="details('{{ $Order->code }}')">Details</button>
                    </td>   
                    <td>
                    <button type="button" class="btn btn-success" id="confirm{{ $Order->id }}" onclick="confirm('{{ $Order->id }}','{{ $Order->state }}')">Confirm</button>
                    </td>
                </tr>
                @endforeach 
        </tbody>
    </table>