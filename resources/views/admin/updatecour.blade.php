@extends('layout.index')
@section('title', 'Update Course')
@section('content')

    <div id="wrapper">
        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <ol class="breadcrumb">
                        <li class="active"><i class="fa fa-dashboard"></i> Update Course</li>
                    </ol>
                </div>
            </div><!-- /.row -->

            <div class="row">
                <div class="col-lg-9">
                    <form action="{{ route('updateCource', ['id' => $cources->id]) }}" method="post">
                        @csrf

                        <div class="form-group row">
                            <label for="inputusername" class="col-sm-2 col-form-label">Title*</label>
                            <div class="col-sm-10">
                                <input type="text" name="title" class="form-control" value="{{ $cources->title }}"
                                       id="title">
                                @error('title')
                                <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="inputusername" class="col-sm-2 col-form-label">Code Cour*</label>
                            <div class="col-sm-10">
                                <input type="text" name="code_cour" class="form-control"
                                       value="{{ $cources->code_cour }}">
                                @error('code_cour')
                                <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="inputaddress" class="col-sm-2 col-form-label">Address</label>
                            <div class="col-sm-10">
                                <input type="text" name="address" class="form-control" value="{{ $cources->address }}">
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
