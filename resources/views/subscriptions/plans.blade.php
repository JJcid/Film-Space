@extends('layouts.app')

@push('styles')
    <link rel="stylesheet" href="{{ asset('css/pricing.css') }}">
@endpush


@section('jumbotron')
    @include('partials.jumbotron',
    [
    'title' => __('Suscríbete a nuestros planes'),
    'icon' => 'film'
    ])
@endsection

@section('content')
    <div class="container">
        <div class="pricing-table pricing-three-column row">

            <div class="plan col-sm-4 col-lg-4">
                <div class="plan-name-bronze">
                    <h2>{{ __('MENSUAL') }}</h2>
                    <span>{{ __(':price / Mes', ['price' => '7,99 €']) }}</span>
                </div>
                <ul>
                    <li class="plan-feature"> {{ __('Acceso a todas las películas del plan de suscripción') }} </li>
                    <li class="plan-feature">
                        @include('partials.stripe.form', [
                            "product" => [
                                "name" => __('Suscripción mensual'),
                                "description" => __("Mensual"),
                                "type" => "monthly",
                                "amount" => 799,99
                            ]
                        ])
                    </li>
                </ul>
            </div>

            <div class="plan col-sm-4 col-lg-4">
                <div class="plan-name-silver">
                    <h2>{{ __('TRIMESTRAL') }}</h2>
                    <span>{{ __(':price / 3 meses', ['price' => '20,00 €']) }}</span>
                </div>
                <ul>
                    <li class="plan-feature"> {{ __('Acceso a todas las películas del plan de suscripción') }} </li>
                    <li class="plan-feature">
                        @include('partials.stripe.form', [
                            "product" => [
                                "name" => __('Suscripción trimestral'),
                                "description" => __("Trimestral"),
                                "type" => "quarterly",
                                "amount" => 2000,00
                            ]
                        ])
                    </li>
                </ul>
            </div>

            <div class="plan col-sm-4 col-lg-4">
                <div class="plan-name-gold">
                    <h2>{{ __('ANUAL') }}</h2>
                    <span>{{ __(':price / 12 meses', ['price' => '69,99 €']) }}</span>
                </div>
                <ul>
                    <li class="plan-feature"> {{ __('Acceso a todas las películas del plan de suscripción') }} </li>
                    <li class="plan-feature">
                        @include('partials.stripe.form', [
                            "product" => [
                                "name" => __('Suscripción anual'),
                                "description" => __("Anual"),
                                "type" => "yearly",
                                "amount" => 6999,99
                            ]
                        ])
                    </li>
                </ul>
            </div>
        </div>
    </div>
@endsection
