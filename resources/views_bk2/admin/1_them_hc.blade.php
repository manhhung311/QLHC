@extends('admin/layouts/default')

{{-- Page title --}}
@section('title')
Thêm Hóa Chất Mới
@stop

{{-- page level styles --}}
@section('header_styles')

<link href="{{ asset('vendors/jasny-bootstrap/css/jasny-bootstrap.css') }}" rel="stylesheet" type="text/css" />
<link href="{{ asset('vendors/iCheck/css/all.css') }}" rel="stylesheet" type="text/css" />
<link href="{{ asset('vendors/pickadate/css/default.css') }}" rel="stylesheet" type="text/css" />
<link href="{{ asset('vendors/pickadate/css/default.date.css') }}" rel="stylesheet" type="text/css" />
<link href="{{ asset('vendors/pickadate/css/default.time.css') }}" rel="stylesheet" type="text/css" />
<link href="{{ asset('vendors/airDatepicker/css/datepicker.min.css') }}" rel="stylesheet" type="text/css" />
<link href="{{ asset('vendors/flatpickr/css/flatpickr.min.css') }}" rel="stylesheet" type="text/css" />
<link href="{{ asset('css/pages/adv_date_pickers.css') }}" rel="stylesheet" type="text/css" />

<link rel="stylesheet" href="{{ asset('vendors/animate/animate.min.css') }}" />
<link rel="stylesheet" href="{{ asset('vendors/hover/css/hover-min.css') }}" />
<link href="{{ asset('css/pages/transitions.css') }}" rel="stylesheet" />
<style>
.container {
    margin-top: 20px;
}

.image-preview-input {
    position: relative;
    overflow: hidden;
    margin: 0px;
    color: #333;
    background-color: #fff;
    border-color: #ccc;
}

.image-preview-input input[type=file] {
    position: absolute;
    top: 0;
    right: 0;
    margin: 0;
    padding: 0;
    font-size: 20px;
    cursor: pointer;
    opacity: 0;
    filter: alpha(opacity=0);
}

.image-preview-input-title {
    margin-left: 2px;
}

.image_radius {
    border-top-right-radius: 4px !important;
    border-top-left-radius: 0 !important;
    border-bottom-left-radius: 0 !important;
    border-bottom-right-radius: 4px !important;
}

.fileinput .thumbnail>img {
    width: 100%;
}

.color_a {
    color: #333;
}

.btn-file>input {
    width: auto;
}
</style>

@stop
{{-- Page content --}}
@section('content')

<section class="content-header">
    <!--section starts-->
    <h1>Nhập Hóa Chất</h1>
    <ol class="breadcrumb">
        <li>
            <a href="{{ route('admin.dashboard') }}">
                <i class="livicon" data-name="home" data-size="14" data-loop="true"></i>
                Trang Chủ
            </a>
        </li>
        <li>
            <a href="#">Nhập Hóa Chất</a>
        </li>
        
    </ol>
