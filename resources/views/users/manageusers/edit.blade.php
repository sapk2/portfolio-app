@extends('layouts.app')

@section('content')
<div class="container mx-auto mt-10">
    <div class="max-w-lg mx-auto bg-gray-500 p-6 rounded-lg shadow-md">
        <h1 class="text-2xl font-bold mb-4 text-center">Edit User</h1>
        <form action="{{ route('users.manageusers.update', $user->id) }}" method="POST">
            @csrf
            <div class="mb-4">
                <label for="name" class="block text-gray-700 font-medium mb-2">Name:</label>
                <input 
                    type="text" 
                    class="block w-full p-2 border border-gray-300 rounded-lg focus:outline-none focus:ring focus:ring-blue-200" 
                    id="name" 
                    name="name" 
                    value="{{ $user->name }}" 
                    required>
            </div>
            <div class="mb-4">
                <label for="email" class="block text-gray-700 font-medium mb-2">Email:</label>
                <input 
                    type="email" 
                    class="block w-full p-2 border border-gray-300 rounded-lg focus:outline-none focus:ring focus:ring-blue-200" 
                    id="email" 
                    name="email" 
                    value="{{ $user->email }}" 
                    required>
            </div>
            <div class="mb-4">
                <label for="password" class="block text-gray-700 font-medium mb-2">Password:</label>
                <input 
                    type="password" 
                    class="block w-full p-2 border border-gray-300 rounded-lg focus:outline-none focus:ring focus:ring-blue-200" 
                    id="password" 
                    name="password">
                <small class="text-red-700">Leave blank to keep the current password</small>
            </div>
            <div class="mb-4">
                <label for="role" class="block text-gray-700 font-medium mb-2">Role:</label>
                <select 
                    class="block w-full p-2 border border-gray-300 rounded-lg focus:outline-none focus:ring focus:ring-blue-200" 
                    id="role" 
                    name="role" 
                    required>
                    <option value="" disabled>Select Role</option>
                    <option value="admin" {{ $user->role === 'admin' ? 'selected' : '' }}>Admin</option>
                    <option value="user" {{ $user->role === 'user' ? 'selected' : '' }}>User</option>
                    <option value="editor" {{ $user->role === 'editor' ? 'selected' : '' }}>Editor</option>
                </select>
            </div>
            <div class="flex justify-between items-center mt-6">
                <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded-lg hover:bg-blue-600">
                    Update User
                </button>
                <a href="{{ route('users.manageusers.index') }}" class="text-blue-500 hover:underline">Cancel</a>
            </div>
        </form>
    </div>
</div>
@endsection
