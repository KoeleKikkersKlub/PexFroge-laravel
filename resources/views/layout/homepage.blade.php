@extends("layout.app")
@section("extra-head")
@vite('resources/css/stageoverzicht.css')
@endsection

@section("content")
<div class="kader">
@foreach($trajects as $traject)
    <div class="kader1">
        <div class="data">
            <div class="stage-info">
                <h2>Stage {{ $loop->iteration }}</h2>
                <p>{{ $traject->bedrijf_id }}</p>
                <p>{{ $traject->created_at }}</p>
                <p>{{ $traject->progress }}</p>
                <p>Status:</p>
                @if($traject->progress <= 25)
                <p class="blue"><b>In progress</b></p>
                @else
                <p class="orange"><b>Finished</b></p>
                @endif
            </div>
        </div>
    </div>
@endforeach
</div>
@endsection