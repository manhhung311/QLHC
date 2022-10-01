<?php
require_once 'web_builder.php';

use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\QuanKho\addHoaChat;
use App\Http\Controllers\QuanKho\baoCaoMuonController;
use App\Http\Controllers\QuanKho\ChartsController;
use App\Http\Controllers\QuanKho\danhSachDuTruController;
use App\Http\Controllers\QuanKho\danhSachHoaChatController;
use App\Http\Controllers\QuanKho\danhSachNhapKhoController;
use App\Http\Controllers\QuanKho\danhSachTonKhoController;
use App\Http\Controllers\QuanKho\hoaChatCacPhongController;
use App\Http\Controllers\QuanKho\indexController;
use App\Http\Controllers\QuanKho\themDanhMucHoaChatController;
use App\Http\Controllers\QuanKho\trangChuQuanKhoController;
use App\Http\Controllers\Quanphong\baoCaoLoiController;
use App\Http\Controllers\QuanPhong\danhSachHoaChatController as QuanPhongDanhSachHoaChatController;
use App\Http\Controllers\QuanPhong\danhSachLoiHongController;
use App\Http\Controllers\QuanPhong\hoaChatNhapVeController;
use App\Http\Controllers\Quanphong\nhatKySuDungController;
use App\Models\danhMucHoaChat;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::pattern('slug', '[a-z0-9- _]+');

Route::group(
    ['prefix' => 'admin', 'namespace' => 'Admin'],
    function () {

        // Error pages should be shown without requiring login
        Route::get(
            '404',
            function () {
                return view('admin/404');
            }
        );
        Route::get(
            '500',
            function () {
                return view('admin/500');
            }
        );
        // Lock screen
        Route::get('{id}/lockscreen', 'LockscreenController@show')->name('lockscreen');
        Route::post('{id}/lockscreen', 'LockscreenController@check')->name('lockscreen');
        // All basic routes defined here
        Route::get('login', 'AuthController@getSignin')->name('login');
        Route::get('signin', 'AuthController@getSignin')->name('signin');
        Route::post('signin', 'AuthController@postSignin')->name('postSignin');
        Route::post('signup', 'AuthController@postSignup')->name('admin.signup');
        Route::post('forgot-password', 'AuthController@postForgotPassword')->name('forgot-password');
        Route::get(
            'login2',
            function () {
                return view('admin/login2');
            }
        );


        // Register2
        Route::get(
            'register2',
            function () {
                return view('admin/register2');
            }
        );
        Route::post('register2', 'AuthController@postRegister2')->name('register2');

        // Forgot Password Confirmation
        //    Route::get('forgot-password/{userId}/{passwordResetCode}', 'AuthController@getForgotPasswordConfirm')->name('forgot-password-confirm');
        //    Route::post('forgot-password/{userId}/{passwordResetCode}', 'AuthController@getForgotPasswordConfirm');

        // Logout
        Route::get('logout', 'AuthController@getLogout')->name('admin.logout');

        // Account Activation
        Route::get('activate/{userId}/{activationCode}', 'AuthController@getActivate')->name('activate');
    }
);


