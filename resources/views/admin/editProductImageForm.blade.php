@extends('layouts.admin')
@section('body')

<div class="table-responsive">
@if($errors->any())
<div class="alert alert-danger">
<ul>
<li>(!! print_r($errors->all()) !!)</li>
</ul>
</div>
@endif

<h3>Current Image</h3>
<div><img src="{{asset('storage')}}/product_images/{{$product['image']}}" width="100" height="100" style="max-height:220px" alt="{{asset('storage')}}/product_images/{{$product['image']}}"></div>




<form action="/admin/updateProductImage/{{$product->id}}" method="post" enctype="multipart/form-data"><!--multipart/form-data //this is very important for the image store-->
{{@csrf_field()}}

<div class="form-group">
<label for="description">Update Image:</label>
<input type="file" class="" name="image" id="image" placeholder="Image" value="{{$product->image}}" required>
</div>
<button type="submit" name="submit" class="btn btn-primary">Submit</button>
</form>




</div>
@endsection