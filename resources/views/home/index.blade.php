<x-app-layout>
    <main class="grid bg-white">
        <div class="grid block place-self-center bg-indigo-900 text-white font-black w-full h-128">
            <div class="block place-self-center">
                <p class="text-6xl text-center">Taller Mecánico a Domicilio</p>
                <p class="text-2xl text-center p-2">Adaptándonos al ritmo de tu vida</p>
            </div>
        </div>
        <div class="bg-white text-white mt-0 h-96 w-1/2 justify-self-center">
            <div class="pt-10">
                <span class="block text-center text-5xl text-indigo-700 w-full"> Bienvenido a Havecom México</span>
            </div>
            <div class="pt-10">
                <span class="block text-center place-self-center text-xl text-gray-500 w-full">La red de talleres mas grande a nivel nacional, especializada en mantenimiento automotriz preventivo.</span>
                <span class="block text-center place-self-center text-xl text-gray-500 w-full">Contamos con unidades móviles y talleres asociados en toda la república mexicana, para brindarte un buen diagnostico y reparaciones de calidad en donde sea que te encuentres.</span>
            </div>
        </div>
        <div class="bg-white text-white mt-0 h-144 w-2/3 justify-self-center">
            <span class="block text-6xl text-center justify-self-center text-indigo-700">El mejor servicio esta aquí</span>
            <div class="block bg-gray-100 text-center justify-self-center h-128">
                <span class="block text-center text-5xl text-red-600 w-full">Aqui el video</span>
            </div>
        </div>
        <div class="w-2/3 bg-white text-white mt-0 justify-self-center">
            <div class="block text-center">
                <span class="text-6xl text-indigo-700">Agenda tu servicio</span>
            </div>
            <div class="flex content-center justify-between">
                <ul class="list-reset flex justify-center flex-1 items-center">
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
            <div class="grid md:grid-cols-3 gap-6 flex">
                @foreach($services as $service)
                    <div class="box-border h-104 border-gray-900 border-2 p-2 bg-gray-100">
                        <div class="h-80 w-11/12">
                            <div class="h-52 items-center font-extrabold">
                                <a href="/" class="no-underline hover:no-underline">
                                    <img class="h-52 w-96 object-fill"  src="{{ asset('img/havecom.logo.png') }}" alt="HAVECOM">
                                </a>
                            </div>
                            <div class="h-20 text-gray-900">
                                <p class="text-xl text-center">{{ $service->title }}</p>
                            </div>
                        </div>
                        <div class="inset-x-0 bottom-0 h-44">
                            <div class="flex items-center space-x-4 text-gray-900">
                                <p class="text-xl text-center">{{ $service->work_time }}</p>
                                <h6>|</h6>
                                <p class="text-xl text-center">${{ $service->cost/100 }}</p>
                            </div>
                            <button class="bg-blue-500 hover:bg-gray-100 text-gray-800 font-semibold py-2 px-4 border border-gray-400 rounded shadow">
                                Reservar
                            </button>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
        <div class="bg-white text-white mt-0 justify-self-center h-192">
            <span class="text-6xl text-indigo-700">Nuestros Clientes Opinan</span>
        </div>
        <div class="mx-auto h-72 justify-self-center">
            <span class="text-6xl text-indigo-700">Conéctate con Nosotros</span>
            <div class="p-10 inset-x-0 bottom-0 h-44 items-center">
                <div class="flex space-x-4 text-gray-900 content-center justify-center">
                    <a href="https://www.facebook.com/137890523084864">
                        <img class="h-16 object-fill"  src="{{ asset('img/facebook-logo.png') }}" alt="facebook">
                    </a>
                    <a href="https://www.instagram.com/havecom_mexico">
                        <img class="h-16 object-fill"  src="{{ asset('img/instagram-icon.png') }}" alt="instagram">
                    </a>
                    <a href="https://www.youtube.com/channel/UCoofRljUTwxWd8k4KPJauMQ">
                        <img class="h-16 object-fill"  src="{{ asset('img/youtube-icon.png') }}" alt="youtube">
                    </a>
                </div>
            </div>
        </div>
        <div class="grid bg-gray-500 text-white h-80 w-full space-y-0.5">
            <span class="block text-6xl justify-self-center pt-3">Regístrate</span>
            <p class="block justify-self-center">¡Obtén un descuento de 10 % en tu primera compra al registrarte, así estarás al tanto de novedades y descuentos!</p>
            <div class="block justify-self-center">
                <form class="w-full max-w-4xl">
                    <div class="flex items-center border-b border-teal-500 py-2 text-white">
                        <input class="appearance-none bg-transparent border-none w-full text-white mr-3 py-1 px-2 leading-tight focus:outline-none" type="text" placeholder="Correo electronico" aria-label="email">
                        <button class="flex-shrink-0 bg-teal-500 hover:bg-teal-700 border-teal-500 hover:border-teal-700 text-sm border-4 text-white py-1 px-2 rounded" type="button">
                            REGISTRARSE
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </main>

</x-app-layout>>
