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
                            <li class="breadcrumb-item active" aria-current="page">Create</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
        <section id="multiple-column-form">
            <form class="form" action="{{ route('services.store') }}" method="POST" id="form-add-user">
                <div class="row match-height">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Service Form</h4>
                            </div>
                            <div class="card-content">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-6 col-12">
                                            <div class="form-group mb-3">
                                                <label for="customer">Customer</label>
                                                <select class="form-control" name="customer" id="customer">
                                                    <option hidden>--Choose Customer--</option>
                                                    <option value="1">Admin</option>
                                                    <option value="2">Technician</option>
                                                </select>
                                            </div>
                                            <div class="form-group mb-3">
                                                <label for="laptop">Laptop</label>
                                                <select class="form-control" name="laptop" id="laptop">
                                                    <option hidden>--Choose Laptop--</option>
                                                    <option value="1">Lenovo | Thinkpad X1 Carbon Gen 9</option>
                                                    <option value="2">Acer | Aspire 5</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-12">
                                                <div class="form-group mb-3">
                                                <label for="technician">Technician</label>
                                                <select class="form-control" name="technician" id="technician">
                                                    <option hidden>--Choose Technician--</option>
                                                    <option value="1">Rehan</option>
                                                    <option value="2">Jordan</option>
                                                </select>
                                            </div>
                                            <div class="form-group mb-3">
                                                <label for="damagedescription">Damage Description</label>
                                                <input type="text" name="damagedescription" id="damagedescription" class="form-control" placeholder="ex : Broken Keyboard, Broken Screen, Broken Touchpad">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Service Detail Form</h4>
                            </div>
                            <div class="card-content">
                                <div class="card-body">
                                    <table class="table table-hover table-lg">
                                        <thead>
                                            <tr>
                                                <td>#</td>
                                                <td>Service Type</td>
                                                <td>Price</td>
                                            </tr>                                            
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>1</td>
                                                <td>
                                                    <select class="form-control select2" name="service_type" id="service_type">
                                                        <option hidden>--Choose Service Type--</option>
                                                        <option value="1">Service LCD</option>
                                                        <option value="2">Service Keyboard</option>
                                                        <option value="2">Service Touchpad</option>
                                                    </select>
                                                </td>
                                                <td>
                                                    <input type="text" name="price" disabled readonly id="price" class="form-control" placeholder="ex : 10000">
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </section>
    </div>
@endsection