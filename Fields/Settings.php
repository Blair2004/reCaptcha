<?php
namespace Modules\Recaptcha\Fields;

use Tendoo\Core\Services\Options;

class Settings
{
    /**
     * Get Settings Fields
     * @return array of fields
     */
    public function fields()
    {
        $options    =   app()->make( Options::class );
        $reCaptchaSiteKey   =   new \stdClass;
        $reCaptchaSiteKey->name     =   'recaptcha_site_key';
        $reCaptchaSiteKey->label    =   __( 'Site Key' );
        $reCaptchaSiteKey->type     =   'text';
        $reCaptchaSiteKey->value    =   $options->get( $reCaptchaSiteKey->name );
        $reCaptchaSiteKey->validation   =   'required';
        $reCaptchaSiteKey->description  =   __( 'Provide the site key as mentionned on Google.' );

        $reCaptchaSecretKey     =   new \stdClass;
        $reCaptchaSecretKey->name   =   'recaptcha_secret_key';
        $reCaptchaSecretKey->label  =   __( 'Secret Key' );
        $reCaptchaSecretKey->validation     =   'required';
        $reCaptchaSecretKey->type   =   'text';
        $reCaptchaSecretKey->value    =   $options->get( $reCaptchaSecretKey->name );
        $reCaptchaSecretKey->description    =   __( 'Provide the secret key as mentionned on Google' );

        return [ $reCaptchaSiteKey, $reCaptchaSecretKey ];
    }
}