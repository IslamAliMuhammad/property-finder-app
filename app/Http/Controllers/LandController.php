<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Land;
use Inertia\Inertia;
use App\Models\City;
use App\Models\LandType;
use App\Models\PaymentOption;

class LandController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
{
        //
        $lands = Land::with(['photos', 'city'])->latest()->paginate(9);

        return Inertia::render('Ads', ['ads' => $lands]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $cities = City::all();
        $landTypes = LandType::all();
        $paymentOptions = PaymentOption::all();

        return Inertia::render('AdForm', ['cities' => $cities, 'propertyTypes' => $landTypes, 'paymentOptions' => $paymentOptions]);
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
        $land = Land::with(['user.city.governorate', 'photos', 'type', 'paymentOption', 'city.governorate'])->find($id);

        return Inertia::render('AdDetail', ['ad' => $land, 'adCategory' => 'land']);
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
