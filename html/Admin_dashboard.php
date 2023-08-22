<?php
 require_once 'midleware.php'; 
 include('db_connection.php');

 // Get the logged-in user's ID
 $loggedInUserId = getLoggedInUserId();
 
 // Get the user's full name using the ID
 $userFullName = getUserFullName($loggedInUserId);
 

 ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="../css/main_dashboard.css">

    <title>Document</title>
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
    
</head>

<body>


    <div id="main_wrapper">


        <div id="header_contenair">
            <div id="logo">
                <img src="../image/ufulogoen4.png" alt="">
                

            </div>
            <div id="search">
                <input type="text" placeholder="search">
                <span id="search_icon"><ion-icon name="search-outline"></ion-icon></span>
            </div>
            <div id="log_out_notification_contenair">
               <span id="message"> <ion-icon name="chatbox-ellipses-outline"></ion-icon>
                <span id="notification"> <ion-icon name="notifications-outline"></ion-icon></span>
                
                <span><?php echo $userFullName; ?></span>
                <span id="profile"><img src="../image/profile.jpg" alt=""> </span>

                <div class="dropdown-container">
                    <span id="care_down" >
                      <ion-icon name="caret-down-outline" id="care_down_icon" ></ion-icon>
                      <ion-icon name="caret-up-outline" id="care_up_icon"></ion-icon>

                      <ul id="dropdown-content" >
                        <li>Edit profile</li>
                        <li id="log_out" ><a href="logout.php">Log Out<span><ion-icon name="exit-outline"></ion-icon></span></a></li>
                      </ul>
                    </span>
                  </div>


            </div>



        </div>


        <div id="dash_board_menu">

            
            <div><a href="Admin_dashboard.php"><ion-icon name="home-outline"></ion-icon> <span>home</span></a></div>
            <div><a href="ethic_form.php"><ion-icon name="create-outline"></ion-icon> <span>Ethics form <span></span></a></div>
            <div><a href="project_form.php"> <ion-icon name="receipt-outline"></ion-icon> <span>Project form </span></a></div>
            
        </div>


        <div id="midle_section_contenair">


            <div id="midle_section_contenair_box">
                <div class="midle_section_box"> <span class="status_name"> new request  <ion-icon name="git-pull-request-outline"></ion-icon></span> <span class="count">
                        0</span></div>
                        <div class="midle_section_box"> <span class="status_name"> Awaiting request  <ion-icon name="git-pull-request-outline"></ion-icon></span> <span class="count">
                        0</span></div>
                <div class="midle_section_box"><span class="status_name"> approved <ion-icon name="checkmark-circle-outline"></ion-icon></span> <span class="count"> 0</span>
                </div>
            </div>

            <div id="status_table">
                <div id="status_table_hearder">
                    <h2 >recent forms</h2>
                    <div id="view_all">
                        <button type="button">view all</button>

                    </div>
                </div>

                <div id="form_row_column">
                     <div id="form_row_header">
                     </div>
                    <div id="project_form_row"></div>
                    <div id="ethics_form_row"></div>

                </div>

            </div>




        </div>

    </div>

    <Script src="../js/app.js">

</Script>
</body>

</html>