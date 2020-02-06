@extends('layouts.app')

@section('content')
    <div class="container">
        <form action="/search" method="POST">
            <div class="form-group row">
                @csrf
                <div class="col-4">
                    <input class="form-control" id="invnumber" name="inventory_number" value="{{old('inventory_number')}}" placeholder="Инвентарный номер по ЕГРНИ"/>
                </div>
                <div class="col-8">
                    <button class="btn btn-info">Поиск</button>
                </div>
            </div>
        </form>
        <div class="row justify-content-center">
            <div class="col-md-8">
                <table class="table">
                    <thead>
                    <tr>
                        <td>Недвижимое имущество</td>
                        <td>Адрес</td>
                        <td>Номер капитального строения</td>
                        <td>Балансодерджатель</td>
                        <td>Банк</td>
                        <td>Договор</td>
                        <td>Дата начала</td>
                        <td>Дата окончания залога</td>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($assets_under_pledge as $asset)
                            <tr>
                                <td>{{ $asset->name }}</td>
                                <td>{{ $asset->address }}</td>
                                <td>{{ $asset->inventory_number }}</td>
                                <td>{{ $asset->company->name }}</td>
                                <td>{{ $asset->pledgeholder->bank_name }}</td>
                                <td>{{ $asset->pledgeholder->contract }}</td>
                                <td>{{ $asset->pledgeholder->start_period }}</td>
                                <td>{{ $asset->pledgeholder->end_period }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
