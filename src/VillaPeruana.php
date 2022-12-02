<?php

namespace App;

class VillaPeruana
{
    public $name;

    public $quality;

    public $sellIn;

    public function __construct($name, $quality, $sellIn)
    {
        $this->name = $name;
        $this->quality = $quality;
        $this->sellIn = $sellIn;
    }

    public static function of($name, $quality, $sellIn) {
        return new static($name, $quality, $sellIn);
    }

    public function tick()
    {
        switch ($this->name) {
            case 'Ticket VIP al concierto de Pick Floid':
                $this->helper($this->sellIn, false, true);
                break;
            case 'Pisco Peruano':
                $this->helper($this->sellIn, false);
                break;
            case 'normal':
                $this->helper($this->sellIn);
                break;
            default: //como los productos de tumi no, se vende, las propiedades de sellin y quality, son la misma
                break;
        }
    }

    public function helper($day = 10, $isdegration = true, $isRange = false)
    {
        $quality = 1;

        if( $day <= 0 ){
            $quality = 2;
        }

        if( $isRange && ( $day > 0 && $day <= 10 ) ){
            $quality = $day >= 1 && $day <= 5 ? 3 : 2;
        }

        $this->quality = $isdegration ? $this->quality - $quality : $this->quality + $quality;

        $this->quality = $this->quality < 0 || ( $isRange && ( $day == 0 || $day < 0 ) ) ? 0 : $this->quality;
     

        if( $this->quality > 50 ){
            $this->quality = 50;
        }

        $this->sellIn = $day - 1;

    }

    // public function tick()
    // {
    //     if ($this->name != 'Pisco Peruano' and $this->name != 'Ticket VIP al concierto de Pick Floid') {
    //         if ($this->quality > 0) {
    //             if ($this->name != 'Tumi de Oro Moche') {
    //                 $this->quality = $this->quality - 1;
    //             }
    //         }
    //     } else {
    //         if ($this->quality < 50) {
    //             $this->quality = $this->quality + 1;

    //             if ($this->name == 'Ticket VIP al concierto de Pick Floid') {
    //                 if ($this->sellIn < 11) {
    //                     if ($this->quality < 50) {
    //                         $this->quality = $this->quality + 1;
    //                     }
    //                 }
    //                 if ($this->sellIn < 6) {
    //                     if ($this->quality < 50) {
    //                         $this->quality = $this->quality + 1;
    //                     }
    //                 }
    //             }
    //         }
    //     }

    //     if ($this->name != 'Tumi de Oro Moche') {
    //         $this->sellIn = $this->sellIn - 1;
    //     }

    //     if ($this->sellIn < 0) {
    //         if ($this->name != 'Pisco Peruano') {
    //             if ($this->name != 'Ticket VIP al concierto de Pick Floid') {
    //                 if ($this->quality > 0) {
    //                     if ($this->name != 'Tumi de Oro Moche') {
    //                         $this->quality = $this->quality - 1;
    //                     }
    //                 }
    //             } else {
    //                 $this->quality = $this->quality - $this->quality;
    //             }
    //         } else {
    //             if ($this->quality < 50) {
    //                 $this->quality = $this->quality + 1;
    //             }
    //         }
    //     }
    // }
}
