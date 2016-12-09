@extends('admin.master')
@section('title','Thêm Thành Viên')
@section('content')
<form action="" method="POST" style="width: 650px;">
	<input type="hidden" name="_token" value="{{ csrf_token() }}">
	<fieldset>
		<legend>Thêm tài khoản</legend>
		<span class="form_label">Tài khoản:</span>
		<span class="form_item">
			<input type="text" name="txtUser" class="textbox" value="{!! old('txtUser') !!}" />
		</span><br />
		<span class="form_label">Mật khẩu:</span>
		<span class="form_item">
			<input type="password" name="txtPass" class="textbox" />
		</span><br />
		<span class="form_label">Xác nhận mật khẩu:</span>
		<span class="form_item">
			<input type="password" name="txtRepass" class="textbox" />
		</span><br />
		<span class="form_label">Quyền truy cập:</span>
		<span class="form_item">
			<input type="radio" name="rdoLevel" value="1" checked="checked"
			@if (old('rdoLevel') == 1)
				checked
			@endif
			 /> Giáo Vụ 
			<input type="radio" name="rdoLevel" value="2" 
			@if (old('rdoLevel') == 2)
				checked
			@endif
			/> Sinh Viên
			<input type="radio" name="rdoLevel" value="3" 
			@if (old('rdoLevel') == 3)
				checked
			@endif
			/> Giảng Viên
		</span><br />
		<span class="form_label"></span>
		<span class="form_item">
			<input type="submit" name="btnUserAdd" value="Thêm tài khoản" class="button" />
		</span>
	</fieldset>
</form>    
@endsection