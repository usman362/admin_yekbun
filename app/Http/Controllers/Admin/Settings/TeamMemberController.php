<?php

namespace App\Http\Controllers\Admin\Settings;

use App\Models\User;
use Illuminate\Http\Request;
// use Spatie\Permission\Models\Role;
// use App\Repositories\Role;
use Maklad\Permission\Models\Role;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\StoreTeamMemberRequest;
use App\Http\Requests\UpdateTeamMemberRequest;
use PhpParser\Node\Expr\FuncCall;
use Illuminate\Support\Facades\DB;
use Jenssegers\Mongodb\Eloquent\Model as Eloquent;
// use Maklad\Permission\Models\Role;
use Maklad\Permission\Models\Permission;

class TeamMemberController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
public function index()
{
    $users = User::where('status', 1)->where('is_admin_user', 1)
                 ->with('roles') // eager load roles
                 ->get();

    $roles = Role::all();
    return view("content.settings.team_members.index", compact("users", "roles"));
}


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreTeamMemberRequest $request)
    {
       //  dd($request->all());
        $validated = $request->validated();
        $validated['image'] = $request->image??null;
        $imagePath = null;
        if ($request->hasFile('image')) {
            $imagePath = $request->image??'';
            $validated["image"] = $imagePath;
        }

        $validated['is_admin_user'] = 1;
        $validated['password'] = Hash::make($validated['password']);
        $validated['status'] = (int)$request->status;
        $validated['role_id'] = $validated['roles'];
        $validated['user_type'] = 'team_member';

        // $newUserPermission = Permission::firstOrCreate([
        //     'name' => 'all',
        //     'guard_name' => 'web', // Optional, depends on your configuration
        //   ]);

        // $role = Role::firstOrCreate([
        //     'name' => 'admin',
        //     'guard_name' => 'web', // Optional
        //   ]);
        $role = Role::find($validated['role_id']);
        // $role->givePermissionTo($newUserPermission);

        try {
            $user = User::create($validated);
            $user->assignRole($role);
        } catch (\Throwable $e) {
            return back()->with("success", "Team member successfully added.");
        }
        return back()->with("success", "Team member successfully added.");
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateTeamMemberRequest $request, $id)
    {
        $validated = $request->validated();
        $validated['image'] = $request->image??null;

        $user = User::find($id);
        if (! ($validated['password']?? null)) {
            $validated['password'] = $user->password;
        } else {
            $validated['password'] = Hash::make($validated['password']);
        }
        $validated['role_id'] = $request->roles;
        $validated['user_type'] = 'team_member';
        $user->fill($validated);
        try {
            $user->save();
        } catch (\Throwable $e) {
            return back()->with("success", "Team member successfully updated.");
        }
        return back()->with("success", "Team member successfully updated.");
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
    
        // Check if the user exists
        if (!$user) {
            return back()->with("error", "User not found.");
        }
    
        // Loop through all roles assigned to this user and delete them
        foreach ($user->roles as $role) {
            // Delete the role from the roles collection
            Role::where('_id', $role->id)->delete();
        }
    
        // Remove the user's image if it exists
        $imagePath = public_path('storage/' . $user->image);
        if ($user->image != NULL && file_exists($imagePath)) {
            unlink($imagePath);
        }
    
        // Delete the user from the database
        $user->delete();
    
        return back()->with("success", "User and associated roles successfully deleted.");
    }
    
}
