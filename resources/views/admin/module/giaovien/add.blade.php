@extends('admin.master')
@section('title','Thêm Giáo Viên')
@section('content')
<form action="" method="POST" style="width: 650px;">
	<input type="hidden" name="_token" value="{{ csrf_token() }}">
	<fieldset>
		<legend>Thêm Giáo Viên</legend>
		<span class="form_label">MSGV:</span>
		<span class="form_item">
			<input type="text" name="MSGV" class="textbox" />
		</span><br />
		<span class="form_label">Họ Tên:</span>
		<span class="form_item">
			<input type="text" name="txtHoten" class="textbox" />
		</span><br />
		<span class="form_label">Học Vị:</span>
		<span class="form_item">
			<input type="text" name="txtHocvi" class="textbox" />
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
			<input type="eamil" name="txtEmail" class="textbox" />
		</span><br />
		<span class="form_label">Chuyên Ngành:</span>
		<span class="form_item">
			<input type="text" name="txtChuyennganh" class="textbox" />
		</span><br />
		<span class="form_label"></span>
		<span class="form_item">
			<input type="submit" name="btnGVAdd" value="Thêm Giáo Viên" class="button" />
		</span>
	</fieldset>
</form>    
@endsection