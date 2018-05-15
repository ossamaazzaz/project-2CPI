<br>
<div class="card" style="margin: 10px;">
    <div class="card-title">
       <h2 style="text-align: center;">Pending Orders</h2>
    </div>
         <div class="card-body">
                <div class="table-responsive">
                    <table id="PendingOrdersTable" class="table">
                        <thead>
                            <tr>
                                <th>Order ID</th>
                                <th>Order Date</th>
                                <th>User name</th>
                                <th>Total to pay</th>
                                <th>State</th>
                                <th>Out Of Stock</th>
                                <th>Details</th>
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
                    <button type="button" class="btn btn-info" id="ask{{ $pendingOrder->id }}" onclick="ask({{ $pendingOrder->id }})">Ask</button>
                    </td>
                    <td id="outofstock{{ $pendingOrder->id }}">Fine</td>
                    <td>
                        <p>
                          <button class="btn btn-success" type="button" data-toggle="collapse" data-target="#userDetails" aria-expanded="false" aria-controls="userDetails">
                            <i class="fa fa-chevron-circle-down" aria-hidden="true"></i>
                          </button>
                        </p>
                        <div class="collapse" id="userDetails">
                          <div class="card card-body">
                            <dl>
                                  <dt>User Name :</dt>
                                  <dd>- {{$pendingOrder->user->username}}</dd>
                                  <dt>Family Name :</dt>
                                  <dd>- {{$pendingOrder->user->firstName}}</dd>
                                  <dt>First Name :</dt>
                                  <dd>- {{$pendingOrder->user->lastName}}</dd>
                                  <dt>Address :</dt>
                                  <dd>- {{$pendingOrder->user->adr}}</dd>
                                  <dt>Phone Number :</dt>
                                  <dd>- {{$pendingOrder->user->phoneNum}}</dd>
                                  <dt>Group :</dt>
                                  <dd>- {{$pendingOrder->user->groupId}}</dd>
                            </dl> 
                          </div>
                        </div>
                    </td>
                                </tr>
                                @endforeach 
                        </tbody>
                    </table>
            </div>
        </div>
</div>