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
                <i class="livicon" id="load" data-name="home" data-size="14" data-loop="true"></i>
                Trang Chủ
            </a>
        </li>
    </ol>
</section>

<!-- Main content -->
<section id="abc" class="content pr-3 pl-3">

    <!---Layout_1 Gồm có bảng cảnh báo vào biểu đồ cột-->
    @include('admin.Quankho.index.layout_1')

    <!--Các bảng-->
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
                            href="quankho/1_nhap_hc">Nhập kho</a>
                        <a class="btn btn-primary btn-sm btn-large hvr-wobble-vertical" data-toggle="modal"
                            data-href="#full-width" href="#full-width">Phân kho</a>
                    </div>
                </div>

                <div class="card-body table-responsive-lg table-responsive-sm table-responsive-md">
                    <ul class="nav nav-tabs">
                        <li class=" nav-item ">
                            <a id="danhSachHoaChat" href="#tab_1" data-toggle="tab" class="nav-link active ">Danh Sách Hóa Chất</a>
                        </li>
                        <li class="nav-item">
                            <a id="danhSachNhapKho" href="#tab_2" data-toggle="tab" class="nav-link">Danh Sách Nhập Kho</a>
                        </li>
                        <li class="nav-item">
                            <a id="danhSachTonKho" href="#tab_3" data-toggle="tab" class="nav-link">Danh Sách Tồn Kho</a>
                        </li>
                        <li class="nav-item">
                            <a id="danhSachDuTru" href="#tab_4" data-toggle="tab" class="nav-link">Danh Sách Dự Trù</a>
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
                                <tbody id="nhap">
                                    
                                @foreach($danhSachHoaChat as $danhSach)
                                    <tr onclick="bieuDo({{ $danhSach['hoaChat']->ma_danh_muc_hoa_chat }})">
                                        <td>
                                            {{ $danhSach['stt'] }}
                                        </td>
                                        <td>
                                        {{ $danhSach['hoaChat']->ma_danh_muc_hoa_chat }}
                                        </td>
                                        <td>
                                        {{ $danhSach['hoaChat']->ten_hoa_chat }}
                                        </td>
                                        <td>
                                        {{ $danhSach['phong']->ten_phong }}
                                        </td>
                                        <td>
                                        {{ $danhSach['lo']->so_lo }}
                                        </td>
                                        <td>
                                        {{ $danhSach['hoaChat']->don_vi_tinh }}
                                        </td>
                                        <td>
                                        {{ $danhSach['hoaChat']->don_vi_dong_goi }}
                                        </td>
                                        <td>
                                        {{ $danhSach['lo']->so_luong_dong_goi }}
                                        </td>
                                        <td>
                                        {{ $danhSach['lo']->han_su_dung }}
                                        </td>
                                        <td>
                                        {{ $danhSach['tonDauThangTruoc'] }}
                                        </td>
                                        <td>
                                            <P class="money">{{ $danhSach['soLuongDungTrongThang'] }}</P>
                                        </td>
                                        <td>
                                            <P class="money">{{ $danhSach['loi'] }}</P>
                                        </td>
                                        <td>
                                            <P class="money">{{ $danhSach['tonKho'] }}</P>
                                        </td>
                                    </tr>
                                    @endforeach
       


                                </tbody>
                            </table>
  
                        </div>
                        <!--End tab1-->


                        <div class="tab-pane" id="tab_2">
                           <!--danh sách nhập kho-->
                           <div class="btn-group" style="margin: 10px 0;">

</div>
<div class="float-right">
    <a id="danhsach" class="btn btn-raised btn-success btn-large"  href="quankho/1_suaxoa_hc">Sửa Xóa</a>
