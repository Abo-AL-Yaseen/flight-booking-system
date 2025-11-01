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
