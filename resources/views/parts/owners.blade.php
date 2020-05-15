<div class="">
    @foreach($owners as $owner)
            <div class="card" style="width: 18rem;">
                <div class="card-body">
                    <h5 class="card-title">{{ $owner->fullName() }}</h5>
                    <h6 class="card-subtitle mb-2 text-muted">{{ $owner->formattedPhoneNumber() }}</h6>
                    <p class="card-text">{{ $owner->fullAddress() }}</p>
                    <a href="#" class="card-link">Call</a>
                    <a href="#" class="card-link">Email</a>
                    <a href="http://192.168.10.10/phonebook/edit/{{ $owner->id }}" class="card-link">Edit</a>
                </div>
            </div>
    @endforeach
    {{ $owners->links() }}
</div>