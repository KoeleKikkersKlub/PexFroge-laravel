@extends("layout.app")
@include('layout.nav')
{{ auth()->user()->email }}