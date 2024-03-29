#!/bin/sh

file_exists() {
    FILE=$1; shift
    if [ -f "$FILE" ];
    then
        # File does exist
        return 0
    fi

    return 1
}

print_bold() {
    MESSAGE=$1; shift
    echo "\033[1;32m$MESSAGE\033[0m"
}

help() {
   print_bold "Available Commands"
    echo ""
    echo "\033[1;34mbuild\033[0m\t\tBuild all the images"
    echo "start\t\tRuns all the containers"
    echo "\033[1;34mstop\033[0m\t\tStops all the containers"
    echo "restart\t\tRestart all the containers"
    echo "\033[1;34mlogs\033[0m\t\tExecutes a tail -f to the application logs"
    echo "artisan\t\tExecutes an artisan command (Except for tinker)"
    echo "\033[1;34mtinker\033[0m\t\tExecutes a tinker interface"
    echo "composer\tExecutes composer commands"
    echo "\033[1;34mnpm\033[0m\t\tExecutes npm commands"
    echo "clear\t\tClears the cache"
    echo ""
}

build() {

    if ! file_exists "docker-compose.yml"
    then
        echo "Creating docker-compose.yml"
        cp docker-compose.yml.example docker-compose.yml
    fi

    if ! file_exists "app/.env"
    then
        echo "Creating app/.env"
        cp app/.env.example app/.env
    fi

    print_bold "Building ..."
    docker-compose build
    print_bold "Building Succesfull"
}

start() {
  docker-compose up -d
}

stop() {
  docker-compose down
}

restart() {
  stop
  start
}

logs() {
  docker logs -f reviewex_web
}

artisan() {
  docker exec reviewex_web php artisan $@
}

tinker() {
  docker exec -it reviewex_web php artisan tinker
}

composer() {
  docker exec reviewex_web composer $@
}

npm() {
  docker exec reviewex_web npm $@
}

clear() {
    artisan cache:clear
    artisan route:cache
    artisan config:cache
    artisan view:clear 
}


COMMAND=$1; shift
case $COMMAND in
    build)
        build
    ;;
    start)
        start
    ;;
     stop)
        stop
    ;;
    restart)
        restart
    ;;
    artisan)
        artisan $@
    ;;
    clear)
        clear
    ;;
    tinker)
        tinker
    ;;
    logs)
        logs
    ;;
    composer)
        composer $@
    ;;
    npm)
        npm $@
    ;;
    help)
        help
    ;;
    *)
        help
        echo "Invalid command $COMMAND"
        exit 1
    ;;
esac