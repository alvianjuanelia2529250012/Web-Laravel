@extends('main')
@section('title','Mahasiswa')
@section('content')
    
<h1>data Mahasiswa</h1>
<a href="{{ route('mahasiswa.create') }}" class="btn btn-primary">tambah</a>
<table border="1" cellpadding="10">
<tr> 
    <th>no</th>
    <th>npm</th>
    <th>nama</th>
    <th>prodi</th>
    <th>foto</th>
    <th>aksi</th>
</tr>
@foreach ($mahasiswa as $key=>$mhs)
    <tr>
        <td>{{$key+1}}</td>
        <td>{{$mhs->npm}}</td>
        <td>{{$mhs->nama}}</td>
        <td>{{$mhs->prodi->nama_prodi ?? '-'}}</td>
        <td>
            @if ($mhs->foto)
                <img src="{{ asset('storage/fotos/' . $mhs->foto) }}" alt="Foto Mahasiswa" width="100">
            @else
                <p>No Photo</p>
            @endif
        </td>
        <td>
            <a href="{{ route('mahasiswa.edit', $mhs->id) }}"
            class="btn btn-warning btn-rounded">Ubah</a>

            <form method="POST" action="{{ route('mahasiswa.destroy', $mhs->id) }}" class="d-inline">
            @csrf
            @method('DELETE')
            <input name="_method" type="hidden" value="DELETE">
                <button type="submit" class="btn btn-xs btn-danger btn-rounded show_confirm"
                            data-toggle="tooltip" title='Delete'
                            data-nama='{{ $mhs->nama }}'>Hapus</button>
                </form>
        </td>
    </tr>
@endforeach
   
</table>
@endsection
