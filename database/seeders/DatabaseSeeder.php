<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        // Create roles
        $adminRole = Role::create(['name' => 'admin']);
        $teacherRole = Role::create(['name' => 'teacher']);
        $studentRole = Role::create(['name' => 'student']);

        // Create permissions
        $permissions = [
            'create_course',
            'edit_course',
            'delete_course',
            'manage_users',
            'view_analytics',
        ];

        foreach ($permissions as $permission) {
            Permission::create(['name' => $permission]);
        }

        // Assign permissions to roles
        $adminRole->syncPermissions($permissions);
        $teacherRole->syncPermissions(['create_course', 'edit_course', 'delete_course']);

        // Create test users
        $admin = User::create([
            'name' => 'Admin',
            'email' => 'admin@lms.local',
            'email_verified_at' => now(),
            'password' => Hash::make('password'),
            'is_active' => true,
        ]);
        $admin->assignRole('admin');

        $teacher = User::create([
            'name' => 'Professeur Test',
            'email' => 'teacher@lms.local',
            'email_verified_at' => now(),
            'password' => Hash::make('password'),
            'is_active' => true,
        ]);
        $teacher->assignRole('teacher');

        $student = User::create([
            'name' => 'Étudiant Test',
            'email' => 'student@lms.local',
            'email_verified_at' => now(),
            'password' => Hash::make('password'),
            'is_active' => true,
        ]);
        $student->assignRole('student');

        // Create course categories
        $categories = [
            ['name' => 'Programmation', 'slug' => 'programmation'],
            ['name' => 'Design', 'slug' => 'design'],
            ['name' => 'Affaires', 'slug' => 'affaires'],
            ['name' => 'Langues', 'slug' => 'langues'],
            ['name' => 'Développement Personnel', 'slug' => 'dev-personnel'],
        ];

        foreach ($categories as $cat) {
            \App\Models\CourseCategory::create($cat);
        }

        // Create sample courses
        $course = \App\Models\Course::create([
            'title' => 'Introduction à Laravel',
            'slug' => 'introduction-laravel',
            'description' => 'Apprenez les bases du framework Laravel et créez des applications web modernes.',
            'instructor_id' => $teacher->id,
            'category_id' => 1,
            'level' => 'beginner',
            'price' => 0,
            'is_published' => true,
            'is_featured' => true,
            'duration_hours' => 20,
        ]);

        // Create modules
        $module1 = \App\Models\Module::create([
            'course_id' => $course->id,
            'title' => 'Module 1: Les Bases',
            'description' => 'Découvrez les concepts fondamentaux de Laravel',
            'order' => 1,
        ]);

        $module2 = \App\Models\Module::create([
            'course_id' => $course->id,
            'title' => 'Module 2: Base de Données',
            'description' => 'Travail avec les migrations et les modèles',
            'order' => 2,
        ]);

        // Create lessons
        \App\Models\Lesson::create([
            'module_id' => $module1->id,
            'title' => 'Leçon 1: Installation',
            'description' => 'Comment installer Laravel',
            'content' => 'Contenu de la leçon...',
            'duration_minutes' => 30,
            'order' => 1,
            'is_published' => true,
        ]);

        \App\Models\Lesson::create([
            'module_id' => $module1->id,
            'title' => 'Leçon 2: Structure du Projet',
            'description' => 'Comprendre la structure d\'un projet Laravel',
            'content' => 'Contenu de la leçon...',
            'duration_minutes' => 45,
            'order' => 2,
            'is_published' => true,
        ]);

        \App\Models\Lesson::create([
            'module_id' => $module2->id,
            'title' => 'Leçon 3: Les Migrations',
            'description' => 'Créer et gérer les migrations de base de données',
            'content' => 'Contenu de la leçon...',
            'duration_minutes' => 50,
            'order' => 1,
            'is_published' => true,
        ]);

        // Create a quiz
        $quiz = \App\Models\Quiz::create([
            'course_id' => $course->id,
            'lesson_id' => null,
            'title' => 'Quiz: Les Bases de Laravel',
            'description' => 'Testez vos connaissances',
            'passing_score' => 70,
            'attempts_allowed' => 3,
            'is_published' => true,
        ]);

        // Create quiz questions
        \App\Models\QuizQuestion::create([
            'quiz_id' => $quiz->id,
            'question' => 'Laravel est basé sur quel langage de programmation?',
            'type' => 'multiple_choice',
            'points' => 1,
            'order' => 1,
        ]);
    }
}
