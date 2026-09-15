<?php

namespace App\Http\Controllers;

use App\Models\Course;
use Illuminate\Http\Request;
use Illuminate\View\View;

class CourseController extends Controller
{
    public function index(): View
    {
        $courses = Course::where('is_published', true)
            ->with('instructor', 'category')
            ->paginate(12);
            
        return view('courses.index', ['courses' => $courses]);
    }

    public function show(Course $course): View
    {
        $course->load('instructor', 'category', 'modules.lessons', 'enrollments');
        $isEnrolled = auth()->check() && auth()->user()->isEnrolledIn($course);
        
        return view('courses.show', [
            'course' => $course,
            'isEnrolled' => $isEnrolled,
        ]);
    }

    public function create(): View
    {
        $this->authorize('create', Course::class);
        return view('courses.create');
    }

    public function store(Request $request)
    {
        $this->authorize('create', Course::class);
        
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'category_id' => 'required|exists:course_categories,id',
            'level' => 'required|in:beginner,intermediate,advanced',
            'price' => 'required|numeric|min:0',
            'thumbnail' => 'nullable|image|max:2048',
        ]);

        if ($request->hasFile('thumbnail')) {
            $validated['thumbnail'] = $request->file('thumbnail')->store('courses', 'public');
        }

        $validated['instructor_id'] = auth()->id();
        $validated['slug'] = \Str::slug($validated['title']);
        $validated['is_published'] = false;

        $course = Course::create($validated);

        return redirect()->route('courses.show', $course)->with('success', 'Cours créé avec succès');
    }

    public function enroll(Course $course)
    {
        $user = auth()->user();
        
        if ($user->isEnrolledIn($course)) {
            return redirect()->back()->with('info', 'Vous êtes déjà inscrit à ce cours');
        }

        $user->courses()->attach($course->id);
        
        return redirect()->route('courses.show', $course)->with('success', 'Inscription réussie!');
    }
}
