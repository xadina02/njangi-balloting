@extends('index')

@section('content')
<form action="{{ route('register', ['id'=>$idval]) }}" id="form">
    <h3>Click a dot to select a random ballot below and proceed to submit your choice</h3>
    <p>Each icon/dot represents a ballot number</p>
    <div id="ballot-casing">
    @foreach($ballots as $ballot)
       <div class="ballot-display">
            <input type="radio" value="{{ $ballot->id }}" name="ballot" class="checkbox"> <img src="{{ asset($ballot->avatar) }}" alt="ballot-image" class="ballot-image">
        </div>
    @endforeach
    </div><br>
        <button id="select-button"><b>Submit</b></button>
    </form>
@endsection