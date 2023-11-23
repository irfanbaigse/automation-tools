# Nodejs Setup

### Install nvm (Node version manager)
```shell
brew install nvm
```

### Checkout the LTS versions
```shell
nvm ls
```

### Install Nodejs latest version
Node 20v
```shell
nvm install lts/iron
```

### Install pnpm
```shell
npm i -g pnpm
```


### Set up pnpm home
```shell
# pnpm
export PNPM_HOME="/Users/irfan.baig/Library/pnpm"
case ":$PATH:" in
  *":$PNPM_HOME:"*) ;;
  *) export PATH="$PNPM_HOME:$PATH" ;;
esac
# pnpm end
```
