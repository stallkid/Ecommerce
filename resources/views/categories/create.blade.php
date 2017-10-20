
@extends('app')


@section('content')
<div class="container">
    <H1>Create Category</H1>

    @if ($errors->any())
        <ul class="alert">
            @foreach ($errors->all() as $error)
              <li>{{ $error}}</li>
            @endforeach
        </ul>
    @endif

    {!! Form::open(['route'=>'categories.store']) !!}

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

        <!-- Form submit -->

        <div class="form-group">
            {!! Form::submit('Add Category', ['class'=>'btn btn-primary'])!!}
        </div>

    {!! Form::close() !!}

</div>
@endsection
