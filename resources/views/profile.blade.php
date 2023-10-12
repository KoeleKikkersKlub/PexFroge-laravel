@extends("layout.app")
@include('layout.nav')

@section("extra-head")
@vite('resources/css/profile.css')
@endsection

@section("content")
<div class="profile shadow">
    <div class="profile-card">
        <div class="profile-image">
           <img class="shadow" src="https://media.istockphoto.com/id/1327592506/vector/default-avatar-photo-placeholder-icon-grey-profile-picture-business-man.jpg?s=612x612&w=0&k=20&c=BpR0FVaEa5F24GIw7K8nMWiiGmbb8qmhfkpXcp1dhQg=" alt="Profile Picture">
           <h2>John Doe</h2>
        </div>
        <div class="profile-details top-shadow">
            <p> <i class="fas fa-envelope"></i> Email: <a href="mailto:{{ $user->email }}">{{ $user->email }}</a></p>
            <p><i class="fas fa-mobile"></i> Telefoon: 06-15317108</p>
            <p><i class="fas fa-map-location-dot"></i> Adres: Weird Street 3921</p>
            <p><i class="fas fa-map"></i> Plaats: Groningen</p>
            <p><i class="fas fa-location-dot"></i> Postcode: 9213BH</p>
            <p><i class="fas fa-note-sticky"></i> <button type="button" class="button">Upload CV</button></p>
        </div>
    </div>
</div>
<div class="pdf-document shadow">
@if (file_exists(public_path('sample.pdf')))
<div class="pdf">
    <iframe src="{{ asset('sample.pdf') }}">
            This browser does not support PDFs. Please download the PDF to view it: <a href="{{ asset('sample.pdf') }}">Download PDF</a>
    </iframe>
</div>
@else
<p> No PDF found!</p>
@endif
</div>
@endsection