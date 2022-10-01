<!--Của modals-->
<style>
.md-content.md-content-yellow {
    background: #ffb848;
}

.md-content.md-content-blue {
    background: #128bc6;
}

.md-content.md-content-green {
    background: #01bc8c;
}

.md-content.md-content-red {
    background: #ef6f6c;
}

.md-content.md-content-white {
    background: #fff;
    color: #333;
}

.md-content.md-content-orange {
    background: #bc7209;
}

.modal-header {
    border-top-left-radius: 6px;
    border-top-right-radius: 6px;
}

.modal-panel .btn {
    margin-bottom: 10px;
}

.md-content {
    color: #fff;
    background: #ef6f6c;
    position: relative;
    border-radius: 3px;
    margin: 0 auto;
}

.table>tbody>tr>td,
.table>tbody>tr>th,
.table>tfoot>tr>td,
.table>tfoot>tr>th,
.table>thead>tr>td,
.table>thead>tr>th {
    padding: 8px;
    line-height: 1.42857143;
    vertical-align: 0;
    border-top: 1px solid #ddd;
}

button,
input,
optgroup,
select,
textarea {
    margin: 10px 0;
}

/*modals animations*/

.modal.modal-fade-in-scale-up .modal-dialog {
    opacity: 0;
    -webkit-transition: all 0.3s ease 0s;
    -o-transition: all 0.3s ease 0s;
    transition: all 0.3s ease 0s;
    -webkit-transform: scale(0.7);
    -ms-transform: scale(0.7);
    -o-transform: scale(0.7);
    transform: scale(0.7);
}

.modal.modal-fade-in-scale-up.in .modal-dialog {
    opacity: 1;
    -webkit-transform: scale(1);
    -ms-transform: scale(1);
    -o-transform: scale(1);
    transform: scale(1);
}

.modal.slideRight {
    animation-name: slideRight;
    -webkit-animation-name: slideRight;
    animation-duration: 1s;
    -webkit-animation-duration: 1s;
    animation-timing-function: ease-in-out;
    -webkit-animation-timing-function: ease-in-out;
    visibility: visible !important;
}

@keyframes slideRight {
    0% {
        transform: translateX(-150%);
    }

    50% {
        transform: translateX(8%);
    }

    65% {
        transform: translateX(-4%);
    }

    80% {
        transform: translateX(4%);
    }

    95% {
        transform: translateX(-2%);
    }

    100% {
        transform: translateX(0%);
    }
}

@-webkit-keyframes slideRight {
    0% {
        -webkit-transform: translateX(-150%);
    }

    50% {
        -webkit-transform: translateX(8%);
    }

    65% {
        -webkit-transform: translateX(-4%);
    }

    80% {
        -webkit-transform: translateX(4%);
    }

    95% {
        -webkit-transform: translateX(-2%);
    }

    100% {
        -webkit-transform: translateX(0%);
    }
}

/*slideDown*/

.slideDown {
    animation-name: slideDown;
    -webkit-animation-name: slideDown;
    animation-duration: 1s;
    -webkit-animation-duration: 1s;
    animation-timing-function: ease;
    -webkit-animation-timing-function: ease;
    visibility: visible !important;
}

@keyframes slideDown {
    0% {
        transform: translateY(-100%);
    }

    50% {
        transform: translateY(8%);
    }

    65% {
        transform: translateY(-4%);
    }

    80% {
        transform: translateY(4%);
    }

    95% {
        transform: translateY(-2%);
    }

    100% {
        transform: translateY(0%);
    }
}

@-webkit-keyframes slideDown {
    0% {
        -webkit-transform: translateY(-100%);
    }

    50% {
        -webkit-transform: translateY(8%);
    }

    65% {
        -webkit-transform: translateY(-4%);
    }

    80% {
        -webkit-transform: translateY(4%);
    }

    95% {
        -webkit-transform: translateY(-2%);
    }

    100% {
        -webkit-transform: translateY(0%);
    }
}

.expandOpen {
    animation-name: expandOpen;
    -webkit-animation-name: expandOpen;
    animation-duration: 1.2s;
    -webkit-animation-duration: 1.2s;
    animation-timing-function: ease-out;
    -webkit-animation-timing-function: ease-out;
    visibility: visible !important;
}

@keyframes expandOpen {
    0% {
        transform: scale(1.8);
    }

    50% {
        transform: scale(0.95);
    }

    80% {
        transform: scale(1.05);
    }

    90% {
        transform: scale(0.98);
    }

    100% {
        transform: scale(1);
    }
}

