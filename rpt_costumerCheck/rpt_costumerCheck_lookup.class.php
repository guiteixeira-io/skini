<?php
class rpt_costumerCheck_lookup
{
//  
   function lookup_b_idlodge(&$conteudo , $b_idlodge) 
   {   
      static $save_conteudo = "" ; 
      static $save_conteudo1 = "" ; 
      $tst_cache = $b_idlodge; 
      if ($tst_cache === $save_conteudo && $conteudo != "&nbsp;") 
      { 
          $conteudo = $save_conteudo1 ; 
          return ; 
      } 
      $save_conteudo = $tst_cache ; 
      if (trim($b_idlodge) === "" || trim($b_idlodge) == "&nbsp;")
      { 
          $conteudo = "&nbsp;";
          $save_conteudo  = ""; 
          $save_conteudo1 = ""; 
          return ; 
      } 
      $nm_comando = "select number from cad_lodge where idLodge = $b_idlodge order by number" ; 
      $conteudo = "" ; 
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_comando; 
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
      if ($rx = $this->Db->Execute($nm_comando)) 
      { 
          if (isset($rx->fields[0]))  
          { 
              $rx->fields[0] = str_replace(',', '.', $rx->fields[0]); 
              $conteudo = $rx->fields[0]; 
          } 
          $save_conteudo1 = $conteudo ; 
          $rx->Close(); 
      } 
      elseif ($GLOBALS["NM_ERRO_IBASE"] != 1)  
      { 
          $this->Erro->mensagem(__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg()); 
          exit; 
      } 
      if ($conteudo === "") 
      { 
          $conteudo = "&nbsp;";
          $save_conteudo1 = $conteudo ; 
      } 
   }  
//  
   function lookup_a_frequencytype(&$a_frequencytype) 
   {
      $conteudo = "" ; 
      if ($a_frequencytype == "M")
      { 
          $conteudo = "Mensalista";
      } 
      if (!empty($conteudo)) 
      { 
          $a_frequencytype = $conteudo; 
      } 
   }  
//  
   function lookup_a_holdertype(&$a_holdertype) 
   {
      $conteudo = "" ; 
      if ($a_holdertype == "H")
      { 
          $conteudo = "Titular";
      } 
      if ($a_holdertype == "A")
      { 
          $conteudo = "Agregado";
      } 
      if (!empty($conteudo)) 
      { 
          $a_holdertype = $conteudo; 
      } 
   }  
}
?>
