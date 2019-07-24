@extends('layouts.app')
 
@section('content')

<table class="table" id="table">
    <thead>
        <tr>
          
            <th class="text-center">Room Type</th>
            <th class="text-center">Facilities</th>
            <th class="text-center">Price</th>
            <th class="text-center">images</th>
			<th class="text-center">Book</th>

        </tr>
    </thead>
   
    <tbody>

@foreach ($rooms as $rooms)
 <tr>
			<td class="text-center">	{{ $rooms->type }}</td>
            <td class="text-center">	{{ $rooms->facilities }}</td>
            <td class="text-center">	{{ $rooms->price }}</td>
            <td class="text-center">	{{ $rooms->images }}</td>
</tr>
@endforeach

        </tr>
    </tbody>
</table>


@endsection

    

