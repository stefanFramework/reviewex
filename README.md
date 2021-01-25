# Reviewex

### Instructions

1. Build Image
```
sh entrypoint.sh build 
```

2. Start docker containers
```
docker-compose up -d
```

3. Create vendor folders
```
sh entrypoint.sh composer install 
```

4. Create Application Key
```
sh entrypoint.sh artisan key:generate 
```
  
5. Run application
```
sh entrypoint.sh start
```

6. Run Migrations
```
sh entrypoint.sh artisan migrate
```

7. Seed Database
```
sh entrypoint.sh artisan db:seed
```
  
### Basic Usage
  
```
http:localhost:7085/home
```
