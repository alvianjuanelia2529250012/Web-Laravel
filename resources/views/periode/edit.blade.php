@extends('main')
@section('title','Tambah Fakultas')
@section('content')
    <form action={{ route('periodes.update', $periode->id) }} method="post">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="">Tahun Akademik</label>
            <input type="text" name="Tahun_Akademik" class="form-control" value="{{old('Tahun_Akademik')}}">
        </div>
        @error('Tahun_Akademik')
            <div class="text-danger">
                {{$message}}
            </div>
        @enderror
        <div class="form-group">
            <label for="">semester</label>
            <input type="text" name="Semester" class="form-control" value="{{old('Semester')}}">
        </div>

        @error('Semester')
            <div class="text-danger">
                {{$message}}
            </div>
        @enderror
        <button type="submit" class="btn btn-primary mt-2">Simpan</button>
    </form>
@endsection