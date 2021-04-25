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
                                           placeholder="Tìm theo tên, email, số điện thoại ..."
                                           value="{{ request()->input('search_account', old('search_account')) }}"
                                           id="inputname">
                                </div>
                                <div class="col-lg-6">
                                    <button type="submit" class="btn btn-primary">Tìm kiếm</button>
                                    <a href="{{ route('getCreateUser') }}" class="btn btn-primary">Add User</a>

                                </div>
                            </form>

                        </div>

                        <h3>Tổng số tài khoản: {{ count($users) }} </h3>
                        <table class="table table-bordered table-hover tablesorter">
                            <thead>
                            <tr>
                                <th>No</th>
                                <th>Username</th>
                                <th>Nom</th>
                                <th>Prenom</th>
                                <th>Email</th>
                                <th>Created date</th>
                                <th width="10%">Hành động</th>
                            </tr>
                            </thead>
                            <tbody>
                            @if(count($users) == 0)
                                <tr class="borderless">
                                    <td colspan="11" class="text-center">Không có dữ liệu</td>
                                </tr>
                            @else
                                @foreach ($users as $index => $user)
                                    <tr>
                                        <td>{{ $index }}</td>
                                        <td>
                                            <div class="divide-column">
                                                {{ $user->title }}
                                            </div>
                                        </td>
                                        <td>
                                            <div class="divide-column">
                                                {{ $user->code_cour }}
                                            </div>
                                        </td>

                                        <td>
                                            <div class="divide-column">
                                                {{ \Carbon\Carbon::parse($user->created_at)->format('d-m-Y') }}
                                            </div>
                                        </td>

                                        <div class="divide-column">
                                            <td>
                                                <a class="btn btn-warning"
                                                    {{--                                                       href="{{ route('edituser', ['id' => $user->id ]) }}--}}
                                                >
                                                    Sửa
                                                </a>
                                                <button type="button" class="btn btn-danger deleteuser" data-id="1">
                                                    Xóa
                                                </button>
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