@-webkit-keyframes expandOpen {
    0% {
        -webkit-transform: scale(1.8);
    }

    50% {
        -webkit-transform: scale(0.95);
    }

    80% {
        -webkit-transform: scale(1.05);
    }

    90% {
        -webkit-transform: scale(0.98);
    }

    100% {
        -webkit-transform: scale(1);
    }
}

/*big entrance*/

.bigEntrance {
    animation-name: bigEntrance;
    -webkit-animation-name: bigEntrance;
    animation-duration: 1.6s;
    -webkit-animation-duration: 1.6s;
    animation-timing-function: ease-out;
    -webkit-animation-timing-function: ease-out;
    visibility: visible !important;
}

@keyframes bigEntrance {
    0% {
        transform: scale(0.3) rotate(6deg) translateX(-30%) translateY(30%);
        opacity: 0.2;
    }

    30% {
        transform: scale(1.03) rotate(-2deg) translateX(2%) translateY(-2%);
        opacity: 1;
    }

    45% {
        transform: scale(0.98) rotate(1deg) translateX(0%) translateY(0%);
        opacity: 1;
    }

    60% {
        transform: scale(1.01) rotate(-1deg) translateX(0%) translateY(0%);
        opacity: 1;
    }

    75% {
        transform: scale(0.99) rotate(1deg) translateX(0%) translateY(0%);
        opacity: 1;
    }

    90% {
        transform: scale(1.01) rotate(0deg) translateX(0%) translateY(0%);
        opacity: 1;
    }

    100% {
        transform: scale(1) rotate(0deg) translateX(0%) translateY(0%);
        opacity: 1;
    }
}

@-webkit-keyframes bigEntrance {
    0% {
        -webkit-transform: scale(0.3) rotate(6deg) translateX(-30%) translateY(30%);
        opacity: 0.2;
    }

    30% {
        -webkit-transform: scale(1.03) rotate(-2deg) translateX(2%) translateY(-2%);
        opacity: 1;
    }

    45% {
        -webkit-transform: scale(0.98) rotate(1deg) translateX(0%) translateY(0%);
        opacity: 1;
    }

    60% {
        -webkit-transform: scale(1.01) rotate(-1deg) translateX(0%) translateY(0%);
        opacity: 1;
    }

    75% {
        -webkit-transform: scale(0.99) rotate(1deg) translateX(0%) translateY(0%);
        opacity: 1;
    }

    90% {
        -webkit-transform: scale(1.01) rotate(0deg) translateX(0%) translateY(0%);
        opacity: 1;
    }

    100% {
        -webkit-transform: scale(1) rotate(0deg) translateX(0%) translateY(0%);
        opacity: 1;
    }
}

/*slide expand up */

.slideExpandUp {
    animation-name: slideExpandUp;
    -webkit-animation-name: slideExpandUp;
    animation-duration: 1.6s;
    -webkit-animation-duration: 1.6s;
    animation-timing-function: ease-out;
    -webkit-animation-timing-function: ease-out;
    visibility: visible !important;
}

@keyframes slideExpandUp {
    0% {
        transform: translateY(100%) scaleX(0.5);
    }

    30% {
        transform: translateY(-8%) scaleX(0.5);
    }

    40% {
        transform: translateY(2%) scaleX(0.5);
    }

    50% {
        transform: translateY(0%) scaleX(1.1);
    }

    60% {
        transform: translateY(0%) scaleX(0.9);
    }

    70% {
        transform: translateY(0%) scaleX(1.05);
    }

    80% {
        transform: translateY(0%) scaleX(0.95);
    }

    90% {
        transform: translateY(0%) scaleX(1.02);
    }

    100% {
        transform: translateY(0%) scaleX(1);
    }
}

@-webkit-keyframes slideExpandUp {
    0% {
        -webkit-transform: translateY(100%) scaleX(0.5);
    }

    30% {
        -webkit-transform: translateY(-8%) scaleX(0.5);
    }

    40% {
        -webkit-transform: translateY(2%) scaleX(0.5);
    }

    50% {
        -webkit-transform: translateY(0%) scaleX(1.1);
    }

    60% {
        -webkit-transform: translateY(0%) scaleX(0.9);
    }

    70% {
        -webkit-transform: translateY(0%) scaleX(1.05);
    }

    80% {
        -webkit-transform: translateY(0%) scaleX(0.95);
    }

    90% {
        -webkit-transform: translateY(0%) scaleX(1.02);
    }

    100% {
        -webkit-transform: translateY(0%) scaleX(1);
    }
}

