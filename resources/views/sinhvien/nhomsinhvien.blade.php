@extends('sinhvien.master')
@section('title','Nhóm Sinh Viên')
@section('content')
<table class="list_table">
    <tr class="list_heading">
        <td class="id_col">STT</td>
        <td>Tên nhóm</td>
        <td>Tên Đề Tài</td>
        <td>Họ Tên</td>
        <td>MSSV</td>
        <td class="action_col">Rời Nhóm</td>
    </tr>
    <?php $i = 0 ?>
    @foreach($data as $item)
    <?php $i++; ?>
    <tr class="list_data">
        <td class="aligncenter">{!! $i !!}</td>
        <td class="list_td aligncenter">{!! $item['tennhom'] !!}</td>
        <td class="list_td aligncenter">{!! $item['tendt'] !!}</td>
        <td class="list_td aligncenter">{!! $item["hoten"] !!}</td>
        <td class="list_td aligncenter">{!! $item["MSSV"] !!}</td>
        <td class="list_td aligncenter">
        @if(Auth::user()->userid == $item['userid'])
            <a href="{!! route('getSVDel', ['nhomid' => $item["nhomid"]]) !!}" onclick="return xacnhanxoa('Bạn Có Chắc Muốn Xóa Danh Mục Này')"><img src="{!! asset('public/qt64_admin/templates/images/delete.png') !!}" /></a>
        @endif
        </td>
        
    </tr>
    @endforeach
    
</table>
@endsection