@extends("app") 

@section("extra-head")
@vite('resources/css/login.css')
@endsection

@section("content")

 <div class="fuck shadow">
 <div class="triangle-element"> </div>
    <p class="login"> Login </p>
    <div class="form-container">
        <label for="textfield-email">Email:</label>
        <input class="textfield-email">
    </div>
    <div class="spacer"></div>
    <div class="btn-doorgaan-container">
        <button class="doorgaan shadow">Doorgaan</button>
    </div>
</div>

@endsection
