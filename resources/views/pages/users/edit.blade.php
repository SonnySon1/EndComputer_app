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
                            <li class="breadcrumb-item active" aria-current="page">Edit</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
        <section id="multiple-column-form">
            <div class="row match-height">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Create User</h4>
                        </div>
                        <div class="card-content">
                            <div class="card-body">
                                <form class="form" action="{{ route('users.update', $user->id) }}" method="POST" id="form-add-user" data-parsley-validate>
                                    @csrf
                                    <div class="row">
                                        <div class="col-md-6 col-12">
                                            <div class="form-group mb-3">
                                                <label for="name">Name</label>
                                                <input type="text" name="name" value="{{ $user->name }}" id="name" class="form-control"  data-parsley-required="true" placeholder="ex: John Doe">
                                            </div>
                                            <div class="form-group mb-3">
                                                <label for="address">Address</label>
                                                <input type="text" name="address" value="{{ $user->address }}" id="address" class="form-control"  data-parsley-required="true" placeholder="ex : JL. Jendral Sudirman, No. 1, Bandung">
                                            </div>
                                            <div class="form-group mb-3">
                                                <label for="phonenumber">Phone Number</label>
                                                <input type="tel" name="phonenumber" value="{{ $user->phonenumber }}" id="phonenumber" class="form-control"  data-parsley-required="true" placeholder="ex : 08000000000">
                                            </div>
                                            <div class="form-group mb-3">
                                                <label for="email">Email</label>
                                                <input type="email" name="email" value="{{ $user->email }}" id="email" class="form-control"  data-parsley-required="true" placeholder="ex : johndoe@example.com">
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-12">
                                             <div class="form-group mb-3">
                                                <label for="role">Role</label>
                                                <select class="form-control" name="role"  data-parsley-required="true" id="role">
                                                    <option value="" hidden>--Choose Role--</option>
                                                    <option {{ $user->role == 1 ? 'selected' : '' }} value="1">Admin</option>
                                                    <option {{ $user->role == 2 ? 'selected' : '' }} value="2">Technician</option>
                                                </select>
                                            </div>
                                            <div class="form-group mb-3">
                                                <label for="status">Status Active</label>
                                                <select class="form-control" name="status"  data-parsley-required="true" id="status">
                                                    <option value="" hidden>--Choose Status--</option>
                                                    <option {{ $user->status == 1 ? 'selected' : '' }} value="1">Active</option>
                                                    <option {{ $user->status == 0 ? 'selected' : '' }} value="0">Inactive</option>
                                                </select>
                                            </div>
                                            <div class="form-group mb-3">
                                                <label for="password">Password</label>
                                                <input type="password" name="password" id="password" class="form-control"  placeholder="ex : Ac1dfg11CA">
                                            </div>
                                            <div class="form-group mb-3">
                                                <label for="confirm_password">Confirm Password</label>
                                                <input type="password" name="confirm_password" id="confirm_password" class="form-control"  placeholder="ex : Ac1dfg11CA">
                                            </div>
                                        </div>
                                        <div class="col-12 d-flex gap-2 justify-content-end">
                                            <a href="{{ route('users.index') }}" class="btn btn-light-secondary me-1 mb-1">Cancle</a>
                                            <button type="submit" class="btn btn-primary me-1 mb-1">Submit</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection