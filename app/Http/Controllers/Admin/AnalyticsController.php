<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Song;
use App\Models\Country;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class AnalyticsController extends Controller
{


  public function index()
  {
    // Basic counts
    $male_account = User::where('gender', 'male')->count();
    $female_account = User::where('gender', 'female')->count();
    $music = Song::count();
    $countries = Country::all();
    $totalUsers = User::count();

    $users = User::select('user_type')
      ->whereIn('user_type', ['Educated', 'Cultivated', 'Academic'])
      ->selectRaw('count(*) as total')
      ->groupBy('user_type')
      ->pluck('total', 'user_type');

    // Age ranges
    $ageRanges = [
      '18-24' => [18, 24],
      '25-34' => [25, 34],
      '35-44' => [35, 44],
      '45-54' => [45, 54],
      '55+'   => [55, 150], // Assuming no one is older than 150
    ];

    $ageGroupStats = [];

    // Get all users with DOB
    $usersWithDOB = User::whereNotNull('dob')->get();

    // Total with DOB for progress bar percentages
    $totalWithDOB = $usersWithDOB->count();

    foreach ($ageRanges as $label => [$min, $max]) {
      $groupUsers = $usersWithDOB->filter(function ($user) use ($min, $max) {
        $age = Carbon::parse($user->dob)->age;
        return $age >= $min && $age <= $max;
      });

      $maleCount = $groupUsers->where('gender', 'male')->count();
      $femaleCount = $groupUsers->where('gender', 'female')->count();
      $groupTotal = $maleCount + $femaleCount;

      $malePercent = $groupTotal ? round(($maleCount / $groupTotal) * 100) : 0;
      $femalePercent = $groupTotal ? round(($femaleCount / $groupTotal) * 100) : 0;
      $barPercent = $totalWithDOB ? round(($groupTotal / $totalWithDOB) * 100) : 0;

      $ageGroupStats[] = [
        'range' => $label,
        'male' => $malePercent,
        'female' => $femalePercent,
        'bar' => $barPercent,
      ];
    }
    // Fetch all users with device_name and device_type
    $users = User::whereNotNull('device_name')
      ->whereNotNull('device_type')
      ->get();

    // Group by device_name
    $deviceStats = $users->groupBy('device_name')->map(function ($group) use ($users) {
      $totalDeviceUsers = $group->count();

      // Breakdown by device_type
      $types = $group->groupBy('device_type')->map(function ($subGroup) use ($totalDeviceUsers) {
        $count = $subGroup->count();
        $percent = $totalDeviceUsers > 0 ? round(($count / $totalDeviceUsers) * 100) : 0;

        return [
          'count' => $count,
          'percent' => $percent,
        ];
      });

      return [
        'total' => $totalDeviceUsers,
        'types' => $types,
      ];
    });
    // andrioid device 
    $androidUsers = User::whereNotNull('device_name')
      ->whereNotNull('device_type')
      ->where('device_name', 'like', '%Android%')
      ->get();

    $androidDeviceStats = $androidUsers->groupBy('device_type')->map(function ($group) use ($androidUsers) {
      $count = $group->count();
      $total = $androidUsers->count();
      $percent = $total > 0 ? round(($count / $total) * 100) : 0;

      return [
        'count' => $count,
        'percent' => $percent,
      ];
    });

    $totalAndroidDevices = $androidUsers->count();
//ios 
// ✅ iOS Users (matching "iPhone", "iOS", or "iPad")
$iosUsers = User::whereNotNull('device_name')
    ->whereNotNull('device_type')
    ->where(function ($query) {
        $query->where('device_name', 'like', '%iPhone%')
              ->orWhere('device_name', 'like', '%iOS%')
              ->orWhere('device_name', 'like', '%iPad%');
    })
    ->get();

$iosDeviceStats = $iosUsers->groupBy('device_type')->map(function ($group) use ($iosUsers) {
    $count = $group->count();
    $total = $iosUsers->count();
    $percent = $total > 0 ? round(($count / $total) * 100) : 0;

    return [
        'count' => $count,
        'percent' => $percent,
    ];
});

$totalIosDevices = $iosUsers->count();


    return view('content.dashboard.dashboards-analytics', compact(
      'male_account',
      'female_account',
      'music',
      'users',
      'totalUsers',
      'ageGroupStats',
      'deviceStats','totalAndroidDevices','androidDeviceStats','totalIosDevices','iosDeviceStats','countries'
    ));
  }
}
