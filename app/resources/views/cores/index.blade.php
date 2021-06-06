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

    <div class="float-start">
        Showing {{$datas->firstItem()}} to {{ $datas->lastItem()}} of {{$datas->total()}}
    </div>
    <div class="float-end">
        {{ $datas->links("pagination::bootstrap-4")}}
    </div>

</div>
@endsection