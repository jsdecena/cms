## Simple Laravel Blog

## Installation

- Step1: Add this to your root `composer.json` 

```json

	"require": {
	    "jsd/blog": "1.0"
	}

```

- Step2: Add this to your `config/app.php` in `providers` array

```json

	'providers' => [
	    Jsd\Blog\BlogServiceProvider::class,
	]

```

- Step3: Run this in your terminal `php artisan vendor:publish`

- Step4: Rename .env.example to .env and set your DB credentials

- Step5: Run this in your terminal `php artisan key:generate`

- Step6: Uncomment the `UsersTableSeeder::class` call in `/database/seeds/DatabaseSeeder.php`

- Step7: Run this in your terminal `php migrate --seed`

- Step8: Enjoy!
