@extends('admin/layouts/default')

{{-- Page title --}}
@section('title')
Trang Chủ
@parent
@stop

{{-- page level styles --}}
@section('header_styles')
<link rel="stylesheet" type="text/css" href="{{ asset('vendors/datatables/css/buttons.bootstrap4.css') }}" />
<link rel="stylesheet" type="text/css" href="{{ asset('vendors/datatables/css/colReorder.bootstrap4.css') }}" />
<link rel="stylesheet" type="text/css" href="{{ asset('vendors/datatables/css/dataTables.bootstrap4.css') }}" />
<link rel="stylesheet" type="text/css" href="{{ asset('vendors/datatables/css/rowReorder.bootstrap4.css') }}" />
<link rel="stylesheet" type="text/css" href="{{ asset('vendors/datatables/css/scroller.bootstrap4.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('css/pages/tables.css') }}" />

<!--hiệu ứng các nút -->
<link rel="stylesheet" href="{{ asset('vendors/animate/animate.min.css') }}" />
<link rel="stylesheet" href="{{ asset('vendors/hover/css/hover-min.css') }}" />
<link href="{{ asset('css/pages/transitions.css') }}" rel="stylesheet" />

<!--Của modals-->
<link href="{{ asset('css/pages/advmodals.css') }}" rel="stylesheet" />

<style>
#table1_filter {
    margin-bottom: 10px;
}
</style>
@stop

{{-- Page content --}}
@section('content')

<section class="content-header">
    <!--section starts-->
    <h1>Quản Lý Hóa CHất</h1>
    <ol class="breadcrumb">
        <li>
            <a href="{{ route('admin.dashboard') }}">
                <i class="livicon" data-name="home" data-size="14" data-loop="true"></i>
                Trang Chủ
            </a>
        </li>
    </ol>
</section>

