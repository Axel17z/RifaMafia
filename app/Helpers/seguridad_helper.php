<?php

function seguridad($rol = array() ) {
    if (!session()->has('usuario')) {
        return redirect()->to('/usuarios/login');
    }

    if($rol) {
        $encontrado = false;
        foreach ($rol as $r) {
            if (session()->get('usuario.rol') === $r) {
                $encontrado = true;
            }
        }
        if ($encontrado==false) {
            return redirect()->to('/usuarios')->with('msg', 'No tienes permiso para acceder a esta seccion');
        }
    }
}

function noSeguridad() {
    if (session()->has('usuario') ) {
        return redirect()->to('/usuarios');
    }
}