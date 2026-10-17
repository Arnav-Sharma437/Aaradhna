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
        $request->validate([
            'header_logo_file' => 'nullable|file|mimes:jpeg,png,jpg,webp,svg|max:5120',
            'footer_logo_file' => 'nullable|file|mimes:jpeg,png,jpg,webp,svg|max:5120',
            'favicon_file'     => 'nullable|file|mimes:jpeg,png,jpg,webp,svg,ico|max:2048',
        ]);

        $uploadDir = public_path('assets/images/settings');
        if (!file_exists($uploadDir)) {
            mkdir($uploadDir, 0755, true);
        }

        // 1. Header Logo Upload
        if ($request->hasFile('header_logo_file')) {
            $file = $request->file('header_logo_file');
            $filename = 'header-logo-' . time() . '.' . $file->getClientOriginalExtension();
            $file->move($uploadDir, $filename);
            Setting::set('header_logo', 'assets/images/settings/' . $filename, 'branding');
        } elseif ($request->boolean('remove_header_logo')) {
            Setting::where('key', 'header_logo')->delete();
        }

        // 2. Footer Logo Upload
        if ($request->hasFile('footer_logo_file')) {
            $file = $request->file('footer_logo_file');
            $filename = 'footer-logo-' . time() . '.' . $file->getClientOriginalExtension();
            $file->move($uploadDir, $filename);
            Setting::set('footer_logo', 'assets/images/settings/' . $filename, 'branding');
        } elseif ($request->boolean('remove_footer_logo')) {
            Setting::where('key', 'footer_logo')->delete();
        }

        // 3. Favicon Upload
        if ($request->hasFile('favicon_file')) {
            $file = $request->file('favicon_file');
            $filename = 'favicon-' . time() . '.' . $file->getClientOriginalExtension();
            $file->move($uploadDir, $filename);
            Setting::set('favicon', 'assets/images/settings/' . $filename, 'branding');
        } elseif ($request->boolean('remove_favicon')) {
            Setting::where('key', 'favicon')->delete();
        }

        // Checkbox toggles
        Setting::set('footer_logo_invert', $request->has('footer_logo_invert') ? '1' : '0', 'branding');
        Setting::set('gokwik_enabled', $request->has('gokwik_enabled') ? '1' : '0', 'payment');
        Setting::set('cod_enabled', $request->has('cod_enabled') ? '1' : '0', 'payment');

        // Other settings
        $excludedKeys = [
            '_token', '_method',
            'header_logo_file', 'footer_logo_file', 'favicon_file',
            'remove_header_logo', 'remove_footer_logo', 'remove_favicon',
            'footer_logo_invert', 'gokwik_enabled', 'cod_enabled'
        ];
        $data = $request->except($excludedKeys);

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

        return back()->with('success', 'Store settings and branding assets saved successfully.');
    }
}