<!-- Main content -->
<section class="content pr-3 pl-3">
    <!---Layout_1-->
    @include('admin.Quankho.index.layout_1')

    <div class="row">
        <div class="col-lg-12 my-3">
            <div class="card filterable">
                <div class="card-header bg-success text-white clearfix  ">
                    <div class="float-left">
                        <div class="caption">
                            <i class="livicon" data-name="camera" data-size="16" data-loop="true" data-c="#fff"
                                data-hc="white"></i>
                            Danh Sách Hóa Chất
                        </div>
                    </div>
                    <div class="float-right">
                        <a class="btn btn-primary btn-sm hvr-wobble-vertical "
                            href="http://localhost/laravel/public/admin/1_nhap_hc">Nhập kho</a>
                        <a class="btn btn-primary btn-sm btn-large hvr-wobble-vertical" data-toggle="modal"
                            data-href="#full-width" href="#full-width">Phân kho</a>
                    </div>
                </div>

                <div class="card-body table-responsive-lg table-responsive-sm table-responsive-md">
                    <ul class="nav nav-tabs">
                        <li class=" nav-item ">
                            <a href="#tab_1" data-toggle="tab" class="nav-link active ">Danh Sách Hóa Chất</a>
                        </li>
                        <li class="nav-item">
                            <a href="#tab_2" data-toggle="tab" class="nav-link">Danh Sách Nhập Kho</a>
                        </li>
                        <li class="nav-item">
                            <a href="#tab_3" data-toggle="tab" class="nav-link">Danh Sách Tồn Kho</a>
                        </li>
                        <li class="nav-item">
                            <a href="#tab_4" data-toggle="tab" class="nav-link">Danh Sách Dự Trù</a>
                        </li>
                        <li class=" nav-item ml-auto">
                            <a href="#" class="text-muted nav-link">
                                <i class="fa fa-gear"></i>
                            </a>
                        </li>
                    </ul>

                    <div class="tab-content" id="slim2">

                        <div class="tab-pane active" id="tab_1">

                            <!--Danh sách hóa chất bảng 1 -->
                            <table class="table table-striped table-bordered" id="table1" width="100%">
                                <thead>
                                    <tr>
                                        <th>STT</th>
                                        <th>Mã Hóa Chất</th>
                                        <th>Tên Hóa Chất</th>
                                        <th>Phòng Sử Dụng</th>
                                        <th>Số Lô</th>
                                        <th>Đơn Vị Tính</th>
                                        <th>Đơn Vị Đóng Gói</th>
                                        <th>Số Lượng Đóng Gói</th>
                                        <th>Hạn Sử Dụng</th>
                                        <th>Tồn Kho Đầu Tháng Trước</th>
                                        <th>SL Sử Dụng Trong Tháng</th>
                                        <th>SL Hỏng Lỗi</th>
                                        <th>Tồn Kho Hiện Tại</th>
                                    </tr>
                                </thead>
                                <tbody>

                                </tbody>
                            </table>
                        </div>
                        <!--End tab1-->

                        <div class="tab-pane" id="tab_2">
                            <div class="btn-group" style="margin: 10px 0;">

                            </div>
                            <div class="float-right">
                                <a class="btn btn-raised btn-success btn-large" data-toggle="modal"
                                    data-href="#responsive" href="#responsive">Sửa Xóa</a>
                            </div>
                            <!--Danh sách hóa chất nhập kho bảng 2-->
                            <table class="table table-striped table-bordered" id="table6" width="100%">
                                <thead>
                                    <tr>
                                        <th>STT</th>
                                        <th>Mã Hóa Chất</th>
                                        <th>Tên Hóa Chất</th>
                                        <th>Tên Nhà Thầu</th>
                                        <th>Nước Sản Xuất</th>
                                        <th>Số Lô</th>
                                        <th>Đơn Vị Tính</th>
                                        <th>Số Lượng Tính</th>
                                        <th>Đơn Vị Đóng Gói</th>
                                        <th>Số Lượng Gói</th>
                                        <th>Hạn Sử Dụng</th>
                                    </tr>
                                </thead>
                                <tbody>

                                </tbody>
                            </table>
                        </div>
                        <!--End tab2-->

                        <div class="tab-pane" id="tab_3">
                            <!--Danh sách tồn kho bảng 3-->
                            <table class="table table-striped table-bordered" id="table5" width="100%">
                                <thead>
                                    <tr>
                                        <th>STT</th>
                                        <th>Mã Hóa Chất</th>
                                        <th>Tên Hóa Chất</th>
                                        <th>Tên Nhà Thầu</th>
                                        <th>Nước Sản Xuất</th>
                                        <th>Phòng Xét Nghiệm</th>
                                        <th>Đơn Vị Tính</th>
                                        <th>Đơn Vị Đóng Gói</th>
                                        <th>Tồn Kho Hiện Tại</th>
                                    </tr>
                                </thead>
                                <tbody>

                                </tbody>
                            </table>
                        </div>
                        <!--End tab3-->

                        <div class="tab-pane" id="tab_4">
                            <!--Gửi của danh sách dự trù-->
                            <form method="post" action="http://localhost:8080/laravel/public/quankho/1_ds_dt">
                                <div class="float-right">
                                    <a class="btn btn-raised btn-primary btn-large hvr-wobble-vertical"
                                        data-toggle="modal" data-href="#stack1" href="#stack1">Dự trù mới</a>
                                    <button type="submit" class="btn btn-primary btn-sm hvr-wobble-vertical"
                                        value="gửi">Xuất</button>
                                </div>
                                <!--Danh sách hóa chất dự trù bảng 4-->
                                <table class="table table-striped table-bordered" id="table4" width="100%">
                                    <thead>
                                        <tr>
                                            <th>STT</th>
                                            <th>Mã Hóa Chất</th>
                                            <th>Tên Hóa Chất</th>
                                            <th>Đơn Vị Tính</th>
                                            <th>Số Lượng Dự Trù</th>
                                            <th>Phòng Dự Trù</th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                    </tbody>
                                </table>
                            </form>
                        </div>
                        <!--End tab4-->
                    </div>
                    <!--End tab-->
                </div>
            </div>
        </div>
    </div>

    <div class="extended_modals">
        <!--Bảng của Phân hóa chất-->
        <div class="modal fade in" id="full-width" tabindex="-1" role="dialog" aria-hidden="false">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">Phân hóa chất</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                    </div>
                    <form class="form-horizontal" action="#">
                        <div class="card-body table-responsive-lg table-responsive-sm table-responsive-md">
                            <table class="table table-striped table-bordered width100" id="table2">
                                <thead>
                                    <tr>
                                        <th>
                                            <input type="checkbox" id="selecctall" />
                                            Chọn Hóa Chất
                                        </th>
                                        <th>Mã Hóa Chất</th>
                                        <th>Tên Hóa Chất</th>
                                        <th>Tên Nhà Thầu</th>
                                        <th>Nước Sản Xuất</th>
                                        <th>Số Lô</th>
                                        <th>Đơn Vị Tính</th>
                                        <th>Số Lượng Tính</th>
                                        <th>Hạn Sử Dụng</th>
                                        <th>Tồn Kho Hiện Tại</th>
                                        <th>Số Lượng Xuất</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>
                                            <label>
                                                <input class="checkbox1" type="checkbox" name="check[]" value="item1">
                                            </label>
                                        </td>
                                        <td>
                                            Na123
                                        </td>
                                        <td>
                                            Môi trường vận chuyển virus hô hấp
                                        </td>
                                        <td>
                                            Tân Đẹp Trai
                                        </td>
                                        <td>
                                            Việt Nam
                                        </td>
                                        <td>
                                            1145
                                        </td>
                                        <td>
                                            Hộp
                                        </td>
                                        <td>
                                            300
                                        </td>
                                        <td>
                                            05/11/2025
                                        </td>
                                        <td>
                                            3000
                                        </td>
                                        <td>
                                            <input type="number" class="form-control" id="row-1-number"
                                                name="row-1-number" min="0">
                                        </td>

                                    </tr>

                                </tbody>
                            </table>
                        </div>
                        <div class="modal-footer">
                            <button type="button" data-dismiss="modal" class="btn btn-secondary">Close</button>
                            <div class="form-position">
                                <div class="row">
                                    <div class="col-md-3 ">
                                        <button type="button" class="btn btn-info" data-toggle="modal"
                                            data-target="#exampleModalCenter">Xuất
                                        </button>
                                        <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog"
                                            aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                            <div class="modal-dialog modal-dialog-centered" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header bg-info text-white">
                                                        <h2 class="modal-title">Xuất Về Phòng</h2>
                                                        <button type="button" class="close text-white"
                                                            data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <div class="form-group">
                                                            <label>Chọn Phòng</label>
                                                            <div class="radio">
                                                                <label>
                                                                    <input type="radio" name="optionsRadios" class=""
                                                                        id="optionsRadios1" value="option1">&nbsp; Phòng
                                                                    A
                                                                </label>
                                                            </div>
                                                            <div class="radio">
                                                                <label>
                                                                    <input type="radio" name="optionsRadios" class=""
                                                                        id="optionsRadios2" value="option2">&nbsp; Phòng
                                                                    B</label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary"
                                                            data-dismiss="modal">Hủy
                                                        </button>
                                                        <div class="form-position">
                                                            <div class="row">
                                                                <div
                                                                    class="col-md-12  col-sm-12 col-12  col-lg-12 text-right">
                                                                    <button type="submit"
                                                                        class="btn btn-primary btn-sm">Xuất</button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <!--Bảng của chỉnh sửa xóa-->
        <div class="modal fade in" id="responsive" tabindex="-1" role="dialog" aria-hidden="false">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title mr-auto">Chỉnh Sửa Hóa Chất</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                    </div>
                    <form class="form-horizontal" method="post"
                        action="http://localhost:8080/laravel/public/quankho/1_them_hc">
                        <table class="table table-striped table-bordered width100" id="">
                            <thead>
                                <tr>
                                    <th>STT</th>
                                    <th>Mã Hóa Chất</th>
                                    <th>Tên Hóa Chất</th>
                                    <th>Tên Nhà Thầu</th>
                                    <th>Nước Sản Xuất</th>
                                    <th>Số Lô</th>
                                    <th>Đơn Vị Tính</th>
                                    <th>Số Lượng Tính</th>
                                    <th>Đơn Vị Đóng Gói</th>
                                    <th>Số Lượng Gói</th>
                                    <th>Hạn Sử Dụng</th>
                                </tr>
                            </thead>

                            <tbody>
                                <tr>
                                    <td>
                                        1
                                    </td>
                                    <td>
                                        <input type="text" class="form-control" id="row-1-position"
                                            name="row-1-position" value="System Architect">
                                    </td>
                                    <td>
                                        <input type="text" class="form-control" id="row-1-age" name="row-1-age"
                                            value="61">
                                    </td>
                                    <td>
                                        <input type="text" class="form-control" id="row-1-position"
                                            name="row-1-position" value="System Architect">
                                    </td>
                                    <td>
                                        <input type="text" class="form-control" id="row-1-age" name="row-1-age"
                                            value="61">
                                    </td>
                                    <td>
                                        <input type="text" class="form-control" id="row-1-position"
                                            name="row-1-position" value="System Architect">
                                    </td>
                                    <td>
                                        <input type="text" class="form-control" id="row-1-age" name="row-1-age"
                                            value="61">
                                    </td>
                                    <td>
                                        <input type="text" class="form-control" id="row-1-position"
                                            name="row-1-position" value="System Architect">
                                    </td>
                                    <td>
                                        <input type="text" class="form-control" id="row-1-age" name="row-1-age"
                                            value="61">
                                    </td>
                                    <td>
                                        <input type="text" class="form-control" id="row-1-position"
                                            name="row-1-position" value="System Architect">
                                    </td>
                                    <td>
                                        <input type="text" class="form-control" id="row-1-age" name="row-1-age"
                                            value="61">
                                    </td>
                                </tr>

                            </tbody>
                        </table>
                        <div class="modal-footer">
                            <button type="button" data-dismiss="modal" class="btn btn-secondary">Close</button>
                            <button type="button" class="btn btn-primary">Save changes</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>


        <!--Bảng của hóa chất dự trừ-->
        <div class="modal fade bs-example-modal-sm in" id="stack1" tabindex="-1" role="dialog" aria-hidden="false">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">Hóa Chất Dự Trù</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                    </div>
                    <form class="form-horizontal" method="post"
                        action="http://localhost:8080/laravel/public/quankho/1_them_hc">
                        <div class="row">
                            <!--row starts-->
                            <div class="col-sm-9 col-md-9 ">
                                <div>
                                    <div class=" " id="hidepanel1">

                                        <div class="card-body">
                                            <div class="form-group">
                                                <div class="row">
                                                    <label class="col-md-3 col-lg-3 col-12 control-label" for="name">Tên
                                                        Hóa
                                                        Chất</label>
                                                    <div class="col-md-9 col-lg-9 col-12">
                                                        <input id="name" name="ten_hoa_chat" type="text"
                                                            placeholder="Tên Hóa Chất" class="form-control">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <div class="row">
                                                    <label class="col-md-3 col-lg-3 col-12 control-label" for="name">Đơn
                                                        Vị Tính</label>
                                                    <div class="col-md-9 col-lg-9 col-12">
                                                        <input id="name" name="don_vi_tinh" type="text"
                                                            placeholder="Đơn vị" class="form-control">
                                                    </div>
                                                </div>
                                            </div>
                                            
                                            <div class="form-group">
                                                <div class="row">
                                                    <label class="col-md-3 col-lg-3 col-12 control-label" for="name">Số
                                                        Lượng Dự Trù</label>
                                                    <div class="col-md-9 col-lg-9 col-12">
                                                        <input id="name" name="so_luong" type="number"
                                                            placeholder="Số lượng" class="form-control" min="0">
                                                    </div>
                                                </div>
                                            </div>
                                            
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" data-dismiss="modal" class="btn btn-secondary">Close</button>
                            <div class="form-position">
                                <div class="row">
                                    <div class="col-md-12  col-sm-12 col-12  col-lg-12 text-right">
                                        <button type="submit" class="btn btn-primary btn-sm hvr-wobble-horizontal"
                                            id="btn16">Submit</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

