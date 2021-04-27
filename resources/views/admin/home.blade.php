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
                                    <button type="submit" class="btn btn-primary">Search</button>
                                    <a href="{{ route('getCreateUser') }}" class="btn btn-primary">Add User</a>

                                </div>
                            </form>
                        </div>

                        <h3>Total User: {{ count($users) }} </h3>
                        <table class="table table-bordered table-hover tablesorter">
                            <thead>
                            <tr>
                                <th>No</th>
                                <th>Username</th>
                                <th>Nom</th>
                                <th>Prenom</th>
                                <th>Email</th>
                                <th>Role</th>
                                <th>Created date</th>
                                <th width="10%"></th>
                            </tr>
                            </thead>
                            <tbody>
                            @if(count($users) == 0)
                                <tr class="borderless">
                                    <td colspan="11" class="text-center">Not Data</td>
                                </tr>
                            @else
                                @foreach ($users as $index => $user)
                                    <tr>
                                        <td>{{ $index }}</td>
                                        <td>
                                            <div class="divide-column">
                                                {{ $user->username }}
                                            </div>
                                        </td>
                                        <td>
                                            <div class="divide-column">
                                                {{ $user->first_name }}
                                            </div>
                                        </td>
                                        <td>
                                            <div class="divide-column">
                                                {{ $user->last_name }}
                                            </div>
                                        </td>
                                        <td>
                                            <div class="divide-column">
                                                {{ $user->email }}
                                            </div>
                                        </td>
                                        <td>
                                            <div class="divide-column">
                                                @if($user->user_type == 1)
                                                    Etudiant
                                                @elseif ($user->user_type == 2)
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
