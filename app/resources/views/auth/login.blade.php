<x-guest-layout>
    <x-auth-card>
        <x-slot name="logo">
            <!-- <a href="/">
                <x-application-logo class="w-20 h-20 fill-current text-gray-500" />
            </a> -->
        </x-slot>

        <!-- Session Status -->
        <x-auth-session-status class="mb-4" :status="session('status')" />

        <!-- Validation Errors -->
        <x-auth-validation-errors class="mb-4" :errors="$errors" />


        <title>Sign In</title>

        <link rel="stylesheet" type="text/css" href="{{asset('css/login.css')}}">
        <script src="https://kit.fontawesome.com/a81368914c.js"></script>
        <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@600&display=swap" rel="stylesheet">

        <img class="wave" src="images/t.png">
        <div class="container">
            <div class="img">
                <img src="images/to.png">
            </div>
            <div class="login-content">
                <form action="{{ route('login')}}" id="login" method="POST">
                    <div hidden>
                        @csrf
                    </div>
                    <img src="images/y.png">
                    <div class="input-div one">
                        <div class="i">
                            <i class="fas fa-envelope"></i>
                        </div>
                        <div class="div">
                            <input id="email" class="block mt-1 w-full" type="email" name="email" required autofocus placeholder="Email" />
                            <!-- <input type="text" class="input"> -->
                        </div>
                    </div>
                    <div class="input-div pass">
                        <div class="i">
                            <i class="fas fa-lock"></i>
                        </div>
                        <div class="div">
                            <input id="password" type="password" name="password" placeholder="Password" required autocomplete="current-password" />
                            <!-- <input type="password" class="input"> -->
                        </div>
                    </div>
                    <div class="s">
                        <a href="#" onclick="myFunction()">Login</a>
                    </div>
                    <!-- <div class="w">
                        <a href="forgot-password.blade.html">Forgot Password?</a>
                    </div> -->
                    <div class="x">
                        <p>
                            <span> Don't have an account? </span>
                            <a href="{{route('register')}}">Sign up here</a>
                        </p>
                    </div>
                </form>
            </div>
        </div>
        <script>
            function myFunction() {
                document.getElementById("login").submit();
            }
        </script>

    </x-auth-card>
</x-guest-layout>