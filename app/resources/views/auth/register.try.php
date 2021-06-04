<x-guest-layout>
    <x-auth-card>
        <x-slot name="logo">
            <a href="/">
                <x-application-logo class="w-20 h-20 fill-current text-gray-500" />
            </a>
        </x-slot>

        <!-- Validation Errors -->
        <x-auth-validation-errors class="mb-4" :errors="$errors" />
        <form id="regForm" action="" method="POST">
            @csrf
            <!-- Name -->
            <div class=" ">
                <input id="first_name" type="text" name="first_name" class="form-control" placeholder="First name">
            </div>

            <div class="">
                <input id="last_name" type="text" name="last_name" class="form-control" placeholder="Last name" required>
            </div>

            <!-- Email Address -->
            <div class="">
                <input id="email" type="email" name="email" class="form-control" placeholder="example@mail.com" required>
            </div>

            <!-- Password -->
            <div class="">
                <input id="password" type="password" name="password" class="form-control" placeholder="Password" required autocomplete="new-password">
            </div>

            <!-- Phone  -->
            <div class="">
                <input id="phone" type="tel" name="phone" class="form-control" placeholder="Phone">
            </div>

            <!-- Address -->
            <div class="">
                <input id="address" name="address" type="text" class="form-control" placeholder="Address">
            </div>
            <button type="submit">Sign Up</button>
        </form>
    </x-auth-card>
</x-guest-layout>