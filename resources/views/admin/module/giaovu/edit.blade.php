@extends('admin.master')
@section('title','Sửa Giáo Vụ')
@section('content')
<form action="" method="POST" style="width: 650px;">
	<input type="hidden" name="_token" value="{{ csrf_token() }}">
	<fieldset>
		<legend>Sữa Thông Tin Sinh Viên</legend>
		<span class="form_label">MSSV:</span>
		<span class="form_item">
			<input type="text" name="MSSV" class="textbox" value="{!! $data['MSSV'] !!} " disabled/>
		</span><br />
		<span class="form_label">Họ Tên:</span>
		<span class="form_item">
			<input type="text" name="txtHoten" class="textbox" />
		</span><br />
		<span class="form_label">Giới tính:</span>
		<span class="form_item">
			<input type="radio" name="rdoGioitinh" value="Nam" checked="checked"
			@if (old('rdoGioitinh') == 'Nam')
				checked
			@endif
			 /> Nam 
			<input type="radio" name="rdoGioitinh" value="Nữ" 
			@if (old('rdoGioitinh') == 'Nữ')
				checked
			@endif
			/> Nữ
		</span><br />
		<span class="form_label">Email:</span>
		<span class="form_item">
			<input type="email" name="txtEmail" class="textbox" />
		</span><br />
		<span class="form_label">Ngành:</span>
		<span class="form_item">
			<input type="text" name="txtNganh" class="textbox" />
		</span><br />
		<span class="form_label"></span>
		<span class="form_item">
			<input type="submit" name="btnUserAdd" value="Sữa thông tin" class="button" />
		</span>
	</fieldset>
</form>    
@endsection