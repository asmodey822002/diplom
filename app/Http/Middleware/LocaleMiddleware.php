<?php

namespace App\Http\Middleware;

use Closure;
use Request;
use App;
class LocaleMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public static $mainLang='ru';
    public static $langs=['en', 'uk'];
    public static function getLocale(){
        $uri=Request::path();//en/login
        $uri=explode('/', $uri);
        if(!empty($uri[0])&&in_array($uri[0], self::$langs))//есть ли чтото после адреса сайта и есть ли он в массиве $langs
        {
            if($uri[0]!=self::$mainLang)
                return $uri[0];
        }
        return null;
    }
    public function handle($request, Closure $next)
    {
        $locale=self::getLocale();
        if($locale)
            App::setLocale($locale);
        else
            App::setLocale(self::$mainLang);
        return $next($request);
    }
}
