<?php
// Include database connection and necessary files

// Include database connection
require_once 'db_connection.php';
require_once 'midleware.php';

// Get the logged-in user's ID
$loggedInUserId = getLoggedInUserId();

// Get the user's full name using the ID
$userFullName = getUserFullName($loggedInUserId);


if (isset($_GET['submission_id'])) {
    $submissionId = $_GET['submission_id'];

    // Fetch form details for the selected submission ID
    $query = "SELECT * FROM ethic_form WHERE submission_id = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("s", $submissionId);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result && $result->num_rows > 0)
    {
        $row = $result->fetch_assoc();
        
        // Handle form update if form is submitted
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $status = $_POST['form_status'];
            $comment = $_POST['comment'];
            
            // Update status and comments in the database
            $updateQuery = "UPDATE ethic_form SET form_status = ?, comment = ? WHERE submission_id = ?";
            $updateStmt = $conn->prepare($updateQuery);
            $updateStmt->bind_param("sss", $status, $comment, $submissionId);
            
            if ($updateStmt->execute()) {
                if ($status === 'approve') {
                    // Update the 'editable' column to 0 to disable further edits
                    $updateEditableQuery = "UPDATE ethic_form SET editable = 0 WHERE submission_id = ?";
                    $updateEditableStmt = $conn->prepare($updateEditableQuery);
                    $updateEditableStmt->bind_param("s", $submissionId);
                    $updateEditableStmt->execute();
                    $updateEditableStmt->close();
                }
                $updatedStatus = $status; // Store updated status
                $updatedComments = $comment; // Store updated comments
                echo "Status and comments updated successfully!";
            } 
            else {
                echo "Update failed: " . $updateStmt->error;
            }
            
            $updateStmt->close();
        }
        $question1 = $row['question1'];
        $question2 = $row['question2'];
        $question3 = $row['question3'];
        $question4 = $row['question4'];
        $question5 = $row['question5'];
        $question6 = $row['question6'];
        $question7 = $row['question7'];
        $researcherName = $row['researcher_name'];
        
    } else {
        echo "Form not found.";
    }

    $stmt->close();
} else {
    echo "Submission ID not provided.";
}

// Close database connection
$conn->close();
?>


<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="../css/admin_view_css.css">
   

    <title>Document</title>
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
</head>

<body>


    <div id="main_wrapper">

<!-- 
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
                <span id="profile"> 
                           
                <img src="../image/profile.jpg" alt="">
            </span>

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


            </div> -->


        </div> 

<!-- 
        <div id="dash_board_menu">

            
            <div><a href="user_dashboard.php"><ion-icon name="home-outline"></ion-icon> <span>home</span></a></div>
            <div><a href="ethic_form.php"><ion-icon name="create-outline"></ion-icon> <span>Project form <span></span></a></div>
            <div><a href="project_form.php"> <ion-icon name="receipt-outline"></ion-icon> <span>Ethics form
                    </span></a></div>
            <div><a href="appt_status.php"> <ion-icon name="analytics-outline"></ion-icon><span>App status </span></a></div>
        </div> -->

        
        <form  id="midle_section_contenair_user" action="edit_ethic.php" method="post">

            <h2> ETHICS COMMITTEE PROJECT INFORMATION FORM</h2>
            
            <div class="ethic_form_box">
                <h3> 1. Briefly describe the study to be conducted, including the sub-research questions, and hypotheses if any</h3>
                <div class="text_area_box">
                    <textarea name="question1" id="" cols="30" rows="10">
                    <?php echo $question1;?>
                    </textarea>
                </div>

            </div>
               
            <div class="ethic_form_box">
                <h3> 2. Explain the data collection plan, specifying the methods, scales, tools, and techniques to be used. (Please
                    hand in a copy of all types of instruments such as scales and questionnaires to be used in the study along
                    with this document.)</h3>
                <div class="text_area_box">
                    <textarea name="question2" id="" cols="30" rows="10">
                    <?php echo $question2;?>
                    </textarea>
                </div>

            </div>
               
            <div class="ethic_form_box">
                <h3> 3. Write down the expected results of your study.</h3>
                <div class="text_area_box">
                    <textarea name="question3" id="" cols="30" rows="10">
                    <?php echo $question3;?>
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
                    <?php echo $question4;?>
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
                    <?php echo $question5;?>
                    </textarea>
                </div>

            </div>
               
            <div class="ethic_form_box">
                <h3> 6. Indicate the potential contributions of the study to your research area and/or the society.
                </h3>
                <div class="text_area_box">
                    <textarea name="question6" id="" cols="30" rows="10">
                    <?php echo $question6;?>
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
                    <?php echo $question7;?>
                    </textarea>
                </div>

            </div>
            <div class="ethic_form_box" id="signature_contenair">
               
                <div class="signature">
                    <div class="signature_content"> <h4>Researcher’s name and surname:</h4></div>
                    <div class="signature_content"> <input type="text" name="researcher_name"  value="<?php echo $researcherName; ?>" ></div>
                    <div class="signature_content"><h4>signature:</h4>
                        <div class="signature-pad">
                            <canvas id="signatureCanvas1" class="signature-canvas" width="300" height="100" style="border: 1px solid #000;"></canvas>
                            <!-- <button class="clear-btn">Clear Signature</button>
                            <button class="save-btn">Save Signature</button> -->
                          </div>
                    </div>
                   
                
                    <input type="hidden" name="submission_id" value="<?php echo  $submissionId; ?>">
              

            </div>


  
   
        </form>

       
    </div>
    <form  id="comment_approve_reject_contenair"  action="admin_view_ethic_form_and_comment.php" method="post" >
    <div  id="contenair_comment">

        <label for="comments">Comments:</label>
        <textarea name="comment" id="comments" rows="30"> <?php echo isset($row['comment']) ? $row['comment'] : ''; ?></textarea>
    
        <br>
    </div>

  <div id="status_contenair">
         <input type="hidden" name="submission_id" value="<?php echo $row['submission_id']; ?>">
                    <label>Choose Status:</label>
                    <div id="status-buttons">
                        <label>
                            
                            <input type="radio" name="status" value="approve" <?php if ($row['form_status'] === 'approve') echo 'checked'; ?>>
                            <button type="button"  class="submit_btn">Approve</button>
                        </label>
                        <label>
                            <input type="radio" name="status" value="reject" <?php if ($row['form_status'] === 'reject') echo 'checked'; ?> >
                            <button type="button"  class="submit_btn" >Reject</button>
                        </label>
                    </div>
                  
    </div>

    <div id="save_contenair_button">
    <input type="submit" value="Save" class="submit_btn save_btn" >
    </div>
   
    </form>


     <Script src="../js/app.js">

 </Script>
</body>

</html>