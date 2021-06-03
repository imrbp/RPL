@extends('layouts.app')
@section('content')
<div class="isi_page">
    <h2>BIODATA</h2>
    <div class="card">
        <div class="card-header text-center">
            BIODATA ADMIN
        </div>
        <div class="card-body">
            <form method="POST">
                @csrf
                <div class="form-group">
                    <label for="first_name">First Name:</label>
                    <input type="text" class="form-control" id="first_name" name="first_name" value="{{$first_name}}">
                </div>
                <div class="form-group">
                    <label for="last_name">Last Name</label>
                    <input type="text" class="form-control" id="last_name" name="last_name" value="{{$last_name}}">
                </div>
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" class="form-control" id="email" name="email" value="{{$email}}">
                </div>
                <div class="form-group">
                    <label for="phone">No Telepon</label>
                    <input type="text" class="form-control" id="phone" name="phone" value="{{$phone}}">
                </div>
                <div class="form-group">
                    <label for="address">Alamat</label>
                    <textarea class="form-control" id="address" name="address" rows="3">{{$address}}</textarea>
                </div>
                <div class="text-right mt-3">
                    <a href="biodata.html" class="btn btn-primary pull-right">Back</a> &nbsp;
                    <button type="submit" class="btn btn-primary">Edit</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection