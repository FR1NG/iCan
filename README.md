# iCan
## youcan full-stack software engineer challenge
this project built following psr2 standards on docker environment using laravel sail package, with unit tests.

the unit tests and psr stadnards are checked on github action on each time a pull request made to the master branch

# Table of Contents

- [Requirement](#requirement)
- [Installation](#installation)
- [Features](#features)
- [Usage](#usage)
- [Contributing](#contributing)
- [License](#license)

# Requirement {#requirement}
- Docker
- docker-compose
- Composer
- php >=8.1.0

# Installation {#installation}
#### 1. Clone the Repository:
```bash
    git clone https://github.com/FR1NG/iCan.git
```
#### 2. Install dependencies:
```bash
cd iCan && composer insatall
```
#### 3. Configure Environment Variables:
Copy the .env.example file to .env and configure the necessary environment variables for production, such as database settings and any other project-specific settings.

#### 4. Start Sail and build front-end:
run this command to run the containers on detached mode

```bash
./vendor/bin/sail up -d
```
to run the front-end on dev mode run this command:
```
./vendor/bin/sail npm run dev
```
to build front-end for production run this command:
```
./vendor/bin/sail npm run build
```
#### 5. Generate Applicaton key:
```bash
./vendor/bin/sail artisan key:generate
```
#### 6. Database Migration:
```bash
./vendor/bin/sail artisan migrate
```
#### 7. Testing:
for unit tests run: 
```bash
./vendor/bin/sail artisan test
```
to check psr standars run:

```bash
./vendor/bin/phpcs --standard=PSR2 app
```

# Features {#features}
- Ability to create a product (from web and cli)
- A listing products with ability to sort by price, or/and filter by a category (from web)

# Usage {#usage}
##### 1. web:
- for the web part `sail` serve the applicatoin by default on port 80.
- please make sure port 80 and 3306 are not in use on your machine.
- visit `http://loalhost` and check out the application
##### 1. cli:
since the application is build on docker environment we will be using sail to execute commands inside the container

to creaate a product from the CLI run this command:
```
./vendor/bin/sail artisan product:create
```



# Contributing {#contributing}
- Respect of software engineering principles : DRY, KISS, YAGNI, SOLID.
- Code readability and coding style (PSR).
- Clean commit history in git making code review easy, push progressively instead of pushing the whole project in a single commit.
- Quality of documentation (The readme should be short and concise, like open source projects readme).


# License {#license}
    This project is licensed under the terms of the MIT License.
