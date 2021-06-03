<x-guest-layout>
    <x-auth-card>
        <x-slot name="logo">
            <a href="/">
                <x-application-logo class="w-20 h-20 fill-current text-gray-500" />
            </a>
        </x-slot>

        <!-- Validation Errors -->
        <x-auth-validation-errors class="mb-4" :errors="$errors" />
        <style>
            /* Style the form */
            #regForm {
                background-color: #ffffff;
                margin: 100px auto;
                padding: 40px;
                width: 70%;
                min-width: 300px;
            }

            /* Mark input boxes that gets an error on validation: */
            input.invalid {
                background-color: #ffdddd;
            }

            /* Hide all steps by default: */
            .tab {
                display: none;
            }

            /* Make circles that indicate the steps of the form: */
            .step {
                height: 15px;
                width: 15px;
                margin: 0 2px;
                background-color: #bbbbbb;
                border: none;
                border-radius: 50%;
                display: inline-block;
                opacity: 0.5;
            }

            /* Mark the active step: */
            .step.active {
                opacity: 1;
            }

            /* Mark the steps that are finished and valid: */
            .step.finish {
                background-color: #04AA6D;
            }
        </style>

        <form id="regForm" action="" method="POST">
            @csrf
            <!-- One "tab" for each step in the form: -->
            <div class="tab">
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
            </div>

            <div class="tab">Contact Info:
                <!-- Select Question -->
                <div class="">
                    <x-label :value="__('Questions')" />
                    <select class="form-control" name="question" id="question">
                        <option value="Q_1">Sokap Nama bokap</option>
                        <option value="Q_2">Nama Nyokap</option>
                        <option value="Q_3">Nama Sokap</option>
                        <option value="Q_4">Nama Diskpa</option>
                        <option value="Q_5">Nama Tukap</option>
                    </select>
                </div>

                <!-- Anwser -->
                <div class="">
                    <label for="answer">Your Anwser</label>
                    <input type="text" class="form-control" id="answer" name="answer" placeholder="Your Anwser">
                </div>
            </div>

            <div style="overflow:auto;">
                <div style="float:right;">
                    <button type="button" id="prevBtn" onclick="nextPrev(-1)">Previous</button>
                    <button type="button" id="nextBtn" onclick="nextPrev(1)">Next</button>
                </div>
            </div>

            <!-- Circles which indicates the steps of the form: -->
            <div style="text-align:center;margin-top:40px;">
                <span class="step"></span>
                <span class="step"></span>
            </div>

        </form>

        <script>
            var currentTab = 0; // Current tab is set to be the first tab (0)
            showTab(currentTab); // Display the current tab

            function showTab(n) {
                // This function will display the specified tab of the form ...
                var x = document.getElementsByClassName("tab");
                x[n].style.display = "block";
                // ... and fix the Previous/Next buttons:
                if (n == 0) {
                    document.getElementById("prevBtn").style.display = "none";
                } else {
                    document.getElementById("prevBtn").style.display = "inline";
                }
                if (n == (x.length - 1)) {
                    document.getElementById("nextBtn").innerHTML = "Submit";
                } else {
                    document.getElementById("nextBtn").innerHTML = "Next";
                }
                // ... and run a function that displays the correct step indicator:
                fixStepIndicator(n)
            }

            function nextPrev(n) {
                // This function will figure out which tab to display
                var x = document.getElementsByClassName("tab");
                // Exit the function if any field in the current tab is invalid:
                if (n == 1 && !validateForm()) return false;
                // Hide the current tab:
                x[currentTab].style.display = "none";
                // Increase or decrease the current tab by 1:
                currentTab = currentTab + n;
                // if you have reached the end of the form... :
                if (currentTab >= x.length) {
                    //...the form gets submitted:
                    document.getElementById("regForm").submit();
                    return false;
                }
                // Otherwise, display the correct tab:
                showTab(currentTab);
            }

            function validateForm() {
                // This function deals with validation of the form fields
                var x, y, i, valid = true;
                x = document.getElementsByClassName("tab");
                y = x[currentTab].getElementsByTagName("input");
                // A loop that checks every input field in the current tab:
                for (i = 0; i < y.length; i++) {
                    // If a field is empty...
                    if (y[i].value == "") {
                        // add an "invalid" class to the field:
                        y[i].className += " invalid";
                        // and set the current valid status to false:
                        valid = false;
                    }
                }
                // If the valid status is true, mark the step as finished and valid:
                if (valid) {
                    document.getElementsByClassName("step")[currentTab].className += " finish";
                }
                return valid; // return the valid status
            }

            function fixStepIndicator(n) {
                // This function removes the "active" class of all steps...
                var i, x = document.getElementsByClassName("step");
                for (i = 0; i < x.length; i++) {
                    x[i].className = x[i].className.replace(" active", "");
                }
                //... and adds the "active" class to the current step:
                x[n].className += " active";
            }
        </script>
    </x-auth-card>
</x-guest-layout>