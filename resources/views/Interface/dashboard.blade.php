  @extends('layouts.app')
  @section('content')
<div>
<script src="{{ asset('js/dashboard.js')}}"></script>
<script src="https://cdn.jsdelivr.net/npm/fullcalendar@5.7.2/main.min.js"></script>
<link href="{{ asset('css/dashboard.css')}}" rel="stylesheet">
<link href="https://cdn.jsdelivr.net/npm/fullcalendar@5.7.2/main.min.css" rel="stylesheet">
  @if(session('profile_edit'))
    <p class="text-yellow-500">{{session('profile_edit')}}</p>
  @endif
  <div id="dashboard"  class="m-12 flex justify-center">
  <div class="flex flex-col flex justify-center text-center w-full gap-y-40 gap-x-32 place-content-between grid xl:grid-cols-3 mr-10 md:grid-cols-1 sm:grid-cols-1 m-1">
    <div id="total_users" class="bg-green-400 shadow-lg border-4 border-gray-900">
    <p class="text-4xl font-bold ml-6 mr-6 mt-6">Total Users</p><br>
    <p class="text-4xl text-shadow-xl mb-16">{{$user->count()}}</p>
    </div>
    <div id="chartjs">
    <canvas id="myChart" class="w-full"></canvas>
    </div>
    <div id="recent_users" class="bg-yellow-500 shadow-lg border-4 border-gray-900 flex flex-col flex justify-center">
    <p class="text-4xl font-bold pl-6 pr-6 pt-6">Recent Users</p><br>
    <div class="overflow-auto h-20">
  @foreach($userslastactive as $userlastactive)
      @if(Carbon\Carbon::parse($userlastactive->last_active)->diffInMinutes() <= 30)
      <p class="text-shadow-xl text-black" id="active_users">{{$userlastactive->name}}</p>
      @else
      @endif
  @endforeach
  </div>
    </div>
    <div id="total_users" class="bg-green-400  shadow-lg border-4 border-gray-900">
    <p class="text-4xl font-bold ml-6 mr-6 mt-6">Latest Book Published</p><br>
    @if(empty($latestbook->Title_of_Book))
    <p class="text-shadow-xl mb-16">Empty</p>
    @else
    <p class="text-shadow-xl mb-16">{{$latestbook->Title_of_Book}}</p>
    @endif
    </div>
    <div id='calendar' class="w-full mr-72 h-52"></div>
    <div id="total_users" class="bg-yellow-500 shadow-lg border-4 border-gray-900">
    <p class="text-4xl font-bold ml-6 mr-6 mt-6">Total Books</p><br>
    <p class="text-4xl text-shadow-xl mb-16">{{$totalbooks->count()}}</p>
    </div>
          </div>
      </div>
  </div>
  <script>
var myChart1 = document.getElementById('myChart').getContext('2d');
var barChart = new Chart(myChart1, {
    type: 'bar',
    data: {
        labels:['Male','Female'],
        datasets:[
            {
                label: 'Total of Gender',
                data:[
                  '{{count($countgenderM)}}',
                  '{{count($countgenderF)}}'
                    
                ],
                backgroundColor:[
                  'rgba(0, 132, 255)',
                  'pink'
                ]
            }
        ]
        },
    options: {},
});
</script>
@endsection