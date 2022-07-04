@extends('masterAdmin')
@section("content")
<div class="custom-product">
     <div class="col-sm-10">
        <div class="trending-wrapper formb">
            <h4>site users :</h4>
            <form action="userssearch" class="d-flex" role="search">
                <div class="form-group col-md-4">
                    <select name="userS" id="inputState" class="form-control">
                        <option value ="id">By Id:</option>    
                        <option value ="name">By Name:</option>   
                    </select>
                  </div>
                <input class="form-control me-2 search-box" name="query" type="search" placeholder="Search" aria-label="Search">
                <button class="btn btn-outline-success" type="submit">Search</button>
                
              </form>
            @foreach($user as $data)
            <div class=" row searched-item cart-list-devider">

             <div class="col-sm-4">
                    <div class="">
                        <h2>Name : {{$data->name}}</h2>
                        <h5>User id : {{$data->id}}</h5>
                        <h5>Email : {{$data->email}}</h5>
                        <h5>is_banned : {{$data->is_banned}}</h5>
                    </div>
                    <div class=" row searched-item cart-list-devider">
                    <div class="col-sm-4">
                
                    
                    <form action="banuser" method="POST">
                        @csrf

                        <input type="hidden" name="user_id" value="{{$data->id}}">
                        <button onclick="return confirm('Are you sure you want to ban this user?')" type="submit" class="btn btn-danger">Ban user</button>
                    </form>
                </div>
                <div class="col-sm-4">
                    <form action="unbanuser" method="POST">
                        @csrf

                        <input type="hidden" name="user_id" value="{{$data->id}}">
                        <button type="submit" class="btn btn-success">Unban user</button>
                    </form>
                </div>
                    </div>
             </div>

             

            </div>
            @endforeach
          </div>

     </div>
</div>
@endsection 
