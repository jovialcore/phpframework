# demo-phpframework

What we did, 

-- configured native sever booting

-- composer setup and autoloading

--dependency injection--creating  with php-di container
--------What dependeincy containers do is to  automatically instantiate your classes, so you don't need to call the new keyword hence you can just magically inject it as parameters of a function. it automatically injects a dependecny for your class parameter so you don't have to instantiate the classes (not like the class is not being instantiated but you will not need to use new Keyword, etc)


-- created the entry point for the framework 

-- Implemented middlewares--fastroute ( for all our routes ) dispatcher middleware, then response middleware

-- finally added an emitter package that will send the response to the browser ( client, etc ) All following PSR-7 and PSR-15 Standards. 

If you ae instrested to see the how you can do this yourself, here is the article I will refer you too : https://kevinsmith.io/modern-php-without-a-framework/ 
