
@extends('app')


@section('content')
<div class="container">
    <H1>Products</H1>

    <br>
    <a href="{{ route('products.create')}}" class="btn btn-default">New Product</a>
    <br>
    <br>

    <table class="table">
        <tr>
          <th>ID</th>
          <th>Name</th>
          <th>Description</th>
          <th>Price</th>
          <th>Featured</th>
          <th>Recommended</th>
          <th>Category</th>
          <th>Action</th>
        </tr>

      @foreach ($products as $product)
        <tr>
          <td>{{$product->id}}</td>
          <td>{{$product->name}}</td>
          <td>{{$product->description}}</td>
          <td>{{$product->price}}</td>
          <td>{{$product->featured}}</td>
          <td>{{$product->recommended}}</td>
          <td>{{$product->category->name}}</td>
          <td>
              <a href="{{ route('products.edit', ['id'=>$product->id]) }}">Edit</a>  |
              <a href="{{ route('products.images', ['id'=>$product->id]) }}">Images</a>  |
              <a href="{{ route('products.destroy', ['id'=>$product->id]) }}">Delete</a>

          </th>
        </tr>
      @endforeach

    </table>

    {!! $products->render() !!}

</div>
@endsection
