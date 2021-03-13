<?php

namespace App\Http\Middleware;

use Closure;
use Carbon\Carbon;
use App\Language as Lang;
use Illuminate\Http\Request;
use Illuminate\Routing\Redirector;
use Illuminate\Foundation\Application;

class Language {

    public function __construct(Application $app, Redirector $redirector, Request $request) {
        $this->app = $app;
        $this->redirector = $redirector;
        $this->request = $request;
    }

    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next) {
        $locales = [];
        $cache = cache();
//        dd($cache->get('LANGUAGES'));
        if (!$cache->has('LANGUAGES')) {
            $languages = Lang::active()->get()->toArray();
            foreach ($languages as $key => $lang) {
                $locales[$lang['short_code']] = $lang['id'];
                $languages[$lang['short_code']] = $lang;
                unset($languages[$key]);
            }
            $expiresAt = Carbon::now()->addHours(env('HOURS_TO_EXPIRE_LANGUAGES_CACHE'));
            $cache->put('LANG', $locales, $expiresAt);
//            dd($languages);
            $cache->put('LANGUAGES', $languages, $expiresAt);
        }
        else {
            $locales = $cache->get('LANG');
        }
        $locale = $request->segment(1);

        if ( ! array_key_exists($locale, $locales)) {
            $segments = array_merge([$this->app->config->get('app.fallback_locale')], $request->segments());


            if ($this->request->expectsJson()) {
                return responseBuilder()->error('Invalid/missing language parameter!');
              
            }
            else {
                return $this->redirector->to(implode('/', $segments));

            }
        }
        $this->app->setLocale($locale);
        return $next($request);
    }

}
