@extends('sinhvien.master')
@section('title','Tạo Nhóm')
@section('content')
<form action="" method="POST" style="width: 650px;">
	<input type="hidden" name="_token" value="{{ csrf_token() }}">
	<fieldset>
		<legend>Thông Tin Nhóm</legend>
		<span class="form_label">Tên Nhóm:</span>
		<span class="form_item">
			<input type="text" name="txtTennhom" class="textbox" />
		</span><br />
		<span class="form_label">Số Sinh Viên:</span>
		<span class="form_item">
			<input type="number" name="Sosv" class="textbox" min="1" max="10"/>
		</span><br />
		<span class="form_label">Năm Học:</span>
		<span class="form_item">
			<input type="number" name="namhoc" class="textbox" min="2010"/>
		</span><br />
		<span class="form_label">Học Kì:</span>
		<span class="form_item">
			<input type="number" name="hocki" class="textbox" min="1" max="2"/>
		</span><br />
		<span class="form_label"></span>
		<span class="form_item">
			<input type="submit" name="btnNhom" value="Tạo nhóm" class="button" />
		</span>
	</fieldset>
</form>    
@endsection