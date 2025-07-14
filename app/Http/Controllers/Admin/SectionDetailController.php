<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\SectionDetail;
use App\Models\Section;
use Illuminate\Http\Request;
use Str;

class SectionDetailController extends Controller
{
    public function index()
    {
        $details = SectionDetail::with('section')->latest()->get();
        return view('admin.pages.section_details.index', compact('details'));
    }

    public function create()
    {
        $sections = Section::all();
        return view('admin.pages.section_details.create', compact('sections'));
    }

    public function store(Request $request)
    {
        $data = $request->validate(array_merge([
            'section_id' => 'required|exists:sections,id',
            'title' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
            'images.*' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ], collect(['ar','es','en','fr','it','de'])->flatMap(fn($loc)=>[
            "content_{$loc}" => 'nullable|string'
        ])->toArray()));

        $content = [];
        foreach(['ar','es','en','fr','it','de'] as $loc) {
            $content[$loc] = $request->input("content_{$loc}");
        }

        $imagesArr = [];
        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $file) {
                $name = time().'_'.Str::slug($file->getClientOriginalName());
                $file->move(public_path('uploads/section_details'), $name);
                $imagesArr[] = 'uploads/section_details/'.$name;
            }
        }

        $imageSingle = null;
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $name = time().'_'.Str::slug($file->getClientOriginalName());
            $file->move(public_path('uploads/section_details'), $name);
            $imageSingle = 'uploads/section_details/'.$name;
        }

        SectionDetail::create([
            'section_id' => $data['section_id'],
            'title' => $data['title'],
            'content' => json_encode($content, JSON_UNESCAPED_UNICODE),
            'image' => $imageSingle,
            'images' => json_encode($imagesArr),
        ]);

        toastr()->success(__('messages.success'));
        return redirect()->route('section-details.index');
    }

    public function show(SectionDetail $sectionDetail)
    {
        return view('admin.pages.section_details.show', compact('sectionDetail'));
    }

    public function edit(SectionDetail $sectionDetail)
    {
        $sections = Section::all();
        return view('admin.pages.section_details.edit', compact('sectionDetail', 'sections'));
    }

    public function update(Request $request, SectionDetail $sectionDetail)
    {
        $data = $request->validate(array_merge([
            'section_id' => 'required|exists:sections,id',
            'title' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
            'images.*' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ], collect(['ar','es','en','fr','it','de'])->flatMap(fn($loc)=>[
            "content_{$loc}" => 'nullable|string'
        ])->toArray()));

        $sectionDetail->section_id = $data['section_id'];
        $sectionDetail->title = $data['title'];

        $content = [];
        foreach(['ar','es','en','fr','it','de'] as $loc) {
            $content[$loc] = $request->input("content_{$loc}");
        }
        $sectionDetail->content = json_encode($content, JSON_UNESCAPED_UNICODE);

        if ($request->hasFile('image')) {
            if ($sectionDetail->image && file_exists(public_path($sectionDetail->image))) {
                unlink(public_path($sectionDetail->image));
            }
            $file = $request->file('image');
            $name = time().'_'.Str::slug($file->getClientOriginalName());
            $file->move(public_path('uploads/section_details'), $name);
            $sectionDetail->image = 'uploads/section_details/'.$name;
        }

        if ($request->hasFile('images')) {
            foreach($sectionDetail->getImages() ?: [] as $oldImg){
                if (file_exists(public_path($oldImg))) unlink(public_path($oldImg));
            }
            $imgs = [];
            foreach ($request->file('images') as $file) {
                $name = time().'_'.Str::slug($file->getClientOriginalName());
                $file->move(public_path('uploads/section_details'), $name);
                $imgs[] = 'uploads/section_details/'.$name;
            }
            $sectionDetail->images = json_encode($imgs);
        }

        $sectionDetail->save();
        toastr()->success(__('messages.Update'));
        return redirect()->route('section-details.index');
    }

    public function destroy(SectionDetail $sectionDetail)
    {
        if ($sectionDetail->image && file_exists(public_path($sectionDetail->image))) {
            unlink(public_path($sectionDetail->image));
        }
        foreach($sectionDetail->getImages() ?: [] as $img){
            if (file_exists(public_path($img))) unlink(public_path($img));
        }
        $sectionDetail->delete();
        toastr()->success(__('messages.Delete'));
        return redirect()->route('section-details.index');
    }
}
