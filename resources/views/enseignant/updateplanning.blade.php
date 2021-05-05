@extends('enseignant.index')
@section('title', 'My Information')
<link href="{{ asset('css/style.css') }}" rel="stylesheet">
@section('content')

    <div id="wrapper">
        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <ol class="breadcrumb">
                        <li class="active"><i class="fa fa-dashboard"></i> Create Planning</li>
                    </ol>
                </div>
            </div><!-- /.row -->

            <div class="row">
                <div class="col-lg-9">
                    <form action="{{ route('updatePlaningEnseignant', ['id' => $planning->id]) }}" method="post">
                        @csrf

                        <div class="form-group row">
                            <label for="inputformation" class="col-sm-2 col-form-label">Cours*</label>
                            <div class="col-sm-10">
                                <select name="cours_id" class="form-control">
                                    @foreach($cours as $cour)
                                        <option value="{{ $cour->id }}">{{ $cour->intitule }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="inputcour" class="col-sm-2 col-form-label">Date Debut*</label>
                            <div class="col-sm-10">
                                <input type="datetime-local" class="form-control" value="{{ $planning->date_debut }}" name="date_debut">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="inputcour" class="col-sm-2 col-form-label">Date Fin*</label>
                            <div class="col-sm-10">
                                <input type="datetime-local" class="form-control" value="{{ $planning->date_fin }}" name="date_fin">
                            </div>
                        </div>

                        <a class="btn btn-primary" href="{{ URL::previous() }}">Back</a>
                        <button type="submit" class="btn btn-warning">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection
