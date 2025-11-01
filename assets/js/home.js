const today = new Date().toISOString().split("T")[0];
const returnDateIn = document.getElementById("return-date");
const departureDateIn = document.getElementById("departure-date");
const oneWayTrip = document.getElementById("oneWayTrip");
departureDateIn.setAttribute("min", today);
returnDateIn.setAttribute("min", today);

departureDateIn.addEventListener("change", (event) => {
  const departureDate = event.target.value;
  returnDateIn.setAttribute("min", departureDate);
  returnDateIn.value = departureDate;
});
const handleRadioChange = () => {
  if (oneWayTrip.checked) {
    returnDateIn.style.visibility = "hidden";
  } else {
    returnDateIn.style.visibility = "visible";
  }
};
const radios = document.getElementsByName("trip");
radios.forEach((radio) => {
  radio.addEventListener("change", handleRadioChange);
});
const decreaseAdultsBtn = document.getElementById("decreaseAdults");
const increaseAdultsBtn = document.getElementById("increaseAdults");
const adultsInput = document.getElementById("adults");

decreaseAdultsBtn.addEventListener("click", () => {
  let currentValue = parseInt(adultsInput.value);
  if (currentValue > 1) {
    adultsInput.value = currentValue - 1;
  }
});

increaseAdultsBtn.addEventListener("click", () => {
  let currentValue = parseInt(adultsInput.value);
  adultsInput.value = currentValue + 1;
});
const searchBtn = document.getElementById("searchBtn");
const leavingFrom = document.getElementById("leaving-from");
const goingTo = document.getElementById("going-to");
searchBtn.addEventListener("click", (event) => {
  let isValid = true;

  if (!leavingFrom.value) {
    leavingFrom.style.borderColor = "red";
    isValid = false;
  } else {
    leavingFrom.style.borderColor = "";
  }

  if (!departureDateIn.value) {
    departureDateIn.style.borderColor = "red";
    isValid = false;
  } else {
    departureDateIn.style.borderColor = "";
  }

  if (!oneWayTrip.checked && !returnDateIn.value) {
    returnDateIn.style.borderColor = "red";
    isValid = false;
  } else {
    returnDateIn.style.borderColor = "";
  }

  if (!goingTo.value) {
    goingTo.style.borderColor = "red";
    isValid = false;
  } else {
    goingTo.style.borderColor = "";
  }

  if (!isValid) {
    event.preventDefault();
  }
});

const validateInput = (inputElement) => {
  if (!inputElement.value) {
    inputElement.style.borderColor = "red";
    return false;
  } else {
    inputElement.style.borderColor = "";
    return true;
  }
};

leavingFrom.addEventListener("change", () => validateInput(leavingFrom));
departureDateIn.addEventListener("change", () =>
  validateInput(departureDateIn)
);
returnDateIn.addEventListener("change", () => validateInput(returnDateIn));
goingTo.addEventListener("change", () => validateInput(goingTo));
