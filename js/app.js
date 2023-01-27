/* Login Validation */
function login() {
  var errorMsg = document.getElementById("error");

  var emailRegex = /^[a-z0-9]+@[a-z]+\.[a-z]{2,3}$/;
  var passRegex =
    /^(?=.*[A-Za-z])(?=.*\d)(?=.*[@$!%*#?&])[A-Za-z\d@$!%*#?&]{8,}$/;

  var email = document.getElementById("userEmail").value;
  var pass = document.getElementById("userPass").value;

  if (emailRegex.test(email)) {
    alert("Logged in! Not really :p");
  } else if (passRegex.test(pass)) {
    alert("Logged in! Not really :p");
  } else {
    errorMsg.style.display = "block";
    setTimeout(() => {
      errorMsg.style.display = "none";
    }, 3000);
  }
}

/* Product Page */
var overview = document.getElementById("overview");
var specs = document.getElementById("specs");
var reviews = document.getElementById("reviews");

var overviewDesc = document.getElementById("overview-desc");
var specsDesc = document.getElementById("specs-desc");
var reviewsDesc = document.getElementById("reviews-desc");

function setOverview() {
  /* Activate Overview Section */
  overview.classList.add("info-active");
  overviewDesc.style.display = "block";

  /* Deactivate Others */
  specs.classList.remove("info-active");
  specsDesc.style.display = "none";

  reviews.classList.remove("info-active");
  reviewsDesc.style.display = "none";
}

function setSpecs() {
  /* Activate Specifications Section */
  specs.classList.add("info-active");
  specsDesc.style.display = "block";

  /* Deactivate Others */
  overview.classList.remove("info-active");
  overviewDesc.style.display = "none";

  reviews.classList.remove("info-active");
  reviewsDesc.style.display = "none";
}

function setReviews() {
  /* Activate Reviews Section */
  reviews.classList.add("info-active");
  reviewsDesc.style.display = "block";

  /* Deactivate Others */
  overview.classList.remove("info-active");
  overviewDesc.style.display = "none";

  specs.classList.remove("info-active");
  specsDesc.style.display = "none";
}
