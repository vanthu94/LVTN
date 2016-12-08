<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Http\Requests\SinhvienRequest;
use App\Models\Sinhvien;
use Illuminate\Support\Facades\DB;
use DateTime,Auth;
class SinhvienController extends Controller
{

 
    public function getSinhvienAdd (){
        return view('admin.module.sinhvien.add');
    }

    public function postSinhvienAdd (SinhvienRequest $request) {
    	DB::table('ql64_sinhvien')->insert(
        	[
        		[
	            	'MSSV' 		=> $request->MSSV,
	            	'hoten' 	=> $request->txtHoten,
	            	'gioitinh'	=> $request->rdoGioitinh,
	            	'email'		=> $request->txtEmail,
	            	'nganh'		=> $request->txtNganh,
	            	'created_at'=> new \DateTime(),
	        	]	
        	]
        );
        return redirect()->route('getSinhvienList')->with(['flash_level' => 'result_msg','flash_message' => 'Thêm Thành Viên Thành Công']);
    }

    public function getSinhvienList () {
        $data = Sinhvien::select('userid','MSSV','hoten')->get()->toArray();
        $result = array();
        foreach ($data as $value) {
        	$userid = $value['userid'];
        	if ($userid != null)
        		$username = DB::table('ql64_users')->where('userid', $userid)->value('username');
        	else
        		$username = null;
        	array_push($result, array(
        		'MSSV' => $value['MSSV'],
        		'hoten' => $value['hoten'],
        		'username' => $username,
        		));
        }
    	return view('admin.module.sinhvien.list',['data'=>$result]);
    }

    public function getSinhvienDel ($id) {
        $user_delete = Sinhvien::find($id);
        $user_delete->delete($id);
        return redirect()->route('getSinhvienList')->with(['flash_level' => 'result_msg','flash_message' => 'Xóa Thành Viên Thành Công']);
    }

    public function getSinhvienEdit ($id) {
        $data = Sinhvien::findOrFail($id)->toArray();
        return view('admin.module.sinhvien.edit',['data'=>$data]);
    }

    public function postSinhvienEdit (Request $request,$id) {
        $data = Sinhvien::find($id);
        $data->hoten = $request->txtHoten;
        $data->gioitinh = $request->rdoGioitinh;
        $data->email = $request->txtEmail;
        $data->nganh = $request->txtNganh;
        $data->updated_at = new DateTime;
        $data->save();
        return redirect()->route('getSinhvienList')->with(['flash_level' => 'result_msg','flash_message' => 'Cập Nhật Thành Viên Thành Công']);
    }
    
}