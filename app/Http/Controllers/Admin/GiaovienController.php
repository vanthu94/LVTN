<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Http\Requests\GiaovienRequest;
use App\Models\Giaovien;
use Illuminate\Support\Facades\DB;
use DateTime,Auth;
class GiaovienController extends Controller
{
	public function getGiaovienAdd () {
		return view('admin.module.giaovien.add');
	}

	public function postGiaovienAdd (GiaovienRequest $request) {
		DB::table('ql64_giangvien')->insert(
				[
					'MSGV'	=> $request->MSGV,
					'hoten'	=> $request->txtHoten,
					'hocvi'	=> $request->txtHocvi,
					'gioitinh'	=> $request->rdoGioitinh,
					'email'	=> $request->txtEmail,
					'chuyennganh'	=> $request->txtChuyennganh,
					'created_at' => new DateTime(),
				] 
			);
		return redirect()->route('getGiaovienList')->with(['flash_level' => 'result_msg','flash_message' => 'Thêm Giáo VIên Thành Công']);
	}

	public function getGiaovienList () {
		$data = Giaovien::select('userid','MSGV','hoten')->get();
		$result = array();
		foreach ($data as $value) {
			$userid = $value['userid'];
			if($userid != null)
				$username = DB::table('ql64_users')->where('userid',$userid)->value('username');
			else
				$username = null;
			array_push($result, array(
				'MSGV' => $value->MSGV,
				'hoten'	=> $value->hoten,
				'username'	=> $username
			));
		}

		return view('admin.module.giaovien.list',['data' => $result]);
	}

	public function getGiaovienDel ($id) {
        $user_delete = Giaovien::find($id);
        $user_delete->delete($id);
        return redirect()->route('getGiaovienList')->with(['flash_level' => 'result_msg','flash_message' => 'Xóa Thành Công']);
    }
}