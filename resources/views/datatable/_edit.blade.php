{!! Form::model($model, ['url'=>$form_url, 'method'=>'delete', 'class'=>'form-inline js-confirm', 'data-confirm'=>$confirm_message]) !!}
    <a class="btn btn-warning btn-xs" data-toggle="modal" data-target="#Modal{{$modal}}"><span class="glyphicon glyphicon-edit"></span> Ubah</a>
    {!! Form::submit('Hapus',['class'=>'btn btn-xs btn-danger']) !!}
{!! Form::close() !!}

<div id="Modal{{ $modal }}" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title text-xs-center">Edit Data Paket</h4>
            </div>
            <div class="modal-body">
                {!! Form::model($model, ['url'=>route('pakets.update',$modal), 'method'=>'put', 'files'=>'true','class'=>'form-horizontal']) !!}
                    <div class="form-group{{ $errors->has('nama') ? 'has-error' : '' }}">
                        {!! Form::label('nama','Nama Penerima',['class'=>'col-md-5 control-label']) !!}
                        <div class="col-md-7">
                            {!! Form::text('nama',null,['class'=>'form-control']) !!}
                            {!! $errors->first('nama', '<p class="help-block">:message</p>') !!}
                        </div>
                    </div>
                    <br><br>
                    <div class="form-group{{ $errors->has('pengirim') ? 'has-error' : '' }}">
                        {!! Form::label('pengirim','Nama Pengirim',['class'=>'col-md-5 control-label']) !!}
                        <div class="col-md-7">
                            {!! Form::text('pengirim',null,['class'=>'form-control']) !!}
                            {!! $errors->first('pengirim', '<p class="help-block">:message</p>') !!}
                        </div>
                    </div>
                    <br><br>
                    <div class="form-group{{ $errors->has('divisi_id') ? 'has-error' : '' }}">
                        {!! Form::label('divisi_id','Nama Divisi ',['class'=>'col-md-5 control-label']) !!}
                        <div class="col-md-7">
                            {!! Form::select('divisi_id',App\Divisi::pluck('nama','id')->all(),null,['class'=>'js-selectize','placeholder'=>'Pilih Divisi']) !!}
                            {!! $errors->first('divisi_id', '<p class="help-block">:message</p>') !!}
                        </div>
                    </div>
                    <br><br>
                    <div class="form-group{{ $errors->has('telpon') ? 'has-error' : '' }}">
                        {!! Form::label('telpon','No.Telepon',['class'=>'col-md-5 control-label']) !!}
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