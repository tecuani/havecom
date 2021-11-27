@extends('layouts.app')

@section('content')

    <main class="grid bg-white">
        <div class="grid block place-self-center w-full h-44">
            <div class="block place-self-center">
                <span class="block text-center font-extrabold text-6xl text-indigo-700 w-full">Consultoría HAVECOM</span>
            </div>
        </div>
        <div class="grid md:grid-cols-2 gap-3 flex bg-white text-gray-900 mt-0 w-2/3 justify-self-center">
            <div class="p-5">
                <span class="text-center justify-center text-xl font-semibold">Control de Calidad</span>
                <div class="p-5">
                    <iframe title="vimeo-player" src="https://player.vimeo.com/video/554538834?h=3512961988" width="640" height="360" frameborder="0" allowfullscreen></iframe>
                </div>
                <span class="text-center text-xl">Nuestra consultoría en sistemas de calidad, te ayudara a reconocer las áreas de oportunidad que existen en tu taller.</span>
            </div>
            <div class="p-5">
                <span class=" text-center justify-center text-xl font-semibold">Mejora Continua</span>
                <div class="p-5">
                    <iframe title="vimeo-player" src="https://player.vimeo.com/video/554540913?h=01ffab3354" width="640" height="360" frameborder="0" allowfullscreen></iframe>
                </div>
                <span class="text-center text-xl">La operación de tu taller mejorará implementando nuestros procesos de trabajo, que superan por mucho los sistemas de Agencias Automotrices.</span>
            </div>
        </div>
    </main>

@endsection
