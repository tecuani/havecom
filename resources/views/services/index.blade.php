@extends('layouts.app')

@section('content')
    <main class="grid bg-white">
        <div class="bg-white text-white mt-0 justify-self-center">
            <span class="block text-6xl text-center text-indigo-700">Agenda tu servicio</span>
            <div class="flex content-center justify-between">
                <ul class="list-reset flex justify-between flex-1 items-center">
                    <li class="mr-3">
                        <a href="/" class="inline-block px-4 text-gray-900 hover:text-blue-700 no-underline">INICIO</a>
                    </li>
                    <li class="mr-3">
                        <a href="/" class="inline-block  px-4 text-gray-900 hover:text-blue-700 no-underline">PRODUCTOS</a>
                    </li>
                    <li class="mr-3">
                        <a href="/" class="inline-block px-4 text-gray-900 hover:text-blue-700 no-underline">CONSULTORÍA</a>
                    </li>
                    <li class="mr-3">
                        <a href="/" class="inline-block px-4 text-gray-900 hover:text-blue-700 no-underline">ORDEN DE SERVICIO</a>
                    </li>
                    <li class="mr-3">
                        <a href="/" class="inline-block px-4 text-gray-900 hover:text-blue-700 no-underline">NOSOTROS</a>
                    </li>
                </ul>
            </div>
            <div class="grid-cols-3">
                @foreach($services as $service)
                    <div class="w-20 h-96">
                        <div class="flex items-center font-extrabold">
                            <a href="/" class="no-underline hover:no-underline">
                                <img src="{{ asset('img/havecom.logo.png') }}" alt="HAVECOM">
                            </a>
                        </div>
                        <div class="block place-self-center">
                            <p class="text-6xl text-center">{{ $service->title }}</p>
                            <div class="flex items-center space-x-4 text-gray-900">
                                <p class="text-6xl text-center">{{ $service->workTime }}</p>
                                <h6 class="relative">|</h6>
                                <p class="text-6xl text-center">${{ $service->cost/100 }}</p>
                            </div>
                            <button class="bg-blue-500 hover:bg-gray-100 text-gray-800 font-semibold py-2 px-4 border border-gray-400 rounded shadow">
                                Button
                            </button>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </main>

@endsection
