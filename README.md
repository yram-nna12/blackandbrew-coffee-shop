<a name="readme-top"></a>

<br/>

<br />
<div align="center">
  <a href="#">
    <img src="./public/assets/img/logom.png" alt="Black & Brew" width="140" height="140">
  </a>
  <h3 align="center">Black & Brew Coffee Shop Web System</h3>
</div>

<div align="center">
 Black & Brew is a dynamic coffee shop web system built using CodeIgniter 4, designed with both customer and admin access levels. The platform allows customers to browse menus, place orders, and view shop information, while admins manage products, monitor orders, handle user accounts, and maintain website content. The system follows the MVC architecture and includes essential backend features such as validation, file upload, email sending, sessions, image processing, and pagination.
</div>

<br />

![](https://visit-counter.vercel.app/counter.png?page=yram-nna12/AWD-Personal-Finance-Manager-Oshawott)

[![wakatime](https://wakatime.com/badge/user/018f02f8-3e41-49f0-93c6-1b840df169b8/project/d13c38f8-41ad-482c-a379-6c5856589787.svg)](https://wakatime.com/badge/user/018f02f8-3e41-49f0-93c6-1b840df169b8/project/d13c38f8-41ad-482c-a379-6c5856589787)

---

<br />
<br />

<details>
  <summary>Table of Contents</summary>
  <ol>
    <li>
      <a href="#overview">Overview</a>
      <ol>
        <li><a href="#key-components">Key Components</a></li>
        <li><a href="#technology">Technology</a></li>
        <li><a href="#sdg-alignment">SDG Alignment</a></li>
      </ol>
    </li>
    <li><a href="#instruction">Instruction</a></li>
    <li><a href="#features">Implemented Features</a></li>
    <li><a href="#installation">Installation</a></li>
    <li><a href="#resources">Resources</a></li>
  </ol>
</details>

---

## Overview

Black & Brew Coffee Shop System is a fully functional web platform that modernizes customer interaction and business management for coffee shops. It provides a user-friendly interface for browsing menus, viewing product descriptions, and placing orders, while also giving administrators complete control over store operations—including product inventory, sales monitoring, user management, and website content updates.

Built using **CodeIgniter 4** and the **MVC pattern**, the system ensures a clean separation of logic, easy maintenance, and modular development. It integrates essential web functionalities such as form validation, sessions, pagination, email notifications, image manipulation for product photos, and secure file upload handling.

### Key Components
- Multi-Page Website (Landing Page, Menu, Orders, Admin Dashboard)
- Fully Responsive for Mobile and Desktop
- Admin & Customer Access Levels
- Product & User Management System
- Image Upload + Resize for Product Images
- Form Validation Across All Forms
- Secure Login/Logout with Sessions
- Pagination for Menu Items & User Lists
- Email Sending for Customer Inquiries
- Coffee Shop Branding and UI/UX Styling

### Technology

![HTML](https://img.shields.io/badge/HTML-E34F26?style=for-the-badge&logo=html5&logoColor=white)
![CSS](https://img.shields.io/badge/CSS-1572B6?style=for-the-badge&logo=css3&logoColor=white)
![Bootstrap](https://img.shields.io/badge/Bootstrap-563D7C?style=for-the-badge&logo=bootstrap&logoColor=white)
![JavaScript](https://img.shields.io/badge/JavaScript-F7DF1E?style=for-the-badge&logo=javascript&logoColor=black)
![PHP](https://img.shields.io/badge/PHP-777BB4?style=for-the-badge&logo=php&logoColor=white)
![CodeIgniter](https://img.shields.io/badge/CodeIgniter_4-EF4223?style=for-the-badge&logo=codeigniter&logoColor=white)

---

## SDG Alignment

Black & Brew aligns with the **United Nations Sustainable Development Goals**, specifically:

### **SDG 8: Decent Work and Economic Growth**  
The system digitizes store operations, helping small businesses streamline transactions, improve workflow efficiency, and support local economic development.

### **SDG 9: Industry, Innovation, and Infrastructure**  
By adopting digital solutions (online ordering, admin dashboards, automated processes), the system promotes industry modernization and innovative infrastructure.

---

## Instruction

Below are the instructions for navigating through the system:

---

### <h3>Landing Page</h3>

- Browse featured products, and shop highlights.
- Navigate using the top menu; Home (Logo), Menu, About, Contact, User Details (Profile Icon).

---

### <h3>Menu Page</h3>

- View all available coffee and food items.
- Products are displayed with pagination for easier browsing.
- Click on an item to see details such as description and price.

---


### <h3>Contact Page</h3>

- Users can send inquiries through the email form.
- Email sending is handled by CodeIgniter’s Email Library.
- Form validation ensures complete and correct inputs.

---

### <h3>Login Page</h3>

- Enter registered email and password.
- Password visibility toggle for user convenience.
- Users are redirected based on access level (Admin / Customer).

---

### <h3>Signup Page</h3>

- Register using Full Name, Email, and Password.
- Includes full validation for inputs.
- Password confirmation required.
- New accounts are saved in the database.

---

### <h3>Customer Dashboard</h3>

- View available products.
- Manage personal account information.
- Update profile and contact details.

---

### <h3>Admin Dashboard</h3>

- Full access to system management.
- View system statistics
- Navigate to product, user, and transaction modules.

---

### <h3>Admin – Product Management</h3>

- Add new products (name, price, description).
- Upload product images (with validation + resizing).
- Edit existing product information.
- Delete products.
- View products using pagination.

---

### <h3>Admin – User Management</h3>

- View all customer accounts.
- Add, edit or delete users.
- Pagination for user listing.


---

## Features

### ✔ Form Validation  
Used in login, signup, product creation/editing, contact form, and order forms.

### ✔ Sessions  
- Admin and Customer sessions  
- Access-level restrictions  
- Secure logout functionality  

### ✔ Pagination  
Implemented for:  
- Menu items  
- User lists  
- Product listings  

### ✔ Email Sending  
- Customer inquiry form sends email to admin.  
- Implemented via CodeIgniter 4’s Email Library.  

### ✔ File Upload & Image Manipulation  
- Product images  
- Size validation  
- Image resizing (maintain aspect ratio)  
- Secure uploads stored in `/writable/uploads/`

---

## Installation

Follow the steps below to run the project locally:

### *1. Clone the repository*
```sh
git clone https://github.com/<yram-nna12>/blackandbrew.git


Then open the folder:
cd blackandbrew
```
### *2. Start XAMPP*
Make sure these services are running:
- Apache
- MySQL
### *3. Import the database*
1. Open phpMyAdmin
2. Create a new database named:
3. Click Import
4. Select the SQL file included in the repository (usually inside `/database/ or /sql/`)
5. Import it
### *4. Run migrations*
```sh
php spark migrate
```
### *5. Run the development server*
```sh
php spark serve
```
### *6. Open the website*
click this link or open http://localhost:8080

## Resources

| Title | Purpose | Link |
|-|-|-|
| Google Fonts | Fonts for website | [LINK](https://fonts.google.com/) |
| Font Awesome | Icons for website | [LINK](https://fontawesome.com/icons/cloudflare) |
| Canva | Background Picture/Edit for HD Quality & Icons and Layout Designs and Placemen | [LINK](https://www.canva.com/) |
| Gemini AI | Image generation (product images) | [LINK](https://gemini.google.com/)|
| ChatGPT | Debugging, code assistance and improvement of system logic | [LINK](https://chat.openai.com/) |
