<?php

function setActiveRoute($name):string
{
    return request()->routeIs($name) ? 'active' : '';
}
