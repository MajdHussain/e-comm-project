@extends('masterAdmin')
@section("content")

<form action="createItem" method="POST">
    @csrf
    <div class="form-group">
        <label for="exampleFormControlInput1">Name</label>
        <input name="name" type="text" class="form-control" id="exampleFormControlInput1" placeholder="Name">
      </div>
      <div class="form-group">
        <label for="exampleFormControlInput1">Price</label>
        <input name="price" type="text" class="form-control" id="exampleFormControlInput1" placeholder="Price">
      </div>
      <div class="form-group">
        <label for="exampleFormControlInput1">Main_categories</label>
        <input name="main_categories" type="text" class="form-control" id="exampleFormControlInput1" placeholder="Main_categories">
      </div>
      <div class="form-group">
        <label for="exampleFormControlInput1">Subcategories</label>
        <input name="category" type="text" class="form-control" id="exampleFormControlInput1" placeholder="Subcategories">
      </div>
      <div class="form-group">
        <label for="exampleFormControlTextarea1">Description</label>
        <textarea name="description" class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
      </div>
      <div class="form-group">
        <label for="exampleFormControlInput1">gallery img address</label>
        <input name="gallery" type="text" class="form-control" id="exampleFormControlInput1" placeholder="Main_categories">
      </div>
      <br>
      <button type="submit" class="btn btn-primary">Submit</button>

  </form>
  

@endsection 