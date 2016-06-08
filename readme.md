## Simple Laravel Blog

### This is a simple blogging package that can be quickly installed by anyone.

## Installation

- Step1: Add this to your root `composer.json`  OR Run `composer require jsd/blog dev-master`

```json

	"require": {
	    "jsd/blog": "1.0.*"
	}

```

- Step2: Add this to your `config/app.php` in `providers` array

```json

	'providers' => [
	    Jsd\Blog\BlogServiceProvider::class,
	]

```

- Step3: Run this in your terminal `php artisan vendor:publish`

- Step4: Rename `.env.example` to `.env` and set your database credentials

- Step5: Run this in your terminal `php artisan key:generate && composer dump-autoload`

- Step6: Uncomment the `UsersTableSeeder::class` call in `/database/seeds/DatabaseSeeder.php`

- Step7: Run this in your terminal `php artisan migrate --seed && php artisan serve`

- Step8: Go to [localhost:8000/blog](localhost:8000/blog)

- Step9: Go to [localhost:8000/admin](localhost:8000/admin) for backend login

- Step10: Use this credentials to login: email: `john@doe.com` | password: `Testing123`

- Enjoy!
