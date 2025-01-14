@extends('layouts.app')
@section('content')
<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white dark:bg-gray-700 overflow-hidden shadow-lg md:rounded-lg">
            <div class="p-6 text-gray-900 dark:text-gray-100">
                <div class="container mt-3 px-2 py-4 grid-layout drop-shadow-md min-h-min">
                    <h1 class="mt-4 text-white text-2xl">Projects</h1>
                    <hr>
                    <div class="grid justify-end mt-4">
                        <a href="{{route('users.projects.create')}}" class="focus:outline-none text-white bg-green-700 hover:bg-green-800 focus:ring-4 focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800">create</a>
                    </div>
                    <table id="mytable" class=" display w-full text-sm text-left rtl:text-right text-white dark:text-white-400">
                        <thead>
                            <tr>
                                <th class="border px-6 py-3">SN</th>
                                <th class="border px-6 py-3">Title</th>
                                <th class="border px-6 py-3">Description</th>
                                <th class="border px-6 py-3">Url</th>
                                <th class="border px-6 py-3">Completion Date</th>
                                <th class="border px-6 py-3">Actions</th>

                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($project as $item)
                           <tr>
                            <td class="border px-6 py-4">{{$loop->index + 1}}</td>
                            <td class="border px-6 py-4">{{$item->title}}</td>
                            <td class="border px-6 py-4">{{$item->description}}</td>
                            <td class="border px-6 py-4">{{$item->github_link}}</td>
                            <td class="border px-6 py-4">{{$item->completion_date}}</td>
                            <td>
                                <a href="{{route('users.projects.edit',$item->id)}}" class="px-4 py-2 bg-blue-500 text-white font-semibold rounded hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-400">Edit</a>
                                <a href="{{route('users.projects.delete',$item->id)}}" class="px-4 py-2 bg-red-500 text-white font-semibold rounded hover:bg-red-600 focus:outline-none focus:ring-2 focus:ring-red-400" onclick="return confirm('Are you sure?')">Delete</a>
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
<script>
    $(document).ready(function() {
        $('#mytable').DataTable();
    });
</script>
@endsection