<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Setting;
use Illuminate\Http\Request;
use Illuminate\View\View;

class SettingController extends Controller
{
    /**
     * Display the store settings manager.
     */
    public function index(): View
    {
        $settings = Setting::all()->pluck('value', 'key')->toArray();
        return view('admin.settings.index', compact('settings'));
    }

    /**
     * Update store configuration settings.
     */
    public function update(Request $request)
    {
        $data = $request->except(['_token', '_method']);

        foreach ($data as $key => $value) {
            Setting::updateOrCreate(
                ['key' => $key],
                [
                    'key' => $key,
                    'value' => is_array($value) ? json_encode($value) : (string)$value,
                    'group' => str_contains($key, 'shipping') ? 'shipping' : (str_contains($key, 'payment') || str_contains($key, 'gokwik') ? 'payment' : (str_contains($key, 'url') ? 'social' : 'general')),
                ]
            );
        }

        return back()->with('success', 'Store configuration settings saved successfully.');
    }
}
