<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<?php  include ("./inc/header.inc.php"); ?>

<?php 
$reg = @$_POST['reg'];
$fn="";
$ln="";
$un="";
$em="";
$em2="";
$pswd="";
$pswd2="";
$d="";

$u_check = ""; // Check if username exists
//registration form

// $fn that is the syntax to define variable .
// // @ to prevent the undeclared variable .
// $_POST method to get the value of Given Name of Text Box for example .
// strip_tags is a Securety method that pervent SQL injunction 

$fn = strip_tags(@$_POST['fname']);
$ln = strip_tags(@$_POST['lname']);
$un = strip_tags(@$_POST['username']);
$em = strip_tags(@$_POST['email']);
$em2 = strip_tags(@$_POST['email2']);
$pswd = strip_tags(@$_POST['password']);
$pswd2 = strip_tags(@$_POST['password2']);
$d = date("Y-m-d"); // Year - Month - Day get the date from the server .



if ($reg) {
if ($em==$em2) {
// Check if user already exists
$u_check = mysql_query("SELECT username FROM users WHERE username='$un'");
// Count the amount of rows where username = $un
$check = mysql_num_rows($u_check);
//Check whether Email already exists in the database
$e_check = mysql_query("SELECT email FROM users WHERE email='$em'");
//Count the number of rows returned
$email_check = mysql_num_rows($e_check);
if ($check == 0) {
  if ($email_check == 0) {
//check all of the fields have been filed in
if ($fn&&$ln&&$un&&$em&&$em2&&$pswd&&$pswd2) {
// check that passwords match
if ($pswd==$pswd2) {
// check the maximum length of username/first name/last name does not exceed 25 characters
if (strlen($un)>25||strlen($fn)>25||strlen($ln)>25) {
echo "The maximum limit for username/first name/last name is 25 characters!";
}
else
{
// check the maximum length of password does not exceed 25 characters and is not less than 5 characters
if (strlen($pswd)>30||strlen($pswd)<5) {
echo "Your password must be between 5 and 30 characters long!";
}
else
{
//encrypt password and password 2 using md5 before sending to database
$pswd = md5($pswd);
$pswd2 = md5($pswd2);
$query = mysql_query("INSERT INTO users VALUES ('','$un','$fn','$ln','$em','$pswd','$d','0','Write something about yourself.','','','no')");
die("<h2>Welcome to findFriends</h2>Login to your account to get started ...");
}
}
}
else {
echo "Your passwords don't match!";
}
}
else
{
echo "Please fill in all of the fields";
}
}
else
{
 echo "Sorry, but it looks like someone has already used that email!";
}
}
else
{
echo "Username already taken ...";
}
}
else {
echo "Your E-mails don't match!";
}
}





?>
        
        <div style=" width:800px; margin: 0px auto 0px auto;">
        <table>
            <tr>
                <td  width="60%" valign="top"> 
                    <h2>Join Talent Club Today!</h2>
                </td>
                
                <td  width="60%" valign="top"> 
                    <h2>Sign Up Below! </h2>
                    
                    <form action="#" method="POST">
                        <input type="text" name="fname" size="25" placeholder="First Name"><br/><br/>
                        <input type="text" name="lname" size="25" placeholder="Last Name"><br/><br/>
                        <input type="text" name="username" size="25" placeholder="User Name"><br/><br/>
                        <input type="text" name="email" size="25" placeholder="Email Address"><br/><br/>
                        <input type="text" name="email2" size="25" placeholder="Email Address (again)"><br/><br/>
                        <input type="text" name="password" size="25" placeholder="Password"><br/><br/>
                        <input type="text" name="password2" size="25" placeholder="Password (again)"><br/><br/>
                        <input type="submit" name="reg" value="Sign UP!">
                    </form>
                </td>
            </tr>
        </table>
   <?php include ("./inc/footer.inc.php")?>
