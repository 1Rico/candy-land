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
        $user = Auth::guard('web')->user();
        $measurement = $request['data'];

        //see how to use updateOrCreate
        //if user has no measurements already, create one
        if(!$user->measurement){
            $measurement['user_id'] = Auth::guard('web')->User()->id;
//            return response()->json(array('measurement'=> $measurement), 200);
            try{
                Measurement::create($measurement);
                return response()->json(array('measurements'=> $measurement), 200);
            } catch (\Exception $exception) {
                logger()->error($exception);
                return response()->json(array('error'=> $exception), 200);
            }
        } else {
            try {
                $data = $user->measurement;
                $data->update($measurement);
                $request->session()->flash('success', 'New customer added successfully.');
                return response()->json($request);
//                return response()->json(array('measurement2'=> $data), 200);
            } catch(\Exception $exception){
                logger()->error($exception);
                return response()->json(array('error2'=> $exception), 200);
            }
        }


        // Validate the form data
//        $this->validate($request, [
//            'neck'   => 'required|string|min:1|max:255',
//            'chest_bust' => 'required|string|min:1|max:255',
//            'shoulder_width' => 'required|string|min:1|max:255',
//            'arm_hole' => 'required|string|min:1|max:255',
//            'arm_or_sleeve_length' => 'required|string|min:1|max:255',
//            'pant_or_skirt_length' => 'required|string|min:1|max:255',
//            'inseam' => 'required|string|min:1|max:255',
//            'wrist' => 'required|string|min:1|max:255',
//            'high_bust' => 'required|string|min:1|max:255',
//            'under_bust' => 'required|string|min:1|max:255',
//            'waist' => 'required|string|min:1|max:255',
//            'hips' => 'required|string|min:1|max:255'
//        ]);




//        return redirect()->action('User\MeasurementController@getMeasurements')->with('success', 'Measurement Added Successfully');

    }



}