@extends('layout.index')
@section('title', 'List Cour')
<link href="{{ asset('css/style.css') }}" rel="stylesheet">
@section('content')

    <div id="wrapper">
        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <ol class="breadcrumb">
                        <li class="active"><i class="fa fa-dashboard"></i> List Cour</li>
                    </ol>
                </div>
            </div><!-- /.row -->

            <div class="row">
                <div class="col-lg-12">
                    <div class="row">
                        <div class="coL-lg-6 h2">
                            List Cour
                        </div>
                    </div>

                    <div class="table-responsive">
                        <div class="row">
                            <form action="">
                                <div class="col-lg-6">
                                    <input type="text" name="search_account" class="form-control"
                                           placeholder="Search ..."
                                           value="{{ request()->input('search_account', old('search_account')) }}"
                                           id="inputname">
                                </div>
                                <div class="col-lg-6">
                                    <button type="submit" class="btn btn-primary">Search</button>
                                    <a href="{{ route('getCreateCource') }}" class="btn btn-primary">Add Cour</a>
                                </div>
                            </form>
                        </div>

                        <h3> List Cour: {{ count($cources) }} </h3>
                        <table class="table table-bordered table-hover tablesorter">
                            <thead>
                            <tr>
                                <th>No</th>
                                <th>Title</th>
                                <th>Code cour</th>
                                <th>Address</th>
                                <th>Created date</th>
                                <th width="10%">Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @if(count($cources) == 0)
                                <tr class="borderless">
                                    <td colspan="11" class="text-center">Không có dữ liệu</td>
                                </tr>
                            @else
                                @foreach ($cources as $index => $cource)
                                    <tr>
                                        <td>{{ $index + 1 }}</td>
                                        <td>
                                            <div class="divide-column">
                                                {{ $cource->title }}
                                            </div>
                                        </td>
                                        <td>
                                            <div class="divide-column">
                                                {{ $cource->code_cour }}
                                            </div>
                                        </td>

                                        <td>
                                            <div class="divide-column">
                                                {{ $cource->address }}
                                            </div>
                                        </td>

                                        <td>
                                            <div class="divide-column">
                                                {{ \Carbon\Carbon::parse($cource->created_at)->format('d-m-Y') }}
                                            </div>
                                        </td>

                                        <div class="divide-column">
                                            <td>
                                                <a class="btn btn-warning" href="{{ route('getUpdateCource', ['id' => $cource->id ]) }}">Edit</a>
                                                <a href="{{ route('deleteCource', ['id' => $cource->id ]) }}" class="btn btn-danger"> Delete </a>
                                            </td>
                                        </div>
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
