<?php


namespace App\Http\traits;

use App\Models\Room;

trait QueryTrait{
    public function room($id)
    {
        $single=Room::where('id',$id)->first();
        return $single;

    }




}


