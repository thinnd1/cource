@extends('layout.index')
@section('title', 'Confirm user')
@section('content')

    <div id="wrapper">
        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <ol class="breadcrumb">
                        <li class="active"><i class="fa fa-dashboard"></i> Confirm User</li>
                    </ol>
                </div>
            </div><!-- /.row -->

            <div class="row">
                <div class="col-lg-12">
                    <div class="row">
                        <div class="coL-lg-6 h2">
                            List user confirm
                        </div>

                        <div class="table-responsive">
                            <h3>Total Account: {{ count($users) }} </h3>
                            <table class="table table-bordered table-hover tablesorter">
                                <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Username</th>
                                    <th>Nom</th>
                                    <th>Prenom</th>
                                    <th>Email</th>
                                    <th width="10%">Action</th>
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
                                                    <a href="{{ route('acceptRegiter', ['id' => $user->id ]) }}" class="btn btn-warning" name="active_flg" >
                                                        Confirm
                                                    </a>
                                                </div>
                                            </td>
                                        <tr>
                                    @endforeach
                                @endif
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
