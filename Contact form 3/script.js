// getting all required elements
const form = document.querySelector("form"),
statusTxt = form.querySelector(".button-area span");
form.onsubmit = (event) => {
    event.preventDefault(); // preventing form from submitting
    statusTxt.style.color = "red";
    statusTxt.style.display = "block";
    let xhr = new XMLHttpRequest(); // creating new xml object
    xhr.open("POST", "message.php", true); // sending the post request to message.php file
    xhr.onload = () => { // once ajax is loaded
       if (xhr.readyState == 4 && xhr.status == 200) { // if ajax status is 200 & ready status is 200 is 4 means there is no any error
          let response = xhr.response; // storing ajax response in a response variable 
          // if response is an error like enter valid email address then we'll change status color to black else reset the form
          if (response.indexOf("Email and password field is required!") != -1 || response.indexOf("Enter a Valid Email Address!") || response.indexOf("Sorry, failed to send message!")) {
            statusTxt.style.color = "black";
          }
          else {
            form.reset();
            setTimeout(() => {
                statusTxt.style.display = "none";
            }, 3000); // hide the statustxt after 3secs if the msg is sent
          }
          statusTxt.innerText = response;
       } 
    };
    let formData = new FormData(form); // creating new formData obj. This obj is used to send form data
    xhr.send(formData); //sendind form data
};
