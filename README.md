# ☁️ Cloud Cost Calculator

A modern AWS Cloud Cost Calculator built with **Laravel 13**, **Tailwind CSS**, **Chart.js**, and **MySQL**. The application helps users estimate monthly AWS infrastructure costs for services like EC2, RDS, S3, and CloudFront through an intuitive dashboard.

![Laravel](https://img.shields.io/badge/Laravel-13-red)
![PHP](https://img.shields.io/badge/PHP-8.3-blue)
![Tailwind CSS](https://img.shields.io/badge/TailwindCSS-4.x-38BDF8)
![MySQL](https://img.shields.io/badge/MySQL-Database-blue)
![License](https://img.shields.io/badge/License-MIT-green)

---

## 🚀 Features

### ✅ Authentication
- User Registration
- Secure Login
- Logout
- Laravel Breeze Authentication

### ✅ Dashboard
- Modern Admin Dashboard
- Premium Sidebar
- Responsive Navigation
- User Profile Dropdown
- Search Bar
- Notification UI
- Monthly Cost Overview
- Cost Summary Cards
- Recent Estimates Table
- Interactive Chart.js Graph

### 🚧 Upcoming Features
- EC2 Cost Calculator
- RDS Cost Calculator
- S3 Cost Calculator
- CloudFront Calculator
- Save Cost Estimates
- PDF Report Export
- Excel Export
- Dark Mode
- AWS Pricing Integration
- User Profile Management
- Settings Module

---

# 🛠️ Tech Stack

- Laravel 13
- PHP 8.3
- MySQL
- Tailwind CSS
- Chart.js
- JavaScript
- Blade Templates
- Vite

---

# 📂 Project Structure

```
app/
├── Http/
├── Models/
├── Providers/

resources/
├── views/
│   ├── layouts/
│   ├── partials/
│   ├── auth/
│   └── dashboard.blade.php

routes/
├── web.php

database/
├── migrations/
```

---

# ⚙️ Installation

## Clone Repository

```bash
git clone https://github.com/YOUR_USERNAME/cloud-cost-calculator.git
```

```
cd cloud-cost-calculator
```

---

## Install Dependencies

```bash
composer install
```

```bash
npm install
```

---

## Environment Setup

```bash
cp .env.example .env
```

Generate Application Key

```bash
php artisan key:generate
```

---

## Configure Database

Update your `.env`

```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=cloud_cost_calculator
DB_USERNAME=root
DB_PASSWORD=
```

---

## Run Migration

```bash
php artisan migrate
```

---

## Start Application

```bash
php artisan serve
```

Start Vite

```bash
npm run dev
```

Open

```
http://127.0.0.1:8000
```

---

# 📸 Screens

- Login Page
- Dashboard
- Charts
- Cost Cards
- Sidebar
- Responsive Layout

*(Screenshots will be added soon.)*

---

# 📅 Development Roadmap

## Phase 1 ✅

- Laravel Setup
- Authentication
- Dashboard UI
- Sidebar
- Navbar
- Chart Integration

## Phase 2 🚧

- EC2 Calculator
- RDS Calculator
- S3 Calculator
- CloudFront Calculator

## Phase 3

- Reports
- Export PDF
- Export Excel
- User Profile
- Settings

## Phase 4

- AWS Deployment
- Docker
- CI/CD
- Production Ready

---

# 💻 Author

**Anit Kumar Jha**

Senior PHP Laravel Developer

- PHP
- Laravel
- AWS
- MySQL
- JavaScript
- Tailwind CSS

---

# 🤝 Contributions

Contributions, issues, and feature requests are welcome.

Feel free to fork the project and submit a pull request.

---

# ⭐ Support

If you like this project, don't forget to **star the repository** ⭐

---

# 📜 License

This project is licensed under the MIT License.
