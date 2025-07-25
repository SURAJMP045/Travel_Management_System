function myFunction() {
  var dots = document.getElementById("dots");
  var moreText = document.getElementById("more");
  var btnText = document.getElementById("myBtn");

  if (dots.style.display === "none") {
    dots.style.display = "inline";
    btnText.innerHTML = "Read more";
    moreText.style.display = "none";
  } else {
    dots.style.display = "none";
    btnText.innerHTML = "Read less";
    moreText.style.display = "inline";
  }
}

function myFunction1() {
  var dots = document.getElementById("dots1");
  var moreText = document.getElementById("more1");
  var btnText = document.getElementById("myBtn1");

  if (dots.style.display === "none") {
    dots.style.display = "inline";
    btnText.innerHTML = "Read more";
    moreText.style.display = "none";
  } else {
    dots.style.display = "none";
    btnText.innerHTML = "Read less";
    moreText.style.display = "inline";
  }
}

function myFunction2() {
  var dots = document.getElementById("dots2");
  var moreText = document.getElementById("more2");
  var btnText = document.getElementById("myBtn2");

  if (dots.style.display === "none") {
    dots.style.display = "inline";
    btnText.innerHTML = "Read more";
    moreText.style.display = "none";
  } else {
    dots.style.display = "none";
    btnText.innerHTML = "Read less";
    moreText.style.display = "inline";
  }
}


function setRating(value) {
  document.getElementById("selected-rating").value = value;
  var stars = document.querySelectorAll(".rating span");
  stars.forEach(function (star, index) {
    star.classList.remove("active");
    if (index < value) {
      star.classList.add("active");
    }
  });
}
function submitRating() {
  var selectedRating = document.getElementById("selected-rating").value;

  if (selectedRating > 0) {
    var resultDiv = document.getElementById("result");
    resultDiv.innerHTML = "You rated us: " + selectedRating;
  } else {
    alert("Please select a rating before submitting.");
  }
}
if (document.getElementById('getStartedBtn')) {
  document.getElementById('getStartedBtn').addEventListener('click', function () {
    alert('Let\'s get started!');
  });
}


document.addEventListener("DOMContentLoaded", function () {
  var contactForm = document.getElementById("contactForm");
  var confirmationMessage = document.getElementById("confirmation-message");
  if (contactForm && confirmationMessage) {
    contactForm.addEventListener("submit", function (event) {
      event.preventDefault();
      var formData = new FormData(contactForm);
      fetch("process_contact.php", {
        method: "POST",
        body: formData
      })
        .then(response => response.text())
        .then(data => {
          confirmationMessage.innerHTML = data;
        })
        .catch(error => {
          console.error("Error:", error);
        });
    });
  }
});

document.addEventListener("DOMContentLoaded", function () {
  function fetchUserList() {
    fetch('fetch_user_list.php')
      .then(response => response.json())
      .then(data => {
        const userListElement = document.getElementById('user-list');
        if (userListElement) {
          userListElement.innerHTML = '';
          data.forEach(user => {
            const listItem = document.createElement('div');
            listItem.textContent = user.name;
            userListElement.appendChild(listItem);
          });
        }
      });
  }
  fetchUserList();
  if (document.querySelector('.add-user-button')) {
    document.querySelector('.add-user-button').addEventListener('click', function () {
      console.log('Add User button clicked');
    });
  }
  if (document.querySelector('.delete-user-button')) {
    document.querySelector('.delete-user-button').addEventListener('click', function () {
      console.log('Delete User button clicked');
    });
  }
});


