<?php
   include('notification_header_info.php'); // Include your database connection script
 $counts = include 'counting_appove_reject_pending.php'; // Include the PHP scrip

//  // Get the logged-in user's ID
//  $loggedInUserId = getLoggedInUserId();
 
//  // Get the user's full name using the ID
//  $userFullName = getUserFullName($loggedInUserId);
 

 ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="../css/admin_appt_fetch.css">

    <title>Document</title>
<!-- 
    link for json -->

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <!-- iconic_formivon -->
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
                <span id="notification"> <span class="form_count"><?php echo $formCount ?></span> <ion-icon name="notifications-outline"></ion-icon></span>
                
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
                <div class="midle_section_box"> <span class="status_name"> new request  <ion-icon name="git-pull-request-outline"></ion-icon></span>
                 <span class="count">
                 <?php echo $counts['pending']; ?></span></div>
                        <div class="midle_section_box"> <span class="status_name"> Reject  <ion-icon name="git-pull-request-outline"></ion-icon></span> <span class="count">  <?php echo $counts['rejected']; ?>
                        </span></div>
                <div class="midle_section_box"><span class="status_name"> approved <ion-icon name="checkmark-circle-outline"></ion-icon></span> <span class="count"><?php echo $counts['approved']; ?></span>
                </div>
            </div>

            <div id="status_table">
                <div id="status_table_hearder">
                    <h2 >recent forms</h2>
                    <div id="view_all">
                        <button type="button">view all</button>

                    </div>


                </div>

                <div id="form_row">
                    <div id="forme_decription">
                        <div class="col"><span>Form Id</span></div>
                        <div class="col"><span>Form Type</span></div>
                        <div class="col"><span>Form Status</span></div>
                        <div class="col"><span>submission Date</span></div>
                    </div>
                <div id="dynamic_row_contenmair">

                </div>
                   

                    
                </div>

            </div>




        </div>

    </div>

    <script>
    $(document).ready(function() {
        // Fetch and display submitted forms
        function fetchSubmittedForms() {
            $.ajax({
                url: 'fetch_submitted_forms.php', // Replace with actual PHP script
                method: 'GET',
                dataType: 'html',
                success: function(data) {
                    $("#dynamic_row_contenmair").html(data); // Replace the form list content
                },
                error: function(jqXHR, textStatus, errorThrown) {
                    console.error("AJAX Error:", errorThrown);
                }
            });
        }

        // Fetch submitted forms initially and then every X seconds
        fetchSubmittedForms();
        setInterval(fetchSubmittedForms, 3000); // Refresh every 5 seconds
    });
    </script>

    <Script src="../js/app.js">


</Script>
</body>

</html>