<?php
namespace Modules\Recaptcha\Events;

use Illuminate\Support\Facades\View;
use Tendoo\Core\Facades\Curl;

class Auth
{
    /**
     * login fields
     * @return array of login fields
     */
    public function loginFields( $fields )
    {
        $recaptcha          =   new \stdClass;
        $recaptcha->type    =   'html';
        $recaptcha->output  =  View::make( 'Recaptcha::recaptcha-field' );
        
        $fields[]   =   $recaptcha;
        return $fields;
    }

    /**
     * Login Footer
     * @return void
     */
    public function loginFooter( $views )
    {
        $views[]    =   'Recaptcha::recaptcha-script';
        return $views;
    }

    /**
     * Handle Before Login Events
     * @return void
     */
    public function beforeLogin()
    {
        $Options    =   app()->make( 'Tendoo\Core\Services\Options' );

        $response   =   Curl::to( 'https://www.google.com/recaptcha/api/siteverify' )
            ->withData([
                'secret'    =>  $Options->get( 'recaptcha_secret_key' ),
                'response'  =>  request()->input( 'g-recaptcha-response' ),
                'remoteip'  =>  request()->ip()
            ])
            ->withContentType( 'application/x-www-form-urlencoded' )
            ->asJsonResponse()
            ->post();

        if ( $response->success == false ) {
            return redirect()->route( 'login.index' )->with([
                'status'    =>  'danger',
                'message'   =>  __( 'An error occured during the reCaptcha validation. Please try again !' )
            ]);
        } 
    }
}