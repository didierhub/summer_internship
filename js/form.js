
document.addEventListener("DOMContentLoaded", function () {
  const addFieldButton = document.querySelector("#add_more_fields");
  const removeFieldButton = document.querySelector("#remove_fields");
  const inputBlock = document.querySelector(".input_block");

  addFieldButton.addEventListener("click", function () {
    const newInput = document.createElement("input");
    newInput.type = "text";
    newInput.placeholder = "New Field";
    inputBlock.appendChild(newInput);
  });

  removeFieldButton.addEventListener("click", function () {
    const inputFields = inputBlock.querySelectorAll("input");
    if (inputFields.length > 0) {
      inputBlock.removeChild(inputFields[inputFields.length - 1]);
    }
  });
});
