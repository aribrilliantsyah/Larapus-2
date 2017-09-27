@extends('layouts.tema')
@section('panel')

                    <li>
                        <a href="{{ url('/home') }}"><i class="fa fa-dashboard"></i> Dashboard</a>
                    </li>
                    <li>
                        <a class="active-menu" href="{{ route('pakets.index') }}"><i class="fa fa-arrow-down"></i> Penerimaan Paket</a>
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
                          <li>Penerimaan Paket</li>
                          <li class="active">Edit Data Paket</li>
                        </ol>
                    </div>
                </div>
			<div class="panel panel-default">
				<div class="panel-heading">
					<h2 class="panel-title">Edit Data Paket</h2>
				</div>
				<hr>
				<div class="panel-body">
					{!! Form::model($paket, ['url'=>route('pakets.update', $paket->id), 'method'=>'put', 'files'=>'true','class'=>'form-horizontal']) !!}
					@include('pakets._form')
					{!! Form::close() !!}
				</div>
			</div>
		</div>
	</div>
</div>
@endsection