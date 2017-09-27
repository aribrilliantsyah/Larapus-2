{!! Form::model($model, ['url'=>$form_url, 'method'=>'delete', 'class'=>'form-inline js-confirm', 'data-confirm'=>$confirm_message]) !!}
	<a class="btn btn-warning btn-xs" href="{{ $edit_url }}"><span class="glyphicon glyphicon-edit"></span> Ubah</a> |
	{!! Form::submit('Hapus',['class'=>'btn btn-xs btn-danger']) !!}
{!! Form::close() !!}