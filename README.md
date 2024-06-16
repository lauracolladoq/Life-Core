<!-- ABOUT THE PROJECT -->

## 🔍 | About The Project
Life Core is a dynamic and interactive social network platform designed to connect people through shared interests and activities. Our platform offers a variety of features that make social interaction engaging and seamless.

<p align="center">
  <a href="http://lifecore.3utilities.com">
  </a>
</p>

<br>

### 🌟 | Features

#### 1. Post Sharing

Share your thoughts, photos, and videos effortlessly. Our platform supports various types of content to cater to your creative expressions.

#### 2. Likes

Express your appreciation for posts, photos, and updates with a simple click. Likes are a way to show support and encouragement to fellow users.

#### 3. Followers

Stay updated with the latest activities of your friends and favorite influencers by following them. Build your network and never miss a moment.

#### 4. Integrated Chat

Chat in real-time with your friends and followers. Our chat system ensures instant communication, making interactions lively and engaging.

#### 5. Admin Panel

Manage your platform efficiently with our comprehensive admin panel. From user management to post moderation, you have the tools to keep things running smoothly.

#### 6. User Profiles

Create personalized profiles where you can showcase your interests and personality. Let others get to know you through your profile information and activity.

#### 7. Search Functionality

Easily find friends with our robust search feature. Discover new connections and explore content that matters to you.

#### 8. Notifications

Stay informed with real-time notifications. Receive updates about important activities such as new posts, updates to posts, and comments.

#### 9. Trending Tags

Explore popular tags and trending topics on our platform. Discover content that matters to you and join conversations based on popular tags.

<br>

### 🛠️ | Built With

<p align="center">
  <a href="https://laravel.com">
    <img src="https://img.shields.io/badge/laravel-%23FF2D20.svg?style=for-the-badge&logo=laravel&logoColor=white" alt="Laravel">
  </a>
  <a href="https://www.javascript.com">
    <img src="https://img.shields.io/badge/javascript-%23323330.svg?style=for-the-badge&logo=javascript&logoColor=%23F7DF1E" alt="JavaScript">
  </a>
  <a href="https://tailwindcss.com">
    <img src="https://img.shields.io/badge/tailwindcss-%2338B2AC.svg?style=for-the-badge&logo=tailwind-css&logoColor=white" alt="Tailwind">
  </a>
  <a href="https://developer.mozilla.org/en-US/docs/Web/Guide/HTML/HTML5">
    <img src="https://img.shields.io/badge/html5-%23E34F26.svg?style=for-the-badge&logo=html5&logoColor=white" alt="HTML">
  </a>
  <a href="https://getbootstrap.com">
    <img src="https://img.shields.io/badge/bootstrap-%238511FA.svg?style=for-the-badge&logo=bootstrap&logoColor=white" alt="Bootstrap">
  </a>
  <a href="https://www.w3.org/Style/CSS/Overview.en.html">
    <img src="https://img.shields.io/badge/CSScss-%2338B2AC.svg?style=for-the-badge&logo=CSS-css&logoColor=white" alt="CSS">
  </a>
</p>

<br>

## 🚀 | Get Started

To get a local copy up and running follow these simple steps.

### 📋 | Prerequisites

Make sure you have the following installed:

-   npm

    ```sh
    npm install npm@latest -g

    ```

-   Laravel
    ```sh
    composer global require laravel/installer
    ```

<br>

### ⚙️ | Installation
1. Clone the repo
   
    ```sh
    git clone https://github.com/lauracolladoq/Proyecto-Integrado-DAW.git

    ```
2. Navigate to the project directory
   
    ```sh
    cd Proyecto-Integrado-DAW

    ```
3. Install NPM packages
   
    ```sh
    npm install

    ```
4. Install Composer dependencies
   
    ```sh
    composer install

    ```
5. Copy the example environment file and set up your environment variables
   
    ```sh
    cp .env.example .env

    ```
6. Generate an application key
   
    ```sh
    php artisan key:generate

    ```
7. Run the database migrations
   
    ```sh
    php artisan migrate

    ```
> **_NOTE:_**  If you want to seed the database with random data, use:

    php artisan migrate:fresh --seed
8. Compile assets
   
    ```sh
    npm run dev

    ```
9. Start the development server
   
    ```sh
    php artisan serve

    ```
Now you can access the application locally in your browser at `http://localhost:8000`.

<br>

## 🔒 | Setting Up API Keys and Socialite Credentials

### 🔑 | Adding API Keys for Integrated Chat

To integrate the chat feature that requires API keys, follow these steps:

1. **Sign Up for the Chat Service:** Register for the [chat service provider](https://pusher.com/ ) and obtain your API keys.

2. **Configure Environment Variables:** Open your `.env` file and add the API keys as environment variables.

3. **Use in Your Application:** Now you can access the chat service.

<br>

### 🛡️ | Configuring Socialite Credentials

To enable Socialite for authentication through platforms like Facebook, Google, or others, follow these steps:
> **_NOTE:_**  For further details, refer to the [official Laravel documentation](https://laravel.com/docs/11.x/socialite).

1. **Set Up Socialite Providers:** Configure the Socialite providers in your `config/services.php` file. Here's an example for Facebook:

```php
'facebook' => [
    'client_id' => env('FACEBOOK_CLIENT_ID'),
    'client_secret' => env('FACEBOOK_CLIENT_SECRET'),
    'redirect' => 'http://example.com/callback-url,
],
```
2. **Configure Environment Variables:** Add the corresponding environment variables to your .env file.
3. **Implement Social Authentication:** Use Socialite in your application to authenticate users through these providers. 

<br>

## 👥 | Autores

- **Laura Collado Quirantes** - Web Developer - [lauracolladoq](https://github.com/lauracolladoq)
- **Laura Collado Quirantes** - Documentation - [lauracolladoq](https://github.com/lauracolladoq)

<br>

## 📜 | Licencia

This project is licensed under the MIT License - see the [LICENSE.md](LICENSE.md) file for details.