</section>
<!--section ends-->
<section class="content pl-3 pr-3">
    <!--main content-->
    <div class="row">
        <!--row starts-->
        <div class="col-sm-9 col-md-9 col-full-width-right">
            <!--lg-6 starts-->
            <!--basic form starts-->
            <div class="my-3">
                <div class="card " id="hidepanel1">
                    <div class="card-header bg-primary text-white ">
                        <span>
                            <i class="livicon" data-name="clock" data-size="16" data-loop="true" data-c="#fff"
                                data-hc="white"></i>
                            Nhập Hóa Chất
                        </span>
                        <span class="float-right">
                            <i class="fa fa-chevron-up clickable"></i>
                            <i class="fa fa-times removepanel clickable"></i>
                        </span>
                    </div>
                    <div class="card-body">
                        <form class="form-horizontal" method="post"
                            action="1_them_hc">
                            <div class="form-group">
                                <div class="row">
                                    <label class="col-md-3 col-lg-3 col-12 control-label" for="name">Tên Hóa
                                        Chất</label>
                                    <div class="col-md-9 col-lg-9 col-12">
                                        <input id="name" name="ten_hoa_chat" type="text" placeholder="Tên Hóa Chất"
                                            class="form-control">
                                    </div>
                                </div>
                            </div>
                            <!-- name input-->

                            <div class="form-group">
                                <div class="row">
                                    <label class="col-md-3 col-lg-3 col-12 control-label" for="name">Đơn Vị</label>
                                    <div class="col-md-9 col-lg-9 col-12">
                                        <input id="name" name="don_vi_tinh" type="text" placeholder="Đơn vị"
                                            class="form-control">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <label class="col-md-3 col-lg-3 col-12 control-label" for="name">Quy Cách Đóng
                                        Gói</label>
                                    <div class="col-md-9 col-lg-9 col-12">
                                        <input id="name" name="don_vi_dong_goi" type="text"
                                            placeholder="Quy cách đóng gói" class="form-control">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <label class="col-md-3 col-lg-3 col-12 control-label" for="name">Số Lượng</label>
                                    <div class="col-md-9 col-lg-9 col-12">
                                        <input id="name" name="so_luong" type="number" placeholder="Số lượng"
                                            class="form-control" min="0">
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="row">
                                    <label class="col-md-3 col-lg-3 col-12 control-label" for="name">Ngày Hết Hạn :</label>
                                    <div class=" col-md-9 col-lg-9 col-12">
                                        <input class="flatpickr flatpickr-input form-control" type="text"
                                            placeholder="select date">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <label class="col-md-3 col-lg-3 col-12 control-label" for="name">Nước Sản
                                        Xuất</label>
                                    <div class="col-md-9 col-lg-9 col-12">
                                        <input id="name" name="noi_san_xuat" type="text" placeholder="Nước sản xuất"
                                            class="form-control">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <label class="col-md-3 col-lg-3 col-12 control-label" for="name">Công Ty Cung
                                        Ứng</label>
                                    <div class="col-md-9 col-lg-9 col-12">
                                        <input id="name" name="ten_cong_ty_cung_ung" type="text"
                                            placeholder="Công Ty Cung Ứng" class="form-control">
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="row">
                                    <label class="col-md-3 col-lg-3 col-12 control-label" for="upload">File
                                        Upload</label>
                                    <div class="col-md-9 col-12 col-lg-9">
                                        <div class="input-group image-preview">
                                            <input type="text" class="form-control image-preview-filename"
                                                disabled="disabled">
                                            <!-- don't give a name === doesn't send on POST/GET -->
                                            <span class="input-group-btn">
                                                <!-- image-preview-clear button -->
                                                <button type="button" class="btn btn-secondary image-preview-clear"
                                                    style="display:none; border-radius:0 !important; border: 1px solid rgba(0, 0, 0, 0.16);">
                                                    <span class="fa  fa-times"></span> Clear
                                                </button>
                                                <!-- image-preview-input -->
                                                <div class="btn btn-secondary image_radius image-preview-input"
                                                    style="margin-left:-3px;">
                                                    <span class="fa fa-folder-open"></span>
                                                    <span class="image-preview-input-title">Browse</span>
                                                    <input type="file" accept="image/png, image/jpeg, image/gif"
                                                        name="" /> <!-- rename it -->
                                                </div>
                                            </span>
                                        </div><!-- /input-group image-preview [TO HERE]-->
                                    </div>
                                </div>
                            </div>
                            <!-- Form actions -->
                            <div class="form-position">
                                <div class="row">
                                    <div class="col-md-12  col-sm-12 col-12  col-lg-12 text-right">
                                        <button type="submit" class="btn btn-primary btn-sm hvr-wobble-horizontal">Submit</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <!--basic form 2 starts-->

        </div>
        <!--main content ends-->
</section>
<!-- content -->
@stop

{{-- page level scripts --}}
@section('footer_scripts')

<script src="{{ asset('vendors/jasny-bootstrap/js/jasny-bootstrap.js') }}"></script>
<script src="{{ asset('vendors/iCheck/js/icheck.js') }}"></script>
<script src="{{ asset('js/pages/form_examples.js') }}"></script>
<script src="{{ asset('vendors/pickadate/js/picker.js') }}" type="text/javascript"></script>
<script src="{{ asset('vendors/pickadate/js/picker.date.js') }}" type="text/javascript"></script>
<script src="{{ asset('vendors/pickadate/js/picker.time.js') }}" type="text/javascript"></script>
<script src="{{ asset('vendors/flatpickr/js/flatpickr.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('vendors/airDatepicker/js/datepicker.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('vendors/airDatepicker/js/datepicker.en.js') }}" type="text/javascript"></script>
<script src="{{ asset('js/pages/custom_datepicker.js') }}" type="text/javascript"></script>


@stop