/*bounce*/

.bounce {
    animation-name: bounce;
    -webkit-animation-name: bounce;
    animation-duration: 1.6s;
    -webkit-animation-duration: 1.6s;
    animation-timing-function: ease;
    -webkit-animation-timing-function: ease;
    transform-origin: 50% 100%;
    -ms-transform-origin: 50% 100%;
    -webkit-transform-origin: 50% 100%;
}

@keyframes bounce {
    0% {
        transform: translateY(0%) scaleY(0.6);
    }

    60% {
        transform: translateY(-100%) scaleY(1.1);
    }

    70% {
        transform: translateY(0%) scaleY(0.95) scaleX(1.05);
    }

    80% {
        transform: translateY(0%) scaleY(1.05) scaleX(1);
    }

    90% {
        transform: translateY(0%) scaleY(0.95) scaleX(1);
    }

    100% {
        transform: translateY(0%) scaleY(1) scaleX(1);
    }
}

@-webkit-keyframes bounce {
    0% {
        -webkit-transform: translateY(0%) scaleY(0.6);
    }

    60% {
        -webkit-transform: translateY(-100%) scaleY(1.1);
    }

    70% {
        -webkit-transform: translateY(0%) scaleY(0.95) scaleX(1.05);
    }

    80% {
        -webkit-transform: translateY(0%) scaleY(1.05) scaleX(1);
    }

    90% {
        -webkit-transform: translateY(0%) scaleY(0.95) scaleX(1);
    }

    100% {
        -webkit-transform: translateY(0%) scaleY(1) scaleX(1);
    }
}

/* pulse */

.pulse {
    animation-name: pulse;
    -webkit-animation-name: pulse;
    animation-duration: 1.5s;
    -webkit-animation-duration: 1.5s;
}

@keyframes pulse {
    0% {
        transform: scale(0.9);
        opacity: 0.7;
    }

    50% {
        transform: scale(1);
        opacity: 1;
    }

    100% {
        transform: scale(0.9);
        opacity: 0.7;
    }
}

@-webkit-keyframes pulse {
    0% {
        -webkit-transform: scale(0.95);
        opacity: 0.7;
    }

    50% {
        -webkit-transform: scale(1);
        opacity: 1;
    }

    100% {
        -webkit-transform: scale(0.95);
        opacity: 0.7;
    }
}

/* tossing */

.tossing {
    animation-name: tossing;
    -webkit-animation-name: tossing;
    animation-duration: 2.5s;
    -webkit-animation-duration: 2.5s;
}

@keyframes tossing {
    0% {
        transform: rotate(-4deg);
    }

    50% {
        transform: rotate(4deg);
    }

    100% {
        transform: rotate(-4deg);
    }
}

@-webkit-keyframes tossing {
    0% {
        -webkit-transform: rotate(-4deg);
    }

    50% {
        -webkit-transform: rotate(4deg);
    }

    100% {
        -webkit-transform: rotate(-4deg);
    }
}

/* pullUp */

.pullUp {
    animation-name: pullUp;
    -webkit-animation-name: pullUp;
    animation-duration: 1.1s;
    -webkit-animation-duration: 1.1s;
    animation-timing-function: ease-out;
    -webkit-animation-timing-function: ease-out;
    transform-origin: 50% 100%;
    -ms-transform-origin: 50% 100%;
    -webkit-transform-origin: 50% 100%;
}

@keyframes pullUp {
    0% {
        transform: scaleY(0.1);
    }

    40% {
        transform: scaleY(1.02);
    }

    60% {
        transform: scaleY(0.98);
    }

    80% {
        transform: scaleY(1.01);
    }

    100% {
        transform: scaleY(0.98);
    }

    80% {
        transform: scaleY(1.01);
    }

    100% {
        transform: scaleY(1);
    }
}

@-webkit-keyframes pullUp {
    0% {
        -webkit-transform: scaleY(0.1);
    }

    40% {
        -webkit-transform: scaleY(1.02);
    }

    60% {
        -webkit-transform: scaleY(0.98);
    }

    80% {
        -webkit-transform: scaleY(1.01);
    }

    100% {
        -webkit-transform: scaleY(0.98);
    }

    80% {
        -webkit-transform: scaleY(1.01);
    }

    100% {
        -webkit-transform: scaleY(1);
    }
}

