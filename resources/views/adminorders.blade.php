@extends('masterAdmin')
@section("content")
<div class="custom-product">
     <div class="col-sm-10">
        <div class="trending-wrapper formb">
            <h4>my orders :</h4>
            @foreach($orders as $item)
            <div class=" row searched-item cart-list-devider">
             <div class="col-sm-3">
                <a href="/detailAdmin/{{$item->id}}">
                    <img class="tredning-img" src="{{$item->gallery}}">
                  </a>
             </div>
             <div class="col-sm-4">
                    <div class="">
                        <h2>Name : {{$item->name}}</h2>
                        <h5>Product id : {{$item->product_id}}</h5>
                        <h5>User id : {{$item->user_id}}</h5>
                        <h5>Size : {{$item->size}}</h5>
                        <h5>Delivery Status : {{$item->status}}</h5>
                        <h5>Address : {{$item->address}}</h5>
                        <h5>Payment Method : {{$item->payment_method}}</h5>

                    </div>
             </div>

            </div>
            @endforeach
            <form action="/ordersupdate" method="POST">
                @csrf
                <input name="user_id" type="hidden" value="{{$item->user_id}}">
                <div class="form-group col-md-4">
                    <label for="inputState">Select statuses</label>
                    <select name="status" id="inputState" class="form-control">
                        <option value ="Processing">Processing</option>    
                        <option value ="Shipped">Shipped</option>   
                        <option value ="Delivered">Delivered</option>
                        <option value ="Complete">Complete</option>
                        <option value ="Canceled">Canceled</option>
                    </select>
                  </div>
                  <br>
                  <button onclick="return confirm('Are you sure ?')" type="submit" class="btn btn-primary">Set</button>
            </form>
          </div>

     </div>
</div>
@endsection 
