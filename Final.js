var trust;



$(document).ready(function(){



  $("#next").click(function() {
  //console.log("next pressed");

  retrieveData();



  });






  var nextChosen = "5";
  retrieveData();


  console.log(nextChosen + "this is nextChosen");

//display numbers selected for 24
 //$('#Numbers').text(chosen.toString());








});



function mainit() {





//this code is so that commas are able to be added to the database

trust = trust.replace(/[,]/g,"");
var chosen = trust.split('');

document.getElementById("Numbers").innerHTML=chosen.toString();

 console.log(chosen);

  //here was thing
  //click ckeck 24 button
      $("#check").click(function(){
        //most of input processing
        var val = $('#24Expres').val();
        //val = eval(val);


        //checking that expression matches all requirements



        //removing everything except digits
        var checker =  val.replace(/[^0-9]/g, "" );

        //if checker length is bigger htne 4 something is wrong
        var regex = new RegExp("[" + chosen.toString()+ "]" +  "{4}");
        //regex chekcs if input maches all 4 characters
        var rules = regex.test(checker);









         //replaces all alloed expressions if there is stuff remaining string is invalid
        var nums = val.replace(/[\d\(\)\+\-\*\/\. ]/g,'');
        console.log(nums + "this hsould be empty");
        if(nums !== ""){
          $("#Result").text("please use only the characters allowed:");
        }
        else {
          //check if user input contaisn alll 4 digits and only contaisn those digits
            if(rules && (checker.length === 4))

            {
              console.log(eval(val)+ "Hello");
                  if(eval(val)===24){
                     $("#Result").text("Congratulations ! You GOT THE 24");
                  }else {
                     $("#Result").text("Look at this again, Your Answer Evaluated To " + eval(val));
                  }






            }
  else {
     $("#Result").text("make sure you only use all and only the numbers above");

  }



  }













      });

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