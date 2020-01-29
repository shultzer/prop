@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Login') }}</div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('login') }}">
                            @csrf

                            <div class="form-group row">
                                <label for="email" class="col-md-4 col-form-label text-md-right">Наименование имущества</label>
                                <div class="col-md-6">
                                    <select class="form-control" multiple >
                                        @foreach($realestateassets as $realestateasset)
                                        <option> - </option>
                                        <option>{{ $realestateasset->name, $realestateasset->inventory_number }}</option>
                                        @endforeach
                                    </select>

                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="email" class="col-md-4 col-form-label text-md-right">Наименование банка</label>
                                <div class="col-md-6">
                                    <input id="bank_name" type="text" class="form-control" name="bank_name" value="{{ old('bank_name') }}" required >
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="email" class="col-md-4 col-form-label text-md-right">Номер договора</label>
                                <div class="col-md-6">
                                    <input id="contract" type="text" class="form-control" name="contract" value="{{ old('contract') }}" required >
                                </div>
                            </div>
                            {{--<div class="form-group row">
                                <div class="col-md-6 offset-md-4">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                        <label class="form-check-label" for="remember">
                                            {{ __('Remember Me') }}
                                        </label>
                                    </div>
                                </div>
                            </div>--}}

                            <div class="form-group row mb-0">
                                <div class="col-md-8 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        Внести
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
