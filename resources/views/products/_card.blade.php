<div class="box-border p-2 w-60 h-96">
    <div class="inset-x-0 bottom-0">
        <a href="{{ route('products.show', [$product]) }}" class="">
            <div class="w-11/12 justify-self-center">
                <div class="h-52 items-center justify-self-center font-extrabold">
                    <img class="h-48 w-48 object-fill"  src="{{ asset('img/havecom.logo.png') }}" alt="HAVECOM">
                </div>
                <div class="h-20 text-gray-900">
                    <p class="text-xl text-center">{{ $product->title }}</p>
                </div>
            </div>
            <div class="flex items-center space-x-4 text-gray-900">
                <p class="line-through text-xl text-center">${{ $product->cost/100*1.25 }} MXN</p>
                <h6>|</h6>
                <p class="text-xl text-center">${{ $product->cost/100 }} MXN</p>
            </div>
        </a>
    </div>
</div>
