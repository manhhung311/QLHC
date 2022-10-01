<?php

namespace App\Http\Controllers\Admin;

use App\Models\Blog;
use Illuminate\Support\MessageBag;
use Sentinel;
use Analytics;
use View;
use Spatie\Activitylog\Models\Activity;
use Yajra\DataTables\DataTables;
use App\Charts\Highcharts;
use App\Models\User;
//use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use Spatie\Analytics\Period;
use File;
use Artisan;
use Str;
use DB;
use Lang;

class DefinedController {
	
	protected $CODE_DRIVE = -1;
    protected $CODE_SHOP = -2;
    protected $CODE_HOLIDAYS = -3;
    protected $CODE_VACATION = -4;
    protected $CODE_DRIVE_CDL = -10;

}