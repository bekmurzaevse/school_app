<?php 

namespace App\Actions\v1\Employee;

use App\Dto\v1\Employee\AddDto;
use App\Traits\ResponseTrait;

class AddAction
{
    use ResponseTrait;

    public function __invoke(AddDto $dto)
    {
        
    }
}