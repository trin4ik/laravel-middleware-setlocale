<?php

namespace Trin4ik\LaravelMiddlewareSetLocale\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SetLocale
{
	public function canUseLocale ($locale) {
		list($tmp,) = explode('-', $locale);
		if (in_array($tmp, explode(',', config('setlocale.allow')))) {
			return $tmp;
		}
		return config('setlocale.default');
	}

	/**
	 * Handle an incoming request.
	 *
	 * @param \Illuminate\Http\Request $request
	 * @param \Closure $next
	 * @return mixed
	 */
	public function handle (Request $request, Closure $next) {

		$locale = config('setlocale.default');
		$methods = config('setlocale.methods');

		$methods['allow'] = explode(',', $methods['allow']);

		if (count($methods['allow'])) {
			foreach ($methods['allow'] as $v) {

				if (isset($methods['exist'][$v])) {

					$locale = match ($v) {
							'user' => Auth::check() ? Auth::user()->{$methods['exist'][$v]} : $locale,
							'header' => $request->header($methods['exist'][$v]),
							'get' => $request->get($methods['exist'][$v]),
							'post' => $request->post($methods['exist'][$v]),
						} ?? $locale;
				}
			}
		}

		\App::setLocale($this->canUseLocale($locale));
		return $next($request);
	}
}
