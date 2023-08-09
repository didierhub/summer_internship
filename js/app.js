
 //FOR CORDIANT
var acc = document.getElementsByClassName("accordion");
var i;

for (i = 0; i < acc.length; i++) {
  acc[i].addEventListener("click", function() {
    /* Toggle between adding and removing the "active" class,
    to highlight the button that controls the panel */
    this.classList.toggle("active");

    /* Toggle between hiding and showing the active panel */
    var panel = this.nextElementSibling;
    if (panel.style.display === "block") {
      panel.style.display = "none";
    } else {
      panel.style.display = "block";
    }
  });
}

//FOR THE DROP DOWN UP ICTION

const drop_down_icon=document.getElementById('care_down_icon');
const drop_content=document.getElementById('dropdown-content');
const drop_up_icon=document.getElementById('care_up_icon');


drop_down_icon.addEventListener(
    'click',function () {
        drop_content.style.display='block';
        care_up_icon.style.display='block'
        drop_down_icon.style.display='none'

        
    }
)


care_up_icon.addEventListener(
    'click',function () {
        drop_content.style.display='none';
        care_up_icon.style.display='none'
        drop_down_icon.style.display='block'

        
    }
)