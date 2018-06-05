<br>
<div class="card" style="margin: 10px;">
                <div class="card-title">
                    <h2 style="text-align: center;">Utilisateurs en attente</h2>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="usersDataTable" class="table">
                            <thead>
                                <tr>
                                    <th>Avatar</th>
                                    <th>Username</th>
                                    <th>Nom</th>
                                    <th>Prénom</th>
                                    <th>Adresse</th>
                                    <th>Email</th>
                                    <th>Tél</th>
                                    <th>Carte ID</th>
                                    <th>Status</th>
                                    <th>Outils</th>
                                </tr>
                            </thead>
                            <tbody>
                            	@foreach ($users as $user)
                            		@if($user->approveState == "pending")
                                    <tr>
                                        <td>
                                            <div class="round-img">
                                                <img src="{{ $user->avatar }}" alt="">
                                            </div>
                                        </td>
                                        <td>{{ $user->username }}</td>
										<td>{{ $user->firstName }}</td>
										<td>{{ $user->lastName }}</td>
										<td>{{ $user->adr }}</td>
										<td>{{ $user->email }}</td>
										<td>{{ $user->phoneNum }}</td>
										<td>{{ $user->idCard }}</td>
                                        <td><span class="badge badge-danger">En Attente</span></td>
                                        <td class="users-tools">
                                            <button class="btn btn-info active" id="{{ $user->id }}" onclick="addApprovedUser(this,{{ $user->id }},'{{ $user->approveState }}')">
                                                <i class="fa fa-calendar-check-o"></i>
                                            </button>
                                            <button  class="btn btn-danger" id="delete{{ $user->id }}" onclick="deleteUser({{$user->id}})">
                                                <i class="fa fa-times"></i>
                                            </button>
                                        </td>
                                    </tr>
                                    @endif
                                @endforeach

                            </tbody>
                        </table>
                        <br>
                    	<input type="submit" id="sub" value=" Save " class="btn btn-primary">
                </div>
        </div>
</div>
<br>
<div class="card" style="margin: 10px;">
                <div class="card-title">
                    <h2 style="text-align: center;">Utilisateurs Acceptés</h2>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="usersDataTable" class="table">
                            <thead>
                                <tr>
                                    <th>Avatar</th>
                                    <th>Username</th>
                                    <th>Nom</th>
                                    <th>Prénom</th>
                                    <th>Adresse</th>
                                    <th>Email</th>
                                    <th>Tél</th>
                                    <th>Carte ID</th>
                                    <th>Status</th>
                                    <th>Outils</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($users as $user)
                                	@if($user->approveState == "Approved")
                                    <tr>
                                        <td>
                                            <div class="round-img">
                                                <img src="{{ $user->avatar }}" alt="">
                                            </div>
                                        </td>
                                        <td>{{ $user->username }}</td>
										<td>{{ $user->firstName }}</td>
										<td>{{ $user->lastName }}</td>
										<td>{{ $user->adr }}</td>
										<td>{{ $user->email }}</td>
										<td>{{ $user->phoneNum }}</td>
										<td>{{ $user->idCard }}</td>
                                        <td><span class="badge badge-success">Accepté</span></td>
                                        <td class="users-tools">
                                            <button  class="btn btn-danger" id="delete{{ $user->id }}" onclick="deleteUser({{$user->id}})">
                                                <i class="fa fa-times"></i>
                                            </button>
                                        </td>
                                    </tr>
                                    @endif
                                @endforeach


                            </tbody>
                        </table>
                        <br>
                        <input type="submit" id="sub" value=" Save " class="btn btn-primary">
                    </div>
                </div>
</div>