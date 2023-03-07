<?php

Route::get('upgrade/database', function () {
    if (config('app.upgrade_mode')) {
        Artisan::call('migrate', ['--force' => true]);
    }
});

Route::get('lang-js', function () {
    Artisan::call('lang:js');
});
