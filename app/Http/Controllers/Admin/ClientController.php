<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
class ClientController extends Controller
{
    public function index()
    {
        $clients = Client::latest()->get();
        return view('admin.pages.clients.index', compact('clients'));
    }

    public function create()
    {
        return view('admin.pages.clients.create');
    }

    public function store(Request $request)
    {
        try {
            $client = new Client();
            $client->name = [
                'ar' => $request->name_ar,
                'es' => $request->name_es,
                'en' => $request->name_en,
                'fr' => $request->name_fr,
                'it' => $request->name_it,
                'de' => $request->name_de,
            ];
            $client->description = [
                'ar' => $request->description_ar,
                'es' => $request->description_es,
                'en' => $request->description_en,
                'fr' => $request->description_fr,
                'it' => $request->description_it,
                'de' => $request->description_de,
            ];
            $client->date = $request->date;

            // رفع صورة إن وجدت
            if ($request->hasFile('image')) {
                $file = $request->file('image');
                $fileName = time() . '_' . $file->getClientOriginalName();
                $filePath = 'uploads/clients/' . $fileName;
                $file->move(public_path('uploads/clients'), $fileName);
                $client->image = $filePath;
            } elseif ($request->filled('image_url')) {
                $client->image = $request->image_url;
            }


            $client->save();
            toastr()->success(__('messages.success'));
            return redirect()->route('clients.index');
        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }

    public function show($id)
    {
        $client = Client::findOrFail($id);
        return view('admin.pages.clients.show', compact('client'));
    }

    public function edit($id)
    {
        $client = Client::findOrFail($id);
        return view('admin.pages.clients.edit', compact('client'));
    }

    public function update(Request $request, $id)
    {
        try {
            $client = Client::findOrFail($id);
            $client->name = [
                'ar' => $request->name_ar,
                'es' => $request->name_es,
                'en' => $request->name_en,
                'fr' => $request->name_fr,
                'it' => $request->name_it,
                'de' => $request->name_de,
            ];
            $client->description = [
                'ar' => $request->description_ar,
                'es' => $request->description_es,
                'en' => $request->description_en,
                'fr' => $request->description_fr,
                'it' => $request->description_it,
                'de' => $request->description_de,
            ];
            $client->date = $request->date;

            // تحديث الصورة إن وُجدت
            if ($request->hasFile('image')) {
                // حذف الصورة القديمة إن وُجدت وكانت محلية (وليست رابط خارجي)
                if ($client->image && !Str::startsWith($client->image, ['http://', 'https://'])) {
                    $oldImagePath = public_path($client->image);
                    if (file_exists($oldImagePath)) {
                        unlink($oldImagePath);
                    }
                }

                // رفع الصورة الجديدة
                $file = $request->file('image');
                $fileName = time() . '_' . $file->getClientOriginalName();
                $filePath = 'uploads/clients/' . $fileName;
                $file->move(public_path('uploads/clients'), $fileName);
                $client->image = $filePath;
            }
            elseif ($request->filled('image_url')) {
                // إذا أدخل رابط صورة خارجي يتم تعيينه مباشرة
                if ($client->image && !Str::startsWith($client->image, ['http://', 'https://'])) {
                    $oldImagePath = public_path($client->image);
                    if (file_exists($oldImagePath)) {
                        unlink($oldImagePath);
                    }
                }
                $client->image = $request->image_url;
            }


            $client->save();
            toastr()->success(__('messages.Update'));
            return redirect()->route('clients.index');
        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }

    public function destroy($id)
    {
        $client = Client::findOrFail($id);

        if ($client->image && file_exists(public_path($client->image))) {
            unlink(public_path($client->image));
        }

        $client->delete();
        toastr()->success(__('messages.Delete'));
        return redirect()->route('clients.index');
    }
}
