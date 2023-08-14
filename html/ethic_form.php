
<?php

// ini_set('display_errors', 1);
// ini_set('display_startup_errors', 1);
// error_reporting(E_ALL);

session_start(); // Start the session

// Include the database connection file
include 'db_connection.php';

if (isset($_SESSION['user_id'])) {
    // Include the database connection file
    $userId = $_SESSION['user_id'];

    $query = "SELECT first_name, last_name FROM users WHERE id = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("i", $userId);
    $stmt->execute();
    $stmt->bind_result($first_name, $last_name);
    $stmt->fetch();
    $stmt->close();

  
}


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve user ID from session
    $user_id = $_SESSION["user_id"];

    // Generate the primary key value (combination of year, month, and auto-increment)
    $year = date("Y");
    $month = date("m");
    
    // Check if the primary key already exists in the table to ensure it's unique
    $check_query = "SELECT * FROM form_ethics WHERE primary_key_column = '$year$month'";
    $check_result = $conn->query($check_query);
    
    $incremental = 1;
    while ($check_result->num_rows > 0) {
        $incremental++;
        $check_query = "SELECT * FROM form_ethics WHERE primary_key_column = '$year$month$incremental'";
        $check_result = $conn->query($check_query);
    }

    $primary_key = $year . $month . $incremental;
    
    // Retrieve form data from POST variables
    $question1 = $_POST["question1"];
    $question2 = $_POST["question2"];
    $question3 = $_POST["question3"];
    $question4 = $_POST["question4"];
    $question5 = $_POST["question5"];
    $question6 = $_POST["question6"];
    $question7 = $_POST["question7"];
    // ... (Retrieve other form data)

    // Handle researcher's name and signature
    $researcher_name = $_POST["researcher_name"];
    $researcher_signature = "researcher_signature_placeholder"; // Set a placeholder value for now
    if (isset($_POST["researcher_signature"])) {
        $researcher_signature = saveSignatureImage($_POST["researcher_signature"], $primary_key . "_researcher");
    }

    // Handle supervisor's name and signature
    $supervisor_name = $_POST["supervisor_name"];
    $supervisor_signature = "supervisor_signature_placeholder"; // Set a placeholder value for now
    if (isset($_POST["supervisor_signature"])) {
        $supervisor_signature = saveSignatureImage($_POST["supervisor_signature"], $primary_key . "_supervisor");
    }

    // Insert data into the form_ethics table
    $insert_query = "INSERT INTO form_ethics (primary_key_column, user_id, question1, question2,question3,question4,question5,question6,question7, researcher_name, researcher_signature, supervisor_name, supervisor_signature) 
    VALUES ('$primary_key', '$user_id', '$question1', '$question2', '$question3', '$question4','$question5', '$question6','$question7','$researcher_name', '$researcher_signature', '$supervisor_name', '$supervisor_signature')";

    if ($conn->query($insert_query) === TRUE) {
        // Data inserted successfully
        // Redirect to a success page or perform any other necessary actions
        header("Location: appt_status.php");
    } else {
        // Error occurred during insertion
        echo "Error: " . $insert_query . "<br>" . $conn->error;
    }
}

// Close the connection
$conn->close();

// Function to save signature image and return its path
function saveSignatureImage($signatureData, $fileName) {
    $base64Data = str_replace('data:image/png;base64,', '', $signatureData);
    $imageData = base64_decode($base64Data);
    $imagePath = "signatures/$fileName.png"; // Set the path to save the image
    file_put_contents($imagePath, $imageData);
    return $imagePath;
}

?>




