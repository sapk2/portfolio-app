@extends('layouts.app')

@section('content')
<div class="py-2">
    @if (session('sucess'))
    <div class="bg-blue-100 border-t border-b border-blue-500 text-blue-700 px-4 py-3" role="alert">
        {{session('sucess')}}
      </div>
    @endif
        
    
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 text-gray-900 dark:text-gray-100">
               <h1 class="mt-4 text-white text-2xl">Resumes</h1>
               <hr class="border border-green-600">
               <div class="flex justify-end mt-4">
                <!-- Button to open modal -->
                <button id="toggle" class="bg-green-500 text-white p-2 rounded-lg" onclick="openModal()">
                  Create Resume
                </button>
              </div>
               <table id="myTable" class="display table-auto w-full text-sm text-center text-white-600 border border-gray-300">
                <thead class="bg-gray-800">
                    <tr class="bg-gray-600">
                        <th class="border p-3 text-white">SN</th>
                        <th class="border p-3 text-white">Name</th>
                        <th class="border p-3 text-white">Email</th>
                        <th class="border p-3 text-white">Phone</th>
                        <th class="border p-3 text-white">PDF</th>
                        <th class="border p-3 text-white">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($resume as $resume)
                    <tr class="text-center">
                        <td class="border p-3">{{$loop->index + 1}}</td>
                        <td class="border p-3">{{$resume->name}}</td>
                        <td class="border p-3">{{$resume->email}}</td>
                        <td class="border p-3">{{$resume->phone}}</td>
                        <td class="border p-3">{{$resume->pdf_path}}</td>
                        <td>
                            <a href="{{route('users.resumes.edit',$resume->id)}}" class="bg-blue-500 text-white p-2 rounded-lg">Edit</a>
                            <a href="{{route('users.resumes.delete',$resume->id)}}" class="bg-red-500 text-white p-2 rounded-lg" onclick="return confirm('Are you sure to Delete?')">Delete</a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            </div>
        </div>
    </div>
</div>

<!-- Modal -->
<div id="createResumeModal" class="fixed inset-0 bg-gray-800 bg-opacity-50 flex justify-center items-center hidden">
    <div class="bg-gray-600 p-8 rounded-lg shadow-lg w-96">
        <div class="modal-header flex justify-between items-center">
            <h5 class="text-xl font-semibold text-gray-800">Create Resume</h5>
            <button type="button" onclick="closeModal()" class="text-gray-600 hover:text-gray-900">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path></svg>
            </button>
        </div>
        <form action="{{route('users.resumes.store')}}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="mb-4">
                <label for="name" class="block text-sm font-medium text-gray-700">Name</label>
                <input type="text" name="name" id="name" class="border border-gray-300 p-3 w-full rounded-lg" placeholder="Enter your name" required>
                @error('name')
                    <span class="text-red-500 mt-2 text-sm">{{$message}}</span>
                @enderror
            </div>
            <div class="mb-4">
                <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                <input type="email" name="email" id="email" class="border border-gray-300 p-3 w-full rounded-lg" placeholder="Enter your email" required>
                @error('email')
                    <span class="text-red-500 mt-2 text-sm">{{$message}}</span>
                @enderror
            </div>
            <div class="mb-4">
                <label for="phone" class="block text-sm font-medium text-gray-700">Phone</label>
                <input type="tel" name="phone" id="phone" class="border border-gray-300 p-3 w-full rounded-lg" placeholder="Enter your phone number" required>
                @error('phone')
                    <span class="text-red-500 mt-2 text-sm">{{$message}}</span>
                @enderror
            </div>
            <div class="mb-4">
                <label for="pdf" class="block text-sm font-medium text-gray-700">Upload PDF</label>
                <input type="file" name="pdf_path" accept="application/pdf" class="border border-gray-300 p-3 w-full rounded-lg" required>
                @error('pdf_path')
                    <span class="text-red-500 mt-2 text-sm">{{$message}}</span>
                @enderror
            </div>
            <div class="modal-footer flex justify-end space-x-2">
                <button type="button" onclick="closeModal()" class="bg-gray-600 text-white px-4 py-2 rounded-lg">Close</button>
                <button type="submit" class="text-white bg-gradient-to-r from-cyan-400 via-cyan-500 to-cyan-600 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-cyan-300 dark:focus:ring-cyan-800 font-medium rounded-lg text-sm px-5 py-2.5 text-center me-2 mb-2">Save Resume</button>
            </div>
        </form>
    </div>
</div>

<script>
    // Open Modal
    function openModal() {
        document.getElementById("createResumeModal").classList.remove("hidden");
    }

    // Close Modal
    function closeModal() {
        document.getElementById("createResumeModal").classList.add("hidden");
    }

    // Initialize DataTable
    $(document).ready(function() {
        $('#myTable').DataTable();
    });
</script>

@endsection
