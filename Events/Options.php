<?php
namespace Modules\Recaptcha\Events;

use Illuminate\Foundation\Http\FormRequest;
use Tendoo\Core\Services\Helper;
use Modules\Recaptcha\Fields\Settings;

class Options
{
    public function validation( $validations, FormRequest $request ) 
    {
        if ( $request->input( '_route' ) === 'dashboard.setting.recaptcha' ) {
            
            $settings     =   app()->make( Settings::class );

            return array_merge( 
                $validations, 
                Helper::getFieldsValidation( $settings->fields() ) 
            );
        }
    }
}