@extends('common.layout')

@section('content')

<h1>The captain roster</h1>
<h2>Choose your captain: </h2>


<section class="info">
    @foreach ($captains as $captain)
    <a href="{{action('CaptainController@show',$captain->slug)}}">
    <img class="portrait" src="{{ asset('img/'.$captain->slug.'.jpg') }}" alt="">
    </a>
    <div class="data">
        <h1>{{ $captain->name }}</h1>

    </div>
    @endforeach


</section>
    
@endsection