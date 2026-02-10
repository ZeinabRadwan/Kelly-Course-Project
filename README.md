# Kelly Course Project

A Laravel-based **online learning platform** where users can browse courses, watch embedded YouTube videos, complete quizzes, and earn downloadable certificates upon passing.

## About the Project

Kelly Course Project is a web application built with [Laravel](https://laravel.com) that provides:

- **Course management** — Create and manage courses with title, instructor, description, cover image, YouTube video links, and downloadable materials.
- **YouTube integration** — Embed YouTube videos in courses; video titles can be fetched via the YouTube Data API.
- **Quizzes** — Add multiple-choice (or similar) questions to courses. Learners take quizzes and their responses are recorded.
- **Certificates** — Users who pass a course quiz receive a certificate. Certificates can be viewed and downloaded as PDFs.
- **User roles** — Admin and regular user roles (e.g. for managing courses and viewing the user list).
- **Authentication** — Registration, login, profile, and password management via Laravel Breeze.

The app uses **Laravel 12**, **Laravel Breeze** (Blade + Tailwind), **Vite**, and optional **SQLite** for development. PDF certificates are generated with **DomPDF** and **Intervention Image**.

## Features

| Feature | Description |
|--------|-------------|
| **Courses** | CRUD for courses with image, instructor, description, YouTube links, titles, and materials (files/links). |
| **Quizzes** | Add questions to courses; learners take a quiz (random selection) and submit answers. |
| **Quiz responses** | View quiz attempts and scores per course. |
| **Certificates** | Issue certificates for completed courses; view and download as PDF. |
| **Users** | List users (e.g. for admins); view a user’s certificates. |
| **Profile** | Edit profile and account settings (Breeze). |

## Tech Stack

- **Backend:** PHP 8.2+, Laravel 12  
- **Frontend:** Blade, Tailwind CSS, Vite  
- **Auth:** Laravel Breeze  
- **Database:** SQLite (default), configurable to MySQL/PostgreSQL  
- **PDF:** barryvdh/laravel-dompdf, mpdf, Intervention Image  
- **YouTube:** Optional YouTube Data API for video titles  

## Requirements

- PHP 8.2+
- Composer
- Node.js & npm (for frontend assets)
- (Optional) YouTube Data API key for auto-fetching video titles

## Installation

1. **Clone the repository**
   ```bash
   git clone <repository-url>
   cd Kelly-Course-Project
   ```

2. **Install PHP dependencies**
   ```bash
   composer install
   ```

3. **Environment and key**
   ```bash
   cp .env.example .env
   php artisan key:generate
   ```

4. **Database**
   - Use SQLite (default in `.env`): ensure `database/database.sqlite` exists, or create it.
   - Or set `DB_CONNECTION`, `DB_DATABASE`, etc. for MySQL/PostgreSQL in `.env`.
   ```bash
   php artisan migrate
   ```

5. **Optional: YouTube API**
   - Add to `.env`: `YOUTUBE_API_KEY=your-api-key`  
   - Only needed if you use the YouTube service to fetch video titles.

6. **Frontend**
   ```bash
   npm install
   npm run build
   ```

7. **Run the app**
   ```bash
   php artisan serve
   ```
   Then open `http://localhost:8000` in your browser.

For development with hot reload and queue:
```bash
composer run dev
```

## Project Structure (high level)

- **`app/Http/Controllers/`** — `CourseController`, `QuizController`, `QuestionController`, `CertificateController`, `UserController`, `ProfileController`, plus Breeze auth controllers.
- **`app/Models/`** — `User`, `Course`, `Question`, `Certificate`.
- **`app/Services/YouTubeService.php`** — Fetches YouTube video titles via the API.
- **`routes/web.php`** — Web routes for home, dashboard, courses, quizzes, certificates, users.
- **`database/migrations/`** — Tables for users, courses, questions, quiz responses, certificates.

## License

This project is open-sourced under the [MIT license](https://opensource.org/licenses/MIT).
