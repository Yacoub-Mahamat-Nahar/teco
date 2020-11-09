@extends('layouts.master')
@section('title')
Categorie
@stop



@section('content')




    <h1>Catégories des articles <a href="{{ route('categorie-article.create') }}" class="launch-modal btn btn-sm  btn-primary pull-right" >+ Ajouter </a></h1>
    <hr>

    <div class="row">
        <div class="col-lg-12 col-md-12 col-xs-12">
            <div class="dashboard-list-box">
                <h4 class="gray">Liste des catégories </h4>
                <div class="table-box">
                <table class="basic-table booking-table">
                    <thead>
                        <tr>
                            <th>Nom</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>

                        @foreach($categorie as $item)
                        <tr>
                            <td><a href="{{ url('categories', $item->id) }}">{{ $item->nom }}</a></td>
                            <td >
                                <a href="{{ url('categories/' . $item->id . '/edit') }}" class="btn btn-sm btn-primary">
                                    <i class="sl sl-icon-pencil"></i>
                                </a>


                                <a href="{{ url('categories/' . $item->id . '/show') }}" class="btn btn-sm btn-default">
                                    <i class="sl sl-icon-eye"></i>
                                </a>

                                <a href="{{ url('categories/' . $item->id . '/show') }}" class="btn btn-sm btn-danger">
                                    <i class="sl sl-icon-close"></i>
                                </a>



                            </td>
                        </tr>
                    @endforeach

                    </tbody>
                </table>
                </div>
            </div>

        </div>
    </div>


@endsection


