<!doctype html>

<head>
    <title>Shopping Page</title>
</head>

<body>
       <h1>Shopping Page</h1>
       <div >
                <h2> <a href = "{{route('cart.index')}}"> Cart</a></h2>
      </div>
       <table border = "2"></h1></a>
<tr>
<td>Id</td>
<td>ProducutName</td>
<td>ProducutPrice</td>
<td>ProducutImage</td>
<td>action</td>
</tr>
@foreach($users as $user)
<tr>
<td>{{ $user->id }}</td>
<td>{{ $user->ProducutName }}</td>
<td>{{ $user->ProducutPrice }}</td>
<td><image src="{{ asset('images/'.$user->ProducutImage) }}" width='100px' height="100px" alt="image"></td>

<td><a href = 'Buy/{{ $user->id }}'>Add to Cart</a></td>

<td><a href = "{{route('cart.add',$user->id)}}">Add to CartExml</a></td>

</tr>
@endforeach
</table>
   
</body>
</html>
