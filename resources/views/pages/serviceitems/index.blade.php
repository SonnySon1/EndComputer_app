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
                            Service Items
                        </div>
                        <div>
                            <a href="{{ route('serviceitems.create') }}" class="btn btn-primary">Add Service Item</a>
                        </div>
                    </h5>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table" id="table1">
                            <thead>
                                <tr>
                                    <th class="text-nowrap">#</th>
                                    <th class="text-nowrap">Name</th>
                                    <th class="text-nowrap">Price</th>
                                    <th class="text-nowrap">Status</th>
                                    <th class="text-nowrap">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($serviceitems as $index => $serviceitem)
                                    <tr>
                                        <td class="text-nowrap">{{ $index  +1 }}</td>
                                        <td class="text-nowrap">{{ $serviceitem->name }}</td>
                                        <td class="text-nowrap">{{ sparatorNumberFormat($serviceitem->price) }}</td>
                                        <td class="text-nowrap">
                                            @if ($serviceitem->is_active == 0)
                                                <span class="badge bg-danger">Inactive</span>
                                            @else
                                                <span class="badge bg-success">Active</span>
                                            @endif
                                        </td>
                                        <td class="d-flex gap-2">
                                            <a href="#" class="btn btn-sm btn-primary">Detail</a>
                                            <a href="{{ route('serviceitems.edit', $serviceitem->id) }}" class="btn btn-sm btn-warning">Edit</a>
                                            <button onclick="toastifyConfirm('{{ route('serviceitems.destroy', $serviceitem->id) }}')" type="button" class="btn btn-sm btn-danger delete-button">Delete</button>
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