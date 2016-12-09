# Description
My Web Development Final Project created for CS4. 24 is a onlime game built on the
WAMP stack.The website displays 4 numbers on the page.
The player’s goal is to make 24 using only those four numbers and the parentheses, addition, subtraction, multiplication, and division operations.  
For Example, you could make 24 from 6 6 6 6 by adding 6+6+6+6. The player enters their solutions in the input and my project tells if the player's formula is correct.
If the player wants another problem, my game will display another set of numbers that can form 24 (Not all sets of 4 numbers can be combined to form 24).


#Project Overview
24 works in two stages. First a user enters in  their name on UserName.php. The
user's name is then saved as a session variable and they are directed to FinalView.php
FinalView.php contains a user input box and two buttons "checkAnswer" and "Another 24".
when "Another 24"  is clciked an ajax request is sent using Final.js and NextNum.php to a database
of numbers that can form 24. When "checkAnswer" is clicked Final.js checks the userinputs and
sends an ajax request to the server to update the userscore if the answer is correct using ScoreChange.php.

#Credits
I used the Bootstrap library for most of my CSS.
Look in files for any StackOverflow credits. Session variable and login are based
loosly on examples given by Dr.Bricker.


#Limitations
The program uses only a tempory session cookie to store the user name and information.
This can lead to problems if multiple user enter the same userName. If multiple users with the same
name enter the scoreboard only the user with the highest score will be displayed.

You may also have problems with how DRY my code is. 
