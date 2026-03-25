#!/bin/bash

# Colors for output
RED='\033[0;31m'
GREEN='\033[0;32m'
YELLOW='\033[1;33m'
BLUE='\033[0;34m'
NC='\033[0m' # No Color

echo -e "${BLUE}=====================================${NC}"
echo -e "${BLUE}  Bac Plus - Installation Script${NC}"
echo -e "${BLUE}=====================================${NC}\n"

# Check if .env file exists
if [ ! -f .env ]; then
    echo -e "${YELLOW}Step 1/6: Creating .env file...${NC}"
    cp .env.example .env
    echo -e "${GREEN}✓ .env file created${NC}\n"
else
    echo -e "${YELLOW}Step 1/6: .env file already exists${NC}\n"
fi

# Install PHP dependencies
echo -e "${YELLOW}Step 2/6: Installing PHP dependencies with Composer...${NC}"
if command -v composer &> /dev/null; then
    composer install
    echo -e "${GREEN}✓ PHP dependencies installed${NC}\n"
else
    echo -e "${RED}✗ Composer not found. Please install Composer first.${NC}"
    exit 1
fi

# Generate application key
echo -e "${YELLOW}Step 3/6: Generating application key...${NC}"
php artisan key:generate
echo -e "${GREEN}✓ Application key generated${NC}\n"

# Install Node.js dependencies
echo -e "${YELLOW}Step 4/6: Installing Node.js dependencies...${NC}"
if command -v npm &> /dev/null; then
    npm install
    echo -e "${GREEN}✓ Node.js dependencies installed${NC}\n"
else
    echo -e "${RED}✗ NPM not found. Please install Node.js first.${NC}"
    exit 1
fi

# Run database migrations
echo -e "${YELLOW}Step 5/6: Running database migrations...${NC}"
php artisan migrate
if [ $? -eq 0 ]; then
    echo -e "${GREEN}✓ Database migrations completed${NC}\n"
else
    echo -e "${RED}✗ Database migrations failed${NC}"
    echo -e "${YELLOW}Make sure PostgreSQL is running and .env database credentials are correct${NC}\n"
fi

# Optional: Seed the database
echo -e "${YELLOW}Step 6/6: Database seeding (optional)${NC}"
read -p "Do you want to seed the database with test data? (y/n) " -n 1 -r
echo ""
if [[ $REPLY =~ ^[Yy]$ ]]; then
    php artisan db:seed
    echo -e "${GREEN}✓ Database seeded${NC}\n"
else
    echo -e "${YELLOW}Skipping database seeding${NC}\n"
fi

# Summary
echo -e "${BLUE}=====================================${NC}"
echo -e "${GREEN}Installation completed!${NC}"
echo -e "${BLUE}=====================================${NC}\n"

echo -e "${YELLOW}Next steps:${NC}"
echo -e "1. Update your .env file with your database credentials if needed"
echo -e "2. Open two terminals:\n"
echo -e "   ${BLUE}Terminal 1 - Start the Vite server:${NC}"
echo -e "   npm run dev\n"
echo -e "   ${BLUE}Terminal 2 - Start the Laravel server:${NC}"
echo -e "   php artisan serve\n"
echo -e "3. Visit: ${GREEN}http://localhost:8000${NC}\n"

echo -e "${YELLOW}Useful commands:${NC}"
echo -e "  php artisan tinker              # Interactive shell"
echo -e "  php artisan test                # Run tests"
echo -e "  php artisan cache:clear         # Clear cache"
echo -e "  php artisan migrate:refresh     # Reset migrations\n"