</section>

@stop

{{-- page level scripts --}}
@section('footer_scripts')
<script type="text/javascript" src="{{ asset('vendors/datatables/js/jquery.dataTables.js') }}"></script>
<script type="text/javascript" src="{{ asset('vendors/jeditable/js/jquery.jeditable.js') }}"></script>
<script type="text/javascript" src="{{ asset('vendors/datatables/js/dataTables.bootstrap4.js') }}"></script>
<script type="text/javascript" src="{{ asset('vendors/datatables/js/dataTables.buttons.js') }}"></script>
<script type="text/javascript" src="{{ asset('vendors/datatables/js/dataTables.colReorder.js') }}"></script>
<script type="text/javascript" src="{{ asset('vendors/datatables/js/dataTables.responsive.js') }}"></script>
<script type="text/javascript" src="{{ asset('vendors/datatables/js/dataTables.rowReorder.js') }}"></script>
<script type="text/javascript" src="{{ asset('vendors/datatables/js/buttons.colVis.js') }}"></script>
<script type="text/javascript" src="{{ asset('vendors/datatables/js/buttons.html5.js') }}"></script>
<script type="text/javascript" src="{{ asset('vendors/datatables/js/buttons.print.js') }}"></script>
<script type="text/javascript" src="{{ asset('vendors/datatables/js/buttons.bootstrap4.js') }}"></script>
<script type="text/javascript" src="{{ asset('vendors/datatables/js/pdfmake.js') }}"></script>
<script type="text/javascript" src="{{ asset('vendors/datatables/js/vfs_fonts.js') }}"></script>
<script type="text/javascript" src="{{ asset('vendors/datatables/js/dataTables.scroller.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/pages/table-advanced.js') }}"></script>

