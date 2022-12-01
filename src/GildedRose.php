<?php 

namespace App;
use App\VillaPeruana;

class GildedRose extends VillaPeruana{

    public function tick(){
        $quality = $this->quality == 0 ? 0 : 2;
       
        if( $this->quality > 50 ){
            $this->quality = 50;
        }
        

        if(  $this->quality >= 3 && ( $this->sellIn == 0 || $this->sellIn < 0 ) ){ 
            $quality = $this->quality >= 4 ? $quality * 2 : $quality + 1;
        }

        
        $this->quality = $this->quality - $quality;
        $this->quality = $this->quality < 0 ? 0 : $this->quality;
        $this->sellIn = $this->sellIn - 1;
    }
}

?>