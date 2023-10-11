@extends("app")

@section("extra-head")
@vite('resources/css/profile.css')
@endsection

@section("content")
<div class="profile shadow">
    <div class="profile-card">
        <div class="profile-image">
            <img src="https://media.istockphoto.com/id/1327592506/vector/default-avatar-photo-placeholder-icon-grey-profile-picture-business-man.jpg?s=612x612&w=0&k=20&c=BpR0FVaEa5F24GIw7K8nMWiiGmbb8qmhfkpXcp1dhQg=" alt="Profile Picture">
        </div>
        <div class="profile-details shadow">
        <h2>John Doe</h2>
            <p>Email: {{ $user->email }}</p>
            <p>Telefoonnummer: 06-15317108</p>
            <p>Adres: dabdab@dab.com</p>
            <p>Plaats: Groningen</p>
            <p>Postcode: 9213BH</p>
        </div>
    </div>
</div>

@endsection