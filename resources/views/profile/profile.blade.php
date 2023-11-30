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
                        <h2>{{ $info->voornaam }} {{ $info->achternaam }}</h2>
                    </div>
                    <div class="profile-details top-shadow">
                        <p> <i class="fas fa-envelope"></i> Email: <a href="mailto:{{ $info->contactemail }}">{{ $info->contactemail }}</a></p>
                        <p><i class="fas fa-mobile"></i> Telefoon: {{ $info->telefoonnummer }}</p>
                        <p><i class="fas fa-map-location-dot"></i> Adres: {{ $info->adres }}</p>
                        <p><i class="fas fa-map"></i> Plaats: {{ $info->plaats }}</p>
                        <p><i class="fas fa-location-dot"></i> Postcode: {{ $info->postcode }}</p>
                        <p><i class="fas fa-note-sticky"></i> <button type="button" class="button">Upload CV</button></p>
                       <a href="{{ route('profile.edit.view', $info->id) }}"><p><i class="fa-solid fa-pen-to-square"></i>Edit</p></a>
                    </div>
                </div>
            </div>
            <div class="flex-spacer">
            </div>
            @if (file_exists(public_path('sample.pdf')))
                <iframe class="pdf kaart shadow" src="{{ asset('sample.pdf') }}">
                    This browser does not support PDFs. Please download the PDF to view it: <a href="{{ asset('sample.pdf') }}">Download PDF</a>
                </iframe>
            @else
                <p> No PDF found!</p>
            @endif
        </div>
    </div>
@endsection
