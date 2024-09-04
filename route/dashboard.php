<?php

session_start();
if(!isset($_SESSION['userdata'])){
    header("location: ../");
}
    $userdata = $_SESSION['userdata'];
    $groupsdata = $_SESSION['groupsdata'];

    if($userdata['status']==0){
        $status =  '<b style="color:red"> Not Voted</b>';
    }
    else{
        $status =  '<b style="color:green"> Voted</b>';
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link rel="stylesheet" href="style2.css">
</head>
<body>

    <style>
        #back{
            float:left;
        }

        #lgout{
            float:right;
        }

        #profile{
            background-color: whitesmoke;
            padding: 20px;
            width: 30%;
            float: left;
        }

        #group{
            background-color: whitesmoke;
            padding: 20px;
            width: 60%;
            float: right;
        }
        #votebtn{
            width: 10%;
            height: 40px;
            border-radius: 50px;
            background-color: #088178;
            color: whitesmoke;
            text-shadow: 1px 1px 2px black;
                }
        
        #voted{
            width: 10%;
            height: 40px;
            border-radius: 50px;
            background-color: blue;
            color: whitesmoke;
            text-shadow: 1px 1px 2px black;
        }
    </style>

    <div class="box">
        <center>
    <div class="head">
        <a href="../"><button type="" id="back" class="btn">BACK</button></a>
        <a href="Thanx.html"><button class="btn" id="lgout">LOGOUT</button></a>
        <h1 class="h1">Online Voting System</h1>
        <hr>
    </center>
    </div>
    <div id="profile">
        <center><img src="../uploads/<?php echo $userdata['photo'] ?>" height="100"; width="100";></center><br><br>
        <b>Name: <?php echo $userdata['name'] ?></b><br><br>
        <b>Mobile: <?php echo $userdata['mobile'] ?></b><br><br>
        <b>Address: <?php echo $userdata['address'] ?></b><br><br>
        <b>Status: <?php echo $status ?></b><br><br>
    </div>
    <div id="group">
        <?php
           if($_SESSION['groupsdata']){
            for($i=0;$i<count($groupsdata); $i++){
                ?>
                 <div>
                    <img style="float:right" src="../uploads/<?php echo $groupsdata[$i]['photo'] ?>" height="100"; width="100";>
                    <b>Group Name: </b><?php echo $groupsdata[$i]['name'] ?><br>
                    <b>Votes: </b><?php echo $groupsdata[$i]['votes'] ?><br>
                    <form action="../api/vote.php" method="POST">
                        <input type="hidden" name="gvotes" value="<?php echo $groupsdata[$i]['votes'] ?>">
                        <input type="hidden" name="gid" value="<?php echo $groupsdata[$i]['id'] ?>">
                        <?php
                        if($_SESSION['userdata']['status']==0){
                            ?>
                            <input type="submit" name="votebtn" value="vote" id="votebtn"> 
                            <?php
                        }
                        else{
                            ?>
                            <button disabled type="button" name="votebtn" value="vote" id="voted">Voted</button> 
                            <?php
                        }
                        ?>
                         
                    </form>
                 </div>
                 <hr>
                <?php
            }
           }
        ?>
    </div>
</div>
</body>
</html>