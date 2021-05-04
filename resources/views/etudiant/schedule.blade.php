@extends('etudiant.index')
@section('title', 'Formation')
<link href="{{ asset('css/style.css') }}" rel="stylesheet">
@section('content')

    <div id="wrapper">
        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <ol class="breadcrumb">
                        <li class="active"><i class="fa fa-dashboard"></i> List schedules</li>
                    </ol>
                </div>
            </div><!-- /.row -->

            <div class="row">
                <div class="col-lg-12">
                    <div class="row">
                        <div class="coL-lg-6 h2">
                            List schedules
                        </div>
                    </div>

                    <div class="table-responsive">
                        <div class="row">
                            <form action="">
                                <div class="col-lg-6">
                                    <select name="cours_id" class="form-control">
                                        @foreach($cours as $cour)
                                            <option value="{{ $cour->id }}">{{ $cour->intitule }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-lg-6">
                                    <button type="submit" class="btn btn-primary">Search</button>
                                </div>
                            </form>
                        </div>

                        <h3> List Cour: {{ count($schedules) }} </h3>
                        <table class="table table-bordered table-hover tablesorter">
                            <thead>
                            <tr>
                                <th>No</th>
                                <th>Intitule</th>
                                <th>Date debut</th>
                                <th>Date fin</th>
                            </tr>
                            </thead>
                            <tbody>
                            @if(count($schedules) == 0)
                                <tr class="borderless">
                                    <td colspan="11" class="text-center">Not Data</td>
                                </tr>
                            @else
                                @foreach ($schedules as $index => $schedule)
                                    <tr>
                                        <td>{{ $index + 1 }}</td>
                                        <td>
                                            <div class="divide-column">
                                                {{ $schedule->intitule }}
                                            </div>
                                        </td>

                                        <td>
                                            <div class="divide-column">
                                                {{ $schedule->date_debut }}
                                            </div>
                                        </td>

                                        <td>
                                            <div class="divide-column">
                                                {{ $schedule->date_fin }}
                                            </div>
                                        </td>

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
