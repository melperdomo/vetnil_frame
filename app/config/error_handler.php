<?php

use Controllers\SingeloController;
use Core\Exceptions\ClientException;
use Core\Exceptions\NotFoundException;
use Core\Exceptions\SingeloException;

try {
    include __DIR__ . '/routes.php';
} catch (ClientException $ex) {
    SingeloController::clientException($ex);
} catch(NotFoundException $ex) {
    SingeloController::notFoundException($ex);
} catch(SingeloException $ex) {
    SingeloController::singeloException($ex);
}