@extends('layouts.app')
@section('content')
    <div class="page-heading">
        <div class="page-title">
            <div class="row">
                <div class="col-12 col-md-6 order-md-1 order-last">
                    <h3>Laptops</h3>
                    <p class="text-subtitle text-muted">
                       Manage laptop data
                    </p>
                </div>
                <div class="col-12 col-md-6 order-md-2 order-first">
                    <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="">Master Data</a></li>
                            <li class="breadcrumb-item"><a href="{{ route('laptops.index') }}">Laptops</a></li>
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
                            <h4 class="card-title">Create Laptop</h4>
                        </div>
                        <div class="card-content">
                            <div class="card-body">
                                <form class="form" action="{{ route('laptops.update', $laptop->id) }}" method="POST" data-parsley-validate id="form-add-user">
                                    @csrf
                                    <div class="row">
                                        <div class="col-md-12 col-12">
                                            <div class="form-group mb-3">
                                                <label for="brand">Brand</label>
                                                <input type="text" name="brand" value="{{ $laptop->brand }}" id="brand" data-parsley-required="true" class="form-control" placeholder="ex: Lenovo">
                                            </div>
                                            <div class="form-group mb-3">
                                                <label for="model">Model</label>
                                                <input type="text" name="model" value="{{ $laptop->model }}" id="model" data-parsley-required="true" class="form-control" placeholder="ex : Tinkpad X1 Carbon Gen 9">
                                            </div>
                                            <div class="form-group mb-3">
                                                <label for="year">Year Release</label>
                                                <select data-parsley-required="true" class="form-control" name="year" id="year">
                                                    <option value="" hidden>--Choose Year--</option>
                                                   @for ($i = 0; $i < 50; $i++)
                                                        @php $year = 2014 + $i; @endphp
                                                        <option {{ $laptop->release_year == $year ? 'selected' : '' }} value="{{ $year }}">{{ $year }}</option>
                                                    @endfor
                                                </select>
                                            </div>
                                            <div class="form-group mb-3">
                                                <label for="status">Status Active</label>
                                                <select data-parsley-required="true" class="form-control" name="status" id="status">
                                                    <option value="" hidden>--Choose Status--</option>
                                                    <option {{ $laptop->status == 1 ? 'selected' : '' }} value="1">Active</option>
                                                    <option {{ $laptop->status == 0 ? 'selected' : '' }} value="0">Inactive</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-12 d-flex gap-2 justify-content-end">
                                            <a href="{{ route('laptops.index') }}" class="btn btn-light-secondary me-1 mb-1">Cancle</a>
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