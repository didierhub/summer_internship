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