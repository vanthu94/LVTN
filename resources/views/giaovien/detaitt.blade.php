@extends('giaovien.master')
@section('title','Thêm Đề Tài TT')
@section('content')
<form action="" method="POST" style="width: 650px;">
	<input type="hidden" name="_token" value="{{ csrf_token() }}">
	<fieldset>
		<legend>Thêm Đề Tài</legend>
		<span class="form_label"></span>
		<span class="form_item">
			<input type="submit" name="btnDetaiTTAdd" value="Thêm Đề Tài TT" class="button" />
		</span>
		
	</fieldset>
</form>    
@endsection