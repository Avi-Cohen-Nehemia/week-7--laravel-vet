@extends("app")

@section("title", "Home")

@section("css")
    <link rel="stylesheet" href="/css/purrfectmatch.css">
@endsection

@section("content")
    <h1 class="text-center">{{ $greeting }}</h1>
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div id="content">
                    <h1>Animates</h1>
                    <h3>The amazing vet clinic</h3>
                    <hr>
                    <button class="btn btn-default btn-lg" id="get-started">Get Started!</button>
                </div>
            </div>
        </div>
    </div>
@endsection