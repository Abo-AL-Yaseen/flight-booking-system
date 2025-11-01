# ✈️ SkyRoute – Flight Booking System

**SkyRoute** is a full-stack **Flight Booking Web Application** built to simulate real-world airline operations.
It allows users to search, book, and confirm flight tickets through a clean and responsive interface — providing a seamless experience similar to modern airline systems like Flynas or Emirates.

---

## 📋 Table of Contents
- [Overview](#overview)
- [Features](#features)
- [Tech Stack](#tech-stack)
- [System Architecture](#system-architecture)
- [Database Design](#database-design)
- [Screenshots](#screenshots)
- [How to Run Locally](#how-to-run-locally)
- [Future Improvements](#future-improvements)
- [About the Developer](#about-the-developer)

---

## 🧭 Overview
**SkyRoute** was developed as a personal project to strengthen my full-stack development skills.
The goal was to design a **functional and visually appealing flight booking system** that handles real booking workflows — from searching and selecting flights to completing reservations and generating confirmations.

The system is modular, scalable, and easy to extend for real-world use cases like integrating external APIs or payment systems.

---

## 🚀 Features

- 🔍 **Flight Search:** Search for flights by date, destination, and airline.  
- 💺 **Seat Selection:** Interactive seat map with real-time updates.  
- 🧾 **Booking System:** Complete ticket reservation workflow with validation.  
- 👤 **User Accounts:** Register, log in, and manage user sessions.  
- 📱 **Responsive UI:** Optimized for both desktop and mobile use.  
- 💳 **Booking Confirmation:** Displays trip details after reservation.  
- 🗄️ **Secure Database:** Stores flights, users, and bookings efficiently.  

---

## 🛠️ Tech Stack

| Category | Technologies |
|-----------|--------------|
| **Frontend** | HTML5, CSS3, JavaScript |
| **Backend** | PHP |
| **Database** | MySQL |
| **Architecture** | MVC (Model–View–Controller) |
| **Version Control** | Git & GitHub |

---

## 🧩 System Architecture

SkyRoute follows a **modular MVC structure**, ensuring clean separation between business logic, presentation, and data management.

project/
├── assets/
│   ├── css/
│   ├── js/
│   └── images/
├── config/
│   ├── database.php
├── src/
│   ├── controllers/
│   ├── models/
│   └── views/
├── sql/
│   └── schema.sql
└── index.php

---

## 🗄️ Database Design

- **Users Table:** Manages user login and registration.  
- **Flights Table:** Stores airline details, routes, schedules, and pricing.  
- **Bookings Table:** Connects users to their selected flights and seats.

---

## 🖼️ Screenshots

| Feature | Preview |
|----------|----------|
| 🏠 Home Page | ![Home Page](assets/images/home.png) |
| 💺 Seat Selection | ![Seat Selection](assets/images/seat-selection.png) |
| 🧾 Booking Form | ![Booking Form](assets/images/book-flight.png) |
| ✅ Confirmation | ![Confirmation](assets/images/confirmation-page.png) |

---

## ⚙️ How to Run Locally

1. Clone the repository:
   git clone https://github.com/Abo-AL-Yaseen/flight-booking-system.git

2. Move to the project folder:
   cd flight-booking-system

3. Start your local PHP server (XAMPP / Laragon).  
4. Create a database in phpMyAdmin (e.g., skyroute_db).  
5. Import the provided SQL file:
   sql.sql

6. Update your database credentials in:
   config/database.php

7. Run the project:
   http://localhost/flight-booking-system

---

## 🔮 Future Improvements

- Integrate **real-time flight API**  
- Add **payment gateway** (Stripe / PayPal)  
- Build **Admin Dashboard** for flight management  
- Implement **email notifications**  
- Develop a **REST API** for mobile integration  

---

## 👨‍💻 About the Developer

**Mahmoud Yaseen**  
Full-Stack Developer passionate about building dynamic, user-focused web applications.  
Skilled in backend logic design, database architecture, and developing responsive interfaces using modern technologies.

> “I build solutions that combine clean design, efficient code, and a seamless user experience.”

---

📄 This project is open-source and available on GitHub for demonstration and learning purposes.
