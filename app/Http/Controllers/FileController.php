<?php
 
namespace App\Http\Controllers;
 
use Illuminate\Http\Request;
use Validator,Redirect,Response,File;
Use App\Document;
 
class FileController extends Controller
{
 
    public function imageValidation()
    {
        return view('booking.pdf.images');
    }
 
    public function save()
    {
       request()->validate([
         'file' => 'required',
         'file.*' => 'mimes:doc,pdf,docx,txt,zip'
       ]);
 
        if($request->hasfile('file'))
         {
 
            foreach($request->file('file') as $file)
            {
                $filename=$file->getClientOriginalName();
                $file->move(public_path().'/files/', $name);  
                $insert['file'] = "$filename";
            }
         }
         
        $check = Document::insertGetId($insert);
 
        return Redirect::to("file")
        ->withSuccess('Great! files has been successfully uploaded.');
 
    }
}