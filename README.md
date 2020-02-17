# Requirements: 

Tu run project You simply need git and docker with docker-compose installed on Your machine

# Setting up project

To set up Your local instance of this app. please clone git repository. Once this is done please
go to project root directory. From there please run `./build_project.sh` This command will create 
and run desired app container.

# How to run command for data scrapping:

In order run data scrape command please go to main app directory. From there please run 
`bin/console scraper:scrape-data`

# How to run tests:

If You would like to verify if app is working fine please go to app root directory.
From there please run `./bin/phpunit`

# Notes:

Please check TODOs list. There is couple of comments regarding future improvements, refactorization.
This app was build in order to show ability of coding and preparing app architecture. Some
aspects were skipped intentionally in order to keep app as simple as possible despite that
complete functionality requested in task description has been covered.

In the future, if the app would be developed further in terms of web data scrapping.
I would suggest to go with separate container with running Selenium. Then it would be possible
to connect to Selenium from app code and use webdriver to scrape data. That would solve all of the problems
related to dynamically loaded data for example.