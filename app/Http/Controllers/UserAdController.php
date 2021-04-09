<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Apartment;
use App\Models\Villa;
use App\Models\Land;
use Illuminate\Support\Facades\Auth;
use Inertia\Inertia;

class UserAdController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $apartments = Apartment::with(['city', 'photos'])->where('user_id', Auth::id())->latest()->paginate(3, ['*'], 'apartmentsPage');
        $villas = Villa::with(['city', 'photos'])->where('user_id', Auth::id())->latest()->paginate(3, ['*'], 'villasPage');
        $lands = Land::with(['city', 'photos'])->where('user_id', Auth::id())->latest()->paginate(3, ['*'], 'landsPage');

        $apartments->appends(['villasPage' => $villas->currentPage()]);
        $apartments->appends(['landsPage' => $lands->currentPage()]);

        $villas->appends(['apartmentsPage' => $apartments->currentPage()]);
        $villas->appends(['landsPage' => $lands->currentPage()]);

        $lands->appends(['apartmentsPage' => $apartments->currentPage()]);
        $lands->appends(['villasPage' => $villas->currentPage()]);

        return Inertia::render('UserAds', [ 'apartments' => $apartments, 'villas' => $villas, 'lands' => $lands ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
