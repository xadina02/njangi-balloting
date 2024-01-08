@extends('index')

@section('content')
    <form action="{{ route('create') }}" id="form">
        <h1>WHO ARE YOU?</h1>
        <div class="input-div">
            <label for="">Full Name: </label><input type="text" class="input-reg" id="name" name="name">
        </div><br>
        <div class="input-div">
            <label for="">Phone Number: </label><input type="number" class="input-reg" id="tel" name="tel" placeholder="E.g, 67X XXX XXX">
        </div><br>
        <button id="select-button">Continue</button>
    </form>
@endsection