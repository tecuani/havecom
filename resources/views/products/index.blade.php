<x-app-layout>
    <main class="bg-white">
        @include('products._header')
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
                            @include('products._card')
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
</x-app-layout>
