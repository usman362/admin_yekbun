<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\StorePremiumUserRequest;
use App\Http\Requests\UpdatePremiumUserRequest;

class PremiumUserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $view = 'male';
        if (request()->view) {
            $view = request()->view;
        }

        if ($view === 'blocked')
            $users = User::where("level", 1)->where('is_admin_user', false)->where('status', 0)->orderBy("updated_at", "DESC")->get();
        else
            $users = User::where("level", 1)->where('is_admin_user', false)->where('gender', $view)->orderBy("updated_at", "DESC")->get();

        return view("content.users.premium.index", compact("users", "view"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("content.users.premium.create");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorePremiumUserRequest $request)
    {
        $validated = $request->validated();

        $imagePath = null;
        if ($request->hasFile('image')) {
            $imagePath = $request->image->store("/users", "public");
            $validated["image"] = $imagePath;
        }

        $validated['level'] = 1; // Add level of premium user

        $user = User::create($validated);

        return back()->with("success", "User successfully created.");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = User::find($id);
        return view("content.users.premium.show", compact("user"));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::find($id);
        return view("content.users.premium.edit", compact("user"));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatePremiumUserRequest $request, $id)
    {
        $validated = $request->validated();

        $imagePath = null;
        if ($request->hasFile('image')) {
            $imagePath = $request->image->store("/users", "public");
            $validated["image"] = $imagePath;
        }

        $user = User::find($id);
        $user->fill($validated);
        $user->save();

        return back()->with("success", "User successfully updated");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::find($id);

        // Delete Image
        if ($user->image)
            Storage::delete($user->image);

        $user->delete();

        return back()->with("success", "User successfully deleted.");
    }
}
