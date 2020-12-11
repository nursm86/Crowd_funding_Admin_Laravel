<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\homeController;
use App\Http\Controllers\loginController;
use App\Http\Controllers\adminController;
use App\Http\Controllers\logoutController;
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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/home',[homeController::class,'index'])->name('home.index');
Route::get('home/donate/{id}',[homeController::class,'donate'])->name('home.donate');
Route::get('home/delete/{id}',[homeController::class,'delete'])->name('home.delete');
Route::get('home/editCampaign/{id}',[homeController::class,'editCampaign'])->name('home.editCampaign');


Route::get('/login',[loginController::class,'index'])->name('login.index');
Route::get('/forgotpassword',[loginController::class,'forgotpassword'])->name('login.forgotpassword');
Route::get('/changepassword',[loginController::class,'changepassword'])->name('login.changepassword');
Route::get('/logout',[logoutController::class,'index'])->name('logout.index');

Route::get('/admin',[adminController::class,'index'])->name('admin.index');
Route::get('/admin/profile',[adminController::class,'profile'])->name('admin.profile');
Route::get('/admin/adminlist',[adminController::class,'adminlist'])->name('admin.adminlist');

Route::get('/admin/personaluserlist',[adminController::class,'personaluserlist'])->name('admin.personaluserlist');
Route::get('/admin/personalUseredit/{id}',[adminController::class,'personalUseredit'])->name('admin.personalUseredit');

Route::get('/admin/blockuser/{id}',[adminController::class,'blockuser'])->name('admin.blockuser');
Route::get('/admin/unblockuser/{id}',[adminController::class,'unblockuser'])->name('admin.unblockuser');
Route::get('/admin/verifyuser/{id}',[adminController::class,'verifyuser'])->name('admin.verifyuser');

Route::get('/admin/organizationalList',[adminController::class,'organizationalList'])->name('admin.organizationalList');
Route::get('/admin/organizationalUseredit/{id}',[adminController::class,'organizationalUseredit'])->name('admin.organizationalUseredit');

Route::get('/admin/volunteerlist',[adminController::class,'volunteerlist'])->name('admin.volunteerlist');
Route::get('/admin/volunteeredit/{id}',[adminController::class,'volunteeredit'])->name('admin.volunteeredit');

Route::get('/admin/create',[adminController::class,'create'])->name('admin.create');
Route::get('/admin/donationlist',[adminController::class,'donationlist'])->name('admin.donationlist');
Route::get('/admin/releasedcampaign',[adminController::class,'releasedcampaign'])->name('admin.releasedcampaign');

Route::get('/admin/campaignslist',[adminController::class,'campaignslist'])->name('admin.campaignslist');
Route::get('/admin/campaignedit/{id}',[adminController::class,'campaignedit'])->name('admin.campaignedit');

Route::get('/admin/blockCampaign/{id}',[adminController::class,'blockCampaign'])->name('admin.blockCampaign');
Route::get('/admin/unblockCampaign/{id}',[adminController::class,'unblockCampaign'])->name('admin.unblockCampaign');
Route::get('/admin/verifyCampaign/{id}',[adminController::class,'verifyCampaign'])->name('admin.verifyCampaign');
Route::get('/admin/releaseCampaign/{id}',[adminController::class,'releaseCampaign'])->name('admin.releaseCampaign');

Route::get('/admin/reports',[adminController::class,'reports'])->name('admin.reports');
Route::get('/admin/deleteReport/{id}',[adminController::class,'deleteReport'])->name('admin.deleteReport');

Route::get('/admin/usersproblems',[adminController::class,'usersproblems'])->name('admin.usersproblems');
Route::get('/admin/deleteProblem/{id}',[adminController::class,'deleteProblem'])->name('admin.deleteProblem');

Route::get('/admin/generateReport',[adminController::class,'generateReport'])->name('admin.generateReport');
Route::post('/admin/generateReport',[adminController::class,'downloadReport']);