# Docker in EC2

### Alternatively 
add to user data while creating the ec2 instance
```shell
#! /bin/sh
yum update -y
amazon-linux-extras install docker
service docker start
usermod -a -G docker ec2-user
chkconfig docker on
```

### Install

```shell
sudo yum update -y
sudo yum install docker -y
sudo service docker start
docker info
```

### 

### Create a docker group

```shell
sudo groupadd docker
```

### Add user to the docker group

```shell
sudo usermod -aG docker $USER
```
Restart
```shell
sudo systemctl restart docker
```

 ******* logout of ec2 ssh and login again ****** 

### Verify

```shell
docker run hello-world
```

```shell
groups
```

### Lastly 
Configure Docker to start on boot with systemd

```shell
sudo systemctl enable docker.service
sudo systemctl enable containerd.service
```


### Ref
https://docs.docker.com/engine/install/linux-postinstall/
