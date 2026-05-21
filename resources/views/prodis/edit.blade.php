@extends('main')
@section('title','Tambah Program Studi')
@section('content')
    <form action='{{ route('prodis.update', $prodi->id) }}' method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="">nama prodi</label>
            <input type="text" name="nama_prodi" class="form-control" value="{{old('nama_prodi')}}">
        </div>
        @error('nama_prodi')
            <div class="text-danger">
                {{$message}}
            </div>
        @enderror
        <div class="form-group">
            <label for="">singkatan</label>
            <input type="text" name="Singkatan" class="form-control" value="{{old('Singkatan')}}">
        </div>

        @error('Singkatan')
            <div class="text-danger">
                {{$message}}
            </div>
        @enderror

        <div class="form-group">
            <label for="">Kepala Program Studi</label>
            <input type="text" name="Kaprodi" class="form-control" value="{{old('Kaprodi')}}">
        </div>
        @error('Kaprodi')
            <div class="text-danger">
                {{$message}}
            </div>
        @enderror

        <div class="form-group">
            <label for="">Fakultas</label>
            <select name="fakultas_id" class="form-control">
                <option value="">Pilih fakultas</option>
                @foreach ($fakultas as $row)
                    <option value="{{$row->id}}"{{old('fakultas_id')==$row->id ?'selected':""}}>
                        {{$row->nama_fakultas}}
                    </option>
                @endforeach
            </select>
        </div>
        @error('Kaprodi')
            <div class="text-danger">
                {{$message}}
            </div>
        @enderror


        <button type="submit" class="btn btn-primary mt-2">Simpan</button>
    </form>
@endsection