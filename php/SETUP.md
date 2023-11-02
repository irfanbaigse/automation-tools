

```shell
brew tap shivammathur/php
brew install php@8.1
brew install php@7.4
brew install pkg-config
```


### Install phpenv
```shell
curl -L https://raw.githubusercontent.com/phpenv/phpenv-installer/master/bin/phpenv-installer | bash
```

Add to your .zshrc file & restart zsh `exec zsh`

```shell
export PHPENV_ROOT="/Users/irfan.baig/.phpenv"
if [ -d "${PHPENV_ROOT}" ]; then
  export PATH="${PHPENV_ROOT}/bin:${PATH}"
  eval "$(phpenv init -)"
fi
```

### Link each version of php installed by brew to ~/.phpenv/versions

```shell
curl -fsSL https://gist.githubusercontent.com/yuki777/6244823b8aa8cf4457e97e6407ada5ad/raw/e988f8a1c112e4063768664104ba14d799e63782/link-phps.bash | bash
```

source

```shell
#!/usr/bin/env bash

set -au

## Check cellar dir
cellarDir=$(brew --prefix)/Cellar
if [ ! -d "$cellarDir" ]; then
  echo "Not found. brew package path $cellarDir :("
  echo
  exit 1
fi

parentDirs=$(find $cellarDir/php* -type d -maxdepth 0)
echo "# Link the php installed by Brew to ~/.phpenv/versions"
for parentDir in $parentDirs
do
  childDirs=$(find "$parentDir"/* -type d -maxdepth 0)
  for childDir in $childDirs
  do
    phpPath=$childDir/bin/php
    if [ ! -f "$phpPath" ]; then
      continue
    fi
    major=$($phpPath -r 'echo PHP_MAJOR_VERSION;')
    minor=$($phpPath -r 'echo PHP_MINOR_VERSION;')
    patch=$($phpPath -r 'echo PHP_RELEASE_VERSION;')

    # unlink
    rm -f "$HOME"/.phpenv/versions/"$major"."$minor"
    rm -f "$HOME"/.phpenv/versions/"$major"."$minor"."$patch"

    # link
    linkCommand="ln -s $childDir $HOME/.phpenv/versions/$major.$minor"
    echo "$linkCommand"
    $linkCommand
    linkCommand="ln -s $childDir $HOME/.phpenv/versions/$major.$minor.$patch"
    echo "$linkCommand"
    $linkCommand
  done
done
```





### Notes on brew upgrade
Run again

```shell
curl -fsSL https://gist.githubusercontent.com/yuki777/6244823b8aa8cf4457e97e6407ada5ad/raw/e988f8a1c112e4063768664104ba14d799e63782/link-phps.bash | bash
```

## Refer

[yuki777 setup](https://dev.to/yuki777/install-multiple-php-versions-and-automatically-switch-versions-for-each-directory-1jop?signin=true)
