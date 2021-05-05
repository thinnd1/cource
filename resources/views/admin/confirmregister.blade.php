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
                                    <th>Login</th>
                                    <th>Nom</th>
                                    <th>Prenom</th>
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
                                                    {{ $user->prenom }}
                                                </div>
                                            </td>
                                            <td>
                                                <div class="divide-column">
                                                    {{ $user->nom }}
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
