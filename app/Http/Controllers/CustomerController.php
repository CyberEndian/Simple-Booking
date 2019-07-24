<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use yajra\Datatables\Datatables;

class CustomerController extends BrokerController
{
    
     public function datatable()
    {
        return view('datatable');
    }


    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function getPosts()
    {
    	$users = DB::table('rooms')->join('hotels', 'rooms.ownerID', '=', 'hotels.ID')->select('rooms.*')->where([['approved', '1'],['suspended', '0']]);
        return Datatables::of($users)
            ->make(true);
    }
    
    public function Book() //not fin
    {
         $data = Input::get('ch');

        for ($x = 0; $x <= count($data)-1 ; $x++)  {
            DB::table('rooms')
                ->where('id', $data[$x])
                ->update(['approved' => 1 ]);
        }
        
        
        
    }
    
    
    
    
    //
}
