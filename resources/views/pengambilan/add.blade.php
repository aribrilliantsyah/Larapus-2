@extends('layouts.tema')
@section('panel')

                    <li>
                        <a href="{{ url('/home') }}"><i class="fa fa-dashboard"></i> Dashboard</a>
                    </li>
                    <li>
                        <a href="{{ route('pakets.index') }}"><i class="fa fa-arrow-down"></i> Penerimaan Paket</a>
                    </li>
                    <li>
                        <a class="active-menu" href="{{ route('pengambilan.index') }}"><i class="fa fa-arrow-up"></i> Pengambilan Paket</a>
                    </li>
                    <li>
                        <a href="{{ route('rincian.index') }}"><i class="fa fa-bars"></i> Rincian</a>
                    </li>

@endsection
@section('content')

                <div class="row">
                    <div class="col-md-12">
                        <ol class="breadcrumb">
                          <li class="active">Pengambilan Paket</li>
                        </ol>
                    </div>
                </div>
               	<div class="row">
                <div class="col-md-12">
                    <!-- Advanced Tables -->
                    <div class="panel panel-default">
                        <div class="panel-heading">
                        
                        	Data Pengambilan Paket
                       
                        </div>
                        <div class="panel-body">
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    Masukan Nama Pengambil
                                </div>
                            </div>
                            
							<div class="row">
                
                        <div class="panel-body">
                           {!! $html->table(['class'=>'table-striped']) !!}
                        </div>
                    </div>
                    <!--End Advanced Tables -->
                </div>
            </div>
                            
                        </div>
                    </div>
                    <!--End Advanced Tables -->
                </div>
            </div>

            </div>
			

@endsection

@section('scripts')
{!! $html->scripts() !!}
@endsection