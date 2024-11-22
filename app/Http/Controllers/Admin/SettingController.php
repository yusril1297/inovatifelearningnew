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
        
    // Ambil data settings pertama atau buat data baru jika tidak ada
    $data = setting::first();
    if (!$data) {
        $data = new setting();
    }

    // Jika ada file logo yang diunggah
    if ($request->hasFile('logo')) {
        $file = $request->file('logo');
        $filename = time() . '.' . $file->getClientOriginalExtension();
        $file->move(public_path('uploads'), $filename);

        $data->logo = $filename; // Simpan nama file
        $data->path_logo = 'uploads/' . $filename; // Simpan path file
    }

    // Perbarui data lainnya
    $data->name_cors = $request->name_cors;

    // Simpan perubahan
    $data->save();

    return redirect()->back()->with('success', 'Settings Updated');
    }
}
