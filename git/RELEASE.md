# Release from Commandline

### Get Current Tag for Current Branch
```shell
git describe --abbrev=0 --tags
```

### Create a Release Tag

```shell
git tag 1.0.0
```
### Push and Generate Release Notes

```shell
git push --tags && gh release create 1.0.0 --generate-notes
```

### Requisite 

```shell
brew install gh
```
