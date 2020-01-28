@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <table class="table">
                    <thead>
                    <tr>
                        <td>Банк</td>
                        <td>Договор</td>
                        <td>Дата начала</td>
                        <td>Дата окончания залога</td>
                        <td>Недвижимое имущество</td>
                        <td>Адрес</td>
                        <td>Номер капитального строения</td>
                        <td>Балансодерджатель</td>
                        <td>Движимое имущество</td>

                    </tr>
                    </thead>
                    <tbody>
                    @foreach($pledgeholders as $pledgeholder)
                        @foreach($pledgeholder->realestateassets as $asset)
                        <tr>
                            <td rowspan="{{$pledgeholder->realestateassets()->count()}}">{{$pledgeholder->bank_name}}</td>
                            <td rowspan="{{$pledgeholder->realestateassets()->count()}}">{{$pledgeholder->contract}}</td>
                            <td rowspan="{{$pledgeholder->realestateassets()->count()}}">{{$pledgeholder->start_period}}</td>
                            <td rowspan="{{$pledgeholder->realestateassets()->count()}}">{{$pledgeholder->end_period}}</td>

                               <tr>

                                <td>{{ $asset->name }}</td>
                                <td>{{ $asset->address }}</td>
                                <td>{{ $asset->inventory_number }}</td>
                                <td>{{ $asset->company->name }}</td>
                                <td>
                                    @if ($asset->movableassets)
                                        @foreach($asset->movableassets as $movableasset)
                                            {{ $movableasset->name }}, №{{$movableasset->inventory_number}}
                                        @endforeach
                                    @endif
                                </td>
                               </tr>
                            @endforeach
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
