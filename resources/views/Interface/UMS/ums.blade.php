@extends('layouts.app')
@section('content')
<script src="{{ mix('js/ums.js')}}"></script>
<link href="{{ mix('css/ums.css')}}" rel="stylesheet">
<div class="xl:m-44 w-full md:m-10 ml-1 w-full sm:m-0 text-sm">
<button type="button" class="w-22 h-10 bg-green-500 m-5 p-1" id="add_new_user""><a href="{{route('umscreateview')}}">Add New User</a></button>
<div class="container" id="ums" class="">
        <table class=" flex-shrink md:visible xl:w-full rounded-lg text-md bg-white shadow-md mb-4 overflow-scroll">
            <tbody class="sm:w-32">
                <tr class="border-b">
                <th class="text-left p-3 px-5 ">ID</th>
                    <th class="text-left p-3 px-5 ">Name</th>
                    <th class="text-left p-3 px-5 ">Email</th>
                    <th class="text-left p-3 px-5 ">Created At</th>
                    <th class="text-left p-3 px-5 ">Updated At</th>
                    <th class="text-left p-3 px-5 ">Last Online</th>
                    <th>
                    </th>
                </tr>
                @foreach($user as $users)
                <tr class="border-b bg-gray-100" id="users">
                    <td class="p-3 px-5 " name="id_number" id="id_number">{{$users->id}}</td>
                    <td class="p-3 px-5 " id="name">{{$users->name}}</td>
                    <td class="p-3 px-5 " name="email" id="email">{{$users->email}}</td>
                    <td class="p-3 px-5 ">{{date('m-d-y', strtotime($users->created_at))}}</td>
                    <td class="p-3 px-5 ">{{date('m-d-y', strtotime($users->updated_at))}}</td>
                    <td class="p-3 px-5 ">{{Carbon\Carbon::parse($users->last_active)->diffForHumans()}}</td>
                    </td>
                    <td class="p-3 px-5 flex justify-end">
                        <form action="/User_Management_System/{{$users->id}}" method="POST">
                            @csrf
                            @method('delete')
                        <div>
                        <button type="submit" name="submit" class="mt-5 text-sm bg-red-500 hover:bg-red-700 text-white py-1 px-2 rounded focus:outline-none focus:shadow-outline" value="{{$users->id}}">Delete</button>
                        </form>
                        <a href="{{route('UMS').'/'.$users->id}}"><button type="button" name="submit" class="mt-5 mr-3 text-sm bg-blue-500 hover:bg-blue-700 text-white py-1 px-2 ml-2 rounded focus:outline-none focus:shadow-outline " id="edit_button">Edit</button></a>
                        </div>
                        @endforeach
                    </td>          
                    {{ $user->links() }}   
                </tr>
            </tbody>
        </table>   
    </div>
</div>
@endsection