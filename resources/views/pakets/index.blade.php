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
                          <li class="active">Penerimaan Paket</li>
                        </ol>
                    </div>
                </div>
               	<div class="row">
                <div class="col-md-12">
                    <!-- Advanced Tables -->
                    <div class="panel panel-default">
                        <div class="panel-heading">
                        
                        	Data Penerimaan Paket
                        <div class="panel-title pull-right">
                        <button type="button" class="btn btn-default btn-sm" data-toggle="modal" data-target="#ModalExample">
                        Tambah Paket Baru
                        </button>
                        </div>
                        </div>
                        <div class="panel-body">
                            
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


<div id="ModalExample" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title text-xs-center">Tambah Data Paket Baru</h4>
            </div>
            <div class="modal-body">
                {!! Form::open(['url'=>route('pakets.store'), 'method'=>'post', 'files'=>'true','class'=>'form-horizontal']) !!}
                    <div class="form-group{{ $errors->has('nama') ? 'has-error' : '' }}">
                        {!! Form::label('nama','Nama Penerima',['class'=>'col-md-4 control-label']) !!}
                        <div class="col-md-7">
                            {!! Form::text('nama',null,['class'=>'form-control']) !!}
                            {!! $errors->first('nama', '<p class="help-block">:message</p>') !!}
                        </div>
                    </div>

                    <div class="form-group{{ $errors->has('pengirim') ? 'has-error' : '' }}">
                        {!! Form::label('pengirim','Nama Pengirim',['class'=>'col-md-4 control-label']) !!}
                        <div class="col-md-7">
                            {!! Form::text('pengirim',null,['class'=>'form-control']) !!}
                            {!! $errors->first('pengirim', '<p class="help-block">:message</p>') !!}
                        </div>
                    </div>

                    <div class="form-group{{ $errors->has('divisi_id') ? 'has-error' : '' }}">
                        {!! Form::label('divisi_id','Divisi',['class'=>'col-md-4 control-label']) !!}
                        <div class="col-md-7">
                            {!! Form::select('divisi_id',App\Divisi::pluck('nama','id')->all(),null,['class'=>'js-selectize','placeholder'=>'Pilih Divisi']) !!}
                            {!! $errors->first('nama', '<p class="help-block">:message</p>') !!}
                        </div>
                    </div>

                    <div class="form-group{{ $errors->has('telpon') ? 'has-error' : '' }}">
                        {!! Form::label('telpon','No.Telepon',['class'=>'col-md-4 control-label']) !!}
                        <div class="col-md-7">
                            {!! Form::text('telpon',null,['class'=>'form-control']) !!}
                            {!! $errors->first('telpon', '<p class="help-block">:message</p>') !!}
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

@section('scripts')
{!! $html->scripts() !!}
@endsection