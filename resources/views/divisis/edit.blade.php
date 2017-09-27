@extends('layouts.app')
@section('content')
<div class="container">
	<div class="row">
		<div class="col-md-12">
			<ul class="breadcrumb">
				<li><a href="{{ url('/home') }}">Dashboard</a></li>
				<li><a href="{{ url('/admin/divisis') }}">Divisi</a></li>
				<li class="active">Ubah Divisi</li>
			</ul>
			<div class="panel panel-primary">
				<div class="panel-heading">
					<h2 class="panel-title">Ubah Divisi</h2>
				</div>
				<div class="panel-body">
					{!! Form::model($divisi, ['url'=>route('divisis.update', $divisi->id), 'method'=>'put', 'class'=>'form-horizontal']) !!}
					@include('divisis._form')
					{!! Form::close() !!}
				</div>
			</div>
		</div>
	</div>
</div>
@endsection