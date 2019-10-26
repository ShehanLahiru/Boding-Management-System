<?php

namespace App\Http\Controllers;
use Auth;
use App\Boarding;
use App\Charge;
use App\Facility;
use App\Room;
use App\Comment;
use App\Picture;
use Illuminate\Http\Request;
use DB;
use Image;

class BoardingDetailsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $boardings=Boarding::all();
        return view('listBoarding',['boardings'=>$boardings]);

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
        $request->validate(
            ['address_of_boarding' => 'required',
            'near_to' => 'required',
            'number_of_boarders' =>'required',
            'rent' =>'required',
            'security_cam_available' =>'required',
            'Chairs' =>'required',
            'Double_Beds' => 'required',
            'Fans' => 'required',
            'Single_Beds' => 'required',
            'Tables' => 'required',
            'Cupboards' => 'required',
            'electricity_bill'=>'required',
            'Meals'=>'required',
            'Water'=>'required',
            'Attached_washroom'=> 'required',
            'Washrooms' => 'required',
            'Bedrooms' => 'required',
            'Kitchen' => 'required',
            'main_pic' =>'required|image|max:2000'

        ],
        ['address_of_boarding.required'=> "Address is required",
        'near_to.required'=> "Fill out this field",
        'number_of_boarders.required'=> "Fill out this field",
        'security_cam_available.required'=> "Fill out this field",
        'Chairs.required'=> "Fill out this field",
        'Double_Beds.required'=> "Fill out this field",
        'Fans.required'=> "Fill out this field",
        'Single_Beds.required'=> "Fill out this field",
        'Tables.required'=> "Fill out this field",
        'Cupboards.required'=> "Fill out this field",
        'electricity_bill.required'=> "Fill out this field",
        'Meals.required'=> "Fill out this field",
        'Water.required'=> "Fill out this field",
        'Attached_washroom.required'=> "Fill out this field",
        'Washrooms.required'=> "Fill out this field",
        'Bedrooms.required'=> "Fill out this field",
        'Kitchen.required'=> "Fill out this field",
        'rent.required' => "Fill out this field",
        'rules.required' => "Fill out this field"

        ]
    ); 
       
       
       
       
        $address_of_boarding =$request->input('address_of_boarding');
        $accomadation_type =$request->input('accomadation_type');
        $available_for =$request->input('available_for');
        $number_of_boarders =$request->input('number_of_boarders');
        $rent =$request->input('rent');
        $security_cam_available =$request->input('security_cam_available');
        $near_to =$request->input('near_to');
        $rules=$request->input('rules');
        $user_id = \Auth::user()->id;
        
        $data = array('address_of_boarding'=>$address_of_boarding ,'accomadation_type'=>$accomadation_type,'available_for'=>$available_for ,'number_of_boarders'=>$number_of_boarders ,'rent'=>$rent,'security_cam_available'=>$security_cam_available,'near_to'=>$near_to ,'rules'=>$rules,'user_id'=>$user_id);
        DB::table('boardings')->insert($data);
        
        

        $boarding_no =DB::getPdo()->lastInsertId();
        $room_type="Washrooms";
        $number_of_rooms=$request->input('Washrooms');

       

        $data1 =array('boarding_no'=>$boarding_no,'room_type'=>$room_type, 'number_of_rooms'=>$number_of_rooms);
        DB::table('rooms')->insert($data1);

        
        $room_type2="Bedrooms";
        $number_of_rooms2=$request->input('Bedrooms');

       

        $data2 =array('boarding_no'=>$boarding_no,'room_type'=>$room_type2, 'number_of_rooms'=>$number_of_rooms2);
        DB::table('rooms')->insert($data2);

        $room_type3="Kitchen";
        $number_of_rooms3=$request->input('Kitchen');

        

        $data3 =array('boarding_no'=>$boarding_no,'room_type'=>$room_type3, 'number_of_rooms'=>$number_of_rooms3);
        DB::table('rooms')->insert($data3);

        $room_type4="Attached washroom";
        $number_of_rooms4=$request->input('Attached_washroom');

        

        $data4 =array('boarding_no'=>$boarding_no,'room_type'=>$room_type4, 'number_of_rooms'=>$number_of_rooms4);
        DB::table('rooms')->insert($data4);

        $facility_type1="Fans";
        $number_of_facility1=$request->input('Fans');

        

        $data5=array('boarding_no'=>$boarding_no,'facility_type'=>$facility_type1,'number_of_facility'=>$number_of_facility1);
        DB::table('facilities')->insert($data5);

        $facility_type2="Cupboards";
        $number_of_facility2=$request->input('Cupboards');

        

        $data6=array('boarding_no'=>$boarding_no,'facility_type'=>$facility_type2,'number_of_facility'=>$number_of_facility2);
        DB::table('facilities')->insert($data6);

        $facility_type3="Chairs";
        $number_of_facility3=$request->input('Chairs');

       

        $data7=array('boarding_no'=>$boarding_no,'facility_type'=>$facility_type3,'number_of_facility'=>$number_of_facility3);
        DB::table('facilities')->insert($data7);

        $facility_type4="Tables";
        $number_of_facility4=$request->input('Tables');

        

        $data8=array('boarding_no'=>$boarding_no,'facility_type'=>$facility_type4,'number_of_facility'=>$number_of_facility4);
        DB::table('facilities')->insert($data8);

        $facility_type5="Single Beds";
        $number_of_facility5=$request->input('Single_Beds');

       

        $data9=array('boarding_no'=>$boarding_no,'facility_type'=>$facility_type5,'number_of_facility'=>$number_of_facility5);
        DB::table('facilities')->insert($data9);

        $facility_type6="Double Beds";
        $number_of_facility6=$request->input('Double_Beds');

       

        $data10=array('boarding_no'=>$boarding_no,'facility_type'=>$facility_type6,'number_of_facility'=>$number_of_facility6);
        DB::table('facilities')->insert($data10);

        $charge_type1="Electricity";
        $availability1=$request->input('electricity_bill');

        

        $data11=array('boarding_no'=>$boarding_no,'charge_type'=>$charge_type1,'availability'=>$availability1);
        DB::table('charges')->insert($data11);

        $charge_type2="Meals";
        $availability2=$request->input('Meals');

       

        $data12=array('boarding_no'=>$boarding_no,'charge_type'=>$charge_type2,'availability'=>$availability2);
        DB::table('charges')->insert($data12);

        $charge_type3="Water";
        $availability3=$request->input('Water');

        

        $data13=array('boarding_no'=>$boarding_no,'charge_type'=>$charge_type3,'availability'=>$availability3);
        DB::table('charges')->insert($data13);

        if($request->hasFile('img'))
        {
            
            foreach( $request->img as $file)
            {
                $filename=$file->getClientOriginalName();
                $filesize=$file->getClientSize();
                Image::make($file)->resize(300,300)->save(public_path('/uploads/boardingpic/'. $filename));

                $file=new Picture;
                $file->picture=$filename;
                $file->boarding_no=$boarding_no;
                $file->save();


                
                
            }
        }
        
        

        if($request->hasFile('main_pic'))
        {
            $main_pic=$request->file('main_pic');
            $filename=time().'.'.$main_pic->getClientOriginalExtension();
            Image::make($main_pic)->resize(300,300)->save(public_path('/uploads/boardingpic/'. $filename));

            $data=new Picture;
            $data->picture=$filename;
            $data->boarding_no=$boarding_no;
            $data->main_pic="1";
            $data->save();

            
              
        }
       
        

        return redirect()->action('UserController@profile')->with('flash_message','New Boarding has been Added');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($boarding_no)
    {
        //
        
       

         $data=DB::table('boardings')
         ->where('boardings.boarding_no','=',$boarding_no)
         ->select('boarding_no','address_of_boarding','accomadation_type','available_for','number_of_boarders','rent','security_cam_available','near_to','user_id','rules')
         ->get();
 
         $adata=DB::table('boardings')
            ->where('boardings.boarding_no','=',$boarding_no)
            ->join('rooms','rooms.boarding_no','=','boardings.boarding_no')
            ->select('room_type','number_of_rooms')
            ->get();

        $bdata=DB::table('boardings')
            ->where('boardings.boarding_no','=',$boarding_no)
            ->join('facilities','facilities.boarding_no','=','boardings.boarding_no')
            ->select('facility_type','number_of_facility')
            ->get();

         $cdata=DB::table('boardings')
            ->where('boardings.boarding_no','=',$boarding_no)
            ->join('charges','charges.boarding_no','=','boardings.boarding_no')
            ->select('charge_type','availability')
            ->get(); 

        $edata=DB::table('boardings')
            ->where('boardings.boarding_no','=',$boarding_no)
            ->join('comments','comments.boarding_no','=','boardings.boarding_no')
            ->where('blocked','=',0)
            ->select('user_email','comment')
            ->get();

         $fdata=DB::table('boardings')
            ->where('boardings.boarding_no','=',$boarding_no)
            ->join('pictures','pictures.boarding_no','=','boardings.boarding_no')
            ->select('picture')
            ->get();
         
         return view('yourboarding',compact('adata','bdata','data','cdata','edata','fdata'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($boarding_no)
    {
        //
        $id1 = Auth::id();
        $data1=DB::table('boardings')
            ->where('boardings.boarding_no','=',$boarding_no)
            ->select('user_id')
            ->get();

        foreach($data1 as $x)
        {   
        if(($x->user_id)==$id1)   
        {
        $data=DB::table('boardings')
         ->where('boardings.boarding_no','=',$boarding_no)
         ->select('boarding_no','address_of_boarding','accomadation_type','available_for','number_of_boarders','rent','security_cam_available','near_to','user_id','rules')
         ->get();
        
        
        $adata=DB::table('boardings')
            ->where('boardings.boarding_no','=',$boarding_no)
            ->join('rooms','rooms.boarding_no','=','boardings.boarding_no')
            ->where('rooms.room_type','=','Washrooms')
            ->select('room_type','number_of_rooms')
            ->get();

        $bdata=DB::table('boardings')
            ->where('boardings.boarding_no','=',$boarding_no)
            ->join('rooms','rooms.boarding_no','=','boardings.boarding_no')
            ->where('rooms.room_type','=','Bedrooms')
            ->select('room_type','number_of_rooms')
            ->get();

        $cdata=DB::table('boardings')
            ->where('boardings.boarding_no','=',$boarding_no)
            ->join('rooms','rooms.boarding_no','=','boardings.boarding_no')
            ->where('rooms.room_type','=','Attached washroom')
            ->select('room_type','number_of_rooms')
            ->get();

        $ddata=DB::table('boardings')
            ->where('boardings.boarding_no','=',$boarding_no)
            ->join('rooms','rooms.boarding_no','=','boardings.boarding_no')
            ->where('rooms.room_type','=','Kitchen')
            ->select('room_type','number_of_rooms')
            ->get();

        $edata=DB::table('boardings')
            ->where('boardings.boarding_no','=',$boarding_no)
            ->join('facilities','facilities.boarding_no','=','boardings.boarding_no')
            ->where('facility_type','=','Chairs')
            ->select('facility_type','number_of_facility')
            ->get();

        $fdata=DB::table('boardings')
            ->where('boardings.boarding_no','=',$boarding_no)
            ->join('facilities','facilities.boarding_no','=','boardings.boarding_no')
            ->where('facility_type','=','Tables')
            ->select('facility_type','number_of_facility')
            ->get();

        $gdata=DB::table('boardings')
            ->where('boardings.boarding_no','=',$boarding_no)
            ->join('facilities','facilities.boarding_no','=','boardings.boarding_no')
            ->where('facility_type','=','Fans')
            ->select('facility_type','number_of_facility')
            ->get();

        $hdata=DB::table('boardings')
            ->where('boardings.boarding_no','=',$boarding_no)
            ->join('facilities','facilities.boarding_no','=','boardings.boarding_no')
            ->where('facility_type','=','Cupboards')
            ->select('facility_type','number_of_facility')
            ->get();

        $idata=DB::table('boardings')
            ->where('boardings.boarding_no','=',$boarding_no)
            ->join('facilities','facilities.boarding_no','=','boardings.boarding_no')
            ->where('facility_type','=','Double Beds')
            ->select('facility_type','number_of_facility')
            ->get();

        $jdata=DB::table('boardings')
            ->where('boardings.boarding_no','=',$boarding_no)
            ->join('facilities','facilities.boarding_no','=','boardings.boarding_no')
            ->where('facility_type','=','Single Beds')
            ->select('facility_type','number_of_facility')
            ->get();

        /*$ddata=DB::table('boardings')
            ->where('boardings.boarding_no','=',$boarding_no)
            ->join('rooms','rooms.boarding_no','=','boardings.boarding_no')
            ->where('rooms.room_type','=','Kitchen')
            ->select('room_type','number_of_rooms')
            ->get();*/
        
        $kdata=DB::table('boardings')
            ->where('boardings.boarding_no','=',$boarding_no)
            ->join('charges','charges.boarding_no','=','boardings.boarding_no')
            ->where('charges.charge_type','=','Electricity')
            ->select('charge_type','availability')
            ->get();
            
        $ldata=DB::table('boardings')
            ->where('boardings.boarding_no','=',$boarding_no)
            ->join('charges','charges.boarding_no','=','boardings.boarding_no')
            ->where('charges.charge_type','=','Meals')
            ->select('charge_type','availability')
            ->get();

        $mdata=DB::table('boardings')
            ->where('boardings.boarding_no','=',$boarding_no)
            ->join('charges','charges.boarding_no','=','boardings.boarding_no')
            ->where('charges.charge_type','=','Water')
            ->select('charge_type','availability')
            ->get();
        

        return view('editBoarding',compact('data','adata','bdata','cdata','ddata','edata','fdata','gdata','hdata','idata','jdata','kdata','ldata','mdata'));
        }

        else
        {
            return redirect()->action('UserController@profile');
        }
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
     
        
        
        $boarding=Boarding::where('boarding_no',$id)
                ->update([
                    'address_of_boarding'=>$request->input('address_of_boarding'),
                    'near_to'=>$request->input('near_to'),
                    'accomadation_type'=>$request->input('accomadation_type'),
                    'available_for'=>$request->input('available_for'),
                    'number_of_boarders'=>$request->input('number_of_boarders'),
                    'rent'=>$request->input('rent'),
                    'security_cam_available'=>$request->input('security_cam_available'),
                    'rent'=>$request->input('rent'),
                    'rules'=>$request->input('rules')


        ]);

        $room=Room::where('boarding_no',$id)
                ->where('room_type','Washrooms')
                ->update([
                    'room_type'=>"Washrooms",
                    'number_of_rooms'=>$request->input('Washrooms')

                 ]);

        $room=Room::where('boarding_no',$id)
                ->where('room_type','Bedrooms')
                ->update([
                     'room_type'=>"Bedrooms",
                     'number_of_rooms'=>$request->input('Bedrooms')
 
                  ]);

        $room=Room::where('boarding_no',$id)
                  ->where('room_type','Kitchen')
                  ->update([
                       'room_type'=>"Kitchen",
                       'number_of_rooms'=>$request->input('Kitchen')
   
                    ]);

        $room=Room::where('boarding_no',$id)
                    ->where('room_type','Attached washroom')
                    ->update([
                         'room_type'=>"Attached washroom",
                         'number_of_rooms'=>$request->input('Attached_washroom')
     
                      ]);
        
        $room=Facility::where('boarding_no',$id)
                      ->where('facility_type','Chairs')
                      ->update([
                           'facility_type'=>"Chairs",
                           'number_of_facility'=>$request->input('Chairs')
       
                        ]);

        $room=Facility::where('boarding_no',$id)
                        ->where('facility_type','Tables')
                        ->update([
                             'facility_type'=>"Tables",
                             'number_of_facility'=>$request->input('Tables')
         
                          ]);

        $room=Facility::where('boarding_no',$id)
                          ->where('facility_type','Fans')
                          ->update([
                               'facility_type'=>"Fans",
                               'number_of_facility'=>$request->input('Fans')
           
                            ]);

        $room=Facility::where('boarding_no',$id)
                            ->where('facility_type','Cupboards')
                            ->update([
                                 'facility_type'=>"Cupboards",
                                 'number_of_facility'=>$request->input('Cupboards')
             
                              ]);

        $room=Facility::where('boarding_no',$id)
                              ->where('facility_type','Single Beds')
                              ->update([
                                   'facility_type'=>"Single Beds",
                                   'number_of_facility'=>$request->input('Single_Beds')
               
                                ]);

        $room=Facility::where('boarding_no',$id)
                                ->where('facility_type','Double Beds')
                                ->update([
                                     'facility_type'=>"Double Beds",
                                     'number_of_facility'=>$request->input('Double_Beds')
                 
                                  ]);

        $room=Charge::where('boarding_no',$id)
                                  ->where('charge_type','Electricity')
                                  ->update([
                                       'charge_type'=>"Electricity",
                                       'availability'=>$request->input('electricity_bill')
                   
                                    ]);

        $room=Charge::where('boarding_no',$id)
                                    ->where('charge_type','Meals')
                                    ->update([
                                         'charge_type'=>"Meals",
                                         'availability'=>$request->input('Meals')
                     
                                      ]);

        $room=Charge::where('boarding_no',$id)
                                      ->where('charge_type','Water')
                                      ->update([
                                           'charge_type'=>"Water",
                                           'availability'=>$request->input('Water')
                       
                                        ]);

                return redirect()->action('UserController@profile')->with('flash_message','Boarding Details has been  updated');;
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
        
        $room = Room::where('boarding_no',$id)->delete();
        $charge = Charge::where('boarding_no',$id)->delete();
        $facility = Facility::where('boarding_no',$id)->delete();
        $picture=Picture::where('boarding_no',$id)->delete();
        $comment=Comment::where('boarding_no',$id)->delete();
        $boarding = Boarding::where('boarding_no',$id); 
        $boarding->delete();

        return redirect()->action('UserController@profile');
        
    }

    public function start()
    {
        return view('createBoarding');
    }

    public function allboardings()
    {
        $boardings=Boarding::all();
       
       
        foreach($boardings as $data)
        {
        $atts= DB::table('boardings')
                ->select('boardings.boarding_no','address_of_boarding','accomadation_type','available_for','number_of_boarders','rent','security_cam_available','near_to','user_id','rules','picture')
                ->join('pictures','boardings.boarding_no','=','pictures.boarding_no')
                ->where('pictures.main_pic','=',1)
                ->get();

                
        return view('AllBoardings',compact('atts'));
        }
    }

    public function easy($boarding_no)
    {
        
        $data=DB::table('boardings')
                ->where('boardings.boarding_no','=',$boarding_no)
                ->select('boarding_no','address_of_boarding','accomadation_type','available_for','number_of_boarders','rent','security_cam_available','near_to','user_id','rules')
                ->get();
        
        $adata=DB::table('boardings')
                ->where('boardings.boarding_no','=',$boarding_no)
                ->join('rooms','rooms.boarding_no','=','boardings.boarding_no')
                ->select('room_type','number_of_rooms')
                ->get();

        $bdata=DB::table('boardings')
                ->where('boardings.boarding_no','=',$boarding_no)
                ->join('facilities','facilities.boarding_no','=','boardings.boarding_no')
                ->select('facility_type','number_of_facility')
                ->get();

        $cdata=DB::table('boardings')
                ->where('boardings.boarding_no','=',$boarding_no)
                ->join('charges','charges.boarding_no','=','boardings.boarding_no')
                ->select('charge_type','availability')
                ->get(); 
                
        $ddata=DB::table('boardings')
                ->where('boardings.boarding_no','=',$boarding_no)
                ->join('users','users.id','=','boardings.user_id')
                ->select('name', 'email','nicno','contactno','address')
                ->get();

        $edata=DB::table('boardings')
                ->where('boardings.boarding_no','=',$boarding_no)
                ->join('comments','comments.boarding_no','=','boardings.boarding_no')
                ->where('blocked','=',0)
                ->select('user_email','comment')
                ->get();

        $fdata=DB::table('boardings')
                ->where('boardings.boarding_no','=',$boarding_no)
                ->join('pictures','pictures.boarding_no','=','boardings.boarding_no')
                ->select('picture')
                ->get();
        
        return view('viewBoarding',compact('data'),compact('adata','bdata','cdata','ddata','edata','fdata'));

    }

    public function addcomment(Request $request)
    {
        //$comment =$request->input('comment');
        echo sahan;
        
        /*$boarding_no =$boarding_no->input('boarding_no');
        $user_id =1;
        $user_id =DB::table('boardings')
                 ->where('boardings.boarding_no','=',$boarding_no)
                 ->select('user_id')
                 ->get();
        $comment =$request->input('comment');
        $bloacked=0;

        $data14=array('boarding_no'=>$boarding_no,'user_id'=>$user_id,'comment'=>$comment,'blocked'=>$bloacked);
        DB::table('comments')->insert($data14);

        return view('viewBoarding');*/
        
    }

    public function search(Request $request)
    {
        
        $boardings=Boarding::all();
        $search=$request->get('search');
        
        foreach($boardings as $data)
        {
       
            
            $atts=DB::table('boardings')->join('pictures','boardings.boarding_no','=','pictures.boarding_no')
                                        ->where('pictures.main_pic','=',1)
                                        ->where(function($query) use ($search){
                                                return $query->where('boardings.boarding_no','like','%'.$search.'%')
                                                             ->orWhere('address_of_boarding','like','%'.$search.'%')
                                                             ->orwhere('accomadation_type','like','%'.$search.'%')
                                                             ->orWhere('available_for','like','%'.$search.'%');
                                        })
                                        
                                        ->select('boardings.boarding_no','address_of_boarding','accomadation_type','available_for','number_of_boarders','rent','security_cam_available','near_to','user_id','rules','picture')
                                        ->get();
           
           
           
           
           
            /* $atts=DB::table('boardings')->join('pictures','boardings.boarding_no','=','pictures.boarding_no')
                                        ->where('pictures.main_pic','=',1)
                                        ->when($search,function($query,$search){

                                            return $query->where('boardings.boarding_no','like','%'.$search.'%');
                                        })
                                        
                                                   // ->orWhere('address_of_boarding','like','%'.$search.'%')
                                                    //->orwhere('accomadation_type','like','%'.$search.'%')
                                                    //->orWhere('available_for','like','%'.$search.'%');
                        
            
                                        
                                        
                                        ->select('boardings.boarding_no','address_of_boarding','accomadation_type','available_for','number_of_boarders','rent','security_cam_available','near_to','user_id','rules','picture')
                                        ->get();*/

           
        
                return view('AllBoardings',compact('atts'));
        }

    }

    public function find(request $request )
    {
        
        
        
        
        $accomadation_type = $request->Input('accomadation_type'); 
        $available_for = $request->Input('available_for'); 
        $numbers_of_boarders = $request->Input('numbers_of_boarders'); 
        $rent = $request->Input('rent'); 
        $Electricity = $request->Input('Electricity'); 
    


        if($rent=='b1')
        {
            $low = 0;
            $high = 1500;

            if($numbers_of_boarders=='a1')
            {
                $low1=0;
                $high1=5;
            }

            elseif($numbers_of_boarders=='a2')
            {
                $low1=5;
                $high1=10;
            }

            elseif($numbers_of_boarders=='a3')
            {
                $low1=10;
                $high1=20;
            }

            else
            {
                $low1=20;
                $high1=100;
            }
            

        }

        elseif($rent=='b2')
        {
            $low = 1500;
            $high = 2500;

                if($numbers_of_boarders=='a1')
            {
                $low1=0;
                $high1=5;
            }

            elseif($numbers_of_boarders=='a2')
            {
                $low1=5;
                $high1=10;
            }

            elseif($numbers_of_boarders=='a3')
            {
                $low1=10;
                $high1=20;
            }

            else
            {
                $low1=20;
                $high1=100;
            }
            
        }
        elseif($rent=='b3')
        {
            $low = 2500;
            $high = 100000;

                if($numbers_of_boarders=='a1')
            {
                $low1=0;
                $high1=5;
            }

            elseif($numbers_of_boarders=='a2')
            {
                $low1=5;
                $high1=10;
            }

            elseif($numbers_of_boarders=='a3')
            {
                $low1=10;
                $high1=20;
            }

            else
            {
                $low1=20;
                $high1=100;
            }
            
        }
       



        $atts =DB::table('boardings')
        ->where('rent','>=',$low)
        ->where('rent','<',$high)
        ->where('number_of_boarders','>=',$low1)
        ->where('number_of_boarders','<',$high1)
        ->where('accomadation_type','=',$accomadation_type)
        ->where('available_for','=',$available_for)
        ->join('pictures','boardings.boarding_no','=','pictures.boarding_no')
        ->where('pictures.main_pic','=',1)
        ->select('boardings.boarding_no','address_of_boarding','accomadation_type','available_for','number_of_boarders','rent','security_cam_available','near_to','user_id','rules','picture')
        ->get();
        

        //echo "<pre>";
        //print_r ($atts);
       return view('AllBoardings',compact('atts'));
    

    }

    public function changeBoardingpic($boarding_no)
    {
        $data=DB::table('pictures')
            ->where('boarding_no','=',$boarding_no)
            ->get();

        return view('changeBP',compact('data'));
    }

    public function changeBP(request $request,$Picture_id)
    {
        if($request->hasFile('boarding_pic'))
        {
            $boardingpic=$request->file('boarding_pic');
            $filename=time().'.'.$boardingpic->getClientOriginalExtension();
            Image::make($boardingpic)->resize(300,300)->save(public_path('/uploads/boardingpic/'. $filename));

            $picture=Picture::where('Picture_id',$Picture_id)
                ->update([
                        'picture'=>$filename


                ]);
        }

        return redirect()->action('UserController@profile')->with('flash_message','Boarding pictures has been updated');
    }


}

