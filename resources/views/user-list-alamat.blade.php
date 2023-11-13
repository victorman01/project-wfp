@extends('layouts.home')

@section('content')
    @isset($alamat)
        @foreach($alamat as $a)
            @if($a->status_hapus == 0)
                <div class="card" style="width: 18rem;">
                    <div class="card-body">
                        <h5 class="card-title">{{ $a->nama }}</h5>
                        <p class="card-text">Alamat: {{ $a->alamat }}</p>
                        <p class="card-text">Nomor HP: {{ $a->nomor_handphone }}</p>
                        <a href="{{ route('alamatPengiriman.edit', $a) }}" class="btn btn-primary">Edit</a>
                        <br><br>
                        <form action="{{ route('alamatPengiriman.destroy', $a) }}" method="POST">
                            @csrf
                            @method('delete')
                            <button type="submit" class="btn btn-primary">Delete</button>
                        </form>
                    </div>
                </div>
            @endif
        @endforeach
    @else
        <p>Kamu belum memiliki alamat apapun</p>
    @endisset

    @if(session()->has('msg'))
        <div>
            <p>{{ session('msg') }}</p>
        </div>
    @endif
@endsection
