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

class GruppiController extends DefinedController
{
    public function index(Request $req){
        return view('admin.arisi.gruppi.index');
    }

	public function data(Request $req){
		if(isset($req->tgr_id) && $req->tgr_id > 0){
			$data = DB::table('tppGruppi')->where('tgr_id',$req->tgr_id)->first();			
			return array('tgr_id' => $data->tgr_id, 'tgr_nome' => $data->tgr_nome, 'tgr_annullato' => $data->tgr_annullato);
		}else{
	        $data = DB::table('tppGruppi')->orderBy('tgr_nome')->get();

	        return DataTables::of($data)
	            ->editColumn(
	                'tgr_annullato',
	                function ($dat) {
	                	$check = $dat->tgr_annullato == 1 ? 'checked="checked"' : '';
	                    return '<input type="checkbox" class="form-control" ' . $check . ' onclick="update_annullato(\'' . $dat->tgr_id . '\',this.checked)" />';
	                }
	            )            
	            ->addColumn(
	                'actions',
	                function ($dat) {
	                    $actions = '<button class="btn btn-success" onclick="edit_row(\'' . $dat->tgr_id . '\');return false;">' . Lang::get('arisi/gruppi/title.edit'). '</button> <button class="btn btn-danger" onclick="delete_row(\'' . $dat->tgr_id . '\');return false;">' . Lang::get('arisi/gruppi/title.delete'). '</button>';
	                    return $actions;
	                }
	            )
	            ->rawColumns(['tgr_annullato','actions'])
	            ->make(true);
	    }
    }    

    public function update(Request $req){
    	$data = array(
    		'tgr_annullato' => $req->tgr_annullato,    		
    	);
    	if($req->tgr_id != '' && $req->tgr_id > 0){
	    	if($req->tgr_type == 0){
	    		$res = DB::table('tppGruppi')->where('tgr_id',$req->tgr_id)->update($data);
	    		if($res) return 1;
	    		else return 0;
	    	}elseif($req->tgr_type == 1){
	    		$chek = DB::table('tppGruppi')->where('tgr_id',$req->tgr_id)->count();
	    		if($chek > 0){
	    			return -1;
	    		}else{
	    			$data['tgr_nome'] = $req->tgr_nome;
	    			$data['tgr_id'] = $req->tgr_id;
	    			$res = DB::table('tppGruppi')->insert($data);
	    			if($res) return 1;
	    			else return 0;
	    		}
		    }else{
		    	$id = $req->tgr_cur_id;
		    	if($req->tgr_cur_id != $req->tgr_id){
		    		$chek = DB::table('tppGruppi')->where('tgr_id',$req->tgr_id)->count();
		    		if($chek == 0){
		    			$data['tgr_nome'] = $req->tgr_nome;
		    			$data['tgr_id'] = $req->tgr_id;
		    			$res = DB::table('tppGruppi')->where('tgr_id',$req->tgr_cur_id)->update($data);
		    			if($res) return 1;
	    				else return 0;
		    		}else{
		    			return -1;
		    		}	
		    	}else{
		    		$data['tgr_nome'] = $req->tgr_nome;
	    			$res = DB::table('tppGruppi')->where('tgr_id',$req->tgr_id)->update($data);
	    			if($res) return 1;
	    			else return 0;
		    	}	    			    		
		    }
		}else return 0;
    }

    public function delete(Request $req){
        $res = DB::table('tppGruppi')->where('tgr_id',$req->tgr_id)->delete();
        if($res) return 1;
	    else return 0;
    }
}