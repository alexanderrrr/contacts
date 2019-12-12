@extends('welcome')

@section('title', 'Contacts')

@section('content')
    <div  class="bg-gray-100 p-4 w-full text-3xl font-mono text-center">
        <h1>{{$group}}</h1>
        <a href="/groups/{{$groupId}}/contacts" class="mt-8 hover:bg-gray-700 font-bold py-2 px-4 border border-gray-700 rounded">
            Add New Contact
        </a>
        <div class="mt-6 flex justify-center w-full">
            <a class="mx-3 bg-transparent hover:bg-blue-500 text-blue-700 font-semibold hover:text-white py-2 px-4 border border-blue-500 hover:border-transparent rounded
                {{ $contacts->currentPage() == 1 ? 'cursor-not-allowed': '' }}"
               @if( $contacts->previousPageUrl() )
               href="{{ $contacts->previousPageUrl()  }}"
                @endif
            >Older
            </a>
            <a class="mx-3 bg-transparent hover:bg-blue-500 text-blue-700 font-semibold hover:text-white py-2 px-4 border border-blue-500 hover:border-transparent rounded
                {{ $contacts->hasMorePages() ? '' : 'cursor-not-allowed' }}"
               @if( $contacts->hasMorePages())
               href="{{ $contacts->nextPageUrl() }}"
                @endif
            >Newer
            </a>
        </div>
    </div>
    <div class="container p-8 flex flex-wrap justify-between w-full">
    @foreach($contacts as $contact)
        <div class="w-1/3 flex my-5">
            <div class="shadow-2xl border-r border-b border-l border-gray-400 lg:border-l-0 lg:border-t lg:border-gray-400 bg-white rounded-b lg:rounded-b-none lg:rounded-r p-4 flex flex-col justify-between leading-normal">
                <div class="flex items-center">
                    <img class="w-10 h-10 rounded-full mr-4" src="{{$contact->avatar}}" alt="Avatar">
                    <div class="text-sm">
                        <p class="text-gray-900 leading-none">{{$contact->first_name}} {{$contact->last_name}}</p>
                        <p class="text-gray-600">{{$contact->address}}</p>
                        <p class="text-gray-600">{{$contact->city}}</p>
                    </div>
                    <p class="mx-auto text-gray-900 leading-none">Phone Number {{$contact->phone}}</p>
                </div>
                <div class="mt-8">
                    <p class="text-sm text-gray-600 flex items-center">
                        <svg class="fill-current text-gray-500 w-3 h-3 mr-2" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                            <path d="M4 8V6a6 6 0 1 1 12 0v2h1a2 2 0 0 1 2 2v8a2 2 0 0 1-2 2H3a2 2 0 0 1-2-2v-8c0-1.1.9-2 2-2h1zm5 6.73V17h2v-2.27a2 2 0 1 0-2 0zM7 6v2h6V6a3 3 0 0 0-6 0z" />
                        </svg>
                        email  {{$contact->email}}
                    </p>
                    <div
                        class="text-gray-700 text-base mt-5"
                        style="
                            display: -webkit-box;
                            -webkit-line-clamp: 3;
                            -webkit-box-orient: vertical;
                            overflow: hidden;
                            position: relative;
                            line-height: 1.2em;
                            max-height: 3.6em;"
                    >
                        {{$contact->note}}
                    </div>
                </div>
                <div class="flex justify-between w-full">
                    <form action="/group-contacts/{{$groupId}}/contacts/{{$contact->id}}/delete" method="POST">
                        @csrf
                        {{ method_field('DELETE') }}
                        <button class="text-center mt-8 bg-red-500 hover:bg-blue-700 text-white font-bold py-2 px-4 border border-blue-700 rounded" type="submit"> Delete </button>
                    </form>
                    <a href="/contacts/{{$contact->id}}/readNote" class="text-center mt-8 bg-gray-700 hover:bg-gray-700 text-white font-bold py-2 px-4 border border-blue-700 rounded" type="button"> Read Text</a>
                    <a href="/contacts/edit/{{$contact->id}}/group/{{$groupId}}" class="text-center mt-8 bg-gray-500 hover:bg-blue-700 text-white font-bold py-2 px-4 border border-blue-700 rounded" type="button"> Edit </a>
                </div>
            </div>
        </div>
    @endforeach
        <div class="mt-6 flex justify-center w-full">
            <a class="mx-3 bg-transparent hover:bg-blue-500 text-blue-700 font-semibold hover:text-white py-2 px-4 border border-blue-500 hover:border-transparent rounded
                {{ $contacts->currentPage() == 1 ? 'cursor-not-allowed': '' }}"
                @if( $contacts->previousPageUrl() )
                     href="{{ $contacts->previousPageUrl()  }}"
                 @endif
            >Older
            </a>
            <a class="mx-3 bg-transparent hover:bg-blue-500 text-blue-700 font-semibold hover:text-white py-2 px-4 border border-blue-500 hover:border-transparent rounded
                {{ $contacts->hasMorePages() ? '' : 'cursor-not-allowed' }}"
                @if( $contacts->hasMorePages())
                    href="{{ $contacts->nextPageUrl() }}"
                @endif
            >Newer
            </a>
        </div>
    </div>
@endsection
