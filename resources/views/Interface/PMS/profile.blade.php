@extends('layouts.app')
@section('content')
<form action="{{route('PMS_profile_edit', $user_profile_id->id)}}" method="post" enctype="multipart/form-data">
@csrf
<div class="flex items-center justify-center ">
<div id="profile" class="text-xs w-full sm:text-lg">
<link rel="stylesheet" href="{{mix('css/profile.css')}}">
<div class="wrapper" id="profile_form">
    <div id="image_profile_section" class="left flex flex-col">
    <input type="file" name="avatar_photo" class="w-60 text-xs"/>
    Update photo
<div class="w-auto h-auto flex justify-center ">
        @if($user_profile_id->avatar_photo == "empty")
        <img src="{{ asset('storage/QM.png')}}" alt="avatar" width="150" class="mt-12" >
        @else
        <img src="{{ asset('storage/'.$user_profile_id->avatar_photo)}}" alt="avatar" width="150" class="mt-12" >
        @endif
        </div>
        <p>{{$user_profile_id->name}}</p>
    </div>
    <div class="right">
        <div class="Information ">
            <h3 class="breaks-all">Profile</h3>
            <div class="info_data">
                <div class="data ">
                    <h4 class="breaks-all text-xs sm:text-lg">Email</h4>
                    <input class="breaks-all bg-gray-100 text-xs sm:text-lg mr-2" size='15' type="text" autocomplete="off" name="email" placeholder="Email" value="{{$user_profile_id->email}}"/>

                </div>
                <div class="data">
                    <h4 class="breaks-all text-xs sm:text-lg">School ID no.</h4>
                    <input class="bg-gray-100 breaks-all text-xs sm:text-lg mr-2" type="text" size='15' autocomplete="off" name="school_id" placeholder="ID No." value="{{$user_profile_id->school_id_number}}"/>

               </div>
                <div class="data">
                    <h4 class="breaks-all text-xs sm:text-lg">Contact No.</h4>
                    <input class="breaks-all bg-gray-100 p-0 text-xs sm:text-lg mr-2" type="tel" size='15' autocomplete="off" name="contact_number" placeholder="Contact No." value="{{$user_profile_id->contact_number}}"/>
                </div>
            </div>
        </div>

        <div class="AboutMe">
            <div class="about_data">
                <div class="data">
                    <h4 class="breaks-all text-xs sm:text-lg">Age</h4>
                    <input class="breaks-all bg-gray-100 text-xs sm:text-lg mr-2" type="text" size='15' autocomplete="off" name="age" placeholder="Age" value="{{$user_profile_id->age}}"/>
                </div>
                <div class="data" >
                    <h4 class="breaks-all text-xs sm:text-lg">Birth date</h4>
                    <input id="birth_date" class="w-36 breaks-all bg-gray-100 text-xs sm:text-lg" type="date" autocomplete="off" name="birth_date" placeholder="Date" value="{{$user_profile_id->birthdate}}"/>  
                </div>
                <div class="data">
                    <h4 class="breaks-all text-xs sm:text-lg">Status</h4>
                    <input id="status" class="breaks-all bg-gray-100  text-xs sm:text-lg mr-2 " type="text" size='15' autocomplete="off" name="status" placeholder="Status" value="{{$user_profile_id->status}}"/>
                </div>
            </div>
        </div>

        <div class="column3">
            <div class="column_data">
                <div class="data">
                    <h4 class="breaks-all text-xs sm:text-lg">Gender</h4>
                    <input class="bg-gray-100 breaks-all text-xs sm:text-lg mr-2" type="text" size='15' autocomplete="off" name="gender" placeholder="Gender" value="{{$user_profile_id->gender}}"/>
                </div>
                <div class="data">
                    <h4 class="breaks-all text-xs sm:text-lg">Branch</h4>
                    <input class="breaks-all bg-gray-100 text-xs sm:text-lg mr-2" type="text" size='15' autocomplete="off" name="school_branch" placeholder="School Branch" value="{{$user_profile_id->school_branch}}"/>
                </div>
                <div class="data">
                    <h4 class="breaks-all text-xs sm:text-lg">Interests</h4>
                    <input class="breaks-all bg-gray-100 text-xs sm:text-lg mr-2" type="text" size='15' autocomplete="off" name="interests" placeholder="Interests" value="{{$user_profile_id->interests}}"/>
                </div>
            </div>
        </div>

        <div class="column4">
            <div class="four_data">
                <div class="data">
                    <h4 class="breaks-all text-xs sm:text-lg">Address</h4>
                    <input class="breaks-all bg-gray-100 text-xs sm:text-lg mr-2" type="text" size='15' autocomplete="off" name="address" placeholder="Address" value="{{$user_profile_id->address}}"/>
                </div>
            </div>
        </div>
        <button type="submit" class="bg-green-200 p-2">Update</button>
                    @error('avatar_photo')
                        <p class="text-red-300 text-sm breaks-all">{{$message}}</p>
                    @enderror  
                    @error('email')
                        <p class="text-red-300 text-sm breaks-all">{{$message}}</p>
                    @enderror  
                    @error('school_id')
                        <p class="text-red-300 text-sm breaks-all">{{$message}}</p>
                    @enderror  
                    @error('contact_number')
                        <p class="text-red-300 text-sm breaks-all">{{$message}}</p>
                    @enderror  
                    @error('age')
                        <p class="text-red-300 text-sm breaks-all">{{$message}}</p>
                    @enderror  

                    @error('birth_date')
                        <p class="text-red-300 text-sm breaks-all">{{$message}}</p>
                    @enderror   

                    @error('status')
                        <p class="text-red-300 text-sm breaks-all">{{$message}}</p>
                    @enderror     

                    @error('gender')
                        <p class="text-red-300 text-sm breaks-all">{{$message}}</p>
                    @enderror   

                    @error('school_branch')
                        <p class="text-red-300 text-sm breaks-all">{{$message}}</p>
                    @enderror   

                    @error('interests')
                        <p class="text-red-300 text-sm breaks-all">{{$message}}</p>
                    @enderror   
                    @error('address')
                        <p class="text-red-300 text-sm breaks-all">{{$message}}</p>
                    @enderror   
                    @if(session('profile_update'))
                    <p class="text-green-500">{{session('profile_update')}}</p>
                    @endif
            </div>
            </div>
        </div>
    </form>
</div>
@endsection