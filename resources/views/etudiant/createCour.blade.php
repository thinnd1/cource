@extends('etudiant.index')
@section('title', 'Formation')
<link href="{{ asset('css/style.css') }}" rel="stylesheet">
@section('content')

    <div id="wrapper">
        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <ol class="breadcrumb">
                        <li class="active"><i class="fa fa-dashboard"></i> Liste Formation</li>
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
                        <div class="table-responsive">
                            <table class="table table-bordered table-hover tablesorter">
                                <thead>
                                <tr>
                                    <th width="5%">No</th>
                                    <th>Intitule</th>
                                    <th>Inscrire</th>
                                    <th width="20%">Create date</th>
                                </tr>
                                </thead>
                                <tbody>
                                @if(count($cours) == 0)
                                    <tr class="borderless">
                                        <td colspan="11" class="text-center">No Data</td>
                                    </tr>
                                @else
                                    @foreach ($cours as $index => $cour)
                                        <tr>
                                            <td>{{ $index + 1 }}</td>
                                            <td>
                                                {{ $cour->intitule }}
                                            </td>
                                            <td>
                                                <a href="{{ route('createCourceEtudiant', ['id' => $cour->id]) }}">Inscrire</a>
                                            </td>
                                            <td>
                                                <div class="divide-column">
                                                    {{ \Carbon\Carbon::parse($cour->created_at)->format('d-m-Y') }}
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
