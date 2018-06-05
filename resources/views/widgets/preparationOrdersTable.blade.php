<br>
<div class="card" style="margin: 10px;">
    <div class="card-title">
       <h2 style="text-align: center;">Commandes en attente pour préparer</h2>
    </div>
         <div class="card-body">
                <div class="table-responsive">
                    <table id="preparationOrdersTable" class="table">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Date</th>
                                <th>Détails</th>
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
                                    <button type="button" class="btn btn-info" id="details{{ $Order->id }}" onclick="details('{{ $Order->code }}')"><i class="fa fa-list"></i></button>
                                    </td>   
                                    <td>
                                    <button type="button" class="btn btn-success" id="confirm{{ $Order->id }}" onclick="confirm('{{ $Order->id }}','{{ $Order->state }}')"><i class="fa fa-check"></i></button>
                                    </td>
                                </tr>
                                @endforeach 
                        </tbody>
                    </table>
                </div>
        </div>
</div>