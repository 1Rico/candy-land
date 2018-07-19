<?php

namespace App\Http\Controllers\Tailor;

use App\Models\Design;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;

class DesignController extends Controller
{
    public function viewDesign()
    {
        $design = Design::findOrFail(2);
        $url = 'https://pumpandhodl.com/images/1.jpg';

//        $design->addMediaFromUrl($url)->toMediaCollection();

        $media = $design->getMedia();

//        $mediaItems = $design->getMedia();
//        $url = $mediaItems[2]->getUrl();
//        dd($media);

    }

    public function getDesigns()
    {
        $tailor = Auth::guard('tailor')->User();
//        dd($tailor->designs);
        return view('tailor.designs', compact('tailor'));
    }

    public function createDesign()
    {
        $tailor = Auth::guard('tailor')->User();
//        dd($tailor->stores);
        return view('tailor.add_design', compact('tailor'));
    }

    public function saveDesign(Request $request)
    {
        $data = $request->all();
        $design = Design::create($data);
    }
}
