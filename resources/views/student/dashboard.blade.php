@extends('layouts.app')

@section('title', 'Dashboard - Étudiant')

@section('content')
<div class="mb-8">
    <h1 class="text-3xl font-bold text-gray-900">Dashboard - Étudiant</h1>
    <p class="text-gray-600 mt-2">Bienvenue, {{ auth()->user()->name }}</p>
</div>

<div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">
    <div class="bg-white p-6 rounded-lg shadow">
        <h3 class="text-lg font-bold text-gray-900">Cours Inscrits</h3>
        <p class="text-3xl font-bold text-blue-600 mt-2">{{ $enrolledCourses->count() }}</p>
    </div>
    <div class="bg-white p-6 rounded-lg shadow">
        <h3 class="text-lg font-bold text-gray-900">En Cours</h3>
        <p class="text-3xl font-bold text-green-600 mt-2">{{ $inProgressCourses->count() }}</p>
    </div>
    <div class="bg-white p-6 rounded-lg shadow">
        <h3 class="text-lg font-bold text-gray-900">Certificats</h3>
        <p class="text-3xl font-bold text-purple-600 mt-2">{{ auth()->user()->certificates()->count() }}</p>
    </div>
</div>

<h2 class="text-2xl font-bold text-gray-900 mb-4">Mes Cours</h2>
<div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
    @forelse ($enrolledCourses as $course)
        <div class="bg-white rounded-lg shadow-md p-6">
            <h3 class="text-lg font-bold text-gray-900 mb-2">{{ $course->title }}</h3>
            <p class="text-gray-600 text-sm mb-4">{{ $course->instructor->name }}</p>
            
            <div class="mb-4">
                <div class="text-sm text-gray-600 mb-1">Progression</div>
                <div class="w-full bg-gray-200 rounded-full h-2">
                    <div class="bg-blue-600 h-2 rounded-full" style="width: {{ auth()->user()->getProgressInCourse($course) }}%"></div>
                </div>
                <div class="text-sm text-gray-600 mt-1">{{ auth()->user()->getProgressInCourse($course) }}%</div>
            </div>
            
            <a href="{{ route('courses.show', $course) }}" class="block text-center bg-blue-600 text-white py-2 rounded hover:bg-blue-700">
                Continuer
            </a>
        </div>
    @empty
        <div class="col-span-full text-center py-8 bg-gray-50 rounded">
            <p class="text-gray-600">Vous n'êtes pas encore inscrit à des cours.</p>
            <a href="{{ route('courses.index') }}" class="text-blue-600 hover:underline mt-2 inline-block">Découvrir les cours</a>
        </div>
    @endforelse
</div>
@endsection
