@extends('layouts.app')
@section('content')

<div class="isi_page">
    <h2>BIODATA</h2>
    <div class="card">
        <div class="card-header text-center">
            BIODATA ADMIN
        </div>
        <div class="card-body">
            <div class="col-lg-6 col-md-12">
                <div class="card-body">
                    <div class="row">
                        <div class="col-sm-4"><strong class="text-uppercase">Nama:</strong></div>
                        <div class="col-sm-8">{{ $first_name}} {{ $last_name}}</div>
                    </div>
                    <div class="row mt-3">
                        <div class="col-sm-4"><strong class="text-uppercase">ID Admin:</strong></div>
                        <div class="col-sm-8">{{$id}}</div>
                    </div>
                    <div class="row mt-3">
                        <div class="col-sm-4"><strong class="text-uppercase">Email:</strong></div>
                        <div class="col-sm-8">{{ $email }}</div>
                    </div>
                    <div class="row mt-3">
                        <div class="col-sm-4"><strong class="text-uppercase">No Telepon:</strong></div>
                        <div class="col-sm-8">{{ $phone}}</div>
                    </div>
                    <div class="row mt-3">
                        <div class="col-sm-4"><strong class="text-uppercase">Alamat:</strong></div>
                        <div class="col-sm-8">{{ $address}}</div>
                    </div>
                </div>
            </div>
            <div class="text-right">
                <a href="/editbiodata" class="btn btn-primary pull-right">Edit</a>
            </div>
        </div>
    </div>
</div>
@endsection