<?php
class cha_lodge_status_lookup
{
//  
   function lookup_sc_free_group_by_status(&$status) 
   {
      $conteudo = "" ; 
      if ($status == "A")
      { 
          $conteudo = "Disponível";
      } 
      if ($status == "O")
      { 
          $conteudo = "Ocupado";
      } 
      if ($status == "M")
      { 
          $conteudo = "Manutenção";
      } 
      if ($status == "I")
      { 
          $conteudo = "Interditado";
      } 
      if ($status == "R")
      { 
          $conteudo = "Reservado";
      } 
      if (!empty($conteudo)) 
      { 
          $status = $conteudo; 
      } 
   }  
}
?>
