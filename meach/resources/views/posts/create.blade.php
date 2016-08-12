@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            {{ Html::ul($errors->all(), array('class' => 'text-danger')) }}
            {{ Form::open(array('url' => 'posts')) }}
                <div class="form-group">
                    {{ Form::label('title', 'Title') }}
                    {{ Form::text('title', Input::old('title'), array('class' => 'form-control', 'required' => 'required')) }}
                </div>
                <div class="form-group">
                    {{ Form::label('body', 'Body') }}
                    {{ Form::textarea('body', Input::old('body'), array('class' => 'form-control', 'required' => 'required')) }}
                </div>
                {{ Form::submit('Create post', array('class' => 'btn btn-primary')) }}
            {{ Form::close() }}
        </div>
    </div>
</div>
@endsection
