<?php

namespace App\Http\Controllers\QuanKho;

use App\Http\Controllers\Controller;
use App\Models\tables;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use function Complex\sec;

class danhSachNhapKhoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        // $danhsach =[];$i = 0;$tong =0 ;
        // $month = date("m");
        // $month--;
        // $tongSoLuong = 0 ; $CB = "";
        // $danhMucHoaChat = DB::table('Danh_muc_hoa_chat')
        //                     ->select('*')
        //                     ->get();
        // foreach($danhMucHoaChat as $dmhc) {
        //     $loHoaChat = DB::table('Lo_hoa_chat')
        //                     ->select('*')
        //                     ->where('idDanh_muc_hoa_chat',$dmhc->idDanh_muc_hoa_chat)
        //                     ->get();
        //     foreach($loHoaChat as $lhc) {
        //         $suDungHoaChat = DB::table('Su_dung_hoa_chat')
        //                             ->select('*')
        //                             ->where('idLo_hoa_chat',$lhc->idLo_hoa_chat)
        //                             ->get();
        //         foreach($suDungHoaChat as $sdhc) {
        //             $nhatKy = DB::table('Nhat_ky_su_dung_hoa_chat')
        //                         ->select('*')
        //                         ->where('idSu_dung_hoa_chat',$sdhc->idSu_dung_hoa_chat)
        //                         ->whereDate('ngay_cap_nhap','<',date("Y-m"."-1"))
        //                         ->whereDate('ngay_cap_nhap','>=',date('Y-'.$month.'-1'))
        //                         ->get();
        //             foreach($nhatKy as $nk) {
        //                 $tong += $nk->so_luong_su_dung_trong_ngay ;
        //             }
        //             $canhBao = DB::table('Canh_bao')
        //                             ->select()
        //                             ->where('idSu_dung_hoa_chat',$sdhc->idSu_dung_hoa_chat)
        //                             ->get();
        //             foreach($canhBao as $cb) {
        //                 $CB = $cb->noi_dung_canh_bao;
        //             }
        //             $tongSoLuong += $sdhc->so_luong_hoa_chat_nhap_ve ;
        //         }
        //         $suDungTrongThang = (int)($tong/$lhc->so_luong_dong_goi);
        //         $soLuongTonThangTruoc = $tongSoLuong - $suDungTrongThang ;
        //         $tonkho = $lhc->so_luong - $tongSoLuong ;

        //         $lohoac = DB::table('Lo_hoa_chat')
        //                     ->select('*')
        //                     ->whereDate('ngay_nhap','<',date("Y-m-d"))
        //                     ->whereDate('ngay_nhap','>=',date('Y-m-1'))
        //                     ->get();
        //         foreach($lohoac as $lhchat) {
        //             $nhaptrongthang = $lhchat->so_luong;
        //         }
        //         $danhsach[$i] = array('danhmuc'=>$dmhc,'lo'=>$lhc,'tondauthangt'=>$soLuongTonThangTruoc,
        //                               'nhaptrongthang'=>$nhaptrongthang, 'sdtrongthangt'=>$suDungTrongThang,
        //                               'tonthangtruoc'=>$soLuongTonThangTruoc,'tonkho'=>$tonkho,'canhbao'=>$CB);//json_encode($CB,JSON_UNESCAPED_UNICODE));
        //                               $i++;
        //                               $tong = 0; $tongSoLuong=0; $CB ="";
        //     }
        // }
        // //dd($danhsach);
        // return view('admin.1_ds_hc', ['danhsach'=>$danhsach]);
        $danhsach = new tables();
        $danhsach = $danhsach->nhapKho();
     
        return view('admin.QuanKho.danhSachNhapKho',['nhapKho'=>$danhsach]);
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
        foreach($request->input('check[]') as $req) {
            
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        //
        $danhSachHoaChat =[];$i=0;
        $danhMucHoaChat = DB::table('danh_muc_hoa_chat')
                            ->select('*')
                            ->get();
        foreach($danhMucHoaChat as $hoaChat) {
            $loHoaChat = DB::table('lo_hoa_chat')
                            ->select('*')
                            ->where('ma_danh_muc_hoa_chat',$hoaChat->ma_danh_muc_hoa_chat)
                            ->get();
            foreach($loHoaChat as $lo) {
                $suDungHoaChat = DB::table('su_dung_hoa_chat')
                                    ->select('*')
                                    ->where('ma_lo_hoa_chat',$lo->ma_lo_hoa_chat)
                                    ->where('so_luong_su_dung','=',0)
                                    ->get();
                foreach($suDungHoaChat as $suDung) {
                    $nhatKy = DB::table('nhat_ky_su_dung_hoa_chat')
                                ->select('*')
                                ->where('ma_su_dung_hoa_chat',$suDung->ma_su_dung_hoa_chat)
                                ->where('so_luong_su_dung_trong_ngay','=',0)
                                ->get();
                    foreach($nhatKy as $nk) {
                        $congTy = DB::table('cong_ty_cung_ung')
                                    ->select('*')
                                    ->where('ma_cong_ty_cung_ung',$lo->ma_cong_ty_cung_ung)
                                    ->get();
                        foreach($congTy as $ct){
                            $danhSachHoaChat[$i] = array('stt'=>$i+1,'hoaChat'=>$hoaChat,'lo'=>$lo,'congTy'=>$ct);
                            $i++;
                        }
                    }
                }
            }
        }
        return view('admin.Quankho.index.suaxoa',['danhSach'=>$danhSachHoaChat]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
