@extends('layouts.layout')

@section('content')
  
<nav>
    <div class="logo">
        <img src="image/logo.png">
    </div>

    <ul>
        <li><a href="#Home">Acceuil</a></li>
        <li><a href="#About">A propos de nous</a></li>
        <li><a href="/reservations">Vos reservations</a></li>
        <li><a href="#"> Bienvenue {{ Auth::User()->name }}</a></li>
        
    </ul>
    <div class="logo">
        <li style="list-style: none">Bienvenue {{ Auth::User()->name }}</li>
        <form method="POST" action="{{route('logout')}}">
            @csrf
            
            <input type="submit" class="btn" value="Se deconnecter" style="background: rgb(160, 21, 21); color:white ; width:150px; padding:12px 25px;" />
        </form>
    </div>
    
    

</nav>

@endsection