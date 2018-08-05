<?php

namespace App\Http\Controllers\Tailor;

use App\Models\Design;
use function GuzzleHttp\Psr7\str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Intervention\Image\Facades\Image;
use Auth;

class DesignController extends Controller
{
    private $photos_path;

//    public function __construct()
//    {
//        $this->photos_path = public_path('assets/images');
//    }

    public function viewDesign()
    {

    }

    public function getDesigns()
    {
        $tailor = Auth::guard('tailor')->User();
        $designs = $tailor->designs()->orderBy('created_at', 'DESC')->get();
        return view('tailor.designs', compact('tailor', 'designs'));
    }

    public function createDesign()
    {
        $tailor = Auth::guard('tailor')->User();
//        dd($tailor->stores);
        return view('tailor.add_design', compact('tailor'));
    }

    public function saveDesign(Request $request)
    {
        $design = new Design();
        $design->name = $request->name;
        $design->duration = $request->duration;
        $design->description = $request->description;
        $design->status = $request->status;
        $design->amount = $request->amount;
        $design->discount_amount = $request->discount_amount;
        $design->store_id = $request->store_id;

        $design->save();

        $photos = $request->file('image');
        $filename = str_replace(' ','-',$design->name.sha1(date('YmdHis')));

        for ($i = 0; $i < count($photos); $i++) {
            $photo = $photos[$i];
//            $name = sha1(date('YmdHis') . str_random(30));
//            $save_name = $name . '.' . $photo->getClientOriginalExtension();
//            $resize_name = $name . str_random(2) . '.' . $photo->getClientOriginalExtension();

            $design
                ->addMedia($photo)
                ->usingName($filename)
                ->withResponsiveImages()
                ->toMediaCollection();

              }


        return redirect()->action('Tailor\DesignController@getDesigns')->with('success', 'Design Added Successfully');
    }
}
