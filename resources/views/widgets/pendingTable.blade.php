<br>
<div class="card" style="margin: 10px;">
    <div class="card-title">
       <h2 style="text-align: center;">Commandes en attente</h2>
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
                                <th>Outils</th>
                                <th>Status</th>
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
                    <td><button type="button" class="btn btn-success" id="validate{{ $pendingOrder->id }}" onclick="validate('{{ $pendingOrder->id }}','{{ $pendingOrder->state }}')"><i class="fa fa-check"></i></button>
                    <button type="button" class="btn btn-warning" id="refuse{{ $pendingOrder->id }}" onclick="refuse('{{ $pendingOrder->id }}','{{ $pendingOrder->state }}')"><i class="fa fa-times"></i></button>
                    <button type="button" class="btn btn-info" id="ask{{ $pendingOrder->id }}" onclick="ask({{ $pendingOrder->id }})"><i class="fa fa-bell"></i></button>
                    <button class="btn btn-success" type="button" data-toggle="collapse" data-target="#userDetails" aria-expanded="false" aria-controls="userDetails">
                      <i class="fa fa-chevron-circle-down" aria-hidden="true"></i>
                    </button>
                    </td>
                    <td id="outofstock{{ $pendingOrder->id }}">Fine</td>
                    <tr>
                      <div class="collapse" id="userDetails">
                        <div class="card card-body">
                          <dl>
                                <dt class="detailsMenu"> Détails sur l'utilisateur </dt>
                                <dt class="detailsMenu"> Username : </dt>
                                <dd class="detailsMenu"> {{$pendingOrder->user->username}} </dd>
                                <dt class="detailsMenu"> Nom : </dt>
                                <dd class="detailsMenu"> {{$pendingOrder->user->firstName}} </dd>
                                <dt class="detailsMenu"> Prénom : </dt>
                                <dd class="detailsMenu"> {{$pendingOrder->user->lastName}} </dd>
                                <dt class="detailsMenu"> Addresse : </dt>
                                <dd class="detailsMenu"> {{$pendingOrder->user->adr}} </dd>
                                <dt class="detailsMenu"> Tél : </dt>
                                <dd class="detailsMenu"> {{$pendingOrder->user->phoneNum}} </dd>
                                <dt class="detailsMenu"> Groupe : </dt>
                                <dd class="detailsMenu"> {{$pendingOrder->user->groupId}} </dd>
                          </dl> 
                        </div>
                      </div>
                    </tr>
                                </tr>
                                @endforeach 
                        </tbody>
                    </table>
            </div>
        </div>
</div>