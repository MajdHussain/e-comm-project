@extends('masterAdmin')
@section("content")
<div class="custom-product">
     <form action="ordersS" class="d-flex" role="search">
          <input class="form-control me-2 search-box" name="query" type="search" placeholder="Search by user id" aria-label="Search">
          <button class="btn btn-outline-success" type="submit">Search</button>
          
        </form>
     <div class="col-sm-10">
        <div class="trending-wrapper formb">
            <h4>orders :</h4>
            @foreach($users as $item)
            <div class=" row searched-item cart-list-devider">
             <div class="col-sm-3">
                <h5>user_id : {{$item->user_id}}</h5> 
                <a class="btn btn-primary" href="/adminorders/{{$item->user_id}}">
                    order detail
                  </a>
             </div>
            </div>
            @endforeach
          </div>

     </div>
</div>
@endsection 
