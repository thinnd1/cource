@extends('layout.index')
@section('title', 'List Cour')
<link href="{{ asset('css/style.css') }}" rel="stylesheet">
@section('content')

    <div id="wrapper">
        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <ol class="breadcrumb">
                        <li class="active"><i class="fa fa-dashboard"></i> List Cour</li>
                    </ol>
                </div>
            </div><!-- /.row -->

            <div class="row">
                <div class="col-lg-12">
                    <div class="row">
                        <div class="coL-lg-6 h2">
                            List Cour
                        </div>
                    </div>

                    <div class="table-responsive">
                        <div class="row">
                            <form action="">
                                <div class="col-lg-6">
                                    <input type="text" name="search_cour" class="form-control"
                                           placeholder="Search ..."
                                           value="{{ request()->input('search_cour', old('search_cour')) }}"
                                           id="inputname">
                                </div>
                                <div class="col-lg-6">
                                    <button type="submit" class="btn btn-primary">Chercher</button>
                                    <a href="{{ route('getCreateCource') }}" class="btn btn-primary">Ajouter Cour</a>
                                </div>
                            </form>
                        </div>

                        <h3> List Cour: {{ count($cources) }} </h3>
                        <table class="table table-bordered table-hover tablesorter">
                            <thead>
                            <tr>
                                <th>No</th>
                                <th>Intitule</th>
                                <th>Enseignant</th>
                                <th>Formation</th>
                                <th>Create date</th>
                                <th width="10%">Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @if(count($cources) == 0)
                                <tr class="borderless">
                                    <td colspan="11" class="text-center">No Data</td>
                                </tr>
                            @else
                                @foreach ($cources as $index => $cource)
                                    <tr>
                                        <td>{{ $index + 1 }}</td>
                                        <td>
                                            <div class="divide-column">
                                                {{ $cource->intitule }}
                                            </div>
                                        </td>
                                        <td>
                                            <div class="divide-column">
                                                {{ $cource->user_id }}
                                            </div>
                                        </td>

                                        <td>
                                            <div class="divide-column">
                                                {{ $cource->formation->intitule }}
                                            </div>
                                        </td>

                                        <td>
                                            <div class="divide-column">
                                                {{ \Carbon\Carbon::parse($cource->created_at)->format('d-m-Y') }}
                                            </div>
                                        </td>

                                        <div class="divide-column">
                                            <td>
                                                <a class="btn btn-warning" href="{{ route('getUpdateCource', ['id' => $cource->id ]) }}">Modifier</a>
                                                <a href="{{ route('deleteCource', ['id' => $cource->id ]) }}" class="btn btn-danger"> Delete </a>
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
