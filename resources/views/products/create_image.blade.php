
@extends('app')

@section('content')
<div class="container">
    <H1>Upload Image</H1>

    @if ($errors->any())
        <ul class="alert">
            @foreach ($errors->all() as $error)
              <li>{{ $error}}</li>
            @endforeach
        </ul>
    @endif

    {!! Form::open(['route'=>['products.images.store', $product->id],'method'=>'post', 'enctype'=>"multipart/form-data"]) !!}

    <!-- Category list Form Input -->

        <div class="form-group">
            {!! Form::label('image', 'Image:')!!}
            {!! Form::file('image',null, ['class'=>'form-control'])!!}
        </div>

        <!-- Form submit -->

        <div class="form-group">
            {!! Form::submit('Upload Image', ['class'=>'btn btn-primary'])!!}
        </div>

    {!! Form::close() !!}

</div>
@endsection
