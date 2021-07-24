<?php

namespace App\Controller;

use App\Entity\Operateurs;
use App\Repository\OperateursRepository;

class OperateurBanqueController{
    
    public $operateursRepository;

    public function __construct(OperateursRepository $operateursRepository)
    {
        $this->operateursRepository = $operateursRepository;
    }

    public function __invoke($id): int{
        $operatorsBanques = $operateursRepository->findOneBy(['id' => $id]);
        dd($operatorsBanques);
    }
}