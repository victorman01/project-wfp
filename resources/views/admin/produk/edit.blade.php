@extends('layouts.admin.main')

@section('content')
    <div class="container">
        <h2>Edit Produk</h2>
        <form method="post" action="/admin/produks/{{ $produk->id }}" enctype="multipart/form-data">
            @csrf
            @method('put')
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <div class="form-group">
                <label for="nama">Nama Produk</label>
                <input type="text" class="form-control" id="nama" name="nama" value="{{ $produk->nama }}" required>
                @error('nama')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="form-group">
                <label for="informasi">Informasi Produk</label>
                <textarea class="form-control" id="informasi" name="informasi" rows="3" required>{{ $produk->informasi }}</textarea>
                @error('informasi')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="form-group">
                <label for="brand_id">Brand Produk</label>
                <select name="brand_id" class="form-control form-control-sm">
                    @foreach ($brands as $b)
                        <option value="{{ $b->id }}" {{ $produk->brand->id == $b->id ? 'selected' : '' }}>
                            {{ $b->nama }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="image">Post Image</label>
                @if ($produk->gambar->isNotEmpty())
                    <img class="img-preview" src="{{ asset('storage/' . $produk->gambar->first()->path) }}"
                        style='max-width:20%' />
                @else
                    <img class="img-preview" style='max-width:20%' />
                @endif
                <input class="form-control @error('image') is-invalid @enderror" type="file" id="image"
                    name="image" onchange="previewImage()" style="min-height: 45px;padding: 10px 15px;">
                @error('image')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <button type="submit" class="btn btn-primary">Update Item</button>
        </form>
    </div>
@endsection

@section('scripts')
    <script>
        function previewImage() {
            const image = document.querySelector('#image');
            const imgPreview = document.querySelector('.img-preview');
            imgPreview.style.display = 'block';
            const oFReader = new FileReader();
            oFReader.readAsDataURL(image.files[0]);
            oFReader.onload = function(oFREvent) {
                imgPreview.src = oFREvent.target.result;
            }
        }
    </script>
@endsection
