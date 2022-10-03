<?php

namespace App\Http\Controllers;

use Exception;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    //
    public function getuser()
    {

         //DB::update('update users set email ="faheem_charsi@gmail.com" where email=?',['fahmeem@gmail.com']);
        //DB::insert('insert into users (name,email,password) values(?,?,?)',['faheem charsi','fahmeem@gmail.com','password']);
        //DB::delete('delete from users where id =?',['4']);

        $user=DB::table('users')->where('id',1)->get();
        return view('welcome')->with('user',$user);





        //$user=DB::select("Select * from users where id =? ",[1]);
        //$user_name=DB::select("select users.name,users.email ,users.password from users where name =?",['Payton Wilderman']);
        //$user=DB::select("Select * from users");
        //dd($user_name);
        //return view('welcome')->with('user',$user)->with('name',$user_name);
        //dd($user);

        // return response()->json([
        //     "data" => [
        //       "user" => $user,
        //     ]
        // ]);
    }


    public function createTransaction()
    {
        return view('User.trans');
    }


    public function store(Request $request)
    {

        try{
            $sender=User::find($request->sender_id);
            $receiver=User::find($request->receiver_id);
            if($sender && $receiver )
            {
                $create=DB::Table('payments')->insert([
                    'sender_id' => $request->sender_id,
                    'receiver_id'=> $request->receiver_id,
                    'amount'=> $request->amount
                ]);
            }



            if(!$sender || !$receiver)
            {
                throw new \Exception('one of the user is not found');
            }


        }catch(\Exception $e)
        {
            return back()->withError($e->getMessage())->withInput();
        }
        return view('User.trans');

    }


    public function tb()

    {
        DB::transaction(function () {
            try{
                DB::table('users')->delete();
                $result=DB::table('users')->where('id',2)->update(['email','email@email.com']);
                if(!$result){
                    throw new \Exception();
                }
            }

            catch(\Exception $e)
            {
                DB::rollBack();
            }

        });

        return  view('welcome');
    }



    public function comments()
    {
        //$comments=DB::table('comments')->get();

        $comments=DB::table('users')->join('comments','comments.user_id','users.id')->select('users.name','comments.*')->get();
        //dd($comments);
        return view('user.comment',compact('comments'));
    }

}
