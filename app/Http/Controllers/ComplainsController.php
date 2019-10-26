<?php

namespace App\Http\Controllers;
use App\Complain;
use App\Boarding;
use Illuminate\Http\Request;
use DB;
use Auth;
use Gate;

class ComplainsController extends Controller
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
        $user_email =$request->input('user_mail');
        $boarding_no =$request->input('boarding_no');
        $complain=$request->input('complain');
        $complain_about=$request->input('complain_about');
        $state="0";
        
        
        $data =array('boarding_no'=>$boarding_no,'user_email'=>$user_email, 'complain'=>$complain, 'complain_about'=>$complain_about ,'state'=>$state);
        DB::table('complains')->insert($data);

        return redirect('/viewBoarding'.$boarding_no);
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

    public function form($boarding_no)
    {
        $data=DB::table('boardings')
            ->where('boarding_no','=',$boarding_no)
            ->get();
        return view('YourComplain',compact('data'));
    }

    public function viewComplain()
    {
        
        if(Gate::allows('isAdmin'))
        {    
            $data=DB::table('complains')
                ->get();

            return view('AllComplains',compact('data'));
        }
        else
        {
            return view('welcome');
            
        }    
       
        
    }

    public function receive($complain_id)
    {
        
        if(Gate::allows('isAdmin'))
        {
            $complain=Complain::where('complain_id',$complain_id)
                    ->update([
                            'state'=>1


                    ]);

        return redirect()->back()->with('flash_message','The complain is marked as Received');
        }
        else
        {
            return view('welcome');
        }
    
    }

    public function solve($complain_id)
    {
        if(Gate::allows('isAdmin'))
        {
            $complain=Complain::where('complain_id',$complain_id)
                    ->update([
                            'state'=>2


                    ]);

            return redirect()->back()->with('flash_message','The complain is marked as Solved');
        }
        else
        {
            return view('welcome');
        }
    }

    public function deleteComplain($id)
    {
        //
        if(Gate::allows('isAdmin'))
        {
            $complain=Complain::where('complain_id',$id)->delete();
            
            return redirect()->back()->with('warning_message','The complain is deleted');
        }
        else
        {
            return view('welcome'); 
        }
    }
}