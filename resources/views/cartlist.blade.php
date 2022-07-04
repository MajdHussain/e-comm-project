@extends('master')
@section("content")
<div class="custom-product">
     <div class="col-sm-10 formb">
        <div class="trending-wrapper">
            <h4>Result for Products</h4>
            @foreach($products as $item)
            <div class=" row searched-item cart-list-devider">
             <div class="col-sm-3">
                <a href="detail/{{$item->id}}">
                    <img class="tredning-img" src="{{$item->gallery}}">
                  </a>
             </div>
             <div class="col-sm-4">
                    <div class="">
                      <h2>{{$item->name}}</h2>
                      <h5>size: {{$item->size}}</h5>
                      <h5>quantity: {{$item->quantity}}</h5>
                      <h5>{{$item->description}}</h5>
                     
                    </div>
             </div>
             <div class="col-sm-3">
                <a onclick="return confirm('Are you sure you want to remove this item?')" href="/removecart/{{$item->cart_id}}" class="btn btn-warning" >Remove from cart</a>
             </div>
            </div>
            @endforeach
          </div>
          @if(sizeof($products)>0)
          <a class="btn btn-success" href="ordernow">Order Now</a> <br> <br>
          @endif

     </div>
</div>
@endsection 
