
@extends('welcome')

@section('title')

    Create contact

@endsection

@section('content')
    <div class="w-full text-center">
        <form action="/contacts/update/{{$contact->id}}" method="POST" enctype="multipart/form-data" class="float-left w-full p-8">
            @csrf
            {{ method_field('PUT') }}
            <div id="image-container">
                <img id="nodi" class="w-32 h-32 rounded-full mr-4" src="{{$contact->avatar}}" alt="Avatar of {{$contact ? $contact->first_name : ""}}">
            </div>
            <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-first-name">
                    Avatar Image
                </label>
                <input
                    name="avatar"
                    class="appearance-none block w-full text-gray-700 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white"
                    id="grid-avatar"
                    type="file"
                    placeholder="Image"
                    onchange="onUploadImage(event)"
                >
                @include('partials.errors', ['field' => 'avatar'])
            </div>
            <div class="flex flex-wrap -mx-3 mb-6 mt-5">
                <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                    <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-first-name">
                        First Name
                    </label>
                    <input
                        name="first_name"
                        class="appearance-none block w-full bg-gray-200 text-gray-700 border rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white"
                        id="grid-first-name"
                        type="text"
                        value="{{ isset($contact) ? $contact->first_name : "" }}"
                        placeholder="First Name">
                    @include('partials.errors', ['field' => 'first_name'])
                </div>
                <div class="w-full md:w-1/2 px-3">
                    <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-last-name">
                        Last Name
                    </label>
                    <input
                        name="last_name"
                        class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
                        id="grid-last-name"
                        type="text"
                        value="{{ isset($contact) ? $contact->last_name : "" }}"
                        placeholder="Last Name">
                    @include('partials.errors', ['field' => 'last_name'])
                </div>
            </div>
            <div class="flex flex-wrap -mx-3 mb-6">
                <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                    <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-first-name">
                        Email
                    </label>
                    <input
                        name="email"
                        class="appearance-none block w-full bg-gray-200 text-gray-700 border rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white"
                        id="grid-email"
                        type="text"
                        value="{{ isset($contact) ? $contact->email : "" }}"
                        placeholder="email">
                    @include('partials.errors', ['field' => 'email'])
                </div>
                <div class="w-full md:w-1/2 px-3">
                    <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-last-name">
                        Phone Number
                    </label>
                    <input
                        name="phone"
                        class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
                        id="grid-phone"
                        type="text"
                        value="{{ isset($contact) ? $contact->phone : "" }}"
                        placeholder="Phone number">
                    @include('partials.errors', ['field' => 'phone'])
                </div>
            </div>
            <div class="flex flex-wrap -mx-3 mb-2">
                <div class="w-full md:w-1/3 px-3 mb-6 md:mb-0">
                    <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-city">
                        City
                    </label>
                    <input
                        name="city"
                        class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
                        id="grid-city"
                        type="text"
                        value="{{ isset($contact) ? $contact->city : "" }}"
                        placeholder="City"
                    >
                    @include('partials.errors', ['field' => 'city'])
                </div>
                <div class="w-full md:w-1/3 px-3 mb-6 md:mb-0">
                    <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-state">
                        Address
                    </label>
                    <input
                        name="address"
                        class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
                        id="grid-address"
                        type="text"
                        value="{{ isset($contact) ? $contact->address : "" }}"
                        placeholder="Address"
                    >
                    @include('partials.errors', ['field' => 'address'])
                    <input class="hidden" value="{{$group}}" name="groupId">
                </div>
                <div class="w-full md:w-1/3 px-3 mb-6 md:mb-0">
                    <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-zip">
                        Zip
                    </label>
                    <input
                        name="zip"
                        class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
                        id="grid-zip"
                        type="number"
                        value="{{ isset($contact) ? $contact->zip : "" }}"
                        placeholder="Zip">
                    @include('partials.errors', ['field' => 'zip'])
                </div>
            </div>
            <div class="w-1/2 float-right">
                <h1 class="text-3xl font-extrabold">Personal Notes</h1>
                <style>
                    .mine-textarea{
                        /* box-sizing: padding-box; */
                        overflow:hidden;
                        /* demo only: */
                        padding:10px;
                        width: 100%;
                        font-size:14px;
                        display:inline-block;
                        border-radius:10px;
                        border:6px solid #556677;
                    }
                </style>
                <textarea
                    name="note"
                    class="mine-textarea"
                    id="myArea"
                    placeholder="We build fine acmes."
                    value="{{ old('note') }}"
                    rows="{{ isset($contact) ? "25" : '15' }}"
                >
                    {{ isset($contact) ? $contact->note : "" }}
                </textarea>
                @include('partials.errors', ['field' => 'note'])
            </div>
            <div class="w-full px-3 mb-6 md:mb-0">
                <button type="submit" class="mt-8 bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 border border-blue-700 rounded">
                    Update
                </button>
            </div>
        </form>
        <script>
            let textarea = document.getElementById('myArea');

            textarea.addEventListener('keydown', autosize);

            function autosize(){
                var el = this;
                setTimeout(function(){
                    el.style.cssText = 'height:auto; padding:0';
                    // for box-sizing other than "content-box" use:
                    // el.style.cssText = '-moz-box-sizing:content-box';
                    el.style.cssText = 'height:' + el.scrollHeight + 'px';
                },0);
            }

            function onUploadImage(e) {
                if (e.target.files.length) {
                    let f = e.target.files[0];
                    var r = new FileReader();
                    r.onload = function(e) {
                        let elem = document.getElementById('nodi');
                        elem.src = r.result;
                        elem.classList.remove('hidden');
                    };

                    r.readAsDataURL(f);
                } else {
                    document.getElementById('nodi').classList.add('hidden');
                }
            }
        </script>
    </div>
@endsection
