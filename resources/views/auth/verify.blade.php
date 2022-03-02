@extends('layouts.app')

@section('content')
    <container-body-component>
        <template slot="body">
            <card-component>
                <template slot="header">
                    <h4>{{ __('Verificar endereço de e-mail') }}</h4>
                </template>
                <template slot="body">
                    @if (session('resent'))
                        <div class="alert alert-success" role="alert">
                            {{ __('A fresh verification link has been sent to your email address.') }}
                        </div>
                    @endif

                    {{ __('Before proceeding, please check your email for a verification link.') }}
                    {{ __('If you did not receive the email') }}, <a href="{{ route('verification.resend') }}">{{ __('click here to request another') }}</a>.
                </template>
            </card-component>
        </template>
    </container-body-component>
@endsection
