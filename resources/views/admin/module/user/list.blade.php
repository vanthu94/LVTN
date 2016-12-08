@extends('admin.master')
@section('title','Thêm Thành Viên')
@section('content')
<table class="list_table">
    <tr class="list_heading">
        <td class="id_col">STT</td>
        <td>Username</td>
        <td>Level</td>
        <td class="action_col">Quản lý?</td>
    </tr>
    <?php $i = 0 ?>
    @foreach($data as $item)
    <?php $i++; ?>
    <tr class="list_data">
        <td class="aligncenter">{!! $i !!}</td>
        <td class="list_td aligncenter">{!! $item["username"] !!}</td>
        <td class="list_td aligncenter">
            @if ($item["userid"] == 1)
                <span style="color: red; font-weight: bold;">Super Admin</span>
            @elseif ($item["level"] == 1)
                <span style="color: blue; font-weight: bold;">Admin</span>
            @elseif ($item["level"] == 2)
                <span style="color: black;">Sinh Viên</span>
            @else
                <span style="color: black;">Giảng Viên</span>
            @endif
        </td>
        <td class="list_td aligncenter">
            <a href="{!! route('getUserEdit', ['userid' => $item["userid"]]) !!}"><img src="{!! asset('public/qt64_admin/templates/images/edit.png') !!}" /></a>&nbsp;&nbsp;&nbsp;
            <a href="{!! route('getUserDel', ['userid' => $item["userid"]]) !!}" onclick="return xacnhanxoa('Bạn Có Chắc Muốn Xóa Danh Mục Này')"><img src="{!! asset('public/qt64_admin/templates/images/delete.png') !!}" /></a>
        </td>
    </tr>
    @endforeach
    
</table>
@endsection
