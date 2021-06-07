@extends('layouts.app')
@section('content')
<div class="isi_page">
    <div class="isi_page">
        <h2>TAMBAH DATA</h2>
        {!!Form::open(['url' => ['item', $inventory->id], 'method' => 'POST'])!!}
            @csrf
            <?php 
                function cmp($str1, $str2){
                    if(!(strcmp($str1, $str2))) echo "selected='selected'";
                }
            ?>
            <input name="user_id" class="hidden" value="{{Auth::user()->id}}" hidden></input>
            <input name="inventory_id" class="hidden" value="{{$inventory->id}}" hidden></input>
            <input name="item_id" class="hidden" value="{{$item->id}}" hidden></input>
            <div class="form-group">
                <label for="name">Nama Barang</label>
                <input type="text" class="form-control" id="name" name="name" value="{{$item->name}}">
            </div>
            <br>
            <div class="row">
                <div class="col">
                    <div class="form-group">
                        <label for="quantity">Jumlah</label>
                        <input type="number" class="form-control" id="quantity" name="quantity" value="{{$item->quantity}}" >
                    </div>
                </div>

                <div class="col">
                    <div class="form-group">
                        <label for="shelf">Shelf</label>
                        <select class="form-control" id="shelf" name="shelf" type="text">
                            <optgroup label="Shelf A">
                                <option value="A0" <?php cmp($inventory->shelf, 'A0')?>>A0</option>
                                <option value="A1" <?php cmp($inventory->shelf, 'A1')?>>A1</option>
                                <option value="A2" <?php cmp($inventory->shelf, 'A2')?>>A2</option>
                                <option value="A3" <?php cmp($inventory->shelf, 'A3')?>>A3</option>
                                <option value="A4" <?php cmp($inventory->shelf, 'A4')?>>A4</option>
                                <option value="A5" <?php cmp($inventory->shelf, 'A5')?>>A5</option>
                                <option value="A6" <?php cmp($inventory->shelf, 'A6')?>>A6</option>
                                <option value="A7" <?php cmp($inventory->shelf, 'A7')?>>A7</option>
                            </optgroup>
                            <optgroup label="Shelf B">
                                <option value="B0" <?php cmp($inventory->shelf, 'B0')?>>B0</option>
                                <option value="B1" <?php cmp($inventory->shelf, 'B1')?>>B1</option>
                                <option value="B2" <?php cmp($inventory->shelf, 'B2')?>>B2</option>
                                <option value="B3" <?php cmp($inventory->shelf, 'B3')?>>B3</option>
                                <option value="B4" <?php cmp($inventory->shelf, 'B4')?>>B4</option>
                                <option value="B5" <?php cmp($inventory->shelf, 'B5')?>>B5</option>
                                <option value="B6" <?php cmp($inventory->shelf, 'B6')?>>B6</option>
                                <option value="B7" <?php cmp($inventory->shelf, 'B7')?>>B7</option>
                            </optgroup>
                            <optgroup label="Shelf C">
                                <option value="C0" <?php cmp($inventory->shelf, 'C0')?>>C0</option>
                                <option value="C1" <?php cmp($inventory->shelf, 'C1')?>>C1</option>
                                <option value="C2" <?php cmp($inventory->shelf, 'C2')?>>C2</option>
                                <option value="C3" <?php cmp($inventory->shelf, 'C3')?>>C3</option>
                                <option value="C4" <?php cmp($inventory->shelf, 'C4')?>>C4</option>
                                <option value="C5" <?php cmp($inventory->shelf, 'C5')?>>C5</option>
                                <option value="C6" <?php cmp($inventory->shelf, 'C6')?>>C6</option>
                                <option value="C7" <?php cmp($inventory->shelf, 'C7')?>>C7</option>
                            </optgroup>
                        </select>
                        <!-- <input type="text" class="form-control" id="shelf" name="shelf" placeholder="Shelf"> -->
                    </div>
                </div>
                <div class="col">
                    <div class="form-group">
                        <label for="level">Level</label>
                        <select class="form-select" aria-label="Default select example" type="text" id="level" name="level"  value="{{$inventory->level}}">
                            <option selected>Select Level</option>
                            <option value="0" <?php cmp($inventory->level, '0')?>>0</option>
                            <option value="1" <?php cmp($inventory->level, '1')?>>1</option>
                            <option value="2" <?php cmp($inventory->level, '2')?>>2</option>
                            <option value="3" <?php cmp($inventory->level, '3')?>>3</option>
                            <option value="4" <?php cmp($inventory->level, '4')?>>4</option>
                        </select>
                    </div>

                </div>
            </div>
            <br>
            <div class="col">

                <div class="row form-row">
                    <div class="form-group col-md-6">
                        <label for="date_in">Tanggal Masuk</label>
                        <input type="date" class="form-control" name="date_in" id="date_in"  value="{{$inventory->date_in}}">
                    </div>
                    <div class="row form-group col-md-6">
                        <label for="date_out">Tanggal Keluar</label>
                        <input type="date" class="form-control" name="date_out" id="date_out"  value="{{$inventory->date_out}}">
                    </div>
                </div>
            </div>
            <br>
            <div class="form-group">
                <label for="description">Keterangan</label>
                <textarea class="form-control" id="description" name="description" rows="3">{{$item->description}} </textarea>
            </div>
            <br>
            <div class="text-right">
                <a href="/transpage" class="btn btn-primary pull-right">Back</a> &nbsp;
                <!-- <a type="submit" class="btn btn-primary pull-right" id="submit" value="Submit">Save</a -->
                {{-- <button type="submit" class="btn btn-primary">Submit</button> --}}
                {{Form::hidden('_method', 'PUT')}}
                {{Form::submit('Submit', ['class'=>'btn btn-primary'])}}
            </div>
            {!!Form::close()!!}
        <br>

    </div>
</div>
@endsection