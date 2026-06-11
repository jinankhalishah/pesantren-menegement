@extends('layout.app')

@section('content')
    @include('partials.home.hero')
    @include('partials.home.profile')
    @include('partials.home.vision-mission')

    @include('partials.home.facilities', ['facilities' => $facilities])
    @include('partials.home.programs', ['programs' => $programs])
    @include('partials.home.achievements', ['achievements' => $achievements])


    @include('partials.home.news')
    @include('partials.home.cta')
@endsection
