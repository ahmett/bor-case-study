<?php

namespace App\Enums;

enum ResponseStatus: string
{
    case Success = 'success';
    case Fail = 'fail';
    case Error = 'error';
}
