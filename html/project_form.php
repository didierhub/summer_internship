<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>

</body>

</html>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="../css/project.css">

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
                <span id="notification"> <ion-icon name="notifications-outline"></ion-icon></span>
                <span id="profile"> </span>


            </div>



        </div>


        <div id="dash_board_menu">

            <h2><ion-icon name="grid-outline"></ion-icon>dashboard</h2>
            <div><a href="user_dashboard.php"><ion-icon name="home-outline"></ion-icon> <span>home</span></a></div>
            <div><a href="ethic_form.php"><ion-icon name="create-outline"></ion-icon> <span>Project form
                        <span></span></a></div>
            <div><a href="project_form.php"> <ion-icon name="receipt-outline"></ion-icon> <span>Ethics form
                    </span></a></div>
            <div><a href="appt_status.php"> <ion-icon name="analytics-outline"></ion-icon><span>App status </span></a></div>
        </div>



        <div id="midle_section_contenair_user">
            
    <div id="main_contenair">
      


        <div id="derscription">
            <h1> FINAL INTERNATIONAL UNIVERSITY</h1>
            <h2> ETHICS COMMITTE APPLICATION</h2>
            <P class="p_description">
                Studies conducted in Final International University (FIU) and/or studies conducted by FIU
                personnel/students, which involve collecting data from human participants, are subject to review by the
                FIU Ethics Committee (EC). Applicants should submit this application form to the FIU EC along with
                the other required documents (see the Application Check List). Approval of the EC is required before the
                start of data collection from human participant
            </P>



        </div>



        <form action="" id="form_contenair">

            <div id="first_block" class="block">
                <h1> 1. Title of study</h1>
                <input type="text">
            </div>


            <div id="second_block" class="block">

                <h1> 2. Title of study</h1>

                <section id="second_block_radio">


                    <div id="second_block_radio_input">
                        <label for="academic">Academic staff study</label><br>
                        <input type="radio" id="academic" name="fav_language" value="HTML">
                        <label for="doctor">Doctor Thesis</label><br>
                         <input type="radio" id="doctor" name="fav_language" value="CSS">
                        <label for="muster">muster thesis</label>
                         <input type="radio" id="muster" name="fav_language" value="JavaScript">
                         <label for="other">other (specify)</label>
                         <input type="radio" id="other_radio" name="fav_language" value="JavaScript" class="other_inpu">

                    </div>

                    <div id="specify_input">
                        <input type="text" id="specify">
                    </div>

                </section>


            </div>

            <div id="third_block" class="block">

                <h1> 3.Research</h1>
                <div class="resarcher_block">
                    <p>Name & surname</p>
                    <input type="text">
                </div>

                <div class="resarcher_block">
                    <p>Departement</p>
                    <input type="text">
                </div>

                <div class="resarcher_block">
                    <p> Institute</p>
                    <input type="text">
                </div>

                <div class="resarcher_block">
                    <p>Phone</p>
                    <input type="number">
                </div>

                <div class="resarcher_block">

                    <p> address</p>
                    <textarea id="w3review" name="w3review" rows="6" cols="50">
                                </textarea>
                </div>

                <div class="resarcher_block" id="email">
                    <p>email</p>
                    <input type="text">
                </div>


            </div>

            <div id="forth_block" class="block_box" class="block">
                <h1>4. other research(if any)</h1>

                <div class="forth_block_side">

                    <h3> Name & surname</h3>

                    <div class="input_block" class="new_fild_added">

                        <input type="text">
                        <input type="text">
                        <input type="text">
                        <input type="text">

                    </div>

                </div>
                <div class="forth_block_side">
                    <h3>Institute</h3>

                    <div class="input_block" class="new_fild_added">

                        <input type="text" class="survey_options" name="survey_option">
                        <input type="text" class="survey_options" name="survey_option">
                        <input type="text" class="survey_options" name="survey_option">
                        <input type="text" class="survey_options" name="survey_option">

                    </div>

                </div>
              

            </div>


            <div id="fith_5_block" class="block_box" class="block" >
                <h1> 5. Advisor’s/Supervising Faculty Member’s (Undergraduate students conducting research must have an
                    academic advisor/instructor supervising their research):
                </h1>

                <div class="forth_block_side">
                    <div class="fith_block_input">
                        <p>Title</p>
                        <select name="title" id="">
                            <option value="prof.Dr"></option>
                            <option value=""></option>
                            <option value=""></option>
                            <option value=""></option>
                            <option value=""></option>
                        </select>

                    </div>

                    <div class="fith_block_input">
                        <p>Departement</p>
                        <input type="text">

                    </div>

                    <div class="fith_block_input">
                        <p> Institute</p>
                        <input type="text">
                    </div>


                </div>


                <div class="forth_block_side">

                    <div class="fith_block_input">
                        <p>Name & surname</p>
                        <input type="text">
                    </div>

                    <div class="fith_block_input">
                        <p>Departement</p>
                        <input type="text">
                    </div>

                    <div class="fith_block_input">
                        <p> Institute</p>
                        <input type="text">
                    </div>



                </div>


            </div>

            <div id="six_6_block" class="block_box" >
                <h1>
                    6. Excepted time frame for the study
                </h1>

                <div class="forth_block_side">

                    <div class="fith_block_input">
                        <p>star:</p>
                        <input type="datetime-local">
                    </div>

                </div>

                <div class="forth_block_side">
                    <div class="fith_block_input">
                        <p>End:</p>
                        <input type="datetime-local">
                    </div>

                </div>


            </div>


            <div id="seventh_7_block" class="block_box" class="block" >
                <h1> 7.Advisor’s/Supervising Faculty Member’s (Undergraduate students conducting research must have an
                    academic advisor/instructor supervising their research):
                </h1>

                <div class="forth_block_side">

                    <div class="seventh_block_input">
                        <p>a.</p>
                        <input type="text">

                    </div>


                    <div class="seventh_block_input">
                        <p>c.</p>
                        <input type="text">

                    </div>

                    <div class="seventh_block_input">
                        <p> e.</p>
                        <input type="text">
                    </div>


                    <div class="seventh_block_input">
                        <p>g.</p>
                        <input type="text">
                    </div>


                </div>


                <div class="seventh_block_side">

                    <div class="seventh_block_input">
                        <p>b.</p>
                        <input type="text">
                    </div>

                    <div class="seventh_block_input">
                        <p>d.</p>
                        <input type="text">
                    </div>

                    <div class="seventh_block_input">
                        <p> f.</p>
                        <input type="text">
                    </div>
                    <div class="seventh_block_input">
                        <p> h.</p>
                        <input type="text">
                    </div>



                </div>


            </div>



            <div id="second_block" class="block">

                <h1> 8.Is the approval/permission of an institution or
                    organization other than IFU required for data
                    collection?
                </h1>

                <section id="second_block_radio">


                    <div id="second_block_radio_input">
                        <label for="academic">No</label><br>
                        <input type="radio" id="academic" name="fav_language" value="HTML">
                        <label for="doctor">yes(specify)</label><br>
                         <input type="radio" id="doctor" name="fav_language" value="CSS">


                    </div>

                    <div id="specify_input">
                        <input type="text" id="specify">
                    </div>

                </section>


            </div>







        </form>

    </div>


        </div>

    </div>

    <script src="form.js"></script>
</body>

</html>

</html>