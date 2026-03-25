#!/bin/bash

# Colors for output
YELLOW='\033[1;33m'
GREEN='\033[0;32m'
BLUE='\033[0;34m'
NC='\033[0m' # No Color

echo -e "${BLUE}Starting Bac Plus...${NC}\n"

echo -e "${YELLOW}Starting Vite dev server...${NC}"
npm run dev &
VITE_PID=$!

sleep 3

echo -e "${YELLOW}Starting Laravel server...${NC}"
php artisan serve &
LARAVEL_PID=$!

sleep 2

echo -e "${GREEN}✓ Both servers are running!${NC}\n"
echo -e "${BLUE}Vite dev server: ${NC}http://localhost:5173"
echo -e "${BLUE}Laravel server: ${NC}http://localhost:8000\n"
echo -e "${YELLOW}Press Ctrl+C to stop both servers${NC}\n"

# Wait for interrupt signal
trap "kill $VITE_PID $LARAVEL_PID" INT

wait
