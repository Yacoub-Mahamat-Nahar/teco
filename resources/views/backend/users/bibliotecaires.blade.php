@extends('layouts.master')
@section('title')
Joueurs
@stop



@section('content')
<h1>Joueurs </h1>
<hr>
<div class="row">
    <div class="col-lg-12 col-md-12 col-xs-12">
        <div class="dashboard-list-box">
            <h4 class="gray">Liste des Joueurs </h4>
            <div class="table-box table-responsive">
            <table class="basic-table booking-table ">
                <thead>
                    <tr>
                        <th>Nom</th>
                        <th>Prénom</th>
                        <th>Nom d'utilisateur</th>
                        <th>Date d'inscription'</th>
                        <th>email</th>
                        <th>Image</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>

                    @foreach($user as $item)
                    <tr>
                        <td><a href="{{ url('users', $item->id) }}">{{ $item->first_name }}</a></td>
                        <td>{{ $item->last_name }}</td>
                        <td>{{ $item->username }}</td>

                        <td>
                            {!! human_date($item->created_at) !!}
                        </td>

                        <td>
                            {{ $item->email }}
                        </td>

                        <td>
                            <div class="avatar-preview">
                                <img src="storage/users/{{ $item->image }}" alt="" srcset="">
                            </div>
                        </td>


                        <td >
                            <a href="{{ url('users/' . $item->id . '/edit') }}" class="btn btn-sm btn-primary">
                                <i class="sl sl-icon-pencil"></i>
                            </a>


                            <a href="{{ url('users/' . $item->id . '/show') }}" class="btn btn-sm btn-default">
                                <i class="sl sl-icon-eye"></i>
                            </a>

                            <a href="{{ url('users/' . $item->id . '/show') }}" class="btn btn-sm btn-danger">
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
        $('#tblusers').DataTable({
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
