<div class="nav-tabs row justify-content-between m-0">
    <div class="col-md-6 d-flex align-items-center">
        <ul class="nav">
            <li class="nav-item">
                <a class="nav-link" href="http://192.168.10.10">Home</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="http://192.168.10.10/about">About</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="http://192.168.10.10/phonebook/create">Join</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="http://192.168.10.10/phonebook">Customer Phonebook</a>
            </li>
        </ul>
    </div>
    <form method="GET" class="col-md-3" action="/phonebook/search">
    @csrf
        <div class="card-body row no-gutters align-items-center">
            <div class="col-auto">
                <i class="fas fa-search h4 text-body"></i>
            </div>
            <div class="col pr-1">
                <input class="form-control form-control-md form-control-borderless" name="search" type="search" placeholder="Search Owners">
            </div>
            <div class="col-auto">
                <button class="btn btn-md btn-success" type="submit">Search</button>
            </div>
        </div>
    </form>
</div>