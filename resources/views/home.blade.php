@extends('template')

@section('content')
      @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

<div class="container" style="">
    <div class="row justify-content-center">
        <div class="col-md-4">
            <div class="card">
                <span class="bg-dark text-white" style="font-size: 14px">
                    Computers  : {{ $computers_count}}
                    <a class="text-white " style="font-size: 10px"href="{{URL::to('computer/create') }}"> New </a>
                </span>
                <span class="bg-light text-dark"  style="font-size: 14px">
                    Last Updated :
                </span>
                @foreach ($latestComputersList as $latestComputer )
                <a style="text-white" class="bg-light text-dark" href="{{URL::to('computer/edit/'.$latestComputer->id)}}"><span style="font-size: 10px">{{$latestComputer->model." | ".$latestComputer->sn." |".$latestComputer->modifiedby->name." | ".$latestComputer->updated_at}}</span></a>
                @endforeach

                <span class="bg-dark text-white" style="font-size: 14px">
                    Monitors : {{ $monitors_count}}
                    <a class="text-white" style="font-size: 10px"href="{{URL::to('computer/create') }}"> New </a>
                </span>
                <span class="bg-light text-dark"  style="font-size: 14px">
                    Last Updated :
                </span>
                @foreach ($latestMonitorsList as $latestMonitor )
                <a style="text-decoration: none" class="bg-light text-dark" href="{{URL::to('#')}}"><span style="font-size: 10px">{{$latestMonitor->model." | ".$latestMonitor->sn." |".$latestMonitor->created_at." | ".$latestMonitor->updated_at}}</span></a>
                @endforeach

                <span class="bg-dark text-white" style="font-size: 14px">
                    Printers  : {{ $printers_count}}
                    <a class="text-white" style="font-size: 10px"href="{{URL::to('computer/create') }}"> New </a>
                </span>
                <span class="bg-light text-dark"  style="font-size: 14px">
                    Last Updated :
                </span>
                @foreach ($latestPrintersList as $latestPrinter )
                <a style="text-decoration: none" class="bg-light text-dark" href="{{URL::to('#')}}"><span style="font-size: 10px">{{$latestPrinter->name." | ".$latestPrinter->sn." |".$latestPrinter->place->name." | ".$latestMonitor->updated_at}}</span></a>
                @endforeach

            </div>
        </div>

        <div class="col-md-4">
            <div class="card">
    <div class="card-header bg-dark text-white"><h5>Layouts : {{ $layouts_count}} <a class="btn btn-outline-light btn-sm" href="{{URL::to('layouts/create') }}">New</a></h5></div>
  <div class="card-header bg-dark text-white"><h5>Printers : {{ $printers_count}} <a class="btn btn-outline-light btn-sm" href="{{URL::to('printers/create') }}">New</a></h5></div>
    <div class="card-header bg-dark text-white"><h5>Parts numbers : {{ $parts_numbers_count}}   <a class="btn btn-outline-light btn-sm"  href="{{URL::to('pn/create') }}">New</a></h5></div>
    <div class="card-header bg-dark text-white"><h5>Print outs : {{ $print_outs_count}} <a class="btn btn-outline-light btn-sm"  href="{{URL::to('print_outs/create') }}"> New</a></h5></div>







            </div>
        </div>
         <div class="col-md-4">
          <div class="card">
           <div class="card-header bg-dark text-white"><h5>Computers : </h5></div>
          <div class="card-header bg-dark text-white"><h5>Monitors : {{ $monitors_count}} <a class="btn btn-outline-light btn-sm" href="{{URL::to('monitor/create') }}"> New </a></h5></div>
           <div class="card-header bg-dark text-white col-md-"><h5>Users : {{ $users_count}} <a class="btn btn-outline-light btn-sm" href="{{URL::to('workers/create') }}"> New </a></h5></div>
 <div class="card-header bg-dark text-white"><h5>Locations : {{ $locations_count}} <a class="btn btn-outline-light btn-sm" href="{{URL::to('location/create') }}"> New </a></h5></div>

             </div>
          </div>
    </div>

</div>

@endsection
