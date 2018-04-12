<?php
namespace Modules\Recaptcha\Http\Controllers;

use Tendoo\Core\Http\Controllers\TendooController;
use Tendoo\Core\Services\Page;
use Illuminate\Support\Facades\View;

class RecaptchaController extends TendooController
{
    public function __construct()
    {
        parent::__construct();
    }

    public function settings()
    {
        Page::setTitle( __( 'reCaptcha Settings' ) );
        return View::make( 'Recaptcha::recaptcha-settings' );
    }
}