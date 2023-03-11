## Image Generator with OpenAI
This is a Laravel web application that generates images using OpenAI's GPT-3 language model.

### Requirements
* PHP >= 8.1
* Composer
* OpenAI API Key

### Installation
1. Clone the repository:
```
git clone https://github.com/khalequzzaman17/ai-image.git
```

2. Install the dependencies:
```
cd image-generator
composer install
```

3. Copy the `.env.example` file to `.env`:
```
cp .env.example .env
```

4. Set your OpenAI API key in the `.env` file:
```
OPENAI_API_KEY=your-api-key
```

5. Generate an application key:
```
php artisan key:generate
```

6. Start the development server:
```
php artisan serve
```

### Usage
1. Access the application in your browser at `http://localhost:8000/`.
2. Enter a description of the image you want to generate and click "Generate".
3. Wait for the image to be generated.
4. Click "Download Image" to download the image.

Note: If you want to force the web app with SSL, set the `APP_ENV` variable to `production` and modify the `APP_URL` variable in the `.env` file.

### License
This project is open-sourced software licensed under the MIT license.
