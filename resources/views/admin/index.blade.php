@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <h2 class="mb-4">Transaction Report</h2>

    @if($transactions->isEmpty())
        <p>No transactions found.</p>
    @else
        <table class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>Transaction ID</th>
                    <th>Film Title</th>
                    <th>Studio</th>
                    <th>Schedule Date</th>
                    <th>Quantity</th>
                    <th>Transaction Date</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($transactions as $transaction)
                    @foreach ($transaction->details as $detail)
                        <tr>
                            <td>{{ $transaction->id }}</td>
                            <td>{{ $detail->jadwal->film->judulfilm ?? 'N/A' }}</td>
                            <td>{{ $detail->jadwal->studio->studio_name ?? 'N/A' }}</td>
                            <td>{{ \Carbon\Carbon::parse($detail->jadwal->tanggal_penayangan)->format('d M Y') }}</td>
                            <td>{{ $detail->quantity }}</td>
                            <td>{{ \Carbon\Carbon::parse($transaction->transaction_date)->format('d M Y') }}</td>
                        </tr>
                    @endforeach
                @endforeach
            </tbody>
        </table>
        <div class="d-flex justify-content-center">
            {{ $transactions->links() }}
        </div>
    @endif
</div>
@endsection
