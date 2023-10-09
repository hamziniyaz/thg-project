@extends('layouts/blankLayout')

@section('title', 'Products')

@section('content')

@if ($message = Session::get('success'))
<div class="alert alert-success">
    <p>{{ $message }}</p>
</div>
@endif

<nav class="navbar navbar-expand-lg navbar-light bg-light mb-5">
    <div class="container-fluid">
      <a class="navbar-brand" href="javascript:void(0)">Shop.com</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="javascript:void(0)">Home</a>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="javascript:void(0)" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              Brand
            </a>
            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
              <li><a class="dropdown-item" href="javascript:void(0)">one</a></li>
              <li><a class="dropdown-item" href="javascript:void(0)">Two</a></li>
              <li><a class="dropdown-item" href="javascript:void(0)">Three</a></li>
            </ul>
          </li>

        </ul>
        <form class="d-flex" onsubmit="return false">
            <button class="btn btn-outline-primary" type="button">Buy Now</button>
        </form>
      </div>
    </div>
</nav>
<div class="row">
    <div class="container-fluid">  
        <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
          <li class="breadcrumb-item">
            <a href="javascript:void(0);">Home</a>
          </li>
          <li class="breadcrumb-item active">Product</li>
        </ol>
      </nav>
    </div>
</div>

  <div class="row mb-5">
    <div class="col-md-6">
      <div class="card mb-3">
        <div class="row g-0">
          <div class="col-md-2">
          </div>
          <div class="col-md-8">
            @if (empty($product->image))
                <img class="card-img card-img-top border-secondary" src="{{url('/images/no_image.png')}}" alt="Card image" />
            @else
                <img class="card-img card-img-top" src="{{url('/images/'. $product->image)}}" alt="Card image" />                
            @endif
          </div>
          <div class="col-md-2">
        </div>
        </div>
      </div>
    </div>
    <div class="col-md-4">
      <div class="card mb-3">
        <div class="row g-0">
          <div class="col-md-8">
            <div class="card-body">
              <h2 class="card-title">{{ $product->title}}</h2>
              <p class="card-text">
                {{ $product->brand}}
              </p>
              <p class="card-text"><small class="text-muted">  {{ $product->description}}</small></p>
              <div class="demo-inline-spacing">
                <button type="button" class="btn btn-info" data-bs-toggle="button">
                    Buy Now
                </button>
                <button type="button" class="btn btn-secondary" data-bs-toggle="button">
                    Add to Cart
                </button>
              </div>
              <div class="demo-inline-spacing">
                <button type="button" class="btn rounded-pill btn-icon btn-outline-secondary">
                    <span class="tf-icons bx bx-share"></span>
                </button>
                <button type="button" class="btn rounded-pill btn-icon btn-outline-secondary">
                  <span class="tf-icons bx bx-bell"></span>
                </button>
              </div>
            </div>
          </div>
          <div class="col-md-4">
          </div>
        </div>
      </div>
    </div>
  </div>
<section id="basic-footer">
    <footer class="footer bg-light">
      <div class="container-fluid d-flex flex-md-row flex-column justify-content-between align-items-md-center gap-1 container-p-x py-3">
        <div>
          <a href="{{ config('variables.livePreview') }}" target="_blank" class="footer-text fw-bolder">{{config('variables.templateName')}}</a> ©
        </div>
        <div>
          <a href="{{ config('variables.licenseUrl') }}" class="footer-link me-4" target="_blank">License</a>
          <a href="javascript:void(0)" class="footer-link me-4">Help</a>
          <a href="javascript:void(0)" class="footer-link me-4">Contact</a>
          <a href="javascript:void(0)" class="footer-link">Terms &amp; Conditions</a>
        </div>
      </div>
    </footer>
</section>
@endsection
