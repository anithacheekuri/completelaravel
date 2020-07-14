
@extends('layouts.admin')

@section('content')

@if (count($errors) > 0)
     <ul>
      @foreach ($errors->all() as $error)
       <li>{{ $error }}</li>
      @endforeach
     </ul>
    </div>
   @endif
  
<div align="center" >
<h1>Hi {{$userdata}}</h1>
 
     
</div>
  
@endsection
