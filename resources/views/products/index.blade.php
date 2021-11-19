@extends('layouts.app')

@section('content')

    <main class="bg-white">
        <div class="grid block place-self-center bg-indigo-900 text-white font-black w-full h-52">
            <div class="block place-self-center">
                <p class="text-6xl text-center">Has llegado con los expertos automotrices</p>
            </div>
        </div>
        <div class="bg-white mt-0 w-full">
            <div class="flex justify-between">
                <div class="h-128 w-auto p-2 text-gray-900">
                    <ul>
                        <li>Todos los productos</li>
                        @foreach($productCategories as $category)
                        <li><a href="#">{{ $category->title }}</a></li>
                        @endforeach
                    </ul>
                </div>
                <div class="box-border w-1/2 p-2 justify-self-center">
                    <div class="block place-self-center">
                        <p class="text-xl text-start">Todos los productos</p>
                    </div>
                    <div class="grid md:grid-cols-3 gap-6 flex justify-between">
                        @foreach($products as $product)
                            <div class="box-border p-2 w-60 h-96">
                                <div class="inset-x-0 bottom-0">
                                    <a href="/" class="">
                                        <div class="w-11/12 justify-self-center">
                                            <div class="h-52 items-center justify-self-center font-extrabold">
                                                <img class="h-48 w-48 object-fill"  src="{{ asset('img/havecom.logo.png') }}" alt="HAVECOM">
                                            </div>
                                            <div class="h-20 text-gray-900">
                                                <p class="text-xl text-center">{{ $product->title }}</p>
                                            </div>
                                        </div>
                                        <div class="flex items-center space-x-4 text-gray-900">
                                            <p class="line-through text-xl text-center">${{ $product->cost/100*0.85 }} MXN</p>
                                            <h6>|</h6>
                                            <p class="text-xl text-center">${{ $product->cost/100 }} MXN</p>
                                        </div>
                                    </a>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
                <div class="w-1 h-128 p-2">
                    <h5 class="w-full object-left-top">
                        Ordenar por:
                    </h5>
                </div>
                <div class="w-auto"></div>
            </div>
        </div>
    </main>

@endsection
