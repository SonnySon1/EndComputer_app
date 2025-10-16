@extends('layouts.app')
@section('content')
    <div class="page-heading">
        <div class="page-title">
            <div class="row">
                <div class="col-12 col-md-6 order-md-1 order-last">
                    <h3>Service Items</h3>
                    <p class="text-subtitle text-muted">
                       Manage service item data
                    </p>
                </div>
                <div class="col-12 col-md-6 order-md-2 order-first">
                    <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="">Master Data</a></li>
                            <li class="breadcrumb-item"><a href="{{ route('serviceitems.index') }}">Service Items</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Create</li>
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
                            <h4 class="card-title">Create Service Item</h4>
                        </div>
                        <div class="card-content">
                            <div class="card-body">
                                <form class="form" action="{{ route('serviceitems.update', $serviceitem->id) }}" method="POST" data-parsley-validate id="form-add-serviceitem">
                                    @csrf
                                    <div class="row">
                                        <div class="col-md-12 col-12">
                                            <div class="form-group mb-3">
                                                <label for="name">Name</label>
                                                <input type="text" name="name" value="{{ $serviceitem->name }}" id="name" data-parsley-required="true" class="form-control" placeholder="ex: Replace the Keyboard">
                                            </div>
                                            <div class="form-group mb-3">
                                                <label for="price">Price</label>
                                                <input type="text" name="price" value="{{ $serviceitem->price }}" id="price" data-parsley-required="true" class="form-control currency" placeholder="ex : 200.000">
                                            </div>
                                            <div class="form-group mb-3">
                                                <label for="status">Status Active</label>
                                                <select class="form-control" name="status" id="status" data-parsley-required="true">
                                                    <option value="" hidden>--Choose Status--</option>
                                                    <option {{ $serviceitem->is_active == 1 ? 'selected' : '' }} value="1">Active</option>
                                                    <option {{ $serviceitem->is_active == 0 ? 'selected' : '' }} value="0">Not Active</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-12 d-flex gap-2 justify-content-end">
                                            <a href="{{ route('serviceitems.index') }}" class="btn btn-light-secondary me-1 mb-1">Cancle</a>
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