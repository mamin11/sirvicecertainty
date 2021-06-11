<div>
    <div class="relative flex items-top justify-center min-h-screen bg-gray-100  sm:items-center py-4 sm:pt-0">
        <form wire:submit.prevent='upload' method="POST" enctype="multipart/form-data">
            @csrf
            <div class="flex flex-col justify-center align-middle">
                <input type="text" wire:model="name" name="name" placeholder="enter name" class="py-4 px-4 m-4">
                @error('name')
                    <div class="text-center text-red-500 pb-4">{{ $message }}</div>
                @enderror
                <input type="file" wire:model="image" name="image"  class="py-4 px-4 m-4">
                @error('image')
                    <div class="text-center text-red-500 pb-4">{{ $message }}</div>
                @enderror
                @if ($image)
                    <img src="{{ $image->temporaryUrl() }}">
                @endif
                <button class="mx-auto bg-green-300 px-5 py-3 text-sm shadow-sm font-medium w-1/2 border text-white rounded-full hover:shadow-lg hover:bg-green-400">Submit</button>
            </div>
        <form>
            @if (session('link'))
                <a href="{{session('link')}}" target="_blank" class="text-black font-bold">
                    {{ session('link') }}
                </a>
            @endif
    </div>
</div>
