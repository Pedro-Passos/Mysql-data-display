++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
+ PHP/MYSQL  Pedro  Dos Passos                                     +
++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++

Description
-----------
This is a single point of entry web application which consists of four views which are as follows:
    *The home view which consists of lorem ipsum and the database summary.
    *The 404 Error page which and uses the same template as the home view.
    *The Songs and Artists view which both use the same template and each contain their own relevant content gathered from the database and the database summary.
The index page loads the required files such as the config, queries, dbconnect(database connection), functions templates and the database summary files.
Then there is a switch statement to load the correct view and fail safe incase users try to manually change the url.
This is then followed by the content loader which changes the placeholder values for the relevant views and adds the content from their views.

Configuration
-------------
All database configuration settings for this application can be found in: includes/config.inc.php.
