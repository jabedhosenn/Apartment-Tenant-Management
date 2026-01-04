

# 🏢 Apartment & Tenant Management System

**REST API Documentation**

This API module is part of a **Property / Apartment Management System** designed to manage **apartments, tenants, and bookings** with authentication, validation, image uploads, and relational data responses.

---

## 🔐 Authentication

All protected endpoints require **Bearer Token Authentication**.

### Base URL

```
{{BASE_URL}}/v1
```

### Headers (Protected Routes)

```
Authorization: Bearer {access_token}
Accept: application/json
```

---

## 🔑 Auth Module

### 1️⃣ Register

**POST** `/register`

#### Request Body (JSON)

```json
{
  "name": "Jabed",
  "email": "info1@jabed.com",
  "password": "123456"
}
```

#### Success Response (201)

```json
{
  "message": "User registered successfully"
}
```

---

### 2️⃣ Login

**POST** `/login`

#### Request Body

```json
{
  "email": "info1@jabed.com",
  "password": "123456"
}
```

#### Success Response (200)

```json
{
  "access_token": "your_token_here",
  "token_type": "Bearer"
}
```

---

### 3️⃣ Logout

**POST** `/logout` 🔒

#### Success Response

```json
{
  "message": "Logged out successfully"
}
```

---

## 🏘 Apartment Module

### Business Rules

* One apartment can be booked by **only one tenant at a time**
* Apartment status updates automatically (**Booked / Vacant**)

---

### 1️⃣ Get All Apartments

**GET** `/apartments` 🔒

#### Response

```json
[
  {
    "id": 1,
    "name": "Apartment A",
    "rent": 299,
    "number_of_rooms": 2,
    "status": "Vacant",
    "image": "storage/apartments/apartment-a.jpg"
  }
]
```

---

### 2️⃣ Create Apartment

**POST** `/apartments` 🔒
`multipart/form-data`

#### Request Fields

| Field           | Type    | Required |
| --------------- | ------- | -------- |
| name            | string  | ✅        |
| rent            | number  | ✅        |
| number_of_rooms | integer | ✅        |
| image           | file    | ❌        |

#### Success Response

```json
{
  "message": "Apartment created successfully"
}
```

---

## 👤 Tenant Module

### Features

* Tenant CRUD
* Profile image upload
* Booking relationship

---

### 1️⃣ Get All Tenants

**GET** `/tenants`

#### Response

```json
[
  {
    "id": 1,
    "name": "Person C",
    "email": "personc@gmail.com",
    "phone": "01700000003",
    "image": "storage/tenants/person-c.jpg"
  }
]
```

---

### 2️⃣ Create Tenant

**POST** `/tenants` 🔒
`multipart/form-data`

#### Request Fields

| Field | Type   | Required |
| ----- | ------ | -------- |
| name  | string | ✅        |
| email | string | ✅        |
| phone | string | ✅        |
| image | file   | ❌        |

#### Success Response

```json
{
  "message": "Tenant created successfully"
}
```

---

## 📅 Booking Module

### Booking Logic

* One apartment → One tenant
* Booking requires **start_date & end_date**
* Prevents double booking via validation
* Apartment becomes vacant after booking ends

---

### 1️⃣ Get All Bookings

**GET** `/bookings`

#### Response

```json
[
  {
    "id": 1,
    "start_date": "2025-12-27",
    "end_date": "2026-12-29",
    "apartment": {
      "id": 9,
      "name": "Apartment E",
      "status": "Booked"
    },
    "tenant": {
      "id": 2,
      "name": "Person C"
    }
  }
]
```

---

### 2️⃣ Create Booking

**POST** `/bookings`

#### Request Body

```json
{
  "apartment_id": 9,
  "tenant_id": 2,
  "start_date": "2025-12-27",
  "end_date": "2026-12-29"
}
```

#### Success Response

```json
{
  "message": "Apartment booked successfully"
}
```

#### Validation Errors

```json
{
  "error": "Apartment is already booked"
}
```

---

## 📊 Dashboard Module

### Dashboard Summary

**GET** `/dashboard/summery`

#### Response

```json
{
  "total_apartments": 10,
  "total_tenants": 5,
  "booked_apartments": 4,
  "vacant_apartments": 6
}
```

---

## 🧾 Validation & Architecture

* Custom **Form Request Validation**
* API Resource responses
* Proper HTTP status codes
* Centralized error handling
* Relational data loading (`apartment`, `tenant`)

---

## 🛠 Tech Stack

* Laravel REST API
* Sanctum / Token Authentication
* Eloquent ORM
* API Resources
* File Storage (Images)
* Postman Tested APIs

---

## 📌 Notes

* This API module is **scalable** and suitable as a **core service** of a larger Property Management / ERP system.
* Designed for **Admin Dashboard + Mobile / Web Clients**.

---

