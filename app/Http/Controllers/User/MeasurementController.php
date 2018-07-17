<?php

namespace App\Http\Controllers\User;

use App\Models\Measurement;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Models;
use Auth;

class MeasurementController extends Controller
{
    public function getMeasurements()
    {
        $user = Auth::guard('web')->User();
//        dd($user->measurements);
        return view('user.measurements', compact('user'));
    }
     public function saveMeasurement(Request $request)
     {
         // Validate the form data
         $this->validate($request, [
             'neck'   => 'required|string|min:1|max:255',
             'chest_bust' => 'required|string|min:1|max:255',
             'shoulder_width' => 'required|string|min:1|max:255',
             'arm_hole' => 'required|string|min:1|max:255',
             'arm_or_sleeve_length' => 'required|string|min:1|max:255',
             'pant_or_skirt_length' => 'required|string|min:1|max:255',
             'inseam' => 'required|string|min:1|max:255',
             'wrist' => 'required|string|min:1|max:255',
             'high_bust' => 'required|string|min:1|max:255',
             'under_bust' => 'required|string|min:1|max:255',
             'waist' => 'required|string|min:1|max:255',
             'hips' => 'required|string|min:1|max:255'
         ]);

         $measurement = new Measurement();

         $measurement->neck = $request->neck;
         $measurement->chest_bust = $request->chest_bust;
         $measurement->shoulder_width = $request->shoulder_width;
         $measurement->arm_hole = $request->arm_hole;
         $measurement->arm_or_sleeve_length = $request->arm_or_sleeve_length;
         $measurement->pant_or_skirt_length = $request->pant_or_skirt_length;
         $measurement->inseam = $request->inseam;
         $measurement->wrist = $request->wrist;
         $measurement->high_bust = $request->high_bust;
         $measurement->under_bust = $request->under_bust;
         $measurement->waist = $request->waist;
         $measurement->hips = $request->hips;
         $measurement->user_id = Auth::guard('web')->User()->id;

         $measurement->saveOrFail();

         return redirect()->back()->with('success', 'Measurement Added Successfully');
     }
}