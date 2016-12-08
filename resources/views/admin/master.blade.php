<!DOCTYPE HTML>
<html>
<head>
	<meta http-equiv="content-type" content="text/html; charset=utf-8" />
    <link rel="stylesheet" href="{!! asset('public/qt64_admin/templates/css/style.css') !!}" />
	<title>Admin Area </title>
</head>

<body>
<div id="layout">
    <div id="top">
        Admin Area
    </div>
	<div id="menu">
		<table width="100%">
			<tr>
				<td>
					<a href="">Trang chính</a> 
					| <a href="{!! route('getGiaovuList') !!}">Quản lý Giáo vụ</a> 
					| <a href="{!! route('getGiaovuAdd') !!}">Thêm Giáo vụ</a>  
					| <a href="{!! route('getSinhvienList') !!}">Quản lý Sinh viên</a> 
					| <a href="{!! route('getSinhvienAdd') !!}">Thêm sinh viên</a>  
					| <a href="{!! route('getGiaovienList') !!}">Quản lý Giáo Viên</a> 
					| <a href="{!! route('getGiaovienAdd') !!}">Thêm Giáo Viên</a> 
				</td>
				<td align="right">
					Xin chào {!! Auth::user()->username !!} | <a href="{!! url('logout') !!}">Logout</a>
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