// document.getElementById("signupForm").onsubmit = async (event) => {
//   const errorMessagesDiv = document.getElementById("error-messages");
//   const email = document.getElementById("email").value;
//   const password = document.getElementById("password").value;
//   const confirmPassword = document.getElementById("confirmPassword").value;
//   errorMessagesDiv.innerHTML = "";
//   const response = await fetch(`/src/controllers/signup.php?email=${email}`);
//   if (response.ok) {
//     const { success } = await response.json();
//     if (success === false) {
//       event.preventDefault();
//       console.log(success);
//       errorMessagesDiv.innerHTML = `<div>email is already in use.<div>`;
//     }
//   }
//   if (password !== confirmPassword) {
//     event.preventDefault();
//     errorMessagesDiv.innerHTML =
//       "<div>Your password and confirmation password do not match.<div>";
//   }
// };
