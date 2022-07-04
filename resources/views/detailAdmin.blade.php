@extends('masterAdmin')
@section('content')
<div class="container">
<div class="row">
    <a href="/adminPage">Back</a>
    <div class="col-sm-6">
        
        <img class="detail-img" src="{{$Product['gallery']}}" alt="">

    </div>
    <div class="col-sm-6">
        
        <h2>{{$Product['name']}}</h2>
        <h3>Price : {{$Product['price']}}$</h3>
        <h4>Details: {{$Product['description']}}</h4>
        <h4>Category: {{$Product['category']}}</h4>
        <br><br>
        <form action="/deleteItem/{{$Product['id']}}" method="get">
            @csrf

            <input type="hidden" name="product_id" value="{{$Product['id']}}">
            <button onclick="return confirm('Are you sure you want to delete this item?')" type="submit" class="btn btn-danger">delete</button>
        </form>

        <br>
    </div>
</div>
<form action="/update" method="POST">
    @csrf
    <div class="form-group">
        <label for="exampleFormControlInput1">Name</label>
        <input name="name" type="text" class="form-control" id="exampleFormControlInput1" placeholder="{{$Product['name']}}">
      </div>
      <div class="form-group">
        <label for="exampleFormControlInput1">Price</label>
        <input name="price" type="text" class="form-control" id="exampleFormControlInput1" placeholder="{{$Product['price']}}">
      </div>
      <div class="form-group">
        <label for="exampleFormControlInput1">Main_categories</label>
        <input name="main_categories" type="text" class="form-control" id="exampleFormControlInput1" placeholder="{{$Product['main_categories']}}">
      </div>
      <div class="form-group">
        <label for="exampleFormControlInput1">Subcategories</label>
        <input name="category" type="text" class="form-control" id="exampleFormControlInput1" placeholder="{{$Product['category']}}">
      </div>
      <div class="form-group">
        <label for="exampleFormControlTextarea1">Description</label>
        <textarea name="description" class="form-control" id="exampleFormControlTextarea1" rows="3" placeholder="{{$Product['description']}}"></textarea>
      </div>
      <div class="form-group">
        <label for="exampleFormControlInput1">gallery img address</label>
        <input name="gallery" type="text" class="form-control" id="exampleFormControlInput1" placeholder="{{$Product['id']}}">
      </div>
      <br>
      <input type="hidden" name="product_id" value="{{$Product['id']}}">
      <button onclick="return confirm('Are you sure?')" type="submit" class="btn btn-primary">update</button>

  </form>
</div>


  
@endsection