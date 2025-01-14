@extends('layouts.app')
@section('content')
<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 text-gray-900 dark:text-gray-100">
              <div class="container grid-layout drop-shadow-md bg-gray-500 p-3 mt-3 min-h-min">
                <h1 class="font-bold text-3xl px-2">Create Projects</h1>
                <hr class="h-2 border bg-red-500 " >
                <div>
                    <form action="{{route('users.projects.store')}}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="grid gap-6 mb-6 md:grid-cols-2">
                            <div class=" px-2 mt-6">
                                <label for="title" class="block mb-2 text-sm font-medium text-white-700 dark:text-white-500">Title</label>
                                 <input type="text"  name="title" class="bg-green-50 border border-green-500 text-green-900 dark:text-green-400 placeholder-green-700 dark:placeholder-green-500 text-sm rounded-lg focus:ring-green-500 focus:border-green-500 block w-full p-2.5 dark:bg-gray-700 dark:border-green-500" >
                                 @error('title')
                                     <span class="text-red-600">{{$message}}</span>
                                 @enderror
                            </div>
                            <div class=" px-2 mt-1">
                                <label for="description" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Your message</label>
                                <textarea id="description" name="description" rows="4" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-green-500 focus:border-green-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-green-500 dark:focus:border-green-500" placeholder="Write your thoughts here..."></textarea>
                                 @error('description')
                                     <span class="text-red-600">{{$message}}</span>
                                 @enderror
                            </div>
                            <div class=" px-2 mt-1">
                                <label for="github_link" class="block mb-2 text-sm font-medium text-white-700 dark:text-white-500">Url</label>
                                 <input type="url" name="github_link" id="github_link" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-green-500 focus:border-green-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-green-500 dark:focus:border-green-500">
                                 @error('github_link')
                                     <span class="text-red-600">{{$message}}</span>
                                 @enderror
                            </div>
                           
                            <div class="mb-6">
                                <label for="completedate" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">completion_date </label>
                                <input type="date" id="default-input" name="completion_date" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-green-500 focus:border-green-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-green-500 dark:focus:border-green-500">
                                @error('completion_date')
                                <span class="text-red-600"> {{$message}}</span>
                            @enderror
                            </div>

                        </div>
                        <div class="flex justify-center mt-6">
                            <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800"> save</button>
                            <a href="{{route('users.projects.index')}}"class="text-white bg-gray-800 hover:bg-gray-900 focus:outline-none focus:ring-4 focus:ring-gray-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-gray-800 dark:hover:bg-gray-700 dark:focus:ring-gray-700 dark:border-gray-700">Back</a>
                        </div>
                       
                    </form>
                </div>
              </div>
            </div>
        </div>
    </div>
</div>
@endsection