@extends('layouts.admin')
@section('body')

<div class="table-responsive">

 <form action="{{route('adminSendCreateProductForm')}}" method="POST" enctype="multipart/form-data">
 {{ @csrf_field() }}
 
 <div class="form-group">
  <label for="name">Name</label>
  <input type="text" class="form-control" name="name" id="name" placeholder="Product Name"  required>
 </div>

 <div class="form-group">
  <label for="description">Description</label>
  <input type="text" class="form-control" name="description" id="description" placeholder="description" required>
 </div>

 <div class="form-group">
  <label for="image">Image</label>
  <input type="file" class="form-control-file" name="image" id="image"  required>
 </div>

 <div class="form-group">
  <label for="type">Type</label>
  <input type="text" class="form-control" name="type" id="type" placeholder="type"  required>
 </div>
 
 <div class="form-group">
  <label for="price">Price</label>
  <input type="text" class="form-control" name="price" id="price" placeholder="Price" required>
 </div>

<button type="submit" name="submit" class="btn btn-primary">Submit</button>
 </form>


</div>

@endsection