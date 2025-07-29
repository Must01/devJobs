# 🧾 DevJobs – Job Board Web App

**DevJobs** is a Laravel 12-based web application for posting, filtering, and discovering job opportunities. Employers can showcase their companies, and job seekers can browse by tags like `React`, `Laravel`, or `Remote`.

---

## 📸 Screenshots

![Homepage](<img width="1870" height="956" alt="image" src="https://github.com/user-attachments/assets/e12b5dbc-81fb-44d1-9739-8db37de0dbd6" />)
![Job Results](<img width="1870" height="962" alt="image" src="https://github.com/user-attachments/assets/8988110f-05de-408b-acb7-e8cce234a438" />)
![Job Details page](<img width="1882" height="952" alt="image" src="https://github.com/user-attachments/assets/2cacfc51-30b0-4594-9252-d6098307630e" />)
![Companies page](<img width="1874" height="944" alt="image" src="https://github.com/user-attachments/assets/e9d33448-aa55-4cae-8ce5-6e1430a9b23a" />)
![Blog page](<img width="1873" height="953" alt="image" src="https://github.com/user-attachments/assets/afcc79b4-2360-4f71-9b91-7180b06ff1e1" />)

## 🚀 Features

✅ Job listings with filters (tags, title, location)  
✅ Employer profiles with logos and company info  
✅ Paginated job search results  
✅ Fallback avatars (initials) if logo is missing  
✅ Tag-specific routes: `/tag/React`, `/tag/Frontend`  
✅ Responsive design with Tailwind CSS  
✅ Seeded dummy data for quick testing

---

## 📁 Project Structure

-   `routes/web.php` – All frontend routes
-   `resources/views/` – Blade templates
    -   `layout.blade.php` – Main layout
    -   `results.blade.php` – Job results page
    -   `components/` – Reusable Blade components like `job-card-wide`, `employer-logo`, etc.
-   `app/Models/` – Models: `Job`, `Tag`, `Employer`, `User`
-   `app/Http/Controllers/` – Logic for rendering pages
-   `database/seeders/JobSeeder.php` – Dummy data generator

---

## 🛠 Tech Stack

| Layer    | Tech                 |
| -------- | -------------------- |
| Backend  | Laravel 12 (PHP 8.2) |
| Frontend | Blade, Tailwind CSS  |
| Database | SQLite               |
| Seeding  | Laravel Seeders      |

---

## ⚙️ Setup Instructions

### 1. Clone the repo

```bash
git clone https://github.com/your-username/pixel-positions.git
cd pixel-positions
```

### 2. Install dependencies

```bash
composer install
npm install && npm run dev
```

### 3. Configure environment

```bash
cp .env.example .env
php artisan key:generate
```

> 💡 Make sure to set `APP_URL=http://localhost:8000` and `DB_CONNECTION=sqlite` in your `.env`

### 4. Create SQLite DB

```bash
touch database/database.sqlite
```

### 5. Run migrations & seeders

```bash
php artisan migrate --seed
```

---

## 🧪 Sample Accounts

**Employers are created during seeding**  
Emails: `techcorpsolutions@example.com`, `startupxyz@example.com`, etc.  
Password: `password`

---

## 📦 Artisan Commands You’ll Use

-   `php artisan serve` – Run the app
-   `php artisan migrate:fresh --seed` – Reset + seed database

---

## 📌 Useful Routes

-   `/` – Homepage
-   `/search?q=laravel` – Search results
-   `/tag/Frontend` – Filter by tag

---

## 🖼 Logo Placeholders

Employers use a random avatar if no logo exists, powered by fallback initials logic.

---

## 🧑‍💻 Author

Made with 💻 by Mustapha Bouddahr

> Student at ISTA NTIC Guelmim – Full Stack Dev Track
