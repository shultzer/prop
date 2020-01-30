@extends('layouts.app')

@section('content')
    <div class="container">
        <form class="form-control" action="/search">
            <input name="inventory_number" placeholder="Инвентарный номер по ЕГРНИ"/>
            <button>Поиск</button>
        </form>
    </div>
@endsection
