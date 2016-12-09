//fourNum contains list of 4 numbers that player will use to form 24
var fourNum;
//score is user score for game
var score;

$(document).ready(function() {
    //initalizes four numbers that the player will make  24 out of
    initNums();

    //when user presses the button with id "next" a new set of four numbers
    //is fetched from the database and shown on screen
    $("#next").unbind('click').bind('click', function() {
        updateNums();
    });

});


//main validates user input and declares if result forms 24
function main() {

    //displays all 4 numbers on screen in html element with id Numbers
    document.getElementById("Numbers").innerHTML = fourNum.toString();

    // function evaluates user entered expression when the user presses the CheckAnswer Button
    $("#checkAnswer").unbind('click').bind('click', function() {
        //val is the input string entered by the user
        var val = $('#24Expres').val();

        //onlyDig is a string where everything but digits are replaced
        var onlyDig = val.replace(/[^0-9]/g, "");

        //if onlyDig length is not 4 the user entered to many or too few numbers
        var regex = new RegExp("[" + fourNum.toString() + "]" + "{4}");
        //regex checks if input maches all 4 characters
        var rules = regex.test(onlyDig);

        // .replace() below replaces all allowed expressions. if nums is not empty user string
        //contains not allowed characters
        //nums reguler expression was taken from StackOverflow
        var nums = val.replace(/[\d\(\)\+\-\*\/\. ]/g, '');

        //expoReg detects strings containg the exponential operator (**)
        expoReg = new RegExp("[*]{2}");
        var expo = expoReg.test(val);

        //dubDigit detecs strings that contain numbers with 2 or more digits
        dubDigit = new RegExp("[0-9]{2,}");
        var dub = dubDigit.test(val);

        // if user inputs contains any characters that are not digits or the operators + , - , * , \
        if (nums !== "" || expo) {

            $("#Result").text("please use only the characters allowed:");
        } else {
            //check if user input contains alll 4 digits and only contains those digits
            //if onlyDig length is not equal to 4 there are not 4 digits in thr users expression
            if (rules && (onlyDig.length === 4) && !dub)

            {
                //if statements below evaluates expression entered by user using eval
                // and displays congratulation if expression evaluates to 24
                if (eval(val) === 24) {

                    $("#Result").text("Congratulations ! You GOT THE LAST 24");
                    //add 1 to user score
                    changeScore();
                    //retrieveData sets up new 24 if user answers previous 24 correctly
                    retrieveData();


                } else {
                    //user expression is syntactilcy correct and meets 24 rules but does not
                    //evaluate to 24
                    $("#Result").text("Look at this again, Your Answer Evaluated To " + eval(val));
                }

            } else {
                //display message when user enters more numnbers then are allowed or enters
                //numbers that are not allowed
                $("#Result").text("make sure you only use all and only the numbers above");
                return;

            }

        }
    });

}


//changeScore takes no inputs and
//sends ajax request which increments the user  score session variable
function changeScore() {
    xhttp = new XMLHttpRequest();

    xhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            document.getElementById("score").innerHTML = "Youre score is " + this.responseText;
            //set the score displayed on page to string returned by ScoreChange.php
            score = this.responseText;
        }

    }
    xhttp.open("GET", "ScoreChange.php?q=", true);
    xhttp.send();

}

//initNums() takes no inputs and makes ajax request to
//retrieve 4 numbers to display screen
function initNums() {
    xhttp = new XMLHttpRequest();

    xhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            //set fourNum equal to string list of integers retrieved by init.php
            fourNum = this.responseText;
            main();

        }

    }
    xhttp.open("GET", "InitialNum.php?q=", true);
    xhttp.send();

}

//updateNums takes no argumnets and sends ajax request to server for
//string of 4 numbers For Example "4,3,4,3"
function updateNums() {
    xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            //set fourNum equal to string list of integers retrieved by init.php

            fourNum = this.responseText;
            main();

        }

    }
    xhttp.open("GET", "NextNum.php?q=", true);
    xhttp.send();

}