</div id="nhapkho">
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
                                <tbody id="nhap2">
                                @foreach( $nhapKho as $danhSach)
                                        <tr>
                                        <td>
                                        {{$danhSach['stt']}}
                                        </td>
                                        <td>
                                        {{$danhSach['maHoaChat']}}
                                        </td>
                                        <td>
                                        {{$danhSach['tenHoaChat']}}
                                        </td>
                                        <td>
                                        {{$danhSach['tenNhaThau']}}
                                        </td>
                                        <td>
                                        {{$danhSach['nuocSanXuat']}}
                                        </td>
                                        <td>
                                        {{$danhSach['soLo']}}
                                        </td>
                                        <td>
                                        {{$danhSach['donViTinh']}}
                                        </td>
                                        <td>
                                        {{$danhSach['soLuongTinh']}}
                                        </td>

                                        <td>
                                            <P class="money">{{$danhSach['donViDongGoi']}}</P>
                                        </td>
                                        <td>
                                            {{$danhSach['soLuongDongGoi']}}
                                        </td>
                                        <td>
                                        {{$danhSach['hanSuDung']}}
                                        </td>
                                        </tr>

                                @endforeach
                    
                    
                                </tbody>
                            </table>
                                
                        </div>
                        <!--End tab2-->

                        <div class="tab-pane" id="tab_3">
                           <!--danh sách tồn kho-->
                           <form method="post" action="quankho/dstonkho">
                               @csrf
                                <div class="float-right">
                                    <button type="submit" class="btn btn-primary btn-sm hvr-wobble-vertical"
                                        value="gửi">Đặt Mức Độ Cảnh Báo</button>
                                </div>
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
                                            <th>Mức Độ Cảnh Báo</th>
                                        </tr>
                                    </thead>
                                    <tbody id="nhap3">
                                        
                                    @foreach($danhSachTonKho as $danhSach)
                                        <tr>
                                            <td>
                                                {{$danhSach['stt']}}
                                            </td>
                                            <td>
                                                {{$danhSach['hoaChat']->ma_danh_muc_hoa_chat}}
                                            </td>
                                            <td>
                                                {{$danhSach['hoaChat']->ten_hoa_chat}}
                                            </td>
                                            <td>
                                            {{$danhSach['congTy']->ten_cong_ty_cung_ung}}
                                            </td>
                                            <td>
                                            {{$danhSach['congTy']->noi_san_xuat}}
                                            </td>
                                            <td>
                                            {{$danhSach['phong']->ten_phong}}
                                            </td>
                                            <td>
                                            {{$danhSach['hoaChat']->don_vi_tinh}}
                                            </td>
                                            <td>
                                            {{$danhSach['hoaChat']->don_vi_dong_goi}}
                                            </td>

                                            <td>
                                                <P class="money">{{$danhSach['soLuongTon']}}</P>
                                            </td>
                                            <td>
                                                <input type="number" class="money form-control" id="row-1-number"
                                                    name="list[{{$danhSach['lo']->ma_lo_hoa_chat}}]" value="{{$danhSach['lo']->nguong_canh_bao}}" min="0">
                                                <input type="hidden" name="check[]" value="{{$danhSach['lo']->ma_lo_hoa_chat}}">
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </form>
                        </div>
                        <!--End tab3-->

                        <div class="tab-pane" id="tab_4">
                            <!--Gửi của danh sách dự trù-->
                            <form method="post" action="">
                                <!-- <div class="float-right">
                                    <a class="btn btn-raised btn-primary btn-large hvr-wobble-vertical"
                                        data-toggle="modal" data-href="#stack1" href="#stack1">Dự trù mới</a>
                                    <button type="submit" class="btn btn-primary btn-sm hvr-wobble-vertical"
                                        value="gửi">Xuất</button>
                                </div> -->
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
                                    <tbody id="nhap4" >
                                    @foreach($danhSachDuTru as $ds) 
                                    <tr>
                                        <td>
                                        {{$ds['stt']}}
                                        </td>
                                        <td>
                                        {{$ds['hoaChat']->ma_danh_muc_hoa_chat}}
                                        </td>
                                        <td>
                                        {{$ds['hoaChat']->ten_hoa_chat}}
                                        </td>
                                        <td>
                                        {{$ds['hoaChat']->don_vi_tinh}}
                                        </td>
                                        <td>
                                            <input type="number" class="money form-control" id="row-1-number"
                                                name="row-1-number" value="{{$ds['baoCao']->so_luong_du_tru}}" min="0">
                                            
                                        </td>
                                        <td>
                                            {{$ds['phong']->ten_phong}}
                                        </td>
                                    </tr>
                                    @endforeach
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

    <!--Các thẻ modals như phân kho, sửa xóa, dự trù mới-->
    @include('admin.Quankho.index.modals_trangchu')
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


<!--All checkbox-->
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

});
</script>

