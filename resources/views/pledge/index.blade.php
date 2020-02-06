@extends('layouts.app')

@section('content')
    <div class="container">
        @if (session('status'))
            <div class="alert alert-success">
                {{ session('status') }}
            </div>
        @endif
            @if(session('message'))
                <div class="alert alert-danger">
                    {{ session('message') }}
                </div>
            @endif
        <div class="row justify-content-center">
            <a href="/searchform" class="btn btn-primary" role="button">Поиск</a>
            @can('create', App\Models\Pledgeholder::class)
                <a href="/pledgeform" class="btn btn-primary btn-lg margin-x-md" role="button">Добавить залог</a>
            @endcan
        </div>
    </div>
@endsection
