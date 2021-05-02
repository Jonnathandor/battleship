<?php

declare(strict_types=1);

namespace App\Models\__tests;

use Tests\TestCase;
use App\Models\UserModel;

class UserModelTest extends TestCase
{
    public function testEmptyUserModelInstantiation(): void {
        $user = new UserModel();
        $this->assertInstanceOf(UserModel::class, $user);
   }

    public function testUserModelInstantiation(): void {
        $user = new UserModel('Jonnathan', []);
        $this->assertInstanceOf(UserModel::class, $user);
    }

    public function testUserModelInstantiationWithOnlyNameArgument(): void {
        $user = new UserModel('Jonnathan');
        $this->assertInstanceOf(UserModel::class, $user);
    }

    public function testUserModelInstantiationWithOnlyShipsArgument(): void {
        $user = new UserModel(null, []);
        $this->assertInstanceOf(UserModel::class, $user);
    }

    public function testUserModelWithName(): void {
        $expectedName = 'Jonnathan';
        $user = new UserModel('Jonnathan');
        $this->assertEquals($user->getName(), $expectedName);
    }

    public function testUserModelWithoutName(): void {
        $expectedName = '';
        $user = new UserModel();
        $this->assertEquals($user->getName(), $expectedName);
    }

    public function testUserModelWithShips(): void {
        $expected = ['ship1', 'ship2'];
        $user = new UserModel('Swann', ['ship1', 'ship2']);
        $this->assertEquals($user->getShips(), $expected);
    }

    public function testUserModelWithNumberInsteadOfArray(): void {
        $expected = [];
        $this->expectException(\TypeError::class);
        $user = new UserModel('Swann', 6);
    }
}