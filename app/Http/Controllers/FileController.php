<?php
 
namespace App\Http\Controllers;
 
use Illuminate\Http\Request;
use Validator,Redirect,Response,File;
Use App\Document;
 
class FileController extends Controller
{
  
    public function imageValidation()
    {
      //  return 1;
        return view('booking.pdf.images');
    }
 
    public function save()
    {
       request()->validate([
         'file' => 'required',
         'file.*' => 'mimes:png,jpg'
       ]);
 
        if($request->hasfile('file'))
         {
            $autoid = 1;
            foreach($request->file('file') as $file)
            {
                $extension = $file->getClientOriginalExtension();
                $imageName = $autoid.'_'.date('Ymdhis').$slno.'.'.$extension;
                $file->storeAs('hotels\room' , $imageName  ,'local');

                DB::table('hotel_room_images')->insert(
                    ['hotel_id' => $autoid, 'image_name' => $imageName]
                );
                $slno++;
            }

            // if($request->hasfile('image_name'))
            //     {
            //         $s1 = 0;
            //         $slno = 1;
            //         foreach ($request->file('image_name') as $file) {
                       
            //         }
            //     }
                return redirect('/hotel_room')->with('message','Room Details Updated Successfully!!');

         }
        
 
    }
}