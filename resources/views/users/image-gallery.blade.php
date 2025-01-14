@extends('layouts.app')
@section('content')
<div class="container mx-auto py-6">
    <h3 class="text-2xl font-semibold text-gray-800 mb-6">Gallery</h3>

    <form action="{{ url('image-gallery') }}" class="space-y-4" method="POST" enctype="multipart/form-data">
        {!! csrf_field() !!}

        @if (count($errors) > 0)
            <div class="bg-red-100 text-red-700 px-4 py-3 rounded mb-4">
                <strong>Whoops!</strong> There were some problems with your input.<br><br>
                <ul class="list-disc pl-6">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        @if ($message = Session::get('success'))
        <div class="bg-green-100 text-green-700 px-4 py-3 rounded mb-4">
            <button type="button" class="float-right text-green-800 hover:text-green-900 focus:outline-none">&times;</button>
            <strong>{{ $message }}</strong>
        </div>
        @endif

        <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
            <div>
                <label for="title" class="block text-gray-700 font-medium">Title:</label>
                <input type="text" name="title" id="title" class="mt-1 block w-full rounded border-gray-300 focus:ring-indigo-500 focus:border-indigo-500" placeholder="Title">
            </div>
            <div>
                <label for="image" class="block text-gray-700 font-medium">Image:</label>
                <input type="file" name="image" id="image" class="mt-1 block w-full rounded border-gray-300 focus:ring-indigo-500 focus:border-indigo-500">
            </div>
            <div class="flex items-end">
                <button type="submit" class="bg-indigo-600 text-white px-4 py-2 rounded hover:bg-indigo-700">Upload</button>
            </div>
        </div>
    </form>

    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6 mt-8">
        @if($images->count())
            @foreach($images as $image)
                <div class="relative group border rounded-lg overflow-hidden shadow-md">
                    <a class="block" href="/images/{{ $image->image }}">
                        <img class="w-full h-48 object-cover" alt="{{ $image->title }}" src="{{ asset('img/' . $image->image) }}">
                        <div class="p-2 bg-gray-900 bg-opacity-75 text-white text-center">
                            <small>{{ $image->title }}</small>
                        </div>
                    </a>
                    <form action="{{ url('image-gallery', $image->id) }}" method="POST" class="absolute top-2 right-2">
                        <input type="hidden" name="_method" value="delete">
                        {!! csrf_field() !!}
                        <button type="submit" class="bg-red-600 text-white rounded-full w-8 h-8 flex items-center justify-center hover:bg-red-700">
                            <i class="glyphicon glyphicon-remove"></i>
                        </button>
                    </form>
                </div>
            @endforeach
        @endif
    </div>
</div>

<script type="text/javascript">
    $(document).ready(function() {
        $(".fancybox").fancybox({
            openEffect: "none",
            closeEffect: "none"
        });
    });
</script>
@endsection
