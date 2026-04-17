<?php

function seguridad() {
    if (!session()->has('usuario') ) {
        return redirect()->to('/usuarios/login');
    }
}

function noSeguridad() {
    if (!session()->has('usuario') ) {
        return redirect()->to('/usuarios');
    }
}