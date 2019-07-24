@extends('layouts.app')
 
@section('content')
<form action="{{ url('owed') }}" method="POST">
            {{ csrf_field() }}
          
<table class="table" id="table">
    <thead>
        <tr>
          
            <th class="text-center">ID</th>
            <th class="text-center">Room ID</th>
            <th class="text-center">Start Date</th>
            <th class="text-center">End Date</th>
			<th class="text-center">Show</th>
			<th class="text-center">Didn't Show</th>

        </tr>
    </thead>
   
    <tbody>




@foreach ($bookings as $bookings)
 <tr>	
            <td class="text-center">	{{ $bookings->id }}</td>
            <td class="text-center">	{{ $bookings->room_id }}</td>
            <td class="text-center">	{{ $bookings->start_date }}</td>
            <td class="text-center">	{{ $bookings->end_date }}</td>
            <td class="text-center"> {{ Form::checkbox('ch[]',  $bookings->id , false) }}  </td>
			<td class="text-center"> {{ Form::checkbox('chn[]',  $bookings->id , false) }}  </td>


</tr>
@endforeach

        </tr>
    </tbody>
</table>
            
  

            <button type="submit" >
               Submit
            </button>
        </form>

@endsection

    

