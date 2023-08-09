<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="../css/appt_status.css">
      
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
            

            <div id="log_out_notification_contenair">
               <span id="message"> <ion-icon name="chatbox-ellipses-outline"></ion-icon>
                <span id="notification"> <ion-icon name="notifications-outline"></ion-icon></span>
                

                <span id="profile"> <img src="../image/profile.jpg" alt=""></span>

                <div class="dropdown-container">
                    <span id="care_down" >
                      <ion-icon name="caret-down-outline" id="care_down_icon" ></ion-icon>
                      <ion-icon name="caret-up-outline" id="care_up_icon"></ion-icon>

                      <ul id="dropdown-content" >
                        <li>Edit profile</li>
                        <li id="log_out" ><a href="logout.php">Log Out <span><ion-icon name="exit-outline"></ion-icon></span></a></li>
                      </ul>
                    </span>
                  </div>


            </div>



        </div>


        <div id="dash_board_menu">

          
            <div><a href="Admin_dashboard.php"><ion-icon name="home-outline"></ion-icon> <span>home</span></a></div>
            <div><a href="ethic_form.php"><ion-icon name="create-outline"></ion-icon> <span>Ethics form <span></span></a></div>
            <div><a href="project_form.php"> <ion-icon name="receipt-outline"></ion-icon> <span>Project form </span></a></div>
            <div><a href="appt_status.php"> <ion-icon name="analytics-outline"></ion-icon><span>App status </span></a></div>
        </div>


        <div id="midle_section_contenair">


            <div id="status_table">
                <div id="status_table_hearder">
                  
                    <div class="table_col">
                     
                        <h3>App No</h3>

                    </div>
                    <div class="table_col">
                      <h3>Application type</h3>
                    
                    </div>
                    <div class="table_col">
                     <h3>Status</h3>

                    </div>
                    <div class="table_col">
                         <h3>Comment</h3> 
                    </div>
                    <div class="table_col">
                        <button type="button">edit/delete</button>
                        

                    </div>
                    


                </div>
                <div id="status_main_section">
                    <div  class="sub_table_col  first-of-type">
                      <ol>
                        <li>20230701</li>
                      </ol>
   
                       </div> <div class="sub_table_col">
                       <ul>
                        <li>Ethics App</li>
                        <li>project App</li>
                       </ul>
   
                       </div> <div class="sub_table_col">
                       <ul>
                        <li>new</li>
                        <!-- <li>revesion</li>
                        <li> pending</li>
                        <li>approval</li>
                        <li>extention</li>
                        <li>modification</li> -->
                       </ul>
                       </div> <div class="sub_table_col">
                        <h3>good work</h3>
   
                       </div> <div class="sub_table_col" id="edit_box">
                       <button id="edit"> edit</button>
                       <button id="delete"> delete</button>
   
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