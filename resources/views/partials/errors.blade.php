@if($errors->has($field))
    <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">
        @foreach($errors->get($field) as $error)
            <strong class="font-bold">!!!</strong>
            <span class="block sm:inline">{{ $error }}</span>
        @endforeach
    </div>
@endif
