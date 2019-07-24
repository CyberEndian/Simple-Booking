@extends('layouts.app')
 
@section('content')
<form action="{{ url('approve') }}" method="POST">
            {{ csrf_field() }}
          
<table class="table" id="table">
    <thead>
        <tr>
          
            <th class="text-center">Room Type</th>
            <th class="text-center">Facilities</th>
            <th class="text-center">Price</th>
            <th class="text-center">images</th>
			<th class="text-center">Approve</th>

        </tr>
    </thead>
   
    <tbody>




@foreach ($rooms as $rooms)
 <tr>	
            <td class="text-center">	{{ $rooms->type }}</td>
            <td class="text-center">	{{ $rooms->facilities }}</td>
            <td class="text-center">	{{ $rooms->price }}</td>
            <td class="text-center">	{{ $rooms->images }}</td>
             <td class="text-center"> {{ Form::checkbox('ch[]',  $rooms->id , false) }}  </td>

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

    

