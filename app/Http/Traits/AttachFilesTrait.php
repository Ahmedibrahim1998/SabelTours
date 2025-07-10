<?php

namespace App\Http\Traits;

use Illuminate\Support\Facades\Storage;

trait AttachFilesTrait
{
    public function uploadFile($request, $name, $folder)
    {
        $file_name = time().'_'.$request->file($name)->getClientOriginalName() ;
        $request->file($name)->storeAs('attachments/', $folder . '/' . $file_name, 'upload_attachments');
        return $file_name;

        /* Another Code To Upload Image
         *
           $name = $request->file('image')->getClientOriginalName();
           $request->file('image')->storeAs('attachments/experience/', $request->file('image')->getClientOriginalName(), 'upload_attachments');
           $experience->logo = $name;
        */
    }

    public function deleteFile($name, $folder)
    {
        $exists = Storage::disk('upload_attachments')->exists('attachments/' . $folder . '/' . $name);

        if ($exists) {
            Storage::disk('upload_attachments')->delete('attachments/' . $folder . '/' . $name);
        }
    }
}
