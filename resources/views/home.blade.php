@extends('layouts/app')

@section('title', 'Admin - List Book')
    
@section('content')

<div class="content-wrapper">
    <h3 class="pl-5">Book Management</h3>
    <!-- ROW -->
    <div class="row mt-4">
        <!-- SECTION LIST BOOK -->
        <div class="col-lg-8 col-md-12 col-12">
            <div class="card">
                <div class="card-body p-5">
                    @if (session('success'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            <strong>Sukses !</strong><br>
                            {{session('success')}}
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    @endif
                    <table class="table table-striped table-hovered">
                        <thead class="bg-primary text-white">
                            <tr>
                                <th>No</th>
                                <th>Judul</th>
                                <th>Penulis</th>
                                <th>Tahun</th>
                                <th>Penerbit</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($listbook as $row)
                            <tr>
                                <td>{{$loop->iteration}}</td>
                                <td>{{$row->judul}}</td>
                                <td>{{$row->penulis}}</td>
                                <td>{{$row->tahun}}</td>
                                <td>{{$row->penerbit}}</td>
                                <td>
                                    <a href="/admin/book/detail/{{$row->id}}" class="btn btn-sm btn-primary">Detail</i></a>
                                    <button type="button" class="btn btn-sm btn-warning" data-toggle="modal" data-target="#edit{{$row->id}}">Edit</button>
                                    <button type="button" class="btn btn-sm btn-danger" data-toggle="modal" data-target="#delete{{$row->id}}">Delete</button>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <!-- END SECTION LIST BOOK -->

        <!-- SECTION ADD BOOK -->
        <div class="col-lg-4 col-md-12 col-12">
            <div class="card">
                <div class="card-body p-5">
                    <h4>Tambah Buku Baru</h4>
                    <hr>
                    <form class="mt-4" action="book/add" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label>Judul Buku</label>
                            <input type="hidden" class="form-control" id="id" name="id">
                            <input type="text" class="form-control" id="judul" name="judul" value="{{old('judul')}}">
                            <div class="text-danger">
                                @error('judul')
                                    {{$message}}
                                @enderror
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Penulis</label>
                            <input type="text" class="form-control" id="penulis" name="penulis" value="{{old('penulis')}}">
                            <div class="text-danger">
                                @error('penulis')
                                    {{$message}}
                                @enderror
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Penerbit</label>
                            <input type="text" class="form-control" id="penerbit" name="penerbit" value="{{old('penerbit')}}">
                            <div class="text-danger">
                                @error('penerbit')
                                    {{$message}}
                                @enderror
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Tahun</label> <br>
                            <select class="form-control" name="tahun" id="">
                                @for($i=2015; $i<2023; $i++)
                                <option value="{{$i}}">{{$i}}</option>
                                @endfor 
                            </select>
                            <div class="text-danger">
                                @error('tahun')
                                    {{$message}}
                                @enderror
                            </div>
                        </div>
                      
                        <button type="submit" class="btn btn-md btn-primary"><i class="ti-save-alt mr-1"></i> Simpan</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- END SECTION ADD BOOK -->
</div>
<!-- END ROW -->

<!-- SECTION DELETE -->
@foreach ($listbook as $row)
<div class="modal fade" id="delete{{$row->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-sm" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Peringatan !</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <p>Yakin ingin menghapus buku {{$row->judul}} ?</p>
        </div>
        <div class="modal-footer">
          <a href="/book/delete/{{$row->id}}" class="btn btn-sm btn-primary">Iya</a>
          <button type="button" class="btn btn-sm btn-danger" data-dismiss="modal">Batal</button>
        </div>
      </div>
    </div>
  </div>
  @endforeach
  <!-- END SECTION DELETE -->

    <!-- SECTION EDIT -->
    @foreach ($listbook as $row)
    <div class="modal fade" id="edit{{$row->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content px-5">
            <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Edit Data Buku {{$row->judul}}</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            </div>
            <form class="mt-4" action="book/edit" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label>Judul Buku</label>
                                <input type="hidden" class="form-control" id="id" name="id" value="{{$row->id}}">
                                <input type="text" class="form-control" id="judul" name="judul" value="{{$row->judul}}">
                                <div class="text-danger">
                                    @error('judul')
                                        {{$message}}
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group">
                                <label>Penulis</label>
                                <input type="text" class="form-control" id="penulis" name="penulis" value="{{$row->penulis}}">
                                <div class="text-danger">
                                    @error('penulis')
                                        {{$message}}
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group">
                                <label>Penerbit</label>
                                <input type="text" class="form-control" id="penerbit" name="penerbit" value="{{$row->penerbit}}">
                                <div class="text-danger">
                                    @error('penerbit')
                                        {{$message}}
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group">
                                <label>Tahun</label> <br>
                                <select class="form-control" name="tahun" id="">
                                    @for($i=2015; $i<2023; $i++)
                                    <option value="{{$i}}">{{$i}}</option>
                                    @endfor 
                                </select>
                                <div class="text-danger">
                                    @error('tahun')
                                        {{$message}}
                                    @enderror
                                </div>
                            </div>
                        
                            <button type="submit" class="btn btn-md btn-primary"><i class="ti-save-alt mr-1"></i> Simpan</button>
                        </form>
            <div class="modal-footer">
            </div>
        </div>
        </div>
    </div>
    @endforeach
    <!-- END SECTION EDIT -->

@endsection