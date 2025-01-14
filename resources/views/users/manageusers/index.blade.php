@extends('layouts.app')
@section('content')
<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 text-gray-900 dark:text-gray-100">
               <h1 class="text-2xl text-white">Manage users</h1>
               <hr class="border">
               <div class="flex justify-end">
                <a href="{{route('users.manageusers.create')}}"class="bg-blue-600 text-white px-4 py-2 mt-2 rounded">create</a>
               </div>
              
               <div class="relative overflow-x-auto">
                    <table id="mytable" class="display w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                            <tr>
                                <th class="border px-6 py-5">SN</th>
                                <th class="border px-6 py-5">Name</th>
                                <th class="border px-6 py-5">Email</th>
                                <th class="border px-6 py-5">Role</th>
                                <th class="border px-6 py-5">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($user as $user)
                                <tr >
                                    <td class="border px-4 py-2">{{$loop->index +1}}</td>
                                    <td class="border px-4 py-2">{{$user->name}}</td>
                                    <td class="border px-4 py-2">{{$user->email}}</td>
                                    <td class="border px-4 py-2">{{$user->role}}</td>
                                    <td class="border px-4 py-2">
                                        <a href="{{route('users.manageusers.edit',$user->id)}}" class="bg-blue-600 text-white px-6 py-2 rounded-lg">Edit</a>
                                        
                                        <a href="{{route('users.manageusers.delete',$user->id)}}"class="bg-red-600 text-white px-4 py-2 ml-2 rounded-lg" onclick="return confirm('Are you sure to delete?')">Delete</a>
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
    $(document).ready(function() 
    {
        $('#mytable').DataTable();
    } );
</script>
@endsection