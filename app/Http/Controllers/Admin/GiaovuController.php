<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Http\Requests\GiaovuRequest;
use App\Models\Giaovu;
use Illuminate\Support\Facades\DB;
use DateTime,Auth;
class GiaovuController extends Controller
{
	public function getGiaovuAdd () {
		return view('admin.module.giaovu.add');
	}

	public function postGiaovuAdd(GiaovuRequest $request) {
		DB::table('ql64_giaovu')->insert(
			[
				'staffid'	=> $request->staffid,
				'fullname'	=> $request->txtHoten,
				'gioitinh'	=> $request->rdoGioitinh,
				'email'		=> $request->txtEmail,
				'phone'		=> (int)$request->phone,
				'created_at' => new DateTime(), 	
			]
		);

		return redirect()->route('getGiaovuList')->with(['flash_level' => 'result_msg', 'flash_message' => 'Thêm Giáo Vụ thành công']);
	}

	public function getGiaovuList () {
		$data = Giaovu::select('userid','staffid','fullname')->get();
		$result = array();
		foreach ($data as $value) {
			$userid = $value['userid'];
			if($userid != null)
				$username = DB::table('ql64_users')->where('userid',$userid)->value('username');
			else
				$username = null;
			array_push($result, array(
				'staffid' => $value->staffid,
				'fullname'	=> $value->fullname,
				'username'	=> $username
			));
		}

		return view('admin.module.giaovu.list',['data' => $result]);
	}

	public function getGiaovuDel ($id) {
        $user_delete = Giaovu::find($id);
        $user_delete->delete($id);
        return redirect()->route('getGiaovuList')->with(['flash_level' => 'result_msg','flash_message' => 'Xóa Thành Công']);
    }

}