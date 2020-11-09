@extends('layouts.master')
@section('title')
Articles
@stop



@section('content')
<h1>Articles <a href="{{ route('articles.create') }}" class="launch-modal btn btn-sm  btn-primary pull-right" >+ Ajouter </a></h1>
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
                        <th>Auteur</th>
                        <th>Categorie</th>
                        <th>Date de publication</th>
                        <th>Statut</th>
                        <th>Image</th>
                        <th>Date de création</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>

                    @foreach($articles as $item)
                    <tr>
                        <td><a href="{{ url('articles', $item->id) }}">{{ $item->titre }}</a></td>
                        <td>{{ $item->author->first_name }} &nbsp; {{ $item->author->last_name }}</td>
                        <td>{{ $item->category->nom }}</td>
                        <td>
                            @if ($item->date_publication)
                                {{ $item->date_publication }}
                            @else
                                --/--/----
                            @endif
                        </td>
                        <td>
                            @if ($item->brouillon)
                                <button class="btn btn-success">
                                    Publié
                                </button>
                            @else
                            <button class="btn btn-default">
                                Non publié
                            </button>
                            @endif
                        </td>
                        <td>
                            <div class="avatar-preview">
                                <img src="storage/articles/{{ $item->image }}" alt="" srcset="">
                            </div>
                        </td>

                        <td>
                            {{ $item->created_at }}
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

@section('scripts')
<script type="text/javascript">
    $(document).ready(function(){
        $('#tblarticles').DataTable({
            columnDefs: [{
                targets: [0],
                visible: false,
                searchable: false
                },
            ],
            order: [[0, "asc"]],
        });
    });
</script>
@endsection
