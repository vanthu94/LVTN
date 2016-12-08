<?php

namespace App\Http\Controllers\Giaovien;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Http\Requests\DetaiRequest;
use App\Models\Detai;
use App\Models\Dttttn;
use Illuminate\Support\Facades\DB;
use DateTime,Auth;

class DetaiController extends Controller
{
    
    // public function getDetaiTTAdd () {
    //     return view('giaovien.detaitt');
    // }

    // public function postDetaiTTAdd (Request $request) {
    //     DB::table('ql64_dttttn')->insert(
    //         [
    //             'tttnid' => $request->tttnid    
    //         ]
    //     );
    //     return redirect()->route('getDetaiList');
    // }

    public function getDetaiAdd () {
    	return view('giaovien.detai.add');
    }

    public function postDetaiAdd (DetaiRequest $request) {
        $userid = Auth::user()->userid;
        $giangvienid = DB::table('ql64_giangvien')->where('userid',$userid)->value('MSGV');
    	$dtid = DB::table('ql64_detai')->insertGetId(
        	[
	            	'tendt' 	=> $request->txtTendt,
                    'sosv'      => $request->sosv,
	            	'tgbd' 		=> (new \Datetime($request->Tgbd))->format('Y-m-d'),
	            	'tgkt'		=> (new \Datetime($request->Tgkt))->format('Y-m-d'),
	            	'yeucau'	=> $request->txtYeucau,
	            	'noidung'	=> $request->txtNoidung,
	            	'filenoidung'=> $request->txtFilenoidung,
	            	'filenhanxet'=> $request->txtFilenhanxet,
                    'phanloai'  => (int)$request->phanloai,
	            	'statusdt'	=> (int)$request->rdoStatusdt,
                    'giangvienid'  => $giangvienid,
	            	'created_at'=> new \DateTime(),
        	]
        );

            // DB::table('ql64_dttttn')
            //     ->where('tttnid', $request->tttnid)
            //     ->update(['dtid' => $dtid]);
        
        if((int)$request->phanloai == 0){
    	   return redirect()->route('getDetaiTTList')->with(['flash_level' => 'result_msg','flash_message' => 'Thêm Đề Tài Thành Công']);
        }
        else{
        return redirect()->route('getDetaiLVList')->with(['flash_level' => 'result_msg','flash_message' => 'Thêm Đề Tài Thành Công']);
        }
    }

    public function getDetaiTTList () {
        $userid = Auth::user()->userid;
        $giangvienid = DB::table('ql64_giangvien')->where('userid',$userid)->value('MSGV');
        $data = Detai::select('dtid','tendt','noidung','giangvienid','phanloai')->where('giangvienid', $giangvienid)->get()->toArray();
        $result = array();
        foreach ($data as $key => $value) {
            $giangvienid = $value['giangvienid'];
            $tengiangvien = DB::table('ql64_giangvien')->where('MSGV',$giangvienid)->value('hoten');
            if($value['phanloai'] == 0){
                array_push($result, array(
                    'dtid' => $value['dtid'],
                    'tendt' => $value['tendt'],
                    'noidung' => $value['noidung'],
                    'hoten' => $tengiangvien,
                    'phanloai'=> $value['phanloai'] 
                ));
            }
            else
                null;
        }
    	return view('giaovien.detai.list',['data'=>$result]);
    }

    public function getDetaiLVList () {
        $userid = Auth::user()->userid;
        $giangvienid = DB::table('ql64_giangvien')->where('userid',$userid)->value('MSGV');
        $data = Detai::select('dtid','tendt','noidung','giangvienid','phanloai')->where('giangvienid', $giangvienid)->get()->toArray();
        $result = array();
        foreach ($data as $key => $value) {
            $giangvienid = $value['giangvienid'];
            $tengiangvien = DB::table('ql64_giangvien')->where('MSGV',$giangvienid)->value('hoten');
            if($value['phanloai'] == 1){
                array_push($result, array(
                    'dtid' => $value['dtid'],
                    'tendt' => $value['tendt'],
                    'noidung' => $value['noidung'],
                    'hoten' => $tengiangvien, 
                    'phanloai'=> $value['phanloai']
                ));
            }
            else
                null;
        }
        return view('giaovien.detai.list',['data'=>$result]);
    }

    public function getDetaiDel ($id) {
        $user_current_login = Auth::user()->id;
        $user_delete = Detai::find($id);
        $user_delete->delete($id);
        if($user_delete["phanloai"] == 1)
            return redirect()->route('getDetaiLVList')->with(['flash_level' => 'result_msg','flash_message' => 'Xóa Thành Công']);
        else
            return redirect()->route('getDetaiTTList')->with(['flash_level' => 'result_msg','flash_message' => 'Xóa Thành Công']);
    }

    public function getDetaiEdit ($id) {
        $data = Detai::findOrFail($id)->toArray();
        return view('giaovien.detai.edit',['data'=>$data]);
    }

    public function postDetaiEdit (Request $request,$id) {
        $data = Detai::find($id);
        $data->tendt = $request->txtTendt;
        $data->tgbd = (new Datetime($request->Tgbd))->format('Y-m-d');
        $data->tgkt = (new Datetime($request->Tgkt))->format('Y-m-d');
        $data->yeucau = $request->txtYeucau;
        $data->noidung = $request->txtNoidung;
        $data->filenoidung = $request->txtFilenoidung;
        $data->filenhanxet = $request->txtFilenhanxet;
        $data->statusdt = (int)$request->rdoStatusdt;
        $data->updated_at = new DateTime;
        $data->save();
        if($data["phanloai"] == 0)
            return redirect()->route('getDetaiTTList')->with(['flash_level' => 'result_msg','flash_message' => 'Sữa thành công']);
        else
            return redirect()->route('getDetaiLVList')->with(['flash_level' => 'result_msg','flash_message' => 'Sữa thành công']);
    }

}