Route::group(
    ['prefix' => 'admin', 'middleware' => 'admin', 'as' => 'admin.'],
    function () {
        // GUI Crud Generator
        Route::get('generator_builder', 'JoshController@builder')->name('generator_builder');
        Route::get('field_template', '\InfyOm\GeneratorBuilder\Controllers\GeneratorBuilderController@fieldTemplate');
        Route::post('generator_builder/generate', '\InfyOm\GeneratorBuilder\Controllers\GeneratorBuilderController@generate');
        // Model checking
        Route::post('modelCheck', 'ModelcheckController@modelCheck');

        // Dashboard / Index
        Route::get(
            '/',
            function () {
                return view('admin.index');
            }
        )->name('dashboard');
        Route::get('index1', 'JoshController@showHome');
        // crop demo
        Route::post('crop_demo', 'JoshController@cropDemo')->name('crop_demo');
        //Log viewer routes
        Route::get('log_viewers', 'Admin\LogViewerController@index')->name('log-viewers');
        Route::get('log_viewers/logs', 'Admin\LogViewerController@listLogs')->name('log_viewers.logs');
        Route::delete('log_viewers/logs/delete', 'Admin\LogViewerController@delete')->name('log_viewers.logs.delete');
        Route::get('log_viewers/logs/{date}', 'Admin\LogViewerController@show')->name('log_viewers.logs.show');
        Route::get('log_viewers/logs/{date}/download', 'Admin\LogViewerController@download')->name('log_viewers.logs.download');
        Route::get('log_viewers/logs/{date}/{level}', 'Admin\LogViewerController@showByLevel')->name('log_viewers.logs.filter');
        Route::get('log_viewers/logs/{date}/{level}/search', 'Admin\LogViewerController@search')->name('log_viewers.logs.search');
        Route::get('log_viewers/logcheck', 'Admin\LogViewerController@logCheck')->name('log-viewers.logcheck');
        //end Log viewer
        // Activity log
        Route::get('activity_log/data', 'JoshController@activityLogData')->name('activity_log.data');
        //    Route::get('/', 'JoshController@index')->name('index');
    }
);

