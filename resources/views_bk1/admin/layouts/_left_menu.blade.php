@if(Sentinel::inRole('quankho')||Sentinel::inRole('admin'))
<ul id="menu" class="page-sidebar-menu">

    <li {!! (Request::is('quankho') ? 'class="active"' : '' ) !!}>
        <a href="{{ URL::to('quankho') }}">
            <i class="livicon" data-name="" data-size="18" data-c="#418BCA" data-hc="#418BCA" data-loop="true"></i>
            Trang Chủ
        </a>
    </li>
    
    
    <li {!! (Request::is('quankho/1_dsp_xetnghiem') ? 'class="active"' : '' ) !!}>
                <a href="{{ URL::to('quankho/1_dsp_xetnghiem') }}">
                <i class="livicon" data-name="medal" data-size="18" data-c="#EF6F6C" data-hc="#EF6F6C" data-loop="true"></i>
                    Danh mục hóa chất từng phòng xét nghiệm
                </a>
            </li>
            <!-- <li {!! (Request::is('admin/1_thongke_hc') ? 'class="active"' : '' ) !!}>
                <a href="{{ URL::to('admin/1_thongke_hc') }}">
                <i class="livicon" data-name="table" data-size="18" data-c="#EF6F6C" data-hc="#EF6F6C" data-loop="true"></i>
                    Thống kê mức độ sử dụng
                </a>
            </li> -->

    <li {!! (Request::is('quankho/1_nhatky_sd') ? 'class="active"' : '' ) !!}>
        <a href="{{  URL::to('quankho/1_nhatky_sd') }}">
            <i class="livicon" data-name="calendar" data-size="18" data-c="#EF6F6C" data-hc="#EF6F6C" data-loop="true"></i>
            Nhật Ký Sử Dụng
        </a>
    </li>

    @include('admin/layouts/menu')


</ul>
<br>
@endif
@if(Sentinel::inRole('quanphong')||Sentinel::inRole('admin'))

<ul id="menu" class="page-sidebar-menu">
    < <li {!! (Request::is('quanphong') ? 'class="active"' : '' ) !!}>
        <a href="{{ URL::to('quanphong') }}">
            <i class="livicon" data-name="" data-size="18" data-c="#418BCA" data-hc="#418BCA" data-loop="true"></i>
            Trang Chủ
        </a>
    </li> 
    
    <li {!! (Request::is('quanphong/2_dieuchuyen_hc') ? 'class="active"' : '' ) !!}>
        <a href="{{  URL::to('quanphong/2_dieuchuyen_hc') }}">
            <i class="livicon" data-name="doc-portrait" data-size="18" data-c="#F89A14" data-hc="#F89A14" data-loop="true"></i>
            Điều Chuyển Hóa Chất
        </a>
    </li>
    <li {!! (Request::is('quanphong/2_nhatky_sd') ? 'class="active"' : '' ) !!}>
        <a href="{{  URL::to('quanphong/2_nhatky_sd') }}">
            <i class="livicon" data-name="calendar" data-size="18" data-c="#EF6F6C" data-hc="#EF6F6C" data-loop="true"></i>
            Nhật Ký Sử Dụng
        </a>
    </li>
    <br>
    <br>
    @include('admin/layouts/menu')
</ul>
@endif
 -->
<!-- Menus generated by CRUD generator -->