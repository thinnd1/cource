@extends('layout.index')
@section('title', 'List User')
<link href="{{ asset('css/style.css') }}" rel="stylesheet">
@section('content')

    <div id="wrapper">
        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <ol class="breadcrumb">
                        <li class="active"><i class="fa fa-dashboard"></i>Liste Formation</li>
                    </ol>
                </div>
            </div><!-- /.row -->

            <div class="row">
                <div class="col-lg-12">
                    <div class="row">
                        <div class="coL-lg-6 h2">
                            Liste Formation
                        </div>
                    </div>

                    <div class="table-responsive">
                        <div class="row">
                            <form action="">
                                <div class="col-lg-6">
                                    <input type="text" name="search_formation" class="form-control"
                                           placeholder="Search ..."
                                           value="{{ request()->input('search_formation', old('search_formation')) }}"
                                           id="inputformation">
                                </div>
                                <div class="col-lg-6">
                                    <button type="submit" class="btn btn-primary">Chercher</button>
                                    <a href="{{ route('getCreateFormation') }}" class="btn btn-primary">Ajouter Formation</a>
                                </div>
                            </form>
                        </div>

                        <h3>Total Formation: {{ count($formations) }} </h3>
                        <table class="table table-bordered table-hover tablesorter">
                            <thead>
                            <tr>
                                <th>No</th>
                                <th>Intitule</th>
                                <th>Create date</th>
                                <th width="10%">Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @if(count($formations) == 0)
                                <tr class="borderless">
                                    <td colspan="11" class="text-center">No Data</td>
                                </tr>
                            @else
                                @foreach ($formations as $index => $formation)
                                    <tr>
                                        <td>{{ $index + 1 }}</td>
                                        <td>
                                            {{ $formation->intitule }}
                                        </td>
                                        <td>
                                            <div class="divide-column">
                                                {{ \Carbon\Carbon::parse($formation->created_at)->format('d-m-Y') }}
                                            </div>
                                        </td>
                                        <div class="divide-column">
                                            <td>
                                                <a class="btn btn-warning"
                                                   href="{{ route('getUpdateFormation', ['id' => $formation->id ]) }}">Modifier</a>

                                                <a href="{{ route('deleteFormation', ['id' => $formation->id ]) }}"
                                                   class="btn btn-danger">Delete</a>
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
