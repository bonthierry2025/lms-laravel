@extends('layouts.app')

@section('title', 'Dashboard - Admin')

@section('content')
<div class="mb-8">
    <h1 class="text-3xl font-bold text-gray-900">Dashboard Admin</h1>
    <p class="text-gray-600 mt-2">Bienvenue, {{ auth()->user()->name }}</p>
</div>

<div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
    <div class="bg-white p-6 rounded-lg shadow">
        <h3 class="text-lg font-bold text-gray-900">Utilisateurs</h3>
        <p class="text-3xl font-bold text-blue-600 mt-2">{{ $totalUsers }}</p>
    </div>
    <div class="bg-white p-6 rounded-lg shadow">
        <h3 class="text-lg font-bold text-gray-900">Cours</h3>
        <p class="text-3xl font-bold text-green-600 mt-2">{{ $totalCourses }}</p>
    </div>
    <div class="bg-white p-6 rounded-lg shadow">
        <h3 class="text-lg font-bold text-gray-900">Inscriptions</h3>
        <p class="text-3xl font-bold text-purple-600 mt-2">{{ $totalEnrollments }}</p>
    </div>
    <div class="bg-white p-6 rounded-lg shadow">
        <h3 class="text-lg font-bold text-gray-900">Taux Complétion</h3>
        <p class="text-3xl font-bold text-orange-600 mt-2">75%</p>
    </div>
</div>

<div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
    <div class="bg-white rounded-lg shadow-md p-6">
        <h2 class="text-xl font-bold text-gray-900 mb-4">Actions Rapides</h2>
        <div class="space-y-2">
            <a href="#" class="block w-full text-left bg-blue-100 text-blue-700 px-4 py-2 rounded hover:bg-blue-200">Gérer les utilisateurs</a>
            <a href="#" class="block w-full text-left bg-green-100 text-green-700 px-4 py-2 rounded hover:bg-green-200">Voir tous les cours</a>
            <a href="#" class="block w-full text-left bg-purple-100 text-purple-700 px-4 py-2 rounded hover:bg-purple-200">Analyser les données</a>
        </div>
    </div>
    
    <div class="bg-white rounded-lg shadow-md p-6">
        <h2 class="text-xl font-bold text-gray-900 mb-4">Statistiques Récentes</h2>
        <div class="space-y-3 text-gray-700">
            <div>Nouveaux utilisateurs cette semaine: <strong>12</strong></div>
            <div>Cours publiés ce mois: <strong>5</strong></div>
            <div>Certificats délivrés: <strong>23</strong></div>
        </div>
    </div>
</div>
@endsection