Route::group(
    ['prefix' => 'admin', 'namespace' => 'Admin', 'middleware' => 'admin', 'as' => 'admin.'],
    function () {

        // User Management
        Route::group(
            ['prefix' => 'users'],
            function () {
                Route::get('data', 'UsersController@data')->name('users.data');
                Route::get('{user}/delete', 'UsersController@destroy')->name('users.delete');
                Route::get('{user}/confirm-delete', 'UsersController@getModalDelete')->name('users.confirm-delete');
                Route::get('{user}/restore', 'UsersController@getRestore')->name('restore.user');
                //        Route::post('{user}/passwordreset', 'UsersController@passwordreset')->name('passwordreset');
                Route::post('passwordreset', 'UsersController@passwordreset')->name('passwordreset');
            }
        );
        Route::resource('users', 'UsersController');
        /************
     * bulk import
    ****************************/
        Route::get('bulk_import_users', 'UsersController@import');
        Route::post('bulk_import_users', 'UsersController@importInsert');
        /****************
     bulk download
    **************************/
        Route::get('download_users/{type}', 'UsersController@downloadExcel');





        Route::get('deleted_users', ['before' => 'Sentinel', 'uses' => 'UsersController@getDeletedUsers'])->name('deleted_users');

        // Email System
        Route::group(
            ['prefix' => 'emails'],
            function () {
                Route::get('compose', 'EmailController@create');
                Route::post('compose', 'EmailController@store');
                Route::get('inbox', 'EmailController@inbox');
                Route::get('sent', 'EmailController@sent');
                Route::get('{email}', ['as' => 'emails.show', 'uses' => 'EmailController@show']);
                Route::get('{email}/reply', ['as' => 'emails.reply', 'uses' => 'EmailController@reply']);
                Route::get('{email}/forward', ['as' => 'emails.forward', 'uses' => 'EmailController@forward']);
            }
        );
        Route::resource('emails', 'EmailController');

        // Role Management
        Route::group(
            ['prefix' => 'roles'],
            function () {
                Route::get('{group}/delete', 'RolesController@destroy')->name('roles.delete');
                Route::get('{group}/confirm-delete', 'RolesController@getModalDelete')->name('roles.confirm-delete');
                Route::get('{group}/restore', 'RolesController@getRestore')->name('roles.restore');
            }
        );
        Route::resource('roles', 'RolesController');

        /*routes for blog*/
        Route::group(
            ['prefix' => 'blog'],
            function () {
                Route::get('{blog}/delete', 'BlogController@destroy')->name('blog.delete');
                Route::get('{blog}/confirm-delete', 'BlogController@getModalDelete')->name('blog.confirm-delete');
                Route::get('{blog}/restore', 'BlogController@restore')->name('blog.restore');
                Route::post('{blog}/storecomment', 'BlogController@storeComment')->name('storeComment');
            }
        );
        Route::resource('blog', 'BlogController');

        /*routes for blog category*/
        Route::group(
            ['prefix' => 'blogcategory'],
            function () {
                Route::get('{blogCategory}/delete', 'BlogCategoryController@destroy')->name('blogcategory.delete');
                Route::get('{blogCategory}/confirm-delete', 'BlogCategoryController@getModalDelete')->name('blogcategory.confirm-delete');
                Route::get('{blogCategory}/restore', 'BlogCategoryController@getRestore')->name('blogcategory.restore');
            }
        );
        Route::get('1_ds_hc','chemicalListController@index');
        Route::resource('blogcategory', 'BlogCategoryController');
        /*routes for file*/
        Route::group(
            ['prefix' => 'file'],
            function () {
                Route::post('create', 'FileController@store')->name('store');
                Route::post('createmulti', 'FileController@postFilesCreate')->name('postFilesCreate');
                //        Route::delete('delete', 'FileController@delete')->name('delete');
                Route::get('{id}/delete', 'FileController@destroy')->name('file.delete');
                Route::get('data', 'FileController@data')->name('file.data');
                Route::get('{user}/delete', 'FileController@destroy')->name('users.delete');
            }
        );

        /*routes for News*/
        Route::group(
            ['prefix' => 'news'],
            function () {
                Route::get('data', 'NewsController@data')->name('news.data');
                Route::get('{news}/delete', 'NewsController@destroy')->name('news.delete');
                Route::get('{news}/confirm-delete', 'NewsController@getModalDelete')->name('news.confirm-delete');
            }
        );
        Route::resource('news', 'NewsController');

        Route::get(
            'crop_demo',
            function () {
                return redirect('admin/imagecropping');
            }
        );


        /* laravel example routes */
        // Charts
        Route::get('laravel_charts', 'ChartsController@index')->name('laravel_charts');
        Route::get('database_charts', 'ChartsController@databaseCharts')->name('database_charts');

        // datatables
        Route::get('datatables', 'DataTablesController@index')->name('index');
        Route::get('datatables/data', 'DataTablesController@data')->name('datatables.data');

        // datatables
        Route::get('jtable/index', 'JtableController@index')->name('index');
        Route::post('jtable/store', 'JtableController@store')->name('store');
        Route::post('jtable/update', 'JtableController@update')->name('update');
        Route::post('jtable/delete', 'JtableController@destroy')->name('delete');



        // SelectFilter
        Route::get('selectfilter', 'SelectFilterController@index')->name('selectfilter');
        Route::get('selectfilter/find', 'SelectFilterController@filter')->name('selectfilter.find');
        Route::post('selectfilter/store', 'SelectFilterController@store')->name('selectfilter.store');

        // editable datatables
        Route::get('editable_datatables', 'EditableDataTablesController@index')->name('index');
        Route::get('editable_datatables/data', 'EditableDataTablesController@data')->name('editable_datatables.data');
        Route::post('editable_datatables/create', 'EditableDataTablesController@store')->name('store');
        Route::post('editable_datatables/{id}/update', 'EditableDataTablesController@update')->name('update');
        Route::get('editable_datatables/{id}/delete', 'EditableDataTablesController@destroy')->name('editable_datatables.delete');

        //    # custom datatables
        Route::get('custom_datatables', 'CustomDataTablesController@index')->name('index');
        Route::get('custom_datatables/sliderData', 'CustomDataTablesController@sliderData')->name('custom_datatables.sliderData');
        Route::get('custom_datatables/radioData', 'CustomDataTablesController@radioData')->name('custom_datatables.radioData');
        Route::get('custom_datatables/selectData', 'CustomDataTablesController@selectData')->name('custom_datatables.selectData');
        Route::get('custom_datatables/buttonData', 'CustomDataTablesController@buttonData')->name('custom_datatables.buttonData');
        Route::get('custom_datatables/totalData', 'CustomDataTablesController@totalData')->name('custom_datatables.totalData');

        //tasks section
        Route::post('task/create', 'TaskController@store')->name('store');
        Route::get('task/data', 'TaskController@data')->name('data');
        Route::post('task/{task}/edit', 'TaskController@update')->name('update');
        Route::post('task/{task}/delete', 'TaskController@delete')->name('delete');


        
        Route::get('xuathoachat','contingencyListController@index');
        Route::get('11_dsp_xetnghiem',function(){
            return view('admin.11_dsp_xetnghiem');
        });
    }
);

