<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Land;
use Inertia\Inertia;
use App\Models\City;
use App\Models\LandType;
use App\Models\PaymentOption;
use Illuminate\Support\Facades\Storage;
use App\Models\LandPhoto;

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
        $validatedData = $request->validate([
            'title' => 'required|string|max:70',
            'description' => 'required|string|max:4096',
            'photos' => 'nullable|array|max:6',
            'address' => 'required|string|max:255',
            'city_id' => 'required|exists:cities,id',
            'property_type_id' => 'required|exists:apartment_types,id',
            'for_sale' => 'required|boolean',
            'price' => 'required|regex:/^\d+(\.\d{1,2})?$/',
            'payment_option_id' => 'nullable|exists:payment_options,id',
            'area' => 'required|numeric|gt:0|max:65535',
        ]);

         // Prepare data for mass assignment
         $validatedData['user_id'] = $request->user()->id;
         unset($validatedData['photos'], $validatedData['property_type_id']);
         $validatedData['land_type_id'] = $request->property_type_id;

         // Mass assignment
        $land = Land::create($validatedData);

        // Store apartment photos if exist
        if($request->photos != null) {
            foreach($request->photos as $photo){
                $photoPath = Storage::putFile('photos', $photo);
                LandPhoto::create(['land_id' => $land->id, 'photo_path' => $photoPath]);
            }
        }

        return redirect(route('lands.index'));
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
        $cities = City::all();
        $lamdTypes = LandType::all();
        $paymentOptions = PaymentOption::all();

        $land = Land::with(['photos'])->find($id);
        
        return Inertia::render('AdForm', ['cities' => $cities, 'propertyTypes' => $lamdTypes, 'paymentOptions' => $paymentOptions, 'ad' => $land]);
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
        $validatedData = $request->validate([
            'title' => 'required|string|max:70',
            'description' => 'required|string|max:4096',
            'photos' => 'nullable|array|max:6',
            'address' => 'required|string|max:255',
            'city_id' => 'required|exists:cities,id',
            'property_type_id' => 'required|exists:apartment_types,id',
            'for_sale' => 'required|boolean',
            'price' => 'required|regex:/^\d+(\.\d{1,2})?$/',
            'payment_option_id' => 'nullable|exists:payment_options,id',
            'area' => 'required|numeric|gt:0|max:65535',
        ]);

        // Prepare data for mass assignment
        $validatedData['user_id'] = $request->user()->id;
        unset($validatedData['photos'], $validatedData['property_type_id']);
        $validatedData['land_type_id'] = $request->property_type_id;

        $land = Land::find($id);
        // Mass update
        $land->update($validatedData);

         // Store apartment photos if exist
         if($request->photos != null) {

            $landPhotos = LandPhoto::where('land_id', $land->id)->get();

            Storage::delete($landPhotos->pluck('photo_path')->toArray()); 
            LandPhoto::destroy($landPhotos->pluck('id'));

            foreach($request->photos as $photo){
                $photoPath = Storage::putFile('photos', $photo);
                LandPhoto::create(['land_id' => $land->id, 'photo_path' => $photoPath]);
            }
        }

        return redirect(route('ads.index'));

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
        Land::destroy($id);

        return redirect(route('ads.index'));
    }
}
