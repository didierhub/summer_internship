<?php
 require_once 'midleware.php'; 
 include('db_connection.php');

 // Get the logged-in user's ID
 $loggedInUserId = getLoggedInUserId();
 
 // Get the user's full name using the ID
 $userFullName = getUserFullName($loggedInUserId);
 

 ?>

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


            <div id="log_out_notification_contenair">
                <span id="message"> <ion-icon name="chatbox-ellipses-outline"></ion-icon>
                    <span id="notification"> <ion-icon name="notifications-outline"></ion-icon></span>

                    <span>
                        <?php echo $userFullName; ?>
                    </span>
                    <span id="profile"> <img src="../image/profile.jpg" alt=""></span>

                    <div class="dropdown-container">
                        <span id="care_down">
                            <ion-icon name="caret-down-outline" id="care_down_icon"></ion-icon>
                            <ion-icon name="caret-up-outline" id="care_up_icon"></ion-icon>

                            <ul id="dropdown-content">
                                <li>Edit profile</li>
                                <li id="log_out"><a href="logout.php">Log Out <span><ion-icon
                                                name="exit-outline"></ion-icon></span></a></li>
                            </ul>
                        </span>
                    </div>


            </div>


        </div>


        <div id="dash_board_menu">


            <div><a href="user_dashboard.php"><ion-icon name="home-outline"></ion-icon> <span>home</span></a></div>
            <div><a href="ethic_form.php"><ion-icon name="create-outline"></ion-icon> <span>Project form
                        <span></span></a></div>
            <div><a href="project_form.php"> <ion-icon name="receipt-outline"></ion-icon> <span>Ethics form
                    </span></a></div>
            <div><a href="appt_status.php"> <ion-icon name="analytics-outline"></ion-icon><span>App status </span></a>
            </div>
        </div>



        <div id="midle_section_contenair_user">

            <div id="main_contenair">



                <div id="derscription">
                    <h1> FINAL INTERNATIONAL UNIVERSITY</h1>
                    <h2> ETHICS COMMITTE APPLICATION</h2>
                    <P class="p_description">
                        Studies conducted in Final International University (FIU) and/or studies conducted by FIU
                        personnel/students, which involve collecting data from human participants, are subject to review
                        by the
                        FIU Ethics Committee (EC). Applicants should submit this application form to the FIU EC along
                        with
                        the other required documents (see the Application Check List). Approval of the EC is required
                        before the
                        start of data collection from human participant
                    </P>



                </div>



                <form action="project_form.php " id="form_contenair" method="post">

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
                                 <input type="radio" id="other_radio" name="fav_language" value="JavaScript"
                                    class="other_inpu">

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


                    <div id="fith_5_block" class="block_box" class="block">
                        <h1> 5. Advisor’s/Supervising Faculty Member’s (Undergraduate students conducting research must
                            have an
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

                    <div id="six_6_block" class="block_box">
                        <h1>
                            6. Excepted time frame for the study
                        </h1>

                        <div class="forth_block_side">

                            <div class="fith_block_input">
                                <p>star:</p>
                                <input type="date" id="starting_date">
                            </div>

                        </div>

                        <div class="forth_block_side">
                            <div class="fith_block_input">
                                <p>End:</p>
                                <input type="date" id="Ending_Date">
                            </div>

                        </div>


                    </div>


                    <div id="seventh_7_block" class="block_box" class="block">
                        <h1> 7.Advisor’s/Supervising Faculty Member’s (Undergraduate students conducting research must
                            have an
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
                                <input type="text">
                            </div>

                        </section>


                    </div>

                    <div id="block_9" class="block">
                        <div class="row_block_9">
                            <h1>9. Whether the project is supported/funded or not:</h1>
                            <div id="supported_or_not">
                                <div id="suppoted"><label for="suport">Supported</label><input type="radio" name=""
                                        id="suport"></div>
                                <div id="NOt-suppoted"><label for="not-support">NOt-Supported</label><input type="radio"
                                        name="" id="not-support">
                                </div>
                            </div>
                        </div>
                        <div class="row_block_9">
                            <li>If supported, specify institution:</li>
                            <li>University <input type="radio" value="University"></li>
                            <li>TUBITAK <input type="radio" value="TUBITAK"></li>
                        </div>
                        <div class="row_block_9">
                            <div id="International">
                                <li>University <input type="radio" value="University"></li><input type="text">
                            </div>
                            <div id="block_9other">
                                <li>University <input type="radio" value="University"></li> <input type="text">
                            </div>
                        </div>
                        <div class="row_block_9">
                            <p>Will the ethical approval be used for a project submission (TUBITAK, EU projects etc.)?
                                <span>yes<input type="radio" name="" id=""></span><span>no<input type="radio" name=""
                                        id=""></span>
                            </p>
                        </div>

                    </div>
                    <div id="block_10" class="block">
                       
                            <h1>10. Status of the application:</h1>
                       

                        <div class="row_block_10">
                            <li> New<input type="radio" name="" id=""></li>
                            <li> Revised<input type="radio" name="" id=""></li>
                            <li> Extension of a Previous Study<input type="radio" name="" id=""></li>
                            <li>Reporting changes<input type="radio" name="" id=""></li>

                        </div>
                        <p style="text-align: start;">If this application is a request for the extension of a previous
                            study,</p>
                        <div class="row_block_10 row_block_10_border">


                            <div>Protocol No (this is on your approval letter): <input type="text"> </div>
                            <div> The new expected date of completion: <input type="text"> </div>
                            <p> If this is an extension of a previous project, does the current study show any
                                differences from the previously
                                approved one? <span>yes<input type="radio" name="" id=""></span><span>no<input
                                        type="radio" name="" id=""></span></p>
                            <p>If yes, please complete the box below (reporting changes)
                            </p>

                        </div>
                        <div class="row_block_10 row_block_10_border">
                            <div>Protokol No: <input type="text"> </div>
                            <p> Please explain the changes you want to make (e.g., adding a new researcher to the
                                research team, adding a
                                new measure, adding a new study similar to your approved study) in a simple language so
                                that people with
                                no expertise in the field can understand (two parahraphs maximum). If, your change(s)
                                will be new informed
                                consent form, debriefing form, etc., submit these forms together with the revised
                                application to the Ethics
                                Committee.</p>
                            <textarea name="" id="" cols="120" rows="10"></textarea>
                            <p>
                                Is the reason for the proposed changes an unexpected situation that happens to a
                                participant in the study
                                (e.g., an event that could harm the participant’s psychological or physical health)?
                                <span>yes<input type="radio" name="" id=""></span><span>no<input type="radio" name=""
                                        id=""></span>
                            </p>
                            <p>If your answer is yes; describe the unexpected situation that requires you to make
                                changes. P</p>

                            <textarea name="" id="" cols="120" rows="10"></textarea>


                        </div>
                        <h1 style="color: red;"> THE FOLLOWING QUESTIONS SHOULD ONLY BE ANSWERED IF THE APPLICATION IS
                            NEW OR REVISED (see item 10.)
                            </h1>
                        <div id="block_11"class="block">
                            <h1> 11. Please explain the purpose of your study and the research question you are trying to answer with this study.
                                Write it in a simple language so that people without expertise in the field can understand (maximum of twoparagraphs).</h1>
                            <div class="row_block_11">
                               
                                    <textarea name="" id="" cols="140" rows="10"></textarea>
                            </div>
                        </div>
                        <div id="block_12" class="block">
                            <h1> 12. Please explain the purpose of your study and the research question you are trying to answer with this study.
                                Write it in a simple language so that people without expertise in the field can understand (maximum of twoparagraphs).</h1>
                            <div class="row_block_12">
                               
                                    <textarea name="" id="" cols="140" rows="10"></textarea>
                            </div>
                        </div>
                        <div id="block_13" class="block">
                            <h1>13. Does the study aim to partially/completely provide the participants with incorrect information in any way. Is
                                there deception? Does the study require secrecy? </h1>
                                  
                        </div>

                        <div id="block_14" class="block">
                            <h1> 14. Please explain the purpose of your study and the research question you are trying to answer with this study.
                                Write it in a simple language so that people without expertise in the field can understand (maximum of twoparagraphs).</h1>
                            <div class="row_block_14">
                               <p>If your answer is yes; what negative effects does your work have on the physical and/or mental health of
                                the participants? Please explain in detail. Please write down the measures taken in order to eliminate or
                                minimize the effects of these elements.</p>
                                    <textarea name="" id="" cols="140" rows="10"></textarea>
                            </div>
                        </div>
                    </div>







                </form>

            </div>


        </div>

    </div>

    <script src="form.js"></script>
    <Script src="../js/app.js"></Script>
    <script>
        // Get the starting and ending date input elements
        var startingDateInput = document.getElementById("starting_date");
        var endingDateInput = document.getElementById("Ending_Date");

        // Add an input event listener to the ending date input
        endingDateInput.addEventListener("input", function () {
            // Parse the date values from the input elements
            var startingDate = new Date(startingDateInput.value);
            var endingDate = new Date(endingDateInput.value);

            // Check if the ending date is less than or equal to the starting date
            if (endingDate <= startingDate) {
                // Display an error message or perform any other validation action
                alert("Ending date must be greater than the starting date.");
                // You can also clear the ending date input field
                endingDateInput.value = "";
            }
        });

    </script>
</body>

</html>

</html>