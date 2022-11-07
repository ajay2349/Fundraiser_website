<?php

session_start();
if(!isset($_SESSION['username'])) {
    header('location:login.html');
}
$email = $_SESSION['username'];
$con = mysqli_connect('localhost','root','');
mysqli_select_db($con,'fundraiser');

$nc = " select * from events where type = 'ajay'";
$med = " select * from events where type = 'med'";
$ashr = " select * from events where type = 'ashr'";
$userdetails = "select * from users where email = '$email'";

$resultnc = mysqli_query($con, $nc);
$resultmed = mysqli_query($con, $med);
$resultashr = mysqli_query($con, $ashr);
$resuser = mysqli_query($con, $userdetails);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Fundraiser-A Helping Hand</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>
    <div class="main bg">
        <div class="navbar">
            <div class="icon">
                <h2 class="logo">A Helping Hand</h2>
            </div>

            <div class="menu-bar">
                <ul>
                    <?php if($email == 'admin@gmail.com') {?>
                        <li><a href="adminpage.html"><i class="fa fa-home"></i>HOME</a></li>
                    <?php } ?> 
                    <?php if($email != 'admin@gmail.com') { ?>
                        <li><a href="index.php"><i class="fa fa-home"></i>HOME</a></li>
                    <?php } ?>
                    <li><a href="#"><i class="fa fa-info-circle"></i>ABOUT</a>
                        <div class="submenu">
                            <ul>
                                <li class="hover_me"><a href="#">OUR TEAM</a>
                                    <div class="submenu1">
                                        <ul>
                                            <li style="color:#f29f05">OUR TEAM contains a group of members for verifying ever fund raising event created and mainly we have selected only particular ashrams to donate money then their will be no trust issues</li>
                                        </ul>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </li>
                    <li><a href="#"><i class="fa fa-phone"></i>CONTACT</a>
                        <div class="submenu">
                            <ul>
                                <li class="hover_me"><a href="#">Email</a>
                                    <div class="submenu1">
                                        <ul>
                                            <li style="color:#f29f05">admin@gmail.com</li>
                                        </ul>
                                    </div>
                                </li>
                                <li class="hover_me"><a href="#">Contact Number</a>
                                    <div class="submenu1">
                                        <ul>
                                            <li style="color:#f29f05">9988776655</li>
                                        </ul>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </li>
                    <li><a href="#"><i class="fa fa-user-circle-o"></i>USER</a>
                        <div class="submenu">
                            <ul>
                                <?php
                                    while($rows=$resuser->fetch_assoc())
                                    {
                                ?>
                                <li style="color:#f29f05"><?php echo $rows['fullname'] ?></li>
                                <li style="color:#f29f05"><?php echo $email ?></li>
                                <?php
                                    }
                                ?>
                            </ul>
                        </div>
                    </li>
                    <li><a href="logout.php"><i class="fa fa-sign-out"></i>LOGOUT</a></li>
                </ul>
            </div>
        </div>
        <div class="container">
            <div class="description">
                <p>Donating to the causes you care about not only benefits the charities themselves, it can be deeply rewarding for you too. Millions of people give to charity on a regular basis to support causes they believe in, as well as for the positive effect it has on their own lives.</p>
                <p>We all need a helping hand from time to time. It is often our communities that support us in those hard times, and now it is our turn to support them, as the rewards of pitching in and helping those in need can be one of the most enriching feelings in life – worth much more than money.</p>
            </div>
            <div class="events">
                <h1 style="color: white; text-align:center;margin:30px">Trending Fundraising Events</h1>
            </div>
            <div class="Natural-Calamities">
                <h2 style="color: #3234a8;font-size:30px">Natural Calamities</h2>
                <div class="fd-events">
                    <div class="menu-wrapper">
                        <ul class="menu" id="myDIV1"> 
                            <?php
                                while($rows=$resultnc->fetch_assoc())
                                {
                            ?>
                            <li class="item">
                                <div class="card">
                                    <a href="#">
                                        <img src="nc pic.jpeg" alt="John" style="width:100%;height:113px">
                                        <h1><?php echo $rows['title'];?></h1>
                                        <p class="title"><?php echo $rows['description'];?></p>
                                        <label for="file"><?php echo $rows['receivedamount'].' of '.$rows['totalamount'].' received';?></label><br>
                                        <?php echo '<progress id="file" value="'.$rows['receivedamount'].'" max="'.$rows['totalamount'].'"?>></progress>'?>
                                    </a>
                                    <p>
                                        <form action="donate.php" method="POST">
                                            <input type="hidden" name="id_event" value="<?php echo $rows['id'];?>">
                                            <button type="submit">Donate</button>
                                        </form>
                                    </p>
                                </div>
                            </li>
                            <?php
                                }
                            ?>
                            <div class="paddles">
                                <button class="left-paddle paddle" style="background-color:gray;" onClick="moveLeftnc()">
                                    <
                                </button>
                                <button class="right-paddle paddle" style="background-color:gray;" onClick="moveRightnc()">
                                    >
                                </button>
                            </div>
                        </ul>
                        <script>
                            function moveRightnc() {
                                var element = document.getElementById("myDIV1");
                                element.scrollLeft += 400;
                            }
                            function moveLeftnc() {
                                var element = document.getElementById("myDIV1");
                                element.scrollLeft -= 400;
                            }
                        </script>
                    </div>
                </div>
            </div>
            <div class="Medical-Emergencies">
                <h2 style="color: #3234a8;font-size:30px;margin: top 10px;"> Medical Emergencies</h2>
                <div class="fd-events">
                    <div class="menu-wrapper">
                        <ul class="menu" id="myDIV2">       
                            <?php
                                while($rows=$resultmed->fetch_assoc())
                                {
                            ?>
                            <li class="item">
                                <div class="card">
                                    <a href="#">
                                        <img src="med pic1.jfif" alt="John" style="width:100%;height:113px">
                                        <h1><?php echo $rows['title'];?></h1>
                                        <p class="title"><?php echo $rows['description'];?></p>
                                        <label for="file"><?php echo $rows['receivedamount'].' of '.$rows['totalamount'].' received';?></label><br>
                                        <?php echo '<progress id="file" value="'.$rows['receivedamount'].'" max="'.$rows['totalamount'].'"?>></progress>'?>
                                    </a>
                                    <p>
                                        <form action="donate.php" method="POST">
                                            <input type="hidden" name="id_event" value="<?php echo $rows['id'];?>">
                                            <button type="submit">Donate</button>
                                        </form>
                                    </p>
                                </div>
                            </li>
                            <?php
                                }
                            ?>
                            <div class="paddles">
                                <button class="left-paddle paddle" style="background-color:gray;" onClick="moveLeftmed()">
                                    <
                                </button>
                                <button class="right-paddle paddle" style="background-color:gray;" onClick="moveRightmed()">
                                    >
                                </button>
                            </div>
                        </ul>
                        <script>
                            function moveRightmed() {
                                var element = document.getElementById("myDIV2");
                                element.scrollLeft += 400;
                            }
                            function moveLeftmed() {
                                var element = document.getElementById("myDIV2");
                                element.scrollLeft -= 400;
                            }
                        </script>
                    </div>
                </div>
            </div>
            <div class="Ashrams">
                <h2 style="color: #3234a8;font-size:30px;margin: top 10px;">Ashrams</h2>
                <div class="fd-events">
                    <div class="menu-wrapper">
                        <ul class="menu" id="myDIV3">
                            <?php
                                while($rows=$resultashr->fetch_assoc())
                                {
                            ?>
                            <li class="item">
                                <div class="card">
                                    <a href="#">
                                        <img src="Ashram pic.jpeg" alt="John" style="width:100%;height:113px" >
                                        <h1><?php echo $rows['title'];?></h1>
                                        <p class="title"><?php echo $rows['description'];?></p>
                                        <label for="file"><?php echo $rows['receivedamount'].' of '.$rows['totalamount'].' received';?></label><br>
                                        <?php echo '<progress id="file" value="'.$rows['receivedamount'].'" max="'.$rows['totalamount'].'"?>></progress>'?>
                                    </a>
                                    <p>
                                        <form action="donate.php" method="POST">
                                            <input type="hidden" name="id_event" value="<?php echo $rows['id'];?>">
                                            <button type="submit">Donate</button>
                                        </form>
                                    </p>
                                </div>
                            </li>
                            <?php
                                }
                            ?>
                            <div class="paddles">
                                <button class="left-paddle paddle" style="background-color:gray;" onClick="moveLeftashr()">
                                    <
                                </button>
                                <button class="right-paddle paddle" style="background-color:gray;" onClick="moveRightashr()">
                                    >
                                </button>
                            </div>
                        </ul>
                        <script>
                            function moveRightashr() {
                                var element = document.getElementById("myDIV3");
                                element.scrollLeft += 400;
                            }
                            function moveLeftashr() {
                                var element = document.getElementById("myDIV3");
                                element.scrollLeft -= 400;
                            }
                        </script>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>