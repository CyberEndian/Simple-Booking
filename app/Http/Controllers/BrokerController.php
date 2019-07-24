<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use DB;
use Illuminate\Support\Facades\Input;


class BrokerController extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
	
	
	public function getPending()
    {
        $rooms = DB::table('rooms')->get()->where('approved', '0');

        return view('PendingRooms', ['rooms' => $rooms]);
    } 
    public function doApprove()
{
        
        $data = Input::get('ch');
				dd($data);

        for ($x = 0; $x <= count($data)-1 ; $x++)  {
            DB::table('rooms')
                ->where('id', $data[$x])
                ->update(['approved' => 1 ]);
        }
     
         return back()->withInput(); 
    }
     public function doSuspend()
{

        
            DB::table('hotels')
                ->where('hotelname', $hotelName)
                ->update(['suspended' => 1 ]);
       
        return "Hotel suspended successfully ";
    }
    
   
       public function getHotels()
{
        
               $hotels = DB::table('hotels')->get();
                return view('Hotels', ['hotels' => $hotels]);

        
           
    }
    
    

    
    
        

    }
