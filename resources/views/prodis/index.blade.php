<h1>data Prodi</h1>
<table border="1" cellpadding="10">
<tr> 
    <th>no</th>
    <th>nama prodi </th>
    <th>singkatan  </th>
    <th>kaprodi</th>
    <th>fakultas</th>
</tr>
@foreach ($prodis as $key=>$prodi)
    <tr>
        <td>{{$key+1}}</td>
        <td>{{$prodi->nama_prodi}}</td>
        <td>{{$prodi->Singkatan}}</td>
        <td>{{$prodi->Kaprodi}}</td>
        <td>{{$prodi->fakultas->nama_fakultas ?? '-'}}</td>
    </tr>
@endforeach
   
</table>