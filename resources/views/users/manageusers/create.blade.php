@extends('layouts.app')

@section('content')
<div class="container mx-auto mt-10">
    <div class="max-w-lg mx-auto bg-gray-600 p-6 rounded-lg shadow-md">
        <h1 class="text-2xl font-bold mb-4 text-center">Create User</h1>
        <form action="{{ route('users.manageusers.store') }}" method="POST">
            @csrf
            <div class="mb-4">
                <label for="name" class="block text-gray-300 font-medium mb-2">Name:</label>
                <input 
                    type="text" 
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" 
                    id="name" 
                    name="name" 
                    placeholder="Enter your name" 
                    required>
            </div>
            <div class="mb-4">
                <label for="email" class="block text-gray-700 font-medium mb-2">Email:</label>
                <input 
                    type="email" 
                    class="bg-gray-500 border border-gray-500 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" 
                    id="email" 
                    name="email" 
                    placeholder="Enter your email" 
                    required>
            </div>
            <div class="mb-4">
                <label for="password" class="block text-gray-700 font-medium mb-2">Password:</label>
                <input 
                    type="password" 
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" 
                    id="password" 
                    name="password" 
                    placeholder="Enter your password" 
                    required>
            </div>
            <div class="mb-4">
                <label for="role" class="block text-gray-700 font-medium mb-2">Role:</label>
                <select 
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" 
                    id="role" 
                    name="role" 
                    required>
                    <option value="" disabled selected>Select Role</option>
                    <option value="admin">Admin</option>
                    <option value="user">User</option>
                    <option value="editor">Editor</option>
                </select>
            </div>
            <div class="flex justify-between items-center mt-6">
                <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded-lg hover:bg-blue-600">
                    Create User
                </button>
                <a href="{{ route('users.manageusers.index') }}" class="text-blue-500 hover:underline">Cancel</a>
            </div>
        </form>
    </div>
</div>
@endsection
