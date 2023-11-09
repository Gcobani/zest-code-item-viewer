## How to run
 - Create `.env` file by copying the `env.example`
 - Generate application key by running `php artisan key:generate`
 - Create database by creating a new `database.sqlite` in the `\database` directory
 - Run migration and seed the database by running `php artisan migrate --seed`
 - Link the two domains to laravel herd/valet by running `herd link harry.zest-code-item-viewer.test` and `herd link zest-code-item-viewer.test`
 - Visit `zest-code-item-viewer.test/register` to register a new User
 - Visit `zest-code-item-viewer.test/login` to login and interact with the app
