@extends('layouts.app')
@section('content')
<div class="isi_page">
    <h2>TABEL DASHBOARD</h2>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Nama Barang</th>
                <th>Jumlah</th>
            </tr>
        </thead>
        <tbody>
            @foreach($datas as $item)
            <tr>
                <td>{{ $item->item->name }}</td>
                <td>{{ $item->item->quantity }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>

    {{ $datas->links("pagination::bootstrap-4")}}

    <br>

    <h2>TABEL TO DO LIST</h2>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>To Do List</th>
                <th>Keterangan</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>Masukkan Barang</td>
                <td>Lakukan besok</td>
            </tr>
            <tr>
                <td>Keluarkan Barang</td>
                <td>Lakukan sekarang</td>
            </tr>
            <tr>
                <td>Kirim Barang</td>
                <td>Lakukan nanti</td>
            </tr>
        </tbody>
    </table>
</div>
@endsection