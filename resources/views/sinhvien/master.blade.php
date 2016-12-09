<!DOCTYPE HTML>
<html>
<head>
	<meta http-equiv="content-type" content="text/html; charset=utf-8" />
    <link rel="stylesheet" href="{!! asset('public/qt64_admin/templates/css/style.css') !!}" />
	<title>Sinh Viên</title>
</head>

<body>
<div id="layout">
    <div id="top">
        Sinh Viên
    </div>
	<div id="menu">
		<table width="100%">
			<tr>
				<td>
					<a href="">Trang chính</a> 
					| <a href="{!! route('listDetai') !!}">Đăng kí Đề Tài</a>
					| <a href="{!! route('listNhom') !!}">Danh sách nhóm</a>
					| <a href="{!! route('getNhom') !!}">Tạo nhóm</a>
					| <a href="{!! route('getNhomSV') !!}">Nhóm</a>
				</td>
				<td align="right">
					Xin chào {!! Auth::user()->username !!} | <a href="{!! url('logout') !!}">Đăng Xuất</a>
				</td>
			</tr>
		</table>
	</div>
    <div id="main">
    	@include('admin.blocks.error')
    	@include('admin.blocks.flash')
		@yield('content')    
	</div>
    <div id="bottom">
    </div>
</div>
</body>
</html>