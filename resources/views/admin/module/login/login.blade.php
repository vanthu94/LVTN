<!DOCTYPE HTML>
<html>
<head>
    <meta http-equiv="content-type" content="text/html; charset=utf-8" />
    <link rel="stylesheet" href="{!! asset('public/qt64_admin/templates/css/style.css') !!}" />
    <title>Đăng nhập</title>
</head>
<body>
<div id="layout">
    <div id="top">
        Đăng Nhập
    </div>
    <div id="main">
        @include('admin.blocks.error')        
        <form action="" method="POST" style="width: 650px; margin: 30px auto;">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <fieldset>
                <legend>Thông Tin Đăng Nhập</legend>                
                <table>
                    <tr>
                        <td class="login_img"></td>
                        <td>
                            <span class="form_label">Tài Khoản:</span>
                            <span class="form_item">
                                <input type="text" name="txtUser" class="textbox" />
                            </span><br />
                            <span class="form_label">Mật Khẩu:</span>
                            <span class="form_item">
                                <input type="password" name="txtPass" class="textbox" />
                            </span><br />
                            <span class="form_label"></span>
                            <span class="form_item">
                                <input type="submit" name="btnLogin" value="Đăng nhập" class="button" />
                            </span>
                        </td>
                    </tr>
                </table>
            </fieldset>
        </form>
    </div>
    <div id="bottom">
    </div>
</div>

</body>
</html>