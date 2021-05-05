@extends('enseignant.index')
@section('title', 'My Information')
<link href="{{ asset('css/style.css') }}" rel="stylesheet">
@section('content')

    <div id="wrapper">
        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <ol class="breadcrumb">
                        <li class="active"><i class="fa fa-dashboard"></i>List Planning</li>
                    </ol>
                </div>
            </div><!-- /.row -->

            <div class="row">
                <div class="col-lg-12">
                    <div class="row">
                        <div class="coL-lg-6 h2">
                            List Planning
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
                                    <a href="{{ route('getCreatePlanningEnseignant') }}" class="btn btn-primary">Ajouter Planning</a>
                                </div>
                            </form>
                        </div>

                        <h3>Total Planning: {{ count($planning) }} </h3>
                        <table class="table table-bordered table-hover tablesorter">
                            <thead>
                            <tr>
                                <th>No</th>
                                <th>Cour</th>
                                <th>Date Debut</th>
                                <th>Date Fin</th>
                                <th width="10%"></th>
                            </tr>
                            </thead>
                            <tbody>
                            @if(count($planning) == 0)
                                <tr class="borderless">
                                    <td colspan="11" class="text-center">No Data</td>
                                </tr>
                            @else
                                @foreach ($planning as $index => $plan)
                                    <tr>
                                        <td>{{ $index + 1 }}</td>
                                        <td>
                                            {{ isset($plan->cours->intitule) ? $plan->cours->intitule : null }}
                                        </td>
                                        <td>
                                            {{ \Carbon\Carbon::parse($plan->date_debut)->format('d-m-Y h:i:s') }}
                                        </td>
                                        <td>
                                            {{ \Carbon\Carbon::parse($plan->date_fin)->format('d-m-Y h:i:s') }}
                                        </td>

                                        <div class="divide-column">
                                            <td>
                                                <a class="btn btn-warning"
                                                   href="{{ route('getUpdatePlanningEnseignant', ['id' => $plan->id ]) }}">Modifier</a>

                                                <a href="{{ route('deletePlaningEnseignant', ['id' => $plan->id ]) }}" class="btn btn-danger">Delete</a>
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
