
 //FOR CORDIANT
// var acc = document.getElementsByClassName("accordion");
// var i;

// for (i = 0; i < acc.length; i++) {
//   acc[i].addEventListener("click", function() {
//     /* Toggle between adding and removing the "active" class,
//     to highlight the button that controls the panel */
//     this.classList.toggle("active");

//     /* Toggle between hiding and showing the active panel */
//     var panel = this.nextElementSibling;
//     if (panel.style.display === "block") {
//       panel.style.display = "none";
//     } else {
//       panel.style.display = "block";
//     }
//   });
// }



// var acc = document.getElementsByClassName("accordion");
// var panels = document.getElementsByClassName("panel"); // Assuming "panel" is the class name for the content panels.
// var i;

// for (i = 0; i < acc.length; i++) {
//   acc[i].addEventListener("click", function() {
//     // Close all panels and remove the "active" class from all accordion items
//     for (var j = 0; j < panels.length; j++) {
//       panels[j].style.display = "none";
//     }
//     for (var j = 0; j < acc.length; j++) {
//       acc[j].classList.remove("active");
//     }

//     // Toggle the "active" class and show the corresponding panel
//     this.classList.toggle("active");
//     var panel = this.nextElementSibling;
//     if (panel.style.display === "block") {
//       panel.style.display = "none";
//     } else {
//       panel.style.display = "block";
//     }
//   });
// }

var acc = document.getElementsByClassName("accordion");
var panels = document.getElementsByClassName("panel"); // Assuming "panel" is the class name for the content panels.
var i;

for (i = 0; i < acc.length; i++) {
  acc[i].addEventListener("click", function() {
    var panel = this.nextElementSibling;

    // Check if the panel is currently displayed
    var isPanelOpen = panel.style.display === "block";

    // Close all panels and remove the "active" class from all accordion items
    for (var j = 0; j < panels.length; j++) {
      panels[j].style.display = "none";
    }
    for (var j = 0; j < acc.length; j++) {
      acc[j].classList.remove("active");
    }

    // Toggle the "active" class
    this.classList.toggle("active");

    // Toggle the panel based on its current state
    if (isPanelOpen) {
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





//signatuire part


class SignaturePad {
  constructor(signaturePadElement, canvasId) {
    this.canvas = signaturePadElement.querySelector('.signature-canvas');
    this.ctx = this.canvas.getContext('2d');
    this.isDrawing = false;
    this.lastX = 0;
    this.lastY = 0;

    this.canvas.addEventListener('mousedown', this.startDrawing.bind(this));
    this.canvas.addEventListener('mousemove', this.draw.bind(this));
    this.canvas.addEventListener('mouseup', this.stopDrawing.bind(this));
    this.canvas.addEventListener('mouseout', this.stopDrawing.bind(this));

    signaturePadElement.querySelector('.clear-btn').addEventListener('click', this.clearSignature.bind(this));
    signaturePadElement.querySelector('.save-btn').addEventListener('click', this.saveSignature.bind(this));

    this.canvasId = canvasId;
  }

  startDrawing(e) {
    this.isDrawing = true;
    [this.lastX, this.lastY] = [e.offsetX, e.offsetY];
  }

  draw(e) {
    if (!this.isDrawing) return;
    this.ctx.beginPath();
    this.ctx.moveTo(this.lastX, this.lastY);
    this.ctx.lineTo(e.offsetX, e.offsetY);
    this.ctx.stroke();
    [this.lastX, this.lastY] = [e.offsetX, e.offsetY];
  }

  stopDrawing() {
    this.isDrawing = false;
  }

  clearSignature() {
    this.ctx.clearRect(0, 0, this.canvas.width, this.canvas.height);
  }

  saveSignature() {
    const signatureImageURL = this.canvas.toDataURL();
    console.log(`Signature ${this.canvasId}:`, signatureImageURL);
  }
}

// Initialize SignaturePad for each signature pad element
const signaturePads = document.querySelectorAll('.signature-pad');
signaturePads.forEach((signaturePad, index) => new SignaturePad(signaturePad, index + 1));


// TEXTARAREAS VISIBILITIES
var form = document.querySelector("form");

// Add a change event listener to the form
form.addEventListener("change", function (event) {
    // Check if the changed element is a radio button with the name "fav_language"
    if (event.target.type === "radio" && event.target.name === "fav_language") {
        // Find the closest .ethic_form_box parent element
        var ethicFormBox = event.target.closest(".ethic_form_box");
        if (!ethicFormBox) {
            return; // Exit if not found
        }

        // Find the associated text area within the .ethic_form_box
        var textArea = ethicFormBox.querySelector("textarea");

        // Toggle the visibility of the text area based on the selected radio button
        if (event.target.value === "yes") {
            textArea.style.display = "block";
        } else {
            textArea.style.display = "none";
        }
    }
});

// Hide all text areas initially
var textAreas = document.querySelectorAll(".text_area_box textarea");
textAreas.forEach(function (textarea) {
  
});
