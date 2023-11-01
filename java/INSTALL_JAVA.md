


brew install jenv

add to ~/.zshrc
```shell
export PATH="$HOME/.jenv/bin:$PATH"
eval "$(jenv init -)"
```

jenv doctor

jenv enable-plugin export

Reload the zsh 

brew tap adoptopenjdk/openjdk
brew install --cask adoptopenjdk/openjdk/adoptopenjdk8


jenv add "$(/usr/libexec/java_home)"
jenv versions
jenv global openjdk64-11.0.11

echo ${JAVA_HOME}

ls -1 /Library/Java/JavaVirtualMachines

jenv add /Library/Java/JavaVirtualMachines/adoptopenjdk-8.jdk/Contents/Home/

For 17

brew install --cask temurin17

jenv add /Library/Java/JavaVirtualMachines/temurin-17.jdk/Contents/Home/


