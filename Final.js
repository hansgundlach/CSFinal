//trust contains list of 4 numbers
var trust;
//score is user score
var score;

$(document).ready(function(){



  $("#next").click(function() {
  //console.log("next pressed");
  //viewarray retrieved
  retrieveData();
  //update score
  //changeScore();


  });






  var nextChosen = "5";
  retrieveData();
  //changeScore();

  //changeScore();
  console.log(nextChosen + "this is nextChosen");

//display numbers selected for 24
 //$('#Numbers').text(chosen.toString());








});



function mainit() {





//this code is so that commas are able to be added to the database

trust = trust.replace(/[,]/g,"");
var chosen = trust.split('');
//display all the numbers
document.getElementById("Numbers").innerHTML=chosen.toString();



//display session score variable
//document.getElementById("score").innerHTML = score.toString();






  //here was thing
  //click ckeck 24 button
      $("#check").unbind('click').bind('click',function(){
        //var val = "";
        //most of input processing
        var val = $('#24Expres').val();
        console.log(val);
        console.log("what");
        //val = eval(val);


        //checking that expression matches all requirements



        //removing everything except digits
        var checker =  val.replace(/[^0-9]/g, "" );

        //if checker length is bigger htne 4 something is wrong
        var regex = new RegExp("[" + chosen.toString()+ "]" +  "{4}");
        //regex chekcs if input maches all 4 characters
        var rules = regex.test(checker);
        console.log(rules);

        //replaces all alloed expressions if there is stuff remaining string is invalid
        var nums = val.replace(/[\d\(\)\+\-\*\/\. ]/g,'');
        //test if there are any exponentials
        expoReg = new RegExp("[*]{2}");
        var expo = expoReg.test(val);


        if(nums !== ""  || expo){
          $("#Result").text("please use only the characters allowed:");
        }
        else {
          //check if user input contaisn alll 4 digits and only contaisn those digits
            if(rules && (checker.length === 4))

            {
              console.log(eval(val)+ "Hello");
                  if(eval(val)===24){

                     $("#Result").text("Congratulations ! You GOT THE 24");
                     document.getElementById("24Expres").value= "";
                     console.log(eval(val));
                     console.log("Hans is consolign");

                      changeScore();
                      val = "" ;

                      //retrieveData();
                      console.log("This should end console");
                      return;

                        retrieveData();






                  }else {
                     $("#Result").text("Look at this again, Your Answer Evaluated To " + eval(val));
                  }






            }
  else {
     $("#Result").text("make sure you only use all and only the numbers above");
     return;

  }



  }













      });

}




//function adds score of user in session and changes variable
//and adds to highsore if possible
function changeScore() {
xhttp = new XMLHttpRequest();

xhttp.onreadystatechange = function (){
  if (this.readyState==4 && this.status==200) {
       document.getElementById("score").innerHTML= "Youre score is " + this.responseText;
       //console.log(this.responseText);
       //nextChosen = this.responseText;
       score = this.responseText;
       //mainit();

      }

}
xhttp.open("GET","scoreChange.php?q=", true);
xhttp.send();
//return this.responseText;
return;
}




//functions retrieves data from server
function retrieveData() {
xhttp = new XMLHttpRequest();

xhttp.onreadystatechange = function (){
  if (this.readyState==4 && this.status==200) {
       //document.getElementById("Numbers").innerHTML=this.responseText;
       console.log(this.responseText);
       nextChosen = this.responseText;
       trust = this.responseText;
       mainit();
    //   console.log(trust);
      }

}
xhttp.open("GET","Final.php?q=", true);
xhttp.send();



}
