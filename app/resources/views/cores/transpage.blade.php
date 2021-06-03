@extends('layouts.app')
@section('content')
<div class="isi_page">
    <h2>TABEL TRANSPAGE</h2>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>No</th>
                <th>Nama Barang</th>
                <th>Jumlah</th>
                <th>Level</th>
                <th>Shelf</th>
                <th>Tgl Masuk</th>
                <th>Tgl Keluar</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <div hidden>{{$i = 0}}</div>
            @foreach($datas as $item)
            <tr>
                <td>{{ $datas->firstItem() + $i++ }}</td>
                <td>{{ $item->item->name }}</td>
                <td>{{ $item->item->quantity }}</td>
                <td>{{ $item->level }}</td>
                <td>{{ $item->shelf }}</td>
                <td>{{ $item->date_in }}</td>
                <td>{{ $item->date_out }}</td>
                <td>
                    <div class="d-grid gap-2 d-md-block">
                        <button class="btn btn-warning" type="button">edit</button>
                        <button class="btn btn-danger" type="button">delete</button>
                    </div>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    <div class="float-end">
        {{ $datas->links("pagination::bootstrap-4")}}
    </div>
    <div class="float-start">
        <div class="float-start">
            <a class="btn" href="/addItem" role="button" id="tambah_data">Tambah Item</a>
        </div>
    </div>
    @endsection