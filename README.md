# CRUD - Test Project.

Step 1: Install Vensors
    - composer install

Step 2: Setup Database Configuration
    - Install Mysql in your system <br/>
    - Connect your Mysql Server <br/>
    - Create a DB with named "db_test" ( You can change the DB name in the .env file )

Step 3: Create Migration
<pre><code>php artisan migrate</code></pre>
<pre><code>php artisan db:seed</code></pre>

Step 4: Run Laravel 10 Project
<pre><code>php artisan serve</code></pre>
    
Step 5: Test Project
    - Login to the test project with "admin" user.
    - Password is "123456"
    - You can register new users and create some tests.
