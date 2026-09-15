<?php

namespace App\Http\Controllers;

use Illuminate\View\View;

class DashboardController extends Controller
{
    public function index(): View
    {
        $user = auth()->user();
        
        if ($user->isAdmin()) {
            return view('admin.dashboard', [
                'totalUsers' => \App\Models\User::count(),
                'totalCourses' => \App\Models\Course::count(),
                'totalEnrollments' => \App\Models\CourseEnrollment::count(),
            ]);
        } elseif ($user->isTeacher()) {
            return view('teacher.dashboard', [
                'courses' => $user->createdCourses()->get(),
                'totalStudents' => $user->createdCourses()->with('enrollments')->get()->sum(fn($c) => $c->enrollments->count()),
            ]);
        } else {
            return view('student.dashboard', [
                'enrolledCourses' => $user->courses()->get(),
                'inProgressCourses' => $user->courses()->where('course_enrollments.completed_at', null)->get(),
            ]);
        }
    }
}
