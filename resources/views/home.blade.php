<!DOCTYPE HTML>
<html>
<head>
	<meta http-equiv="content-type" content="text/html; charset=utf-8" />
	<meta name="author" content="QuocTuan.Info" />
    <link rel="stylesheet" href="{!! asset('public/qt64_admin/templates/css/style.css') !!}" />
	<title>Trang Chủ</title>
</head>
<body>
<div id="layout">
    <div id="top">
        Trang Chủ
    </div>
    <div id="menu">
        <table width="100%">
            <tr>
                <td>
                    <a href="">Trang chính</a> | <a href="">Đề tài</a> | <a href="">Quản lý tin</a>
                </td>
                <td align="right">
                    <a href="{!! route('getLogin') !!}">Đăng Nhập</a>
                </td>
            </tr>
        </table>
    </div>
</div>

</body>
</html>