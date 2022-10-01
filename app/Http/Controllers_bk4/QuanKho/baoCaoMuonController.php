<?php

namespace App\Http\Controllers\QuanKho;

use App\Http\Controllers\Controller;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class baoCaoMuonController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $danhsach = []; $i = 0 ;
        
        $phong = DB::table('phong')
                        ->select('*')
                        ->get();
        foreach($phong as $p) {
            $suDungHoaChat = DB::table('su_dung_hoa_chat')
                                ->select('*')
                                ->where('ma_phong',$p->ma_phong)
                                ->get();

            foreach($suDungHoaChat as $suDung) {
                $loHoaChat = DB::table('lo_hoa_chat')
                                ->select('*')
                                ->where('ma_lo_hoa_chat',$suDung->ma_lo_hoa_chat)
                                ->get();
                foreach($loHoaChat as $lo) {
                    $danhMucHoaChat = DB::table('danh_muc_hoa_chat')
                                        ->select('*')
                                        ->where('ma_danh_muc_hoa_chat',$lo->ma_danh_muc_hoa_chat)
                                        ->get();
                    foreach($danhMucHoaChat as $hoaChat) {
                        $nhatKy = DB::table('nhat_ky_su_dung_hoa_chat')
                                    ->select('*')
                                    ->where('ma_su_dung_hoa_chat',$suDung->ma_su_dung_hoa_chat)
                                    ->where('xac_nhan_cua_quan_kho','=',0)
                                    ->get();
                        foreach($nhatKy as $nk) {
                            $danhsach[$i] = array('stt'=>$i+1,'phong'=>$p, 'hoachat'=>$hoaChat,'lo'=>$lo, 'sudung'=>$suDung, 'nhatky'=>$nk);
                            $i++;
                        }
                    }
                }
            }
        }

        return view('admin.Quankho.1_nhatky_sd',['danhSach'=>$danhsach]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit()
    {
        //
        $nhatKy = DB::table('nhat_ky_su_dung_hoa_chat')
                                    ->select('*')
                                    ->where('xac_nhan_cua_quan_kho','=',0)
                                    ->get();
        foreach($nhatKy as $nk) {
            DB::table('nhat_ky_su_dung_hoa_chat')
                ->where('ma_nhat_ky_su_dung_hoa_chat',$nk->ma_nhat_ky_su_dung_hoa_chat)
                ->update([
                    'xac_nhan_cua_quan_kho'=>1
                ]);
            
           $suDungHoaChat = DB::table('su_dung_hoa_chat')
                                ->select('*')
                                ->where('ma_su_dung_hoa_chat',$nk->ma_su_dung_hoa_chat)
                                ->get();
            foreach($suDungHoaChat as $suDung){
                $loHoaChat = DB::table('lo_hoa_chat')
                                ->select('*')
                                ->where('ma_lo_hoa_chat',$suDung->ma_lo_hoa_chat)
                                ->get();
                foreach($loHoaChat as $lo) {
                    $abc = (int)($nk->so_luong_su_dung_trong_ngay/$lo->so_luong_dong_goi) + $suDung->so_luong_su_dung;
                }
                DB::table('su_dung_hoa_chat')
                ->where('ma_su_dung_hoa_chat',$suDung->ma_su_dung_hoa_chat)
                ->update([
                'so_luong_su_dung'=>$abc
                    ]);
            }
            
        
        }
        return redirect('quankho')->with('thành công');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $suDungHoaChat =DB::table('su_dung_hoa_chat')
                            ->select('*')
                            ->where('ma_lo_hoa_chat',$request->idLo_hoa_chat)
                            ->where('ma_phong',$id)
                            ->get();
        foreach($suDungHoaChat as $sdhc) {
            $loHoaChat = DB::table('lo_hoa_chat')
                        ->select('*')
                        ->where('ma_lo_hoa_chat',$sdhc->idLo_hoa_chat)
                        ->get();
            foreach($loHoaChat as $lhc) {
                $danhMucHoaChat = DB::table('danh_muc_hoa_chat')
                                ->select('*')
                                ->where('ma_danh_muc_hoa_chat',$lhc->idDanh_muc_hoa_chat)
                                ->get();

                $danhMucHoaChat->don_vi_dong_goi;
                $soLuongSuDung = 0;
                $nhatKy = DB::table('nhat_ky_su_dung_hoa_chat')
                        ->select('*')
                        ->where('ma_su_dung_hoa_chat',$sdhc->idSu_dung_hoa_chat)
                        ->get();
                foreach($nhatKy as $nk) {
                    $soLuongSuDung += $nk->so_luong_su_dung_trong_ngay;
                }
                $soLuongConLai = $sdhc->so_luong_nhap_ve*$danhMucHoaChat->don_vi_dong_goi/$soLuongSuDung ;
                (int)$soLuongConLai;
                try{
                     DB::table('nhat_ky_su_dung_hoa_chat')
                    ->where('ma_danh_muc_hoa_chat',$sdhc->idDanh_muc_hoa_chat)
                    ->update([
                        'xac_nhan_cua_quan_kho'=> 1
                    ]);
            
                DB::table('su_dung_hoa_chat')
                    ->where('ma_danh_muc_hoa_chat',$sdhc->idDanh_muc_hoa_chat)
                    ->update([
                    'so_luong_su_dung'=>(int)($soLuongConLai/$danhMucHoaChat->don_vi_dong_goi)
                    ]);
                }catch(Exception $e){
                    return redirect('');
                }
               
            
           
            }

        }

        //return redirect('quankho/ádasdasdasd')->with('success', 'Thành công');

                        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
