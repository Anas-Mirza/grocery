@extends('layouts.app')

@section('content')
<form action = "/itemcreate" method = "POST" id = "itemform" name = "itemform" >
  @csrf
  <input type="hidden" id="order_id" name="order_id" value = {{$data['id']}}><br>
  <div class = "form-group">
  <label for="itemname"> Item name*:</label><br>
  <input type="text" id="itemname" name="itemname" class="form-control"><br>
  </div>
  <div class = "form-group">
  <label for="quantity">Quantity* (numbers only):</label><br>
  <input type="number" id="quantity" name="quantity" class="form-control"><br> 
  </div>
  <div class = "form-group">
  <label for="price">Price* (numbers only):</label><br>
  <input type="number" id="price" name="price" class="form-control"><br>
  </div>
  <input type="button" class="refreshclass btn btn-primary">Save</button>
  <input type="button" class="clearclass btn btn-success">Save and New</button>
  </form>
@endsection