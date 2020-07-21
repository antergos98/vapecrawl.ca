@extends('layouts.app')

@section('page_title', 'Vendors')

@section('content')
    <h1 class="text-2xl mb-10 md:text-3xl">Discover amazing <span class="underline">Canadian</span> vape vendors</h1>
    <div class="flex flex-wrap -mx-3 mb-8">
        @foreach($vendors as $vendor)
            <div class="w-full sm:w-1/3 mb-2">
                <div class="px-3">
                    <div class="flex items-center">
                        <svg class="sm:hidden text-red-600 h-5 w-5 mr-2 fill-current" height='100px' width='100px'  fill="#000000" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" x="0px" y="0px" viewBox="0 0 100 100" enable-background="new 0 0 100 100" xml:space="preserve"><g><path d="M49.994,0.106l-9.212,16.331c-0.193,0.281-0.506,0.474-0.831,0.474c-0.168,0-10.004-5.422-10.004-5.422l5.86,25.626   c0.047,0.131,0.047,0.241,0.047,0.373c0,0.927-0.762,1.656-1.652,1.656c-0.46,0-0.88-0.193-1.175-0.47L22.591,26.55l-3.994,7.082   c-0.216,0.258-0.559,0.481-0.938,0.481c-0.055,0-13.094-2.558-13.094-2.558s4.448,14.068,4.448,14.207   c0,0.445-0.252,0.842-0.621,1.058l-5.516,3.159l23.912,19.013c0.222,0.226,0.343,0.521,0.343,0.846   c0,0.157-2.521,9.946-2.521,9.946s21.094-4.368,21.189-4.368c0.789,0,1.456,0.679,1.456,1.485l-0.438,22.992h6.358l-0.397-22.992   c0-0.807,0.639-1.485,1.445-1.485c0.084,0,21.176,4.368,21.176,4.368s-2.54-9.789-2.54-9.946c0-0.324,0.139-0.62,0.354-0.846   l23.911-19.013l-5.513-3.159c-0.372-0.216-0.613-0.613-0.613-1.058c0-0.139,4.44-14.207,4.44-14.207s-13.021,2.558-13.068,2.558   c-0.42,0-0.733-0.223-0.964-0.481l-3.995-7.082l-10.42,12.124c-0.32,0.277-0.722,0.47-1.185,0.47c-0.898,0-1.66-0.729-1.66-1.656   c0-0.131,5.913-25.999,5.913-25.999s-9.832,5.422-9.989,5.422c-0.343,0-0.667-0.193-0.835-0.474L49.994,0.106"></path></g></svg>
                        <a href="{{ $vendor->url }}" target="_blank" rel="noopener" title="{{ $vendor->name }}"
                           class="hover:underline">
                            {{ $vendor->name }}
                        </a>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
    <h2 class="text-xl mb-6 md:text-2xl">Your name is not on the list?</h2>
    <p>
        If your name or your favorite vendor is missing from the list?
        <a class="underline" href="mailto:info@vapecrawl.ca">Send us an email!</a>
    </p>
@endsection
