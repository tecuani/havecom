@extends('layouts.app')

@section('content')

    <main class="bg-white">
        @include('products._header')
        <div class="bg-white mt-0 w-full">
            <div class="block place-self-center justify-center">
                <a href="{{ route('products.index') }}" class="">
                    <p class="text-xl justify-self-center">Todos los productos</p>
                </a>
            </div>
            <div class="flex justify-between h-208">
                <div>
                    <div class="h-128 w-1/2 p-2 justify-self-center">
                        <img class="h-120 w-120 object-fill"  src="{{ $product->image }}" alt="HAVECOM">
                    </div>
                </div>
                <div class="box-border w-1/2 p-2">
                    <p class="text-5xl py-4">{{ $product->title }}</p>
                    <p class="line-through text-2xl">${{ $product->cost/100*1.25 }} MXN</p>
                    <p class="font-extrabold text-2xl">${{ $product->cost /100}} MXN</p>
                    <p class="text-red-500 text-xl">Ahorras ${{ $product->cost/100*0.25 }} MXN (25%)</p>
                    <p class="pt-10">1 Archivo</p>
                    <div class="grid md:grid-cols-3 flex justify-between w-96 border-gray-100 border-2">
                        <div class="font-extrabold border-2 text-center">
                            Nombre del archivo
                        </div>
                        <div class="font-extrabold border-2 text-center">
                            Tipo
                        </div>
                        <div class="font-extrabold border-2 text-center">
                            Talla
                        </div>
                        <div class="border-2 text-center">
                            Caratula de derechos
                        </div>
                        <div class="border-2 text-center">
                            PDF
                        </div>
                        <div class="border-2 text-center">
                            141 Kb
                        </div>
                    </div>
                    <div class="pt-10">
                        <form action="">
                            <div>
                                <div class="mt-5 w-44">
                                    <label for="amount" class="block text-lg leading-5 text-gray-500">Cantidad:</label>
                                    <input id="amount" name="amount" type="number" class="appearance-none block w-full px-3 py-2 border border-gray-400 rounded-md placeholder-gray-500 focus:outline-none focus:shadow-outline-green focus:border-green-300 transition duration-150 ease-in-out sm:text-sm sm:leading-5 mt-2" value="{{ old('phone') }}" required>
                                </div>
                            </div>
                            <div class="mt-3">
                                <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline" type="button">
                                    AGREGAR AL CARRITO
                                </button>
                            </div>
                        </form>
                    </div>
                    <div>
                        {{ $product->body }}
                    </div>
                </div>
            </div>
        </div>
        <div class="box-border w-2/3 p-2">
            <div class="font-extrabold text-2xl">
                Tambien te puede gustar.
            </div>
            <div class="grid md:grid-cols-3 gap-6 flex">
                @foreach($recomended as $product)
                    @include('products._card')
                @endforeach
            </div>
        </div>
    </main>

@endsection
