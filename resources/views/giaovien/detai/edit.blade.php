@extends('giaovien.master')
@section('title','Sửa')
@section('content')
<form action="" method="POST" style="width: 650px;">
	<input type="hidden" name="_token" value="{{ csrf_token() }}">
	<fieldset>
		<legend>Sửa thông tin đề tài</legend>
		<span class="form_label">Tên Đề tài:</span>
		<span class="form_item">
			<input type="text" name="txtTendt" class="textbox" />
		</span><br />
		<span class="form_label">Số Sinh Viên:</span>
		<span class="form_item">
			<input type="number" name="sosv" class="textbox" />
		</span><br />
		<span class="form_label">Thời Gian Bắt Đầu:</span>
		<span class="form_item">
			<input type="date" name="Tgbd" class="textbox" />
		</span><br />
		<span class="form_label">Thời Gian Kết Thúc:</span>
		<span class="form_item">
			<input type="date" name="Tgkt" class="textbox" />
		</span><br />
		<span class="form_label">Yêu Cầu:</span>
		<span class="form_item">
			<textarea name="txtYeucau" class="textbox" rows="5" cols="50"></textarea>
		</span><br />
		<span class="form_label">Nội Dung:</span>
		<span class="form_item">
			<textarea name="txtNoidung" class="textbox" rows="5" cols="50"></textarea>
		</span><br />
		{{-- <span class="form_label">Trạng thái đề tài:</span>
		<span class="form_item">
			<input type="number" name="rdoStatusdt" class="textbox" value="{!! $data['statusdt'] !!}" disabled/>
		</span><br /> --}}
		<span class="form_label">Trạng thái Đề tài:</span>
		<span class="form_item">
			<input type="radio" name="rdoStatusdt" value="{!! $data['statusdt'] !!}" checked="checked"
			@if ($data['statusdt'] == 0)
				checked
			@endif
			 disabled/> Chưa đăng kí 
			<input type="radio" name="rdoStatusdt" value="{!! $data['statusdt'] !!}"  
			@if ($data['statusdt'] == 1)
				checked
			@endif
			disabled/> Đã đăng kí
		</span><br />
		<span class="form_label"></span>
		<span class="form_item">
			<input type="submit" name="btnDetaiAdd" value="Xác Nhận" class="button" />
		</span>
	</fieldset>
</form>    
@endsection