@extends('layouts.dashboard')

@section('title','Tableau de bord')
@section('page_heading','Tableau de bord')

@section('section')

            <div class="container-fluid">
                <!-- Start Page Content -->
                <div class="row">
                    <div class="col-md-3">
                        <div class="card p-30">
                            <div class="media">
                                <div class="media-left meida media-middle">
                                    <span><i class="fa fa-usd f-s-40 color-primary"></i></span>
                                </div>
                                <div class="media-body media-text-right">
                                    <h2><div class="counter" data-count="{{$Total_Revenue}}">0</div></h2>
                                    <p class="m-b-0">Total des Revenus</p><br>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="card p-30">
                            <div class="media">
                                <div class="media-left meida media-middle">
                                    <span><i class="fa fa-shopping-cart f-s-40 color-success"></i></span>
                                </div>
                                <div class="media-body media-text-right">
                                    <h2><div class="counter" data-count="{{$Completed_Orders}}">0</div></h2>
                                    <p class="m-b-0">Commandes Complètes</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="card p-30">
                            <div class="media">
                                <div class="media-left meida media-middle">
                                    <span><i class="fa fa-archive f-s-40 color-warning"></i></span>
                                </div>
                                <div class="media-body media-text-right">
                                    <h2><div class="counter" data-count="{{$Total_Products}}">0</div></h2>

                                    <p class="m-b-0">Total des produits</p><br>

                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="card p-30">
                            <div class="media">
                                <div class="media-left meida media-middle">
                                    <span><i class="fa fa-user f-s-40 color-danger"></i></span>
                                </div>
                                <div class="media-body media-text-right">
                                    <h2><div class="counter" data-count="{{$Total_users}}">0</div></h2>
                                    <p class="m-b-0">Nombre Total d'utilisateurs</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-3"></div>
                    <div class="col-md-3">
                        <div class="card p-30">
                            <div class="media">
                                <div class="media-left meida media-middle">
                                    <span><i class="fa fa-shopping-cart f-s-40 color-success"></i></span>
                                </div>
                                <div class="media-body media-text-right">
                                    <h2><div class="counter" data-count="{{$acceptedOrders}}">0</div></h2>
                                    <p class="m-b-0">Commandes Acceptées</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-3">
                        <div class="card p-30">
                            <div class="media">
                                <div class="media-left meida media-middle">
                                    <span><i class="fa fa-shopping-cart f-s-40 color-success"></i></span>
                                </div>
                                <div class="media-body media-text-right">
                                    <h2><div class="counter" data-count="{{$prepOrders}}">0</div></h2>
                                    <p class="m-b-0">Commandes en Prépration</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-3">
                        <div class="card p-30">
                            <div class="media">
                                <div class="media-left meida media-middle">
                                    <span><i class="fa fa-shopping-cart f-s-40 color-success"></i></span>
                                </div>
                                <div class="media-body media-text-right">
                                    <h2><div class="counter" data-count="{{$askedOrders}}">0</div></h2>
                                    <p class="m-b-0">Commandes Gelées</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="bg-white m-l-0 m-r-0 box-shadow ">
                        <div class="card">
                            <div class="card-body">
                                <!-- <h4 class="card-title">Graph</h4> -->
                                {{-- <h4 class="card-title">Revenue cet année</h4> --}}
                                <canvas id="users-chart"></canvas>
                            </div>
                        </div>
                </div>
                <div class="row">
                    <div class="col-lg-4">
                        <div style="padding-top: 0px; position: relative; height:100%; widht:100%;" class="card">
                            <h4><center>Catégories: TOP 5</center></h4>
                            <canvas id="pie-chart"></canvas>
                        </div>
                    </div>

                    <div class="col-lg-8">
                        <div class="card">
                            <div class="card-title">
                            <h4>Dernières commandes</h4>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Nom d'Utilisateur</th>
                                                <th>Total à payer</th>
                                                <th>Status</th>
                                                <th>Plus de détails</th>
                                            </tr>
                                        </thead>
                                        <tbody>

                                            @for($i=0;$i<5;$i++)
                                            <tr>
                                                <td>
                                                    <div class="round-img">
                                                        <a href=""><img src="{{$orders[$i]->user->avatar}}" alt=""></a>
                                                    </div>
                                                </td>
                                                <td>{{$orders[$i]->user->firstName}} {{$orders[$i]->user->lastName}}</td>
                                                <td><span>{{$orders[$i]->total_paid}}</span></td>  

                                                @switch($orders[$i]->state)
                                                @case(0)
                                                    <td><span class="badge badge-warning">En attendant</span></td>
                                                    @break
                                                @case(1)
                                                    <td><span class="badge badge-success">Accéptée</span></td>
                                                    @break
                                                @case(2)
                                                    <td><span class="badge badge-danger">Refusée</span></td>
                                                    @break
                                                @case(3)
                                                    <td><span class="badge badge-info">En préparation</span></td>
                                                    @break
                                                @case(4)
                                                    <td><span class="badge badge-primary">Terminée</span></td>
                                                    @break
                                                @case(5)
                                                    <td><span class="badge badge-default">Suprimée</span></td>
                                                    @break
                                                @case(6)
                                                    <td><span class="badge badge-default">Suprimée</span></td>
                                                    @break
                                                @case(7)
                                                    <td><span class="badge badge-default">Suprimée</span></td>
                                                    @break
                                                @case(8)
                                                    <td><span class="badge badge-warning">En attendant</span></td>
                                                    @break
                                                @endswitch
                                                <td><a href="/facture/{{$orders[$i]->code}}"><span><u>Aller au PDF</u></span></a></td>
                                            </tr>
                                            @endfor




                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <br>
                <div class="row">
                    <div class="col-lg-12   ">
                        <div class="row">
                        <div class="col-lg-5">
                            <div class="card">
                                <div class="card-title">
                                    <h4>Dernières commentaires</h4>
                                </div>
                                <div class="recent-comment">
                                    @foreach ($comments as $comment)
                                    <div class="media">
                                        <div class="media-left">
                                            <img alt="..." src="{{$comment->User->avatar}}" class="media-object">
                                        </div>
                                        <div class="media-body">
                                            <h4 class="media-heading">{{$comment->User->firstName}} {{$comment->User->lastName}}</h4>
                                            <p>{{$comment->body}}</p>
                                            <p class="comment-date">{{$comment->created_at}}</p>
                                        </div>
                                    </div>
                                    @endforeach
                                </div>
                            </div>
                            <!-- /# card -->
                        </div>
                        <!-- /# column -->
                        <div class="col-lg-7">
                            <div class="card">
                                <div class="card-body">
                                    <div class="year-calendar"></div>
                                </div>
                            </div>
                        </div>


                        </div>

                </div>

