<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="{{mix('css/app.css')}}" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script src="{{ mix('js/app.js')}}"></script>
    <title>Admin/Backend Interface</title>
</head>
<body class="bg-gray-100">
<div class="flex flex-row">
<div id="login" class="bg-gradient-to-r from-green-400 to-blue-500 flex flex-col w-6/12 p-5 relative" id="Login">
<div class="mt-20">
<p class="font-serif text-6xl p font-mono flex justify-center p-2 break-word">Register here</p>
<div class="flex justify-center">
        <div class="bg-gray-100 p-5 shadow-2xl rounded-b-lg w-8/12 flex flex-col">
        <form action="{{route('auth.register')}}" method="post" class="flex flex-col">
                @csrf
                <p>Name: </p>
        <input type="text" placeholder="Name" name="name" class="p-3 shadow-md"/>
                    @error('name')
                        <p class="text-red-300">{{$message}}</p>
                    @enderror
                    <p>Email Address: </p>
                    <input type="email" placeholder="Email" name="email" class="p-3 shadow-md"/>
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
                    <p><a href="/">Already have an account?</a></p>
                    <div class="flex justify-center">
                    <button type="submit" name="submit" class="bg-black text-white p-2 mt-2 mb-2 rounded-lg shadow-md">Register</button>
                    </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="">
    <div id="login_page_top_name" class="m-auto">
    <div id="page_name" ><img src="{{ asset('/storage/A.I_Logo.png') }}"  width="1000" class="m-auto"></div>
    </div>
    </div>
</div>
</body>
</html>