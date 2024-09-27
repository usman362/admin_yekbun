<?php

namespace App\Models;

use Mail;
use Exception;
use App\Mail\SendCodeMail;
use Laravel\Sanctum\HasApiTokens;
use Spatie\Activitylog\LogOptions;
// use Spatie\Permission\Traits\HasRoles;
use Illuminate\Notifications\Notifiable;
use Spatie\Activitylog\Traits\LogsActivity;
use Spatie\Activitylog\Traits\CausesActivity;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Jenssegers\Mongodb\Auth\User as Authenticatable;
use Maklad\Permission\Traits\HasRoles;


class User extends Authenticatable  implements MustVerifyEmail
{
    use HasApiTokens, HasFactory, Notifiable, HasRoles, CausesActivity, LogsActivity;

    protected $connection = 'mongodb';
    protected $collection = 'users';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'image',
        'status',
        'level',
        'username',
        'fname',
        'last_name',
        'gender',
        'origin',
        'dob',
        'address',
        'province',
        'city',
        'province_city',
        'country',
        'role_id',
        'roles',
        'user_id',
        'device_name',
        'device_model',
        'device_serial',
        'device_type',
        'device_imei',
        'device_id',
        'is_admin_user',
        'is_superadmin'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults();
    }

    public function stories()
    {
        return $this->hasMany(Story::class);
    }

    public function reports()
    {
        return $this->hasMany(Report::class, 'reported_user_id', 'id');
    }

    public function ads()
    {
        return $this->hasMany(Ads::class);
    }

    public function country()
    {
        return $this->belongsTo(Country::class);
    }

    public function region()
    {
        return $this->belongsTo(Region::class);
    }

    public function City()
    {
        return $this->belongsTo(City::class);
    }

    public function feeds()
    {
        return $this->hasMany(Feed::class);
    }

    public function user()
    {
        return $this->hasMany(FanPage::class, 'user_id', 'id');
    }


    public function roles()
    {
        return $this->belongsToMany(Role::class, null, 'user_ids', 'role_ids');
    }

    public function permissions()
    {

        return $this->belongsToMany(Permission::class, null, 'user_ids', 'permission_ids');
    }

    //public function hasRole($role)
//{
 //   return $this->role === $role;
//}

    public function before(User $user, string $ability): bool|null
{


    if ($user->hasRole('Super Admin')) {
        return true;
    }

    return null; // see the note above in Gate::before about why null must be returned here.
}

    public function hasPermission($permission)
    {

        return $this->permissions()->where('name', $permission)->exists() ||
               $this->roles()->whereHas('permissions', function ($query) use ($permission) {
                   $query->where('name', $permission);
               })->exists();
    }

    /**
     * Write code on Method
     *
     * @return response()
     */
    public  function generateCode()
    {
        $code = rand(100000, 999999);

        UserCode::updateOrCreate(
            ['user_id' => auth()->user()->id],
            ['code' => $code]
        );

        try {

            $details = [
                'title' => 'Mail from Yekbun.com',
                'code' => $code
            ];

            Mail::to(auth()->user()->email)->send(new SendCodeMail($details));
        } catch (Exception $e) {
            info("Error: " . $e->getMessage());
        }
    }

}