<script type="text/javascript">
    function bieuDo(a) {
        console.log('mã lô hóa chất ',a);
        $("#bieudo").ready(function(){

$.ajax({
    type: 'GET',
    url: 'quankho/tonkho123',
    success: function(data){
            console.log(data);
             if(data != null) $("#loadbieudo").html(data);
     }
 });
});
    }
</script>

<script type="text/javascript">
$(document).ready(function() {
    var oTable;
    /* Apply the jEditable handlers to the table */
    $('#inline_edit tbody td').editable(
        function(sValue) {
            /* Get the position of the current data from the node */
            var aPos = oTable.fnGetPosition(this);

            /* Get the data array for this row */
            var aData = oTable.fnGetData(aPos[0]);

            /* Update the data array and return the value */
            aData[aPos[1]] = sValue;
            return sValue;
        }, {
            onblur: 'submit'
        }
    );
    /* Submit the form when bluring a field */

    /* Init DataTables */
    oTable = $('#inline_edit').dataTable();
});
</script>

<!--Format số hàng nghìn có thêm dấu-->
<script type="text/javascript" src="{{ asset('js/format/jquery-3.2.1.slim.min.js') }}"></script>
<!-- <script type="text/javascript">
(function($) {
    $.fn.simpleMoneyFormat = function() {
        this.each(function(index, el) {
            var elType = null; // input or other
            var value = null;
            // get value
            if ($(el).is('input') || $(el).is('textarea')) {
                value = $(el).val().replace(/,/g, '');
                elType = 'input';
            } else {
                value = $(el).text().replace(/,/g, '');
                elType = 'other';
            }
            // if value changes
            $(el).on('paste keyup', function() {
                value = $(el).val().replace(/,/g, '');
                formatElement(el, elType, value); // format element
            });
            formatElement(el, elType, value); // format element
        });

        function formatElement(el, elType, value) {
            var result = '';
            var valueArray = value.split('');
            var resultArray = [];
            var counter = 0;
            var temp = '';
            for (var i = valueArray.length - 1; i >= 0; i--) {
                temp += valueArray[i];
                counter++
                if (counter == 3) {
                    resultArray.push(temp);
                    counter = 0;
                    temp = '';
                }
            };
            if (counter > 0) {
                resultArray.push(temp);
            }
            for (var i = resultArray.length - 1; i >= 0; i--) {
                var resTemp = resultArray[i].split('');
                for (var j = resTemp.length - 1; j >= 0; j--) {
                    result += resTemp[j];
                };
                if (i > 0) {
                    result += '.'
                }
            };
            if (elType == 'input') {
                $(el).val(result);
            } else {
                $(el).empty().text(result);
            }
        }
    };
}(jQuery));
</script> -->

<!-- <script>
$("#danhsach").click(function(){

$.ajax({
    type: 'GET',
    url: 'quankho/dsnhapkho',
    success: function(data){
             if(data != null) $("#edit").html(data);
     }
 });
});
</script>

<script>
$("#danhSachHoaChat").ready(function(){

$.ajax({
    type: 'GET',
    url: 'quankho/dshoachat',
    success: function(data){
     
             if(data != null) $("#nhap").html(data);
     }
 });
});
</script>


<script>
$("#danhSachNhapKho").click(function(){

$.ajax({
    type: 'GET',
    url: 'quankho/dsnhapkho',
    success: function(data){
       
             if(data != null) $("#nhap2").html(data);
     }
 });
});
</script>


<script>
$("#danhSachTonKho").click(function(){

$.ajax({
    type: 'GET',
    url: 'quankho/dstonkho',
    success: function(data){
     
             if(data != null) $("#nhap3").html(data);
     }
 });
});
</script>


<script>
$("#danhSachDuTru").click(function(){

$.ajax({
    type: 'GET',
    url: 'quankho/dsdutru',
    success: function(data){
        
             if(data != null) $("#nhap4").html(data);
     }
 });
});
</script> -->
<script>
$("#load").ready(function(){

$.ajax({
    type: 'GET',
    url: 'loadcanhbao',
    success: function(data){
     
             if(data != null) console.log(data);
     }
 });
});
</script>


<script type="text/javascript">
$('.money').simpleMoneyFormat();
</script>
@stop

