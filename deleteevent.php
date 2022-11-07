<?php

session_start();
if(!isset($_SESSION['username'])) {
    header('location:login.html');
}

$con = mysqli_connect('localhost','root','');
mysqli_select_db($con,'fundraiser');

$nc = " select * from events where type = 'ajay'";
$med = " select * from events where type = 'med'";
$ashr = " select * from events where type = 'ashr'";

$resultnc = mysqli_query($con, $nc);
$resultmed = mysqli_query($con, $med);
$resultashr = mysqli_query($con, $ashr);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Fundraiser-A Helping Hand</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="main bg">
        <div class="navbar">
            <div class="icon">
                <h2 class="logo">A Helping Hand</h2>
            </div>

            <div class="menu-bar">
                <ul>
                    <li class="adminpage.html"><a href="#">HOME</a></li>
                    <li><a href="#"><i class="fa fa-home"></i>ABOUT</a>
                        <div class="submenu">
                            <ul>
                                <li><a href="#">OUR TEAM</a></li>
                                <li><a href="#">COLLECTING FUNDS</a></li>
                            </ul>
                        </div>
                    </li>
                    <li><a href="#"><i class="fa fa-home"></i>ACTIVITIES</a>
                        <div class="submenu">
                            <ul>
                                <li><a href="#">Donate For Ashrams</a></li>
                                <li><a href="#">Donate For Who are Effected by Natural Calamities</a></li>
                                <li><a href="#">Donate For Medical Emergencies</a></li>
                            </ul>
                        </div>
                    </li>
                    <li><a href="#"><i class="fa fa-phone"></i>CONTACT</a>
                        <div class="submenu">
                            <ul>
                                <li><a href="#">Map</a></li>
                                <li><a href="#">Contact Number</a></li>
                            </ul>
                        </div>
                    </li>
                    <li><a href="logout.php">LOGOUT</a></li>
                </ul>
            </div>
        </div>
        <div class="container">
            <div class="description">
                <p>Donating to the causes you care about not only benefits the charities themselves, it can be deeply rewarding for you too. Millions of people give to charity on a regular basis to support causes they believe in, as well as for the positive effect it has on their own lives.</p>
                <p>We all need a helping hand from time to time. It is often our communities that support us in those hard times, and now it is our turn to support them, as the rewards of pitching in and helping those in need can be one of the most enriching feelings in life – worth much more than money.</p>
            </div>
            <div class="events">
                <h1 style="color: green; text-align:center;">Trending Fundraising Events</h1>
            </div>
            <div class="Natural-Calamities">
                <h2 style="color: #3234a8;font-size:30px;margin: top 10px;">Natural Calamities</h2>
                <div class="fd-events">
                    <div class="menu-wrapper">
                        <ul class="menu" id="myDIV"> 
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
                                        <form action="delete.php" method="POST">
                                            <input type="hidden" name="id_event" value="<?php echo $rows['id'];?>">
                                            <button type="submit">Delete</button>
                                        </form>
                                    </p>
                                </div>
                            </li>
                            <?php
                                }
                            ?>
                            <div class="paddles">
                                <button class="left-paddle paddle" style="background-color:gray;" onClick="moveLeft()">
                                    <
                                </button>
                                <button class="right-paddle paddle" style="background-color:gray;" onClick="moveRight()">
                                    >
                                </button>
                            </div>
                        </ul>
                        <script>
                            function moveRight() {
                                var element = document.getElementById("myDIV");
                                element.scrollLeft += 400;
                            }
                            function moveLeft() {
                                var element = document.getElementById("myDIV");
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
                        <ul class="menu" id="myDIV">       
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
                                        <form action="delete.php" method="POST">
                                            <input type="hidden" name="id_event" value="<?php echo $rows['id'];?>">
                                            <button type="submit">Delete</button>
                                        </form>
                                    </p>
                                </div>
                            </li>
                            <?php
                                }
                            ?>
                            <div class="paddles">
                                <button class="left-paddle paddle" style="background-color:gray;" onClick="moveLeft()">
                                    <
                                </button>
                                <button class="right-paddle paddle" style="background-color:gray;" onClick="moveRight()">
                                    >
                                </button>
                            </div>
                        </ul>
                        <script>
                            function moveRight() {
                                var element = document.getElementById("myDIV");
                                element.scrollLeft += 400;
                            }
                            function moveLeft() {
                                var element = document.getElementById("myDIV");
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
                        <ul class="menu" id="myDIV">
                            <?php
                                while($rows=$resultashr->fetch_assoc())
                                {
                            ?>
                            <li class="item">
                                <div class="card">
                                    <a href="#">
                                        <img src="Ashram pic.jpeg" alt="John" style="width:100%;height:113px">
                                        <h1><?php echo $rows['title'];?></h1>
                                        <p class="title"><?php echo $rows['description'];?></p>
                                        <label for="file"><?php echo $rows['receivedamount'].' of '.$rows['totalamount'].' received';?></label><br>
                                        <?php echo '<progress id="file" value="'.$rows['receivedamount'].'" max="'.$rows['totalamount'].'"?>></progress>'?>
                                    </a>
                                    <p>
                                        <form action="delete.php" method="POST">
                                            <input type="hidden" name="id_event" value="<?php echo $rows['id'];?>">
                                            <button type="submit">Delete</button>
                                        </form>
                                    </p>
                                </div>
                            </li>
                            <?php
                                }
                            ?>
                            <div class="paddles">
                                <button class="left-paddle paddle" style="background-color:gray;" onClick="moveLeft()">
                                    <
                                </button>
                                <button class="right-paddle paddle" style="background-color:gray;" onClick="moveRight()">
                                    >
                                </button>
                            </div>
                        </ul>
                        <script>
                            function moveRight() {
                                var element = document.getElementById("myDIV");
                                element.scrollLeft += 400;
                            }
                            function moveLeft() {
                                var element = document.getElementById("myDIV");
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