/* pulldown */

.pullDown {
    animation-name: pullDown;
    -webkit-animation-name: pullDown;
    animation-duration: 1.1s;
    -webkit-animation-duration: 1.1s;
    animation-timing-function: ease-out;
    -webkit-animation-timing-function: ease-out;
    transform-origin: 50% 0%;
    -ms-transform-origin: 50% 0%;
    -webkit-transform-origin: 50% 0%;
}

@keyframes pullDown {
    0% {
        transform: scaleY(0.1);
    }

    40% {
        transform: scaleY(1.02);
    }

    60% {
        transform: scaleY(0.98);
    }

    80% {
        transform: scaleY(1.01);
    }

    100% {
        transform: scaleY(0.98);
    }

    80% {
        transform: scaleY(1.01);
    }

    100% {
        transform: scaleY(1);
    }
}

@-webkit-keyframes pullDown {
    0% {
        -webkit-transform: scaleY(0.1);
    }

    40% {
        -webkit-transform: scaleY(1.02);
    }

    60% {
        -webkit-transform: scaleY(0.98);
    }

    80% {
        -webkit-transform: scaleY(1.01);
    }

    100% {
        -webkit-transform: scaleY(0.98);
    }

    80% {
        -webkit-transform: scaleY(1.01);
    }

    100% {
        -webkit-transform: scaleY(1);
    }
}

/* floating */

.floating {
    animation-name: floating;
    -webkit-animation-name: floating;
    animation-duration: 1.5s;
    -webkit-animation-duration: 1.5s;
}

@keyframes floating {
    0% {
        transform: translateY(0%);
    }

    50% {
        transform: translateY(8%);
    }

    100% {
        transform: translateY(0%);
    }
}

@-webkit-keyframes floating {
    0% {
        -webkit-transform: translateY(0%);
    }

    50% {
        -webkit-transform: translateY(8%);
    }

    100% {
        -webkit-transform: translateY(0%);
    }
}

/* stretchleft */

.stretchLeft {
    animation-name: stretchLeft;
    -webkit-animation-name: stretchLeft;
    animation-duration: 1.5s;
    -webkit-animation-duration: 1.5s;
    animation-timing-function: ease-out;
    -webkit-animation-timing-function: ease-out;
    transform-origin: 100% 0%;
    -ms-transform-origin: 100% 0%;
    -webkit-transform-origin: 100% 0%;
}

@keyframes stretchLeft {
    0% {
        transform: scaleX(0.3);
    }

    40% {
        transform: scaleX(1.02);
    }

    60% {
        transform: scaleX(0.98);
    }

    80% {
        transform: scaleX(1.01);
    }

    100% {
        transform: scaleX(0.98);
    }

    80% {
        transform: scaleX(1.01);
    }

    100% {
        transform: scaleX(1);
    }
}

@-webkit-keyframes stretchLeft {
    0% {
        -webkit-transform: scaleX(0.3);
    }

    40% {
        -webkit-transform: scaleX(1.02);
    }

    60% {
        -webkit-transform: scaleX(0.98);
    }

    80% {
        -webkit-transform: scaleX(1.01);
    }

    100% {
        -webkit-transform: scaleX(0.98);
    }

    80% {
        -webkit-transform: scaleX(1.01);
    }

    100% {
        -webkit-transform: scaleX(1);
    }
}

/* stretch right */

.stretchRight {
    animation-name: stretchRight;
    -webkit-animation-name: stretchRight;
    animation-duration: 1.5s;
    -webkit-animation-duration: 1.5s;
    animation-timing-function: ease-out;
    -webkit-animation-timing-function: ease-out;
    transform-origin: 0% 0%;
    -ms-transform-origin: 0% 0%;
    -webkit-transform-origin: 0% 0%;
}

@keyframes stretchRight {
    0% {
        transform: scaleX(0.3);
    }

    40% {
        transform: scaleX(1.02);
    }

    60% {
        transform: scaleX(0.98);
    }

    80% {
        transform: scaleX(1.01);
    }

    100% {
        transform: scaleX(0.98);
    }

    80% {
        transform: scaleX(1.01);
    }

    100% {
        transform: scaleX(1);
    }
}

