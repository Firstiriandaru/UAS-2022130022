@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header text-center fw-bold">{{ __('Welcome to Cinema Future - Sit Back, Relax, and Enjoy the Show!') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{-- {{ __('You are logged in!') }} --}}

                    <div class="row mt-4">
                        @foreach ($films as $film)
                            <div class="col-md-4 mb-4">
                                <a href="{{ route('home.show', $film->film_id) }}" class="text-decoration-none">
                                    <div class="card">
                                        <div class="card-header">
                                            <h5 class="card-title fw-bold text-center">{{ $film->judulfilm }}</h5>
                                        </div>
                                        <div class="card-body">
                                            @if ($film->image_url)
                                                <img src="{{ $film->image_url }}" class="card-img-top" alt="Film image">
                                            @else
                                                <img src="https://via.placeholder.com/150" class="card-img-top" alt="No Image Available">
                                            @endif

                                            {{-- <p><strong>Tanggal Selesai:</strong> {{ \Carbon\Carbon::parse($film->tanggal_selesai)->format('d M Y') }}</p> --}}
                                            <p><strong>Genre:</strong> {{ $film->genre }}</p>
                                            <p><strong>Duration:</strong> {{ $film->durasi }} minutes</p>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        @endforeach
                    </div>
                    <div class="d-flex justify-content-center">
                        {{ $films->links() }}
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
