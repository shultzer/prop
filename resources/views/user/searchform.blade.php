@extends('layouts.app')

@section('content')
    <div class="container">
        <form action="/search" method="POST">
            <div class="form-group row">
                @csrf
                <div class="col-4">
                    <input class="form-control" name="inventory_number" placeholder="Инвентарный номер по ЕГРНИ"/>
                </div>
                <div class="col-8">
                    <button>Поиск</button>
                </div>
            </div>
        </form>
    </div>
@endsection
