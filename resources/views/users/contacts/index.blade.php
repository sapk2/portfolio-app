@extends('layouts.app')
@section('content')
<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 text-gray-900 dark:text-gray-100">
                <div class="max-w-6xl mx-auto p-6 bg-gray-600 shadow-xl rounded-lg">
                    <h1 class="text-2xl font-bold mb-4">Contact Messages</h1>
                    <hr class="border">
                    <table id="mytable" class="table-auto w-full">
                        <thead>
                            <tr>
                                <th class="border px-4 py-2 bg-orange-300">Name</th>
                                <th class="border px-4 py-2 bg-orange-300">Email</th>
                                <th class="border px-4 py-2 bg-orange-300">Subject</th>
                                <th class="border px-4 py-2 bg-orange-300">Message</th>
                                <th class="border px-4 py-2 bg-orange-300">Date</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($contact as $contact)
                                <tr>
                                    <td class="border px-4 py-2 bg-gray-600">{{ $contact->name }}</td>
                                    <td class="border px-4 py-2 bg-gray-600">{{ $contact->email }}</td>
                                    <td class="border px-4 py-2 bg-gray-600">{{ $contact->subject }}</td>
                                    <td class="border px-4 py-2 bg-gray-600">{{ $contact->message }}</td>
                                    <td class="border px-4 py-2 bg-gray-600">{{ $contact->created_at->format('d M Y, h:i A') }}</td>
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