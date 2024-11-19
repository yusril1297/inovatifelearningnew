<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\setting;
use Illuminate\Http\Request;

class SettingController extends Controller
{
    public function settings()
    {
        $data = setting::first();
        return view('admin.settings.index', compact('data'));
    }

    public function settingUpdate(Request $request)
    {
        $data = setting::first();
        if ($request->hasFile('logo')) {
            $file = $request->file('logo');
            $filename = time() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('uploads'), $filename);
            $data->logo = $filename;
            $data->path_logo = 'uploads/' . $filename;
        }
        $data->name_cors = $request->name_cors;
        $data->save();
        return redirect()->back()->with('success', 'Settings Updated');
    }
}
