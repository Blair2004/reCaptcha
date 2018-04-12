<?php
namespace Modules\Recaptcha\Events;

use Tendoo\Core\Services\Menus;

class Dashboard
{
    public function loaded()
    {
        $menus  =   app()->make( Menus::class );

        $reCaptchaMenu              =   new \stdClass;
        $reCaptchaMenu->text        =   __( 'reCaptcha' );
        $reCaptchaMenu->namespace   =   'recaptcha_settings';
        $reCaptchaMenu->href        =   route( 'dashboard.setting.recaptcha' );

        $menus->addTo( 'settings', $reCaptchaMenu );
    }
}