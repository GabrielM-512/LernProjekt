# Reason for this document

This file provides documentation information for anyone wanting to understand the codebase. Note that, for each script, the comments are the most useful elements for grasping what that script actually does. Thus, this document does _not_ aim to explain every individual file, but rather to outline the general file structure and how we plan to work on this project.


## File structure

This project is split up into two main directories: 
* /frontend — contains the frontend files that the user interacts with directly
* /backend — contains files that interact with the server and database

These are ordered a bit differently compared to one another and, of course, include different files with different purposes.  
The two are usually linked using [AJAX](https://en.wikipedia.org/wiki/Ajax_(programming)), in order to achieve a connection between the user and the database (DB), without the user directly accessing the scripts that interact with it.
<br>

### /frontend

(People currently working on /frontend: _EmrisEvigheden_, _lila-hamster_)

/frontend contains all the pages the user interacts with. In a production environment, this directory serves as the root of the website. To be more precise, the URL should point to /frontend/root/index.php.  
This ensures that users cannot access backend files or frontend includes, as navigating upward in a URL path is (typically) not possible. Of course, care has to be taken to ensure that directory traversal attacks are not possible by:
* When coding, ensuring that no user input used to open files is left unsanitized, and checking for occurrences of '../' in the input string
* When setting up the server, ensuring that directory traversal protection is properly implemented
<br>

### /backend

(People currently working on /frontend: _GabrielM-512_)

/backend contains all the files that interact with the database or other server functionalities. Typically, every /backend file should be of type.php. However, this may vary in rare cases.  
Each subdirectory of /backend which includes other .php files, as well as the main /backend directory, includes a prepend.php file. Depending on where it is located, it can serve one of two purposes:

* When located directly in /backend, prepend.php is used to declare global file paths to ensure that when reordering the file system one only needs to change the directories in one place. This file should actually be called prepend_global.php.
* When located in a subdirectory of /backend, prepend.php is used to dynamically navigate to prepend_global.php and include it.

No file in /backend should use static include or require statements. Instead, include prepend.php should be used to obtain the file path of the directory the file needs and then include a file from there.

<br><br>

## Coding standards

One of the main goals of this project should be to keep the codebase workable into the future. To achieve this, proper documentation is needed in **each and every file**.  
Programmers should:

* Include a block comment at the beginning of each file that describes its purpose
* Never use the same file for more than one functionality (at least for .php files)
* Include comments for blocks of code which describe what that block does
* Arguably most important: name files and variables in a way that **clearly describes their purpose**

<br><br>
Files which the user accesses should be of type _.php_. JavaScript code should, when possible, be saved in a seperate _.js_ file and then linked into the .php file which the user accesses.
