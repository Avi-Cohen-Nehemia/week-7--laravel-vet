@extends("app")

@section("content")
 
    <div class="card" style="width: 18rem;">
        <div class="card-body">
            <h5 class="card-title">{{ $owner->fullName() }}</h5>
            <h6 class="card-subtitle mb-2 text-muted">{{ $owner->formattedPhoneNumber() }}</h6>
            <p class="card-text">{{ $owner->fullAddress() }}</p>
            <a href="#" class="card-link">Call</a>
            <a href="#" class="card-link">Email</a>
            <a href="../phonebook/edit/{{ $owner->id }}" class="card-link">Edit</a>
            <ul>
                @foreach($owner->pets as $pet)
                    <li>{{ $this->pet_name . " (" . $this->animal_type . ")" }}</li>
                @endforeach
            </ul>
            <a href="#" class="card-link">Add a pet</a>
        </div>
    </div> 
      
@endsection