@extends('frontend/layouts.pop')
@section('content13')
<div class="popup">
    <h2>Popup Content</h2>
    <p>This is the content of the popup.</p>
</div>

<style>
    .popup {
        position: fixed;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        background-color: #fff;
        padding: 20px;
        box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.5);
    }
</style>
@endsection