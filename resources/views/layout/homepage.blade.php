@extends("layout.app")
@include('layout.nav')

@section("extra-head")
@vite('resources/css/homepage.css')
@endsection

@section("content")
<div class="overview">
    <div class="data-container">
    @foreach($trajects as $traject)
            <div class="data shadow">
                    <h2>Stage {{ $loop->iteration }}</h2>
                    <p>{{ $traject->bedrijf_id }}</p>
                    <p>{{ $traject->created_at }}</p>
                    <p>{{ $traject->progress }}</p>
                    <p>Status:
                    @if($traject->progress <= 25)
                        <b class="blue">In progress</b>
                    @else
                        <b class="orange">Finished</b>
                    @endif
                    </p>
            </div>
@endforeach
<form action="{{ route('store.traject') }}" method="POST">
            @csrf

            <label for="progress">Progress:</label>
            <input type="text" name="progress" id="progress" required>

            <input type="hidden" name="docent_id" value="1">
            <input type="hidden" name="bedrijf_id" value="1">

            <button type="submit">Create Traject</button>
        </form>
    </div>  
</div>
@endsection