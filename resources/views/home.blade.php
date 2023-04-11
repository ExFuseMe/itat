@extends('layouts.main')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Складской учёт') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    @if (Auth::user()->role !== 'admin' )
                        <div>Вы не являетесь администратором</div>
                    @else
                        <div>Добро пожаловать,{{Auth::user()->name}}</div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
