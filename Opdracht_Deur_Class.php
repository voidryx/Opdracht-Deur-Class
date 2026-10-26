
<?php

class Deur {
    private bool $opSlot;
    private bool $deuropening;
    public string $deurNaam;

    public function __construct(string $deurNaam) {
        $this->opSlot = true;
        $this->deuropening = false;
        $this->deurNaam = $deurNaam;
    }

    public function sleutelGebruiken(string $richting): string {
        switch ($richting) {
            case "links":
                $this->opSlot = false;
                return "deur is ontgrendeld";

            case "rechts":
                $this->opSlot = true;
                return "deur is vergrendeld";

            default:
                return "ongeldige draairichting";
        }
    }

    public function deurOpenen(): string {
        if ($this->opSlot) {
            return $this->deurNaam . " is nog op slot en kan niet open";
        }

        if ($this->deuropening) {
            return "deur is al geopend";
        }

        $this->deuropening = true;
        return "deur is geopend";
    }

    public function doorDeurLopen(): string {
        if ($this->opSlot) {
            return $this->deurNaam . " is nog op slot";
        }

        if (!$this->deuropening) {
            return "je stoot tegen de " . $this->deurNaam . "!";
        }

        return "je bent in je huiskamer!";
    }
}

// Test 1: deur ontgrendelen, maar niet openen
$deur1 = new Deur("voordeur");

echo $deur1->sleutelGebruiken("links") . PHP_EOL;
echo $deur1->doorDeurLopen() . PHP_EOL;
echo PHP_EOL;

// Test 2: deur proberen te openen terwijl deze op slot zit
$deur2 = new Deur("voordeur");

echo $deur2->deurOpenen() . PHP_EOL;
echo $deur2->doorDeurLopen() . PHP_EOL;
echo PHP_EOL;

// Test 3: alles goed doen
$deur3 = new Deur("voordeur");

echo $deur3->sleutelGebruiken("links") . PHP_EOL;
echo $deur3->deurOpenen() . PHP_EOL;
echo $deur3->doorDeurLopen() . PHP_EOL;

?>
