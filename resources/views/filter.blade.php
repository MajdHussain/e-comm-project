@extends('master')
@section('content')

<form action="/searchF">
    <div class="form-row">
      <div class="form-group col-md-6">
        <label for="search">Search</label>
        <input name="query" type="search" class="form-control" id="inputEmail4" placeholder="Search">
      </div>
    </div>
    <div class="form-group col-md-4">
        <label for="inputState">Categories</label>
        <select name="mainCat" id="inputState" class="form-control">
            @foreach($Product as $item)
            <option value ="{{$item->main_categories}}">{{$item->main_categories}}</option>    
            @endforeach
        </select>
      </div>
      <div class="form-group col-md-4">
        <label for="inputState">Subcategories</label>
        <select name="subCat" id="inputState" class="form-control">
            <option value ="Jackets">Jackets</option>    
            <option value ="Pants">Pants</option>   
            <option value ="Sweaters & Shirts">Sweaters & Shirts</option>
            <option value ="Shoes">Shoes</option>
            <option value ="Bags">Bags</option>
            <option value ="Accessories">Accessories</option>  
        </select>
      </div>
    <div class="form-row">
      <div class="form-group col-md-4">
        <label for="inputState">Sort By:</label>
        <select name="sortby" id="inputState" class="form-control">
          <option value="Latest" selected>Latest</option>
          <option value="a-z">Name (A - Z)</option>
          <option value="Price-h-l">Price (Low > High)</option>
          <option value="Price-l-h">Price (High > Low)</option>
        </select>
      </div>
    </div>
    <br>

    <button type="submit" class="btn btn-primary">Search</button>
  </form>
@endsection