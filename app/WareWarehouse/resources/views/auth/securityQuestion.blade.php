@extends('layouts.app')
@section('title', 'Login')

@section('content')
<!DOCTYPE html>
<html>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
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

<body>
    <form id="regForm">
        <h1>Register:</h1>
        <div class="page">Name:
            <p><input placeholder="First name:" oninput="this.className = ''" name="fname"></p>
            <p><input placeholder="Last name:" oninput="this.className = ''" name="lname"></p>
        </div>
        <div class="page">Contact Info:
            <p><input placeholder="E-mail:" oninput="this.className = ''" name="email"></p>
            <p><input placeholder="Phone:" oninput="this.className = ''" name="phone"></p>
        </div>
        <div class="page">Birthday:
            <p><input placeholder="Date:" oninput="this.className = ''" name="dd"></p>
            <p><input placeholder="Month:" oninput="this.className = ''" name="nn"></p>
            <p><input placeholder="Year:" oninput="this.className = ''" name="yyyy"></p>
        </div>
        <div style="overflow:auto;">
            <div style="float:right;">
                <button type="button" id="prevBtn" onclick="nextPrev(-1)">Previous</button>
                <button type="button" id="nextBtn" onclick="nextPrev(1)">Next</button>
            </div>
        </div>
        <div style="text-align:center;margin-top:40px;">
            <span class="step"></span>
            <span class="step"></span>
            <span class="step"></span>
        </div>
    </form>
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
                document.getElementById("nextBtn").innerHTML = "Submit";
            } else {
                document.getElementById("nextBtn").innerHTML = "Next";
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
</body>

</html>

@endsection