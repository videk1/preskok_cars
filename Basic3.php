<?php
    class Person_Spec {
        public $hair;
        public $eyes;
        public $race;

        public function __construct($hair, $eyes, $race){
            $this->hair = $hair;
            $this->eyes = $eyes;
            $this->race = $race;
        }
    }

    function getBodyPart($dnk, $legend, $type){
        foreach($legend[$type] as $key => $value){
            //echo($type . " : " . $value . " for dnk: " . $dnk . "<br>");
            if(strpos($dnk, $value) !== false){
                return $key;
            }
        }
        echo("DNK doest not contain record for body type: " . $type);
        exit;
    }

    function getSuspectName($suspects, $personSpec){
        foreach($suspects as $name => $value){
            if(
            $value->hair === $personSpec->hair and 
            $value->eyes === $personSpec->eyes and
            $value->race === $personSpec->race){
                return $name;
            }
        }
        echo ("No suspects found");
        exit;
    }

    $dnk = "HHHKLJ140L98IHYYYN";
    $suspects = array(
    "John Novak" => new Person_Spec("Black", "Green", "Asian"),
    "Vin Diesel" => new Person_Spec("Blonde", "Brown", "Caucasian"),
    "Guy Fawkes" => new Person_Spec("Black", "Brown", "Hispanic"));
    $legend = array(
        "Eyes"=>array("Black"=>"140L98", "Green"=>"140A98", "Brown"=>"140A88", "Blue"=>"140L97"),
        "Hair"=>array("Brown"=>"HHHKLJ", "Black"=>"HHHKLI", "Blonde"=>"HHLH1L", "White"=>"HHLH2L"),
        "Race"=>array("Asian"=>"1HYYYN", "Hispanic"=>"IHYYYN", "White"=>"IHYYNN")
    );

    $criminal = new Person_Spec(
        getBodyPart($dnk, $legend, 'Hair'),
        getBodyPart($dnk, $legend, 'Eyes'),
        getBodyPart($dnk, $legend, 'Race'));

    echo("Criminal who did it: " . getSuspectName($suspects, $criminal));
    exit;
?>