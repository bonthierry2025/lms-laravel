@extends('layouts.app')

@section('title', 'Connexion')

@section('content')
<div class="max-w-md mx-auto bg-white rounded-lg shadow-md p-8">
    <h2 class="text-2xl font-bold text-gray-900 mb-6 text-center">Connexion</h2>
    
    <form method="POST" action="{{ route('login') }}">
        @csrf
        
        <div class="mb-4">
            <label for="email" class="block text-gray-700 font-bold mb-2">Email</label>
            <input type="email" id="email" name="email" class="w-full border border-gray-300 rounded px-4 py-2 focus:outline-none focus:border-blue-600" required>
            @error('email')
                <span class="text-red-600 text-sm">{{ $message }}</span>
            @enderror
        </div>
        
        <div class="mb-6">
            <label for="password" class="block text-gray-700 font-bold mb-2">Mot de passe</label>
            <input type="password" id="password" name="password" class="w-full border border-gray-300 rounded px-4 py-2 focus:outline-none focus:border-blue-600" required>
            @error('password')
                <span class="text-red-600 text-sm">{{ $message }}</span>
            @enderror
        </div>
        
        <button type="submit" class="w-full bg-blue-600 text-white font-bold py-2 rounded hover:bg-blue-700">
            Se connecter
        </button>
    </form>
</div>
@endsection
