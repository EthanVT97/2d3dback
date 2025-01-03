# 2D3D Lottery Frontend

A modern React-based frontend application for a 2D and 3D lottery system.

## Features

- User Authentication (Login/Register)
- 2D and 3D Lottery Games
- Real-time Updates via WebSocket
- Transaction Management (Deposits/Withdrawals)
- Betting History
- Admin Dashboard
  - User Management
  - Game Management
  - Transaction Management
  - Activity Logs
  - Analytics & Reports

## Tech Stack

- React 18
- TypeScript
- Styled Components
- React Router DOM
- WebSocket for real-time updates
- Recharts for analytics
- Docker & Docker Compose
- Nginx for production serving

## Prerequisites

- Node.js >= 18
- npm >= 8
- Docker (for production deployment)

## Installation

1. Clone the repository:
   ```bash
   git clone https://github.com/EthanVT97/2d3dback.git
   cd 2d3dback
   ```

2. Install dependencies:
   ```bash
   npm install
   ```

3. Create environment file:
   ```bash
   cp .env.example .env
   ```

4. Start development server:
   ```bash
   npm start
   ```

## Development

- Start development server: `npm start`
- Run tests: `npm test`
- Lint code: `npm run lint`
- Format code: `npm run format`
- Type check: `npm run type-check`

## Production Deployment

### Using Docker

1. Build the image:
   ```bash
   docker build -f Dockerfile.frontend -t 2d3d-lottery-frontend .
   ```

2. Run the container:
   ```bash
   docker run -p 80:80 2d3d-lottery-frontend
   ```

### Using Docker Compose

```bash
docker-compose up -d
```

### Manual Deployment

1. Build the application:
   ```bash
   npm run build
   ```

2. Serve the build directory using a web server like Nginx.

## Environment Variables

- `REACT_APP_API_URL`: Backend API URL
- `REACT_APP_WS_URL`: WebSocket server URL
- `NODE_ENV`: Environment (development/production)
- See `.env.example` for all available options

## Project Structure

```
src/
├── components/     # React components
│   ├── admin/     # Admin dashboard components
│   ├── auth/      # Authentication components
│   ├── games/     # Game-related components
│   └── modals/    # Modal components
├── contexts/      # React contexts
├── hooks/         # Custom hooks
├── services/      # API and WebSocket services
├── styles/        # Global styles
└── utils/         # Utility functions
```

## Contributing

1. Fork the repository
2. Create your feature branch: `git checkout -b feature/my-feature`
3. Commit your changes: `git commit -m 'Add my feature'`
4. Push to the branch: `git push origin feature/my-feature`
5. Submit a pull request

## License

This project is licensed under the MIT License - see the LICENSE file for details.

## Contact

Ethan - [GitHub](https://github.com/EthanVT97)
#   s e v e n k 2 d 3 d 
 
 