@extends('layouts.app')
@section('content')
    <div class="page-heading">
        <div class="page-title">
            <div class="row">
                <div class="col-12 col-md-6 order-md-1 order-last">
                    <h3>Services</h3>
                    <p class="text-subtitle text-muted">
                       Manage service laptop data
                    </p>
                </div>
                <div class="col-12 col-md-6 order-md-2 order-first">
                    <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="">Master Data</a></li>
                            <li class="breadcrumb-item"><a href="{{ route('services.index') }}">Services</a></li>
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
                            Services
                        </div>
                        <div>
                            <a href="{{ route('services.create') }}" class="btn btn-primary">Add Service</a>
                        </div>
                    </h5>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table" id="table1">
                            <thead>
                                <tr>
                                    <th class="text-nowrap">#</th>
                                    <th class="text-nowrap">No Invoice</th>
                                    <th class="text-nowrap">Customer</th>
                                    <th class="text-nowrap">Laptop</th>
                                    <th class="text-nowrap">Status Paid</th>
                                    <th class="text-nowrap">Status</th>
                                    <th class="text-nowrap">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($services as $index => $service)
                                    <tr>
                                        <td class="text-nowrap">{{ $index + 1 }}</td>
                                        <td class="text-nowrap">{{ $service->no_invoice }}</td>
                                        <td class="text-nowrap">{{ $service->customer->name }}</td>
                                        <td class="text-nowrap">{{ $service->laptop->brand }} | {{ $service->laptop->model }}</td>
                                        <td class="text-nowrap">
                                            @if ($service->is_paid == 1)
                                                <span class="dote dote-success"></span> <small>Paid</small>
                                            @else
                                                <span class="dote dote-danger"></span> <small>Unpaid</small>
                                            @endif
                                        </td>
                                        <td class="text-nowrap">
                                            @if ($service->status == 1)
                                                <span class="badge bg-info">Accepted</span>
                                            @elseif ($service->status == 2)
                                                <span class="badge bg-warning">Process</span>
                                            @elseif ($service->status == 3)
                                                <span class="badge bg-success">Done</span>
                                            @elseif ($service->status == 4)
                                                <span class="badge bg-success">Taken</span>
                                            @elseif ($service->status == 5)
                                                <span class="badge bg-danger">Cancled</span>
                                            @endif
                                        </td>
                                        <td class="d-flex gap-2">
                                            <a href="#" class="btn btn-sm btn-primary">Detail</a>
                                            <a href="#" class="btn btn-sm btn-success">Payment</a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection