@extends('masterAdmin')
@section("content")

<div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="carousel">
  <div class="carousel-indicators">
    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" aria-label="Slide 2"></button>
    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2" aria-label="Slide 3"></button>
  </div>
  <div class="carousel-inner">
    @foreach ($Product as $item)
    <div class="carousel-item {{$item['id']==1?'active':''}}">
      <a href="detailAdmin/{{$item['id']}}">
        <img src="{{$item['gallery']}}" class="slider-img">
        <div class="carousel-caption d-none d-md-block slider-text">
          <h5 class="slider-name">{{$item['name']}}</h5>
          <p class="slider-des">{{$item['description']}}</p>
        </div>
      </a>

      </div>
    @endforeach
</div>
  
  <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Previous</span>
  </button>
  <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Next</span>
  </button>




<div class="tredning-wrapper">
  <h3>trending product</h3>
  @if (sizeof($Product) < 14)
  @foreach ($Product as $item)
  <div class="tredning-item">
    <a href="detailAdmin/{{$item['id']}}">
    <img class="tredning-img" src="{{$item['gallery']}}">
    <div >
      <h5>{{$item['name']}}</h5>
      <p>{{$item['description']}}</p>
    </div>
    </a>
  </div>
@endforeach
    
@else


@for ($i=0; $i<15; $i++)
<div class="tredning-item">
  <a href="detailAdmin/{{$Product[$i]['id']}}">
  <img class="tredning-img" src="{{$Product[$i]['gallery']}}">
  <div >
    <h5>{{$Product[$i]['name']}}</h5>
    <p>{{$Product[$i]['price']}}$</p>
  </div>
  </a>
</div>
@endfor
@endif
</div>
</div>


<br>
<div class="btn-n">
@for ($size = ceil(sizeof($Product)/15); $size > 0; $size--)
<a class="btn btn-primary" href="/Apages/{{{$size * 5}}}">{{$size}}</a>
@endfor
</div>






@endsection 