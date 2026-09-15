@extends('layouts.app')

@section('title', 'Accueil - LMS')

@section('content')
<div class="text-center py-12">
    <h1 class="text-4xl font-bold text-gray-900 mb-4">Bienvenue sur LMS Laravel</h1>
    <p class="text-xl text-gray-600 mb-8">Plateforme de gestion de l'apprentissage</p>
    
    @auth
        <a href="{{ route('dashboard') }}" class="inline-block bg-blue-600 text-white px-6 py-3 rounded-lg hover:bg-blue-700">
            Aller au Dashboard
        </a>
    @else
        <a href="{{ route('login') }}" class="inline-block bg-blue-600 text-white px-6 py-3 rounded-lg hover:bg-blue-700">
            Connexion
        </a>
    @endauth
</div>
@endsection
