
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
 
        <h1>Admin Page</h1>
        <form Action="ProducutsInsert" method="POST" enctype="multipart/form-data" >

                {{ csrf_field() }}
                <label>ProducutName:</label>
                <input type="text" name="ProducutName"><br><br>
                <label>ProducutPrice:</label>
                <input type="text" name="ProducutPrice"><br><br>
                <label>Image</label>
                <input type="file" name="image"><br><br>

                <input type="submit" value="submit" name="submit">

        </form>
</div>
  
@endsection
