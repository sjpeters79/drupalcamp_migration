# drupalcamp_migration

After colony 191, after having defeated most of everyone, the pilots have now retired and have gone on speaking tours.

## DrupalCamp Data Migration

Please use `drush` to run the migration. Some common migrations are:

```
drush ms = migration status
drush mi <migration group name> = migrate import
drush mr <migration group name> = migrate rollback
drush mr --all = rollback all migrations
```

### Other drush commands:

Use the following if a migration error of 'killed' is returned
```
drush migrate-stop
drush migrate-reset-status (mrs)
```

### Notes:

Drupal migrations are configurations and as such they don't automatically get updated if you happen to change the files.
Easiest way to update the configurations is to run
```
drush pm-uninstall <feature/module name> -y
drush en <feature/module name> -y
```

This will remove the configs and then install them again.
