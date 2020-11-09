@extends('layouts.master')
@section('title')
Tableau de bord
@stop
@section('content')


                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif



                    <div class="">
                        <div class="row">

                            <!-- Item -->
                            <div class="col-lg-4 col-md-6 col-xs-6">
                                <div class="dashboard-stat color-1">
                                    <div class="dashboard-stat-content"><h4>{{ $livres }}</h4> <span>Livres</span></div>
                                    <div class="dashboard-stat-icon"><i class="im-icon-Book"></i></div>
                                    <div class="dashboard-stat-item"><p></p></div>
                                </div>
                            </div>

                            <!-- Item -->
                            <div class="col-lg-4 col-md-6 col-xs-6">
                                <div class="dashboard-stat color-2">
                                    <div class="dashboard-stat-content"><h4>{{ $articles }}</h4> <span>Articles</span></div>
                                    <div class="dashboard-stat-icon"><i class="im im-icon-Globe"></i></div>
                                    <div class="dashboard-stat-item"><p></p></div>
                                </div>
                            </div>


                            <!-- Item -->
                            <div class="col-lg-4 col-md-6 col-xs-6">
                                <div class="dashboard-stat color-3">
                                    <div class="dashboard-stat-content"><h4>{{ $jouers }}</h4> <span>Nombre des joueurs</span></div>
                                    <div class="dashboard-stat-icon"><i class="im-icon-Mens"></i></div>
                                    <div class="dashboard-stat-item"><p></p></div>
                                </div>
                            </div>


                        </div>
                        <div class="row">
                            <div class="col-lg-12 col-md-12 col-xs-12 traffic">
                                <div class="dashboard-list-box">
                                    <h4 class="gray">Joueurs récents</h4>
                                    <div class="table-box">
                                        <table class="basic-table">
                                            <thead>
                                                <tr>
                                                    <th>Nom</th>
                                                    <th>Prenom</th>
                                                    <th>PSeudo</th>
                                                    <th>Email</th>
                                                    <th>Date d'inscription</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                               @foreach ($jouers_ad as $item)
                                               <tr>
                                                <td>{{ $item->first_name }}</td>
                                                <td>{{ $item->last_name }}</td>
                                                <td>{{ $item->username }}</td>
                                                <td>{{ $item->email }}</td>
                                                <td>{!! human_date($item->created_at) !!}</td>
                                            </tr>
                                               @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>


@endsection
