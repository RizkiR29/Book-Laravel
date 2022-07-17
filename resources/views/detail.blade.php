@extends('layouts/app')

@section('title', 'Admin - Detail Book')
    
@section('content')

<div class="content-wrapper">
    <h3 class="pl-5">Buku {{$book->judul}}</h3>

    <div class="row p-5">
        <div class="col-lg-12 col-md-12 col-12">
            <div class="card p-5">
                <h5>{{$book->penulis}}</h5>
                <h5>{{$book->tahun}}</h5>
                <h5>{{$book->penerbit}}</h5>
            </div>
        </div>
    </div>
</div>
@endsection