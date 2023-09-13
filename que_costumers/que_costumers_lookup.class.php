<?php
class que_costumers_lookup
{
//  
   function lookup_holdertype(&$holdertype) 
   {
      $conteudo = "" ; 
      if ($holdertype == "H")
      { 
          $conteudo = "Sim";
      } 
      if ($holdertype == "A")
      { 
          $conteudo = "Não";
      } 
      if (!empty($conteudo)) 
      { 
          $holdertype = $conteudo; 
      } 
   }  
//  
   function lookup_frequencytype(&$frequencytype) 
   {
      $conteudo = "" ; 
      if ($frequencytype == "M")
      { 
          $conteudo = "Sim";
      } 
      if ($frequencytype == "D")
      { 
          $conteudo = "Não";
      } 
      if (!empty($conteudo)) 
      { 
          $frequencytype = $conteudo; 
      } 
   }  
}
?>
