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
                <img src="/image/ufulogoen4.png" alt="">
                

            </div>
            <div id="search">
                <input type="text" placeholder="search">
                <span id="search_icon"><ion-icon name="search-outline"></ion-icon></span>
            </div>

            <div id="log_out_notification_contenair">
                <span id="notification"> <ion-icon name="notifications-outline"></ion-icon></span>
                <span id="profile"> </span>


            </div>



        </div>


        <div id="dash_board_menu">

            <h2><ion-icon name="grid-outline"></ion-icon>dashboard</h2>
            <div><a href="Admin_dashboard.html"><ion-icon name="home-outline"></ion-icon> <span>home</span></a></div>
            <div><a href="ethic_form.html"><ion-icon name="create-outline"></ion-icon> <span>Ethics form <span></span></a></div>
            <div><a href="project_form.html"> <ion-icon name="receipt-outline"></ion-icon> <span>Project form </span></a></div>
            
        </div>


        <div id="midle_section_contenair">


            <div id="midle_section_contenair_box">
                <div class="midle_section_box"> <span class="status_name"> new request  <ion-icon name="git-pull-request-outline"></ion-icon></span> <span class="count">
                        0</span></div>
                <div class="midle_section_box"> <span class="status_name">awating request<ion-icon name="aperture-outline"></ion-icon></span> <span class="count">
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


</body>

</html>