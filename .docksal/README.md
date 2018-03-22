# Docksal

Docksal configuration is included in the .docker directory.

## Requirements

------------
* [virtualBox](https://www.virtualbox.org/wiki/Downloads) >= 5.1.x
* [docksal](http://docksal.readthedocs.io/en/master/getting-started/env-setup/) >= 1.6

## Getting Started

------------------

1. From inside the project root, run `fin init`
  * You will be prompted for the administration password on your host machine.
2. Grab fresh coffee or hot tea
  * This takes around ~10 minutes to set everything up
4. Visit `pantheon-demo.docksal` in your browser of choice.
  
### Optional (But nice to have)
1. enable bash autocomplete for fin and fin commands
  * cd into the project root
  * `fin update --bash-complete`
  
### Troubleshooting install
* docksal errors out and says it can't find a Drupal root
* Sometimes the install script tries to proceed before the database is fully initialized
  * Try re-running `fin init`
* Unable to navigate to project url
  * Verify you are using the correct URL
    * `fin config show | grep VIRTUAL_HOST`
* Confirm none of your containers are stopped
  * `fin status`
* Trying restarting the http-proxy service
  * `fin reset proxy`
  
## How do I work on this?

------------------

1. Navigate to http://pantheon-demo.docksal
2. From inside the project root `fin` to see a list of available commands
   - `fin drush`
   - `fin uli`
3. fin acts as a wrapper to pass commands to the various running servers, 
so there's no need to log into the VM

### Code Structure
The web root lives within the /web directory.  It contains a full Drupal
installation that gets deployed to various hosting platforms to power dev,
test, staging, live, and multidev websites.  The project runs Drupal 7.

## Email

Coming soon...

## Testing

Coming soon...