# 2D3D Lottery System

A modern lottery management system with separate frontend and backend components.

## Project Structure

### Backend (`2d3d-lottery-backend/`)
- `src/` - Core application code
  - `API/` - API client and services
  - `Auth/` - Authentication and authorization
  - `Config/` - Configuration files
  - `Controllers/` - Request handlers
  - `Database/` - Database connections and queries
  - `Events/` - Event handlers and listeners
  - `Helpers/` - Utility functions
  - `Interfaces/` - Contracts and interfaces
  - `Middleware/` - Request middleware
  - `Models/` - Data models
  - `Security/` - Security-related functionality
  - `Services/` - Business logic services
  - `Utils/` - Common utilities
- `public/` - Public facing files
  - `index.php` - Application entry point
  - `api/` - API endpoints
  - `.htaccess` - Apache configuration
- `tests/` - Test files
  - `Unit/` - Unit tests
  - `Integration/` - Integration tests
  - `Feature/` - Feature tests
- `database/` - Database management
  - `migrations/` - Database migrations
  - `seeds/` - Database seeders
  - `schemas/` - Database schemas
- `storage/` - Application storage
  - `logs/` - Application logs
  - `cache/` - Cache files
  - `uploads/` - User uploads
- `docker/` - Docker configuration
- `config/` - Configuration files

### Frontend (`2d3d-lottery-frontend/`)
- `src/` - Source code
  - `components/` - React components
  - `services/` - API services
  - `hooks/` - Custom React hooks
  - `utils/` - Utility functions
- `public/`
  - `assets/` - Static assets
    - `images/` - Image files
    - `fonts/` - Font files
  - `components/` - Reusable UI components
  - `js/` - JavaScript files
  - `css/` - Stylesheets
  - `views/` - Page templates
  - `layouts/` - Layout templates
- `tests/` - Frontend tests
- Build configuration
- Docker setup

## Setup

### Backend Setup
1. Navigate to backend directory: `cd 2d3d-lottery-backend`
2. Install dependencies: `composer install`
3. Copy `.env.example` to `.env` and configure:
   ```
   DB_HOST=localhost
   DB_NAME=lottery_db
   DB_USER=your_user
   DB_PASS=your_password
   JWT_SECRET=your_secret
   REDIS_HOST=localhost
   REDIS_PORT=6379
   APP_ENV=development
   ```
4. Set up storage permissions: `chmod -R 777 storage/`
5. Run database migrations: `php database/migrate.php`
6. Run database seeds: `php database/seed.php`
7. Start PHP server: `php -S localhost:8000 -t public`

### Frontend Setup
1. Navigate to frontend directory: `cd 2d3d-lottery-frontend`
2. Install dependencies: `npm install`
3. Copy `.env.example` to `.env` and configure:
   ```
   REACT_APP_API_URL=http://localhost:8000
   REACT_APP_ENV=development
   ```
4. Start development server: `npm run dev`

## Development

### Backend Development
- API documentation available at `/api/docs`
- Run tests: `composer test`
- Code style check: `composer lint`
- Generate API documentation: `composer docs`
- Clear cache: `php artisan cache:clear`

### Frontend Development
- Component documentation in `src/components/README.md`
- Run tests: `npm test`
- Lint code: `npm run lint`
- Build for production: `npm run build`
- Analyze bundle: `npm run analyze`

## Deployment

### Backend Deployment (Render)
1. Fork this repository
2. Create a new Web Service on Render
3. Connect your GitHub repository
4. Configure environment variables in Render dashboard
5. Use the following settings:
   - Environment: PHP
   - Build Command: `cd 2d3d-lottery-backend && composer install --no-dev --optimize-autoloader`
   - Start Command: `cd 2d3d-lottery-backend && vendor/bin/heroku-php-apache2 public/`

### Frontend Deployment
1. Build the frontend: `cd 2d3d-lottery-frontend && npm run build`
2. Deploy the `public` directory to your static hosting service
3. Configure environment variables for production

## Features

- Real-time lottery results
- User authentication and profile management
- Secure payment processing
- Historical data tracking
- Responsive design
- Rate limiting and DDOS protection
- Data caching and optimization
- Automated backups
- Admin dashboard
- API documentation

## Security

- JWT authentication
- CSRF protection
- XSS prevention
- SQL injection protection
- Rate limiting
- Input validation
- Secure file uploads
- SSL/TLS encryption

## Contributing

1. Fork the repository
2. Create a feature branch
3. Commit your changes
4. Push to the branch
5. Create a Pull Request

## License

This project is licensed under the MIT License - see the LICENSE file for details.
#   s e v e n k 2 d 3 d  
 