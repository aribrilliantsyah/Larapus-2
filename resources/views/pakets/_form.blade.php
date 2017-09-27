<div class="form-group{{ $errors->has('nama') ? 'has-error' : '' }}">
	{!! Form::label('nama','Nama Penerima',['class'=>'col-md-2 control-label']) !!}
	<div class="col-md-4">
		{!! Form::text('nama',null,['class'=>'form-control']) !!}
		{!! $errors->first('nama', '<p class="help-block">:message</p>') !!}
	</div>
</div>

<div class="form-group{{ $errors->has('divisi_id') ? 'has-error' : '' }}">
	{!! Form::label('divisi_id','Divisi',['class'=>'col-md-2 control-label']) !!}
	<div class="col-md-4">
		{!! Form::select('divisi_id',App\Divisi::pluck('nama','id')->all(),null,['class'=>'js-selectize','placeholder'=>'Pilih Divisi']) !!}
		{!! $errors->first('nama', '<p class="help-block">:message</p>') !!}
	</div>
</div>

<div class="form-group{{ $errors->has('telpon') ? 'has-error' : '' }}">
	{!! Form::label('telpon','Nomor Telepon',['class'=>'col-md-2 control-label']) !!}
	<div class="col-md-4">
		{!! Form::text('telpon',null,['class'=>'form-control']) !!}
		{!! $errors->first('telpon', '<p class="help-block">:message</p>') !!}
	</div>
</div>

<div class="form-group">
	<div class="col-md-4 col-md-offset-2">
		{!! Form::submit('Simpan', ['class'=>'btn btn-primary']) !!}
	</div>
</div>