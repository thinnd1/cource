@extends('etudiant.index')
@section('title', 'Formation')
<link href="{{ asset('css/style.css') }}" rel="stylesheet">
@section('content')

    <div id="wrapper">
        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <ol class="breadcrumb">
                        <li class="active"><i class="fa fa-dashboard"></i>List Formation</li>
                    </ol>
                </div>
            </div><!-- /.row -->

            <div class="row">
                <div class="col-lg-12">
                    <div class="row">
                        <div class="coL-lg-6 h2">
                            List Formation
                        </div>
                    </div>

                    <div class="table-responsive">

                        <h3>Total Formation: {{ count($formations) }} </h3>
                        <table class="table table-bordered table-hover tablesorter">
                            <thead>
                            <tr>
                                <th width="5%">No</th>
                                <th>Intitule</th>
                                <th width="20%">Created date</th>
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
