<?php

namespace App\Http\Controllers\Admin\Settings;

use App\Models\City;
use App\Models\Region;
use App\Models\Country;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreCityRequest;
use App\Http\Requests\UpdateCityRequest;
use Yajra\DataTables\DataTables;

class CityController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $regions = Region::orderBy("name", "ASC")->get();
        $countries = Country::orderBy("name", "ASC")->get();
        $cities = City::orderBy("zipcode", "ASC")->paginate(10);
        if ($request->ajax()) {
            return DataTables::of($cities)
                ->addColumn('country', function ($city) {
                    return $city->country ? $city->country->name : '';
                })
                ->addColumn('region', function ($city) {
                    return $city->region ? $city->region->name : '';
                })
                ->addColumn('total_people', function ($city) {
                    return $city->users->count();
                })
                ->addColumn('actions', function ($city) {
                    return view('content.settings.cities.includes.actions', compact('city'))->render();
                })
                ->rawColumns(['actions'])
                ->make(true);
        }

        return view("content.settings.cities.index", compact("regions", "countries","cities"));
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreCityRequest $request)
    {
        //  dd($request->all());
        $validated = $request->validated();

        $cities = $validated['cities'];
        unset($validated['cities']);

        foreach ($cities as $city)
            City::create(array_merge($validated, ['zipcode' => $city['zipcode'], 'name' => $city['name']]));


        return back()->with("success", "City successfully added.");
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateCityRequest $request, $id)
    {
        $validated = $request->validated();
        $city = City::find($request->id);
        $city->fill($validated);
        $city->save();
        return back()->with("success", "City successfully updated.");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $city = City::find($id);

        $city->delete();

        return back()->with("success", "City successfully deleted.");
    }
}
