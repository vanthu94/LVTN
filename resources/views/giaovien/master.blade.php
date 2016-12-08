<!DOCTYPE HTML>
<html>
<head>
	<meta http-equiv="content-type" content="text/html; charset=utf-8" />
    <link rel="stylesheet" href="{!! asset('public/qt64_admin/templates/css/style.css') !!}" />
	<title>Teacher Area </title>
</head>

<body>
<div id="layout">
    <div id="top">
        Teacher Area
    </div>
	<div id="menu">
		<table width="100%">
			<tr>
				<td>
					<a href="">Trang chính</a> 
					| <a href="{!! route('getDetaiTTList') !!}">Đề Tài Thực Tập</a> 
					| <a href="{!! route('getDetaiLVList') !!}">Đề Tài Luận Văn</a> 
					| <a href="{!! route('getDetaiAdd') !!}">Thêm đề tài</a> 
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