# 🌐 Zen Landing Pages

![Laravel](https://img.shields.io/badge/Laravel-11.x-red.svg?style=for-the-badge&logo=laravel)
![PHP](https://img.shields.io/badge/PHP-8.x-blue.svg?style=for-the-badge&logo=php)
![Tailwind CSS](https://img.shields.io/badge/Tailwind_CSS-3.x-38B2AC.svg?style=for-the-badge&logo=tailwindcss)
![GitLab](https://img.shields.io/badge/GitLab-CI/CD-orange.svg?style=for-the-badge&logo=gitlab)

## 📜 Description

**Zen Landing Pages** is a project built with Laravel 11 and Tailwind CSS. It features secure **password reset** via Gmail SMTP, dynamic landing pages with a CMS, and an employee recruitment system with status and progress tracking.

## 🎨 Features

-   🔒 **Secure Password Reset**: Allows users to securely reset their passwords via email.
-   💌 **Gmail SMTP Integration**: Emails are sent using Gmail's SMTP service.
-   📱 **Responsive Design**: Fully responsive and mobile-friendly, with a modern and sleek UI powered by **Tailwind CSS**.
-   🖼️ **Swiper Slider & Lightbox Gallery**: Enhance your site's visuals with seamless Swiper Slider integration and an interactive Lightbox Gallery.
-   🛠️ **Built with Laravel 11**: Leverages the latest features of Laravel.

## 🚀 Getting Started

### 📦 Prerequisites

-   PHP 8.x
-   Composer
-   Node.js & NPM
-   MySQL
-   Git

### 🔧 Installation

1.  **Clone the repository:**

    ```bash
    git clone -b develop https://github.com/nanang285/sales-order.git
    cd sales-order
    ```

2.  **Install dependencies:**

    ```bash
    composer install
    npm install
    npm run build
    ```

3.  **Set up environment variables:**

    -   Copy `.env.example` to `.env`:

    ```bash
    cp .env.example .env
    ```

    -   Update the `.env` file with your database and mail configuration:

4.  **Generate the application key:**

    ```bash
    php artisan storage:link

    ```
5.  **Generate the application key:**

    ```bash
    php artisan key:generate
    ```

6.  **Run the migrations:**

    ```bash
    php artisan migrate
    ```

7.  **Seed the database with initial data:**

    ```bash
    php artisan db:seed --class=UserSeeder
    ```

8.  **Import the database in MYSQL:**

    ```bash
    import database MYSL in PHPMYADMIN
    ```

9.  **Start the development server:**

    ```bash
    php artisan serve
    ```

## 📝 Usage

To test the password reset functionality, visit `/password/reset` on your local server and enter your email.

## 💻 Technologies Used

This project utilizes:

-   Laravel 11
-   Tailwind CSS
-   PHP 8.x
-   MySQL

## 🎉 Acknowledgements

Special thanks to:

-   Laravel
-   PHPMailer
-   Tailwind CSS

## 📧 Contact

© 2024 PT Zen Multimedia Indonesia. All rights reserved.
