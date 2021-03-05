<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;
use App\Models\Apartment;
use App\Models\City;
use App\Models\ApartmentType;
use App\Models\Amenity;
use App\Models\PaymentOption;
use App\Models\ApartmentPhoto;
use Illuminate\Support\Facades\Storage;

class ApartmentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $apartments = Apartment::with(['city', 'photos'])->latest()->paginate(9);

        return Inertia::render('Apartments', ['apartments' => $apartments]);
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
        $apartmentTypes = ApartmentType::all();
        $amenities = Amenity::all();
        $paymentOptions = PaymentOption::all();

        return Inertia::render('ApartmentForm', ['cities' => $cities, 'apartmentTypes' => $apartmentTypes, 'amenities' => $amenities, 'paymentOptions' => $paymentOptions]);
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
        $validatedData = $request->validate([
            'title' => 'required|string|max:70',
            'description' => 'required|string|max:4096',
            'photos' => 'nullable|array|max:6',
            'address' => 'required|string|max:255',
            'city_id' => 'required|exists:cities,id',
            'apartment_type_id' => 'required|exists:apartment_types,id',
            'for_sale' => 'required|boolean',
            'price' => 'required|regex:/^\d+(\.\d{1,2})?$/',
            'amenities' => 'nullable|array',
            'payment_option_id' => 'nullable|exists:payment_options,id',
            'area' => 'required|numeric|gt:0|max:65535',
            'level' => 'required|integer|numeric|max:255',
            'bedrooms' => 'required|integer|numeric|max:255',
            'bathrooms' => 'required|integer|numeric|max:255',
            'is_furnished' => 'nullable|boolean',
        ]);
        

        $validatedData['user_id'] = $request->user()->id;
        unset($validatedData['photos'], $validatedData['amenities']);
        
        $apartment = Apartment::create($validatedData);
        
        // Store apartment photos if exist
        if($request->photos != null) {
            foreach($request->photos as $photo){
                $photoPath = Storage::putFile('photos', $photo);
                ApartmentPhoto::create(['apartment_id' => $apartment->id, 'photo_path' => $photoPath]);
            }
        }

        // Store apartment amenities if exist
        if($request->amenities != null) {
            $apartment->amenities()->attach($request->amenities);
        }

        return redirect(route('apartments.index'));

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

        $apartment = Apartment::with(['user.city.governorate', 'photos', 'type', 'paymentOption', 'city.governorate', 'amenities'])->find($id);

        return Inertia::render('ApartmentDetail', ['apartment' => $apartment]);
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
