<?php
use Jenssegers\Blade\Blade;

function view($view, $data = [])
{
    $views = VIEWPATH;
    $cache = APPPATH.'cache';
    $blade = new Blade($views, $cache);

    // Registrar directiva @can
    $blade->directive('can', function ($expression) {
        return "<?php if (hasPermission({$expression})): ?>";
    });

    $blade->directive('endcan', function () {
        return "<?php endif; ?>";
    });
    
    echo $blade->make($view, $data)->render();
}

function hasPermission($permission)
{
    // Aquí debes obtener el ID del usuario autenticado
    /*$user_id = 1; // Por ejemplo, el ID 1 (esto debe ser dinámico)
    $ci =& get_instance();
    $ci->load->model('User');
    return $ci->User->hasPermission($user_id, $permission);*/
    $ci =& get_instance();
    $ci->load->model('User');
    $user_id = $ci->session->userdata('user_id');
    return $ci->User->hasPermission($user_id, $permission);
}