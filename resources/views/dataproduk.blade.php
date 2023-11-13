@extends('layouts.admin')

@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Data Produk</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Dashboard v2</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <div class="container">
        <a href="/tambahproduk" class="btn btn-success">Tambah</button> </a>
        <div class="row">
            @if ($message = Session::get('success'))
            <div class="alert alert-info" role="alert">
               {{$message}}
              </div>
              @endif
        <div class="row">
            <table class="table">
                <thead>
                    <tr>
                      <th>No</th>
                      <th>Nama_produk</th>
                      <th>Kategori</th>
                      <th>Kode_produk</th>
                      <th>Aktif</th>
                      <th>Tanggal Buat dan Update</th>
                      <th>Deskripsi</th>
                      <th>Harga</th>
                      <th>Unit</th>
                      <th>Diskon</th>
                      <th>Stock</th>
                      <th>Gambar_Produk</th>
                      <th>Aksi</th>

                    </tr>
                  </thead>
                <tbody>
                    @php
                        $no = 1;
                    @endphp
                    @foreach ($data as $index => $row )
                    <tr>
                        <th scope="row">{{$index + $data->firstItem()}}</th>
                        <td>{{ $row->product_name }}</td>
                        <td>
                            @if($row->product_categories)
                                {{ $row->product_categories->category_name }}
                            @else
                                No Category
                            @endif
                        </td>

                        <td>{{ $row->product_code }}</td>
                        <td>{{ $row->is_active }}</td>
                        <td>{{ $row->created_at }}</td>
                        <td>{{ $row->description }}</td>
                        <td>{{ $row->price }}</td>
                        <td>{{ $row->unit }}</td>
                        <td>{{ $row->discount_amount }}</td>
                        <td>{{ $row->stock }}</td>
                        <td>
                            @if(!empty($row->image))
                                @php
                                    $imagePaths = explode(',', $row->image);
                                @endphp

                                @foreach($imagePaths as $filename)
                                    <img src="{{ asset('fotoproduk/' . trim($filename)) }}" alt="" style="width: 90px">
                                @endforeach
                            @endif
                        </td>

                        <td>

                            <a href="/tampilproduk/{{$row->id}}" class="btn btn-info">Edit </a>
                            <a href="/deleteproduk/{{ $row->id }}" class="btn btn-danger" onclick="return confirm('Apa Anda Yakin untuk Hapus data ini?')">Hapus</a>
                        </td>
                    </tr>

                    @endforeach


                </tbody>
            </table>
            {{$data->links() }}

        </div>


    </div>



</div>























@endsection