Route::group(
    ['prefix' => 'quanphong', 'namespace' => 'QuanPhong', 'middleware' => 'quanphong', 'as' => 'quanphong.'],
    function () {
        Route::get('/','indexController@index');
        Route::get('2_nhatky_sd','nhatKySuDungController@index');
        Route::post('2_nhatky_sd','nhatKySuDungController@store');
        Route::get('2_nhatky_sd/{id}','nhatKySuDungController@show');
        Route::get('2_dieuchuyen_hc','dieuChuyenHoaChatController@index');
        Route::post('2_dieuchuyen_hc','dieuChuyenHoaChatController@store');
        Route::get('2_hc_sd','baoCaoHangNgayController@index');
        Route::post('baocaohangngay','baoCaoHangNgayController@store');
        Route::get('2_hc_hongloi', 'baoCaoLoiController@index');
        Route::post('2_hc_hongloi','baoCaoLoiController@store');
        Route::get('2_ds_hc','danhSachHoaChatController@index');
        Route::get('2_hc_nv','hoaChatNhapVeController@index');
        Route::get('2_hc_tk','danhSachTonKhoController@index');
        Route::get('2_hc_hl','danhSachLoiHongController@index');
        Route::get('trang_chu_p','trangChuQuanPhongController@index');
        Route::post('loihong','danhSachLoiHongController@store');




    });

Route::group(
    ['prefix'=> 'quankho', 'namespace' => 'QuanKho', 'middleware' => 'quankho', 'as' => 'quankho.'],
    function() {
        // Route::get('/',function(){
        //     return redirect('admin/laravel_charts');
        // });
        //Route::get('/','ChartsController@index');
        Route::get('/','indexController@index');
        //Route::get('signin','AuthController@getSigin');
        Route::get('1_phan_hc','phanHoaChatController@index');
        Route::post('1_phan_hc','phanHoaChatController@store');
        Route::get('1_nhap_hc','addHoaChat@index');
        Route::post('1_nhap_hc','addHoaChat@store');
        Route::get('1_thongtinhc','themDanhMucHoaChatController@index');
        Route::post('1_thongtinhc','themDanhMucHoaChatController@store');
        Route::get('1_them_hc','themDanhMucHoaChatController@index');
        Route::post('1_them_hc','themDanhMucHoaChatController@store');
        Route::get('1_them_hc/{name}/{id}','themDanhMucHoaChatController@edit');
        Route::get('1_dsp_xetnghiem','hoaChatCacPhongController@index');
        Route::get('1_ds_hc','danhSachNhapKhoController@index');
        Route::get('trang_chu','trangChuQuanKhoController@index');
        Route::get('1_ds_dt','danhSachDuTruController@index');
        Route::post('1_ds_dt','danhSachDuTruController@store');
        Route::get('1_ds_tk','danhSachTonKhoController@index');
        Route::get('danhsachhoachat','danhSachHoaChatController@index');
        Route::get('/dsnhapkho','danhSachNhapKhoController@index');
        Route::get('/dshoachat','danhSachHoaChatController@index');
        Route::get('/dstonkho','danhSachTonKhoController@index');
        Route::post('/dstonkho','danhSachTonKhoController@store');
        Route::get('/dsnhapkho/show','danhSachNhapKhoController@show');
        Route::get('/dsdutru','danhSachDuTruController@index');
        Route::post('/phanhoachat','phanHoaChatController@store');
        Route::get('1_nhatky_sd','baoCaoMuonController@index');
        Route::get('1_nhatky_sd/edit','baoCaoMuonController@edit');

    });

    Route::group(
        ['prefix'=> 'admin', 'namespace' => 'QuanPhong'],
        function() {
            Route::get('xem','baoCaoHangNgayController@index');
        });


