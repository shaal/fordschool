# University of Michigan Ford School

This is the development repository for *University of Michigan Ford School* Drupal 8 website.
It contains the codebase and an environment to run the site for development. Drupal 7 version of the site can be locally built as well.

## Table of Contents

* [Development Environment](#development-environment)
* [Getting Started](#getting-started)
* [How do I work on this?](#how-do-i-work-on-this)
* [Drupal Development](#drupal-development)
* [Deployment](#Deployment)
* [Styleguide Development](#styleguide-development)
* [Additional Documentation](#additional-documentation)

## Development Environment

The development environment is based on [palantirnet/the-vagrant](https://github.com/palantirnet/the-vagrant).
To run the environment, you will need:

* Mac OS X >= 10.13. _This stack may run under other host operating systems, but is not regularly tested.
For details on installing these dependencies on your Mac,
see our [Mac setup doc [internal]](https://github.com/palantirnet/documentation/wiki/Mac-Setup)._
* [Composer](https://getcomposer.org)
* [virtualBox](https://www.virtualbox.org/wiki/Downloads) >= 5.0
* [ansible](https://github.com/ansible/ansible) `brew install ansible`
* [vagrant](https://www.vagrantup.com/) >= 2.1.0
* Vagrant plugins:
  * [vagrant-hostmanager](https://github.com/smdahlen/vagrant-hostmanager) `vagrant plugin install vagrant-hostmanager`
  * [vagrant-auto_network](https://github.com/oscar-stack/vagrant-auto_network) `vagrant plugin install vagrant-auto_network`

If you update Vagrant, you may need to update your vagrant plugins with `vagrant plugin update`.

## Getting Started

1. Clone the project from github: `git clone https://github.com/palantirnet/fordschool.git`
2. (*Drupal 7, optional*) Download Drupal 7 assets such as database copy and files from shared Box space. Link to [Box](https://app.box.com/folder/110397589252).
  - Place your compressed db copy in the `web7/assets/database` directory (`drupal_7_prod.sql.gz`).
  - Download the `files.zip` and uncompress the zip file. Copy the `files` directory to the `site/default` directory. Your files directory path should look like this:

  	```
  	web7/docroot/sites/default/files
  	```

1. From inside the project root, run:

  ```
    vagrant up
  ```
3. You will be prompted for the administration password on your host machine and a Vault password. You can find the vault password in 1Password, under Clients category (*University of Michigan Ford School Ansible Vault*).
5. Log in to the virtual machine (the VM): `vagrant ssh`
6. (*Drupal 7, optional*) Navigate to the root directory in the VM and load Drupal 7 database to import and prepare Drupal 7 database:

 ```
 cd /var/www/fordschool.local
 phing load-d7-database
 ```

6. From within the VM, build and install the Drupal 8 site: `phing install`
7. Visit your site at:
 - [https://fordschool.local](https://fordschool.local) for Drupal 8 site
 - [https://d7.fordschool.local](https://d7.fordschool.local) for Drupal 7 site

 Both Drupal 7 and Drupal 8 sites will use `admin` \ `admin` as the username and password.


## How do I work on this?

You can edit code, update documentation, and run git commands by opening files directly from your host machine.

To run project-related commands other than `vagrant up` and `vagrant ssh`:

* SSH into the VM with `vagrant ssh`
* You'll be in your Drupal 8 project root, at the path `/var/www/fordschool.local/`
* Drupal 7 project root will be located at `/var/www/d7.fordschool.local/`

To work on the styleguide:

* @todo TBA when styleguide is added to the repo.

### Drupal Development

You can refresh/reset your local Drupal site at any time. SSH into your VM and then:

##### Drupal 8 build

1. Download the most current dependencies: `composer install`
2. Rebuild your local CSS and Drupal settings file: `phing build`
3. Reinstall Drupal: `phing install` (this will run `build` implicitly)
4. Running `phing list` will display other Phing tasks.
5. You can run Drupal 8 specific drush commands in `/var/www/fordschool.local/` directory.

##### Drupal 7 build
*Optional, setup as a source for migration work only*

1. First, navigate to Drupal 7 directory (`web7`). it will be located at `/var/www/fordschool.local/web7` in your VM.
2. Download the most current dependencies: `composer install`
3. Reload Drupal 7 database: `phing load-d7-database` (this will be run from `/var/www/fordschool.local/`.
4. You can run Drupal 7 specific drush commands in `/var/www/d7.fordschool.local/` directory.

**Note:** Drupal 7 build is currently used in this project for migrations. Development work is not expected for Drupal 7 build.

Additional information on developing for Drupal within this environment is in [docs/general/drupal_development.md](docs/general/drupal_development.md).

## Deployment

@todo This section needs to be customized per-project.

## Styleguide Development

@todo

## Additional Documentation

Project-specific:

* [Technical Approach](docs/technical_approach.md)

General:

* [Drupal Development](docs/general/drupal_development.md)
* [Styleguide Development](docs/general/styleguide_development.md)

----
Copyright 2020 Palantir.net, Inc.
