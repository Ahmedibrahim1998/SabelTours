<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Governorate;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class GovernorateController extends Controller
{
    public function index()
    {
        $governorates = Governorate::all();
        return view('admin.pages.governorates.index', compact('governorates'));
    }

    public function create()
    {
        return view('admin.pages.governorates.create');
    }


    public function store(Request $request)
    {
        $request->validate([
            'date' => 'nullable|date',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp',
            'image_url' => 'nullable|url',
            // تحقق من كل أسماء اللغات المطلوبة
            'name_ar' => 'required|string',
            'name_en' => 'required|string',
            'name_fr' => 'nullable|string',
            'name_it' => 'nullable|string',
            'name_de' => 'nullable|string',
            'name_es' => 'nullable|string',
        ]);

        // تجميع الأسماء باللغات في شكل array
        $name = [
            'ar' => $request->input('name_ar'),
            'en' => $request->input('name_en'),
            'fr' => $request->input('name_fr'),
            'it' => $request->input('name_it'),
            'de' => $request->input('name_de'),
            'es' => $request->input('name_es'),
        ];

        $data = [
            'name' => json_encode($name, JSON_UNESCAPED_UNICODE),
            'places_count' => 0, // يمكن تعديله لاحقًا
            'image' => null,
        ];

        // حفظ الصورة
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time() . '_' . Str::slug($image->getClientOriginalName());
            $image->move(public_path('uploads/governorates'), $imageName);
            $data['image'] = 'uploads/governorates/' . $imageName;

        } elseif ($request->filled('image_url')) {
            $data['image'] = $request->input('image_url');
        }

        // حفظ في قاعدة البيانات
        Governorate::create($data);

        return redirect()->route('governorates.index')->with('success', __('governorates_trans.created_successfully'));
    }



    public function show($id)
    {
        $governorate = Governorate::findOrFail($id);
        return view('admin.pages.governorates.show', compact('governorate'));
    }

    public function edit($id)
    {
        $governorate = Governorate::findOrFail($id);

        // Ensure it's decoded properly
        if (is_string($governorate->name)) {
            $governorate->name = json_decode($governorate->name, true);
        }

        return view('admin.pages.governorates.edit', compact('governorate'));
    }

    public function update(Request $request, Governorate $governorate)
    {
        $request->validate([
            'name_ar' => 'required|string',
            'name_es' => 'required|string',
            'name_en' => 'required|string',
            'name_fr' => 'nullable|string',
            'name_it' => 'nullable|string',
            'name_de' => 'nullable|string',
            'image' => 'nullable|image',
        ]);

        $governorate->name = [
            'ar' => $request->name_ar,
            'es' => $request->name_es,
            'en' => $request->name_en,
            'fr' => $request->name_fr,
            'it' => $request->name_it,
            'de' => $request->name_de,
        ];

        // تحديث الصورة إن وُجدت
        if ($request->hasFile('image')) {
            // حذف الصورة القديمة إن وُجدت وكانت محلية (وليست رابط خارجي)
            if ($governorate->image && !Str::startsWith($governorate->image, ['http://', 'https://'])) {
                $oldImagePath = public_path($governorate->image);
                if (file_exists($oldImagePath)) {
                    unlink($oldImagePath);
                }
            }

            // رفع الصورة الجديدة
            $file = $request->file('image');
            $fileName = time() . '_' . $file->getClientOriginalName();
            $filePath = 'uploads/governorates/' . $fileName;
            $file->move(public_path('uploads/governorates'), $fileName);
            $governorate->image = $filePath;
        }
        elseif ($request->filled('image_url')) {
            // إذا أدخل رابط صورة خارجي يتم تعيينه مباشرة
            if ($governorate->image && !Str::startsWith($governorate->image, ['http://', 'https://'])) {
                $oldImagePath = public_path($governorate->image);
                if (file_exists($oldImagePath)) {
                    unlink($oldImagePath);
                }
            }
            $governorate->image = $request->image_url;
        }


        $governorate->save();

            return redirect()->route('governorates.index')->with('success', trans('governorates_trans.updated_successfully'));
        }

        public  function destroy(Governorate $governorate)
        {
            if ($governorate->image && file_exists(public_path($governorate->image))) {
                unlink(public_path($governorate->image));
            }

            $governorate->delete();

            return redirect()->route('governorates.index')->with('success', trans('governorates_trans.deleted_successfully'));
        }
    }
