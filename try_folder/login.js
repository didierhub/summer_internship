<form  id="comment_approve_reject_contenair"  ction="update_status_comments.php" method="post" >
<div  id="contenair_comment">

    <label for="comments">Comments:</label>
    <textarea name="comments" id="comments" rows="30"></textarea>

    <br>
</div>

<div id="status_contenair">
     <input type="hidden" name="submission_id" value="<?php echo $row['submission_id']; ?>">
                <label>Choose Status:</label>
                <div id="status-buttons">
                    <label>
                        <input type="radio" name="status" value="approve">
                        <button type="button"  class="submit_btn">Approve</button>
                    </label>
                    <label>
                        <input type="radio" name="status" value="reject" >
                        <button type="button"  class="submit_btn" >Reject</button>
                    </label>
                </div>
              
</div>

<div id="save_contenair_button">
<input type="submit" value="Save" class="submit_btn save_btn" >
</div>

</form>

