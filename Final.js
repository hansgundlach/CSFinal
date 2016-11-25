//trust contains list of 4 numbers
var trust;
//score is user score for game
var score;

$(document).ready(function() {

    //when user presses the button with id "next" a new set of four numbers
    //is fetched from the database and shownn on screen
    $("#next").click(function() {
        retrieveData();
    });


    retrieveData();

});


//mainit validates user input and declares if result forms 24
function mainit() {



    //displays all 4 numbers on screen in html element with id Numbers
    document.getElementById("Numbers").innerHTML = trust.toString();


    $("#check").unbind('click').bind('click', function() {

        var val = $('#24Expres').val();

        //checker is a string where everything but digits are replaced
        var checker = val.replace(/[^0-9]/g, "");

        //if checker length is bigger htne 4 something is wrong
        var regex = new RegExp("[" + trust.toString() + "]" + "{4}");
        //regex chekcs if input maches all 4 characters
        var rules = regex.test(checker);
        console.log(rules);

        //replaces all alloed expressions if nums is not empty user string
        //contains not allowed characters
        var nums = val.replace(/[\d\(\)\+\-\*\/\. ]/g, '');

        //expoReg detects strings containg the exponential operator **
        expoReg = new RegExp("[*]{2}");
        var expo = expoReg.test(val);

        if (nums !== "" || expo) {
            $("#Result").text("please use only the characters allowed:");
        } else {
            //check if user input contaisn alll 4 digits and only contaisn those digits
            //if checker length is not equal to 4 there are not 4 digits in thr users expression
            if (rules && (checker.length === 4))

            {
                //if syatemntes evaluates whether the user input expression
                //actually evaluates to 24
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
                $("#Result").text("make sure you only use all and only the numbers above");
                return;

            }

        }
    });

}




//changeScore sends ajax request which increments the user session variable score
function changeScore() {
    xhttp = new XMLHttpRequest();

    xhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            document.getElementById("score").innerHTML = "Youre score is " + this.responseText;

            score = this.responseText;

        }

    }
    xhttp.open("GET", "scoreChange.php?q=", true);
    xhttp.send();


}




//retrieveData sends ajax request to server for
//string of 4 numbers For Example "4,3,4,3"
function retrieveData() {
    xhttp = new XMLHttpRequest();

    xhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {

            trust = this.responseText;
            mainit();

        }

    }
    xhttp.open("GET", "Final.php?q=", true);
    xhttp.send();



}
