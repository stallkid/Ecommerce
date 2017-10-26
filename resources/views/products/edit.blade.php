
@extends('app')

@section('content')
<div class="container">
    <H1>Editing Products: {{ $products->name }}</H1>

    @if ($errors->any())
        <ul class="alert">
            @foreach ($errors->all() as $error)
              <li>{{ $error}}</li>
            @endforeach
        </ul>
    @endif

    {!! Form::open(['route'=>['products.update', $products->id], 'method'=>'put']) !!}

        <!-- Category list Form Input -->

        <div class="form-group">
            {!! Form::label('category', 'Category:')!!}
            {!! Form::select('category_id', $categories, null, ['class'=>'form-control'])!!}
        </div>
        <!-- Name Form Input -->

        <div class="form-group">
            {!! Form::label('name', 'Name:')!!}
            {!! Form::text('name', $products->name, ['class'=>'form-control'])!!}
        </div>

        <!-- Description Form Input -->

        <div class="form-group">
            {!! Form::label('description', 'Description:')!!}
            {!! Form::textarea('description', $products->description, ['class'=>'form-control'])!!}
        </div>

        <!-- Price Form Input -->

        <div class="form-group">
            {!! Form::label('price', 'Price:')!!}
            {!! Form::text('price', $products->price, ['class'=>'form-control'])!!}
        </div>

        <!-- Featured Form Input -->

        <div class="form-group">
            {!! Form::label('featured', 'Featured: ') !!}
            {!! Form::checkbox('featured') !!}

        <!-- Recommended Form Input -->

            {!! Form::label('recommended ', 'Recommendeded: ') !!}
            {!! Form::checkbox('recommended') !!}
        </div>

        <!-- Form submit -->

        <div class="form-group">
            {!! Form::submit('Save Product', ['class'=>'btn btn-primary'])!!}
        </div>

    {!! Form::close() !!}

</div>
@endsection
