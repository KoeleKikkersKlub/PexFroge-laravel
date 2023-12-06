@extends("layout.app")
@include('layout.nav')

@section("extra-head")
    @vite('resources/css/profile.css')
@endsection

@section("content")
    <div class="column">
        <div class="cards">
            <div class="kaart profile shadow">
                <div class="profile-card">
                    <div class="profile-image">
                        <img class="shadow" src="https://media.istockphoto.com/id/1327592506/vector/default-avatar-photo-placeholder-icon-grey-profile-picture-business-man.jpg?s=612x612&w=0&k=20&c=BpR0FVaEa5F24GIw7K8nMWiiGmbb8qmhfkpXcp1dhQg=" alt="Profile Picture">
                    </div>
                    <form action="{{ route('profile.edit', $id) }}" method="post">
                        @csrf
                        <div class="profile-details top-shadow d-flex row p-2">
                            <div class="form-container col-6 mt-2">
                                <label for="voornaam"><i class="fa-solid fa-user"></i>Voornaam:</label>
                                <input class="form-control" type="text" name="voornaam" value="{{ $info->voornaam }}">
                            </div>
                            <div class="form-container col-6 mt-2">
                                <label for="achternaam"><i class="fa-solid fa-user"></i>Achternaam:</label>
                                <input class="form-control" type="text" name="achternaam" value="{{ $info->achternaam }}">
                            </div>
                            <div class="form-container col-6 mt-1">
                                <label for="email"><i class="fa-solid fa-envelope"></i>Email:</label>
                                <input class="form-control" type="text" name="contactemail" value="{{ $info->contactemail }}">
                            </div>
                            <div class="form-container col-6 mt-1">
                                <label for="telefoonnummer"><i class="fa-solid fa-mobile"></i>Telefoon:</label>
                                <input class="form-control" type="text" name="telefoon" value="{{ $info->telefoonnummer }}">
                            </div>
                            <div class="form-container col-6 mt-1">
                                <label for="adres"><i class="fa-sharp fa-solid fa-map-location-dot"></i>Adres:</label>
                                <input class="form-control" type="text" name="adres" value="{{ $info->adres }}">
                            </div>
                            <div class="form-container col-6 mt-1">
                                <label for="plaats"><i class="fa-solid fa-map"></i>Plaats:</label>
                                <input class="form-control" type="text" name="plaats" value="{{ $info->plaats }}">
                            </div>
                            <div class="form-container col-6 mt-1">
                                <label for="postcode"><i class="fa-solid fa-location-dot"></i>Postcode:</label>
                                <input class="form-control" type="text" name="postcode" value="{{ $info->postcode }}">
                            </div>
                            <div class="form-container col-6 mt-1 d-flex justify-content-end align-items-end">
                                <button type="submit" id="submit-button" class="doorgaan shadow">Opslaan</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
