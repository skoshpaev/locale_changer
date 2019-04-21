# Easy way to add langauge toggler in Laravel 5.8

The way is simple. Use it, change it as you want. Below are important steps:

* Add the route like this in `routes/web.php`:

``` 
Route::get('/locale/{locale}',  function ($locale) {
    session(['locale' => $locale]);
    return redirect()->back();
})->middleware('mylocale'); 
```

* Add the middleware for this route in `app/Http/Kernel.php::$routeMiddleware`:
```
'mylocale' => \App\Http\Middleware\Locale::class,
```
* Create two classes in `app/Http/Middleware/`: `Locale` and `Main` 
* Add the code from this repository
* Add the middleware for class `Main` in `app/Http/Kernel.php::$middlewareGroups::web`:
```
\App\Http\Middleware\Main::class,
```

* And then, write in youre blade template smth like this:
```
<a class="nav-link" href="/locale/{{ config('app.locale') === 'en'?'ru':'en' }}"></a>
```
And here we are! This link will toggle lang. We used `ru/en` in example, as for you - use the languege you want
##### Working logic you can see on the site [5kslov.ru](http://5kslov.ru/)
