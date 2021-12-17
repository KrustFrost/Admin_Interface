@extends('layouts.app')
@section('content')
<link rel="stylesheet" href="{{mix('css/profile.css')}}">
<div id="Centered" class="overflow-y-auto">
    <hr>
    <table class="w-full mt-52">
        <tr id="header">
            <th class="breaks-all">Name</th>
            <th class="breaks-all">Student No.</th>
            <th class="breaks-all">Branch</th>
            <th></th>
        </tr>
        @foreach($profiles as $profile)
        <tr>    
            <td class="breaks-all">{{$profile->name}}</td>
            <td class="breaks-all">{{$profile->school_id_number}}</td>
            <td class="breaks-all">{{$profile->school_branch}}</td>
            <td><button class="bg-blue-300 p-2 hover:bg-blue-600"><a href="/Profile_Management_System/Profile/{{$profile->id}}">Check</a></button></td>
        </tr>
        @endforeach   
        </table>
        {{$profiles->links()}}
    </div>
</div>
@endsection