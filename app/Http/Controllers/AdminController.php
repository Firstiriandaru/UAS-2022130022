<?php

namespace App\Http\Controllers;

use App\Models\TransactionHeader;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
        /**
     *
     * @return void
     */
   public function __construct()
   {
       $this->middleware(['auth']);
   }
    public function index()
    {
        if(Auth::user()->role==='user'){
            return redirect('/home')->with("Kesalahan", "Anda tidak memiliki akses ke halaman ini");
        }
        $transactions = TransactionHeader::with('details.jadwal.film', 'details.jadwal.studio')->paginate(20);
        return view('admin.index', compact('transactions'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
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
