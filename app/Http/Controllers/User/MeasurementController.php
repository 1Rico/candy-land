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
//        dd($user->measurement);
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

        $measurement = $request->all();
        $measurement['user_id'] = Auth::guard('web')->User()->id;
        try{
            Measurement::create($measurement);
        } catch (\Exception $exception) {
            logger()->error($exception);
            return redirect()->back()->with('error', 'Measurement could not be saved!');
        }

        return redirect()->action('User\MeasurementController@getMeasurements')->with('success', 'Measurement Added Successfully');

    }



}