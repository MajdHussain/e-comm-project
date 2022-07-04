<?php
use App\Http\Controllers\ProductController;
$total=0;
if(Session::has('user'))
{
  $total= ProductController::cartItem();
}
?>
<nav class="navbar navbar-expand-lg bg-light">
    <div class="container-fluid">
      <a class="navbar-brand" href="/">E-shop</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="/">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="/myorders">Orders</a>
          </li>

          </li>
        </ul>
        <form action="/search" class="d-flex" role="search">
          <input class="form-control me-2 search-box" name="query" type="search" placeholder="Search" aria-label="Search">
          <button class="btn btn-outline-success" type="submit">Search</button>
          
        </form>
        <ul class="navbar-nav mb-lg-0">
        @if(Session::has('user'))
        <li class="nav-item">
        <a class="nav-link" href="/cartlist">cart({{$total}})</a>
        </li>
        
        <li class="nav-item">
          <a class="nav-link" href="#">{{Session::get('user')['name']}}</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="/logout">Logout</a>
            </li>
            @else
            <li class="nav-item">
              <a class="nav-link" href="/login">Login</a>
              </li>
              <li class="nav-item">
              <a class="nav-link" href="/register">Register</a>
              </li>
            @endif
      
        </ul>

      </div>
    </div>
</nav>