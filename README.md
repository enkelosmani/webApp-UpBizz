# My Laravel Project

A Laravel-based web application for managing user profiles and posts with image content.

## Setup Instructions

### Prerequisites
- **PHP**: 8.1 or higher
- **Composer**: Latest version
- **Node.js and npm**: For frontend assets
- **MySQL** or another supported database
- **Git**: For version control

### Installation
1. **Clone the Repository**:
   ```bash
   git clone https://github.com/enkelosmani/webApp-UpBizz.git
   cd webApp-UpBizz
   ```

2. **Install PHP Dependencies**:
   ```bash
   composer install
   ```

3. **Install Frontend Dependencies**:
   ```bash
   npm install
   npm run dev
   ```

4. **Configure Environment**:
   - Copy the `.env.example` file to `.env`:
     ```bash
     cp .env.example .env
     ```
   - Update `.env` with your database credentials:
     ```env
     DB_CONNECTION=mysql
     DB_HOST=127.0.0.1
     DB_PORT=3306
     DB_DATABASE=your_database
     DB_USERNAME=your_username
     DB_PASSWORD=your_password
     ```
   - Generate an application key:
     ```bash
     php artisan key:generate
     ```

5. **Run Migrations**:
   ```bash
   php artisan migrate
   ```

6. **Link Storage** (for image uploads):
   ```bash
   php artisan storage:link
   ```

7. **Serve the Application**:
   ```bash
   php artisan serve
   ```
   - Access the application at `http://localhost:8000`.

## Project Structure and Logic

### Overview
This Laravel project allows users to:
- Create, view, update, and delete posts with associated images.
- View and update their profile information.
- Display a user profile with their posts and images.

### Key Components
- **Models**:
  - `User`: Represents users with attributes like name, email, and password. Has a one-to-many relationship with `Post`.
  - `Post`: Represents posts with a title and user_id. Has a one-to-one relationship with `Content`.
  - `Content`: Stores post-related data (e.g., image paths).

- **Controllers**:
  - `ProfileController`: Manages user profile editing, updating, and deletion.
  - `PostController`: Handles CRUD operations for posts and associated content.
  - `UserController`: Displays user profiles with their posts and images.
  - `ContentController`: Placeholder for content-related actions (not fully implemented).

- **Repositories**:
  - Implements the Repository pattern for data access.
  - `UserRepository`, `PostRepository`, `ContentRepository`: Extend `BaseRepository` for reusable CRUD operations.
  - Interfaces (`IUserRepository`, `IPostRepository`, etc.) ensure consistency.

- **Services**:
  - `UserService`, `PostService`, `ContentService`: Encapsulate business logic and interact with repositories.

- **Views**:
  - `resources/views/profile/edit.blade.php`: Profile management page.
  - `resources/views/users/index.blade.php`: User profile with posts and images.
  - `resources/views/posts/*.blade.php`: Post-related views (index, create, edit, show).

- **Requests**:
  - Form request classes (e.g., `ProfileUpdateRequest`, `StorePostRequest`) handle validation and authorization.

- **Policies**:
  - `PostPolicy`: Controls access to post actions (e.g., only owners can update/delete posts).
  - `UserPolicy`, `ContentPolicy`: Currently empty but can be extended.

### Routes
Defined in `routes/web.php`:
- `/profile`: Profile management (edit, update, delete).
- `/users`: User profile with posts and images.
- `/posts`: Post management (index, create, store, show, edit, update, destroy).

## Bonus Features
- **Image Uploads**: Posts can include images stored in the `public` disk, accessible via `storage/` links.
- **Timestamps Added**: Posts have the date when they are created at.
- **Repository Pattern**: Enhances maintainability and testability by abstracting data access.
- **Tailwind CSS**: Used for responsive, modern styling in views (e.g., user profile page).
- **Eager Loading**: Optimizes database queries by loading related models (`posts.content`, `posts.user`).
- **Custom User Profile**: Displays user-specific posts with images in a grid layout.

## Notes
- Ensure the `storage/app/public` directory is writable for image uploads.
- The `.env` file must be configured correctly for database and application settings.
- Run `npm run dev` to compile frontend assets if changes are made to Tailwind, CSS/JS.
