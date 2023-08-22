
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
            <!-- <div id="search">
                <input type="text" placeholder="search">
                <span id="search_icon"><ion-icon name="search-outline"></ion-icon></span>
            </div> -->

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
                        <li id="log_out" ><a href="logout.php">Log out <span><ion-icon name="exit-outline"></ion-icon></span></a></li>
                      </ul>
                    </span>
                  </div>


            </div>



        </div>


        <div id="dash_board_menu">

            
            <div><a href="user_dashboard.php"><ion-icon name="home-outline"></ion-icon> <span>home</span></a></div>
            <div><a href="project_form.php""><ion-icon name="create-outline"></ion-icon> <span>Ethics form <span></span></a></div>
            <div><a href="ethic_form.php" > <ion-icon name="receipt-outline"></ion-icon> <span>Project form
                    </span></a></div>
            <div><a href=""> <ion-icon name="analytics-outline"></ion-icon><span>App status </span></a></div>
        </div>


        <div id="midle_section_contenair_user">


            <h2> Description of form</h2>
            <div id="Description">

                <button class="accordion">Ethics Application form</button>
                <div id="ethic_descrption" class="panel">

                    <p> Lorem ipsum dolor sit amet, consectetur adipisicing elit. Cupiditate repellat reiciendis
                        consequuntur ullam voluptatem nobis amet debitis distinctio adipisci, quisquam illum quae
                        dignissimos officiis, dolores non laborum perspiciatis asperiores perferendis!
                        Distinctio cumque ipsam consequuntur rem quo accusantium, qui odit quaerat incidunt, reiciendis
                        animi totam, delectus est natus eum molestias ea commodi labore! Aut delectus sint quae ducimus
                        velit deserunt eius.
                        Eaque illum tenetur ex non! Voluptas aliquam assumenda culpa consequatur officiis praesentium,
                        accusamus dolorem incidunt deserunt unde, amet doloremque! Accusamus ducimus sint cum
                        praesentium dolorem, molestiae dolore optio qui. Eveniet.
                        Minus quam debitis nemo consequuntur in nihil molestiae, laudantium eveniet. Iusto ipsum nam est
                        maxime hic aspernatur neque impedit ex maiores architecto sint, ab, reprehenderit fugiat
                        voluptas animi! Consectetur, iure.
                        Animi, amet rem. Laudantium, sed exercitationem. Doloribus iusto vitae laborum, doloremque
                        perferendis natus harum ex suscipit voluptates nemo animi recusandae consequuntur earum ut optio
                        sapiente impedit totam nostrum molestiae. Accusantium!
                        Error aperiam doloribus dignissimos adipisci blanditiis, architecto ab neque doloremque, ullam
                        officia voluptates necessitatibus veniam quas magnam. Adipisci laborum ad quaerat nobis ipsum
                        delectus dolorem eos? Vero deleniti dolor laboriosam.</p>

                </div>
                <button class="accordion"> Project Application form</button>
                <div id="projec_description" class="panel">
                    <p> Lorem ipsum dolor sit amet, consectetur adipisicing elit. Cupiditate repellat reiciendis
                        consequuntur ullam voluptatem nobis amet debitis distinctio adipisci, quisquam illum quae
                        dignissimos officiis, dolores non laborum perspiciatis asperiores perferendis!
                        Distinctio cumque ipsam consequuntur rem quo accusantium, qui odit quaerat incidunt, reiciendis
                        animi totam, delectus est natus eum molestias ea commodi labore! Aut delectus sint quae ducimus
                        velit deserunt eius.
                        Eaque illum tenetur ex non! Voluptas aliquam assumenda culpa consequatur officiis praesentium,
                        accusamus dolorem incidunt deserunt unde, amet doloremque! Accusamus ducimus sint cum
                        praesentium dolorem, molestiae dolore optio qui. Eveniet.
                        Minus quam debitis nemo consequuntur in nihil molestiae, laudantium eveniet. Iusto ipsum nam est
                        maxime hic aspernatur neque impedit ex maiores architecto sint, ab, reprehenderit fugiat
                        voluptas animi! Consectetur, iure.
                        Animi, amet rem. Laudantium, sed exercitationem. Doloribus iusto vitae laborum, doloremque
                        perferendis natus harum ex suscipit voluptates nemo animi recusandae consequuntur earum ut optio
                        sapiente impedit totam nostrum molestiae. Accusantium!
                        Error aperiam doloribus dignissimos adipisci blanditiis, architecto ab neque doloremque, ullam
                        officia voluptates necessitatibus veniam quas magnam. Adipisci laborum ad quaerat nobis ipsum
                        delectus dolorem eos? Vero deleniti dolor laboriosam.</p>
                </div>
                <button class="accordion"> Application status</button>
                <div id="appstatus_description" class="panel">

                    <p> Lorem ipsum dolor sit amet, consectetur adipisicing elit. Cupiditate repellat reiciendis
                        consequuntur ullam voluptatem nobis amet debitis distinctio adipisci, quisquam illum quae
                        dignissimos officiis, dolores non laborum perspiciatis asperiores perferendis!
                        Distinctio cumque ipsam consequuntur rem quo accusantium, qui odit quaerat incidunt, reiciendis
                        animi totam, delectus est natus eum molestias ea commodi labore! Aut delectus sint quae ducimus
                        velit deserunt eius.
                        Eaque illum tenetur ex non! Voluptas aliquam assumenda culpa consequatur officiis praesentium,
                        accusamus dolorem incidunt deserunt unde, amet doloremque! Accusamus ducimus sint cum
                        praesentium dolorem, molestiae dolore optio qui. Eveniet.
                        Minus quam debitis nemo consequuntur in nihil molestiae, laudantium eveniet. Iusto ipsum nam est
                        maxime hic aspernatur neque impedit ex maiores architecto sint, ab, reprehenderit fugiat
                        voluptas animi! Consectetur, iure.
                        Animi, amet rem. Laudantium, sed exercitationem. Doloribus iusto vitae laborum, doloremque
                        perferendis natus harum ex suscipit voluptates nemo animi recusandae consequuntur earum ut optio
                        sapiente impedit totam nostrum molestiae. Accusantium!
                        Error aperiam doloribus dignissimos adipisci blanditiis, architecto ab neque doloremque, ullam
                        officia voluptates necessitatibus veniam quas magnam. Adipisci laborum ad quaerat nobis ipsum
                        delectus dolorem eos? Vero deleniti dolor laboriosam.</p>
                </div>

            </div>




        </div>

    </div>

   
    <Script src="../js/app.js">

    </Script>
   
</body>

</html>