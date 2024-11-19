<x-layout title="List the certificates">
    <h1>Certificates</h1>
    @foreach ($certificates as $certificate)
    <h2>{{$certificate->name}} Certificate</h2>
    <p>{{$certificate->description}}</p>
    <img src="{{asset('images/'. $certificate->filename)}}" alt="certificate image" width="50" height=auto>
    <ul>
        @if($certificate->films->isEmpty())
        <li>No films classified under this certificate</li>
        @else @foreach ($certificate->films as $film)
        <li>{{$film->title}}</li>
        @endforeach @endif
    </ul>
    @endforeach
</x-layout>