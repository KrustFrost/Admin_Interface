@extends('layouts.app')
@section('content')
<div id="form_position" class=" ml-80">
<link href="{{ mix('css/ums_create.css')}}" rel="stylesheet">
<div>
<div class="mr-96 w-full">
<p class="font-serif text-6xl p-10 font-mono flex justify-center">Create a user</p>
<div class="">
        <div class="w-full bg-gray-100 p-5 shadow-2xl rounded-b-lg w-2/4 flex flex-col">
        <form action="{{route('umscreate')}}" method="post" class=" flex flex-col">
                @csrf
                <p>Name: </p>
                    <input type="text" autocomplete="off" placeholder="Name" name="name" class="p-3 shadow-md"/>
                    @error('name')
                        <p class="text-red-300">{{$message}}</p>
                    @enderror
                    <p>Email Address: </p>
                    <input type="email" autocomplete="off" placeholder="Email" name="email" class="p-3 shadow-md"/>
                    @error('email')
                        <p class="text-red-300">{{$message}}</p>
                    @enderror
                    <p>Password: </p>
                    <input type="password" placeholder="Password" name="password" class="p-3 shadow-md"/>
                    @error('password')
                        <p class="text-red-300">{{$message}}</p>
                    @enderror
                    <p>Password Confirmation: </p>
                    <input  type="password" placeholder="Password Confirmation" name="password_confirmation" class="p-3 shadow-md"/>
                    @error('password_confirmation')
                        <p class="text-red-300">{{$message}}</p>
                    @enderror
                    <p>Student No: </p>
                    <input type="tel" placeholder="Student No." name="student_no" class="p-3 shadow-md"/>
                    @error('student_no')
                        <p class="text-red-300">{{$message}}</p>
                    @enderror
                    <p>School Branch: </p>
                    <input type="text" placeholder="School Branch" name="school_branch" class="p-3 shadow-md"/>
                    @error('school_branch')
                        <p class="text-red-300">{{$message}}</p>
                    @enderror

                    <div class="flex justify-center">
                    <button type="submit" name="submit" class="bg-black text-white w-1/5 p-2 mt-2 mb-2 rounded-lg shadow-md hover:bg-gray-500">Create</button>
                    </div>
                    </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection