@extends('layouts.app')
@section('content')
    <div class="page-heading">
        <div class="page-title">
            <div class="row">
                <div class="col-12 col-md-6 order-md-1 order-last">
                    <h3>Users</h3>
                    <p class="text-subtitle text-muted">
                       Manage user data
                    </p>
                </div>
                <div class="col-12 col-md-6 order-md-2 order-first">
                    <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="">Master Data</a></li>
                            <li class="breadcrumb-item"><a href="{{ route('users.index') }}">Users</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Index</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
        <section class="section">
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title d-flex justify-content-between gap-2 flex-wrap">
                        <div>
                            Users
                        </div>
                        <div>
                            <a href="{{ route('users.create') }}" class="btn btn-primary">Add User</a>
                        </div>
                    </h5>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table" id="table1">
                            <thead>
                                <tr>
                                    <th class="text-nowrap">Name</th>
                                    <th class="text-nowrap">Email</th>
                                    <th class="text-nowrap">Phone</th>
                                    <th class="text-nowrap">Role</th>
                                    <th class="text-nowrap">Status</th>
                                    <th class="text-nowrap">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td class="text-nowrap">Graiden</td>
                                    <td class="text-nowrap">vehicula.aliquet@semconsequat.co.uk</td>
                                    <td class="text-nowrap">076 4820 8838</td>
                                    <td class="text-nowrap"><span class="dote dote-danger"></span> <small>Admin</small></td>
                                    <td class="text-nowrap">
                                        <span class="badge bg-success">Active</span>
                                    </td>
                                    <td class="d-flex gap-2">
                                        <a href="#" class="btn btn-sm btn-primary">Detail</a>
                                        <a href="#" class="btn btn-sm btn-warning">Edit</a>
                                        <a href="#" class="btn btn-sm btn-danger">Delete</a>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="text-nowrap">Dale</td>
                                    <td class="text-nowrap">fringilla.euismod.enim@quam.ca</td>
                                    <td class="text-nowrap">0500 527693</td>
                                    <td class="text-nowrap"><span class="dote dote-success"></span> <small>Tecnician</small></td>
                                    <td class="text-nowrap">
                                        <span class="badge bg-success">Active</span>
                                    </td>
                                    <td class="d-flex gap-2">
                                        <a href="#" class="btn btn-sm btn-primary">Detail</a>
                                        <a href="#" class="btn btn-sm btn-warning">Edit</a>
                                        <a href="#" class="btn btn-sm btn-danger">Delete</a>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection