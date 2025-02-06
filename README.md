# Event Management Application

## Overview
The Event Management Application is a web-based platform developed using the Laravel framework. It allows users to create, view, edit, and delete events. The application also includes a user authentication system, a dashboard that displays events created by all users, and a user profile section for managing personal information. This README file provides detailed instructions for setting up the application and outlines the additional features implemented in Assignment 2.

---

## Table of Contents
- [Installation](#installation)
- [Usage](#usage)
- [Features](#features)
  - [Authentication System](#authentication-system)
  - [Event Management](#event-management)
  - [Dashboard with All Events](#dashboard-with-all-events)
  - [User Profile Management](#user-profile-management)
  - [Enhanced User Interface](#enhanced-user-interface)
- [Critical Analysis of Features](#critical-analysis-of-features)
- [Limitations](#limitations)

---

## Installation

### Prerequisites
1. **PHP**: Version 8.1 or higher.
2. **Composer**: Dependency manager for PHP.
3. **Database**: MySQL or another compatible database.
4. **Node.js**: For front-end asset compilation.
5. **Laravel**: Ensure the Laravel framework is installed globally.

### Steps
1. Clone the repository:
   ```bash
   git clone <repository-url>
   ```
2. Navigate to the project directory:
   ```bash
   cd event-management-app
   ```
3. Install PHP dependencies:
   ```bash
   composer install
   ```
4. Install front-end dependencies:
   ```bash
   npm install
   ```
5. Set up the `.env` file:
   - Copy the example environment file:
     ```bash
     cp .env.example .env
     ```
   - Update the `.env` file with your database credentials and other environment-specific settings.

6. Generate the application key:
   ```bash
   php artisan key:generate
   ```
7. Run database migrations and seeders:
   ```bash
   php artisan migrate --seed
   ```
8. Compile front-end assets:
   ```bash
   npm run dev
   ```
9. Start the local development server:
   ```bash
   php artisan serve
   ```
10. Access the application at:
    ```
    http://127.0.0.1:8000
    ```
   One of the login ID for easy access:
   ```bash
   email: user1@example.com
   password: password
   ```
---

## Usage

### User Registration and Login
1. Navigate to the registration page to create a new account.
2. Log in using your credentials to access the dashboard and event management features.

### Event Management
- Create events by navigating to the "Add New Event" section.
- View, edit, or delete events directly from the dashboard.

### User Profile
- Update your name and email in the "Profile" section.

---

## Features

### Authentication System
- **Implementation**: Built using Laravel’s built-in authentication scaffold.
- **Functionality**:
  - User registration, login, and logout.
  - Role-based access control to restrict editing and deleting events to their owners.

### Event Management
- **CRUD Operations**:
  - Users can create, read, update, and delete events.
- **Validation**:
  - Each form is validated to ensure the integrity of event data.

### Dashboard with All Events
- **Functionality**:
  - Displays all events created by all users.
  - Events are paginated for better usability.
- **Conditional Buttons**:
  - Only event creators can edit or delete their events.

### User Profile Management
- **Implementation**:
  - Allows users to update their name and email.
- **Access Control**:
  - Restricted to logged-in users.

### Enhanced User Interface
- **Styling**:
  - Custom CSS with animations for a modern look and feel.
- **Navigation**:
  - Easy-to-use navbar with links to the dashboard, profile, and logout.

---

## Critical Analysis of Features

### Authentication System
- **Justification**: Ensures secure access to event management features.
- **Problem Solved**: Prevents unauthorized access to sensitive features.
- **Limitations**: Currently, no email verification is implemented.

### Event Management
- **Justification**: Provides a core feature for users to manage their events.
- **Problem Solved**: Simplifies event organization by providing a central platform.
- **Limitations**: No support for recurring events or attachments.

### Dashboard with a buttton to All Events
- **Justification**: Encourages collaboration by displaying all events to all users.
- **Problem Solved**: Ensures visibility of events across the platform.
- **Limitations**: Lacks advanced filtering options for event categories.

### User Profile Management
- **Justification**: Enables users to keep their profiles up to date.
- **Problem Solved**: Allows for personalization of user details.
- **Limitations**: Password changes are not yet supported.

### Enhanced User Interface
- **Justification**: Improves the user experience.
- **Problem Solved**: Makes navigation intuitive and visually appealing.
- **Limitations**: Some animations may affect performance on older devices.

---

## Limitations
- No email verification or password reset functionality.
- Lack of advanced event features such as recurring events, categories, or attachments.
- Filtering and search options are basic and could be expanded.
- Responsiveness on mobile devices needs further optimization.

---

## Conclusion
This Event Management Application demonstrates core functionalities such as user authentication, event management, and profile updates. The additional features implemented in Assignment 2 enhance usability and interactivity while addressing common user needs. Future improvements can focus on adding advanced event features, optimizing performance, and improving mobile responsiveness.

---

Thank you for assessing the project. If you have any questions or feedback, please feel free to reach out!

