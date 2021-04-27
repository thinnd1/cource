@extends('layout.index')
@section('title', 'Create Planning')
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
                    <form action="{{ route('createPlanning') }}" method="post">
                        @csrf

                        <div class="form-group row">
                            <label for="inputcour" class="col-sm-2 col-form-label">Cour*</label>
                            <div class="col-sm-10">
                                <input type="text" name="cours_id" class="form-control" value="{{ $planning->cours_id }}" id="cours_id">
                                @error('cours_id')
                                <p class="text-danger">{{ $message }}</p>
                                @enderror
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
