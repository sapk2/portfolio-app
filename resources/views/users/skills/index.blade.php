@extends('layouts.app')
@section('content')
<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 text-gray-900 dark:text-gray-100">
                <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                    <h1 class="text-3xl font-bold mb-4">Skills</h1>
                    <hr class="h-1 bg-emerald-500">
                    <div class="flex justify-end mt-4">
                        <a href="{{ route('users.skills.create') }}" 
                           class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700 transition" 
                           aria-label="Create Skill">
                            Create
                        </a>
                    </div>
                    <div class="mt-6">
                        <table id="mytable" class="w-full text-sm text-gray-700 text-center bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                            <thead>
                                <tr class="text-center">
                                    <th scope="col" class="border px-6 py-3">SN</th>
                                    <th scope="col" class="border px-6 py-3">Name</th>
                                    <th scope="col" class="border px-6 py-3">Proficiency</th>
                                    <th scope="col" class="border px-6 py-3">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($skills as $skill)
                                    <tr class=" text-center bg-white dark:bg-gray-800 hover:bg-gray-100 dark:hover:bg-gray-700">
                                        <td class=" text-center border px-6 py-4">{{ $loop->iteration }}</td>
                                        <td class="border px-6 py-4">{{ $skill->name }}</td>
                                        <td class="border px-6 py-4">{{ $skill->proficiency }}</td>
                                        <td class="border px-6 py-4 flex space-x-2">
                                            <a href="{{ route('users.skills.edit', $skill->id) }}" 
                                               class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700 transition" 
                                               aria-label="Edit Skill">
                                                Edit
                                            </a>
                                            <a href="{{ route('users.skills.delete', $skill->id) }}" 
                                               onclick="return confirm('Are you sure you want to delete this skill?')" 
                                               class="bg-red-600 text-white px-4 py-2 rounded hover:bg-red-700 transition" 
                                               aria-label="Delete Skill">
                                                Delete
                                            </a>
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
<script>
     $(document).ready(function() {
                    $('#mytable').DataTable();
                });
</script>
@endsection
