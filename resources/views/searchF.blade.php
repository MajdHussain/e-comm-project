@extends('master')
@section('content')

<div class="container">
    
        <div class="col-sm-6">
            
            <a href="/filter">Filter</a>
    
        </div>
        <div class="col-sm-6">
            
            <div class="tredning-wrapper">
                
                @if(sizeof($Product) == 0)
                  <h4>there are no products that match the search.</h4>
                @else
                <h3>Result : </h3>
                @foreach ($Product as $item)
                <div class="searched-item">
                  <a href="detail/{{$item['id']}}">
                  <img class="tredning-img" src="{{$item['gallery']}}">
                  <div >
                    <h2>{{$item['name']}}</h2>
                    <p>{{$item['description']}}</p>
                  </div>
                  </a>
                </div>
              @endforeach

              @endif
            </div>
        </div>
    </div>




  
@endsection