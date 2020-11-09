@extends('layouts.master')
@section('title')
New Letters
@stop



@section('content')




    <h1>New Letters</h1>
    <hr>

    <div class="row">
        <div class="col-lg-12 col-md-12 col-xs-12">
            <div class="dashboard-list-box">
                <h4 class="gray">Liste des adhérants au new letters </h4>
                <div class="table-box">
                <table class="basic-table booking-table">
                    <thead>
                        <tr>
                            <th>Email</th>
                            <th>Date de souscription</th>
                        </tr>
                    </thead>
                    <tbody>

                        @foreach($newletters as $item)
                        <tr>
                            <td><a href="{{ url('newletters', $item->id) }}">{{ $item->email }}</a></td>
                            <td>{{ $item->created_at }}</td>
                        </tr>
                    @endforeach

                    </tbody>
                </table>
                </div>
            </div>

        </div>
    </div>


@endsection


