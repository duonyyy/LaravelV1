<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Setting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class SettingController extends Controller
{
    public function getSetting()
    {
        $settings = Setting::first();
        return view('admin.manager.settings')->with([
            'settings' => $settings
        ]);
    }

    public function storeOrUpdateSetting(Request $req)
    {
        // Validate the incoming request data
        $req->validate([
            'site_name' => 'required|string|max:255',
            'site_logo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'site_favicon' => 'nullable|image|mimes:ico,png|max:1024',
            'site_map' => 'nullable|string|max:255',
            'site_footer' => 'nullable|string|max:255',
            'contact_email' => 'nullable|email|max:255',
            'contact_phone' => 'nullable|string|max:15',
            'contact_address' => 'nullable|string|max:255',
        ], [
            'site_name.required' => 'Please enter the site name.',
            'site_logo.image' => 'The site logo must be an image file.',
            'site_favicon.image' => 'The site favicon must be an image file.',
        ]);
    
        // Find the settings record (assuming there is only one settings record)
        $settings = Setting::first();
    
        if (!$settings) {
            $settings = new Setting();
        }
    
        // Prepare data for updating
        $data = [
            'site_name' => $req->site_name,
            'site_map' => $req->site_map,
            'site_footer' => $req->site_footer,
            'contact_email' => $req->contact_email,
            'contact_phone' => $req->contact_phone,
            'contact_address' => $req->contact_address,
        ];
    
        // Handle site logo upload
if ($req->hasFile('site_logo')) {
    // Delete the existing logo file if it exists
    if ($settings->site_logo && file_exists(public_path($settings->site_logo))) {
        unlink(public_path($settings->site_logo));
    }
    // Store the new site logo
    $logo = $req->file('site_logo');
    $logoName = time() . '_' . $logo->getClientOriginalName();
    $logo->move(public_path('settings/'), $logoName);
    $data['site_logo'] = 'settings/' . $logoName;
}

// Handle site favicon upload
if ($req->hasFile('site_favicon')) {
    // Delete the existing favicon file if it exists
    if ($settings->site_favicon && file_exists(public_path($settings->site_favicon))) {
        unlink(public_path($settings->site_favicon));
    }
    // Store the new site favicon
    $favicon = $req->file('site_favicon');
    $faviconName = time() . '_' . $favicon->getClientOriginalName();
    $favicon->move(public_path('settings/'), $faviconName);
    $data['site_favicon'] = 'settings/' . $faviconName;
}

    
        // Update or create the settings record
        $settings->fill($data);
        $settings->save();
    
        // Redirect back with a success message
        return redirect()->route('admin.managers.getSetting')->with('message', 'Settings updated successfully!');
    }
    
}
