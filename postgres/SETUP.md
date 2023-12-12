# Postgres Install

### Install using brew
```shell
brew install postgresql@15
```

### Create links for `psql` & `initdb`
```shell
sudo ln -s $(brew --prefix)/opt/libpq/bin/psql /usr/local/bin/psql
sudo ln -s /opt/homebrew/opt/postgresql@15/bin/initdb /usr/local/bin/
```

### Add to zsh profile
```shell
 echo 'export PATH="/opt/homebrew/opt/postgresql@15/bin:$PATH"' >> /Users/{yourusername}/.zshrc
```

### Run to connect
```shell
initdb --locale=C -E UTF-8 /opt/homebrew/var/postgresql@15
/opt/homebrew/opt/postgresql@15/bin/initdb --locale=C -E UTF-8 /opt/homebrew/var/postgresql@15
```

if above command fails

```shell
brew link --overwrite postgresql
```

```shell
psql postgres # connect this should work
```

### Issues
```shell
sudo vi postgresql.conf # to enable port
# find and uncomment
port = 5432                             # (change requires restart)
```

```shell
rm /opt/homebrew/var/postgresql@15/postmaster.pid
```

### Restart

```shell
brew services restart postgresql@15
```
### Connect

`psql -d postgres`
