@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Welkom, {{ $student->name }}</h1>
    <h2>Jouw Keuzedelen</h2>
    <ul>
        @foreach($keuzedelen as $keuzedeel)
            <li>
                {{ $keuzedeel->titel }}
                <a href="{{ route('student.keuzedeel.show', $keuzedeel->id) }}" class="btn btn-info btn-sm">Meer info</a>
                @if(in_array($keuzedeel->id, $behaaldeKeuzedeelIds))
                    <span class="status-badge status-completed">BEHAALD</span>
                @else
                    <span class="status-badge status-available">BESCHIKBAAR</span>
                @endif
            </li>
        @endforeach
    </ul>
</div>
@endsection
