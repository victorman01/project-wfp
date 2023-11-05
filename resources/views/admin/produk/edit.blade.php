@extends('layouts.admin.main')

@section('content')
    <div class="container">
        <h2>Edit Produk</h2>
        <form method="post" action="/admin/produks/{{ $produk->id }}" enctype="multipart/form-data">
            @csrf
            @method('put')
            <div class="form-group">
                <label for="nama">Nama Produk</label>
                <input type="text" class="form-control" id="nama" name="nama" value="{{ $produk->nama }}" required>
            </div>
            <div class="form-group">
                <label for="spesifikasi">Spesifikasi Produk</label>
                <input type="text" class="form-control" id="spesifikasi" name="spesifikasi"
                    value="{{ $produk->spesifikasi }}" required>
            </div>
            <div class="form-group">
                <label for="informasi">Informasi Produk</label>
                <textarea class="form-control" id="informasi" name="informasi" rows="3" required>{{ $produk->informasi }}</textarea>
            </div>
            <div class="form-group">
                <label for="harga">Harga Produk Rp.</label>
                <input type="number" class="form-control" id="harga" name="harga" value="{{ $produk->harga }}"
                    required>
            </div>
            <div class="form-group">
                <label for="stok">Stok Produk</label>
                <input type="number" class="form-control" id="stok" name="stok" value="{{ $produk->stok }}"
                    required>
            </div>
            <div class="form-group">
                <label for="brand_id">Brand Produk</label>
                <select name="brand_id" class="form-control">
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
                    name="image" onchange="previewImage()">
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
