@extends('layout.index')
@section('title', 'List User')
<link href="{{ asset('css/style.css') }}" rel="stylesheet">
@section('content')

    <div id="wrapper">
        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <ol class="breadcrumb">
                        <li class="active"><i class="fa fa-dashboard"></i>List User</li>
                    </ol>
                </div>
            </div><!-- /.row -->

            <div class="row">
                <div class="col-lg-12">
                    <div class="row">
                        <div class="coL-lg-6 h2">
                            List User
                        </div>
                    </div>

                    <div class="table-responsive">
                        <div class="row">
                            <form action="">
                                <div class="col-lg-6">
                                    <input type="text" name="search_account" class="form-control" placeholder="Search ..."
                                           value="{{ request()->input('search_account', old('search_account')) }}"
                                           id="inputname">
                                </div>
                                <div class="col-lg-6">
                                    <button type="submit" class="btn btn-primary">Chercher</button>
                                    <a href="{{ route('getCreateUser') }}" class="btn btn-primary">Ajouter User</a>

                                </div>
                            </form>
                        </div>

                        <h3>Total User: {{ count($users) }} </h3>
                        <table class="table table-bordered table-hover tablesorter">
                            <thead>
                            <tr>
                                <th>No</th>
                                <th>Login</th>
                                <th>Nom</th>
                                <th>Prenom</th>
                                <th>Formation</th>
                                <th>Role</th>
                                <th>Created date</th>
                                <th width="10%"></th>
                            </tr>
                            </thead>
                            <tbody>
                            @if(count($users) == 0)
                                <tr class="borderless">
                                    <td colspan="11" class="text-center">No Data</td>
                                </tr>
                            @else
                                @foreach ($users as $index => $user)
                                    <tr>
                                        <td>{{ $index + 1 }}</td>
                                        <td>
                                            <div class="divide-column">
                                                {{ $user->login }}
                                            </div>
                                        </td>
                                        <td>
                                            <div class="divide-column">
                                                {{ $user->nom }}
                                            </div>
                                        </td>
                                        <td>
                                            <div class="divide-column">
                                                {{ $user->prenom }}
                                            </div>
                                        </td>
                                        <td>
                                            <div class="divide-column">
                                                {{ isset($user->formation->intitule) ? $user->formation->intitule : '' }}
                                            </div>
                                        </td>
                                        <td>
                                            <div class="divide-column">
                                                @if($user->type == 1)
                                                    Etudiant
                                                @elseif ($user->type == 2)
                                                    Enseignant
                                                @else
                                                    Admin
                                                @endif
                                            </div>
                                        </td>

                                        <td>
                                            <div class="divide-column">
                                                {{ \Carbon\Carbon::parse($user->created_at)->format('d-m-Y') }}
                                            </div>
                                        </td>
                                        <div class="divide-column">
                                            <td>
                                                <a class="btn btn-warning" href="{{ route('getUpdateUser', ['id' => $user->id ]) }}">Edit</a>

                                                <a href="{{ route('deleteUser', ['id' => $user->id ]) }}" class="btn btn-danger">Delete</a>
                                            </td>
                                        </div>
                                    </tr>
                                @endforeach
                            @endif
                            </tbody>
                        </table>
                    </div>
                </div>
            </div><!-- /.row -->
        </div>
    </div>
@endsection
@section('js')

@endsection
