//log in page js

let creat_account= document.getElementById('not_have_account');
let existed_account=document.getElementById('have_account');

let log_in=document.getElementById('login-box');
let sign_up=document.getElementById('signup-box');


creat_account.addEventListener("click", function(){

  
    sign_up.style.display='block';
    log_in.style.display='none';

})


existed_account.addEventListener("click", function() {
    
   
   
      sign_up.style.display='none';
      log_in.style.display='block';
})



let other_radio_input=document.getElementById("other_radio");
let other_input_block=document.getElementById("specify");

other_radio_input.addEventListener("click",function(){
  other_input_block.style.display='block';
}
)

// add_input_fild_forth_block
var survey_options = document.getElementsByClassName('new_fild_added');
var add_more_fields = document.getElementById('add_more_fields');
var remove_fields = document.getElementById('remove_fields');

add_more_fields.addEventListener("click",function(){
  var newField = document.createElement('input');
  newField.setAttribute('type','text');
  newField.setAttribute('name','survey_options[]');
  newField.setAttribute('class','survey_options');
  newField.setAttribute('placeholder','Another Field');
  survey_options.appendChild(newField);
} )

remove_fields.onclick = function(){
  var input_tags = survey_options.getElementsByTagName('input');
  if(input_tags.length > 2) {
    survey_options.removeChild(input_tags[(input_tags.length) - 1]);
  }
}


// dashboard
let menuicn = document.querySelector(".menuicn");
let nav = document.querySelector(".navcontainer");

menuicn.addEventListener("click", () => {
	nav.classList.toggle("navclose");
})
