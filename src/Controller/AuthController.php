<?php

namespace App\Controller;
use App\Entity\User;
use App\Repository\UserRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpKernel\Attribute\MapRequestPayload;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;
use Symfony\Component\Routing\Annotation\Route;

class AuthController extends AbstractController {

    public function __construct(private UserRepository $repo){}

    #[Route('/api/user', methods:'POST')]
    public function register (
        #[MapRequestPayload] User $user,
        UserPasswordHasherInterface $Hasher){
            if($this->repo->findByEmail($user->getEmail()) !=null){
                return $this->json('Useer already existe',400);
            }
            $hashedPassword = $Hasher->hashPassword($user,$user->getPassword());
            $user->setPassword($hashedPassword);
            $user->setRole('ROLE_USER');
            $this->repo->persist($user);
            return $this->json('bravo');
        }
    
}