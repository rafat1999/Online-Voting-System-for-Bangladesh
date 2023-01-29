<?php
    session_start();
    if(!isset($_SESSION['id'])){
        header("location: ../");
    }
    $data = $_SESSION['data'];

    if($_SESSION['status']==1){
        $status = '<b style="color: green">Voted</b>';
    }
    else{
        $status = '<b style="color: red">Not Voted</b>';
    }
?>


<html>
    <head>
        <title>Online voting system - Dashboard</title>
        <link rel="stylesheet" href="../css/stylesheet.css">
        <style>
             body{
  
                  background: url(../Picture/06.jpg);
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

            #back{
                float: left;

            }
            #logout{
                float: right;

            }
}
        </style>
    </head>
    <body>
        &nbsp;&nbsp;&nbsp;<img src="../Picture/02.png" height="15%" width="100%">
            
            <center>
            <div id="headerSection">
            
            <h1>Online Voting System</h1>  
            </div>
            </center>
            <hr>
            <a href="../" class="button" id="back">Back</a>
            <a href="logout.php" class="button" id="logout">Log out</a><br><br><br><br>

            <div id="mainSection">
                <div id="profileSection">
                    <center><img src="../uploads/<?php echo $data['photo']?>" height="100" width="100"></center><br>
                    <b><font face="Time New Romans" size="4.5px">Name : </font></b><b><?php echo $data['name'] ?></b><br><br>
                    <b><font face="Time New Romans" size="4.5px">NID No : </font></b><b><?php echo $data['nid'] ?></b>&nbsp;&nbsp;
                    <b><font face="Time New Romans" size="4.5px">Mobile : </font></b> </b><b><?php echo $data['mobile'] ?></b><br><br>
                    <b><font face="Time New Romans" size="4.5px">Division : </font></b><b><?php echo $data['division'] ?></b>&nbsp;&nbsp;                    
                    <b><font face="Time New Romans" size="4.5px">District : </font></b><b><?php echo $data['district'] ?></b><br><br>
                    <b><font face="Time New Romans" size="4.5px">Village : </font></b><b><?php echo $data['village'] ?></b>&nbsp;&nbsp;
                    <b><font face="Time New Romans" size="4.5px">Word No : </font></b><b><?php echo $data['word_no'] ?></b><br><br>
                    <b><font face="Time New Romans" size="4.5px">Address : </font></b><b><?php echo $data['address'] ?></b><br><br>
                    <b><font face="Time New Romans" size="4.5px">Status : </font></b><b><?php echo $status ?></b>
                </div>
                <div id="groupSection">
                    <?php

                    if(isset($_SESSION['groups'])){
                        $groups = $_SESSION['groups'];
                        for($i=0; $i<count($groups); $i++){
                            ?>
                                <div style="border-bottom: 1px solid #bdc3c7; margin-bottom: 10px">
                                <img style="float: right" src="../uploads/<?php echo $groups[$i]['photo']?>" height="80" width="80">
                                <b>Group Name : </b><?php echo $groups[$i]['name']?><br><br>
                                
                                <form method="POST" action="../api/vote.php">
                                <input type="hidden" name="gvotes" value="<?php echo $groups[$i]['votes'] ?>">
                                <input type="hidden" name = "gid" value="<?php echo $groups[$i]['id'] ?>">
                                <?php

                                if($_SESSION['status']==1){
                                    ?>
                                    <button disabled style="padding: 5px; font-size: 15px; background-color: #27ae60; color: white; border-radius: 5px;" type="button">Voted</button>
                                    <?php
                                }
                                else{
                                    ?>
                                    <button style="padding: 5px; font-size: 15px; background-color: #3498db; color: white; border-radius: 5px;" type="submit">Vote</button>
                                    <?php
                                }
                                ?>
                                </form>
                                </div>
                            <?php
                        }
                    }
                    else{
                        ?>
                            <div style="border-bottom: 1px solid #bdc3c7; margin-bottom: 10px">
                                <b>No groups available right now.</b>    
                            </div>
                        <?php
                    }  
                    ?>
                </div>
            </div> 
    </body>
</html>