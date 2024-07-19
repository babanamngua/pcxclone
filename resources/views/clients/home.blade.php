@extends('layouts.clients')
@section('title')
   {{$title}}
@endsection

@section('content')
   <section>
      @if(session('status'))
      <div class="alert alert-primary">
          {{ session('status') }}
      </div>
      @endif
        @if(session('success'))
      <div class="alert alert-success">
          {{ session('success') }}
      </div>
      @endif
      @if(session('error'))
      <div class="alert alert-danger">
         {{ session('error') }}
      </div>
      @endif
      @if(session('required'))
    <div class="alert alert-success">
        {{ session('required') }}
    </div>
    @endif
    @if(session('login'))
    <div class="alert alert-success">
        {{ session('login') }}
    </div>
    @endif
    @include('clients.blocks.main-home.banner')
    @include('clients.blocks.main-home.bosieutap')
    @include('clients.blocks.main-home.cacnhaphanphoi')
    {{-- @include('clients.blocks.main-home.bestsellers') --}}
    @include('clients.blocks.main-home.bestsellers1')
    @include('clients.blocks.main-home.tintuc')
   </section>
@endsection

@section('css')

@endsection
@section('js')

@endsection