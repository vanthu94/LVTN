@extends('giaovien.master')
@section('title','Danh sách đề tài')
@section('content')
<table class="list_table">
	<tr class="list_heading">
		<td class="id_col">STT</td>
        <td class="action_col">Tên Giảng Viên</td>
		<td>Tên Đề Tài</td>
		<td>Nội Dung</td>
		<td class="action_col">Quản lý</td>
	</tr>
    <?php $i = 0 ?>
    @foreach($data as $item)
    <?php $i++; ?>
	<tr class="list_data">
        <td class="aligncenter">{!! $i !!}</td>
        <td class="list_td aligncenter">{!! $item["hoten"] !!}</td>
        <td class="list_td aligncenter">{!! $item["tendt"] !!}</td>
        <td class="list_td aligncenter"> {!! $item["noidung"] !!} </td>
        <td class="list_td aligncenter">
            <a href="{!! route('getDetaiEdit', ['dtid' => $item["dtid"]]) !!}"><img src="{!! asset('public/qt64_admin/templates/images/edit.png') !!}" /></a>&nbsp;&nbsp;&nbsp;
            <a href="{!! route('getDetaiDel', ['dtid' => $item["dtid"]]) !!}" onclick="return xacnhanxoa('Bạn Có Chắc Muốn Xóa Danh Mục Này')"><img src="{!! asset('public/qt64_admin/templates/images/delete.png') !!}" /></a>
        </td>
    </tr>
    @endforeach
	
</table>
@endsection
