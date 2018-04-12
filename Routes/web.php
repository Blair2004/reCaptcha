<?php

Route::get( '/dashboard/recaptcha/settings', 'RecaptchaController@settings' )
    ->name( 'dashboard.setting.recaptcha' );

Route::post( '/dashboard/recaptchat/settings', 'RecaptchaController@post' )
    ->name( 'dashboard.settings.recaptcha.post' );