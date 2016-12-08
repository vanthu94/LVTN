@extends('sinhvien.master')
@section('title','Danh sách đề tài')
@section('content')
<table class="list_table">
    <tr class="list_heading">
        <td class="id_col">STT</td>
        <td>Tên Đề tài</td>
        <td>Yêu cầu</td>
        <td>Nội Dung</td>
        <td class="action_col">Chọn Đề tài</td>
    </tr>
    <?php $i = 0 ?>
    @foreach($data as $item)
    <?php $i++; ?>
    <tr class="list_data">
        <td class="aligncenter">{!! $i !!}</td>
        <td class="list_td aligncenter">{!! $item["tendt"] !!}</td>
        <td class="list_td aligncenter">{!! $item["yeucau"] !!}</td>
        <td class="list_td aligncenter">{!! $item["noidung"] !!}</td>
        <td class="list_td aligncenter">
            @if($item['statusdt'] == 0 && $detaiid == null)
                <a href="{!! route('addDetai', ['dtid' => $item["dtid"]]) !!}"><img src="{!! asset('public/qt64_admin/templates/images/them1.png') !!}" /></a>
            @endif
        </td>
        
    </tr>
    @endforeach
    
</table>
@endsection