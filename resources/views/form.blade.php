@extends("app")

@section("title", "Join")

@section("content")
    <form method="POST">
    @csrf
        <div class="form-row">
            <div class="form-group col-md-6">
                <label for="inputFirstName">First Name</label>
                <input name="first_name" type="text" class="form-control @error('first_name') is-invalid @enderror" id="inputFirstName" placeholder="First Name" value="{{ old("first_name") ?? ($owner->first_name ?? '') }}">
                @error("first_name")
                    <p class="invalid-feedback">{{ $message }}</p>
                @enderror
            </div>
            <div class="form-group col-md-6">
                <label for="inputLastName">Last Name</label>
                <input name="last_name" type="text" class="form-control @error('last_name') is-invalid @enderror" id="inputLastName" placeholder="Last Name" value="{{ old("last_name") ?? ($owner->last_name ?? '') }}">
                @error("last_name")
                    <p class="invalid-feedback">{{ $message }}</p>
                @enderror
            </div>
        </div>
            <div class="form-row">
            <div class="form-group col-md-6">
                <label for="inputAddress">Address</label>
                <input name="address_1" type="text" class="form-control @error('address_1') is-invalid @enderror" id="inputAddress" placeholder="1234 Main St" value="{{ old("address_1") ?? ($owner->address_1 ?? '') }}">
                @error("address_1")
                    <p class="invalid-feedback">{{ $message }}</p>
                @enderror
            </div>
            <div class="form-group col-md-6">
                <label for="inputAddress2">Address 2</label>
                <input name="address_2" type="text" class="form-control @error('address_2') is-invalid @enderror" id="inputAddress2" placeholder="Apartment, studio, or floor" value="{{ old("address_1") ?? ($owner->address_2 ?? '') }}">
                @error("address_2")
                    <p class="invalid-feedback">{{ $message }}</p>
                @enderror
            </div>
        </div>
        <div class="form-row">
            <div class="form-group col-md-6">
                <label for="inputCity">City</label>
                <input name="town" type="text" class="form-control @error('town') is-invalid @enderror" id="inputCity" value="{{ old("town") ?? ($owner->town ?? '') }}">
                @error("town")
                    <p class="invalid-feedback">{{ $message }}</p>
                @enderror
            </div>
            <div class="form-group col-md-3">
                <label for="inputPostCode">Postcode</label>
                <input name="postcode" type="text" class="form-control @error('postcode') is-invalid @enderror" id="inputPostCode" value="{{ old("postcode") ?? ($owner->postcode ?? '') }}">
                @error("postcode")
                    <p class="invalid-feedback">{{ $message }}</p>
                @enderror
            </div>
            <div class="form-group col-md-3">
                <label for="inputTelephone">Phone Numer</label>
                <input name="telephone" type="number" class="form-control @error('telephone') is-invalid @enderror" id="inputTelephone" value="{{ old("telephone") ?? ($owner->telephone ?? '') }}">
                @error("telephone")
                    <p class="invalid-feedback">{{ $message }}</p>
                @enderror
            </div>
        </div>
        <button type="submit" class="btn btn-primary">Send</button>
    </form>
@endsection