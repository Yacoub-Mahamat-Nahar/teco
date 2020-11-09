@extends('layouts.master')
@section('title')
 Gallerie
@stop
@section('content')


<h1>Gallerie <a href="{{ url('gallerie-add') }}" class="launch-modal btn btn-sm  btn-primary pull-right" >+ Ajouter </a></h1>
<hr>

<div class="row">
    <div class="col-lg-12 col-md-12 col-xs-12">
        <div class="dashboard-list-box">
            <h4 class="gray">Liste des articles </h4>
            <div class="table-box table-responsive">
            <table class="basic-table booking-table ">
                <thead>
                    <tr>
                        <th>Titre</th>
                        <th>Image</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>

                    @foreach($articles as $item)
                    <tr>
                        <td><a href="{{ url('articles', $item->id) }}">{{ $item->titre }}</a></td>


                        <td>
                            <div class="avatar-preview">
                                <img src="storage/gallerie/{{ $item->image }}" alt="" srcset="">
                            </div>
                        </td>


                        <td >
                            <a href="{{ url('articles/' . $item->id . '/edit') }}" class="btn btn-sm btn-primary">
                                <i class="sl sl-icon-pencil"></i>
                            </a>


                            <a href="{{ url('articles/' . $item->id . '/show') }}" class="btn btn-sm btn-default">
                                <i class="sl sl-icon-eye"></i>
                            </a>

                            <a href="{{ url('articles/' . $item->id . '/show') }}" class="btn btn-sm btn-danger">
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
