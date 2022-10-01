<?php namespace App\Http\Controllers\Admin\Arisi;

use App\Http\Controllers\Admin\DefinedController;
use App\Http\Requests\UserRequest;
use App\Mail\Register;
use Cartalyst\Sentinel\Laravel\Facades\Activation;
use File;
use Hash;
use DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Collection;
use Redirect;
use Sentinel;
use URL;
use Lang;
use View;
use Carbon\Carbon;
use Yajra\DataTables\DataTables;
use Validator;
use App\Mail\Restore;
use Maatwebsite\Excel\Facades\Excel;
use App\Models\Country;

class ConsorziController extends DefinedController
{
    public function index(Request $req){
        return view('admin.arisi.consorzi.index');
    }

	public function data(Request $req){
		if(isset($req->co_id) && $req->co_id > 0){
			$data = DB::table('tppConsorzi')->where('co_id',$req->co_id)->first();			
			return array('co_id' => $data->co_id, 'co_nome' => $data->co_nome, 'co_annullato' => $data->co_annullato);
		}else{
	        $data = DB::table('tppConsorzi')->orderBy('co_nome')->get();

	        return DataTables::of($data)
	            ->editColumn(
	                'co_annullato',
	                function ($dat) {
	                	$check = $dat->co_annullato == 1 ? 'checked="checked"' : '';
	                    return '<input type="checkbox" class="form-control" ' . $check . ' onclick="update_annullato(\'' . $dat->co_id . '\',this.checked)" />';
	                }
	            )            
	            ->addColumn(
	                'actions',
	                function ($dat) {
	                    $actions = '<button class="btn btn-success" onclick="edit_row(\'' . $dat->co_id . '\');return false;">' . Lang::get('arisi/consorzi/title.edit'). '</button> <button class="btn btn-danger" onclick="delete_row(\'' . $dat->co_id . '\');return false;">' . Lang::get('arisi/consorzi/title.delete'). '</button>';
	                    return $actions;
	                }
	            )
	            ->rawColumns(['co_annullato','actions'])
	            ->make(true);
	    }
    }    

    public function update(Request $req){
    	$data = array(
    		'co_annullato' => $req->co_annullato,    		
    	);
    	if($req->co_id != '' && $req->co_id > 0){
	    	if($req->co_type == 0){
	    		$res = DB::table('tppConsorzi')->where('co_id',$req->co_id)->update($data);
	    		if($res) return 1;
	    		else return 0;
	    	}elseif($req->co_type == 1){
	    		$chek = DB::table('tppConsorzi')->where('co_id',$req->co_id)->count();
	    		if($chek > 0){
	    			return -1;
	    		}else{
	    			$data['co_nome'] = $req->co_nome;
	    			$data['co_id'] = $req->co_id;
	    			$res = DB::table('tppConsorzi')->insert($data);
	    			if($res) return 1;
	    			else return 0;
	    		}
		    }else{
		    	$id = $req->co_cur_id;
		    	if($req->co_cur_id != $req->co_id){
		    		$chek = DB::table('tppConsorzi')->where('co_id',$req->co_id)->count();
		    		if($chek == 0){
		    			$data['co_nome'] = $req->co_nome;
		    			$data['co_id'] = $req->co_id;
		    			$res = DB::table('tppConsorzi')->where('co_id',$req->co_cur_id)->update($data);
		    			if($res) return 1;
	    				else return 0;
		    		}else{
		    			return -1;
		    		}	
		    	}else{
		    		$data['co_nome'] = $req->co_nome;
	    			$res = DB::table('tppConsorzi')->where('co_id',$req->co_id)->update($data);
	    			if($res) return 1;
	    			else return 0;
		    	}	    			    		
		    }
		}else return 0;
    }

    public function delete(Request $req){
        $res = DB::table('tppConsorzi')->where('co_id',$req->co_id)->delete();
        if($res) return 1;
	    else return 0;
    }
}