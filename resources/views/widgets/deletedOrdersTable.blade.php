<br>
<div class="card" style="margin: 10px;">
    <div class="card-title">
       <h2 style="text-align: center;">Commandes Récuperées</h2>
    </div>
<table id="deletedOrdersTable" class="table">
        <thead>
            <tr>
                <th>#</th>
                <th>Date</th>
                <th>Détails</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            @foreach ($dOrders as $Order)
                <tr id="retrieved{{ $Order->id }}">
                    <td>{{ $Order->id }}</td>
                    <td>{{ $Order->created_at }}</td>
                    <td>
                    <button type="button" class="btn btn-info" id="details{{ $Order->id }}" onclick="details('{{ $Order->code }}')"><i class="fa fa-list"></i></button>
                    </td>   
                    <td>
                    <button type="button" class="btn btn-success" id="retrieve{{ $Order->id }}" onclick="Retrieved('{{ $Order->id }}')"><i class="fa fa-reply"></i></button>
                    </td>
                </tr>
                @endforeach 
        </tbody>
    </table>
</div>
