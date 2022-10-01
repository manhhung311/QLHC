<?php
    $listmenu_anagrafiche = Lang::get('menu.anagrafiche_list');
    $listmenu_attivita = Lang::get('menu.attivita_list');
    $listmenu_fatturati = Lang::get('menu.fatturati_list');
    $listmenu_offerte = Lang::get('menu.offerte_list');
    $listmenu_magazzino = Lang::get('menu.magazzino_list');
    $listmenu_tabelle = Lang::get('menu.tabelle_list');
    $listmenu_utilita = Lang::get('menu.utilita_list');
    $listmenu_area_riservata = Lang::get('menu.area_riservata_list');
?>

<ul id="navigation" class="slimmenu">
    <li style="width: 60px;text-align: left;">
        <a href="{{ route('admin.dashboard') }}" {!! (Request::is('admin') || Request::is('admin/index') ? 'class="active"' : 'sub-list' ) !!}>
            @lang('menu.home')
        </a>
    </li>

    @if(Sentinel::inRole('admin'))    
    <li class="main-menu" style="width: 100px;"><a href="javascript:void(0)">Users</a>
        <ul>
            <li><a href="javascript:void(0)" {!! (Request::is('admin/role/*') ? 'class="menu-list active"' : 'sub-list' ) !!}>Roles</a>
                <ul>
                    <li>
                        <a href="{{  URL::to('admin/roles') }}" {!! (Request::is('admin/roles') ? 'class="sub-list active"' : 'sub-list' ) !!}>
                            Role List
                        </a>
                    </li>
                    <li>
                        <a href="{{  URL::to('admin/roles/create') }}" {!! (Request::is('admin/roles/create') ? 'class="sub-list active"' : 'sub-list' ) !!}>
                            Add new role
                        </a>
                    </li>
                </ul>
            </li>
            <li>
                <a href="{{  URL::to('admin/users') }}" {!! (Request::is('admin/users') ? 'class="sub-list active"' : 'sub-list' ) !!}>
                    Users List
                </a>
            </li>
            <li>
                <a href="{{  URL::to('admin/users/create') }}" {!! (Request::is('admin/users/create') ? 'class="sub-list active"' : 'sub-list' ) !!}>
                    Add new User
                </a>
            </li>
            <li>
                <a href="{{  URL::to('admin/deleted_users') }}" {!! (Request::is('admin/deleted_users') ? 'class="sub-list active"' : 'sub-list' ) !!}>
                    Deleted Users
                </a>
            </li>

        </ul>
    </li>
    @endif

    <li class="main-menu option-one"><a href="javascript:void(0)">@lang('menu.anagrafiche')</a>
        <ul>
            @foreach($listmenu_anagrafiche as $key => $menu)
            <li>
                <a href="#" >{{$menu}}</a>
            </li>
            @endforeach            
        </ul>
    </li>

    <li class="main-menu" style="width: 11%;"><a href="javascript:void(0)">@lang('menu.attivita')</a>
        <ul>
            @foreach($listmenu_attivita as $key => $menu)
            <li>
                <a href="#" >{{$menu}}</a>
            </li>
            @endforeach            
        </ul>
    </li>

    <li class="main-menu option-one"><a href="javascript:void(0)">@lang('menu.fatturati')</a>
        <ul>
            @foreach($listmenu_fatturati as $key => $menu)
            <li>
                <a href="#" >{{$menu}}</a>
            </li>
            @endforeach            
        </ul>
    </li>

    <li class="main-menu option-one"><a href="javascript:void(0)">@lang('menu.offerte')</a>
        <ul>
            @foreach($listmenu_offerte as $key => $menu)
            <li>
                <a href="#" >{{$menu}}</a>
            </li>
            @endforeach            
        </ul>
    </li>

    <li class="main-menu option-one" style="width: 8%;"><a href="javascript:void(0)">@lang('menu.magazzino')</a>
        <ul>
            @foreach($listmenu_magazzino as $key => $menu)
            <li>
                <a href="#" >{{$menu}}</a>
            </li>
            @endforeach            
        </ul>
    </li>

    <li class="main-menu option-one"><a href="javascript:void(0)">@lang('menu.tabelle')</a>
        <ul>
            @foreach($listmenu_tabelle as $key => $menu)
            <li>
                @if($key == 'consorzi' || $key == 'gruppi' || $key == 'tipo_intervento' || $key == 'trasportatori')
                <a href="{{route('admin.' . $key . '.index')}}" >{{$menu}}</a>
                @else
                <a href="#" >{{$menu}}</a>
                @endif
            </li>
            @endforeach            
        </ul>
    </li>

    <li class="main-menu option-one"><a href="javascript:void(0)">@lang('menu.utilita')</a>
        <ul>
            @foreach($listmenu_utilita as $key => $menu)
            <li>
                <a href="#" >{{$menu}}</a>
            </li>
            @endforeach            
        </ul>
    </li>

    <li class="main-menu" style="width: 11.5%;"><a href="javascript:void(0)">@lang('menu.area_riservata')</a>
        <ul>
            @foreach($listmenu_area_riservata as $key => $menu)
            <li>
                <a href="#" >{{$menu}}</a>
            </li>
            @endforeach            
        </ul>
    </li>

    <li class="main-menu"><a href="javascript:void(0)">@lang('menu.finestra')</a>
        
    </li>

    <li style="width: 60px;text-align: left;">
        <a href="{{ route('admin.logout') }}" style="width: 70px;">
            @lang('menu.esci')
        </a>
    </li>



</ul>
