# laravel-lms

Laravel-lms is a powerful and intuitive Learning Management System built using the Laravel PHP framework. It provides a comprehensive platform for managing students, administrators, courses, lessons, reviews, and enrollments efficiently.

## 🎯 Why?

Managing courses and students in a learning environment can be challenging. Laravel-lms aims to simplify this process by providing a robust system for creating, organizing, and delivering courses, along with tools for managing users and tracking progress.

## 🚀 Quick Start

1. Clone the repository:

```bash
git clone https://github.com/danyfernandes/laravel-lms.git
```

2. Navigate into the project directory:

```bash
cd laravel-lms
```

3. Install dependencies via Composer:

```bash
composer install
```

4. Install JavaScript dependencies via npm:

```bash
npm install
```

5. Create a copy of the .env.example file and rename it to .env:

```bash
cp .env.example .env
```

6. Generate an application key:

```bash
php artisan key:generate
```

7. Run migrations to create the necessary database tables:

```bash
php artisan migrate --seed
```

- A message should appear asking if you would like to create the SQLite database. Select <b>Yes</b> and continue.

8. Launch the Laravel Vite build process:

```bash
npm run dev
```

9. Serve the application:

```bash
php artisan serve
```

10. Access the application in your web browser at http://localhost:8000.

## 🔧 Usage
- Log in as an administrator to access the full functionalities of the LMS.
    - Email: <b>admin@laravel.com</b>
    - Password: <b>password</b>
- Create courses and add lessons to them.
- Assign courses to students.
- Monitor student enrollments and reviews from the administrator dashboard.
- Students can log in to the student panel, access their enrolled courses, access the lessons and leave reviews.

## 👏 Contributing

Contributions are welcome! Feel free to submit bug reports, feature requests, or pull requests.

## 📝 License
This project is open-sourced software licensed under the MIT license.
