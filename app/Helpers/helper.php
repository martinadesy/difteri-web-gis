<?php
function getPriority($value)
{
    if($value==9){
        return "Pertama";
    }elseif ($value==7)
    {
        return "Kedua";
    }elseif ($value==5){
        return "Ketiga";
    }elseif ($value==3)
    {
        return "Keempat";
    }elseif ($value==1)
    {
        return "Kelima";
    }
}