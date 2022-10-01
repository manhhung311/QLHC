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

class TrasportatoriController extends DefinedController
{
    public function index(Request $req){
        return view('admin.arisi.trasportatori.index');
    }

	public function data(Request $req){
		if(isset($req->ve_id) && $req->ve_id > 0){
			$data = DB::table('tblvettori')->where('ve_id',$req->ve_id)->first();			
			return array('ve_id' => $data->ve_id, 've_nome' => $data->ve_nome, 've_descrizione' => $data->ve_descrizione, 've_indirizzo' => $data->ve_indirizzo, 've_lat' => $data->ve_lat, 've_lon' => $data->ve_lon);
		}else{
	        $data = DB::table('tblvettori')->orderBy('ve_nome')->get();

	        return DataTables::of($data)	                    
	            ->addColumn(
	                'actions',
	                function ($dat) {
	                    $actions = '<button class="btn btn-success" onclick="edit_row(\'' . $dat->ve_id . '\');return false;">' . Lang::get('arisi/trasportatori/title.edit'). '</button> <button class="btn btn-danger" onclick="delete_row(\'' . $dat->ve_id . '\');return false;">' . Lang::get('arisi/trasportatori/title.delete'). '</button>';
	                    return $actions;
	                }
	            )
	            ->rawColumns(['actions'])
	            ->make(true);
	    }
    }    

    public function update(Request $req){
    	$data = array(
    		've_nome' => $req->ve_nome,  
    		've_descrizione'	=> $req->ve_descrizione,
            've_indirizzo'		=> $req->ve_indirizzo,
            've_lat'		=> $req->ve_lat,
            've_lon'		=> $req->ve_lon, 		
    	);

    	if($req->ve_id != '' && $req->ve_id > 0){
	    	if($req->ve_type == 0){
	    		$res = DB::table('tblvettori')->where('ve_id',$req->ve_id)->update($data);
	    		if($res) return 1;
	    		else return 0;
	    	}elseif($req->ve_type == 1){
	    		$chek = DB::table('tblvettori')->where('ve_id',$req->ve_id)->count();
	    		if($chek > 0){
	    			return -1;
	    		}else{
	    			$data['ve_id'] = $req->ve_id;
	    			$res = DB::table('tblvettori')->insert($data);
	    			if($res) return 1;
	    			else return 0;
	    		}
		    }else{
		    	if($req->ve_cur_id != $req->ve_id){
		    		$chek = DB::table('tblvettori')->where('ve_id',$req->ve_id)->count();
		    		if($chek == 0){
		    			$data['ve_nome'] = $req->ve_nome;
		    			$data['ve_id'] = $req->ve_id;
		    			$res = DB::table('tblvettori')->where('ve_id',$req->ve_cur_id)->update($data);
		    			if($res) return 1;
	    				else return 0;
		    		}else{
		    			return -1;
		    		}	
		    	}else{
	    			$res = DB::table('tblvettori')->where('ve_id',$req->ve_id)->update($data);
	    			if($res) return 1;
	    			else return 0;
		    	}	    			    		
		    }
		}else return 0;
    }

    public function delete(Request $req){
        $res = DB::table('tblvettori')->where('ve_id',$req->ve_id)->delete();
        if($res) return 1;
	    else return 0;
    }
}