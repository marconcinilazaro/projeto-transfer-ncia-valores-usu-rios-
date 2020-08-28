<?php
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Http;

Route::group(['middleware' => ['auth'], 'name' => 'Admin'], function(){
    Route::get('saldo', 'Admin\SaldoController@index')->name('admin.saldo');
    Route::get('admin', 'Admin\AdminController@index')->name('admin.home');
    Route::get('home', 'Admin\AdminController@index')->name('admin.home');

    Route::get('transferencia', 'Admin\TransferenciaController@index')->name('admin.transferencia');
    Route::post('transfer.store', 'Admin\TransferenciaController@transferStore')->name('transfer.store');
    Route::post('transfer.confirm', 'Admin\TransferenciaController@transferConfirm')->name('transfer.confirm');
});




Route::get('/', 'Site\SiteController@index')->name('admin');

Route::get('/http-confirmaTransf', function(){

    $confim = Http::post('https://run.mocky.io/v3/8fafdd68-a090-496f-8c9a-3442cf30dae6',[
        'value' => 100,
        'payer' => 4,
        'payee' => 15
    ]);
    if($confim->clientError() || $confim->serverError())
        dd('Error na requisição..');

        return $confim->body();
    
});

Route::get('/http-confirmaReceb', function(){

    $confim = Http::post('https://run.mocky.io/v3/b19f7b9f-9cbf-4fc6-ad22-dc30601aec04',[
        'value' => 100,
        'payer' => 4,
        'payee' => 15
    ]);
    if($confim->clientError() || $confim->serverError())
        dd('Error na requisição..');

        return $confim->body();
    
});

Auth::routes();