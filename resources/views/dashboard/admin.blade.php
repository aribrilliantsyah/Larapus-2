@extends('layouts.tema')
@section('panel')

                    <li>
                        <a class="active-menu" href="{{ url('/home') }}"><i class="fa fa-dashboard"></i> Dashboard</a>
                    </li>
                    <li>
                        <a href="{{ route('pakets.index') }}"><i class="fa fa-arrow-down"></i> Penerimaan Paket</a>
                    </li>
                    <li>
                        <a href="{{ route('pengambilan.index') }}"><i class="fa fa-arrow-up"></i> Pengambilan Paket</a>
                    </li>
                    <li>
                        <a href="{{ route('rincian.index') }}"><i class="fa fa-bars"></i> Rincian</a>
                    </li>

@endsection
@section('content')

                <div class="row">
                    <div class="col-md-12">
                        <ol class="breadcrumb">
                          <li class="active">Dashboard Admin</li>
                        </ol>
                    </div>
                </div>
                {!! Charts::styles() !!}
                
                
                <!-- /. ROW  -->
                

                <div class="row">
                    <div class="col-md-6 col-sm-12 col-xs-12">
                        <div class="panel panel-primary text-center no-boder bg-color-blue blue">
                            <div class="panel-left pull-left blue">
                                <i class="fa fa-bar-chart-o fa-5x"></i>
                                
                            </div>
                            <div class="panel-right pull-right">
                                <h3>{{$total}}</h3>
                               <strong> Total Paket</strong>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-sm-12 col-xs-12">
                        <div class="panel panel-primary text-center no-boder bg-color-red red">
                              <div class="panel-left pull-left red">
                                <i class="fa fa-shopping-cart fa-5x"></i>
                                </div>
                                
                            <div class="panel-right pull-right">
                            <h3>{{$ambil}} </h3>
                               <strong> Belum Diambil</strong>

                            </div>
                        </div>
                    </div>
                    
                </div>
                
                 <div class="row">
                    <div class="col-md-12">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                Donut Chart
                            </div>
                            
                            <div class="panel-body">
                                
                                    {!! $chart->html() !!}
                                
                            </div>
                            {!! Charts::scripts() !!}
                            {!! $chart->script() !!}
                            {!! $line->script() !!}
                        </div>
                    </div>

                </div>
                
                <div class="row">
                <div class="col-md-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Line Chart
                        </div>
                        <div class="panel-body">
                            {!! $line->html() !!}
                        </div>
                    </div>  
                    </div>      
                </div> 
                
            
       
                
               
               

       
                
                
                
                

            </div>
@endsection