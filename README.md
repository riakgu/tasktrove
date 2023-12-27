<h1 align="center">TaskTrove</h1>


<h2>Installation</h2>

1. Clone the repository

```bash
git clone https://github.com/riakgu/tasktrove.git
cd tasktrove
composer install
cp .env.example .env
```

2. Database configuration through the `.env` file

```conf
DB_DATABASE=tasktrove
DB_USERNAME=your-username
DB_PASSWORD=your-password
```

3. Chatbot configuration through the `.env` file

```conf
OPENAI_API_KEY=your-openai-api
PPLX_API_KEY=your-pplx-api
```

4. Migration

```bash
php artisan key:generate
php artisan migrate --seed
```

5. Run it locally

```bash
php artisan serve
```

6. Open `http://127.0.0.1:8000` in your browser
