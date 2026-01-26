<?php

namespace App\Http\Controllers;

use App\Models\admin;
use Illuminate\Http\Request;
use App\Http\Resources\adminResource;
use Illuminate\Support\Facades\Hash;

class adminController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $admins = admin::all();
        return adminResource::collection($admins);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $validated = $request->validate([
            'admin_name'     => 'required|string|max:255',
            'admin_email'    => 'required|email|unique:admins,admin_email',
            'admin_password' => 'required|string|min:6',
        ]);

        $admin = admin::create([
            'admin_name'     => $validated['admin_name'],
            'admin_email'    => $validated['admin_email'],
            'admin_password' => Hash::make($validated['admin_password']),
        ]);

        return new adminResource($admin);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
        $admin = admin::with(['customers', 'items', 'categories'])->findOrFail($id);
        return new adminResource($admin);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        $admin = admin::findOrFail($id);

        $validated = $request->validate([
            'admin_name'     => 'sometimes|string|max:255',
            'admin_email'    => 'sometimes|email|unique:admins,admin_email,' . $admin->id,
            'admin_password' => 'sometimes|string|min:6',
        ]);

        if (isset($validated['admin_password'])) {
            $validated['admin_password'] = Hash::make($validated['admin_password']);
        }

        $admin->update($validated);

        return new adminResource($admin);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        $admin = admin::findOrFail($id);
        $admin->delete();

        return response()->json([
            'message' => 'Admin deleted successfully'
        ]);
    }
}
