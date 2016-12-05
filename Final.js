//fourNum contains list of 4 numbers that player will use to form 24
var fourNum;
//score is user score for game
var score;

$(document).ready(function() {
    //initalizes four unumbers will make 24 out of
   initScore();
//  retrieveData();
    //when user presses the button with id "next" a new set of four numbers
    //is fetched from the database and shownn on screen

    $("#next").unbind('click').bind('click', function() {
      console.log("next pressed");
        retrieveData();
    });

});


//mainit validates user input and declares if result forms 24
function mainit() {

    //displays all 4 numbers on screen in html element with id Numbers
    document.getElementById("Numbers").innerHTML = fourNum.toString();

      // function evaluates user entered expression when the user presses the CheckAnswer Button
    $("#checkAnswer").unbind('click').bind('click', function() {

        //val is the input string entered by the user
        var val = $('#24Expres').val();

        //onlyDig is a string where everything but digits are replaced
        var onlyDig = val.replace(/[^0-9]/g, "");

        //if onlyDig length is bigger htne 4 something is wrong
        var regex = new RegExp("[" + fourNum.toString() + "]" + "{4}");
        //regex checks if input maches all 4 characters
        var rules = regex.test(onlyDig);

        //replaces all alloed expressions if nums is not empty user string
        //contains not allowed characters
        var nums = val.replace(/[\d\(\)\+\-\*\/\. ]/g, '');

        //expoReg detects strings containg the exponential operator **
        expoReg = new RegExp("[*]{2}");
        var expo = expoReg.test(val);

        if (nums !== "" || expo) {
          // if user inputs any characters that are not digits or the operators + , - , * , \
            $("#Result").text("please use only the characters allowed:");
        } else {
            //check if user input contaisn alll 4 digits and only contains those digits
            //if onlyDig length is not equal to 4 there are not 4 digits in thr users expression
            if (rules && (onlyDig.length === 4))

            {
              //if statements evaluates expression enteres by user using eval
              // and displays congratulation if expression evaluates to 24
                if (eval(val) === 24) {

                    $("#Result").text("Congratulations ! You GOT THE 24");
                    document.getElementById("24Expres").value = "";

                    changeScore();
                    val = "";
                    retrieveData();

                    return;

                } else {
                    //user expression is syntactilcy correct and meets rules but does not
                    //evaluate to 24
                    $("#Result").text("Look at this again, Your Answer Evaluated To " + eval(val));
                }

            } else {
              //display message when user enters more numnbers then are allowed
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

//initScore takes no inputs and makes ajax request to
//retrieve 4 numbers to display screen
function initScore() {
    xhttp = new XMLHttpRequest();

    xhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
          console.log("initscore called");
            //set fourNum equal to string list of integers retrieved by init.php
            fourNum = this.responseText;
            mainit();

        }

    }
    xhttp.open("GET", "InitialNum.php?q=", true);
    xhttp.send();

}

//retrieveData takes no argumnets and sends ajax request to server for
//string of 4 numbers For Example "4,3,4,3"
function retrieveData() {
    xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
           console.log("request made");
            //set fourNum equal to string list of integers retrieved by init.php

            fourNum = this.responseText;
            console.log(fourNum);
            mainit();

        }

    }
    xhttp.open("GET", "NextNum.php?q=", true);
    xhttp.send();

}
