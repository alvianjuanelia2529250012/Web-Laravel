@extends('main')
@section('title','Prodi')
@section('content')
    
<h1>data Prodi</h1>
<a href="{{ route('prodis.create') }}" class="btn btn-primary">tambah</a>
<table border="1" cellpadding="10">
<tr> 
    <th>no</th>
    <th>nama prodi </th>
    <th>singkatan  </th>
    <th>kaprodi</th>
    <th>fakultas</th>
    <th>Singkatan</th>
</tr>
@foreach ($prodis as $key=>$prodi)
    <tr>
        <td>{{$key+1}}</td>
        <td>{{$prodi->nama_prodi}}</td>
        <td>{{$prodi->Singkatan}}</td>
        <td>{{$prodi->Kaprodi}}</td>
        <td>{{$prodi->fakultas->nama_fakultas ?? '-'}}</td>
        <td>{{$prodi->fakultas->singkatan ?? '-'}}</td>
        <td>
            <a href="{{ route('prodis.edit', $prodi->id) }}"
            class="btn btn-warning btn-rounded">Ubah</a>

            <form method="POST" action="{{ route('prodis.destroy', $prodi->id) }}" class="d-inline">
            @csrf
            <input name="_method" type="hidden" value="DELETE">
                <button type="submit" class="btn btn-xs btn-danger btn-rounded show_confirm"
                            data-toggle="tooltip" title='Delete'
                            data-nama='{{ $prodi->nama_prodi }}'>Hapus</button>
                </form>
        </td>
    </tr>
@endforeach
   
</table>
@endsection
