# TECH STACK
- PHP 8.4.7
- Composer 3


### HOW TO RUN:
1. Don't forget to adjust env file
2. Build app with docker
```sh
     docker build -t ghcr.io/jrione/it-edu:latest -f containerized/Dockerfile .
```
3. Run Application
- With Docker
```sh
    docker run -d -p 8080:8080 \
        --name "it-edu" \
        -v /mnt/it-edu/writable:/var/www/html/writable \
        -v /mnt/it-edu/env/.env:/var/www/html/.env:ro \
        ghcr.io/jrione/it-edu:latest 
```