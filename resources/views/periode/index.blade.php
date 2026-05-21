@extends('main')
@section('title','Fakultas')
@section('content')
    <a href="{{ route('periodes.create') }}" class="btn btn-primary">tambah</a>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Tahun akademik</th>
                <th>Semester</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($result1 as $item)
                <tr> 
                    <td>{{$item->Tahun_Akademik}}</td>
                    <td>{{$item->Semester}}</td>
                    <td>
                        <a href="{{ route('periodes.edit', $item->id) }}"
                            class="btn btn-warning btn-rounded">Ubah</a>

                        <form method="POST" action="{{ route('periodes.destroy', $item->id) }}" class="d-inline">
                        @csrf
                        <input name="_method" type="hidden" value="DELETE">
                        <button type="submit" class="btn btn-xs btn-danger btn-rounded show_confirm"
                            data-toggle="tooltip" title='Delete'
                            data-nama='{{ $item->Tahun_Akademik }}'>Hapus</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection