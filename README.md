<p align="center">
     <img src="https://cdn.rawgit.com/j-651/a959cd6ac494730b3ac69d7f2699476e/raw/a8b8b12c37d5c844ba62499fa4709b225f750314/taskmanager-logo.svg" alt="TaskManager Logo">
     <br>
     Latest Version: <b>v0.1.0</b>
</p>

# Welcome to TaskManager!
Hi, and welcome to **TaskManager** ("TM")! TM is, well, a *simple* task manager to help you stay organized and get things done.

> **NOTE**: TaskManager does not yet have its own website. Therefore, please refer to the ***Installation*** guide below to use it locally (offline).

## Screenshots
> Task Dashboard (v0.1.0-beta.1):
![Manage Tasks](https://user-images.githubusercontent.com/35548468/38783051-0540c036-40cb-11e8-9dc0-92e538cbdc3f.png)

> Task Details (v0.1.0-beta.1):
![Task Details](https://user-images.githubusercontent.com/35548468/38783079-619544b0-40cb-11e8-83fb-8a425d7c9040.png)

> Create Task (v0.1.0-beta.1):
![Create Task](https://user-images.githubusercontent.com/35548468/38783104-b35c2822-40cb-11e8-9a32-ee46d1e03ab1.png)

> Edit Task (v0.1.0-beta.1):
![Edit Task](https://user-images.githubusercontent.com/35548468/38783088-949d8eee-40cb-11e8-898a-a169f54c8af1.png)

## How it's made

TaskManager is made up of many wonderful frameworks/packages, including:

- Back End:
	-  [Laravel](https://github.com/laravel/laravel) (PHP framework)
- Front End:
	-  [Vue.js](https://github.com/vuejs/vue) (JavaScript framework)
	-  [Bulma](https://github.com/jgthms/bulma) (CSS framework)
	-  [Buefy](https://github.com/buefy/buefy) (Vue.js component system for Bulma)
	- [Laravel Mix](https://github.com/JeffreyWay/laravel-mix) (CSS and JavaScript pre-processor for Laravel)
	- and more!

### Lines of Code
***Table 1*** shows the lines of code in the root directory, excluding all files within the `node_modules`, `tests`, and `vendor` folders. (`cloc --exclude-dir=node_modules,test,vendor .`)

**Language**|**Files**|**Blank**|**Comment**|**Code**
-----:|:-----:|:-----:|:-----:|:-----:
*PHP*|68|439|1328|1717
*Blade*|8|49|7|587
*Sass*|6|44|10|293
*JSON*|3|0|0|86
*Markdown*|2|28|0|74
*JavaScript*|7|29|69|40
*XML*|1|1|0|31
*Vuejs Component*|1|2|0|21
*CSS*|1|1|0|2
**TOTAL:**|**97**|**593**|**1414**|**2851**
---
***Table 2*** shows the lines of code in the `public` directory. (`cloc public/`)

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

Installing TaskManager locally is easy and can be completed with just a few quick steps.

 1.  In your database manager, create an empty MySQL database named `task_manager`. If you choose to select a different name, please be sure to update your `.env` file (more in **Step 3**).

 2. **Setup:**
	 * **Windows**: In **Command Promt** on Windows, type `yarn run setup-taskmanager`. This is going to run several commands from cloning TaskManager's GitHub repository to installing all required dependencies and copying the `.env` file. *The script will likely take several minutes to complete.*
		 > **NOTE**: this command will work only from within a **Command Prompt** terminal on **Windows**. If you would like to install using another terminal such as Bash, open the `package.json` file in TaskManager's root directory, locate the `setup-taskmanager` script, and run each command (seperated by a ` && `) seperately. When you reach the `copy .env.example .env` command, do **not** run it and instead manually copy the `.env.example` file, naming it `.env`.
	 
	 - **Mac**: If you are using a Mac, please feel free to [open an issue](https://github.com/j-651/TaskManager/issues) and/or [PR](https://github.com/j-651/TaskManager/pulls) to add a Mac-friendly install script.

 3. In your newly created `.env` file, ensure all information relating to your database and server configuration is accurate. This includes your database's username, password, and the TaskManager database name setup in **Step 1**.

 4. Next, in a terminal of your choice, run `php artisan migrate`. This will import the necessary table(s) to your database.
	 > **NOTE**: `migrations`, `users`, and `password_resets` tables will also be created when running this. Although `migrations` is required, the other two relevant to users (not tasks) can be removed from the `database\migrations` directory. These are default Laravel migrations and will likely be used if TM gets authentication in the future.

<p align="center">To launch TaskManager in your browser, please refer to the <b><em>Usage</em></b> section below.</p>

# Usage
In order for TaskManager to load properly, your MySQL database and PHP server (Apache) **must** be running every time you want to use TM.

To launch TaskManager locally, open your terminal at TaskManager's root directory and type `php artisan serve`. In your browser, navigate to where it's being served, typically at `localhost:8000` or `127.0.0.1:8000`.

> **NOTE**: TaskManager is still in development. Some features may not be documented or fully implemented *(some people call these bugs, so please [open an issue](https://github.com/j-651/TaskManager/issues) if you encounter one)*.

# Contributing
If you would like to contribute to TaskManager, please [fork this repository](https://help.github.com/articles/fork-a-repo/) and/or create [pull requests](https://github.com/j-651/TaskManager/pulls).

If you notice a bug or want to request a feature, please check the [issue tracker](https://github.com/j-651/TaskManager/issues).

# License
TaskManager's source code is released under the [MIT License](https://opensource.org/licenses/MIT).
If modifiying and/or using in your own projects, please provide credit to TaskManager with a link to the GitHub repository [github.com/j-651/TaskManager](https://github.com/j-651/TaskManager). Thanks!