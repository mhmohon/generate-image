<!-- PROJECT INFO -->
<div align="center">
  <h3 align="center">AI Image Generate App</h3>
  <p align="center">
    A way to generate ai images with prompt
  </p>
</div>



<!-- TABLE OF CONTENTS -->
<details>
  <summary>Table of Contents</summary>
  <ol>
    <li>
      <a href="#about-the-project">About The Project</a>
      <ul>
        <li><a href="#built-with">Built With</a></li>
      </ul>
    </li>
    <li>
      <a href="#getting-started">Getting Started</a>
      <ul>
        <li><a href="#prerequisites">Prerequisites</a></li>
        <li><a href="#installation">Installation</a></li>
      </ul>
    </li>
    <li><a href="#architecture-and-design-pattern">Architecture and Design Pattern</a></li>
    <li><a href="#usage">Usage</a></li>
    <li><a href="#contact">Contact</a></li>
  </ol>
</details>



<!-- ABOUT THE PROJECT -->
## About The Project

The AI Image Generation App is a cutting-edge and user-friendly software application crafted to utilize the potential of artificial intelligence for crafting remarkable and one-of-a-kind images from simple prompts. Furthermore, it allows users to download these generated images directly to their local devices for offline use.

### Built With

This project is build with these technologies.

[![Laravel][Laravel.com]][Laravel-url]
[![filament][Filament]][filament-url]
[![OpenAI][OpenAi]][OpenAI-url]
[![DallE][DallE]][DallE-url]


<!-- Features -->
## Features

-  Utilizing the ai, the application creates images from user inputs.
- The app conveniently stores all generated images in a personalized gallery for effortless retrieval.
- Users have the option to download any of the generated images to their devices.
- The application also provides the functionality to delete images as needed.


<!-- GETTING STARTED -->
## Getting Started

### Prerequisites

Before you can run this Laravel project, you'll need to install the following software:

- PHP v8.1 or later
- Composer v2.5.4 or later
- Laravel v10.0 or later
- MySQL

### Installation
#### General Installation
Please check the official laravel installation guide for server requirements before you start. [Official Documentation](https://laravel.com/docs/10.x)

1. Clone the repo

		git clone git@github.com:mhmohon/generate-image.git
	
2. Switch to the repo folder

		cd generate-image
	
3. Install all the dependencies using composer

		composer install
	
4. Copy the example env file and make the required ** configuration changes ** in the .env file

		cp .env.example .env
	
5. Create a sqlite database

		touch database/database.sqlite
	
6. Generate a new application key

		php artisan key:generate
	
7. Run the database migrations

		php artisan migrate --seed
	
8. Create a symlink to the storage

		php artisan storage:link
	
9. Run the server

		php artisan serve
	
10. Run the queue (**In another command tab**)

		php artisan queue:work

**Update the OPENAI_API_KEY value in .env file**

You can now access the server at http://localhost:8000/admin/login

#### Docker (Laravel sail) Installation
Please check if you have Docker and Laravel sail install. The official laravel sail installation guide for server requirements before you start. [Official Documentation](https://laravel.com/docs/10.x/sail)

**Must Have to Follow 1 to 5 steps of normal install.** 
After that follow bellow:

	
3. Run the laravle sail build command

		./vendor/bin/sail build
	 
4. Run the laravel saild up command

		./vendor/bin/sail up -d
	
5. Run the database migrations

		./vendor/bin/sail php artisan migrate --seed
	
6. Create a symlink to the storage

		./vendor/bin/sail php artisan storage:link
	
7. Run the queue (In another command tab)

		./vendor/bin/sail php artisan queue:work

**Update the OPENAI_API_KEY value in .env file**

You're ready to go! Visit the url with /admin/login in your browser, and login with:

-   **Username:** admin@gmail.com
-   **Password:** password

<!-- Architecture and Design Pattern -->
## Architecture and Design Pattern
#### Service Layer Pattern
I have chosen to use the Service Layer design patterns in my implementation of this application also used the **service interface** layer so that the code will be more abstract and increased testability, which make the application more modular, maintainable, and scalable.

#### Action Pattern
In an effort to enhance single responsibility and code organization, I've decided to implement the Action pattern for all the actions of this applications.

#### Other Technologies
#### OpenAI
OpenAI is a premier artificial intelligence research organization, widely recognized for its groundbreaking contributions in the field of natural language processing. Leveraging these advanced technologies, we will create prompts for generating images using other innovative technologies.

#### DALL·E
"DALL·E" is another remarkable creation, specifically designed for image generation. DALL·E harnesses the capabilities of deep learning and generative models to produce astonishing images from textual prompts. We will utilize this technology to generate images based on prompts.

<!-- USAGE EXAMPLES -->
## Usage
### Few Screenshots
##### Image Generate Page
![homepage.png](https://i.postimg.cc/hj1fy4r4/dashboard.png)
![addimage.png](https://i.postimg.cc/qRTNx62Z/addimage.png)
![viewimage.png](https://i.postimg.cc/cLPg6bCW/viewimage.png)



You can run **PHPStan** test by using this command

		./vendor/bin/phpstan analyse
	
**Result**

![phpstan][phpstan]


<!-- CONTACT -->
## Contact

Mosharrf Hossain - [@Linkedin](https://www.linkedin.com/in/mhmohon/) - mhmosharrf@gmail.com

Project Link: [https://github.com/mhmohon/generate-image](https://github.com/mhmohon/generate-image)



<!-- MARKDOWN LINKS & IMAGES -->
<!-- https://www.markdownguide.org/basic-syntax/#reference-style-links -->
[linkedin-url]: https://linkedin.com/in/mhmohon
[product-screenshot]: images/screenshot.png
[filament]: https://img.shields.io/badge/Filament-35495E?style=for-the-badge&logo=filament&logoColor=4FC08D
[OpenAI]: https://img.shields.io/badge/OpenAI-412991.svg?style=for-the-badge&logo=OpenAI&logoColor=white
[DallE]: https://img.shields.io/badge/DallE-74aa9c?style=for-the-badge&logo=openai&logoColor=white
[Laravel.com]: https://img.shields.io/badge/Laravel-FF2D20?style=for-the-badge&logo=laravel&logoColor=white
[OpenAI-url]: https://openai.com/
[DallE-url]: https://openai.com/dall-e-2
[filament-url]: https://filamentphp.com/
[Laravel-url]: https://laravel.com
[phpstan]: https://i.ibb.co/6wCLKxG/phpstan.png
[dashboard]: https://i.ibb.co/y6nBdbp/dashboard.png
