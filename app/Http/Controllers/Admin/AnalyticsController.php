<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Repositories\Activity;

use App\Models\Song;
use App\Models\Country;
use App\Models\SystemBackup;
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
        $totalUsers = User::whereNotNull('dob')->count(); // Only count users with valid DOB

        // Age brackets
        $ageBrackets = [
            '18-24' => [18, 24],
            '25-34' => [25, 34],
            '35-44' => [35, 44],
            '45-64' => [45, 64],
            '65+'   => [65, 200],
        ];

        // Get all users with DOB
        $users = User::whereNotNull('dob')->get();

        // Initialize array for stats
        $ageStats = [];

        foreach ($ageBrackets as $label => [$min, $max]) {
            $male = 0;
            $female = 0;

            foreach ($users as $user) {
                $age = Carbon::parse($user->dob)->age;

                if ($age >= $min && $age <= $max) {
                    if ($user->gender === 'male') {
                        $male++;
                    } elseif ($user->gender === 'female') {
                        $female++;
                    }
                }
            }

            $ageStats[$label] = [
                'male' => $male,
                'female' => $female,
                'total' => $male + $female,
            ];
        }
        $visitors = User::select('country', 'city')
            ->whereNotNull('country')
            ->get()
            ->groupBy('country')
            ->map(function ($users) {
                return [
                    'count' => $users->count(),
                    'cities' => $users->pluck('city')->unique()->filter()->values()->all(),
                ];
            })->sortByDesc('count')
            ->take(10); // Top 10 countries

        // Calculate total for progress %
        $totalVisitors = $visitors->sum('count');
        $totalAndroidDevices = User::where('device_type', 'android')->count();
        $deviceModels = User::where('device_type', 'android')
            ->select('device_model')
            ->whereNotNull('device_model')
            ->groupBy('device_model')
            ->selectRaw('device_model, COUNT(*) as total')
            ->orderByDesc('total')
            ->take(5) // Top 5 device models
            ->get();
        $totalDevices = User::whereNotNull('device_type')->count();
        $totalIosDevices = User::where('device_type', 'ios')->count();

        $iosDeviceModels = User::where('device_type', 'ios')
            ->whereNotNull('device_model')
            ->select('device_model')
            ->groupBy('device_model')
            ->selectRaw('device_model, COUNT(*) as total')
            ->orderByDesc('total')
            ->take(5)
            ->get();
        $sections = [
            'News - Feeds' => User::where('new_news', true)->count(),
            'Multimedia - Video' => User::where('play_video', true)->count(),
            'Multimedia - Music' => User::where('play_music', true)->count(),
            'Multimedia - History' => User::where('new_history', true)->count(),
            'Live Stream' => User::where('live_stream', true)->count(),
        ];

        $total = array_sum($sections);

        // Define color palette
        $colors = ['bg-primary', 'bg-success', 'bg-info', 'bg-warning', 'bg-danger'];

        // Build sections with percentages and random color
        $sectionsWithPercentage = [];

        foreach ($sections as $label => $count) {
            $percentage = $total > 0 ? round(($count / $total) * 100, 1) : 0;
            $sectionsWithPercentage[] = [
                'label' => $label,
                'count' => $count,
                'percentage' => $percentage,
                'color' => $colors[array_rand($colors)],
            ];
        }
        $logs = Activity::latest()->take(5)->get();
        $backups = SystemBackup::latest()->get();
        return view('content.dashboard.dashboards-analytics', compact(
            'male_account',
            'female_account',
            'music',
            'visitors',
            'logs',
            'totalAndroidDevices',
            'totalVisitors',
            'sectionsWithPercentage',
            'totalUsers',
            'ageStats',
            'totalAndroidDevices',
            'deviceModels',
            'totalDevices',
            'totalIosDevices',
            'iosDeviceModels',
            'backups'
        ));
    }
}
