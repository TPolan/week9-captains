@extends('common.layout')

@section('content')

<h1>The captain roster</h1>

@foreach ($captains as $captain)
    
<section class="info">

    <img class="portrait" src="{{ asset('img/'.$captain->slug.'.jpg') }}" alt="">

    <div class="data">
        <h1>{{ $captain->name }}</h1>
        <a href="{{action('CaptainController@show',$captain->slug)}}" class="report"> <button>Assign a captain</button></a>
        <div class="story">
            {!! nl2br($captain->story) !!}
        </div>
    </div>

    <div class="service">
        <h2>In service</h2>
        From {{ date('g:i A', strtotime($captain->serves_from)) }} to {{ date('g:i A', strtotime($captain->serves_until)) }}.

        <div class="status unavailable">Current status: <span>Not in service</span></div>
    </div>

</section>
@endforeach
    
@endsection