<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\StoreCountryRequest;
use App\Http\Requests\UpdateCountryRequest;
use App\Models\Region;
use App\Models\City;
use App\Models\User;
use App\Models\Country;

class CountryController extends Controller
{
    public function province(){
        $provinces = Country::where('name', 'Kurdistan')->first()->regions;

        for($i=0; $i<sizeof($provinces); $i++){
            $provinces[$i]->cities = $provinces[$i]->cities;

            foreach ($provinces[$i]->cities as $item) {
                $item->user_count = User::where('province_city', $item->name)->count() ?? '';
            }
        }

        return response()->json(['success' => true, "data" => $provinces]);
    }

    // public function city($provinceId){

    //     $city = City::where('region_id'  , $provinceId)->get();
    //     if(isset($city)){
    //         return response()->json(['success' => true, "data" =>$city]);
    //     }else{
    //         return response()->json(['error'=>false , "data" => "No City Available for that Province"]);
    //     }
    // }
    public function store(StoreCountryRequest $request)
    {
        $validated = $request->validated();
    
        try {
            $country = Country::create($validated);
    
            return response()->json([
                'success' => true,
                'message' => 'Country successfully added.',
                
            ], 201);
    
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Failed to add country.',
                'error' => $e->getMessage()
            ], 500);
        }
    }
    
    public function update(UpdateCountryRequest $request, $id)
    {
        $validated = $request->validated();

        $country = Country::find($id);
        $country->fill($validated);
        $country->save();

        return response()->json('Country Updated successfully');
    }

}
