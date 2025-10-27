@extends('layouts.app')

@section('title', 'Student Management System')
@section('page-title', 'Welcome')
@section('page-description', 'Manage student records efficiently')

@section('content')
<div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 mb-8">
    <!-- Quick Stats -->
    <div class="bg-white overflow-hidden shadow rounded-lg">
        <div class="p-5">
            <div class="flex items-center">
                <div class="flex-shrink-0">
                    <div class="w-8 h-8 bg-blue-500 rounded-md flex items-center justify-center">
                        <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197m13.5-9a2.5 2.5 0 11-5 0 2.5 2.5 0 015 0z"></path>
                        </svg>
                    </div>
                </div>
                <div class="ml-5 w-0 flex-1">
                    <dl>
                        <dt class="text-sm font-medium text-gray-500 truncate">Total Students</dt>
                        <dd class="text-lg font-medium text-gray-900">{{ \App\Models\Student::count() }}</dd>
                    </dl>
                </div>
            </div>
        </div>
    </div>

    <!-- Quick Actions -->
    <div class="bg-white overflow-hidden shadow rounded-lg">
        <div class="p-5">
            <div class="flex items-center">
                <div class="flex-shrink-0">
                    <div class="w-8 h-8 bg-green-500 rounded-md flex items-center justify-center">
                        <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                        </svg>
                    </div>
                </div>
                <div class="ml-5 w-0 flex-1">
                    <dl>
                        <dt class="text-sm font-medium text-gray-500 truncate">Quick Actions</dt>
                        <dd class="text-lg font-medium text-gray-900">
                            <a href="{{ route('students.create') }}" class="text-blue-600 hover:text-blue-900">Add Student</a>
                        </dd>
                    </dl>
                </div>
            </div>
        </div>
    </div>

    <!-- System Status -->
    <div class="bg-white overflow-hidden shadow rounded-lg">
        <div class="p-5">
            <div class="flex items-center">
                <div class="flex-shrink-0">
                    <div class="w-8 h-8 bg-yellow-500 rounded-md flex items-center justify-center">
                        <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                    </div>
                </div>
                <div class="ml-5 w-0 flex-1">
                    <dl>
                        <dt class="text-sm font-medium text-gray-500 truncate">System Status</dt>
                        <dd class="text-lg font-medium text-green-600">Online</dd>
                    </dl>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Recent Students -->
<div class="bg-white shadow rounded-lg">
    <div class="px-6 py-4 border-b border-gray-200">
        <h2 class="text-lg font-medium text-gray-900">Recent Students</h2>
    </div>
    <div class="p-6">
        @php
            $recentStudents = \App\Models\Student::latest()->take(5)->get();
        @endphp
        
        @if($recentStudents->count() > 0)
            <div class="space-y-4">
                @foreach($recentStudents as $student)
                    <div class="flex items-center justify-between p-4 bg-gray-50 rounded-lg">
                        <div class="flex items-center">
                            <div class="w-10 h-10 bg-blue-100 rounded-full flex items-center justify-center">
                                <span class="text-sm font-medium text-blue-600">
                                    {{ strtoupper(substr($student->fname, 0, 1) . substr($student->lname, 0, 1)) }}
                                </span>
                            </div>
                            <div class="ml-4">
                                <p class="text-sm font-medium text-gray-900">
                                    {{ $student->lname }}, {{ $student->fname }} {{ $student->mi }}
                                </p>
                                <p class="text-sm text-gray-500">{{ $student->studentNumber }}</p>
                            </div>
                        </div>
                        <div class="flex space-x-2">
                            <a href="{{ route('students.edit', $student) }}" 
                               class="text-blue-600 hover:text-blue-900 text-sm font-medium">
                                Edit
                            </a>
                        </div>
                    </div>
                @endforeach
            </div>
            
            <div class="mt-6 text-center">
                <a href="{{ route('students.index') }}" 
                   class="bg-blue-600 hover:bg-blue-700 text-white px-6 py-3 rounded-md text-sm font-medium transition-colors">
                    View All Students
                </a>
            </div>
        @else
            <div class="text-center py-8">
                <div class="text-gray-500 text-lg mb-4">No students yet</div>
                <a href="{{ route('students.create') }}" 
                   class="bg-blue-600 hover:bg-blue-700 text-white px-6 py-3 rounded-md text-sm font-medium transition-colors">
                    Add Your First Student
                </a>
            </div>
        @endif
    </div>
</div>
@endsection