@extends("app")

@section("title", "Customers Phonebook")

@section("content")
    <h2>Below are some of our happy customers:</h2>

    @if (count($owners) > 0)
        @include("parts/owners")
    @else
        <h1>No owners found!</h1>
    @endif
@endsection