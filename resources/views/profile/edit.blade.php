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
                    <form action="{{ route('profile.edit', auth()->user()) }}" method="post">
                        @csrf
                        <div class="profile-details top-shadow d-flex flex-column">
                        <div>
                            <i class="fa-solid fa-user"></i> Voornaam: <input type="text" name="voornaam" value="{{ $info->voornaam }}">
                        </div>
                        <div>
                            <i class="fa-solid fa-user"></i> Achternaam: <input type="text" name="achternaam" value="{{ $info->achternaam }}">
                        </div>
                        <div>
                            <i class="fas fa-envelope"></i> Email: <input type="text" name="contactemail" value="{{ $info->contactemail }}">
                        </div>
                        <div>
                            <i class="fas fa-mobile"></i>Telefoon: <input type="text" name="telefoon" value="{{ $info->telefoonnummer }}">
                        </div>
                        <div>
                            <i class="fas fa-map-location-dot"></i>Adres:<input type="text" name="adres" value="{{ $info->adres }}">
                        </div>
                        <div>
                            <i class="fas fa-map"></i>Plaats: <input type="text" name="plaats" value="{{ $info->plaats }}">
                        </div>
                        <div>
                            <i class="fas fa-location-dot"></i>Postcode: <input type="text" name="postcode" value="{{ $info->postcode }}">
                        </div>
                        <div>
                            <button type="submit"><i class="fa-solid fa-floppy-disk"></i>Save</button>
                        </div>
                    </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
