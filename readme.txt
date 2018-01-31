Luc Murakami A01024159

Andy Zhou A01030711

We have completed:
Everything

Major Challenges:
When uploading the website to Azure, the password validator
broke. Thus, we had to find a way to fix it. It turned out to be because of the
explode function only specifying \n as the delimiter. Thus, ee used the
preg_split function to split the credentials up by \n, \r or \r\n, which makes
it compatible with all operating systems.

While making the math game in index.php, we had issues with getting the right
answer because we were comparing the previous input posted in the form on 
the previous page with random numbers generated in the current page. We fixed
this by using the $POST variables in the hidden values form for calculating
the random numbers.

Website URL:
http://interesting-math-game.azurewebsites.net/login.php