</body>
</html><!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="../css/ethic.css">
   

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
                

                <span id="profile">    <img src="../image/profile.jpg" alt=""></span>

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

            
            <div><a href="user_dashboard.php"><ion-icon name="home-outline"></ion-icon> <span>home</span></a></div>
            <div><a href="ethic_form.php"><ion-icon name="create-outline"></ion-icon> <span>Project form <span></span></a></div>
            <div><a href="project_form.php"> <ion-icon name="receipt-outline"></ion-icon> <span>Ethics form
                    </span></a></div>
            <div><a href="appt_status.php"> <ion-icon name="analytics-outline"></ion-icon><span>App status </span></a></div>
        </div>

        
        <form  id="midle_section_contenair_user" action="ethic_form.php" method="post">

            <h2> ETHICS COMMITTEE PROJECT INFORMATION FORM</h2>
            
            <div class="ethic_form_box">
                <h3> 1. Briefly describe the study to be conducted, including the sub-research questions, and hypotheses if any</h3>
                <div class="text_area_box">
                    <textarea name="question1" id="" cols="30" rows="10">

                    </textarea>
                </div>

            </div>
               
            <div class="ethic_form_box">
                <h3> 2. Explain the data collection plan, specifying the methods, scales, tools, and techniques to be used. (Please
                    hand in a copy of all types of instruments such as scales and questionnaires to be used in the study along
                    with this document.)</h3>
                <div class="text_area_box">
                    <textarea name="question2" id="" cols="30" rows="10">
                        
                    </textarea>
                </div>

            </div>
               
            <div class="ethic_form_box">
                <h3> 3. Write down the expected results of your study.</h3>
                <div class="text_area_box">
                    <textarea name="question3" id="" cols="30" rows="10">
                        
                    </textarea>
                </div>

            </div>
               
            <div class="ethic_form_box">
                <h3> 4. Does your study involve items/procedures that may jeopardize the physical and/or psychological wellbeing
                    of the participants or that may be distressing for them?
                     <div class="yes_or_no_radio">
                        <span>
                        <label for="academic">yes</label><br>
                        <input type="radio" id="academic" name="fav_language" value="HTML">
                       </span>
                       <span>
                        <label for="doctor">no</label><br>
                        <input type="radio" id="doctor" name="fav_language" value="CSS">
                       </span>
                    </div>
                    If yes, please explain. Specify the precautions that will be taken to eliminate or minimize the effects of
                    these items/procedures.</h3>
                <div class="text_area_box">
                    <textarea name="question4" id="" cols="30" rows="10">
                        
                    </textarea>
                </div>

            </div>
               
            <div class="ethic_form_box">
                <h3> 5. Will the participants be kept totally/partially uninformed of the aim of the study (i.e. is there deception)?
                     <div class="yes_or_no_radio">
                    <span>
                    <label for="academic">yes</label><br>
                    <input type="radio" id="academic" name="fav_language" value="HTML">
                   </span>
                   <span>
                    <label for="doctor">no</label><br>
                    <input type="radio" id="doctor" name="fav_language" value="CSS">
                   </span>
                </div>
                    If yes, explain why. Indicate how this will be explained to the participants at the end of the data
                    collection in debriefing the participants.
                    </h3>
                <div class="text_area_box">
                    <textarea name="question5" id="" cols="30" rows="10">
                        
                    </textarea>
                </div>

            </div>
               
            <div class="ethic_form_box">
                <h3> 6. Indicate the potential contributions of the study to your research area and/or the society.
                </h3>
                <div class="text_area_box">
                    <textarea name="question6" id="" cols="30" rows="10">
                        
                    </textarea>
                </div>

            </div>
               
            <div class="ethic_form_box" id="last_textarea">
                <h3> 7. Have you completed any previous research project?  
                     <div class="yes_or_no_radio">
                    <span>
                    <label for="academic">yes</label><br>
                    <input type="radio" id="academic" name="fav_language" value="HTML">
                   </span>
                   <span>
                    <label for="doctor">no</label><br>
                    <input type="radio" id="doctor" name="fav_language" value="CSS">
                   </span>
                </div>
                    If your answer is yes, write down the titles, and dates of previous research projects you have conducted or
                    that you have taken part in and the names of funding institution(s) if any.
                    </h3>
                <div class="text_area_box">
                    <textarea name="question7" id="" cols="30" rows="10">
                        
                    </textarea>
                </div>

            </div>
            <div class="ethic_form_box" id="signature_contenair">
               
                <div class="signature">
                    <div class="signature_content"> <h4>Researcher’s name and surname:</h4></div>
                    <div class="signature_content"> <input type="text" name="researcher_name"></div>
                    <div class="signature_content"><h4>signature:</h4>
                        <div class="signature-pad">
                            <canvas id="signatureCanvas1" class="signature-canvas" width="300" height="100" style="border: 1px solid #000;"></canvas>
                            <button class="clear-btn">Clear Signature</button>
                            <button class="save-btn">Save Signature</button>
                          </div>
                    </div>
                   
                        
                       
                  
                <div class="signature">
                    <div class="signature_content"> <h4>Supervisor’s / Advisor’s name and surname</h4></div>
                    <div class="signature_content"><input type="text" name="supervisor_name"></div>
                    <div class="signature_content"><h4>signature:</h4>
                        <div class="signature-pad">
                            <canvas id="signatureCanvas2" class="signature-canvas" width="300" height="100" style="border: 1px solid #000;"></canvas>
                            <button class="clear-btn">Clear Signature</button>
                            <button class="save-btn">Save Signature</button>
                          </div>
                    
                    </div>
                   
                        
                   

                </div>

            </div>


   <button type="submit" > submit</button>
        </form>

    </div>

     <Script src="../js/app.js">

 </Script>
</body>

</html>
