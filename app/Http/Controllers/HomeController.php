<?php

namespace App\Http\Controllers;

use App\Models\Film;
use App\Models\Jadwal;
use App\Models\TransactionDetail;
use App\Models\TransactionHeader;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $films = Film::where('tanggal_selesai', '>=', now())->paginate(15);

        return view('home', compact('films'));
    }

    public function show($id)
    {
        // Find film by ID and load its schedules with studio information
        $jadwals = Jadwal::with(['film', 'studio'])
            ->where('film_id', $id) // Filter by film ID
            ->get();

        // dd($jadwals[0]->film->judulfilm);
        return view('detail', compact('jadwals'));
    }
    public function store(Request $request)
    {
        $scheduleId = $request->input('schedule_id');
        $transaction = new TransactionHeader();
        $transaction->user_id = Auth::user()->id;
        $transaction->save();
        // dd($transaction);
        $transactionDetail = new TransactionDetail();
        $transactionDetail->jadwal_id = $scheduleId;
        $transactionDetail->quantity =1;
        $transactionDetail->TransactionHeaderId=$transaction->id;
        $transactionDetail->save();

        // $films = Film::where('tanggal_selesai', '>=', now())->get();
        $films = Film::where('tanggal_selesai', '>=', now())->paginate(15);

        return view('home', compact('films'));
    }
}
