
@extends('app')


@section('content')
<div class="container">
    <H1>Create Product</H1>

    @if ($errors->any())
        <ul class="alert">
            @foreach ($errors->all() as $error)
              <li>{{ $error}}</li>
            @endforeach
        </ul>
    @endif

    {!! Form::open(['route'=>'products.store', 'method'=>'post']) !!}

    <!-- Category list Form Input -->

        <div class="form-group">
            {!! Form::label('category', 'Category:')!!}
            {!! Form::select('category_id', $categories, null, ['class'=>'form-control'])!!}
        </div>

        <!-- Name Form Input -->

        <div class="form-group">
            {!! Form::label('name', 'Name:')!!}
            {!! Form::text('name', null, ['class'=>'form-control'])!!}
        </div>

        <!-- Description Form Input -->

        <div class="form-group">
            {!! Form::label('description', 'Description:')!!}
            {!! Form::textarea('description', null, ['class'=>'form-control'])!!}
        </div>

        <!-- Price Form Input -->

        <div class="form-group">
            {!! Form::label('price', 'Price:')!!}
            {!! Form::text('price', null, ['class'=>'form-control'])!!}
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
            {!! Form::submit('Add Product', ['class'=>'btn btn-primary'])!!}
        </div>

    {!! Form::close() !!}

</div>
@endsection
