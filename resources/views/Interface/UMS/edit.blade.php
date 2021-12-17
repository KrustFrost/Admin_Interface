@extends('layouts.app')
@section('content')
<div class="xl:m-44 lg:px-3 py-4 w-full m-44 ml-1" id="ums">
        <table class="w-full rounded-lg text-md bg-white shadow-md">
        <form action="{{route('umsedit', $Id_user->id)}}" class="" method="POST">
        @csrf
            <tbody class="">
                <tr class="border-b">
                <th class="text-left p-3 px-5">ID</th>
                    <th class="text-left p-3 px-5">Name</th>
                    <th class="text-left p-3 px-5">Email</th>
                </tr>
                <tr class="">
                <td class="text-left p-3 px-5">{{$Id_user->id}}</td>
                <td><input class="bg-gray-100 p-2" type="text" autocomplete="off" name="name" placeholder="Name" value="{{$Id_user->name}}"/></td>
                <td><input class="bg-gray-100 p-2" type="email" autocomplete="off" name="email" placeholder="Email Address" value="{{$Id_user->email}}" size="30"/><br></td>
                <td class="p-3 px-5 flex justify-end ">
                <button type="submit" class="bg-green-200 p-2">Update</button>
                <a href="{{route('UMS')}}"><button type="button" class="bg-red-200 p-2 ml-2">Close</button></a>
                </td>
                </tr>
                </form>
                </tbody>
            </table>
        <p class="font-sans text-xl ">Edit a User's Information</p>
        @if(session('Saved'))
                    <p class="text-green-500">{{session('Saved')}}</p>
                    @endif
        </div>
@endsection