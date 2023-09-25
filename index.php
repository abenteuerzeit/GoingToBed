<?php
class StringUtils
{
    public static function secondCase($string)
    {
        $string = strtolower($string);
        if (strlen($string) >= 2) {
            $string[1] = strtoupper($string[1]);
        }
        return $string;
    }
}

class Pajamas
{
    private $owner, $fit, $color;

    function __construct(
        $owner = "unclaimed",
        $fit = "fine",
        $color = "white"
    ) {
        $this->owner = StringUtils::secondCase($owner);
        $this->setFit($fit);
        $this->color = $color;
    }

    public function setFit($new_fit)
    {
        // Validation for fit values
        $allowed_fits = ["tight", "fine", "loose"];
        if (in_array($new_fit, $allowed_fits)) {
            $this->fit = $new_fit;
        } else {
            echo "Invalid fit value. Allowed values are 'tight', 'fine', and 'loose'.";
        }
    }

    public function setOwner($new_owner)
    {
        $this->owner = StringUtils::secondCase($new_owner);
    }

    public function setColor($new_color)
    {
        $this->color = $new_color;
    }

    public function getOwner()
    {
        return $this->owner;
    }

    public function getColor()
    {
        return $this->color;
    }

    public function describe()
    {
        return "$this->owner's $this->color pajamas fit $this->fit.";
    }
}

class PajamasWithHat extends Pajamas
{
    private $hat;

    function __construct(
        $owner = "unclaimed",
        $fit = "fine",
        $color = "white",
        $hat = "none"
    ) {
        parent::__construct($owner, $fit, $color);
        $this->hat = $hat;
    }

    public function describe()
    {
        return parent::describe() . " It also comes with a $this->hat hat.";
    }
}


class ButtonablePajamas extends Pajamas
{
    private $button_state = "unbuttoned";
    public function describe()
    {
        return parent::describe() . " They also have buttons which are currently $this->button_state.";
    }
    public function toggleButtons()
    {
        if ($this->button_state === "unbuttoned") {
            $this->button_state = "buttoned";
        } else {
            $this->button_state = "unbuttoned";
        }
    }
}

$chicken_PJs = new Pajamas("CHICKEN", "just right", "purple");
echo $chicken_PJs->describe();
echo "\n...they wash their PJs many times....";
$chicken_PJs->setFit("a little tight");
echo "\n";
echo $chicken_PJs->describe();
$moose_PJs = new ButtonablePajamas("moose", "kind of loose", "red");
echo "\n";
echo $moose_PJs->describe();
$moose_PJs->toggleButtons();
echo "\n";
echo $moose_PJs->describe();