// Remaining pages will be called from below controller method
// in real world scenario, you may be required to define all routes manually

Route::group(
    ['prefix' => 'admin', 'middleware' => 'admin'],
    function () {
        Route::get('{name?}', 'JoshController@showView');
    }
);

// FrontEndController
Route::get('login', 'FrontEndController@getLogin')->name('login');
Route::post('login', 'FrontEndController@postLogin')->name('login');
Route::get('register', 'FrontEndController@getRegister')->name('register');
Route::post('register', 'FrontEndController@postRegister')->name('register');
Route::get('activate/{userId}/{activationCode}', 'FrontEndController@getActivate')->name('activate');
Route::get('forgot-password', 'FrontEndController@getForgotPassword')->name('forgot-password');
Route::post('forgot-password', 'FrontEndController@postForgotPassword');

// Social Logins
Route::get('facebook', 'Admin\FacebookAuthController@redirectToProvider');
Route::get('facebook/callback', 'Admin\FacebookAuthController@handleProviderCallback');

Route::get('linkedin', 'Admin\LinkedinAuthController@redirectToProvider');
Route::get('linkedin/callback', 'Admin\LinkedinAuthController@handleProviderCallback');

Route::get('google', 'Admin\GoogleAuthController@redirectToProvider');
Route::get('google/callback', 'Admin\GoogleAuthController@handleProviderCallback');


// Forgot Password Confirmation
Route::post('forgot-password/{userId}/{passwordResetCode}', 'FrontEndController@postForgotPasswordConfirm');
Route::get('forgot-password/{userId}/{passwordResetCode}', 'FrontEndController@getForgotPasswordConfirm')->name('forgot-password-confirm');
// My account display and update details
Route::group(
    ['middleware' => 'user'],
    function () {
        Route::put('my-account', 'FrontEndController@update');
        Route::get('my-account', 'FrontEndController@myAccount')->name('my-account');
    }
);
// Email System
Route::group(
    ['prefix' => 'user_emails'],
    function () {
        Route::get('compose', 'UsersEmailController@create');
        Route::post('compose', 'UsersEmailController@store');
        Route::get('inbox', 'UsersEmailController@inbox');
        Route::get('sent', 'UsersEmailController@sent');
        Route::get('hello','UsersEmailController@newaa')->name('hello');
        Route::get('{email}', ['as' => 'user_emails.show', 'uses' => 'UsersEmailController@show']);
        Route::get('{email}/reply', ['as' => 'user_emails.reply', 'uses' => 'UsersEmailController@reply']);
        Route::get('{email}/forward', ['as' => 'user_emails.forward', 'uses' => 'UsersEmailController@forward']);
    }
);
Route::resource('user_emails', 'UsersEmailController');
Route::get('logout', 'FrontEndController@getLogout')->name('logout');
// contact form
Route::post('contact', 'FrontEndController@postContact')->name('contact');

// frontend views
// Route::get(
//     '/',
//     ['as' => 'home', function () {
//         return view('index');
//     }]
// );

Route::get(
    '/',
    [ function () {
        return redirect()->route('login');
    }]
);

Route::get('newname','NameCotroller@new');

Route::get('blog', 'BlogController@index')->name('blog');
Route::get('blog/{slug}/tag', 'BlogController@getBlogTag');
Route::get('blogitem/{slug?}', 'BlogController@getBlog');
Route::post('blogitem/{blog}/comment', 'BlogController@storeComment');

//news
Route::get('news', 'NewsController@index')->name('news');
Route::get('news/{news}', 'NewsController@show')->name('news.show');

Route::get('{name?}', 'FrontEndController@showFrontEndView');
// End of frontend views