<script src="{{ asset('js/Chart.min.js') }}"></script>

<script type="text/javascript">

    var names = @json($CategoriesNames); 
    var values = {{json_encode($CategoriesValues)}};

    new Chart(document.getElementById("pie-chart"), {
    type: 'pie',
    data: {
        labels: names,   
      datasets: [{
        label: "Population (millions)",
        backgroundColor: [" #e74c3c ", " #2471a3 "," #1abc9c "," #f1c40f "," #CD5C5C "],
        data: values,
      }]
    },
    options: {
        responsive: true,
    legend: {
        display: true,
        position: 'bottom',

        labels: {
                boxWidth: 20,
                fontSize: 9,
        }
        
    }

    }
});

</script>





<script type="text/javascript">

      var ctxx = document.getElementById('users-chart').getContext('2d');

      var rev = {{json_encode($revenues)}};

      var chart = new Chart(ctxx, {
          // The type of chart we want to create
          type: 'bar',
          // The data for our dataset
          data: {
              labels: ["Janvier", "Février", "Mars", "Avril", "Mai", "Juin", "Juillet","Août","Septembre","Octobre","Novembre","Décembre"],
              datasets: [{
                  label: "Total des Revenus par mois",
                  backgroundColor: [" #e74c3c ", " #2471a3 "," #1abc9c "," #f1c40f "," #2e4053 "," #2ecc71 "," #CD5C5C ", "#85929e"," #e74c3c ", " #2471a3 "," #1abc9c "," #f1c40f "],

                  data: [1965,4453,5348,6546,9200,7668,8884,7689,6200,5500,5800,4900],
                  //data: rev,
              }]
          },
          // Configuration options go here
          options: {
           scales: {
                yAxes: [{
                    display: true,
                    ticks: {
                        suggestedMin: 0,    // minimum will be 0.
                        suggestedMax: 10000,
                    }
                }]
            }
          }




      });
     
</script>

@stop