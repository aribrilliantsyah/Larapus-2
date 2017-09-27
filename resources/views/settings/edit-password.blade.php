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
                          <li><a href="{{url('/home')}}"> Dashboard Admin</a></li>
                          <li class="active">Ubah Password</li>
                        </ol>
                    </div>
                </div>
                
                
                <!-- /. ROW  -->
               
	<div class="row">
		<div class="col-md-12">
			
			<div class="panel panel-default">
			 <div class="panel-heading">
                                Ubah Password
                            </div>
                            <br><br>
				<div class="panel-body">
					{!! Form::open(['url'=>url('/settings/password'),'method'=>'post','class'=>'form-horizontal']) !!}

					<div class="form-group{{ $errors->has('password') ? 'has-error' : '' }}">
						{!! Form::label('password','Password Lama',['class'=>'col-md-4 control-label']) !!}
						<div class="col-md-6">
							{!! Form::password('password',['class'=>'form-control']) !!}
							{!! $errors->first('password','<p class="help-block">:message</p>') !!}
						</div>
					</div>

					<div class="form-group{{ $errors->has('new_password') ? 'has-error' : '' }}">
						{!! Form::label('new_password','Password Baru',['class'=>'col-md-4 control-label']) !!}
						<div class="col-md-6">
							{!! Form::password('new_password',['class'=>'form-control']) !!}
							{!! $errors->first('new_password','<p class="help-block">:message</p>') !!}
						</div>
					</div>

					<div class="form-group{{ $errors->has('new_password_confirmation') ? 'has-error' : '' }}">
						{!! Form::label('new_password_confirmation','Konfirmasi Password Baru',['class'=>'col-md-4 control-label']) !!}
						<div class="col-md-6">
							{!! Form::password('new_password_confirmation',['class'=>'form-control']) !!}
							{!! $errors->first('new_password_confirmation','<p class="help-block">:message</p>') !!}
						</div>
					</div>

					<div class="form-group">
						<div class="col-md-6 col-md-offset-4">
							{!! Form::submit('Simpan', ['class'=>'btn btn-primary pull-right']) !!}
						</div>
					</div>

					{!! Form::close() !!}
				</div>
			</div>
		</div>
	</div>
@endsection

