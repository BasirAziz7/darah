@extends('base')
@section('content')

<head>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>

<div class="container py-5">
    <div class="row">
        <div class="col-6 bg-light">
            <h3>LOKASI</h3>

            <div class="col-6">

                <form method="POST" action="/lokasis">
                    @csrf
                    <div class="form-group">
                        <label for="">Negeri :</label>
                        <input class="form-control mb-3" type="text" name="negeri">
                        <label for="">Daerah :</label>
                        <input class="form-control mb-3" type="text" name="daerah">
                        <label for="">Bandar :</label>
                        <input class="form-control mb-3" type="text" name="bandar">
                        <label for="">Postal Code :</label>
                        <input class="form-control mb-3" type="text" name="postal_code">
                        <label for="">Alamat Penuh :</label>
                        <input class="form-control mb-3" type="text" name="alamat_penuh">


                    </div>
                    <input type="hidden" name="keputusan_id" value=1>
                    <button class="btn btn-primary" type="submit">Tambah</button>
                </form>

                <div class="row my-4">
                    <div class="col-12">
                        <h3>Lokasi Derma Darah</h3>
                        <table class="table table-bordered">
                            <tr>
                                <th>Negeri</th>
                                <th>Daerah</th>
                                <th>Bandar</th>
                                <th>Postal code</th>
                                <th>Alamat Penuh</th>


                            </tr>
                            @foreach ($lokasis as $lokasi)
                            <tr>
                                <td>{{ $lokasi['negeri'] }}</td>
                                <td>{{ $lokasi['daerah'] }}</td>
                                <td>{{ $lokasi['bandar'] }}</td>
                                <td>{{ $lokasi['postal_code'] }}</td>
                                <td>{{ $lokasi['alamat_penuh'] }}</td>


                            </tr>
                            @endforeach
                        </table>
                    </div>
                </div>
          </div>

          <div class="container mt-5">
        <form action="/fails" method="post" enctype="multipart/form-data">
          <h3 class="text-center mb-5">Muat naik gambar lokasi</h3>
            @csrf
            @if ($message = Session::get('success'))
            <div class="alert alert-success">
                <strong>{{ $message }}</strong>
            </div>
          @endif

          @if (count($errors) > 0)
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                      <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
          @endif

            <div class="custom-file">
                <input type="file" name="file" class="custom-file-input" id="chooseFile">
                <label class="custom-file-label" for="chooseFile">Select file</label>
            </div>

            <button type="submit" name="submit" class="btn btn-primary btn-block mt-4">
                Upload Files
            </button>
        </form>
     
    </div>


@stop