<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use yajra\Datatables\Datatables;

class CustomerController extends BrokerController
{
    
     public function owed()
    {
		$price = DB::table('hotels')->select('price')->where('id',$id);
		$last_owe = DB::table('hotels')->select('Owed_to_broker')->where('id',$id);

        DB::table('hotels')
                ->where('id', $id)
                ->update(['Owed_to_broker' => last_owe + price*0.9 ]);
				
		
    }
	
	public function getBookings()
    {
        $bookings = DB::table('bookings')->get()->whereNull('show_flag');

        return view('Bookings', ['bookings' => $bookings]);
    } 
}


  
        
        
    
    


