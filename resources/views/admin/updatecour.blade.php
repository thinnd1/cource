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
                            <label for="inputusername" class="col-sm-2 col-form-label">Intitule*</label>
                            <div class="col-sm-10">
                                <input type="text" name="intitule" class="form-control" value="{{ $cources->intitule }}"
                                       id="title">
                                @error('intitule')
                                <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="inputformation" class="col-sm-2 col-form-label">Enseignant*</label>
                            <div class="col-sm-10">
                                <select name="user_id" class="form-control">
                                    @foreach($teacher as $teach)
                                        <option value="{{ $teach->id }}">{{ $teach->nom . ' ' . $teach->prenom }}</option>
                                    @endforeach
                                </select>
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

                        <a class="btn btn-primary" href="{{ URL::previous() }}">Back</a>
                        <button type="submit" class="btn btn-warning">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection
