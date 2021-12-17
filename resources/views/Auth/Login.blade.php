<link href="{{mix('css/app.css')}}" rel="stylesheet">
<div class="overflow-hidden flex justify-center object-contain">
<div id="login" class="bg-gradient-to-r from-green-400 to-blue-500 flex flex-col w-6/12 p-5" id="Login">
<div class="mt-20">
<p id="log_into_your_admin_page" class=" font-serif text-6xl p-10 font-mono flex justify-center">Login to your Admin page</p>
<div id="form" class="flex justify-center">
        <div class="bg-gray-100 p-5 shadow-2xl rounded-b-lg w-8/12 flex flex-col">
        <form action="{{route('login_active')}}" method="post" class="flex flex-col">
                @csrf
        <p class="font-serif">Email Address: </p>
            <input autocomplete="off" type="email" placeholder="abc@example.com" name="email" class="p-2 shadow-md">
            @error('email')
                        <p class="text-red-300">{{$message}}</p>
                    @enderror
            <p class="font-serif">Password: </p>
            <input autocomplete="off" type="password" placeholder="Enter your password" name="password" class="p-2 shadow-md">
            @error('password')
                        <p class="text-red-300">{{$message}}</p>
            @enderror
            @if(session('status'))
        <p class="text-red-300">{{session('status')}}</p>
        @endif
        @if(session('SessionExpired'))
        <p class="text-red-300">{{session('SessionExpired')}}</p>
        @endif
            <p><a href="{{route('Register')}}">Don't have an account?</a></p>
            <div class="flex justify-center">
            <button type="submit" class="bg-black text-white w-14 p-2">Login</button>
            </div>
        </form>
                </div>
            </div>
        </div>
    </div>
    <div class="bg-gray-100 w-screen h-screen m-auto">
    <div id="login_page_top_name" class="m-auto">
    <div id="page_name" ><img src="{{ asset('/storage/A.I_Logo.png') }}"  width="700" class="m-auto"></div>
    </div>
    </div>
</div>