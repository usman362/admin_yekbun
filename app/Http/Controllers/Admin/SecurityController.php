<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\SecurityLog;
use App\Models\DeviceRegistry;
use App\Models\User;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class SecurityController extends Controller
{
    public function events(Request $request)
    {
        if ($request->ajax()) {
            $query = SecurityLog::with('user');

            return DataTables::of($query)
                ->addIndexColumn()
                ->addColumn('user_name', function ($row) {
                    return $row->user ? $row->user->name : 'N/A';
                })
                ->addColumn('is_suspicious', function ($row) {
                    return $row->is_suspicious
                        ? '<span class="badge bg-danger">Yes</span>'
                        : '<span class="badge bg-success">No</span>';
                })
                ->editColumn('timestamp', function ($row) {
                    return $row->timestamp ? $row->timestamp->format('Y-m-d H:i:s') : '';
                })
                ->rawColumns(['is_suspicious'])
                ->make(true);
        }

        return view('content.security_section.security_logs');
    }

    public function suspiciousDevices(Request $request)
    {
        $users = User::whereIn('user_type', ['cultivated', 'educated', 'academic'])->get();
        if ($request->ajax()) {
            $query = DeviceRegistry::with('user');

            return DataTables::of($query)
                ->addIndexColumn()
                ->addColumn('user_name', fn($row) => optional($row->user)->name ?? 'N/A')
                ->editColumn('is_blocked', function ($row) {
                    return $row->is_blocked
                        ? '<span class="badge bg-danger">Blocked</span>'
                        : '<span class="badge bg-success">Active</span>';
                })
                ->editColumn('first_seen', fn($row) => $row->first_seen ? $row->first_seen->format('Y-m-d H:i:s') : '')
                ->editColumn('last_active', fn($row) => $row->last_active ? $row->last_active->format('Y-m-d H:i:s') : '')
                ->addColumn('actions', function ($row) {
                    $blockBtn = !$row->is_blocked
                        ? '<button class="btn btn-sm btn-danger blockDevice" data-id="' . $row->id . '">Block</button>'
                        : '';
                    $editBtn = '<button class="btn btn-sm btn-primary editDevice" data-id="' . $row->id . '">Edit</button>';
                    $deleteBtn = '<button class="btn btn-sm btn-outline-danger deleteDevice" data-id="' . $row->id . '">Delete</button>';
                    return $editBtn . ' ' . $blockBtn . ' ' . $deleteBtn;
                })
                ->rawColumns(['is_blocked', 'actions'])
                ->make(true);
        }

        return view('content.security_section.suspicious_devices', compact('users'));
    }

    public function storeDevice(Request $request)
    {
        $data = $request->validate([
            'user_id' => 'required',
            'device_fingerprint' => 'required|string|unique:device_registries,device_fingerprint',
            'device_model' => 'nullable|string',
            'android_version' => 'nullable|string',
            'first_seen' => 'nullable|date',
            'last_active' => 'nullable|date',
            'is_blocked' => 'boolean',
            'request_count' => 'nullable|integer',
        ]);

        $device = DeviceRegistry::create($data);

        return response()->json(['success' => true, 'message' => 'Device added successfully', 'data' => $device]);
    }

    public function updateDevice(Request $request, $id)
    {
        $device = DeviceRegistry::findOrFail($id);

        $data = $request->validate([
            'device_model' => 'nullable|string',
            'android_version' => 'nullable|string',
            'is_blocked' => 'boolean',
            'request_count' => 'nullable|integer',
        ]);

        $device->update($data);

        return response()->json(['success' => true, 'message' => 'Device updated successfully']);
    }

    public function blockDevice(Request $request, $id)
    {
        $device = DeviceRegistry::findOrFail($id);
        $device->update(['is_blocked' => true]);

        log_security_event($device->user_id, 'device_blocked', $device->device_fingerprint, [], true);

        return response()->json(['success' => true, 'message' => 'Device blocked successfully']);
    }

    public function deleteDevice($id)
    {
        DeviceRegistry::findOrFail($id)->delete();
        return response()->json(['success' => true, 'message' => 'Device deleted successfully']);
    }
}
