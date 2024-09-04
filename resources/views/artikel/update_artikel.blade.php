<!DOCTYPE html>
<html>

<head>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css"
        rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC"
        crossorigin="anonymous">
</head>

<body>
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Update Artikel') }}
        </h2>
    </x-slot>
    
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card p-4">
                    <form action="{{ route('update.artikel', $post->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <h2 class="mb-4 text-center text-primary">Form Tambah Artikel</h2>
                        <img src="{{ asset('storage/article_bg.jpg') }}" class="mx-auto d-block mb-4 rounded-circle" alt="Gambar Artikel" style="height: 200px; width: 200px;">
                        <div class="mb-3">
                            <label for="title" class="form-label">Judul Artikel</label>
                            <input type="text" class="form-control" value="{{$post->title}}" name="title" id="title" placeholder="Masukkan Judul Artikel">
                        </div>
                        <div class="mb-3">
                            <label for="author" class="form-label">Author</label>
                            <input type="text" class="form-control" value="{{$post->author}}" name="author" id="author" placeholder="Masukkan Author">
                        </div>
                        <div class="mb-3">
                            <label for="slug" class="form-label">Slug</label>
                            <input type="text" class="form-control" value="{{$post->slug}}" name="slug" id="slug" placeholder="Masukkan Slug">
                        </div>
                        <div class="mb-3">
                            <label for="image" class="form-label">Gambar</label>
                            <input type="file" class="form-control" name="image" id="image" placeholder="Pilih Gambar">
                        </div>
                        <div class="mb-3">
                            <label for="body" class="form-label">Isi Artikel</label>
                            <textarea class="form-control" id="body" name="body" rows="3" placeholder="Masukkan Isi Artikel">{{$post->body}}</textarea>
                        </div>
                        <button type="submit" class="btn btn-primary w-100">Simpan</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

    <!-- Bootstrap Bundle JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
        crossorigin="anonymous"></script>
</body>

</html>
