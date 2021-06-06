@extends('layouts.app')
@section('content')

<div class="isi_page">
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>No</th>
                <th>Nama Barang</th>
                <th>Deskripsi</th>
                <th>Jumlah</th>
                <th>Level</th>
                <th>Shelf</th>
                <th>Tgl Masuk</th>
                <th>Tgl Keluar</th>
            </tr>
        </thead>
        <tbody>
            <div hidden>{{$i = 0}}</div>
            @foreach($datas as $item)
            <tr>
                <td>{{ $datas->firstItem() + $i++ }}</td>
                <td>{{ $item->item->name }}</td>
                <td>{{ $item->item->description }}</td>
                <td>{{ $item->item->quantity }}</td>
                <td>{{ $item->level }}</td>
                <td>{{ $item->shelf }}</td>
                <td>{{ $item->date_in }}</td>
                <td>{{ $item->date_out }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
    <div class="col">
        <div class="float-start">
            <a href="{{route('download')}}" class="btn btn-primary">Download All Data</a>
        </div>
        <div class="float-end">
            {{ $datas->links("pagination::bootstrap-4")}}
        </div>
    </div>
</div>
@endsection