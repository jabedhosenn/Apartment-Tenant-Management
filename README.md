# 🏢 Apartment & Tenant Management Application
### Laravel REST API

## 📌 Project Overview

This project demonstrates the development of an **Apartment & Tenant Management Application** using **Laravel REST API**. It represents a core module of a real-world **property management system**, commonly used in rental platforms, housing management software, or enterprise-level ERP solutions.

The project focuses on **real-life business logic**, **relational database design**, and **clean, scalable RESTful API development**, following Laravel best practices.

---

## 🎯 Learning Objectives

By completing this project, students will learn how to:

- Design and build RESTful APIs using Laravel  
- Implement real-world booking and availability rules  
- Work with Eloquent ORM relationships  
- Apply custom Form Request validation  
- Use API Resources for structured JSON responses  
- Handle image uploads using Laravel Storage  
- Build scalable and maintainable backend architecture  

---

## ✨ Key Features

- ✔ One apartment can be booked by only one tenant at a time  
- ✔ Apartments become available after booking ends  
- ✔ View total number of apartments and tenants  
- ✔ Identify booked and vacant apartments  
- ✔ Fully RESTful, resource-based API  
- ✔ Custom Form Request validation  
- ✔ Image upload & storage management  
- ✔ Relational API responses using Laravel API Resources  

---

## 🏗️ Application Modules

### 🏠 Apartment Module
- Create, update, and delete apartments  
- Upload apartment images  
- Track apartment availability (Booked / Vacant)  
- Retrieve apartment details with booking status  

### 👤 Tenant Module
- Create and manage tenant profiles  
- Upload tenant images  
- Store tenant contact information  
- Associate tenants with bookings  

### 📅 Booking Module
- Book apartments for tenants  
- Prevent double booking  
- Validate overlapping booking dates  
- Maintain booking history  
- Enforce business rules for data integrity  

---

## 🔐 Business Rules & Constraints

- An apartment cannot be booked by multiple tenants at the same time  
- Booking dates must not overlap  
- Each booking must include:
  - Apartment ID  
  - Tenant ID  
  - Start date  
  - End date  
- Only vacant apartments can be booked  

---

## 🔗 Technologies Used

- Laravel (REST API)  
- MySQL  
- Eloquent ORM  
- Laravel API Resources  
- Form Request Validation  
- Laravel Storage (Image Upload)  
- MVC Architecture  

---

## 📂 API Response Structure

All responses follow a clean JSON format and use Laravel API Resources with Eloquent relationships.

---

## 📦 Project Structure Highlights

- Controllers → Business logic  
- Models → Relationships  
- Form Requests → Validation rules  
- API Resources → Response formatting  
- Storage → Image upload handling  

---

## 🚀 Use Cases

- Learning Laravel REST API  
- Academic projects  
- Backend portfolio projects  
- SaaS system foundations  

---

## 👨‍💻 Author

**Jabed Hosen**  
Software Engineer | Full-Stack Developer  

---

## 📜 License

This project is for educational purposes and may be extended or modified for learning and portfolio use.
