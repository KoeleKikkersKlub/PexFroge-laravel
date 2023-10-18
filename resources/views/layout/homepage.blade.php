@extends("layout.app")
@include('layout.nav')

@section("extra-head")
@vite('resources/css/homepage.css')
@endsection

@section("content")
<div class="overview">
    <div class="data-container">
    @foreach($trajects as $traject)
            <div class="data">
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
    </div>  
</div>
@endsection