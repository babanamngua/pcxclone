@extends('layouts.clients')
@section('title')
   {{$title}}
@endsection

@section('content')
   <section>
    @include('clients.blocks.main-home.banner')
    @include('clients.blocks.main-home.bosieutap')
    @include('clients.blocks.main-home.bestsellers')
    @include('clients.blocks.main-home.tintuc')
   </section>
@endsection

@section('css')

@endsection
@section('js')

@endsection