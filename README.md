# Book Store Application

A simple web-based application for displaying books and insert ratings.  
This project is built using **Laravel 12** with **MySQL** as database.  
It provides features such as:
- Listing books with author, category, and rating summary
- Searching and filtering books
- Adding ratings to books

---

## Requirements

Make sure you have the following installed:

- **PHP** = ^8.1  
- **Composer** (latest version)  
- **MySQL** = ^8.0  

---

## Installation & Run

### 1. Clone the repository
   ```bash
   git clone https://github.com/truekei/td-bookstore.git
   cd book-rating-app
   ```
### 2. Install PHP Dependencies
```bash
composer install
```
### 3. Environment Configuration
Copy `.env.example` to `.env`
```bash
cp .env.example .env
```
Set up your database connection as example:
```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=td_bookstore
DB_USERNAME=root
DB_PASSWORD=
```
### 4. Generate Application Key
```bash
php artisan key:generate
```
### 5. Run Database Migration and Seeder
```bash
php artisan migrate --seed
```
### 6. Run the Development Server
```bash
composer run dev
```
#### The application will run on `http://localhost:8000`
