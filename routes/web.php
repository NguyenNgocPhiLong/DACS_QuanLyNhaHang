<?php

use App\Http\Controllers\admin\EventController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Controllers\admin;

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

//Route::get('/', function () {
//    return view('welcome');
//});
Route::namespace ('client')->group(function () {
    Route::get('/', 'TrangChuController@get')->name('trangchu');
    Route::get('/gioi-thieu', 'TrangChuController@gioithieu')->name('gioithieu');
    Route::get('/menu', 'MenuController@get')->name('menu');
    Route::get('/dat-ban', 'TrangChuController@datban')->name('datban');
    Route::post('/dat-ban', 'TrangChuController@Post');
    Route::get('/dangnhap', 'DangNhapController@DangNhap')->name('dangnhap');
    Route::post('/dangnhap', 'DangNhapController@PostDangNhap');
    Route::get('/search','SearchController@getSearch');
    Route::post('/search/name','SearchController@getSearchAjax')->name('search');
    Route::get('/add-Cart/{id}','CartController@addCart')->name('add-Cart');
    Route::get('/delete-item-Cart/{id}','CartController@DeleteItemCart')->name('delete-item-Cart');
    Route::get('/list-cart','CartController@viewListCart')->name('list-cart');
    Route::get('/Delete-Item-List-Cart/{id}','CartController@DeleteListItemCart');
    Route::get('/Save-Item-List-Cart/{id}/{quanty}','CartController@SaveListItemCart');
    Route::post('/Save-All','CartController@saveAllListItemCart');
    Route::post('/Delete-All','CartController@deleteAllListItemCart');
    Route::get('/Thanhtoan','CartController@thanhtoan')->name('Thanhtoan');
    Route::post('/PostThanhtoan','CartController@PostThanhtoan');
});

Route::namespace ('admin')->group(function () {
    Route::get('/dangnhap', 'DangNhapController@DangNhap')->name('dangnhap');
    Route::post('/dangnhap', 'DangNhapController@PostDangNhap');
    Route::get('/dangxuat', 'DangNhapController@DangXuat')->name('dangxuat');
    Route::get('/staff','TaiKhoanController@DanhSachTaiKhoan')->name('staff');
});
Route::get('/fullcalender', [EventController::class, 'index']);
//Route::get('/index', 'FullCalenderController@index')->name('index');
//Route::post('/indexAjax', 'FullCalenderController@ajax')->name('indexAjax');

Route::post('/fullcalenderAjax', [EventController::class, 'ajax']);

//admin
//Route::namespace ('admin')->prefix('admin')->middleware('required.login')->group(function () {

