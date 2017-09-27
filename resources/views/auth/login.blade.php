@extends('layouts.app')

@section('content')
<div class="login-page">
  <div class="form">
  <h3>PT.PINDAD (PERSERO)</h3>
  <h4>MASUK SEBAGAI ADMIN</h4><br>
    {!! Form::open(['url'=>'login', 'class'=>'login-form']) !!}
    {!! Form::text('npp',null,['placeholder'=>'Nomor Pokok Pegawai']) !!}
    {!! $errors->first('npp','<p class="help-block">:message</p>') !!}
    {!! Form::password('password',['placeholder'=>'Password']) !!}
    {!! $errors->first('password','<p class="help-block">:message</p>') !!}
      <button type="submit" class="btn btn-primary">login</button>
    {!! Form::close() !!}
  </div>
</div>
@endsection