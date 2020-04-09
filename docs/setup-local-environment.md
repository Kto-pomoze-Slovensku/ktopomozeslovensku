# Setup local environment

# Windows

## Prerequisites
Before setuping the project locally the following prerequisites will be needed. Please download and install them before continuing with Step 1.

1. Git for Windows ([Download](https://git-scm.com/download/win))
2. Docker Desktop for Windows ([Download](https://hub.docker.com/editions/community/docker-ce-desktop-windows/)). After installation enable File sharing by opening Docker -> Settings -> Resources -> File sharing -> check disk name which will contain cloned repository.
3. Code editor/IDE (Visual Studio Code, PhpStorm, ...)
4. Internet browser (Google Chrome, Firefox, Microsoft Edge, Safari, ...)

## Step 1 - Clone code repository
Navigate to the folder where you would like to clone the code from the github repository using your preferred command line tool (e.g. git bash) and run:

```
git clone https://github.com/Kto-pomoze-Slovensku/ktopomozeslovensku.git
```

## Step 2 - Create .env file with environment variables
Navigate to the root folder of your cloned repository and create and save .env file with following contents:
```
SYMFONY_DEPRECATIONS_HELPER=999999
DATABASE_URL="mysql://project:Password1@ktopomozeslovensku-mysql:3306/project?serverVersion=5.7"
ADMIN_PWD=''
SENTRY_DSN=''
```
## Step 3 - Build and run Docker containers
Navigate to the root folder of your cloned repository via preferred command line tool and run:
```
docker-compose up -d
```

If you encounter  'Drive has not been shared' error make sure that File sharing has been enabled in Docker, see Prerequisites.

## Step 4 - Install Symfony dependencies for the ktopomozeslovensku-php service
Navigate to the root folder of your cloned repository via preferred command line tool and run:
```
docker exec -it ktopomozeslovensku-php bash
```

This will open the bash command line interface for the ktopomozeslovensku-php service running in Docker. To install required dependencies run:
```
composer i
```

## Step 5 - Create database table structure using Doctrine migrations
From the ktopomozeslovensku-php command line still opened in Step 4 run:
```
php ./bin/console doctrine:migrations:migrate
```

## Step 6 - install front end dependencies
Navigate to the root folder of your cloned repository and run:
```
yarn
```

## Step 7 - Test local setup
Open your preferred browser and enter url:
```
localhost:8888
```