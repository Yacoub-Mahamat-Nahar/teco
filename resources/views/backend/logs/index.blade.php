@extends('layouts.master')
@section('title')
Historiques de navigation
@stop



@section('content')




    <h1>Historiques de navigation </h1>
    <hr>

    <div class="row">
        <div class="col-lg-12 col-md-12 col-xs-12">
            <div class="dashboard-list-box">
                <h4 class="gray">Liste des catégories </h4>
                <div class="table-box">
                <table class="basic-table booking-table">
                    <thead>
                        <tr>
                            <th>Action</th>
                            <th>Address IP</th>
                            <th>Entité</th>
                            <th>Utilisateurs</th>
                        </tr>
                    </thead>
                    <tbody>

                        @foreach($logs as $item)
                        <tr>
                            <td>{{ $item->action }}</td>
                            <td>{{ $item->adresseIp }}</td>
                            <td>{{ $item->table }}</td>
                            <td>{{ $item->user }}</td>

                        </tr>
                    @endforeach

                    </tbody>
                </table>
                </div>
            </div>

        </div>
    </div>


@endsection


