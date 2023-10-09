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
                <span>{{ $product->title }}</span>
             </h4>
        </div>
        <button class="btn btn-secondary pull-right rounded-pill btn-lg" onclick="window.history.go(-1); return false;" type="submit" form="save" >Back</button>
        <button class="btn btn-primary pull-right rounded-pill btn-lg" type="submit" form="save" >Save</button>
      </div>
    </div>
</nav>

<form action="{{ route('products.update', $product->id) }}" id="save" method="POST" enctype="multipart/form-data">
  @method('PUT')
  @csrf
  <div class="row">
    <div class="col-md-8">
      <div class="card mb-4">
        <div class="card-body">
          <div class="mb-3">
            <label class="form-label">Title</label>
            <input class="form-control" name="title" value="{{ $product->title }}" placeholder="Give product name" required/>
          </div>
          <div>
            <label class="form-label">Description</label>
            <textarea class="form-control" name="description" rows="3" placeholder="Start writing">{{ $product->description }}</textarea>
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
                    <input class="form-check-input" type="radio" value="publish" name="visibility"  {{ ($product->visibility == "publish")? "checked" : "" }}  />
                    <label class="form-check-label" for="defaultRadio2">
                      Publish
                    </label>
                  </div>
                  <div class="form-check">
                    <input class="form-check-input" type="radio" value="schedule" name="visibility"  {{ ($product->visibility == "schedule")? "checked" : "" }}  />
                    <label class="form-check-label" for="disabledRadio1">
                      Schedule
                    </label>
                  </div>
                  <div class="form-check">
                    <input class="form-check-input" type="radio" value="unpublish" name="visibility"  {{ ($product->visibility == "unpublish")? "checked" : "" }}  />
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

            @if(empty($product->image))
              <div class="mb-3">
                  <label for="formFile" class="form-label">Image</label>
                  <input class="form-control" type="file" name="image">
              </div>
            @else
              <div class="mb-3">
                  <label for="formFile" class="form-label">Image</label>
              </div>
              <div class="mb-3">
                <img class="img-thumbnail mx-auto d-block" src="{{url('/images/'. $product->image)}}" />
              </div>
              <div class="d-grid gap-2 col-lg-6 mx-auto">
                <button class="btn btn-danger btn" type="button" onclick="proceed();" fdprocessedid="3vu49w">Delete image</button>
              </div>
            @endif
            <div class="mb-3">
                <label for="exampleFormControlTextarea1" class="form-label">Quantity</label>
                <input class="form-control" type="number" name="quantity" value="{{ $product->quantity }}" pattern="[0-9]"/>
            </div>

            <div class="mb-3">
                <label for="exampleFormControlTextarea1" class="form-label">Price</label>
                <div class="input-group">
                    <span class="input-group-text">MYR</span>
                    <input type="number" class="form-control" placeholder="price" name="price" value="{{ $product->price }}" aria-label="Amount (to the nearest dollar)" />
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
                      <option value="1" {{ ($product->brand == "1")? "selected" : "" }} >One</option>
                      <option value="2" {{ ($product->brand == "2")? "selected" : "" }} >Two</option>
                      <option value="3" {{ ($product->brand == "3")? "selected" : "" }} >Three</option>
                    </select>
                </div>
            </div>
        </div>
    </div>
  </div>
</form>

<hr class="my-5">

<script type="text/javascript">
  function proceed () {
    fetch('{{ route('products.image.delete') }}?' + new URLSearchParams({
        id: '{{$product->id}}',
        image: '{{$product->image}}'
    }),  {
    method: 'DELETE',
    headers: {
        'Content-Type': 'application/json',
        'Accept': 'application/json',
        'url': '/payment',
        "X-CSRF-Token": document.querySelector('input[name=_token]').value
    },
    })
    .then((response) => {
      if (response.ok) {
        alert("Image deletion success")
      }else{
        alert("deletion failed")
      }
      location.reload();
    })
    .catch((error) => {
      console.log(error)
      alert("deletion failed")
      location.reload();
    });

  }
  </script>
@endsection
