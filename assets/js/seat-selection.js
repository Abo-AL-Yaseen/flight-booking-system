const seats = [];
const rows = 20;
const cols = 6;
const rowLetters = "ABCDEFGHIJKLMNOPQ";

for (let i = 0; i < rows; i++) {
  for (let j = 0; j < cols; j++) {
    seats.push(`${rowLetters[j]}${i}`);
  }
}
let bookedSeats = [];
const fun = async () => {
  const response = await fetch("../../src/controllers/seat-selection.php");
  const data = await response.json();

  bookedSeats = data.map((seat) => {
    return seat.replace(/{|}/gi, "");
  });
  console.log(bookedSeats);
};

const fun2 = async () => {
  await fun();
  // DOM Elements
  const seatContainer = document.getElementById("seat-container");
  const selectedSeatElement = document.getElementById("selected-seat");
  const bookButton = document.getElementById("book-button");

  let selectedSeat = null;
  // Function to create seats
  function createSeats() {
    seats.forEach((seat, index) => {
      const seatElement = document.createElement("button");
      seatElement.classList.add("seat");
      seatElement.textContent = seat;

      // Check if seat is already booked
      if (bookedSeats.includes(seat)) {
        seatElement.classList.add("booked");
        seatElement.disabled = true;
      } else {
        // Add click event for seat selection
        seatElement.addEventListener("click", () =>
          selectSeat(seat, seatElement)
        );
      }

      seatContainer.appendChild(seatElement);

      // Add space between each 3 seats
      if ((index + 1) % 3 === 0 && (index + 1) % 6 !== 0) {
        const spacer = document.createElement("div");
        spacer.style.width = "20px"; // Adjust the width as needed
        seatContainer.appendChild(spacer);
      }
    });
  }

  // Function to select a seat
  function selectSeat(seat, seatElement) {
    // If the seat is already selected, deselect it
    if (selectedSeat === seat) {
      seatElement.classList.remove("selected");
      selectedSeat = null;
      selectedSeatElement.textContent = "None";
      bookButton.disabled = true;
    } else {
      // Select the seat
      const prevSelected = document.querySelector(".seat.selected");
      if (prevSelected) {
        prevSelected.classList.remove("selected");
      }

      seatElement.classList.add("selected");
      selectedSeat = seat;
      selectedSeatElement.textContent = seat;
      bookButton.disabled = false;
    }
  }

  // Function to book the selected seat
  function bookSeat() {
    if (selectedSeat) {
      fetch("../../src/controllers/seat-selection.php", {
        method: "POST",
        body: JSON.stringify({ seat: selectedSeat }),
      });
      window.location.href = "../../src/views/confirmation-page.php";

      bookedSeats.push(selectedSeat); // Add selected seat to booked seats
      // Update the seat layout
      seatContainer.innerHTML = ""; // Clear the seats
      createSeats(); // Recreate the seat layout with updated booked seats
      selectedSeat = null; // Reset selected seat
      selectedSeatElement.textContent = "None";
      bookButton.disabled = true;
    }
  }

  // Event listener for booking the seat
  bookButton.addEventListener("click", bookSeat);

  // Initialize the seat layout
  createSeats();
};
fun2();
