<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Traits\AttachFilesTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ExperienceController extends Controller
{
    use AttachFilesTrait;

    public function index()
    {
        $experiences = Experience::orderBy('arrange_it')->get();
        return view('admin.pages.experience.index', compact('experiences'));
    }


    public function create()
    {

        return view('admin.pages.experience.create');
    }


    public function store(StoreExperiences $request)
    {
        try {
            $validated = $request->validated();
            $path = $this->uploadFile($request, 'image', 'experience');
            $title = [
                'en' => $request->title_en,
                'ar' => $request->title
            ];
            $experience = Experience::create([
                'title' => $title,
                'date_from' => $request->date_from,
                'date_to' => $request->date_to,
                'logo' => $path,
            ]);

            $experience->save();

            toastr()->success(trans('messages.success'));
            return redirect()->route('experiences.index');
        } catch (\Exception $e) {
            return redirect()->back()->with(['error' => $e->getMessage()]);
        }

    }

    public function edit($id)
    {
        $experience = Experience::findorfail($id);
        return view('admin.pages.experience.edit', compact('experience'));
    }


    public function update(Request $request)
    {
        try {
            $experience = Experience::findOrFail($request->id);
            $experience->title = $title = [
                'en' => $request->title_en,
                'ar' => $request->title
            ];$experience->date_from = $request->date_from;
            $experience->date_to = $request->date_to;
            // Upload image
            if ($request->file('image')) {
                $this->deleteFile($experience->logo,'experience');
                $path =$this->uploadFile($request,'image','experience');
                $experience->logo = $path;
            }

            $experience->save();

            toastr()->success(trans('messages.success'));
            return redirect()->route('experiences.index');
        } catch (\Exception $e) {
            return redirect()->back()->with(['error' => $e->getMessage()]);
        }
    }

    public function destroy(Request $request)
    {
        try {
            $experience = Experience::findOrFail($request->id);
            $this->deleteFile($experience->logo,'experience');
            $experience->delete();
            return redirect()->route('experiences.index')->with(['success' => (trans('messages.successDelete'))]);
        } catch (\Exception $ex) {
            return redirect()->back()->with(['error' => $ex->getMessage()]);
        }
    }

    public function sortExperience(Experience $experience, $type)
    {
        if ($type == 'up') {
            $experience->moveOrderUp();
        } else {
            $experience->moveOrderDown();
        }
        return redirect()->back();
    }

}
