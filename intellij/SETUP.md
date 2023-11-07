
## Command-line interface
```shell
sudo touch /usr/local/bin/idea
```
Paste below code
```shell
#!/bin/sh

open -na "IntelliJ IDEA.app" --args "$@"
```

Make it executable

```shell
sudo chmod +x /usr/local/bin/idea
```

Reload
```shell
exec zsh
```
