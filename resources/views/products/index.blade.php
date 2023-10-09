@extends('layouts/contentNavbarLayout')

@section('title', 'Products')

@section('content')

@if ($message = Session::get('success'))
<div class="alert alert-success">
    <p>{{ $message }}</p>
</div>
@endif

<nav class="navbar navbar-expand">
    <div class="container-fluid">
      <div class="collapse navbar-collapse" >
        <div class="navbar-nav me-auto mb-2 mb-lg-0">
            <h4 class="fw-bold">
                <span>Products</span>
              </h4>
        </div>
        <a href="{{ route('products.create') }}"  class='btn btn-primary pull-right rounded-pill'>Add Product</a>
 
      </div>
    </div>
  </nav>

  
<div class="card">
  <div class="table-responsive text-nowrap">
    <table class="table">
      <thead>
        <tr>
          <th width="40%" >Title</th>
          <th width="10%">Quantity</th>
          <th width="15%">Visibility</th>
          <th width="15%">Price</th>
          <th width="10%">Actions</th>
          <th width="5%"></th>
        </tr>
      </thead>
      <tbody class="table-border-bottom-0">
        @foreach ($products as $product)
            <tr>
                <td><i class="fab fa-angular fa-lg text-danger me-3"></i> <strong><a href="{{ route('products.edit',$product->id) }}">{{ $product->title }}</a> </strong></td>
                <td>{{ $product->quantity }} </td>
                <td>
                    @php
                        $spanClass = "";
                        switch($product->visibility){
                            case "publish": 
                                $spanClass = "success";
                                break;
                            case "schedule":
                                $spanClass = "info"; 
                                break;
                            case "unpublish":
                                $spanClass = "warning"; 
                                break;
                        }
                    @endphp
                    <span class="badge bg-label-{{$spanClass}} me-1">{{ $product->visibility }}</span>
                </td>
                <td>{{ $product->price }}</td>
                <td>
                    <form action="{{ route('products.destroy',$product->id) }}" method="Post">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Delete</button>
                    </form>
                </td>
                <td>
                    <a href="{{ route('prod.detail',$product->id) }}"  target="_blank"class="btn rounded-pill btn-icon btn-outline-secondary">
                        <span class="tf-icons bx bx-right-arrow-alt"></span>
                    </a>
                  </td>
            </tr>
        @endforeach
      </tbody>
    </table>
  </div>
</div>


<hr class="my-5">

@endsection
