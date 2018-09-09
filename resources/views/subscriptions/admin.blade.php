@extends('layouts.app')

@section('jumbotron')
    @include('partials.jumbotron',
    [
    'title' => __('Plan de suscripción'),
    'icon' => 'film'
    ])
@endsection

@section('content')
    <div class="pl-5 pr-5">
        <table class="table table-hover table-dark">
            <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Nombre</th>
                <th scope="col">Plan</th>
                <th scope="col">ID Suscripción</th>
                <th scope="col">Cantidad</th>
                <th scope="col">Alta</th>
                <th scope="col">Finaliza en</th>
                <th scope="col">Cancelar / Reanudar</th>
            </tr>
            </thead>
            <tbody>
            @forelse($subscriptions as $subscription)
                <td>{{ $subscription->id }}</td>
                <td>{{ __($subscription->name) }}</td>
                <td>{{ __($subscription->stripe_plan) }}</td>
                <td>{{ $subscription->stripe_id }}</td>
                <td>{{ $subscription->quantity }}</td>
                <td>{{ $subscription->created_at->format('d/m/Y') }}</td>
                <td>{{ $subscription->ends_at ? $subscription->ends_at->format('d/m/Y') : __("Suscripción activa") }}</td>
                <td>
                    @if($subscription->ends_at)
                        <form action="{{ route('subscriptions.resume') }}" method="POST">
                            @csrf
                            <input type="hidden" name="plan" value="{{ $subscription->name }}" />
                            <button class="btn btn-success">
                                {{ __("Reanudar") }}
                            </button>
                        </form>
                    @else
                        <form action="{{ route('subscriptions.cancel') }}" method="POST">
                            @csrf
                            <input type="hidden" name="plan" value="{{ $subscription->name }}" />
                            <button class="btn btn-danger">
                                {{ __("Cancelar") }}
                            </button>
                        </form>
                    @endif
                </td>
            @empty
                <tr>
                    <td colspan="8">{{ __("No hay ninguna suscripción disponible") }}</td>
                </tr>
            @endforelse
            </tbody>
        </table>
    </div>
@endsection
