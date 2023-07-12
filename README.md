# docker-compose

To get started, make sure you have [Docker installed](https://docs.docker.com/desktop/install/windows-install/) on your system, and then clone this repository.

1. Navigate in your terminal to the directory you cloned this
2. copy `.env.example` to `.env` and fill in the data 
3. spin up the containers for the web server by running `docker-compose up -d --build`

### Default docker command 
- `docker-compose up -d` - lifts containers 
- `docker-compose down` - lowers containers
- `docker-compose up -d --build` - re-build containers
- `docker system prune -a --volumes` - delete all cache
- `docker exec -it <container name> ("bash" or "/bin/sh" or "/bin/bash")` - open terminal inside container
- `docker ps` - display lifts container, `docker ps -a` display all containers

### Container ports

- **nginx** - `:80`
- **mysql** - `:3306`
- **php** - `:9000`
- **node** - `:3000`
- **phpmyadmin** - `:8080`
> http://localhost:`port`

### laravel init
Navigate in your backend directory and run this command: 
```bash
php artisan key:generate
php artisan storage:link
php artisan optimize:clear
```
