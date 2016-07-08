## Simple Laravel CMS

##### This CMS is a basic bootstrap application to make your web development up and running almost instantly. It includes basic User Authentication, User, Page, Post and Category CRUD. 

##### Thanks to [ADMIN LTE](https://almsaeedstudio.com/preview) for the awesome dashboard look!

### Installation

- Step1: Add this to your root `composer.json`

```json

	"require": {
	    "jsdecena/cms": "2.0.*"
	}

```

- Step2: Add this to your `config/app.php` in `providers` array

```json

	'providers' => [
	    Jsdecena\Cms\CmsServiceProvider::class,
	]

```

- Step3: Run this in your terminal `php artisan vendor:publish`

- Step4: Rename `.env.example` to `.env` and set your database credentials

- Step5: Run this in your terminal `php artisan key:generate`

- Step6: Uncomment the `UsersTableSeeder::class` call in `/database/seeds/DatabaseSeeder.php`

- Step7: Add these lines in the `/database/seeds/DatabaseSeeder.php`

```json

    $this->call(PageTableSeeder::class);
    $this->call(PostTableSeeder::class);

```

- Step8: Run this in your terminal `composer dump-autoload && php artisan migrate --seed && php artisan serve`

- Step9: Go to [http://localhost:8000/blog](http://localhost:8000/blog) OR

- Step10: Go to [http://localhost:8000/admin](http://localhost:8000/admin) for backend login

- Step11: Use this credentials to login: email: `john@doe.com` | password: `Testing123`

- Enjoy!
