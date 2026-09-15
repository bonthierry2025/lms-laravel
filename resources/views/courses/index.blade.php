@extends('layouts.app')

@section('title', 'Tous les Cours')

@section('content')
<div class="mb-8">
    <h1 class="text-3xl font-bold text-gray-900 mb-2">Découvrez nos Cours</h1>
    <p class="text-gray-600">Choisissez parmi une large sélection de cours</p>
</div>

<div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
    @forelse ($courses as $course)
        <div class="bg-white rounded-lg shadow-md overflow-hidden hover:shadow-lg transition">
            @if ($course->thumbnail)
                <img src="{{ asset('storage/' . $course->thumbnail) }}" alt="{{ $course->title }}" class="w-full h-48 object-cover">
            @else
                <div class="w-full h-48 bg-gray-300 flex items-center justify-center">
                    <span class="text-gray-600">Pas d'image</span>
                </div>
            @endif
            
            <div class="p-6">
                <h3 class="text-xl font-bold text-gray-900 mb-2">{{ $course->title }}</h3>
                <p class="text-gray-600 text-sm mb-4 line-clamp-2">{{ $course->description }}</p>
                
                <div class="flex justify-between items-center mb-4">
                    <span class="text-sm text-gray-500">{{ $course->instructor->name }}</span>
                    <span class="text-lg font-bold text-blue-600">{{ number_format($course->price, 2) }} €</span>
                </div>
                
                <a href="{{ route('courses.show', $course) }}" class="block w-full text-center bg-blue-600 text-white py-2 rounded hover:bg-blue-700">
                    Voir les détails
                </a>
            </div>
        </div>
    @empty
        <div class="col-span-full text-center py-12">
            <p class="text-gray-600">Aucun cours disponible pour le moment.</p>
        </div>
    @endforelse
</div>

<!-- Pagination -->
<div class="mt-8">
    {{ $courses->links() }}
</div>
@endsection
