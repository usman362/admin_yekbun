<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Helpers\Helpers;
use App\Models\SpecialCards;
use App\Models\BusinessCard;
use App\Models\FoodDrink;
use App\Models\FoodAds;
use App\Models\SpecialsAds;
use App\Models\ServiceAds;
use App\Models\BusinessAds;
use App\Models\ServiceCard;

use Illuminate\Support\Facades\Log;

class AdvertismentController extends Controller
{
    public function specialcards()
    {
        $cards=SpecialCards::get();
    
        return view('content.advertisement.specialcard',compact('cards'));
    }

    public function destroycard(SpecialCards $card)
{
    try {
        Log::info('Attempting to delete card with ID: ' . $card->_id);
        $card->delete();
        Log::info('Successfully deleted card with ID: ' . $card->_id);
        return redirect()->route('list.adver.cards')->with('success', 'Special Card has been deleted!');
    } catch (\Exception $e) {
        Log::error('Error deleting Card: ' . $e->getMessage());
        return redirect()->route('list.adver.cards')->with('error', 'Something went wrong!');
    }
}
    public function Cardstore(Request $request)
    {
       // dd($request->all());
        // Validate the request
       $data= $request->validate([
            'card_name' => 'required',
            'card_image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);
   // dd($data);
        // Create a new instance of SpecialCards
        $model = new SpecialCards();
    
        // Assign the name
        $model->card_name = $request->card_name;
   // dd(  $model);
        // Handle the image upload
        if ($request->hasFile('card_image')) {
            // Use the fileUpload helper to store the image and get the path
            $imgPath = Helpers::fileUpload($request->card_image, "images/card_image");
   // dd($imgPath);
            // Save the path to the model
            $model->card_image = $imgPath;
        }
   // dd('helo');
        // Save the model to the database
        if ($model->save()) {
 
            return redirect()->route('list.adver.cards')->with('success', 'Specials Card has been inserted');
        } else {
            return redirect()->route('list.adver.cards')->with('error', 'Specials to add Reels Card');
        }
    }

    public function businesscards()
    {
        $cards=BusinessCard::get();
    
        return view('content.advertisement.businesscard',compact('cards'));
    }

    public function destroybusinesscards(BusinessCard $card)
{
    try {
        Log::info('Attempting to delete card with ID: ' . $card->_id);
        $card->delete();
        Log::info('Successfully deleted card with ID: ' . $card->_id);
        return redirect()->route('list.business.cards')->with('success', 'Business Card has been deleted!');
    } catch (\Exception $e) {
        Log::error('Error deleting Card: ' . $e->getMessage());
        return redirect()->route('list.business.cards')->with('error', 'Something went wrong!');
    }
}
    public function businesscardsstore(Request $request)
    {
       // dd($request->all());
        // Validate the request
       $data= $request->validate([
            'card_name' => 'required',
            'card_image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);
   // dd($data);
        // Create a new instance of BusinessCard
        $model = new BusinessCard();
    
        // Assign the name
        $model->card_name = $request->card_name;
   // dd(  $model);
        // Handle the image upload
        if ($request->hasFile('card_image')) {
            // Use the fileUpload helper to store the image and get the path
            $imgPath = Helpers::fileUpload($request->card_image, "images/card_image");
   // dd($imgPath);
            // Save the path to the model
            $model->card_image = $imgPath;
        }
   // dd('helo');
        // Save the model to the database
        if ($model->save()) {
 
            return redirect()->route('list.business.cards')->with('success', 'Business Card has been inserted');
        } else {
            return redirect()->route('list.business.cards')->with('error', 'Business to add  Card');
        }
    }

    public function Servicecards()
    {
        $cards=ServiceCard::get();
    
        return view('content.advertisement.servicecard',compact('cards'));
    }

    public function destroyServicecards(ServiceCard $card)
{
    try {
        Log::info('Attempting to delete card with ID: ' . $card->_id);
        $card->delete();
        Log::info('Successfully deleted card with ID: ' . $card->_id);
        return redirect()->route('list.Service.cards')->with('success', 'Service Card has been deleted!');
    } catch (\Exception $e) {
        Log::error('Error deleting Card: ' . $e->getMessage());
        return redirect()->route('list.Service.cards')->with('error', 'Something went wrong!');
    }
}
    public function Servicecardsstore(Request $request)
    {
       // dd($request->all());
        // Validate the request
       $data= $request->validate([
            'card_name' => 'required',
            'card_image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);
   // dd($data);
        // Create a new instance of BusinessCard
        $model = new ServiceCard();
    
        // Assign the name
        $model->card_name = $request->card_name;
   // dd(  $model);
        // Handle the image upload
        if ($request->hasFile('card_image')) {
            // Use the fileUpload helper to store the image and get the path
            $imgPath = Helpers::fileUpload($request->card_image, "images/card_image");
   // dd($imgPath);
            // Save the path to the model
            $model->card_image = $imgPath;
        }
   // dd('helo');
        // Save the model to the database
        if ($model->save()) {
 
            return redirect()->route('list.Service.cards')->with('success', 'Service Card has been inserted');
        } else {
            return redirect()->route('list.Service.cards')->with('error', 'Service not add');
        }
    }
    
   
    public function FoodDrinkcards()
    {
        $cards=FoodDrink::get();
    
        return view('content.advertisement.foodcard',compact('cards'));
    }

    public function destroyFoodDrinkcards(FoodDrink $card)
{
    try {
        Log::info('Attempting to delete card with ID: ' . $card->_id);
        $card->delete();
        Log::info('Successfully deleted card with ID: ' . $card->_id);
        return redirect()->route('list.food.cards')->with('success', 'Food Card has been deleted!');
    } catch (\Exception $e) {
        Log::error('Error deleting Card: ' . $e->getMessage());
        return redirect()->route('list.food.cards')->with('error', 'Something went wrong!');
    }
}
    public function FoodDrinkcardsstore(Request $request)
    {
       // dd($request->all());
        // Validate the request
       $data= $request->validate([
            'card_name' => 'required',
            'card_image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);
   // dd($data);
        // Create a new instance of BusinessCard
        $model = new FoodDrink();
    
        // Assign the name
        $model->card_name = $request->card_name;
   // dd(  $model);
        // Handle the image upload
        if ($request->hasFile('card_image')) {
            // Use the fileUpload helper to store the image and get the path
            $imgPath = Helpers::fileUpload($request->card_image, "images/card_image");
   // dd($imgPath);
            // Save the path to the model
            $model->card_image = $imgPath;
        }
   // dd('helo');
        // Save the model to the database
        if ($model->save()) {
 
            return redirect()->route('list.food.cards')->with('success', 'Food Card has been inserted');
        } else {
            return redirect()->route('list.food.cards')->with('error', 'Food Card not add');
        }
    }

    public function specialads()
    {
        $cards=SpecialsAds::get();
    
        return view('content.advertisement.ads.specialcard',compact('cards'));
    }

    public function destroyads(SpecialsAds $card)
{
    try {
        Log::info('Attempting to delete card with ID: ' . $card->_id);
        $card->delete();
        Log::info('Successfully deleted card with ID: ' . $card->_id);
        return redirect()->route('specialads.list')->with('success', 'Specials Card ads has been deleted!');
    } catch (\Exception $e) {
        Log::error('Error deleting Card: ' . $e->getMessage());
        return redirect()->route('specialads.list')->with('error', 'Something went wrong!');
    }
}
    public function adsstore(Request $request)
    {
       // dd($request->all());
        // Validate the request
       $data= $request->validate([
            'card_name' => 'required',
            'card_image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);
   // dd($data);
        // Create a new instance of BusinessCard
        $model = new SpecialsAds();
    
        // Assign the name
        $model->card_name = $request->card_name;
   // dd(  $model);
        // Handle the image upload
        if ($request->hasFile('card_image')) {
            // Use the fileUpload helper to store the image and get the path
            $imgPath = Helpers::fileUpload($request->card_image, "images/card_image");
   // dd($imgPath);
            // Save the path to the model
            $model->card_image = $imgPath;
        }
   // dd('helo');
        // Save the model to the database
        if ($model->save()) {
 
            return redirect()->route('specialads.list')->with('success', 'Spacial Card ads has been inserted');
        } else {
            return redirect()->route('specialads.list')->with('error', 'Card ads not add');
        }
    }

    public function businessads()
    {
        $cards=BusinessAds::get();
    
        return view('content.advertisement.ads.businesscard',compact('cards'));
    }

    public function destroybusinessads(BusinessAds $card)
{
    try {
        Log::info('Attempting to delete card with ID: ' . $card->_id);
        $card->delete();
        Log::info('Successfully deleted card with ID: ' . $card->_id);
        return redirect()->route('list.business.cards')->with('success', 'Business Card ads has been deleted!');
    } catch (\Exception $e) {
        Log::error('Error deleting Card: ' . $e->getMessage());
        return redirect()->route('list.business.cards')->with('error', 'Something went wrong!');
    }
}
    public function businessadssstore(Request $request)
    {
       // dd($request->all());
        // Validate the request
       $data= $request->validate([
            'card_name' => 'required',
            'card_image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);
   // dd($data);
        // Create a new instance of BusinessCard
        $model = new BusinessAds();
    
        // Assign the name
        $model->card_name = $request->card_name;
   // dd(  $model);
        // Handle the image upload
        if ($request->hasFile('card_image')) {
            // Use the fileUpload helper to store the image and get the path
            $imgPath = Helpers::fileUpload($request->card_image, "images/card_image");
   // dd($imgPath);
            // Save the path to the model
            $model->card_image = $imgPath;
        }
   // dd('helo');
        // Save the model to the database
        if ($model->save()) {
 
            return redirect()->route('list.business.cards')->with('success', 'Business Card ads has been inserted');
        } else {
            return redirect()->route('list.business.cards')->with('error', 'Card ads not add');
        }
    }
    public function Servicecardsads()
    {
        $cards=ServiceAds::get();
    
        return view('content.advertisement.ads.servicecard',compact('cards'));
    }

    public function destroyServicecardsads(ServiceAds $card)
{
    try {
        Log::info('Attempting to delete card with ID: ' . $card->_id);
        $card->delete();
        Log::info('Successfully deleted card with ID: ' . $card->_id);
        return redirect()->route('list.Service.ads')->with('success', 'Serives Card ads has been deleted!');
    } catch (\Exception $e) {
        Log::error('Error deleting Card: ' . $e->getMessage());
        return redirect()->route('list.Service.ads')->with('error', 'Something went wrong!');
    }
}
    public function Serviceadssstore(Request $request)
    {
       // dd($request->all());
        // Validate the request
       $data= $request->validate([
            'card_name' => 'required',
            'card_image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);
   // dd($data);
        // Create a new instance of BusinessCard
        $model = new ServiceAds();
    
        // Assign the name
        $model->card_name = $request->card_name;
   // dd(  $model);
        // Handle the image upload
        if ($request->hasFile('card_image')) {
            // Use the fileUpload helper to store the image and get the path
            $imgPath = Helpers::fileUpload($request->card_image, "images/card_image");
   // dd($imgPath);
            // Save the path to the model
            $model->card_image = $imgPath;
        }
   // dd('helo');
        // Save the model to the database
        if ($model->save()) {
 
            return redirect()->route('list.Service.ads')->with('success', 'Serives Card ads has been inserted');
        } else {
            return redirect()->route('list.Service.ads')->with('error', 'Card ads not add');
        }
    }
//yes do

public function FoodDrinkads()
{
    $cards=FoodAds::get();

    return view('content.advertisement.ads.foodads',compact('cards'));
}

public function destroyFoodDrinkads(FoodAds $card)
{
try {
    Log::info('Attempting to delete card with ID: ' . $card->_id);
    $card->delete();
    Log::info('Successfully deleted card with ID: ' . $card->_id);
    return redirect()->route('list.food.ads')->with('success', 'Food Card ads has been deleted!');
} catch (\Exception $e) {
    Log::error('Error deleting Card: ' . $e->getMessage());
    return redirect()->route('list.food.ads')->with('error', 'Something went wrong!');
}
}
public function FoodDrinkadsstore(Request $request)
{
   // dd($request->all());
    // Validate the request
   $data= $request->validate([
        'card_name' => 'required',
        'card_image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048'
    ]);
// dd($data);
    // Create a new instance of BusinessCard
    $model = new FoodAds();

    // Assign the name
    $model->card_name = $request->card_name;
 //dd(  $model);
    // Handle the image upload
    if ($request->hasFile('card_image')) {
        // Use the fileUpload helper to store the image and get the path
        $imgPath = Helpers::fileUpload($request->card_image, "images/card_image");
// dd($imgPath);
        // Save the path to the model
        $model->card_image = $imgPath;
    }
// dd('helo');
    // Save the model to the database
    if ($model->save()) {
        //dd('helo');
        return redirect()->route('list.food.ads')->with('success', 'Food Card ads has been inserted');
    } else {
        return redirect()->route('list.food.ads')->with('error', 'Card ads not add');
    }
}



}
