<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\traits\QueryTrait;
use Illuminate\Support\Facades\DB;
//use App\Http\Trait\QueryTrait;
//use Illuminate\Support\Facades\DB;

class RoomController extends Controller
{
    //
    use QueryTrait;

    public function index()
    {
        //$result=$this->room(1);
        //dd($result);
        // $room=DB::table('rooms')->where([
        //     ['price','<',200],
        //     ['size','>', 2]
        // ])->get();
        //$room=DB::table('rooms')->where('size',2)->orWhere('price','>','200')->get();
        $room=DB::Table('rooms')->where('price','>',200)->where(function($query){
            $query->where('size','>',2)->where('size','<',4);
        })->get();

        dump($room);
        return view('room.index',compact('room'));
    }


    public function res()
    {
        // $resv=DB::table('rooms')->whereNotIn('size',['1','2'])->get();
        // dump($resv);
        //$resv=DB::table('reservations')->whereDay('created_at','04')->get();
          $resv=DB::table('users')->whereExists(function($query){
            $query->select('id')
            ->from('reservations')
            ->whereRaw('reservations.user_id = users.id')
            ->where('check_in','=','2022-09-29')
            ->limit(1);
          })->get();
          dump($resv);
        return view('room.index',compact('resv'));
    }


    public function users()
    {
        // $result=DB::table('users')->whereJsonContains('meta->skills','cakephp')
        // ->where('meta->setting->site_background','=','white')->get();
        // dump($result);
        // return view('room.index',compact('result'));

        //$result=DB::statement('ALTER Table comments ADD FULLTEXT fulltext_index (context)');
         //dump($result);

         $result=DB::table('comments')->whereRaw("Match(context) AGAINST (? IN BOOLEAN MODE)",['+cute -cops'])->get();
         dump($result);
        // $result=DB::table('comments')->where('context','LIKE','%'.'cute'.'%')->get();
        // dump($result);
         return view('room.index',compact('result'));
    }
}
