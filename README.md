# Description
My Web Development Final Project created for CS4. 24 is a online game built on the
WAMP stack. The website displays 4 numbers on the page.
The player’s goal is to make 24 using only those four numbers and the parentheses, addition, subtraction, multiplication, and division operations.  
For Example, you could make 24 from 6 6 6 6 by adding 6+6+6+6. The player enters their solutions in the input and my project tells if the player's formula is correct.
If the player wants another problem, my game will display another set of numbers that can form 24 (Not all sets of 4 numbers can be combined to form 24).


#Project Overview
24 works in two stages. First a user enters in their name in index.php. The
user's name is then saved as a session variable and they are directed to FinalView.php ,which contains the game.
FinalView.php has  a user input box and two buttons "checkAnswer" and "Another 24".
when "Another 24"  is clicked an ajax request is sent using Main.js and NextNum.php to a database
of numbers that can form 24 (hans_24list). When "checkAnswer" is clicked, Main.js checks the user’s inputs and
sends an ajax request to the server to update the userscore if the answer is correct using ScoreChange.php.
All of the project css is in Final css and the bootstrap library.


#Limitations
The program uses only temporary session cookie to store the user name and information.
This can lead to problems if multiple user enter the same username. If multiple users with the same
name enter the scoreboard only the user with the higher score will be displayed. Also users on smaller screen sizes may not be
able to view instructions.

#Credits
I used the Bootstrap library for most of my CSS.
Look in files for any StackOverflow credits. Session variable and login are based
loosely on examples given by Dr.Bricker.

#Notes to Dr.Bricker
The Ajax statements may not seem DRY in Main.js. However , each ajax request does suddenly different functions.
InitialNum.php and NextNum.php are very similiar but can not be put together as we discussed.
Ask me any questions if things seem repetitive.
