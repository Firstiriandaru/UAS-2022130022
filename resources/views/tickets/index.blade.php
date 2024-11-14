@extends('layouts.app')

@section('content')

<div class="container mt-4">
    <h2 class="mb-4">My Tickets</h2>

    <div class="row">
        @forelse ($allTickets as $ticket)
            @foreach ($ticket->details as $detail)
                <div class="col-md-4 mb-4">
                    <div class="card h-100 shadow-sm">
                        @if($detail->jadwal->film->image_url)
                            <img src="{{ $detail->jadwal->film->image_url }}" class="card-img-top" alt="Film Image">
                        @else
                            <img src="https://via.placeholder.com/150" class="card-img-top" alt="No Image Available">
                        @endif
                        <div class="card-body">
                            <h5 class="card-title">{{ $detail->jadwal->film->judulfilm ?? 'Film Title N/A' }}</h5>
                            <p class="card-text">
                                <strong>Studio:</strong> {{ $detail->jadwal->studio->studio_name ?? 'Studio N/A' }}<br>
                                <strong>Schedule Date:</strong> {{ \Carbon\Carbon::parse($detail->jadwal->tanggal_penayangan)->format('d M Y') }}<br>
                                <strong>Quantity:</strong> {{ $detail->quantity }}
                            </p>
                        </div>
                        <div class="card-footer">
                            <small class="text-muted">Transaction ID: {{ $ticket->id }}</small>
                        </div>
                    </div>
                </div>
            @endforeach
        @empty
            <p class="text-center">No tickets found.</p>
        @endforelse
    </div>
</div>

@endsection
