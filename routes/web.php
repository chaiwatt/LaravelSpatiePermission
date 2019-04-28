<?php
Route::get('/', function () {
    return view('welcome');
});
Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');
Route::get('/check', 'HomeController@Check')->name('check');
Route::group(['prefix' => 'permission'], function(){
    Route::get('test', 'PermissionController@Test')->name('test');
    Route::get('createpermission/{name}','PermissionController@CreatePermission')->name('permission.create');
    Route::get('createrole/{name}','PermissionController@CreateRole')->name('role.create');
    Route::get('assignrole/{role}/{permission}','PermissionController@AssignRole')->name('assign.role');
    Route::get('removerole/{role}/{permission}','PermissionController@RemoveRole')->name('remove.role');
    Route::get('revokepermission/{role}/{permission}','PermissionController@RevokePermission')->name('revoke.permission');
    Route::get('givepermission/{role}/{permission}','PermissionController@GivePermission')->name('give.permission');
    Route::group(['prefix' => 'user'], function(){
        Route::get('givepermission/{permission}/{model}','PermissionUserController@GivePermission')->name('user.give.permission');
        Route::get('assignrole/{role}/{model}','PermissionUserController@AssignRole')->name('user.assign.role');
    });
});

Route::group(['prefix' => 'post'], function(){
    Route::get('/','PostController@Index')->name('post.index');
    Route::get('create','PostController@Create')->name('post.create')->middleware('role:writer|admin');
    Route::post('createsave','PostController@CreateSave')->name('post.createsave');
    Route::get('edit/{id}','PostController@Edit')->name('post.edit')->middleware('permission:edit post');;
    Route::post('editsave/{id}','PostController@EditSave')->name('post.editsave');
    Route::get('delete/{id}','PostController@Delete')->name('post.delete');
});

