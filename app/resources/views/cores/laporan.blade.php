@extends('layouts.app')
@section('content')
<div class="isi_page">
    <div class="dropdown">
        <a class="btn btn-secondary dropdown" href="#" role="button" id="dropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false">
            Filter
        </a>

        <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">
            <li><a class="dropdown-item" href="#">Nama Barang</a></li>
            <li><a class="dropdown-item" href="#">Data Terbaru</a></li>
            <li><a class="dropdown-item" href="#">Jumlah Barang</a></li>
            <li><a class="dropdown-item" href="#">Blok A</a></li>
            <li><a class="dropdown-item" href="#">Blok B</a></li>
            <li><a class="dropdown-item" href="#">Blok C</a></li>
            <li><a class="dropdown-item" href="#">Blok D</a></li>
            <li><a class="dropdown-item" href="#">Blok E</a></li>
            <li><a class="dropdown-item" href="#">Blok F</a></li>
        </ul>
    </div>


    <h2>TABEL LAPORAN</h2>
    <div class="row">
        <div class="col-md-4">
            <form method="GET" action="">
                <label for="">Level</label>
                <select class="form-select filter" aria-label="Level" name="level" id="filter-level">
                    <option selected>-</option>
                    <option value="0">0</option>
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4">4</option>
                </select>
            </form>
        </div>
        <div class="col-md-4">
            <form method="GET" action="">
                <label for="">Shelf</label>
                <select class="form-select filter" aria-label="Shelf" name="shelf" id="filter-shelf">
                    <option selected>-</option>
                    <option value="A">A</option>
                    <option value="B">B</option>
                    <option value="C">C</option>
                </select>
            </form>
        </div>

        <div class="col-md-4">
            <form method="GET" action="{{url('laporan')}}">
                <label for="">Search</label>
                <div class="input-group mb-3">
                    <input type="text" class="form-control" placeholder="Search" id="keyword" name="keyword">
                    <button class="btn btn-outline-secondary" type="submit" id="button-addon2">Search</button>
                </div>
            </form>
        </div>
    </div>
    <br>
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