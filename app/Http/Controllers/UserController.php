<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use Image;
use App\Boarding;
use App\User; 
use DB;
use Gate;


class UserController extends Controller
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
        $user = User::find($id);

        $boardings = Boarding::where('user_id',$user->id)->get();
        return view('UserDetails',compact('user','boardings'));
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
        

        $id1 = Auth::id();
        
        if($id1==$id)
        {
            $user = User::find($id);
            return view('editProfile',compact('user'));
        }

        else
        {
            return redirect()->action('UserController@profile');
        }
        

        
        
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
         $user = User::find($id); 
         $user->username=$request->username;
         $user->name=$request->name;
         $user->nicno =$request->nicno;
         $user->email =$request->email;
         $user->address =$request->address;
         $user->contactno =$request->contactno;
         
         $user->update();

         return redirect()->action('UserController@profile')->with('flash_message','Profile details has been updated');;

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
        
        $user = User::find($id);
        $user->delete();
        
        if($user->admin==0)
        {
            return redirect()->back()->with('warning_message','User have been Removed');
        }
        if($user->admin==1)
        {
            return redirect()->back()->with('warning_message','Administer Have been Removed');
        }

        
    }

    public function profile()
    {
        $user = Auth::user();
        $boardings = Boarding::where('user_id',$user->id)->get();
        return view('Profile',compact('user','boardings'));
        
        //return view('Profile',array('user'=>Auth::user()));
    }

    public function update_profilepic(request $request)
    {
        if($request->hasFile('profilepic'))
        {
            $profilepic=$request->file('profilepic');
            $filename=time().'.'.$profilepic->getClientOriginalExtension();
            Image::make($profilepic)->resize(300,300)->save(public_path('/uploads/profilepics/'. $filename));

            $user=Auth::user();
            $user->profilepic=$filename;
            $user->save();
        }

       // return view('Profile',array('user'=>Auth::user()));
       return redirect()->back()->with('flash_message','Profile picture has been  updated');
    }

    public function admin()
    {
        if(Gate::allows('isAdmin'))
        { 
            $users=User::all();
            return view('admin',compact('users'));
        }
        else
        {
            return view('welcome');
        }
    }

    public function Pchange($id)
    {
        $users=DB::table('users')
            ->where('id','=',$id)
            ->get();
            
        return view('changePw',compact('users'));
    }
    public function passwordChange(request $request,$id)
    {
        /*$oldpassword=$request->input('passwordO');
        $newpassword=$request->input('password');
        $Confirmpassword=$request->input('password_confirmation');

        $opassword=encrypt($oldpassword);

        echo "<pre>";
        print_r($opassword);*/

       
    }

    

  
}
