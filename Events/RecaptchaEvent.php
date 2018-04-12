<?php
namespace Modules\Recaptcha\Events;

// use Tendoo\Core\Services\Menus;
// use Tendoo\Core\Services\Helper;

/**
 * Register Events
**/
class RecaptchaEvent
{
    public function __construct( Menus $menus )
    {
        $this->menus    =   $menus;
    }
}