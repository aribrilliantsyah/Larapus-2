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
                          <li class="active">Profil</li>
                        </ol>
                    </div>
                </div>
                
                
                <!-- /. ROW  -->
                
                <div class="row">
                    <div class="col-md-7">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                Profil Pengguna
                            </div>
                            <br><br>
                            <div class="panel-body">
                                
                                <table class="table">
						<tbody>
							<tr>
								<td class="text-muted">Nomor Pokok Pegawai</td>
								<td>{{ auth()->user()->npp }}</td>
							</tr>
							<tr>
								<td class="text-muted">Nama Lengkap</td>
								<td>{{ auth()->user()->name }}</td>
							</tr>
						</tbody>
					</table>
					<a class="btn btn-warning pull-right" data-toggle="modal" data-target="#Modal{{ auth()->user()->id }}"><span class="glyphicon glyphicon-edit"></span> Ubah</a>
					
					
                                
                            </div>
                            
                        </div>
                    </div>
                <div class="row">
		
	</div>


<div id="Modal{{ auth()->user()->id }}" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title text-xs-center">Edit Profil</h4>
            </div>
            <div class="modal-body">
                {!! Form::model(auth()->user(), ['url'=>url('/settings/profile'), 'method'=>'post', 'files'=>'true','class'=>'form-horizontal']) !!}
                    <div class="form-group{{ $errors->has('npp') ? 'has-error' : '' }}">
                        {!! Form::label('npp','NPP',['class'=>'col-md-3 control-label']) !!}
                        <div class="col-md-9">
                            {!! Form::text('npp',null,['class'=>'form-control']) !!}
                            {!! $errors->first('npp', '<p class="help-block">:message</p>') !!}
                        </div>
                    </div>
                    <br><br>
                    <div class="form-group{{ $errors->has('name') ? 'has-error' : '' }}">
                        {!! Form::label('name','Nama Lengkap',['class'=>'col-md-3 control-label']) !!}
                        <div class="col-md-9">
                            {!! Form::text('name',null,['class'=>'form-control']) !!}
                            {!! $errors->first('name', '<p class="help-block">:message</p>') !!}
                        </div>
                    </div>
                    
            </div>
            <div class="modal-footer text-xs-center">
                {!! Form::submit('Simpan', ['class'=>'btn btn-primary']) !!}
                <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
            </div>
            {!! Form::close() !!}
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
@endsection