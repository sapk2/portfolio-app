@extends('layouts.app')
@section('content')
    <div class="flex justify-center py-6">
        <div class="w-full max-w-4xl bg-gray-500 shadow-xl rounded-lg p-8">
            <h1 class="text-2xl font-semibold text-gray-900 mb-4">Edit Resume</h1>
            <hr class="border border-red-500 mb-6">
            <form action="{{ route('users.resumes.update', $resume->id) }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="grid gap-6 mb-6 md:grid-cols-2">
                    <!-- First Name -->
                    <div>
                        <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">First Name</label>
                        <input type="text" id="name" name="name" value="{{ old('name', $resume->name) }}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required />
                    </div>

                    <!-- Email -->
                    <div>
                        <label for="email" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Email Address</label>
                        <input type="email" id="email" name="email" value="{{ old('email', $resume->email) }}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required />
                    </div>

                    <!-- Phone -->
                    <div>
                        <label for="phone" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Phone Number</label>
                        <input type="tel" id="phone" name="phone" value="{{ old('phone', $resume->phone) }}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required />
                    </div>

                    <!-- File Upload -->
                    <div class="col-span-2">
                        <label for="multiple_files" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Upload Multiple Files</label>
                        <input type="file" id="multiple_files" name="pdf_path[]" class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400" multiple>
                    </div>
                </div>

                <div class="flex justify-center mt-6">
                    <button type="submit" class="bg-blue-600 text-white px-6 py-2 rounded-lg mx-2 hover:bg-blue-700 focus:outline-none">Update</button>
                    <a href="{{ route('users.resumes.index') }}" class="bg-red-500 text-white px-6 py-2 rounded-lg mx-2 hover:bg-red-600 focus:outline-none">Cancel</a>
                </div>
            </form>
        </div>
    </div>
@endsection
