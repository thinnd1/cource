@extends('layout.index')
@section('title', 'Update formation')
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
                    <form action="{{ route('updateFormation', ['id' => $editinfor->id]) }}" method="post">
                        @csrf

                        <div class="form-group row">
                            <label for="inputusername" class="col-sm-2 col-form-label">Intitule*</label>
                            <div class="col-sm-10">
                                <input type="text" name="intitule" class="form-control" value="{{ $editinfor->intitule }}"
                                       id="intitule">
                                @error('username')
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
