<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Comment;
use App\UserComment;
use Auth;
use Gate;

class CommentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $user_email =$request->input('user_email');
        $boarding_no =$request->input('boarding_no');
        $comment=$request->input('comment');
        $blocked="0";
        
        
        $data =array('boarding_no'=>$boarding_no,'user_email'=>$user_email, 'comment'=>$comment,'blocked'=>$blocked);
        DB::table('comments')->insert($data);

        $adata=DB::table('comments')
                ->select('user_email')
                ->groupBy('user_email')
                ->get();

        $value1=DB::table('user_comments')
                ->select('no_of_comments',	'mail_id','user_email')
                ->where('user_email','=',$user_email)
                ->get();

                //echo "<pre>";
                //print_r($adata);

        $check=false;
        
        foreach($value1 as $value)
        {
            if($value->user_email==$user_email)
            {
                $check=true;
                //$count=$value->no_of_comments;
                $count=$value->no_of_comments;

               

                $usersC=UserComment::where('mail_id',$value->mail_id)
                ->update([
                    'no_of_comments'=>$count+1
                    
                ]);
            }
        }

        if(!$check)
        {   
            //$user_email=$user_email;
            $no_of_comments=1;
            $no_of_blocked=0;

            $data1 =array('user_email'=>$user_email, 'no_of_comments'=>$no_of_comments,'no_of_blocked'=>$no_of_blocked);
            DB::table('user_comments')->insert($data1);

        }

        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function adminview()
    {
        if(Gate::allows('isAdmin'))
        { 
            $id1 = Auth::id();

            $data1=DB::table('users')
                ->where('users.id','=',$id1)
                ->select('admin')
                ->get();

            
            
            foreach($data1 as $a)
            {
                if(($a->admin)==1)
                {
                    $data=Comment::all();
                    //echo "<pre>";
                    //print_r($data);

                    return view('allcomments',compact('data'));
                }
                if(($a->admin)==0)
                {
                    return redirect()->action('UserController@profile');
                
                }
            }
        }
        else
        {
            return view('welcome');
        }
    }

    public function deleteComment($comment_id)
    {
        if(Gate::allows('isAdmin'))
        { 
        
            $comment=Comment::where('comment_id',$comment_id)
                    ->update([
                            'blocked'=>1


                    ]);
                    
        $comment1=DB::table('comments')
                        ->where('comment_id','=',$comment_id)
                        ->join('user_comments','comments.user_email','=','user_comments.user_email')
                        ->select('comments.user_email')
                        ->get();

                    // echo "<pre>";
                    // print_r($comment1);

            foreach($comment1 as $value)
            {
                $value1=DB::table('user_comments')
                            ->where('user_comments.user_email','=',$value->user_email)
                            ->select('no_of_comments','mail_id','user_email','no_of_blocked')
                            ->get();
            
            
            } 
            //echo "<pre>";
            //print_r($value1);           
            
        foreach($value1 as $val)
        {
                $count=$val->no_of_blocked;
        }
            
        foreach($value1 as $value)
            {
                $comment=UserComment::where('user_email',$value->user_email)
                    ->update([
                            'no_of_blocked'=>$value->no_of_blocked+1


                    ]);
            }

            return redirect()->back();
        }
        else
        {
            return view('welcome');
        }
    }

    public function usermail()
    {
        if(Gate::allows('isAdmin'))
        { 
            $comment_user=DB::table('user_comments')
                    ->select('mail_id','user_email','no_of_comments','no_of_blocked','blocked')
                    ->get();

            return view('usercomments',compact('comment_user'));
        }
        else
        {
            return view('welcome');
        }

    }

    public function blockuser($mail_id)
    {
        if(Gate::allows('isAdmin'))
        { 
            $data=UserComment::where('mail_id',$mail_id)
                
            ->update([
                    'blocked'=>1

                    
            ]);
            return redirect()->back()->with('warning_message','User has been Blocked');
        }
        else
        {
            return view('welcome');
        }
    }

    public function unblockuser($mail_id)
    {
        if(Gate::allows('isAdmin'))
        { 
            $data=UserComment::where('mail_id',$mail_id)
                
            ->update([
                    'blocked'=>0

                    
            ]);
            return redirect()->back()->with('flash_message','User has been Unblocked');;
        }
        else
        {
            return view('welcome');
        }
    }
}
