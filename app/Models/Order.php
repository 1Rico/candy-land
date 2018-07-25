<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{

    protected $dates = [
        'completion_date'
    ];

    public function design()
    {
        return $this->belongsTo(Design::class);
    }

    public function getStatusAttribute($code)
    {
        $status = '';
        switch($code){
            case 3:
                $status = 'New Order';
            break;
            case 2:
                $status = 'Tailor Sewing';
                break;
            case 1:
                $status = 'Completed';
                break;
            case 0:
                $status = 'Delivered';
                break;
            default:
                $status = 'Unknown';
        }
        return $status;

    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

//    public function scopeTailorOrders($query)
//    {
//        return $query->where('tailor_id', $tailor->id)->orderBy('created_at', 'desc')->get();
//    }
}
