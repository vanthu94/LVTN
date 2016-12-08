@extends('giaovien.master')
@section('title','Thêm Đề Tài')
@section('content')
<form action="" method="POST" style="width: 650px;">
	<input type="hidden" name="_token" value="{{ csrf_token() }}">
	<fieldset>
		<legend>Thêm Đề Tài</legend>
		<span class="form_label">Tên Đề tài:</span>
		<span class="form_item">
			<input type="text" name="txtTendt" class="textbox" />
		</span><br />
		<span class="form_label">Số Sinh Viên:</span>
		<span class="form_item">
			<input type="number" name="sosv" class="textbox" min="1" max="10"/>
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
		<span class="form_label">Loại Đề Tài:</span>
		<span class="form_item">
			<input type="radio" name="phanloai" value="0" checked="checked"
			@if (old('phanloai') == 0)
				checked
			@endif
			/>	Đề tài TTTN
			<input type="radio" name="phanloai" value="1" 
			@if (old('phanloai') == 1)
				checked
			@endif
			/>	Đề Tài LVTN
		</span><br />
		{{-- <span class="form_label">Status Đề tài:</span>
		<span class="form_item">
			<input type="radio" name="rdoStatusdt" value="0" checked="checked"
			@if (old('rdoStatusdt') == 0)
				checked
			@endif
			 /> Chưa đăng kí 
			<input type="radio" name="rdoStatusdt" value="1" 
			@if (old('rdoStatusdt') == 1)
				checked
			@endif
			/> Đã đăng kí
		</span><br /> --}}
		<span class="form_label"></span>
		<span class="form_item">
			<input type="submit" name="btnDetaiAdd" value="Thêm Đề Tài" class="button" />
		</span>
	</fieldset>
</form>    
@endsection