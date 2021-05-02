@extends('layouts.app')
@section('title', 'Register')

@section('content')
<style>
    * {
        box-sizing: border-box;
    }

    body {
        background-color: #f1f1f1;
    }

    #regForm {
        margin: 100px auto;
        font-family: Raleway;
        padding: 40px;
        width: 70%;
        min-width: 300px;
    }

    h1 {
        text-align: center;
    }

    input {
        padding: 10px;
        width: 100%;
        font-size: 17px;
        font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        border: 1px solid #aaaaaa;
    }

    /* Mark input boxes that gets an error on validation: */
    input.invalid {
        background-color: #ffdddd;
    }

    /* Hide all steps by default: */
    .page {
        display: none;
    }

    button {
        background-color: #4CAF50;
        color: #ffffff;
        border: none;
        padding: 10px 20px;
        font-size: 17px;
        font-family: Raleway;
        cursor: pointer;
    }

    button:hover {
        opacity: 0.8;
    }

    #prevBtn {
        background-color: #bbbbbb;
    }

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

    .step.active {
        opacity: 1;
    }

    .step.finish {
        background-color: #4CAF50;
    }
</style>


<form method="POST" id="regForm" action="{{ route('register') }}">
    @csrf

    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif

    <div class="col">
        <div class="page" style="display: none;">
            <!-- Name -->
            <div class=" m-3 row">
                <input id="first_name" type="text" name="first_name" class="form-control" placeholder="First name">
            </div>

            <div class="m-3 row">
                <input id="last_name" type="text" name="last_name" class="form-control" placeholder="Last name" required>
            </div>

            <!-- Email Address -->
            <div class="m-3 row">
                <input id="email" type="email" name="email" class="form-control" placeholder="example@mail.com" required>
            </div>

            <!-- Password -->
            <div class="m-3 row">
                <input id="password" type="password" name="password" class="form-control" placeholder="Password" required autocomplete="new-password">
            </div>

            <!-- Phone  -->
            <div class="m-3 row">
                <input id="phone" type="tel" name="phone" class="form-control" placeholder="Phone">
            </div>

            <!-- Address -->
            <div class="m-3 row">
                <input id="address" name="address" type="text" class="form-control" placeholder="Address">
            </div>
        </div>
        <div class="page" style="display: none;">
            <!-- Select Question -->
            <div class="m-3 row">
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
            <div class="m-3 row">
                <label for="answer">Your Anwser</label>
                <input type="text" class="form-control" id="answer" name="answer" placeholder="Your Anwser">
            </div>
        </div>
    </div>


    <div class="flex items-center justify-end mt-4">
        <button id="next" type="button" class="btn btn-primary" onclick="nextPrev(1)">
            Next
        </button>
    </div>

    <div style="text-align:center;margin-top:40px;">
        <span class="step"></span>
        <span class="step"></span>
    </div>


    <script>
        var currentTab = 0;
        showTab(currentTab);

        function showTab(stepNo) {
            var pageEle = document.getElementsByClassName("page");
            pageEle[stepNo].style.display = "block";
            if (stepNo == 0) {
                document.getElementById("prevBtn").style.display = "none";
            } else {
                document.getElementById("prevBtn").style.display = "inline";
            }
            if (stepNo == (pageEle.length - 1)) {
                document.getElementById("next").innerHTML = "Submit";
            } else {
                document.getElementById("next").innerHTML = "Next";
            }
            changeStepIndicator(stepNo)
        }

        function nextPrev(stepNo) {
            var pageEle = document.getElementsByClassName("page");
            if (stepNo == 1 && !checkForm()) return false;
            pageEle[currentTab].style.display = "none";
            currentTab = currentTab + stepNo;
            if (currentTab >= pageEle.length) {
                document.getElementById("regForm").submit();
                return false;
            }
            showTab(currentTab);
        }

        function checkForm() {
            var pageEle, inputEle, i, valid = true;
            pageEle = document.getElementsByClassName("page");
            inputEle = pageEle[currentTab].getElementsByTagName("input");
            for (i = 0; i < inputEle.length; i++) {
                if (inputEle[i].value == "") {
                    inputEle[i].className += " invalid";
                    valid = false;
                }
            }
            if (valid) {
                document.getElementsByClassName("step")[currentTab].className += " finish";
            }
            return valid;
        }

        function changeStepIndicator(stepNo) {
            var i, pageEle = document.getElementsByClassName("step");
            for (i = 0; i < pageEle.length; i++) {
                pageEle[i].className = pageEle[i].className.replace(" active", "");
            }
            pageEle[stepNo].className += " active";
        }
    </script>
</form>

@endsection