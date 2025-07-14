<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\AboutUs;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class AboutUsController extends Controller
{
    public function index()
    {
        $about = AboutUs::first();
        return view('admin.pages.about.index', compact('about'));
    }

    public function edit($id = null)
    {
        $about = AboutUs::first();
        return view('admin.pages.about.edit', compact('about'));
    }

    public function update(Request $request, $id = null)
    {
        $request->validate([
            'team_name' => 'required|string|max:255',

            'about_text_ar' => 'required|string',
            'about_text_en' => 'required|string',
            'about_text_fr' => 'required|string',
            'about_text_es' => 'required|string',
            'about_text_it' => 'required|string',
            'about_text_de' => 'required|string',

            'goals_ar' => 'required|string',
            'goals_en' => 'required|string',
            'goals_fr' => 'required|string',
            'goals_es' => 'required|string',
            'goals_it' => 'required|string',
            'goals_de' => 'required|string',

            'images.*' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);


        $about = AboutUs::first() ?? new AboutUs();

        // team_name نص عادي
        $about->team_name = $request->team_name;

        // الحقول المترجمة بصيغة JSON
        $about->about_text = json_encode([
            'ar' => $request->about_text_ar,
            'en' => $request->about_text_en,
            'fr' => $request->about_text_fr,
            'es' => $request->about_text_es,
            'it' => $request->about_text_it,
            'de' => $request->about_text_de,
        ], JSON_UNESCAPED_UNICODE);

        $about->goals = json_encode([
            'ar' => $request->goals_ar,
            'en' => $request->goals_en,
            'fr' => $request->goals_fr,
            'es' => $request->goals_es,
            'it' => $request->goals_it,
            'de' => $request->goals_de,
        ], JSON_UNESCAPED_UNICODE);

        // رفع الصور
        $images = [];

        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $file) {
                $fileName = time() . '_' . Str::slug($file->getClientOriginalName());
                $file->move(public_path('uploads/about'), $fileName);
                $images[] = 'uploads/about/' . $fileName;
            }

            $about->images = json_encode($images, JSON_UNESCAPED_UNICODE);
        }

        $about->save();

        toastr()->success(__('messages.Update'));
        return redirect()->route('about-us.index');
    }
}
