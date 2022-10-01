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
                                </tbody>
                            </table>
  
                        </div>
                        <!--End tab1-->


                        <div class="tab-pane" id="tab_2">
                           <!--danh sách nhập kho-->
                           <div class="btn-group" style="margin: 10px 0;">

</div>
<div class="float-right">
    <a id="danhsach" class="btn btn-raised btn-success btn-large" data-toggle="modal"
        data-href="#responsive" href="#responsive">Sửa Xóa</a>
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
                                        value="gửi">Gửi Mức Độ Cảnh Báo</button>
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
                                    </tbody>
                                </table>
                            </form>
                        </div>
                        <!--End tab3-->

                        <div class="tab-pane" id="tab_4">
                            <!--Gửi của danh sách dự trù-->
                            <form method="post" action="">
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
                                    <tbody id="nhap4" >
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