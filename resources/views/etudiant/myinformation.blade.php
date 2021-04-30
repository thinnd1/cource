@extends('etudiant.index')
@section('title', 'My Information')
@section('content')
    <div id="wrapper">
        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <ol class="breadcrumb">
                        <li class="active"><i class="fa fa-dashboard"></i>My Information</li>
                    </ol>
                </div>
            </div><!-- /.row -->

            @if (session('key'))
                <div class="alert alert-success" role="alert">
                    {{ session('key') }}
                </div>
            @endif

            <div class="row">
                <div class="col-lg-12">
                    <div class="form-group row">
                        <label for="inputUser" class="col-sm-2 col-form-label">Username</label>
                        <div class="col-sm-10">
                            {{ $information->login }}
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="inputUser" class="col-sm-2 col-form-label">Nom</label>
                        <div class="col-sm-10">
                            {{ $information->nom }}
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Prenom</label>
                        <div class="col-sm-10">
                            {{ $information->prenom }}
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="inputUser" class="col-sm-2 col-form-label">Created date</label>
                        <div class="col-sm-10">
                            {{ $information->created_at }}
                        </div>
                    </div>

                    <a class="btn btn-warning" href="{{ route('getUpdateInformationStudent') }}">Edit</a>
                </div>
            </div>
        </div>
    </div>
@endsection
