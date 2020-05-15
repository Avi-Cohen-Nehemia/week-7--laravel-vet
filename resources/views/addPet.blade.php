@extends("app")

@section("title", "Add a pet")

@section("content")
    <form method="POST">
    @csrf
        <div class="form-row">
            <div class="form-group col-md-4">
                <label for="inputPetName">Pet Name</label>
                <input name="pet_name" type="text" class="form-control @error('pet_name') is-invalid @enderror" id="inputPetName" placeholder="Pet Name" value="{{ old("pet_name") ?? ($pet->pet_name ?? '') }}">
                @error("pet_name")
                    <p class="invalid-feedback">{{ $message }}</p>
                @enderror
            </div>
            <div class="form-group col-md-4">
                <label for="inputAnimalType">Animal Type</label>
                <input name="animal_type" type="text" class="form-control @error('animal_type') is-invalid @enderror" id="inputAnimalType" placeholder="Animal Type" value="{{ old("animal_type") ?? ($pet->animal_type ?? '') }}">
                @error("animal_type")
                    <p class="invalid-feedback">{{ $message }}</p>
                @enderror
            </div>
            <div class="form-group col-md-4">
                <label for="inputDOB">Date of Birth</label>
                <input name="dob" type="text" class="form-control @error('dob') is-invalid @enderror" id="inputAddress" placeholder="yyyy-mm-dd" value="{{ old("dob") ?? ($pet->dob ?? '') }}">
                @error("dob")
                    <p class="invalid-feedback">{{ $message }}</p>
                @enderror
            </div>
        </div>
        <div class="form-row">
            <div class="form-group col-md-3">
                <label for="inputWeight">Weight</label>
                <input name="weight" type="text" class="form-control @error('weight') is-invalid @enderror" id="inputWeight" placeholder="Eg 5.20" value="{{ old("weight") ?? ($pet->weight ?? '') }}">
                @error("weight")
                    <p class="invalid-feedback">{{ $message }}</p>
                @enderror
            </div>
            <div class="form-group col-md-3">
                <label for="inputHeight">Height</label>
                <input name="height" type="text" class="form-control @error('height') is-invalid @enderror" id="inputHeight" value="{{ old("height") ?? ($pet->height ?? '') }}">
                @error("height")
                    <p class="invalid-feedback">{{ $message }}</p>
                @enderror
            </div>
            <div class="form-group col-md-3">
                <label for="inputOwnerId">Owner ID</label>
                <input name="owner_id" type="text" class="form-control @error('owner_id') is-invalid @enderror" id="inputOwnerId" value="{{ $owner->id ?? '' }}">
                @error("owner_id")
                    <p class="invalid-feedback">{{ $message }}</p>
                @enderror
            </div>
            <div class="form-group col-md-3">
                <label for="inputBiteyness">Biteyness</label>
                <input name="biteyness" type="number" class="form-control @error('biteyness') is-invalid @enderror" id="inputBiteyness" value="{{ old("biteyness") ?? ($pet->biteyness ?? '') }}">
                @error("biteyness")
                    <p class="invalid-feedback">{{ $message }}</p>
                @enderror
            </div>
        </div>
        <button type="submit" class="btn btn-primary">Send</button>
    </form>
@endsection