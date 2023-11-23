# Mysql Docker Setup

## Wake Up Container in Background
```shell
docker-compose up --build -d
```

## List Contianer
```shell
docker-compose ps
```

## Login
```shell
docker exec -it docker-mysql-db bash

mysql -u root -p root
```


