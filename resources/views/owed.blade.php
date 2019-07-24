@extends('layouts.app')
 
@section('content')
<form action="{{ url('owed') }}" method="POST">
            {{ csrf_field() }}
          
<table class="table" id="table">
    <thead>
        <tr>
          
            
            <th class="text-center">Hotel Name</th>
			<th class="text-center">Suspend</th>

        </tr>
    </thead>
   
    <tbody>




@foreach ($hotels as $hotels)
 <tr>	
            <td class="text-center">	{{ $hotels->Name }}</td>
            <td class="text-center"> {{ Form::checkbox('ch[]',  $hotels->ID , false) }}  </td>

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

    

