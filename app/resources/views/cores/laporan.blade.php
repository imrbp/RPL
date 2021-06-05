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
    <form method="GET" action="{{route('laporan')}}">
        <div class="form-row row">
            <div class="col">
                <label for="">Level</label>
                <select class="form-select filter" aria-label="Level" name="level" id="filter-level">
                    <option selected>-</option>
                    <option value="0" @if (request()->query('level') == "0") selected @endif >0</option>
                    <option value="1" @if (request()->query('level') == "1") selected @endif >1</option>
                    <option value="2" @if (request()->query('level') == "2") selected @endif >2</option>
                    <option value="3" @if (request()->query('level') == "3") selected @endif >3</option>
                    <option value="4" @if (request()->query('level') == "4") selected @endif >4</option>
                </select>
            </div>
            <div class="col">
                <label for="">Shelf</label>
                <select class="form-select filter" aria-label="Shelf" name="shelf" id="filter-shelf">
                    <option selected>-</option>
                    <option value="A" @if (request()->query('shelf') == "A") selected @endif >A</option>
                    <option value="B" @if (request()->query('shelf') == "B") selected @endif >B</option>
                    <option value="C" @if (request()->query('shelf') == "C") selected @endif >C</option>
                </select>
            </div>
            <div class="col-5">
                <label for="">Search</label>
                <div class="input-group mb-3">
                    <input type="text" class="form-control" placeholder="Search" id="keyword" name="keyword" value="{{request()->query('keyword')}}">
                </div>
            </div>
            <div class="col">
                <label for=""> </label>
                <div class="input-group mb-3">
                    <button class="btn btn-outline-secondary" type="submit" id="button-addon2">Search</button>
                </div>
            </div>
        </div>
    </form>
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

<script>
    function levelfilter() {
        document.getElementById("level_filter").submit();
    }

    function shelffilter() {
        document.getElementById("shelf_filter").submit();
    }
</script>

@endsection