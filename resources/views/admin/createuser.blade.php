@extends('layout.index')
@section('title', 'Tạo người dùng')
@section('content')

    <div id="wrapper">
        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <ol class="breadcrumb">
                        <li class="active"><i class="fa fa-dashboard"></i> Create user</li>
                    </ol>
                </div>
            </div><!-- /.row -->

            <div class="row">
                <div class="col-lg-9">
                    <form action="{{ route('createUser') }}" method="post">
                        @csrf
                        <div class="form-group row">
                            <label for="inputusername" class="col-sm-2 col-form-label">Login*</label>
                            <div class="col-sm-10">
                                <input type="text" name="username" class="form-control" value="{{ old("username") }}"
                                       id="inputusername">
                                @error('username')
                                <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="inputusername" class="col-sm-2 col-form-label">Mot de pass*</label>
                            <div class="col-sm-10">
                                <input type="text" name="password" class="form-control" value="{{ old("password") }}"
                                       id="inputpassword">
                                @error('username')
                                <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="inputusername" class="col-sm-2 col-form-label">Nom*</label>
                            <div class="col-sm-10">
                                <input type="text" name="first_name" class="form-control"
                                       value="{{ old("first_name") }}"
                                       id="inputusername">
                                @error('first_name')
                                <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="inputusername" class="col-sm-2 col-form-label">Prenom*</label>
                            <div class="col-sm-10">
                                <input type="text" name="last_name" class="form-control" value="{{ old("last_name") }}"
                                       id="inputusername">
                                @error('last_name')
                                <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="inputformation" class="col-sm-2 col-form-label">Formation*</label>
                            <div class="col-sm-10">
                                <select name="formation_id" class="form-control">
                                    @foreach($formation as $format)
                                        <option value="{{ $format->id }}">{{ $format->intitule }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Role</label>
                            <div class="col-sm-10">
                                <select name="user_type" class="form-control">
                                    <option value="etudiant" {{ old("user_type") == 1 ? 'selected' : '' }}>Etudiant</option>
                                    <option value="enseignant" {{ old("user_type") == 2 ? 'selected' : '' }}>Enseignant</option>
                                    <option value="admin" {{ old("user_type") == 3 ? 'selected' : '' }}>Admin</option>
                                </select>
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
