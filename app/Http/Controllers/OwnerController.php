<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use DB;
use Auth;
use Illuminate\Support\Facades\Input;


class OwnerController extends HomeController
{
    public function owed()
    {	
		//$user = Auth::user()->id;
		//dd($user);
		$data = Input::get('ch');
		$black = Input::get('chn');
		//dd($data[0]);
		if ($data != null){
			for ($x = 0; $x <= count($data)-1 ; $x++)  {
            $room_id = DB::table('bookings')->select('room_id')->where('id',$data[$x])->get();
		//dd($room_id[0]->room_id);
		//dd($room_id->room_id);
		//$price = DB::table('rooms')->select('price')->where('id',$room_id);
		$owner_id = DB::table('rooms')->select('ownerID')->where('id',$room_id[$x]->room_id)->get();
		$price = DB::table('rooms')->select('price')->where('id',$room_id[$x]->room_id)->get();
		//dd($price[0]->price);
		$last_owe = DB::table('hotels')->select('Owed_to_broker')->where('id',$data)->get();
		//dd($last_owe[0]->Owed_to_broker);
        DB::table('hotels')
                ->where('id', $owner_id[$x]->ownerID)
                ->update(['Owed_to_broker'=> $last_owe[$x]->Owed_to_broker + ($price[$x]->price)*0.09 ]);
		DB::table('bookings')
				->where('id', $data[$x])
                ->update(['show_flag'=> '1' ]);
		}
        }
		if ($black != null){
			for ($y = 0; $y <= count($black)-1 ; $y++)  {
            $client = DB::table('bookings')->select('client_id')->where('id',$black[$y])->get();
		DB::table('blacklisted_user')->insert(
		['id' => (int)$client[$y]->client_id, 'blacklist_date' => date("Y-m-d H:i:s"), 'reactivation_date' => Date("Y-m-d H:i:s", strtotime("+7 days"))]
		);
		DB::table('bookings')
				->where('id', $black[$y])
                ->update(['show_flag'=> '1' ]);
		}
		
		return back()->withInput(); 
    }
	}
	
	public function getBookings()
    {	
		$user = Auth::user()->id;
		$rooms = DB::table('rooms')->select('id')->where('ownerID', $user)->get();
        //$hotel = DB::table('hotel')->where('password', $password)->whereNull('show_flag')->get();
		for ($x = 0; $x <= count($rooms)-1 ; $x++)  {
        $bookings = DB::table('bookings')->whereNull('show_flag')->get();
		}
	    return view('Bookings', ['bookings' => $bookings]);
    } 
}