@-webkit-keyframes stretchRight {
    0% {
        -webkit-transform: scaleX(0.3);
    }

    40% {
        -webkit-transform: scaleX(1.02);
    }

    60% {
        -webkit-transform: scaleX(0.98);
    }

    80% {
        -webkit-transform: scaleX(1.01);
    }

    100% {
        -webkit-transform: scaleX(0.98);
    }

    80% {
        -webkit-transform: scaleX(1.01);
    }

    100% {
        -webkit-transform: scaleX(1);
    }
}

@media (min-width: 320px) and (max-width: 425px) {
    body {
        font-size: 14px;
    }
}

body {
    padding-right: 0 !important;
}

#full-width .modal-lg {
    max-width: 1300px;
}


#responsive .modal-lg {
    max-width: 800px;
}
</style>

<div class="extended_modals">
    <!--Bảng của Phân hóa chất-->
    <div class="modal fade in" id="full-width" tabindex="-1" role="dialog" aria-hidden="false">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Cập Nhật Nhật Ký Sử Dụng</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                </div>
                <form class="form-horizontal" action="quanphong/baocaohangngay" method="post">
                    @csrf 
                    <div class="card-body table-responsive-lg table-responsive-sm table-responsive-md">
                        <table class="table table-striped table-bordered" width="100%" id="table2">
                            <thead>
                                <tr>
                                    <th>STT</th>
                                    <th>Mã Hóa Chất</th>
                                    <th>Tên Hóa Chất</th>
                                    <th>Số Lô</th>
                                    <th>Đơn Vị Tính</th>
                                    <th>Đơn Vị Đóng Gói</th>
                                    <th>Số Lượng Đóng Gói</th>
                                    <th>Hạn Sử Dụng</th>
                                    <th>Tồn Kho Hiện Tại</th>
                                    <th>Số Lượng Sử Dụng</th>
                                    <th>
                                        <input type="checkbox" id="selecctall" />
                                        Xác Nhận
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($danhSach as $ds)
                                <tr>
                                    <td>
                                        {{$ds['stt']}}
                                    </td>
                                    <td>
                                        {{$ds['danhmuchoachat']->ma_danh_muc_hoa_chat}}
                                    </td>
                                    <td>
                                    {{$ds['danhmuchoachat']->ten_hoa_chat}}
                                    </td>
                                    <td>
                                    {{$ds['lo']->so_lo}}
                                    </td>
                                    <td>
                                    {{$ds['danhmuchoachat']->don_vi_tinh}}
                                    </td>
                                    <td>
                                    {{$ds['danhmuchoachat']->don_vi_dong_goi}}
                                    </td>
                                    <td>
                                    {{$ds['lo']->so_luong_dong_goi}}
                                    </td>
                                    <td>
                                    {{$ds['lo']->han_su_dung}}
                                    </td>
                                    <td id="Nhap" >
                                        <p class="money">{{$ds['sudung']->so_luong_hoa_chat_nhap_ve - $ds['sudung']->so_luong_su_dung}}</p>
                                    </td>
                                    <td>
                                        <input type="number" class="form-control" id="row-1-number" name="list[{{$ds['lo']->ma_lo_hoa_chat}}]" value="0" >
                                    </td>
                                    <td>
                                        <label>
                                            <input class="checkbox1" type="checkbox" name="check[]" value="{{$ds['lo']->ma_lo_hoa_chat}}">
                                        </label>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="modal-footer">
                        <button type="button" data-dismiss="modal" class="btn btn-secondary">Hủy</button>
                        <button type="submit" class="btn btn-primary btn-sm" >Xác Nhận</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!--Bảng của nhập hóa chất hỏng lỗi-->
    @include('admin.Quanphong.index.hongloi_modals_trangchu')


    <!--Bảng của hóa chất dự trừ-->
    <div class="modal fade bs-example-modal-sm in" id="stack1" tabindex="-1" role="dialog" aria-hidden="false">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Hóa Chất Dự Trù</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                </div>
                <form class="form-horizontal" method="post" action="">
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
                                                    <input id="name" name="don_vi_tinh" type="text" placeholder="Đơn vị"
                                                        class="form-control">
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
                                        >Submit</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>


<!--Check số lượng xuất bé hơn số lượng nhập về-->
<script type="text/javascript">
    function checkXuat(){
        var number = document.getElementById('Nhap').innerText;
        var number1 = document.getElementById('row-1-number').value;
            if(parseInt(number) < number1) {
                alert("Số lượng xuất lớn hơn số lượng tồn kho hiện tại");
            }     
    }
</script>



