@extends('layouts.app')
@section('content')
<div class="text-center m-auto font-mono break-word">
    <p class=" p-2 w-9/12 m-auto text-center mt-5  rounded-full  bg-green-400 border-4 border-red-400 hover:bg-green-200 break-word md:w-96">Full-Stack Web Developer</p>
    <img src="{{asset('Angeles.jpg')}}" class="rounded-full m-auto w-60  mt-10 mb-12"/>
    <div>
    <p class="p-2 w-9/12 m-auto text-center mt-5   bg-blue-400 border-4 border-yellow-400 hover:bg-blue-200  md:w-4/12">Angeles, Chris Michael Daracan</p>
    <p class="p-2 w-9/12 m-auto  text-center mt-5  rounded-full  bg-red-400 border-4 border-green-400 hover:bg-red-200 break-word mt-32 mb-10 md:w-96">Front-end Developers</p>
    </div>
    <div class="grid grid-cols-1 gap-32 m-20 md:grid-cols-1 m-auto xl:grid-cols-3">
    <div>
    <img src="{{asset('Roque.jpg')}}" class="w-60 rounded-full m-auto "/>
    <p class="w-9/12 m-auto text-center mt-5 bg-yellow-400 border-4 border-indigo-400 hover:bg-yellow-200 break-word md:w-6/12">Aerish Johanne Roque</p>
    </div>
    <div>
    <img src="{{asset('Crystal.jpg')}}" class="w-60 rounded-full m-auto"/>
    <p class="w-9/12 m-auto m-auto text-center mt-5 bg-yellow-400 border-4 border-indigo-400 hover:bg-yellow-200 break-word md:w-6/12">Crystal Gayle Silva</p>
    </div>
    <div>
    <img src="{{asset('Esalyn.jpg')}}" class="w-60 rounded-full m-auto"/>
    <p class="w-9/12 m-auto text-center mt-5 mb-5 bg-yellow-400 border-4 border-indigo-400 hover:bg-yellow-200 break-word md:w-6/12">Esalyn Rose Genilsa</p>
    </div>
    <div>
    <img src="{{asset('Andrie.jpg')}}" class="w-60 rounded-full m-auto"/>
    <p class="w-9/12 m-auto text-center mt-5 mb-5 bg-yellow-400 border-4 border-indigo-400 hover:bg-yellow-200 break-word md:w-6/12">Andrie Franco</p>
    </div>
    <div>
    <img src="{{asset('Jane.jpg')}}" class="w-60 rounded-full m-auto"/>
    <p class="w-9/12 m-auto text-center mt-5 mb-5 bg-yellow-400 border-4 border-indigo-400 hover:bg-yellow-200 break-word md:w-6/12">Jane Daxer Denila</p>
    </div>
    <div>
    <div>
    <img src="{{asset('Tayag.jpg')}}" class="w-60 rounded-full m-auto"/>
    <p class="w-9/12 m-auto text-center mt-5 mb-5 bg-yellow-400 border-4 border-indigo-400 hover:bg-yellow-200 md:w-6/12">Nemi Christian Tayag</p>
    </div>
    </div>
    </div>

  @endsection