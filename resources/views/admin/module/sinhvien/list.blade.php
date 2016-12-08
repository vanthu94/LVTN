@extends('admin.master')
@section('title','Thêm Thành Viên')
@section('content')
<table class="list_table">
    <tr class="list_heading">
        <td class="id_col">STT</td>
        <td>MSSV</td>
        <td>Tên</td>
        <td>Tài khoản</td>
        <td class="action_col">Quản lý?</td>
        <td class="action_col">Thêm tài khoản?</td>
    </tr>
    <?php $i = 0 ?>
    @foreach($data as $item)
    <?php $i++; ?>
    <tr class="list_data">
        <td class="aligncenter">{!! $i !!}</td>
        <td class="list_td aligncenter">{!! $item["MSSV"] !!}</td>
        <td class="list_td aligncenter">{!! $item["hoten"] !!}</td>
        <td class="list_td aligncenter">{!! $item["username"]!!}</td>
        <td class="list_td aligncenter">
            {{-- <a href="{!! route('getSinhvienEdit', ['MSSV' => $item['MSSV']]) !!}"><img src="{!! asset('public/qt64_admin/templates/images/edit.png') !!}" /></a>&nbsp;&nbsp;&nbsp; --}}
            <a href="{!! route('getSinhvienDel', ['MSSV' => $item['MSSV']]) !!}" onclick="return xacnhanxoa('Bạn Có Chắc Muốn Xóa Danh Mục Này')"><img src="{!! asset('public/qt64_admin/templates/images/delete.png') !!}" /></a>
        </td>
        <td class="list_td aligncenter">
            @if($item["username"] == null)
                <a href="{!! route('getUserAddSV', ['MSSV' => $item['MSSV']]) !!}" ><img src="{!! asset('public/qt64_admin/templates/images/them1.png') !!}" /></a>
            @endif
        </td>
    </tr>
    @endforeach
    
</table>
@endsection
