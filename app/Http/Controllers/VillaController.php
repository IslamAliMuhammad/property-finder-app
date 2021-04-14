<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;
use App\Models\Villa;
use App\Models\City;
use App\Models\VillaType;
use App\Models\Amenity;
use App\Models\PaymentOption;
use App\Models\VillaPhoto;
use Illuminate\Support\Facades\Storage;

class VillaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $villas = Villa::with(['city', 'photos'])->latest()->paginate(9);
        return Inertia::render('Ads', ['ads' => $villas]);
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
        $villaTypes = VillaType::all();
        $amenities = Amenity::all();
        $paymentOptions = PaymentOption::all();

        return Inertia::render('AdForm', ['cities' => $cities, 'propertyTypes' => $villaTypes, 'amenities' => $amenities, 'paymentOptions' => $paymentOptions]);
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
            'amenities' => 'nullable|array',
            'payment_option_id' => 'nullable|exists:payment_options,id',
            'area' => 'required|numeric|gt:0|max:65535',
            'bedrooms' => 'required|integer|numeric|max:255',
            'bathrooms' => 'required|integer|numeric|max:255',
            'is_furnished' => 'nullable|boolean',
        ]);
        
        // Prepare data for mass assignment
        $validatedData['user_id'] = $request->user()->id;
        unset($validatedData['photos'], $validatedData['amenities'], $validatedData['property_type_id']);
        $validatedData['villa_type_id'] = $request->property_type_id;
        
        // Mass assignment
        $villa = Villa::create($validatedData);
        
        // Store apartment photos if exist
        if($request->photos != null) {
            foreach($request->photos as $photo){
                $photoPath = Storage::putFile('photos', $photo);
                villaPhoto::create(['villa_id' => $villa->id, 'photo_path' => $photoPath]);
            }
        }

        // Store apartment amenities if exist
        if($request->amenities != null) {
            $villa->amenities()->attach($request->amenities);
        }

        return redirect(route('villas.index'));

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
        $villa = Villa::with(['user.city.governorate', 'photos', 'type', 'paymentOption', 'city.governorate', 'amenities'])->find($id);
        return Inertia::render('AdDetail', ['ad' => $villa, 'adCategory' => 'villa']);
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
        $villaTypes = VillaType::all();
        $amenities = Amenity::all();
        $paymentOptions = PaymentOption::all();

        $villa = Villa::with(['photos', 'amenities'])->find($id);
        
        return Inertia::render('AdForm', ['cities' => $cities, 'propertyTypes' => $villaTypes, 'amenities' => $amenities, 'paymentOptions' => $paymentOptions, 'ad' => $villa]);
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
            'amenities' => 'nullable|array',
            'payment_option_id' => 'nullable|exists:payment_options,id',
            'area' => 'required|numeric|gt:0|max:65535',
            'bedrooms' => 'required|integer|numeric|max:255',
            'bathrooms' => 'required|integer|numeric|max:255',
            'is_furnished' => 'nullable|boolean',
        ]);

         // Prepare data for mass update
         $validatedData['user_id'] = $request->user()->id;
         unset($validatedData['photos'], $validatedData['amenities'], $validatedData['property_type_id']);
         $validatedData['villa_type_id'] = $request->property_type_id;

        $villa = Villa::find($id);
        // Mass update
        $villa->update($validatedData);


        // Store apartment photos if exist
        if($request->photos != null) {

            $villaPhotos = villaPhoto::where('villa_id', $villa->id)->get();

            Storage::delete($villaPhotos->pluck('photo_path')->toArray()); 
            villaPhoto::destroy($villaPhotos->pluck('id'));

            foreach($request->photos as $photo){
                $photoPath = Storage::putFile('photos', $photo);
                villaPhoto::create(['villa_id' => $villa->id, 'photo_path' => $photoPath]);
            }
        }

        // Store apartment amenities if exist
        if($request->amenities != null) {
            $villa->amenities()->detach();
            $villa->amenities()->attach($request->amenities);
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
        Villa::destroy($id);

        return redirect(route('ads.index'));
    }
}
