<?php

namespace App\Http\Controllers\Sinhvien;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Requests\NhomRequest;
use Illuminate\Support\Facades\Auth;
use App\Models\Nhom;
use App\Models\Sinhvien;
use App\Models\Detai;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class NhomController extends Controller
{
	public function getNhom () {
        $userid = Auth::user()->userid;
        $nhomid = DB::table('ql64_sinhvien')->where('userid', $userid)->value('nhomid');
		if($nhomid == null)
			return view('sinhvien.nhom');
		else
			return redirect()->route('getNhomSV');
	}

	public function postNhom (NhomRequest $request) {
		$nhomid = DB::table('ql64_nhom')->insertGetId ([
			'tennhom' 	=> $request->txtTennhom,
			'sosv'		=> (int)$request->Sosv,
			'namhoc'	=> (int)$request->namhoc,
			'hocki'		=> (int)$request->hocki,
		]);

		$userid = Auth::user()->userid;
		DB::table('ql64_sinhvien')
            ->where('userid', $userid)
            ->update(['nhomid' => $nhomid, 'status' => 1]);

        return redirect()->route('listNhom');
	}

	public function getNhomSV () {
        $userid = Auth::user()->userid;
        $nhomid = DB::table('ql64_sinhvien')->where('userid', $userid)->value('nhomid');
		$data = Sinhvien::select('MSSV', 'hoten', 'nhomid','userid','detaiid')->where('nhomid',$nhomid)->get()->toArray();
		$result = array();
		foreach ($data as $key => $value) {
			$nhomid1 = $value['nhomid'];
			$dtid = $value['detaiid'];
			if($nhomid1 != null && $dtid != null){
				$tennhom = DB::table('ql64_nhom')->where('nhomid', $nhomid1)->value('tennhom');
				$tendt = DB::table('ql64_detai')->where('dtid', $dtid)->value('tendt');
				array_push($result, array(
					'nhomid' => $value['nhomid'],
					'tennhom' => $tennhom,
					'tendt' => $tendt,
					'MSSV' => $value['MSSV'],
					'hoten' => $value['hoten'],
					'userid' => $value['userid']
				));
			}
			else if($nhomid1 != null && $dtid == null){
				$tennhom = DB::table('ql64_nhom')->where('nhomid', $nhomid1)->value('tennhom');
				$tendt = null;
				array_push($result, array(
					'nhomid' => $value['nhomid'],
					'tennhom' => $tennhom,
					'tendt' => $tendt,
					'MSSV' => $value['MSSV'],
					'hoten' => $value['hoten'],
					'userid' => $value['userid']
				));
			}
			else
				null;
			
		}
		return view('sinhvien.nhomsinhvien',['data'=>$result]);
	}


	public function listNhom () {
		$userid = Auth::user()->userid;
		$status = DB::table('ql64_sinhvien')->where('userid',$userid)->value('status');
		$data = Nhom::select('nhomid','tennhom','sosv')->get()->toArray();
		
		return view('sinhvien.listnhom',['data' => $data,'status'=> $status]);
	}

	public function addMember (Request $request) {

		$userid = Auth::user()->userid;
		DB::table('ql64_sinhvien')
            ->where('userid', $userid)
            ->update(['nhomid' => $request->nhomid,
            	'status' => 1]);

        $nhomid = DB::table('ql64_sinhvien')->where('userid', $userid)->value('nhomid');
        $detaiid = DB::table('ql64_nhom')->where('nhomid', $nhomid)->value('detaiid');
        if($detaiid != null){
			DB::table('ql64_sinhvien')
	            ->where('nhomid', $nhomid)
	            ->update(['detaiid' => $detaiid]);
        }

        return redirect()->route('getNhomSV')->with(['flash_level' => 'result_msg','flash_message' => 'Vào Nhóm Thành Công']);
	}

	public function getSVDel ($id) {
        $userid = Auth::user()->userid;
        $nhomid = DB::table('ql64_sinhvien')->where('userid', $userid)->value('nhomid');

        DB::table('ql64_sinhvien')
            ->where('userid', $userid)
            ->update(['status' => 0, 'nhomid' => null, 'detaiid' => null]);

        $result = DB::table('ql64_sinhvien')->where('nhomid', $nhomid)->get();
        if($result == null){
    		$user_delete = Nhom::where('nhomid',$nhomid);
    		$user_delete->delete();
        }
        return redirect()->route('listNhom')->with(['flash_level' => 'result_msg','flash_message' => 'Rời Nhóm Thành Công']);
	}

	public function listDetai () {
		$userid = Auth::user()->userid;
		$status = DB::table('ql64_sinhvien')->where('userid',$userid)->value('status');
		if($status == 1){
			$data = Detai::select('tendt', 'yeucau', 'noidung','dtid','statusdt')->get()->toArray();
			$detaiid = DB::table('ql64_sinhvien')->where('userid', $userid)->value('detaiid');

			return view('sinhvien.listdetai',['data' => $data, 'detaiid' => $detaiid]);
		}
		else
			return redirect()->route('listNhom')->with(['flash_message' => 'Vui lòng tham gia nhóm hoặc đăng kí nhóm']);
	}

	public function addDetai (Request $request) {
		$userid = Auth::user()->userid;
        $nhomid = DB::table('ql64_sinhvien')->where('userid', $userid)->value('nhomid');
        $nhomid_1 = DB::table('ql64_nhom')->where('nhomid', $nhomid)->value('nhomid');
        $nhomid_2 = DB::table('ql64_sinhvien')->where('nhomid', $nhomid)->value('nhomid');
        DB::table('ql64_nhom')
            ->where('nhomid', $nhomid_1)
            ->update(['detaiid' => $request->dtid,
            	'statusdk' => 1]);

        DB::table('ql64_sinhvien')
        	->where('nhomid', $nhomid_2)
        	->update(['detaiid' => $request->dtid]);

        DB::table('ql64_detai')
        	->where('dtid', $request->dtid)
        	->update(['statusdt' => 1]);

        return redirect()->route('getNhomSV')->with(['flash_level' => 'result_msg','flash_message' => 'Chọn Đề Tài Thành Công']);
	}

}