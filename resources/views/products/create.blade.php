@extends('layouts/contentNavbarLayout')

@section('title', 'Add Product')

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
                <span>Add Product</span>
             </h4>
        </div>
        <button class="btn btn-secondary pull-right rounded-pill btn-lg" onclick="window.history.go(-1); return false;" type="submit" form="save" >Back</button>
        <button class="btn btn-primary pull-right rounded-pill btn-lg" type="submit" form="save" >Save</button>
      </div>
    </div>
</nav>

<form action="{{ route('products.store') }}" id="save" method="POST" enctype="multipart/form-data">
    @csrf
  <div class="row">
    <div class="col-md-8">
      <div class="card mb-4">
        <div class="card-body">
          <div class="mb-3">
            <label class="form-label">Title</label>
            <input class="form-control" name="title" placeholder="Give product name" required/>
          </div>

          <div>
            <label class="form-label">Description</label>
            <textarea class="form-control" name="description" rows="3" placeholder="Start writing"></textarea>
          </div>
        </div>
      </div>
    </div>
    <div class="col-md-4">
        <div class="card mb-4">
            <h5 class="card-header">Visibility</h5>
            <div class="card-body">
              <div class="row gy-3">
                <div class="col-md">
                  <div class="form-check">
                    <input class="form-check-input" type="radio" value="publish" name="visibility" checked />
                    <label class="form-check-label" for="defaultRadio2">
                      Publish
                    </label>
                  </div>
                  <div class="form-check">
                    <input class="form-check-input" type="radio" value="schedule" name="visibility" />
                    <label class="form-check-label" for="disabledRadio1">
                      Schedule
                    </label>
                  </div>
                  <div class="form-check">
                    <input class="form-check-input" type="radio" value="unpublish" name="visibility" />
                    <label class="form-check-label" for="disabledRadio2">
                      Unpublish
                    </label>
                  </div>
                </div>
              </div>
            </div>
        </div>
    </div>
  </div>
  <div class="row">
    <div class="col-md-8">
      <div class="card mb-4">
        <div class="card-body">
            <div class="mb-3">
                <label for="formFile" class="form-label">Image</label>
                <input class="form-control" type="file" name="image">
            </div>

            <div class="mb-3">
                <label for="exampleFormControlTextarea1" class="form-label">Quantity</label>
                <input class="form-control" type="number" name="quantity" pattern="[0-9]"/>
            </div>

            <div class="mb-3">
                <label for="exampleFormControlTextarea1" class="form-label">Price</label>
                <div class="input-group">
                    <span class="input-group-text">MYR</span>
                    <input type="text" type="number" class="form-control" placeholder="price" name="price" aria-label="Amount (to the nearest dollar)" />
                </div>
            </div>

        </div>
      </div>
    </div>
    <div class="col-md-4">
        <div class="card mb-4">
            <div class="card-body">
                <div class="mb-3">
                    <label class="form-label">Brand</label>
                    <select class="form-select" name="brand" aria-label="Default select example">
                      <option selected>Select brand</option>
                      <option value="1">One</option>
                      <option value="2">Two</option>
                      <option value="3">Three</option>
                    </select>
                </div>
            </div>
        </div>
    </div>
  </div>
</form>

<hr class="my-5">


@endsection
