@extends('layouts.app')
@section('content')
    <div class="min-h-screen bg-gray-700 flex flex-col justify-center py-12 sm:px-6 lg:px-8">
        <div class="sm:mx-auto sm:w-full sm:max-w-md text-center">
            <img class="mx-auto h-12 w-auto" src="https://www.svgrepo.com/show/301692/login.svg" alt="Workflow">
            <h2 class="mt-6 text-3xl font-extrabold text-gray-900">Create a new account</h2>
            <p class="mt-2 text-sm text-gray-600">Or
                <a class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800" href="{{ route('login') }}">
                    {{ __('Already registered?') }}
                </a>
            </p>
        </div>
    
        <div class="mt-8 sm:mx-auto sm:w-full sm:max-w-md">
            <div class="bg-white py-8 px-6 shadow rounded-lg">
                <form method="POST" action="#">
                    @csrf
    
                    <div class="space-y-4">
                        <div>
                            <label for="name" class="block text-sm font-medium text-gray-700">Name</label>
                            <input id="name" name="name" type="text" placeholder="John Doe" required
                                class="mt-1 block w-full px-4 py-2 border rounded-lg focus:ring focus:ring-blue-300 focus:border-blue-500">
                        </div>
    

                        <div>
                            <label for="email" class="block text-sm font-medium text-gray-700">Email address</label>
                            <input id="email" name="email" type="email" placeholder="user@example.com" required
                                class="mt-1 block w-full px-4 py-2 border rounded-lg focus:ring focus:ring-blue-300 focus:border-blue-500">
                        </div>
    
                        <div>
                            <label for="password" class="block text-sm font-medium text-gray-700">Password</label>
                            <input id="password" name="password" type="password" required
                                class="mt-1 block w-full px-4 py-2 border rounded-lg focus:ring focus:ring-blue-300 focus:border-blue-500">
                        </div>
    
                        <div>
                            <label for="password_confirmation" class="block text-sm font-medium text-gray-700">Confirm Password</label>
                            <input id="password_confirmation" name="password_confirmation" type="password" required
                                class="mt-1 block w-full px-4 py-2 border rounded-lg focus:ring focus:ring-blue-300 focus:border-blue-500">
                        </div>
                    </div>
    
                    <div class="flex items-center justify-end mt-4">
                        <a class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800" href="{{ route('login') }}">
                            {{ __('Already registered?') }}
                        </a>
            
                        <x-primary-button class="ms-4">
                            {{ __('Register') }}
                        </x-primary-button>
                    </div>
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection