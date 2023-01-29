<html>
    <head>
        <title>Online voting system - Home</title>
        <link rel="stylesheet" href="css/stylesheet.css">
        <style>
 body{
  
  background: url(Picture/03.jpg);
  background-repeat: no-repeat;
  background-size: 100%;
}

.button {
  background-color: black;
  border: none;
  color: white;
  padding: 15px 32px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  font-size: 20px;
  margin: 4px 2px;
  cursor: pointer;
}
.p1 {
  font-family: "Lucida Console", "Courier New", monospace;
  font-size: 25px;
}
#admin{
    float: left;
}
#register{
     float: right;

}
}

</style>
        
    </head>
    <body>
        &nbsp;&nbsp;&nbsp;<img src="Picture/02.png" height="15%" width="100%">

            <hr>
            <center>
            <div id="headerSection">
            <h1>Online Voting System</h1> 
            <a href="routes/admin2.php" class="button" id="admin">Admin</a> 
            <a href="routes/register.php" class="button" id="register">Register Here</a><br><br><br><br><br> 
            </div>
            <div id="loginSection">
                <form action="api/login.php" method="POST" name="reg_form" onsubmit="return validate()">
                    <input type="number" name="nid" placeholder="Enter Your NID No"><br><br>
                    <input type="password" name="pass" placeholder="Enter password" ><br><br>
                    <select name="role" style="width: 15%; border: 2px solid black">
                        <option value="1">Voter</option>
                    </select><br><br>  
                    <button class="button" type="submit"><i>Login</i></button>            
                    
                </form>
            </div>

            </center> 
    <script type="text/javascript">
        function validate()
        {
            var nid= document.forms["reg_form"]["nid"].value;
            var pass= document.forms["reg_form"]["pass"].value;

        }
        if (nid == "") 
        {
            alert("PLEASE GIVE YOUR NID NO");
            return false;
        }
        if (isNaN(nid)) 
        {
            alert("please insert only numbers");
            return false;
        }
        if (nid.length!=10 && nid.length!=14) 
        {
            alert("Please insert 10 and 14 digits numbers");
            return false;
        }
        if (pass == "") 
        {
            alert("Please fill the password box");
            return false;
        }
    </script>
    </body>
</html>