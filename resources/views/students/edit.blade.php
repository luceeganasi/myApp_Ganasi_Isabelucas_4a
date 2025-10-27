@extends('layouts.app')

@section('title', 'Edit Student')
@section('page-title', 'Edit Student')
@section('page-description', 'Update student information')

@section('content')
<div class="bg-white shadow rounded-lg">
    <div class="px-6 py-4 border-b border-gray-200">
        <h2 class="text-lg font-medium text-gray-900">Edit Student Information</h2>
        <p class="text-sm text-gray-600 mt-1">Student: {{ $student->lname }}, {{ $student->fname }} {{ $student->mi }}</p>
    </div>

    <form action="{{ route('students.update', $student) }}" method="POST" class="p-6 space-y-6">
        @csrf
        @method('PUT')
        
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <!-- Student Number -->
            <div>
                <label for="studentNumber" class="block text-sm font-medium text-gray-700 mb-2">
                    Student Number <span class="text-red-500">*</span>
                </label>
                <input type="text" 
                       name="studentNumber" 
                       id="studentNumber"
                       value="{{ old('studentNumber', $student->studentNumber) }}" 
                       placeholder="Enter student number"
                       required
                       class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500 @error('studentNumber') border-red-500 @enderror">
                @error('studentNumber')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <!-- Last Name -->
            <div>
                <label for="lname" class="block text-sm font-medium text-gray-700 mb-2">
                    Last Name <span class="text-red-500">*</span>
                </label>
                <input type="text" 
                       name="lname" 
                       id="lname"
                       value="{{ old('lname', $student->lname) }}" 
                       placeholder="Enter last name"
                       required
                       class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500 @error('lname') border-red-500 @enderror">
                @error('lname')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <!-- First Name -->
            <div>
                <label for="fname" class="block text-sm font-medium text-gray-700 mb-2">
                    First Name <span class="text-red-500">*</span>
                </label>
                <input type="text" 
                       name="fname" 
                       id="fname"
                       value="{{ old('fname', $student->fname) }}" 
                       placeholder="Enter first name"
                       required
                       class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500 @error('fname') border-red-500 @enderror">
                @error('fname')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <!-- Middle Initial -->
            <div>
                <label for="mi" class="block text-sm font-medium text-gray-700 mb-2">
                    Middle Initial
                </label>
                <input type="text" 
                       name="mi" 
                       id="mi"
                       value="{{ old('mi', $student->mi) }}" 
                       placeholder="Enter middle initial"
                       maxlength="2"
                       class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500 @error('mi') border-red-500 @enderror">
                @error('mi')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <!-- Email -->
            <div>
                <label for="email" class="block text-sm font-medium text-gray-700 mb-2">
                    Email Address
                </label>
                <input type="email" 
                       name="email" 
                       id="email"
                       value="{{ old('email', $student->email) }}" 
                       placeholder="Enter email address"
                       class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500 @error('email') border-red-500 @enderror">
                @error('email')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <!-- Contact Number -->
            <div>
                <label for="contactNumber" class="block text-sm font-medium text-gray-700 mb-2">
                    Contact Number
                </label>
                <input type="text" 
                       name="contactNumber" 
                       id="contactNumber"
                       value="{{ old('contactNumber', $student->contactNumber) }}" 
                       placeholder="Enter contact number"
                       class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500 @error('contactNumber') border-red-500 @enderror">
                @error('contactNumber')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>
        </div>

        <!-- Form Actions -->
        <div class="flex justify-end space-x-3 pt-6 border-t border-gray-200">
            <a href="{{ route('students.index') }}" 
               class="px-4 py-2 border border-gray-300 rounded-md text-sm font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 transition-colors">
                Cancel
            </a>
            <button type="submit" 
                    class="px-4 py-2 bg-blue-600 border border-transparent rounded-md text-sm font-medium text-white hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 transition-colors">
                Update Student
            </button>
        </div>
    </form>
</div>
@endsection
