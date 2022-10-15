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

        //  $result=DB::table('comments')->whereRaw("Match(context) AGAINST (? IN BOOLEAN MODE)",['+cute -cops'])->get();
        //  dump($result);
        // $result=DB::table('comments')->where('context','LIKE','%'.'cute'.'%')->get();
        // dump($result);

        //$result=DB::table('comments')
        //->select(DB::raw('count(user_id) as number_of_comments,users.name'))
        //->selectRaw("count(user_id) as number_of_comments,users.name,users.email")
        //->join('users','users.id','=','comments.user_id')
        //->groupBy('user_id')
        //->get();

        // $result=DB::table('comments')->orderByRaw('updated_at - created_at DESC')
        // ->get();
        // $result=DB::table('users')->selectRaw("LENGTH (name) as user_name,name")
        // ->orderByRaw('LENGTH(name) DESC')->get();
        // dump($result);
        // $result=DB::table('comments')->selectRaw('count(id) as number_of_5star,rating')
        // ->groupBy('rating')
        // //->select('comments.*')
        // ->having('rating','=',2)
        // $result=DB::table('comments')->offset(1)
        // ->limit(5)

        // ->get();

        // $room_id=3;
        // $result=DB::table('reservations')
        // ->when($room_id,function($query,$room_id){
        //     return $query->where('room_id',$room_id);
        // })->get();

        // $sort_by=NULL;
        // $result=DB::table('rooms')->when($sort_by,function($query,$sort_by){
        //     return $query->orderBy($sort_by);
        // },function($query){
        //     return $query->orderBy('price');
        // })->get();

        $result=DB::table('comments')->orderBy('id')->chunk(2,function($comments){
            foreach($comments as $comment){
                if($comment->id==5){
                    return false;
                }
            }
        });
        dump($result);
         return view('room.index',compact('result'));
    }


    public function city()
    {

        // $result=DB::table('reservations')->join('rooms','rooms.id','=','reservations.room_id')
        // ->join('users','users.id','=','reservations.user_id')
        // ->join('cities','cities.id','=','reservations.city_id')
        // ->where('rooms.id',1)
        // ->where('users.id',2)
        // ->select('users.name','users.email','reservations.check_in','reservations.check_out','rooms.room_number','rooms.price','cities.name as city_name')
        // ->get();

        $result=DB::table('reservations')->join('rooms',function($join){
                  $join->on('reservations.room_id','=','rooms.id')
                  ;
        })->join('users',function($join){
              $join->on('reservations.user_id','users.id')
              ->where('users.id','>',3);
        })->join('cities',function($join){
            $join->on('reservations.city_id','=','cities.id')->selectRaw('cities.name as city_name');
        })->get();


        dump($result);
        return view('room.index',compact('result'));
    }
}
