# Jenkins Deploy Remote Branch

## Get Crumb

```shell
curl -s -u <user>:<token> https://jenkins.elaa.io/crumbIssuer/api/json
```

Sample response

```json
{"_class":"hudson.security.csrf.DefaultCrumbIssuer","crumb":"e60b533c45d396b11f02b496ae456799300a1f280ccfc0c7b4fcbc0d99457887","crumbRequestField":"Jenkins-Crumb"}
```

value `e60b533c45d396b11f02b496ae456799300a1f280ccfc0c7b4fcbc0d99457887` to be passed in header

## Run in Directory

```shell
php deploy.php
```
