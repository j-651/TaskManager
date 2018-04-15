
# Welcome to TaskManager!
Hi, and welcome to **TaskManager**! TaskManager is, well, a *simple* task manager to help you stay organized and get things done.

> **NOTE**: TaskManager does not yet have its own website. Therefore, please refer to the *Installation* guide below to use it locally (offline).

## Screenshots
> Task Dashboard:
![Manage Tasks](https://user-images.githubusercontent.com/35548468/38783051-0540c036-40cb-11e8-9dc0-92e538cbdc3f.png)

> Task Details:
![Task Details](https://user-images.githubusercontent.com/35548468/38783079-619544b0-40cb-11e8-83fb-8a425d7c9040.png)

> Create Task:
![Create Task](https://user-images.githubusercontent.com/35548468/38783104-b35c2822-40cb-11e8-9a32-ee46d1e03ab1.png)

> Edit Task:
![Edit Task](https://user-images.githubusercontent.com/35548468/38783088-949d8eee-40cb-11e8-898a-a169f54c8af1.png)

## How it's made

TaskManager is made up of many wonderful frameworks/packages, including:

- Back End:
	-  [Laravel](https://github.com/laravel/laravel) (PHP framework)
- Front End:
	-  [Vue.js](https://github.com/vuejs/vue) (JavaScript framework)
	-  [Bulma](https://github.com/jgthms/bulma) (CSS framework)
	-  [Buefy](https://github.com/buefy/buefy) (Vue.js component system for Bulma)
	- and more!

### Lines of Code
***Table 1*** shows the lines of code in the root directory, excluding all files within the `node_modules`, `tests`, and `vendor` folders.

**Language**|**Files**|**Blank**|**Comment**|**Code**
-----:|:-----:|:-----:|:-----:|:-----:
*PHP*|70|464|1313|2109
*Blade*|8|48|3|587
*Sass*|6|44|13|289
*JSON*|3|0|0|86
*JavaScript*|7|29|65|40
*XML*|1|1|0|31
*Vuejs Component*|1|2|0|21
*CSS*|1|1|0|2
**TOTAL:**|**97**|**589**|**1394**|**3165**
---
***Table 2*** shows the lines of code in the `public` directory.

**Language**|**Files**|**Blank**|**Comment**|**Code**
-----:|:-----:|:-----:|:-----:|:-----:
*PHP*|1|11|39|10
*JSON*|1|0|0|4
*CSS*|1|1|0|2
*JavaScript*|1|0|0|1
**TOTAL:**|**4**|**12**|**39**|**17**

> **NOTE**: The above data was created using [CLOC](http://cloc.sourceforge.net) (Count Lines of Code).

# Installation
## Prerequisites/Requirements
- A web server capable of running PHP >= 7.0, Laravel >= 5.0, and a MySQL database. (recommended for running locally: [Ampps](https://www.ampps.com/))
-  [Yarn](https://yarnpkg.com/) installed
-  [Composer](https://getcomposer.org/) installed

## Install

Installing TaskManager locally is easy and can be done in just a few quick steps.

1. Clone this repository directly where you want it, or clone it somewhere else and copy it to its final destination:
	`git clone https://github.com/j-651/TaskManager.git`

2. Install all dependencies via Yarn and Composer. In your terminal, open the cloned repository (`TaskManager`). Type `yarn install && composer install && php artisan storage:link`. ***NOTE:** This may take several minutes.*

3. In TaskManager's root directory (`/TaskManager`), copy the `.env.example` file and name it `.env`. Now, open it up and insert your MySQL database credentials and update `APP_URL` (if different).

4. In youur terminal at TaskManager's root directory, type `php artisan key:generate`. This will auto-generate the `APP_KEY` field in your `.env` file.

5. In your database manager, create the database with the name chosen in your newly created `.env` file (default: `task_manager`). Back in your terminal at TaskManager's root directory, type `php artisan migrate`. This will add the necessary tables to your database.

6. Let's get the site loaded! In your terminal, type `php artisan serve`. This will start up your server, typically at `localhost:8000` *(`127.0.0.1:8000`)*, so you can start using TaskManager! Just open your browser at that address and you're on your way to managing tasks!

7. If you have any issues with the above, please [open an issue](https://github.com/j-651/TaskManager/issues).

# Usage
To launch TaskManager locally, open your terminal at TaskManager's root directory and type `php artisan serve`. In your browser, navigate to where it's being served, typically at `localhost:8000` or `127.0.0.1:8000`.

> **NOTE**: TaskManager is still in development. Some features may not be documented or fully implemented *(some people call these bugs, so please open an issue if you encounter one)*.

# Contributing
If you would like to contribute to TaskManager, please [fork this repository](https://help.github.com/articles/fork-a-repo/) and/or create [pull requests](https://github.com/j-651/TaskManager/pulls).

If you notice a bug or want to request a feature, please check the [issue tracker](https://github.com/j-651/TaskManager/issues).

# License
TaskManager's source code is released under the [MIT License](https://opensource.org/licenses/MIT). If modifiying and/or using in your own projects, please provide credit to TaskManager. Thanks!