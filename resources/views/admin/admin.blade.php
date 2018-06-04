@extends('layouts.dashboard')


@section('page_heading','Dashboard')

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
                                    <p class="m-b-0">Total Revenue</p>
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
                                    <p class="m-b-0">Completed orders</p>
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
                                    <p class="m-b-0">Produits</p>
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
                                    <p class="m-b-0">Utilisateur</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="bg-white m-l-0 m-r-0 box-shadow ">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">Revenue cet année</h4>
                                <canvas id="users-chart"></canvas>
                            </div>
                        </div>
                </div>
                <div class="row">
                    <div class="col-lg-4">
                        <div style="padding-top: 0px; position: relative;" class="card">
                            <h4><center>TOP 5 Categories</center></h4>
                            <canvas id="pie-chart"></canvas>
                        </div>
                    </div>

                    <div class="col-lg-8">
                        <div class="card">
                            <div class="card-title">
                            <h4>Recent Orders </h4>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Client Name</th>
                                                <th>Total to pay</th>
                                                <th>State</th>
                                                <th>More details</th>
                                            </tr>
                                        </thead>
                                        <tbody>

                                            @foreach ($orders as $order)
                                            <tr>
                                                <td>
                                                    <div class="round-img">
                                                        <a href=""><img src="{{$order->user->avatar}}" alt=""></a>
                                                    </div>
                                                </td>
                                                <td>{{$order->user->firstName}} {{$order->user->lastName}}</td>
                                                <td><span>{{$order->total_paid}}</span></td>  
                                                @if($order->state == 0)
                                                    <td><span class="badge badge-success">pending</span></td>
                                                @else
                                                    @if($order->state == 1)
                                                        <td><span class="badge badge-success">Accepted</span></td>
                                                    @else
                                                        <td><span class="badge badge-danger">Refused</span></td>
                                                    @endif
                                                @endif

                                                <td><a href="/facture/{{$order->code}}"><span><u>Go to PDF</u></span></a></td>
                                            </tr>
                                            @endforeach




                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-lg-12   ">
                        <div class="row">
                        <div class="col-lg-5">
                            <div class="card">
                                <div class="card-title">
                                    <h4>Recent comments </h4>
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
                  label: "Total Revenue of this month",
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