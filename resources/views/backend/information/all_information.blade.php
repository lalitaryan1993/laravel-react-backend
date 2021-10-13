@extends('admin.admin_master')

@section('admin')
    <div class="content-body">
        <div class="container-fluid">

            <div class="row page-titles mx-0">
                <div class="col-sm-6 p-md-0">
                    <div class="welcome-text">
                        <h4>All Information</h4>
                        <p class="mb-0">View all Information</p>
                    </div>
                </div>
                <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:void(0)">All Information</a></li>
                        <li class="breadcrumb-item active"><a href="javascript:void(0)">View</a></li>
                    </ol>
                </div>
            </div>
            <!-- row -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Information</h4>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-responsive-md">
                                    <thead>
                                        <tr>
                                            <th style="width:80px;"><strong>#</strong></th>
                                            <th><strong>About Me</strong></th>
                                            <th><strong>Refund Policy</strong></th>
                                            <th><strong>Terms And Condition</strong></th>
                                            <th><strong>Privacy And Policy</strong></th>
                                            <th></th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                        @foreach ($information as $item)

                                            <tr>
                                                <td><strong>03</strong></td>
                                                <td>{{ Str::limit($item->about, 20, '...') }}</td>
                                                <td>{{ Str::limit($item->refund, 20, '...') }}</td>
                                                <td>{{ Str::limit($item->terms, 20, '...') }}</td>
                                                <td>{{ Str::limit($item->privacy, 20, '...') }}</td>

                                                <td><span class="badge light badge-warning">Pending</span></td>
                                                <td>
                                                    <div class="d-flex">
                                                        <a href="{{ route('edit.information', $item->id) }}"
                                                            class="btn btn-primary shadow btn-xs sharp mr-1"><i
                                                                class="fa fa-pencil"></i></a>

                                                        <a href="{{ route('delete.information', $item->id) }}"
                                                            class="btn btn-danger shadow btn-xs sharp"><i
                                                                class="fa fa-trash"></i></a>
                                                    </div>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-lg-12">
                    <a href="{{ route('user.profile.edit') }}" class="btn btn-secondary">Edit Profile</a>
                </div>
            </div>
        </div>
    </div>

@endsection
