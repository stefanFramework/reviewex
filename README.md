# Reviewex

### Instructions

1. Build Image
```
sh entrypoint.sh build 
```
  
2. Create Application Key
```
sh entrypoint.sh artisan key:generate 
```
  
3. Run application
```
sh entrypoint.sh start
```

4. Run Migrations
```
sh entrypoint.sh artisan migrate
```

5. Seed Database
```
sh entrypoint.sh artisan db:seed
```
  
### Basic Usage
  
```
http:localhost:7085/home
```
