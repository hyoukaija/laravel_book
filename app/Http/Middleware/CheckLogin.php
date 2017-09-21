<?php

namespace App\Http\Middleware;

use Closure;

class CheckLogin
{
	public function handle($request,Closure $next)
	{

		$member = $request->session()->get('member','');
		if ($member == '') {
			$http_referer = 'http://'.$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
			return redirect('/login?return_url='.urlencode($http_referer));
		}

		return $next($request);
	}
}

?>