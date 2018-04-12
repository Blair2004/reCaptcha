<?php
namespace Modules\Recaptcha;

use Illuminate\Support\Facades\Event;
use Tendoo\Core\Services\TendooModule;
use Tendoo\Core\Facades\Hook;

class RecaptchaModule extends TendooModule
{
    public function __construct()
    {
        parent::__construct( __FILE__ );

        Hook::addFilter( 'login.fields', 'Modules\Recaptcha\Events\Auth@loginFields' );
        Hook::addFilter( 'login.footer.views', 'Modules\Recaptcha\Events\Auth@loginFooter' );
        Hook::addFilter( 'options.validation.rules', 'Modules\Recaptcha\Events\Options@validation', 10, 2 );
        Hook::addAction( 'dashboard.loaded', 'Modules\Recaptcha\Events\Dashboard@loaded' );
        Hook::addFilter( 'before.login', 'Modules\Recaptcha\Events\Auth@beforeLogin' );
    }
}