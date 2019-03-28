@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="card-deck">
            @foreach ($projects as $item)

                <div class="card">
                    <img class="card-img-top" src="{{ asset('app').'/thumbs/original/'.$item->thumbnail }}" alt="Card image cap">
                    <div class="card-body">
                        <h5 class="card-title"> {{ $item->name }}</h5>
                    </div>
                </div>
            @endforeach
        </div>
        @include('projects._createModal')
    </div>
@endsection
{{-- http://localhost/Taskmanager/public/storage/thumbs/original/O64FC6PzuN2PGgXCt2WNG6svBNPJlLArYnZShb10.jpeg --}}
