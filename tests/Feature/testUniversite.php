<?php

namespace Tests\Feature;

use App\Http\Controllers\UniversiteController;
use Tests\TestCase;

class testUniversite extends TestCase
{
    /**
     * A basic feature test example.
     */
    public function testUniversiteListe(): void
    {


    $Universites = new UniversiteController;

  $universites = $Universites->RecupererListeUniversite();
  $universites = $universites->getData();
  dd($universites);

    }
}

