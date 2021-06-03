@extends('layouts.app')
@section('content')
<div class="isi_page">
    <div class="isi_page">
        <h2>TAMBAH DATA</h2>
        <form method="POST" id="addItem">
            @csrf
            <input name="user_id" class="hidden" value="{{Auth::user()->id}}" hidden></input>
            <div class="form-group">
                <label for="name">Nama Barang</label>
                <input type="text" class="form-control" id="name" name="name">
            </div>
            <div class="form-group">
                <label for="quantity">Jumlah</label>
                <input type="number" class="form-control" id="quantity" name="quantity" placeholder="box">
            </div>
            <div class="form-row">
                <div class="form-group col-md-5">
                    <label for="shelf">Shelf</label>
                    <select class="form-control" id="shelf" name="shelf" type="text">
                        <optgroup label="Shelf A">
                            <option value="A0">A0</option>
                            <option value="A1">A1</option>
                            <option value="A2">A2</option>
                            <option value="A3">A3</option>
                            <option value="A4">A4</option>
                            <option value="A5">A5</option>
                            <option value="A6">A6</option>
                            <option value="A7">A7</option>
                        </optgroup>
                        <optgroup label="Shelf B">
                            <option value="B0">B0</option>
                            <option value="B1">B1</option>
                            <option value="B2">B2</option>
                            <option value="B3">B3</option>
                            <option value="B4">B4</option>
                            <option value="B5">B5</option>
                            <option value="B6">B6</option>
                            <option value="B7">B7</option>
                        </optgroup>
                        <optgroup label="Shelf C">
                            <option value="C0">C0</option>
                            <option value="C1">C1</option>
                            <option value="C2">C2</option>
                            <option value="C3">C3</option>
                            <option value="C4">C4</option>
                            <option value="C5">C5</option>
                            <option value="C6">C6</option>
                            <option value="C7">C7</option>
                        </optgroup>
                    </select>
                    <!-- <input type="text" class="form-control" id="shelf" name="shelf" placeholder="Shelf"> -->
                </div>
                <div class="form-group col-md-5">
                    <label for="level">Level</label>
                    <select class="form-select" aria-label="Default select example" type="text" id="level" name="level">
                        <option selected>Select Level</option>
                        <option value="0">0</option>
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                    </select>
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="date_in">Tanggal Masuk</label>
                    <input type="date" class="form-control" name="date_in" id="date_in">
                </div>
                <div class="form-group col-md-6">
                    <label for="date_out">Tanggal Keluar</label>
                    <input type="date" class="form-control" name="date_out" id="date_out">
                </div>
            </div>
            <div class="form-group">
                <label for="description">Keterangan</label>
                <textarea class="form-control" id="description" name="description" rows="3"></textarea>
            </div>

            <div class="text-right">
                <a href="/transpage" class="btn btn-primary pull-right">Back</a> &nbsp;
                <!-- <a type="submit" class="btn btn-primary pull-right" id="submit" value="Submit">Save</a -->
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </form>
        <br>

    </div>
</div>
@endsection