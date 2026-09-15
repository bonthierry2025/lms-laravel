@extends('layouts.app')

@section('title', 'Créer un Cours')

@section('content')
<div class="max-w-2xl mx-auto bg-white rounded-lg shadow-md p-8">
    <h1 class="text-3xl font-bold text-gray-900 mb-6">Créer un Nouveau Cours</h1>
    
    <form method="POST" action="{{ route('courses.store') }}" enctype="multipart/form-data">
        @csrf
        
        <div class="mb-6">
            <label for="title" class="block text-gray-700 font-bold mb-2">Titre du cours</label>
            <input type="text" id="title" name="title" class="w-full border border-gray-300 rounded px-4 py-2 focus:outline-none focus:border-blue-600" required>
            @error('title')
                <span class="text-red-600 text-sm">{{ $message }}</span>
            @enderror
        </div>
        
        <div class="mb-6">
            <label for="description" class="block text-gray-700 font-bold mb-2">Description</label>
            <textarea id="description" name="description" rows="4" class="w-full border border-gray-300 rounded px-4 py-2 focus:outline-none focus:border-blue-600" required></textarea>
            @error('description')
                <span class="text-red-600 text-sm">{{ $message }}</span>
            @enderror
        </div>
        
        <div class="grid grid-cols-2 gap-6 mb-6">
            <div>
                <label for="category_id" class="block text-gray-700 font-bold mb-2">Catégorie</label>
                <select id="category_id" name="category_id" class="w-full border border-gray-300 rounded px-4 py-2 focus:outline-none focus:border-blue-600" required>
                    <option value="">-- Sélectionner une catégorie --</option>
                    @foreach (\App\Models\CourseCategory::all() as $category)
                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                    @endforeach
                </select>
                @error('category_id')
                    <span class="text-red-600 text-sm">{{ $message }}</span>
                @enderror
            </div>
            
            <div>
                <label for="level" class="block text-gray-700 font-bold mb-2">Niveau</label>
                <select id="level" name="level" class="w-full border border-gray-300 rounded px-4 py-2 focus:outline-none focus:border-blue-600" required>
                    <option value="beginner">Débutant</option>
                    <option value="intermediate">Intermédiaire</option>
                    <option value="advanced">Avancé</option>
                </select>
                @error('level')
                    <span class="text-red-600 text-sm">{{ $message }}</span>
                @enderror
            </div>
        </div>
        
        <div class="mb-6">
            <label for="price" class="block text-gray-700 font-bold mb-2">Prix (€)</label>
            <input type="number" id="price" name="price" step="0.01" class="w-full border border-gray-300 rounded px-4 py-2 focus:outline-none focus:border-blue-600" value="0" required>
            @error('price')
                <span class="text-red-600 text-sm">{{ $message }}</span>
            @enderror
        </div>
        
        <div class="mb-6">
            <label for="thumbnail" class="block text-gray-700 font-bold mb-2">Image de couverture</label>
            <input type="file" id="thumbnail" name="thumbnail" class="w-full border border-gray-300 rounded px-4 py-2 focus:outline-none focus:border-blue-600">
            @error('thumbnail')
                <span class="text-red-600 text-sm">{{ $message }}</span>
            @enderror
        </div>
        
        <div class="flex justify-between">
            <a href="{{ route('courses.index') }}" class="bg-gray-300 text-gray-700 px-6 py-2 rounded hover:bg-gray-400">
                Annuler
            </a>
            <button type="submit" class="bg-blue-600 text-white px-6 py-2 rounded hover:bg-blue-700">
                Créer le cours
            </button>
        </div>
    </form>
</div>
@endsection
