@extends('layouts.app')
@section('content')
<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 text-gray-900 dark:text-gray-100">
                <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                    <h1 class="text-3xl font-bold">Skills</h1>
                    <hr class="h-1 bg-emerald-500">
                    <div class="flex justify-end mt-2">
                        <a href="{{route('users.skills.create')}}" class="bg-blue-600 text-white px-4 py-2 rounded">create</a>
                    </div>
                    <div class="mt-6">
                        
                        <table id="mytable"  class=" display text-xs text-gray-700 uppercase flex justify-center bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                            <thead>
                                    <tr>
                                        <th class=" border px-6 py-3" >SN</th>
                                        <th class=" border px-6 py-3" >Name</th>
                                        <th class=" border px-6 py-3" >Proficiency</th>
                                        <th class=" border px-6 py-3" >action</th>
                                    </tr>
                            </thead>
                            <tbody>
                                @foreach ($skills as $skills)
                                    <tr>
                                        <td class="px-6 py-4">{{$loop->index +1}}</td>
                                        <td class="px-6 py-4">{{$skills->name}}</td>
                                        <td class="px-6 py-2">{{$skills->proficiency}}</td>
                                        <td>
                                            <a href="{{route('users.skills.edit',$skills->id)}}" class="bg-blue-600 text-white px-4 py-2 rounded-lg">Edit</a>
                                            <a href="{{route('users.skills.delete',$skills->id)}}"onclick="return confirm('Are you sure to Delete?')" class="bg-red-600 text-white px-4 py-2 rounded-lg">Delete</a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection