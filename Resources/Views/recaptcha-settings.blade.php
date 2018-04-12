@extends( 'tendoo::components.backend.master' )
@inject( 'Field', 'Tendoo\Core\Services\Field' )
@section( 'tendoo::components.backend.master.body' )
    <form action="{{ route( 'dashboard.options.post' ) }}" method="post">
        {{ csrf_field() }}
        {{ route_field() }}
        <div class="card">
            <div class="card-header">
                {{ __( 'reCaptcha Settings' ) }}
            </div>
            @include( 'tendoo::partials.shared.errors' )
            <div class="card-body row">
                <div class="col-md-6 col-xs-12">
                    @each( 'tendoo::partials.shared.fields', $Field->get( 'Modules\Recaptcha\Fields\Settings', 'fields' ), 'field' )
                </div>
                <div class="col-md-6 col-xs-12">
                </div>
            </div>
            <div class="card-footer p-2-5">
                <button type="submit" class="mb-0 btn btn-raised btn-primary">{{ __( 'Save Settings' ) }}</button>
            </div>
        </div>
    </form>
@endsection