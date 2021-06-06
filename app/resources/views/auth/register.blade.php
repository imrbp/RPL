<x-guest-layout>
    <x-auth-card>
        <x-slot name="logo">
            <!-- <a href="/">
                <x-application-logo class="w-20 h-20 fill-current text-gray-500" />
            </a> -->
        </x-slot>

        <!-- Validation Errors -->
        <x-auth-validation-errors class="mb-4" :errors="$errors" />

        <head>
            <title>Sign Up</title>
            <link rel="stylesheet" type="text/css" href="{{asset('css/login.css')}}">
            <script src="https://kit.fontawesome.com/a81368914c.js"></script>
            <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@600&display=swap" rel="stylesheet">
            <meta name="viewport" content="width=device-width, initial-scale=1">
        </head>

        <body>
            <img class="wave" src="images/t.png">
            <div class="container">
                <div class="img">
                    <img src="images/sg.png">
                </div>
                <div class="login-content">
                    <form action="{{route('register')}}" id="signup" method="POST">
                        @csrf
                        <div class="input-div one">
                            <div class="i">
                                <i class="fas fa-user"></i>
                            </div>
                            <div class="div">
                                <input id="first_name" placeholder="First Name" type="text" name="first_name" class="form-control">
                            </div>
                        </div>
                        <div class="input-div two">
                            <div class="i">
                                <i class="fas fa-user"></i>
                            </div>
                            <div class="div">
                                <input id="last_name" placeholder="Last Name" type="text" name="last_name" class="form-control" required>
                            </div>
                        </div>
                        <div class="input-div one">
                            <div class="i">
                                <i class="fas fa-envelope"></i>
                            </div>
                            <div class="div">
                                <input id="email" placeholder="Email" type="email" name="email" class="form-control" required>
                            </div>
                        </div>
                        <div class="input-div pass">
                            <div class="i">
                                <i class="fas fa-lock"></i>
                            </div>
                            <div class="div">
                                <input id="password" placeholder="Password" type="password" name="password" class="form-control" required autocomplete="new-password">
                            </div>
                        </div>
                        <div class="input-div Phone">
                            <div class="i">
                                <i class="fas fa-phone-alt"></i>
                            </div>
                            <div class="div">
                                <input id="phone" placeholder="Phone" type="tel" name="phone" class="form-control">
                            </div>
                        </div>
                        <div class="input-div four">
                            <div class="i">
                                <i class="fas fa-map-marker-alt"></i>
                            </div>
                            <div class="div">
                                <input id="address" name="address" placeholder="Address" type="text" class="form-control">
                            </div>
                        </div>

                        <div class="s">
                            <a href="#" onclick="myFunction()">Sign Up</a>
                        </div>
                        <div class="x">
                            <p>
                                <span> Already have an account? </span>
                                <a href="{{route('login')}}">Sign in here</a>
                            </p>
                        </div>
                    </form>
                </div>
            </div>

            <script>
                function myFunction() {
                    document.getElementById("signup").submit();
                }
            </script>
        </body>
    </x-auth-card>
</x-guest-layout>