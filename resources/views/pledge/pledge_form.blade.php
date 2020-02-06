@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Новый залог</div>

                    <div class="card-body">
                        <form method="POST" action="/pledgestore">
                            @csrf
                            <Propertyselect></Propertyselect>

                            <div class="form-group row">
                                <label for="bank_name" class="col-md-4 col-form-label text-md-right">Наименование
                                    банка</label>
                                <div class="col-md-6">
                                    <input id="bank_name" type="text" class="form-control" name="bank_name" id="bank_name"
                                           value="{{ old('bank_name') }}" required>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="contract" class="col-md-4 col-form-label text-md-right">Номер договора</label>
                                <div class="col-md-6">
                                    <input id="contract" type="text" class="form-control" name="contract" id="contract"
                                           value="{{ old('contract') }}" required>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="date-input-start" class="col-md-4 col-form-label text-md-right">Начало залога</label>
                                <div class="col-md-6">
                                    <input class="form-control"name="start_period" type="date" value="" id="date-input-start">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="date-input-end" class="col-md-4 col-form-label text-md-right">Окончание залога</label>
                                <div class="col-md-6">
                                    <input class="form-control" name="end_period" type="date" value="" id="date-input-end">
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
                                        Сохранить
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
