<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Section;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class SectionController extends Controller
{
    public function index()
    {
        $sections = Section::latest()->get();
        return view('admin.pages.sections.index', compact('sections'));
    }

    public function create()
    {
        return view('admin.pages.sections.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'type' => 'required|in:Climate,Essential,Practical_Information',
            'image' => 'required|image|mimes:jpg,jpeg,png|max:2048',
            'name_ar' => 'required|string',
            'name_en' => 'required|string',
            'name_fr' => 'nullable|string',
            'name_es' => 'nullable|string',
            'name_it' => 'nullable|string',
            'name_de' => 'nullable|string',

            'short_description_ar' => 'required|string',
            'short_description_en' => 'required|string',
            'short_description_fr' => 'nullable|string',
            'short_description_es' => 'nullable|string',
            'short_description_it' => 'nullable|string',
            'short_description_de' => 'nullable|string',
        ]);

        $section = new Section();
        $section->type = $data['type'];

        // encode localized fields
        $section->name = json_encode([
            'ar' => $data['name_ar'],
            'en' => $data['name_en'],
            'fr' => $data['name_fr'],
            'es' => $data['name_es'],
            'it' => $data['name_it'],
            'de' => $data['name_de'],
        ], JSON_UNESCAPED_UNICODE);

        $section->short_description = json_encode([
            'ar' => $data['short_description_ar'],
            'en' => $data['short_description_en'],
            'fr' => $data['short_description_fr'],
            'es' => $data['short_description_es'],
            'it' => $data['short_description_it'],
            'de' => $data['short_description_de'],
        ], JSON_UNESCAPED_UNICODE);

        // upload image
        $file = $request->file('image');
        $fileName = time() . '_' . Str::slug($file->getClientOriginalName());
        $file->move(public_path('uploads/sections'), $fileName);
        $section->image = 'uploads/sections/' . $fileName;

        $section->save();
        toastr()->success(__('messages.success'));
        return redirect()->route('sections.index');
    }

    public function edit(Section $section)
    {
        return view('admin.pages.sections.edit', compact('section'));
    }

    public function update(Request $request, Section $section)
    {
        $data = $request->validate([
            'type' => 'required|in:Climate,Essential,Practical_Information',
            'image' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
            'name_ar' => 'required|string',
            'name_en' => 'required|string',
            'name_fr' => 'nullable|string',
            'name_es' => 'nullable|string',
            'name_it' => 'nullable|string',
            'name_de' => 'nullable|string',

            'short_description_ar' => 'required|string',
            'short_description_en' => 'required|string',
            'short_description_fr' => 'nullable|string',
            'short_description_es' => 'nullable|string',
            'short_description_it' => 'nullable|string',
            'short_description_de' => 'nullable|string',
        ]);

        $section->type = $data['type'];
        $section->name = json_encode([
            'ar' => $data['name_ar'],
            'en' => $data['name_en'],
            'fr' => $data['name_fr'],
            'es' => $data['name_es'],
            'it' => $data['name_it'],
            'de' => $data['name_de'],
        ], JSON_UNESCAPED_UNICODE);

        $section->short_description = json_encode([
            'ar' => $data['short_description_ar'],
            'en' => $data['short_description_en'],
            'fr' => $data['short_description_fr'],
            'es' => $data['short_description_es'],
            'it' => $data['short_description_it'],
            'de' => $data['short_description_de'],
        ], JSON_UNESCAPED_UNICODE);

        if ($request->hasFile('image')) {
            if ($section->image && file_exists(public_path($section->image))) {
                unlink(public_path($section->image));
            }
            $file = $request->file('image');
            $fileName = time() . '_' . Str::slug($file->getClientOriginalName());
            $file->move(public_path('uploads/sections'), $fileName);
            $section->image = 'uploads/sections/' . $fileName;
        }

        $section->save();
        toastr()->success(__('messages.Update'));
        return redirect()->route('sections.index');
    }

    public function destroy(Section $section)
    {
        if ($section->image && file_exists(public_path($section->image))) {
            unlink(public_path($section->image));
        }
        $section->delete();
        toastr()->success(__('messages.Delete'));
        return redirect()->route('sections.index');
    }
}
