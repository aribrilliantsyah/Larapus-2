<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Paket PT.Pindad</title>

<link rel="stylesheet" type="text/css" href="{{ asset('search/styles.css') }}" />
<link rel="shortcut icon" href="{{ asset('assets/img/gt.png') }}">

</head>

<body>

<div id="page">

    <h1><center>Pencarian Paket PT.PINDAD (Persero)</center></h1>
    
    {!! Form::open(['url'=>url('/'), 'method'=>'post', 'class'=>'form-horizontal', 'id'=>'searchForm']) !!}
		<fieldset>
        
           	{!! Form::text('nama',null,['class'=>'form-control','id'=>'s']) !!}
            
           {!! Form::submit('Search', ['id'=>'submitButton']) !!}
            
        </fieldset>
        <p>* Cari Paket Yang Tersedia Berdasarkan Nama</p>
    {!! Form::close() !!}
    <h3><center>Hasil Pencarian ({{$jml}})</center></h3>
    
    	@if($jml == 0)
    	<form id="searchForm">
    	<center>
			<h2> Paket Atas Nama {{ $cari }}</h2>
				
				<br><b>Tidak Tersedia</b><br>
				<p>------------------</p>
		</center>
		</form>
		@endif
	
		@if($jml > 0)
    	@foreach($hasil as $data)
    <form id="searchForm">
    	<center>
			<h2> Paket Atas Nama {{ $data->nama }}</h2>
				{{ $data->divisi }} <br>
				Pengirim : {{$data->pengirim}}<br>
				Tanggal Masuk : {{$data->created_at}}
				<br><b>Belum Diambil</b><br>
				<p>------------------</p>
		</center>
	</form>
		@endforeach
		@endif
    
</div>

<!-- It would be great if you leave the link back to the tutorial. Thanks! -->
 

<script src="{{ asset('search/script.js') }}"></script>
</body>
</html>
					
					