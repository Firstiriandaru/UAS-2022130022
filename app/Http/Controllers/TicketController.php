<?php

namespace App\Http\Controllers;

use App\Models\TransactionHeader;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TicketController extends Controller
{
    public function index()
    {
        $allTickets = TransactionHeader::where('user_id', Auth::user()->id)
                        ->with(['details.jadwal.film', 'details.jadwal.studio'])
                        ->get();
        return view('tickets.index', compact('allTickets'));
    }
        public function store(Request $request)
        {

        }

        /**
         * Display the specified resource.
         */
        public function show(string $id)
        {
            //
        }

        /**
         * Update the specified resource in storage.
         */
        public function update(Request $request, string $id)
        {
            //
        }

        /**
         * Remove the specified resource from storage.
         */
        public function destroy(string $id)
        {
            //
        }
}
