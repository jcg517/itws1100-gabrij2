Take Home Quiz:

Conn.inc.php is where the database connection code is written and it is included whenever a dynamic php page needs to query the database.

The new IA of the the site (now made dynamic with php and mysql) has 4 new php files, each representing a page. Index.php replaces index.html, and is the landing point for all other pages in the site. Labs.php is the replacement for the labs html file in lab 8. It connects to the mylabs database and querys all it for the lab information. The projects.php page is a mirror of the labs page but with a different database, currently only holding our group's project.

All of these new pages are now what are linked to in the navbar instead of the old static html pages. The navbar and other html features are written in one place: the /includes directory, and they are imported into whichever php file they are needed in.

The fourth page is the login.php page. A button for this page only appears on the index page, if the global session variable: \_SESSION['loggedInUser'], is not set. Within the login page is a form with username and password. If a username and password that is within the mysiteusers database table is inputted (admin, password), the session variable will be set.

When the session variable is set, the user will no longer see the login button on the landing page. They will see a welcome message with their username and a new button called log out that when clicked will reset the session. When a user is logged in, 2 new forms appear on the labs page.
One is for deleting a lab, provided the lab number/id. The other is a form for adding new labs with inputs for: id, name, link, image and description.
