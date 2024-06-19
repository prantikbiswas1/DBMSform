# Project Setup Instructions

These instructions will guide you through setting up the project environment.

## Prerequisites

- Git installed on your system
- Docker Desktop installed
- Basic understanding of terminal commands

## Steps

1. First, pull the latest changes from the repository:
    ```bash
   git pull https://github.com/prantikbiswas1/2201AI28_CS260.git
    ```

   and move to proj1 directory
    

3. If you don't have Docker Desktop installed, download and install it from [Docker's official website](https://www.docker.com/products/docker-desktop).

4. Open Docker Desktop after installation.

5. Open your terminal and run the following command to start the containers:
    
    ```bash
   docker-compose up -d
    ```
    

7. In your database configuration file, replace dbconn host with your local IPv4 address.

8. Visit localhost:80 in your web browser to access the registration page.

9. Additionally, you can access the database using MyAdminer. Visit localhost:8080 in your web browser and use the following credentials:
    - *Username:* root
    - *Password:* example

## Additional Notes

- Make sure to keep your Docker Desktop running while working on the project.
- For any issues or assistance, feel free to reach out to us.
