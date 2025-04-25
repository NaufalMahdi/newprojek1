@extends('layouts.app') 

@section('title', 'Beranda') 

@section('content') 
    @include('home.intro')
    @include('home.services')
    @include('home.gallery')
    @include('home.about')
    @include('home.contact')
@endsection
