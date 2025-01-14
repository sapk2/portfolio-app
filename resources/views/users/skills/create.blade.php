@extends('layouts.app')
@section('content')
<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 text-gray-900 dark:text-gray-100">
                <h1 class="">create</h1>
               <div class="container">
                <form action="{{route('users.skills.store')}}" method="post" enctype="multipart/form-data">
                    <div class="grid gap-6 mb-6 md:grid-cols-2">
                        <div>
                            <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white"> name</label>
                            <input type="text" id="name" name="name" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="John" required />
                            @error('name')
                                <span class="text-red-600">{{$message}}</span>
                            @enderror
                        </div>
                        <div>
                            <label for="proficiency">Proficiency (%):</label>
                            <input type="number" name="proficiency" id="proficiency" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"  required min="1" max="100">
                            @error('proficiency')
                                <span class="text-red-500">{{$message}}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="flex justify-center mt-6">
                        <button type="submit" class="bg-blue-600 text-white px-4 py-1 rounded mx-2">save</button>
                        <a href="{{route('users.skills.index')}}"class="bg-red-600 text-white px-8 py-1 rounded block">Exit</a>
                    </div>
                </form>

               </div>
            </div>
        </div>
    </div>
</div>
@endsection