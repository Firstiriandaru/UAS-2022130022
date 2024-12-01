@extends('layouts.app')

@section('content')
<script>
   document.addEventListener('DOMContentLoaded', function() {
    const jadwals = @json($jadwals);

    document.querySelectorAll('.date-btn').forEach(button => {
        button.addEventListener('click', function() {
            document.querySelectorAll('.date-btn').forEach(btn => btn.classList.remove('active'));
            this.classList.add('active');

            const selectedDate = this.getAttribute('data-date');
            const jadwalContainer = document.getElementById('jadwalContainer');
            jadwalContainer.innerHTML = '<h5>Schedule for Selected Date</h5>';

            const schedulesForDate = jadwals.filter(jadwal => jadwal.tanggal_penayangan === selectedDate);

            if (schedulesForDate.length > 0) {
                const scheduleList = document.createElement('ul');
                scheduleList.classList.add('list-group');

                schedulesForDate.forEach(function(jadwal) {
                    const listItem = document.createElement('li');
                    listItem.classList.add('list-group-item', 'cursor-pointer');

                    const startTime = jadwal.waktu_mulai.slice(0, 5);
                    const endTime = jadwal.waktu_selesai.slice(0, 5);
                    console.log(jadwal);
                    listItem.innerHTML = `
                        <strong>Studio:</strong> ${jadwal.studio.studio_name} (Capacity: ${jadwal.studio.kapasitas})<br>
                        <strong>Time:</strong> ${startTime} - ${endTime} <br>
                        <form action="{{ route('home.store') }}" method="POST">
                            @csrf
                            <input type="hidden" name="schedule_id" value="${jadwal.jadwal_id}">
                            <input type="hidden" name="selected_date" value="${selectedDate}">
                            <button type="submit" class="btn btn-primary mt-2 buy-ticket-btn">Buy Ticket</button>
                        </form>
                    `;

                    listItem.addEventListener('click', function() {
                        document.querySelectorAll('.list-group-item').forEach(item => item.classList.remove('active'));
                        this.classList.add('active');
                    });

                    scheduleList.appendChild(listItem);
                });

                jadwalContainer.appendChild(scheduleList);
            } else {
                const noScheduleItem = document.createElement('p');
                noScheduleItem.classList.add('text-muted');
                noScheduleItem.innerText = 'No schedule available for this date.';
                jadwalContainer.appendChild(noScheduleItem);
            }
        });
    });
});


   </script>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Film Detail') }}</div>

                <div class="card-body">
                    @if (isset($jadwals[0]) && $jadwals[0]->film)
                    <h5 class="card-title">{{ $jadwals[0]->film->judulfilm }}</h5>
                    <p><strong>Genre:</strong> {{ $jadwals[0]->film->genre }}</p>
                    <p><strong>Duration:</strong> {{ $jadwals[0]->film->durasi }} minutes</p>
                    <p><strong>Rating:</strong> {{ $jadwals[0]->film->rating }}</p>
                    <p><strong>Tanggal Rilis:</strong> {{ \Carbon\Carbon::parse($jadwals[0]->film->tanggal_rilis)->format('d M Y') }}</p>
                    <p><strong>Tanggal Selesai:</strong> {{ \Carbon\Carbon::parse($jadwals[0]->film->tanggal_selesai)->format('d M Y') }}</p>

                    @if ($jadwals[0]->film->image_url)
                        <img src="{{ $jadwals[0]->film->image_url }}" class="img-fluid" alt="Film image">
                    @else
                        <img src="https://via.placeholder.com/150" class="img-fluid" alt="No Image Available">
                    @endif
                    @endif
                    <div class="mt-4">
                        <h5>Available Dates</h5>
                        <div class="d-flex flex-row overflow-auto">
                            @foreach ($jadwals as $idx => $schedules)
                                <button class="btn btn-outline-success mx-1 date-btn" data-date="{{ $schedules->tanggal_penayangan }}">


                                    {{ \Carbon\Carbon::parse($schedules->tanggal_penayangan)->format('d M Y') }} - {{$schedules->studio->studio_name }}
                                </button>
                            @endforeach
                        </div>
                    </div>

                    <div id="jadwalContainer" class="mt-4">
                        <h5>Schedule for Selected Date</h5>
                        <ul class="list-group" id="scheduleList"></ul>
                    </div>

                    <div class="mt-4">
                        <a href="{{ route('home.index') }}" class="btn btn-secondary">Back to Home</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
