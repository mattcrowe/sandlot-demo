<?php

# admin/belt/core home
Route::get('{any?}', function () {
    return view('admin.dashboard');
})->where('any', '(.*)');

# admin home
Route::get('', function () {
    return view('admin.dashboard');
});