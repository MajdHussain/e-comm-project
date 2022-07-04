@extends('master')
@section('content')
<div class="container">
<div class="row">
    <a href="/">Back</a>
    <div class="col-sm-6">
        
        <img class="detail-img" src="{{$Product['gallery']}}" alt="">

    </div>
    <div class="col-sm-6">
        
        <h2>{{$Product['name']}}</h2>
        <h3>Price : {{$Product['price']}}$</h3>
        <h4>Details: {{$Product['description']}}</h4>
        <h4>Category: {{$Product['category']}}</h4>
        <br><br>
        <form action="/add_to_cart" method="POST">
            @csrf
            <label><h3> Quantity</h3></label>
            <select name="quantity" class="form-select" aria-label="Default select example">
                
                <option value="1" selected>1</option>
                <option value="2">2</option>
                <option value="3">3</option>
                <option value="4">4</option>
                <option value="5">5</option>
              </select>
            <label><h3> Select size:</h3></label>
            <select name="size" class="form-select" aria-label="Default select example">
                
                <option value="small">Small</option>
                <option value="medium">Medium</option>
                <option value="large">Large</option>
              </select>
              <br><br>
            
            <input type="hidden" name="product_id" value="{{$Product['id']}}">
            <button class="btn btn-primary">Add to Cart</button>
        </form>

        
    </div>
</div>
</div>


  
@endsection