Route::namespace('staff')->prefix('staff')->group(function (){
    Route::get('/',function (){
        return view('admin.home');
    })->name('staff');//tao trang staff de dua nhan vien vao va cung tao trang khach hang admin de khach co the quan ly viec dat ban cua minh
    Route::prefix('taikhoan')->group(function (){
        Route::get('/danhsachtaikhoan','TaiKhoanController@DanhSachTaiKhoan')->name('danhsachtaikhoannhanvien');
        Route::get('/edit/{id}','TaiKhoanController@SuaTaiKhoan')->name('suataikhoannhanvien');
        Route::post('/edit/{id}','TaiKhoanController@PostSuaTaiKhoan');
    });
    //route món ăn
    Route::prefix('monan')->group(function () {
        Route::get('/', 'MonAnController@DanhSachMonAn')->name('danhsachmonan1');
        //thêm món ăn
        Route::get('/add', 'MonAnController@ThemMonAn')->name('themmonan1');
        Route::post('/add', 'MonAnController@PostThemMonAn');
//        //sửa món ăn
//        Route::get('/edit/{id}', 'MonAnController@SuaMonAn')->name('suamonan1');
//        Route::post('/edit/{id}', 'MonAnController@PostSuaMonAn');
//        //xóa món ăn
//        Route::get('/delete/{id}', 'MonAnController@XoaMonAn')->name('xoamonan1');
    });

    //route danh mục
    Route::prefix('danhmuc')->group(function () {
        Route::get('/', 'DanhMucController@DanhSachDanhMuc')->name('danhsachdanhmuc1');
        //Thêm danh mục
        Route::get('/add', 'DanhMucController@ThemDanhMuc')->name('themdanhmuc1');
        Route::post('/add', 'DanhMucController@PostThemDanhMuc');
        //Sửa danh mục
//        Route::get('/edit/{id}', 'DanhMucController@SuaDanhMuc')->name('suadanhmuc');
//        Route::post('/edit/{id}', 'DanhMucController@PostSuaDanhMuc');
//        //Xóa danh mục
//        Route::get('/delete/{id}', 'DanhMucController@XoaDanhMuc')->name('xoadanhmuc');
    });
    Route::prefix('datban')->group(function () {
        Route::get('/', 'DatBanController@DanhSachDatBan')->name('danhsachdatban1');
//        Route::get('/delete/{id}', 'DatBanController@XoaDatBan')->name('xoadatban');
        Route::get('/thongke', 'DatBanController@thongke')->name('thongke1');
    });

    Route::prefix('phong')->group(function (){
        Route::get('/','PhongController@DanhSachPhong')->name('danhsachphong1');
        Route::get('/add','PhongController@ThemPhong')->name('themphong1');
        Route::post('/add','PhongController@PostThemPhong');
        Route::get('/edit{id}','PhongController@SuaPhong')->name('suaphong1');
        Route::post('/edit{id}','PhongController@PostSuaPhong');
//        Route::get('/delete{id}','PhongController@XoaPhong')->name('xoaphong');
    });

    Route::prefix('loaiphong')->group(function (){
        Route::get('/','LoaiPhongController@DanhSachLoaiPhong')->name('danhsachloaiphong1');
        Route::get('/add','LoaiPhongController@ThemLoaiPhong')->name('themloaiphong1');
        Route::post('/add','LoaiPhongController@PostThemLoaiPhong');
        Route::get('/edit/{id}','LoaiPhongController@SuaLoaiPhong')->name('sualoaiphong1');
        Route::post('/add/{id}','LoaiPhongController@PostSuaLoaiPhong');
//        Route::get('/delete/{id}','LoaiPhongController@XoaLoaiPhong')->name('xoaloaiphong');
    });
    Route::prefix('fullcalender')->group(function (){
        Route::get('/','EventController@index')->name('fullcalender1');
        Route::post('/fullcalenderAjax','EventController@ajax');
        Route::get('/show','EventController@Show')->name('show1');
        Route::get('/edit/{id}','EventController@SuaLich')->name('sualich1');//theo id nguoi tao
        Route::post('/edit/{id}','EventController@PostSuaLich');
        Route::get('/delete/{id}', 'EventController@XoaLich')->name('xoalich1');
        Route::get('/add','EventController@ThemEvent')->name('them_event1');
        Route::post('/add','EventController@PostThemEvent');
    });



});
Route::namespace ('admin')->prefix('admin')->group(function () {
    Route::get('/', function () {
        return view('admin.home');
    })->name('homeadmin');

    //route món ăn
    Route::prefix('monan')->group(function () {
        Route::get('/', 'MonAnController@DanhSachMonAn')->name('danhsachmonan');
        //thêm món ăn
        Route::get('/add', 'MonAnController@ThemMonAn')->name('themmonan');
        Route::post('/add', 'MonAnController@PostThemMonAn');
        //sửa món ăn
        Route::get('/edit/{id}', 'MonAnController@SuaMonAn')->name('suamonan');
        Route::post('/edit/{id}', 'MonAnController@PostSuaMonAn');
        //xóa món ăn
        Route::get('/delete/{id}', 'MonAnController@XoaMonAn')->name('xoamonan');
    });

    //route danh mục
    Route::prefix('danhmuc')->group(function () {
        Route::get('/', 'DanhMucController@DanhSachDanhMuc')->name('danhsachdanhmuc');
        //Thêm danh mục
        Route::get('/add', 'DanhMucController@ThemDanhMuc')->name('themdanhmuc');
        Route::post('/add', 'DanhMucController@PostThemDanhMuc');
        //Sửa danh mục
        Route::get('/edit/{id}', 'DanhMucController@SuaDanhMuc')->name('suadanhmuc');
        Route::post('/edit/{id}', 'DanhMucController@PostSuaDanhMuc');
        //Xóa danh mục
        Route::get('/delete/{id}', 'DanhMucController@XoaDanhMuc')->name('xoadanhmuc');
    });

    Route::prefix('taikhoan')->group(function () {
        Route::get('/', 'TaiKhoanController@DanhSachTaiKhoan')->name('danhsachtaikhoan');
        //Thêm tài khoản
        Route::get('/add', 'TaiKhoanController@ThemTaiKhoan')->name('themtaikhoan');
        Route::post('/add', 'TaiKhoanController@PostThemTaiKhoan');
        //Xóa tài khoản
        Route::get('/delete/{id}', 'TaiKhoanController@XoaTaiKhoan')->name('xoataikhoan');
        //sửa tài khoản
        Route::get('/edit/{id}','TaiKhoanController@SuaTaiKhoan')->name('suataikhoan');
        Route::post('/edit/{id}','TaiKhoanController@PostSuaTaiKhoan');
    });

    Route::prefix('datban')->group(function () {
        Route::get('/', 'DatBanController@DanhSachDatBan')->name('danhsachdatban');
        Route::get('/delete/{id}', 'DatBanController@XoaDatBan')->name('xoadatban');
        Route::get('/thongke', 'DatBanController@thongke')->name('thongke');
    });

    Route::prefix('loainguoidung')->group(function (){
        Route::get('/','LoaiNguoiDungController@DanhSachLoaiNguoiDung')->name('danhsachloainguoidung');
        Route::get('/add','LoaiNguoiDungController@ThemLoaiNguoiDung')->name('themloainguoidung');
        Route::post('/add','LoaiNguoiDungController@PostThemLoaiNguoiDung');
        Route::get('/edit/{id}','LoaiNguoiDungController@SuaLoaiNguoiDung')->name('sualoainguoidung');
        Route::post('/edit/{id}','LoaiNguoiDungController@PostSuaNguoiDung');
        Route::get('/delete/{id}','LoaiNguoiDungController@XoaLoaiNguoiDung')->name('xoaloainguoidung');
    });

    Route::prefix('phong')->group(function (){
        Route::get('/','PhongController@DanhSachPhong')->name('danhsachphong');
        Route::get('/add','PhongController@ThemPhong')->name('themphong');
        Route::post('/add','PhongController@PostThemPhong');
        Route::get('/edit{id}','PhongController@SuaPhong')->name('suaphong');
        Route::post('/edit{id}','PhongController@PostSuaPhong');
        Route::get('/delete{id}','PhongController@XoaPhong')->name('xoaphong');
    });

    Route::prefix('loaiphong')->group(function (){
        Route::get('/','LoaiPhongController@DanhSachLoaiPhong')->name('danhsachloaiphong');
        Route::get('/add','LoaiPhongController@ThemLoaiPhong')->name('themloaiphong');
        Route::post('/add','LoaiPhongController@PostThemLoaiPhong');
        Route::get('/edit/{id}','LoaiPhongController@SuaLoaiPhong')->name('sualoaiphong');
        Route::post('/add/{id}','LoaiPhongController@PostSuaLoaiPhong');
        Route::get('/delete/{id}','LoaiPhongController@XoaLoaiPhong')->name('xoaloaiphong');
    });


//Route::get('/index', 'FullCalenderController@index')->name('index');
//Route::post('/indexAjax', 'FullCalenderController@ajax')->name('indexAjax');



    Route::prefix('fullcalender')->group(function (){
        Route::get('/','EventController@index')->name('fullcalender');
        Route::post('/fullcalenderAjax','EventController@ajax');
        Route::get('/show','EventController@Show')->name('show');
        Route::get('/edit/{id}','EventController@SuaLich')->name('sualich');
        Route::post('/edit/{id}','EventController@PostSuaLich');
        Route::get('/delete/{id}', 'EventController@XoaLich')->name('xoalich');
        Route::get('/add','EventController@ThemEvent')->name('them_event');
        Route::post('/add','EventController@PostThemEvent');
    });
//
});
//Route::namespace ('staff')->prefix('staff')->group(function () {
//    Route::get('/', function () {
//        return view('admin.home');
//    })->name('homeadmin');

//});
