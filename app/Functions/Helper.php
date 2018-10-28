<?php

if (! function_exists('responseFormData')) {
	function responseFormData($messages)
	{
		return response()->json(['messages' => $messages], 200);
	}
}

if (! function_exists('uploadFileData')) {
	function uploadFileData($file, $path)
	{
		$path = public_path() . '/' . $path;
		$name = uniqid() . time() . '.' .$file->getClientOriginalExtension();
		$file->move($path, $name);
    return $name;
	}
}

if(!function_exists('formatDateData'))
{
	function formatDateData($date, $format = 'd-m-Y')
	{
		if($date == null)
			return date($format, strtotime(date($format)));
		return date($format, strtotime($date));
	}
}

if(!function_exists('formatMoneyData'))
{
	function formatMoneyData($money)
	{
		return number_format($money, 0, ',', '.');
	}
}

if(!function_exists('redirectBackErrorData'))
{
	function redirectBackErrorData($error)
	{
		return redirect()->back()->with('error', $error)->with('danger', 'true')->withInput();
	}
}

if(!function_exists('redirectBackSuccessData'))
{
	function redirectBackSuccessData($messages)
	{
		return redirect()->back()->with('success', $messages);
	}
}

if(!function_exists('getUserID'))
{
	function getUserID()
	{
		return Auth::id();
	}
}


if(!function_exists('getRoleUser'))
{
	function getRoleUser()
	{
		return Auth::user()->role;
	}
}


if(!function_exists('isAdminCP'))
{
	function isAdminCP()
	{
		return getRoleUser() == 1 ? true : false;
	}
}


if(!function_exists('getFristDayOfMonth'))
{
	function getFristDayOfMonth()
	{
		$date = date('Y-m-d');
		return date("Y-m-01", strtotime($date));
	}
}

if(!function_exists('getLastDayOfMonth'))
{
	function getLastDayOfMonth()
	{
		$date = date('Y-m-d');
		return date("Y-m-t", strtotime($date));
	}
}


if(!function_exists('getCountNotifications'))
{
	function getCountNotifications()
	{
		return Auth::user()->unreadNotifications->count();
	}
}

if(!function_exists('sendNotificationsUser'))
{
	function sendNotificationsUser($receiver, $data)
	{
		$options = array(
      'cluster' => env('PUSHER_APP_CLUSTER'),
      'encrypted' => true
    );

    $pusher = new Pusher(
      env('PUSHER_APP_KEY'),
      env('PUSHER_APP_SECRET'),
      env('PUSHER_APP_ID'),
      $options
    );
    
    $channel = 'notify-messages-action-' . $receiver;
    $pusher->trigger('NotifyUser', $channel, $data);
	}
}