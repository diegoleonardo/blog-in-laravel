@extends('layouts.app')
@section('content')

    <h1>Create Contact</h1>
    {!! Form::open(['action' => 'ContactsController@store', 'method' => 'POST']) !!}
        <div class="form-group">
            {{Form::label('firstname', 'Firstname')}}
            {{Form::text('firstname', '', ['class' => 'form-control', 'placeholder' => 'Firstname'])}}
        </div>
        <div class="form-group">
            {{Form::label('lastname', 'Lastname')}}
            {{Form::text('lastname', '', ['class' => 'form-control', 'placeholder' => 'Lastname'])}}
        </div>
        <div class="form-group">
            {{Form::label('email', 'Email')}}
            {{Form::text('email', '', ['class' => 'form-control', 'placeholder' => 'Email'])}}
        </div>
        <div>
            {{Form::label('phone', 'Phone')}}
            {{Form::text('phone', '', ['class' => 'form-control', 'placeholder' => 'Phone'])}}
        </div>
        <br>
        <br>
        {{Form::submit('Submit', ['class'=> 'btn btn-primary'])}}
    {!! Form::close() !!}

@endsection