<script type="text/javascript">
$(document).ready(function() {

    $('#selecctall').click(function(event) { //on click
        if (this.checked) { // check select status
            $('.checkbox1').each(function() { //loop through each checkbox
                this.checked = true; //select all checkboxes with class "checkbox1"            
            });

        } else {
            $('.checkbox1').each(function() { //loop through each checkbox
                this.checked =
                    false; //deselect all checkboxes with class "checkbox1"                    
            });
        }
    });

});
</script>

<script type="text/javascript">
$(document).ready(function() {
    //table tools example
    $('#table6').DataTable({
        dom: '<"m-t-10"B><"m-t-10 pull-left"f><"m-t-10 pull-right"l>rt<"pull-left m-t-10"i><"m-t-10 pull-right"p>',
        buttons: ['copy', 'csv', 'excel', 'pdf', 'print'],
    });
    $('#table5').DataTable({
        dom: '<"m-t-10"B><"m-t-10 pull-left"f><"m-t-10 pull-right"l>rt<"pull-left m-t-10"i><"m-t-10 pull-right"p>',
        buttons: ['copy', 'csv', 'excel', 'pdf', 'print'],
    });
    $('#table4').DataTable({
        dom: '<"m-t-10"B><"m-t-10 pull-left"f><"m-t-10 pull-right"l>rt<"pull-left m-t-10"i><"m-t-10 pull-right"p>',
        buttons: ['copy', 'csv', 'excel', 'pdf', 'print'],
    });
    //re-order columns

});
</script>

<script>
$("#stack2,#stack3").on('hidden.bs.modal', function(e) {
    $('body').addClass('modal-open');
});
</script>

@stop