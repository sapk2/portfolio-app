@extends('layouts.app')
@section('content')
<div class="container mx-auto py-6">
    <h1 class="text-2xl font-bold  text-white mb-4">About</h1>
    <form action="{{route('users.aboutme.update')}}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
    
        <div class="mb-4">
            <div class="grid gap-6 mb-6 md:grid-cols-2">
                <div>
                    <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">First name</label>
                    <input type="text" id="name"  name="name"  value="{{ $aboutme->name ?? '' }}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="John" required />
                </div>
                <div>
                    <label for="job_title" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Job title</label>
                    <input type="text" value="{{ $aboutme->job_title ?? '' }}" id="job_title" name="job_title" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Doe" required />
                </div>
                <div>
                    <label for="bio" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">bio</label>
                    <input type="text" value="{{ $aboutme->bio ?? '' }}" id="bio" name="bio" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Flowbite" required />
                </div>  
                <div>
                    <label for="skills" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">skills</label>
                    <input type="text" id="skills" value="{{ $aboutme->skills ?? '' }}" name="skills" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required />
                </div>
                <div>
                    <label for="education" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">education</label>
                    <input type="text" id="education" value="{{ $aboutme->education ?? '' }}" name="education" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="flowbite.com" required />
                </div>
                <div>
                    <label for="experience" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Unique experience</label>
                    <input type="text" id="experience" value="{{ $aboutme->experience ?? '' }}" name="experience" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="" required />
                </div>
            </div>
            <div class="mb-6">
                <label for="achievements" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">achievements address</label>
                <input type="text" id="achievements" value="{{ $aboutme->achievements ?? '' }}" name="achievements" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"  required />
            </div> 
            <div class="mb-6">
                <label for="hobbies" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">hobbies</label>
                <input type="hobbies" id="hobbies" value="{{ $aboutme->hobbies ?? '' }}" name="hobbies" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"  required />
            </div> 
            <div class="mb-6">
                <label for="goals" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Goals</label>
                <input type="text" value="{{ $aboutme->goals ?? '' }}" id="goals" name="goals" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"  required />
            </div>
        </div> 
 
        </div>
        <button type="submit" class="px-4 py-2 bg-blue-600 text-white rounded">Save</button>
    </form>
</div>  
@endsection