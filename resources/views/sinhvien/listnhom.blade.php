@extends('sinhvien.master')
@section('title','Danh sách nhóm')
@section('content')
<table class="list_table">
    <tr class="list_heading">
        <td class="id_col">STT</td>
        <td>Tên Nhóm</td>
        <td>Số Sinh Viên</td>
        <td class="action_col">Tham gia nhóm</td>
    </tr>
    <?php $i = 0 ?>
    @foreach($data as $item)
    <?php $i++; ?>
    <tr class="list_data">
        <td class="aligncenter">{!! $i !!}</td>
        <td class="list_td aligncenter">{!! $item["tennhom"] !!}</td>
        <td class="list_td aligncenter">{!! $item["sosv"] !!}</td>
        <td class="list_td aligncenter">
            @if($status == 0)
                <a href="{!! route('addMember', ['nhomid' => $item["nhomid"]]) !!}"><img src="{!! asset('public/qt64_admin/templates/images/them1.png') !!}" /></a>
            @endif
        </td>
        
    </tr>
    @endforeach
    
</table>
@endsection