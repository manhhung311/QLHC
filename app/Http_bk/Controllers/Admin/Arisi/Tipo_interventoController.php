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

class Tipo_interventoController extends DefinedController
{
    public function index(Request $req){
        return view('admin.arisi.tipo_intervento.index');
    }

	public function data(Request $req){
		if(isset($req->in_id) && $req->in_id > 0){
			$data = DB::table('tblinterventi')->where('in_id',$req->in_id)->first();	

			return array('in_id' => $data->in_id, 'in_nome' => $data->in_nome, 
				'in_1' => $data->in_att_sto_cli, 'in_2' => $data->in_att_app_cli,
				'in_3' => $data->in_att_cli, 'in_4' => $data->in_att_sto_ma,
				'in_5' => $data->in_att_app_man, 'in_6' => $data->in_att_man);
		}else{
	        $data = DB::table('tblinterventi')->orderBy('in_nome')->get();

            return DataTables::of($data)
	            ->editColumn(
	                'in_att_sto_cli',
	                function ($dat) {
	                	$check = $dat->in_att_sto_cli == 1 ? 'checked="checked"' : '';
	                    return '<input type="checkbox" class="form-control" ' . $check . ' onclick="update_annullato(\'' . $dat->in_id . '\',1,this.checked)" />';
	                }
	            )     
	            ->editColumn(
	                'in_att_app_cli',
	                function ($dat) {
	                	$check = $dat->in_att_app_cli == 1 ? 'checked="checked"' : '';
	                    return '<input type="checkbox" class="form-control" ' . $check . ' onclick="update_annullato(\'' . $dat->in_id . '\',2,this.checked)" />';
	                }
	            )
	            ->editColumn(
	                'in_att_cli',
	                function ($dat) {
	                	$check = $dat->in_att_cli == 1 ? 'checked="checked"' : '';
	                    return '<input type="checkbox" class="form-control" ' . $check . ' onclick="update_annullato(\'' . $dat->in_id . '\',3,this.checked)" />';
	                }
	            )
	            ->editColumn(
	                'in_att_sto_ma',
	                function ($dat) {
	                	$check = $dat->in_att_sto_ma == 1 ? 'checked="checked"' : '';
	                    return '<input type="checkbox" class="form-control" ' . $check . ' onclick="update_annullato(\'' . $dat->in_id . '\',4,this.checked)" />';
	                }
	            )
	            ->editColumn(
	                'in_att_app_man',
	                function ($dat) {
	                	$check = $dat->in_att_app_man == 1 ? 'checked="checked"' : '';
	                    return '<input type="checkbox" class="form-control" ' . $check . ' onclick="update_annullato(\'' . $dat->in_id . '\',5,this.checked)" />';
	                }
	            )
	            ->editColumn(
	                'in_att_man',
	                function ($dat) {
	                	$check = $dat->in_att_man == 1 ? 'checked="checked"' : '';
	                    return '<input type="checkbox" class="form-control" ' . $check . ' onclick="update_annullato(\'' . $dat->in_id . '\',6,this.checked)" />';
	                }
	            )       
	            ->addColumn(
	                'actions',
	                function ($dat) {
	                    $actions = '<button class="btn btn-success" onclick="edit_row(\'' . $dat->in_id . '\');return false;">' . Lang::get('arisi/tipo_intervento/title.edit'). '</button> <button class="btn btn-danger" onclick="delete_row(\'' . $dat->in_id . '\');return false;">' . Lang::get('arisi/tipo_intervento/title.delete'). '</button>';
	                    return $actions;
	                }
	            )
	            ->rawColumns(['actions','in_att_sto_cli','in_att_app_cli','in_att_cli','in_att_sto_ma','in_att_app_man','in_att_man'])
	            ->make(true);
	    }
    }    

    public function update(Request $req){        	
    	if($req->in_id != '' && $req->in_id > 0){
	    	if($req->in_type == 0){
	    		$data = array();	    		
	    		$value = $req->value;	    		
	    		$index = $req->index;	    			    		
	    		$data[$this->getAtt($index)] = $value;	    		
	    		$res = DB::table('tblinterventi')->where('in_id',$req->in_id)->update($data);
	    		if($res) return 1;
	    		else return 0;
	    	}elseif($req->in_type == 1){
	    		$chek = DB::table('tblinterventi')->where('in_id',$req->in_id)->count();
	    		if($chek > 0){
	    			return -1;
	    		}else{
	    			$data['in_nome'] = $req->in_nome;
	    			$data['in_id'] = $req->in_id;
	    			for ($i=1; $i < 7; $i++) { 
	    				$data[$this->getAtt($i)] = $req->{'in_' . $i};
	    			}
	    			$res = DB::table('tblinterventi')->insert($data);
	    			if($res) return 1;
	    			else return 0;
	    		}
		    }else{
		    	$id = $req->in_cur_id;
		    	if($req->in_cur_id != $req->in_id){
		    		$chek = DB::table('tblinterventi')->where('in_id',$req->in_id)->count();
		    		if($chek == 0){
		    			$data['in_nome'] = $req->in_nome;
		    			$data['in_id'] = $req->in_id;
		    			for ($i=1; $i < 7; $i++) { 
		    				$data[$this->getAtt($i)] = $req->{'in_' . $i};
		    			}
		    			$res = DB::table('tblinterventi')->where('in_id',$req->in_cur_id)->update($data);
		    			if($res) return 1;
	    				else return 0;
		    		}else{
		    			return -1;
		    		}	
		    	}else{
		    		$data['in_nome'] = $req->in_nome;
		    		for ($i=1; $i < 7; $i++) { 
	    				$data[$this->getAtt($i)] = $req->{'in_' . $i};
	    			}
	    			$res = DB::table('tblinterventi')->where('in_id',$req->in_id)->update($data);
	    			if($res) return 1;
	    			else return 0;
		    	}	    			    		
		    }
		}else return 0;
    }

    public function delete(Request $req){
        $res = DB::table('tblinterventi')->where('in_id',$req->in_id)->delete();
        if($res) return 1;
	    else return 0;
    }

    private function getAtt($index){
    	switch ($index) {
    		case 1: return 'in_att_sto_cli';break;
    		case 2: return 'in_att_app_cli';break;
    		case 3: return 'in_att_cli';break;
    		case 4: return 'in_att_sto_ma';break;
    		case 5: return 'in_att_app_man';break;
    		case 6: return 'in_att_man';break;
    		default: return "";
    	}
    }
}