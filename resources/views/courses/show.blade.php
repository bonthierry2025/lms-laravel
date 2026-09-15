@extends('layouts.app')

@section('title', 'Détails du Cours')

@section('content')
<div class="mb-8">
    @if ($course->thumbnail)
        <img src="{{ asset('storage/' . $course->thumbnail) }}" alt="{{ $course->title }}" class="w-full h-96 object-cover rounded-lg">
    @else
        <div class="w-full h-96 bg-gray-300 rounded-lg flex items-center justify-center">
            <span class="text-gray-600 text-xl">Pas d'image</span>
        </div>
    @endif
</div>

<div class="grid grid-cols-3 gap-8 mb-8">
    <div class="col-span-2">
        <h1 class="text-4xl font-bold text-gray-900 mb-2">{{ $course->title }}</h1>
        <p class="text-gray-600 mb-4">par <strong>{{ $course->instructor->name }}</strong></p>
        
        <div class="flex items-center space-x-4 mb-8">
            <span class="inline-block bg-blue-100 text-blue-800 px-3 py-1 rounded">{{ ucfirst($course->level) }}</span>
            <span class="text-gray-600">{{ $course->duration_hours }} heures</span>
            <span class="text-gray-600">{{ $course->getTotalLessons() }} leçons</span>
            <span class="text-gray-600">{{ $course->getEnrollmentCount() }} inscrits</span>
        </div>

        <h2 class="text-2xl font-bold text-gray-900 mb-4">À propos du cours</h2>
        <p class="text-gray-700 leading-relaxed mb-8">{{ $course->description }}</p>

        <h2 class="text-2xl font-bold text-gray-900 mb-4">Contenu du cours</h2>
        <div class="space-y-4">
            @forelse ($course->modules as $module)
                <div class="bg-gray-50 p-6 rounded-lg">
                    <h3 class="text-lg font-bold text-gray-900 mb-2">{{ $module->title }}</h3>
                    <p class="text-gray-600 mb-4">{{ $module->description }}</p>
                    <div class="space-y-2">
                        @foreach ($module->lessons as $lesson)
                            <div class="flex items-center space-x-2 text-gray-700">
                                <span class="text-blue-600">▶</span>
                                <span>{{ $lesson->title }}</span>
                                <span class="text-sm text-gray-500">({{ $lesson->duration_minutes }} min)</span>
                            </div>
                        @endforeach
                    </div>
                </div>
            @empty
                <p class="text-gray-600">Aucun module disponible pour le moment.</p>
            @endforelse
        </div>
    </div>

    <div>
        <div class="bg-white rounded-lg shadow-lg p-6 sticky top-20">
            <div class="text-3xl font-bold text-blue-600 mb-4">{{ number_format($course->price, 2) }} €</div>
            
            @auth
                @if ($isEnrolled)
                    <div class="w-full bg-green-600 text-white py-3 rounded-lg text-center font-bold mb-4">
                        ✓ Inscrit
                    </div>
                    <a href="#" class="block w-full bg-blue-600 text-white py-3 rounded-lg text-center font-bold hover:bg-blue-700">
                        Continuer le cours
                    </a>
                @else
                    <form method="POST" action="{{ route('courses.enroll', $course) }}">
                        @csrf
                        <button type="submit" class="w-full bg-blue-600 text-white py-3 rounded-lg font-bold hover:bg-blue-700">
                            S'inscrire au cours
                        </button>
                    </form>
                @endif
            @else
                <a href="{{ route('login') }}" class="block w-full bg-blue-600 text-white py-3 rounded-lg text-center font-bold hover:bg-blue-700 mb-3">
                    Se connecter pour s'inscrire
                </a>
            @endauth
            
            <div class="mt-6 space-y-4">
                <div class="flex items-start space-x-3">
                    <span class="text-2xl">✓</span>
                    <div>
                        <p class="font-bold text-gray-900">Accès illimité</p>
                        <p class="text-sm text-gray-600">À vie une fois inscrit</p>
                    </div>
                </div>
                <div class="flex items-start space-x-3">
                    <span class="text-2xl">📜</span>
                    <div>
                        <p class="font-bold text-gray-900">Certificat</p>
                        <p class="text-sm text-gray-600">À la fin du cours</p>
                    </div>
                </div>
                <div class="flex items-start space-x-3">
                    <span class="text-2xl">📱</span>
                    <div>
                        <p class="font-bold text-gray-900">Sur mobile</p>
                        <p class="text-sm text-gray-600">Apprenez n'importe où</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
