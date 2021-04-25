@extends('enseignant.index')
@section('title', 'Update User')
@section('content')

    <div id="wrapper">
        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <ol class="breadcrumb">
                        <li class="active"><i class="fa fa-dashboard"></i>Update User</li>
                    </ol>
                </div>
            </div><!-- /.row -->

            <div class="row">
                <div class="col-lg-9">
                    <form action="{{ route('updateUserLecture', ['id' => $editinfor->id]) }}" method="post">
                        @csrf

                        <div class="form-group row">
                            <label for="inputusername" class="col-sm-2 col-form-label">User name*</label>
                            <div class="col-sm-10">
                                <input type="text" name="username" class="form-control" value="{{ $editinfor->username }}"
                                       id="inputusername">
                                @error('username')
                                <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="inputpass" class="col-sm-2 col-form-label">Password*</label>
                            <div class="col-sm-10">
                                <input type="text" name="password" class="form-control" value="{{ $editinfor->password }}"
                                       id="inputpass">
                                @error('password')
                                <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="inputusername" class="col-sm-2 col-form-label">Nom*</label>
                            <div class="col-sm-10">
                                <input type="text" name="first_name" class="form-control"
                                       value="{{ $editinfor->first_name }}"
                                       id="inputfirstname">
                                @error('first_name')
                                <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="inputusername" class="col-sm-2 col-form-label">Prenom*</label>
                            <div class="col-sm-10">
                                <input type="text" name="last_name" class="form-control" value="{{ $editinfor->last_name }}"
                                       id="inputlastname">
                                @error('last_name')
                                <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="inputemail" class="col-sm-2 col-form-label">Email*</label>
                            <div class="col-sm-10">
                                <input type="text" name="email" class="form-control" value="{{ $editinfor->email }}"
                                       id="inputemail">
                                @error('email')
                                <p class="text-danger">{{ $message }}</p>
                                @enderror
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
