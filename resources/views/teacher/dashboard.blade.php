@extends('layouts.app')

@section('title', 'Dashboard - Professeur')

@section('content')
<div class="mb-8">
    <h1 class="text-3xl font-bold text-gray-900">Dashboard Professeur</h1>
    <p class="text-gray-600 mt-2">Bienvenue, {{ auth()->user()->name }}</p>
</div>

<div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">
    <div class="bg-white p-6 rounded-lg shadow">
        <h3 class="text-lg font-bold text-gray-900">Vos Cours</h3>
        <p class="text-3xl font-bold text-blue-600 mt-2">{{ $courses->count() }}</p>
    </div>
    <div class="bg-white p-6 rounded-lg shadow">
        <h3 class="text-lg font-bold text-gray-900">Étudiants</h3>
        <p class="text-3xl font-bold text-green-600 mt-2">{{ $totalStudents }}</p>
    </div>
    <div class="bg-white p-6 rounded-lg shadow">
        <h3 class="text-lg font-bold text-gray-900">Évaluations</h3>
        <p class="text-3xl font-bold text-yellow-600 mt-2">8</p>
    </div>
</div>

<h2 class="text-2xl font-bold text-gray-900 mb-4">Mes Cours</h2>
<div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
    @forelse ($courses as $course)
        <div class="bg-white rounded-lg shadow-md p-6">
            <h3 class="text-lg font-bold text-gray-900 mb-2">{{ $course->title }}</h3>
            <p class="text-gray-600 text-sm mb-4">{{ $course->description }}</p>
            
            <div class="space-y-2 text-sm text-gray-600 mb-4">
                <div>Étudiants: <strong>{{ $course->getEnrollmentCount() }}</strong></div>
                <div>Leçons: <strong>{{ $course->getTotalLessons() }}</strong></div>
                <div>Statut: <strong>{{ $course->is_published ? 'Publié' : 'Brouillon' }}</strong></div>
            </div>
            
            <div class="flex space-x-2">
                <a href="#" class="flex-1 text-center bg-blue-600 text-white py-2 rounded hover:bg-blue-700 text-sm">
                    Éditer
                </a>
                <a href="{{ route('courses.show', $course) }}" class="flex-1 text-center bg-gray-200 text-gray-700 py-2 rounded hover:bg-gray-300 text-sm">
                    Voir
                </a>
            </div>
        </div>
    @empty
        <div class="col-span-full text-center py-8 bg-gray-50 rounded">
            <p class="text-gray-600 mb-4">Vous n'avez pas encore de cours.</p>
            <a href="{{ route('courses.create') }}" class="inline-block bg-blue-600 text-white px-6 py-2 rounded hover:bg-blue-700">
                Créer un cours
            </a>
        </div>
    @endforelse
</div>
@endsection
