@extends('admin.layout.appadmin')
@section('content')
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

<form method="POST" action="{{route('pelanggan.store')}}" enctype="multipart/form-data">
    @csrf
    <div class="form-group row">
        <label for="text" class="col-4 col-form-label">Kode</label>
        <div class="col-8">
            <input id="text" name="kode" type="text" class="form-control">
        </div>
    </div>
    <div class="form-group row">
        <label for="text1" class="col-4 col-form-label">Nama</label>
        <div class="col-8">
            <input id="text1" name="nama" type="text" class="form-control">
        </div>
    </div>
    <div class="form-group row">
        <label class="col-4">Jenis Kelamin</label>
        <div class="col-8">
            @foreach($gender as $g)
            @php
            $cek = (old('g') == $g) ? 'checked':''; @endphp
            <div class="form-check">
                <input name="jk" id="radio_0" type="radio" class="form-check-input" value="{{$g}}" {{$cek}}>
                <label for="radio_0" class="form-check-label">{{$g}}</label>
            </div>
            @endforeach
        </div>
        <!-- rangga's verison -->
        <!-- @foreach ($gender as $g)
            <div class="custom-control custom-radio custom-control-inline">
              <input type="radio" name="jk" id="radio_{{ $loop->iteration }}" class="custom-control-input" value="{{ $g }}" />
              <label for="radio_{{ $loop->iteration }}" class="custom-control-label">{{ $g }}</label>
            </div>
        @endforeach -->
    </div>
    <div class="form-group row">
        <label for="text2" class="col-4 col-form-label">Tempat Lahir</label>
        <div class="col-8">
            <input id="text2" name="tmp_lahir" type="text" class="form-control">
        </div>
    </div>
    <div class="form-group row">
        <label for="text3" class="col-4 col-form-label">Tanggal Lahir</label>
        <div class="col-8">
            <input id="text3" name="tgl_lahir" type="date" class="form-control">
        </div>
    </div>
    <div class="form-group row">
        <label for="text4" class="col-4 col-form-label">Email</label>
        <div class="col-8">
            <input id="text4" name="email" type="text" class="form-control">
        </div>
    </div>
    <div class="form-group row">
        <label for="select" class="col-4 col-form-label">Kartu</label>
        <div class="col-8">
            <select id="select" name="kartu_id" class="custom-select">
                @foreach ($kartu as $k)
                <option value="{{$k->id}}">{{$k->nama}}</option>
                @endforeach
            </select>
        </div>
    </div>
    <div class="form-group row">
        <div class="offset-4 col-8">
            <button name="submit" type="submit" class="btn btn-primary">Submit</button>
        </div>
    </div>
</form>
@endsection