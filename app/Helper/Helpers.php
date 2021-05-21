<?php

/**
 * active
 *
 * @param  string $route
 * @param  string $text
 * @return string
 */
function active($route, $text = "active"): string
{
    return request()->route()->getName() == $route ? $text : '';
}

/**
 * set_active
 *
 * @param  mixed $path
 * @param  string $active
 * @return string
 */
function set_active($path, $active = 'active'): string
{
    return call_user_func_array('Request::is', (array)$path) ? $active : '';
}

/**
 * notification
 *
 * @param  string $alert_type
 * @param  string $message
 * @return array
 */
function notification($alert_type, $message): array
{
    $notification['alert-type'] = $alert_type;
    $notification['message'] = $message;
    return $notification;
}

/**
 * selected
 *
 * @param  mixed $data1
 * @param  mixed $data2
 * @return string
 */
function selected($data1, $data2): string
{
    if (!is_array($data2)) {
        return $data1 == $data2 ? 'selected' : '';
    } else {
        return in_array($data1, $data2) ? 'selected' : '';
    }
}
