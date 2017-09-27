<a class="btn btn-warning btn-xs" data-toggle="modal" data-target="#Modal{{$modal}}"><span class="glyphicon glyphicon-edit"></span> Ambil</a>

<div id="Modal{{$modal}}" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title text-xs-center">Masukan Nama Pengambil Paket</h4>
            </div>
            <div class="modal-body col-md-7">
                {!! Form::open(['url'=>url('/ambil',$modal), 'method'=>'post', 'files'=>'true','class'=>'form-horizontal']) !!}
                    <div class="form-group{{ $errors->has('pengambil') ? 'has-error' : '' }}">
                        {!! Form::label('pengambil','Nama Pengambil',['class'=>'col-md-5 control-label']) !!}
                        <div class="col-md-7">
                            {!! Form::text('pengambil',null,['class'=>'form-control']) !!}
                            {!! $errors->first('pengambil', '<p class="help-block">:message</p>') !!}
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
