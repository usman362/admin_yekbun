<?php

namespace App\Http\Controllers\Admin;

use App\Models\FlaggedUser;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreFlaggedUserRequest;
use App\Http\Requests\UpdateFlaggedUserRequest;

class FlaggedUserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $status = 1;
        if (request()->status !== null) {
            switch(request()->status) {
                case 'pending':
                    $status = 0;
                    break;
                case 'resolved':
                    $status = 1;
                    break;
                case 'dismissed':
                    $status = 2;
                    break;
            }
        }

        $flaggedUsers = FlaggedUser::where("status", $status)->orderBy("updated_at", "DESC")->get();
        return view("content.flagged_users.index", compact("flaggedUsers", "status"));
    }

    public function flaggedfanpage()
    {
        $status = 1;
        if (request()->status !== null) {
            switch(request()->status) {
                case 'pending':
                    $status = 0;
                    break;
                case 'resolved':
                    $status = 1;
                    break;
                case 'dismissed':
                    $status = 2;
                    break;
            }
        }

        $flaggedUsers = FlaggedUser::where("status", $status)->orderBy("updated_at", "DESC")->get();
        return view("content.flagged_users.fanpage", compact("flaggedUsers", "status"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("content.flagged_users.create");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreFlaggedUserRequest $request)
    {
        $validated = $request->validated();

        $flaggedUser = FlaggedUser::create($validated);

        return back()->with("success", "Flagged user successfully created.");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $flaggedUser = FlaggedUser::find($id);
        return view("content.flagged_users.show", compact("flaggedUser"));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $flaggedUser = FlaggedUser::find($id);
        return view("content.flagged_users.edit", compact("flaggedUser"));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateFlaggedUserRequest $request, $id)
    {
        $validated = $request->validated();
        $flaggedUser = FlaggedUser::find($id);
        $flaggedUser->fill($validated);
        $flaggedUser->save();

        return back()->with("success", "Flagged user successfully updated.");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $flaggedUser = FlaggedUser::find($id);
        $flaggedUser->delete();

        return back()->with("success", "Flagged  user successfully deleted.");
    }
}
