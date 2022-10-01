<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class tables extends Model
{
    //danh sách nhập kho
    public function nhapKho() {
        $danhSachNhapKho =[]; $i = 0;
        $danhMucHoaChat = DB::table('danh_muc_hoa_chat')
                            ->select('*')
                            ->get();
        foreach($danhMucHoaChat as $danhMuc) {
            $loHoaChat = DB::table('lo_hoa_chat')
                            ->where('ma_danh_muc_hoa_chat',$danhMuc->ma_danh_muc_hoa_chat)
                            ->select('ma_cong_ty_cung_ung','so_lo',
                                     'so_luong_tinh','so_luong_dong_goi',
                                     'han_su_dung')
                            ->get();
            foreach($loHoaChat as $lo) {
                $congTyCungUng = DB::table('cong_ty_cung_ung')
                                    ->where('ma_cong_ty_cung_ung',$lo->ma_cong_ty_cung_ung)
                                    ->select('noi_san_xuat','ten_cong_ty_cung_ung')
                                    ->get();
                foreach($congTyCungUng as $congTy) {
                    $danhSachNhapKho[$i] = array('stt'=>$i+1,
                                                'maHoaChat'=>$danhMuc->ma_danh_muc_hoa_chat,
                                                'tenHoaChat'=>$danhMuc->ten_hoa_chat,
                                                'tenNhaThau'=>$congTy->ten_cong_ty_cung_ung,
                                                'nuocSanXuat'=>$congTy->noi_san_xuat,
                                                'soLo'=>$lo->so_lo,
                                                'donViTinh'=>$danhMuc->don_vi_tinh,
                                                'soLuongTinh'=>$lo->so_luong_tinh,
                                                'donViDongGoi'=>$danhMuc->don_vi_dong_goi,
                                                'soLuongDongGoi'=>$lo->so_luong_dong_goi,
                                                'hanSuDung'=>$lo->han_su_dung);
                    $i++;
                }
            }
        }
        return $danhSachNhapKho ;
    }
    // danh sách tồn kho
    public function tonKho() {
        $danhSachTonKho = []; $i = 0; $tong=0;
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
                        foreach($danhMucHoaChat as $danhMuc) {
                            $soLuongTon = $suDung->so_luong_hoa_chat_nhap_ve - $suDung->so_luong_su_dung ;
                            $congTyCungUng = DB::table('cong_ty_cung_ung')
                                                ->select('*')
                                                ->where('ma_cong_ty_cung_ung',$lo->ma_cong_ty_cung_ung)
                                                ->get();
                            foreach($congTyCungUng as $ct){
                                $danhSachTonKho[$i] = array('stt'=>$i+1,'hoaChat'=>$danhMuc,'lo'=>$lo,'soLuongTon'=>$soLuongTon,'phong'=>$p,'congTy'=>$ct,'suDung'=>$suDung);
                                $i++;
                            }
                        }
                    }
            
                }
        
            }
        return $danhSachTonKho;
    }


    public function xuatKho() {
        $danhSachXuatKho = []; $i = 0;
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
                    foreach($danhMucHoaChat as $danhMuc) {
                        $soLuongXuat = $lo->so_luong_hoa_chat_nhap_ve;
                        $danhSachXuatKho[$i] = array('stt'=>$i+1,'hoaChat'=>$danhMuc,'lo'=>$$lo,'soLuongXuat'=>$soLuongXuat);
                        $i++;
                    }
                }
            }
        }
        return $danhSachXuatKho;
    }


    public function hoaChatSuDung() {
        $hoaChatSuDung = []; $i = 0;
        $tongSL = 0; $tonKho = 0; $tonghcnv = 0;
        $danhMucHoaChat = DB::table('danh_muc_hoa_chat')
                            ->select('*')
                            ->get();
        foreach($danhMucHoaChat as $danhMuc) {
            $loHoaChat = DB::table('lo_hoa_chat')
                            ->where('ma_danh_muc_hoa_chat',$danhMuc->ma_danh_muc_hoa_chat)
                            ->select('*')
                            ->get();
            foreach($loHoaChat as $lo) {
                $suDungHoaChat = DB::table('su_dung_hoa_chat')
                                    ->select('*')
                                    ->where('ma_lo_hoa_chat',$lo->ma_lo_hoa_chat)
                                    ->get();
                foreach($suDungHoaChat as $suDung) {
                    $nhatKySuDung = DB::table('nhat_ky_su_dung_hoa_chat')
                                        ->select('*')
                                        ->where('ma_su_dung_hoa_chat',$suDung->ma_su_dung_hoa_chat)
                                        ->whereDate('ngay_cap_nhap','<',date("Y-m-d"))
                                        ->whereDate('ngay_cap_nhap','>=',date('Y-m-1'))
                                        ->get();
                    foreach($nhatKySuDung as $nhatKy) {
                        $tongSL += $nhatKy->so_luong_su_dung_trong_ngay;
                    }
                    $tonghcnv += $suDung->so_luong_hoa_chat_nhap_ve;

                    $month = date("m");
                    $month--;
                    $baoCao = DB::table('bao_cao')
                            ->select('*')
                            ->where('ma_su_dung_hoa_chat',$suDung->ma_su_dung_hoa_chat)
                            ->whereDate('ngay_bao_cao','<',date("Y-m"."-1"))
                            ->whereDate('ngay_bao_cao','>=',date('Y-'.$month.'-1'))
                            ->get();
                    foreach($baoCao as $bc) {
                        $tonKho += $bc->so_luong_ton_truoc_khi_nhap ;
                    }
                }
                $tongSL = (int)($tongSL/$lo->so_luong_tinh);

                $hoaChatSuDung[$i] = array('stt'=>$i+1,'hoaChat'=>$danhMuc,'lo'=>$lo,'tonDauThangTruoc'=>$tonKho,'soLuongDungTrongThang'=>$tongSL);
                $i++;
                $tongSL = 0; $tonKho = 0; $tonghcnv = 0; $tonKho = 0;


            }
            
        }
        return $hoaChatSuDung ;   
    }


    public function duTruHoaChat() {
        $dutru = []; $i=0;
        $baoCao = DB::table('bao_cao')
                    ->select('*')
                    ->whereDate('ngay_bao_cao','<',date("Y-m-d"))
                    ->whereDate('ngay_bao_cao','>=',date('Y-m-1'))
                    ->get();
        foreach($baoCao as $bc) {
            $suDungHoaChat = DB::table('su_dung_hoa_chat')
                                ->select('*')
                                ->where('ma_su_dung_hoa_chat',$bc->ma_su_dung_hoa_chat)
                                ->get();
            foreach($suDungHoaChat as $suDung) {
                $phong = DB::table('phong')
                            ->select('*')
                            ->get();
                foreach($phong as $p) {
                    $loHoaChat = DB::table('lo_hoa_chat')
                                    ->select('*')
                                    ->where('ma_lo_hoa_chat',$suDung->ma_lo_hoa_chat)
                                    ->get();
                    foreach($loHoaChat as $lo) {
                        $danhMucHoaChat = DB::table('danh_muc_hoa_chat')
                                            ->select('*')
                                            ->where('ma_danh_muc_hoa_chat',$lo->ma_danh_muc_hoa_chat)
                                            ->get();
                        foreach($danhMucHoaChat as $danhMuc) {
                            $dutru[$i] = array('hoaChat'=>$danhMuc,'phong'=>$phong ,'baoCao'=>$bc);
                            $i++;
                        }

                    }
                }
            }
        }
        return $dutru ;
    }

    public function nhatKySuDungTrongNgay() {
        $nhatKyHangNgay = []; $i = 0;

        $nhatKySuDung = DB::table('nhat_ky_su_dung_hoa_chat')
                            ->select('*')
                            ->whereDate('ngay_cap_nhap','=',date("Y-m-d"))
                            ->get();
        foreach($nhatKySuDung as $nhatKy) {
            $suDungHoaChat = DB::table('su_dung_hoa_chat')
                                ->select('*')
                                ->where('ma_su_dung_hoa_chat',$nhatKy->ma_su_dung_hoa_chat)
                                ->get();
            foreach($suDungHoaChat as $suDung) {
                $phong = DB::table('phong')
                            ->select('*')
                            ->where('')
                            ->get();
                foreach($phong as $p){
                    $loHoaChat = DB::table('lo_hoa_chat')
                                    ->select('*')
                                    ->where('ma_lo_hoa_chat',$suDung->ma_lo_hoa_chat)
                                    ->get();
                    foreach($loHoaChat as $lo) {
                        $danhMucHoaChat = DB::table('danh_muc_hoa_chat')
                                            ->select('*')
                                            ->where('ma_danh_muc_hoa_chat',$lo->ma_danh_muc_hoa_chat)
                                            ->get();
                        foreach($danhMucHoaChat as $danhMuc) {
                            $nhatKyHangNgay[$i] = array();
                            $i++;
                        }
                    }
                }
            }
            return $nhatKyHangNgay ;
        }
    }

    
    public function đanhSachPhong() {
        $cacPhong = []; $i = 0 ;

        $phong = DB::table('phong')
                    ->select('*')
                    ->get();

        foreach($phong as $p) {
            $cacPhong[$i] = array('stt'=>$i+1,'maPhong'=>$p->ma_phong,"tenPhong"=>$p->ten_phong);
            $i++;
        }
        return $cacPhong ;
    }



}


