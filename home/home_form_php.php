<?php
include_once('home_session.php');
session_start();
   $_SESSION['scriptcase']['home']['glo_nm_path_prod']      = "/scriptcase/prod";
   $_SESSION['scriptcase']['home']['glo_nm_path_imag_temp'] = "/scriptcase/tmp";
   //check publication with the prod
   $str_path_apl_url  = $_SERVER['PHP_SELF'];
   $str_path_apl_url  = str_replace("\\", '/', $str_path_apl_url);
   $str_path_apl_url  = substr($str_path_apl_url, 0, strrpos($str_path_apl_url, "/"));
   $str_path_apl_url  = substr($str_path_apl_url, 0, strrpos($str_path_apl_url, "/")+1);
   //check prod
   if(empty($_SESSION['scriptcase']['home']['glo_nm_path_prod']))
   {
           /*check prod*/$_SESSION['scriptcase']['home']['glo_nm_path_prod'] = $str_path_apl_url . "_lib/prod";
   }
   //check tmp
   if(empty($_SESSION['scriptcase']['home']['glo_nm_path_imag_temp']))
   {
           /*check tmp*/$_SESSION['scriptcase']['home']['glo_nm_path_imag_temp'] = $str_path_apl_url . "_lib/tmp";
   }
   //end check publication with the prod
class home_form_php
{
      var $sc_script_name;
      var $nm_location;
   function sc_Include($path, $tp, $name)
   {
       if ((empty($tp) && empty($name)) || ($tp == "F" && !function_exists($name)) || ($tp == "C" && !class_exists($name)))
       {
           include_once($path);
       }
   } // sc_Include

   function init()
   {
      $Campos_Mens_erro = "";
      $_SESSION['scriptcase']['home']['contr_erro'] = 'off';
      $sc_site_ssl   = (isset($_SERVER['HTTPS']) && strtolower($_SERVER['HTTPS']) == 'on') ? true : false;
      $NM_dir_atual = getcwd();
      if (empty($NM_dir_atual))
      {
          $str_path_sys          = (isset($_SERVER['SCRIPT_FILENAME'])) ? $_SERVER['SCRIPT_FILENAME'] : $_SERVER['ORIG_PATH_TRANSLATED'];
          $str_path_sys          = str_replace("\\", '/', $str_path_sys);
      }
      else
      {
          $sc_nm_arquivo         = explode("/", $_SERVER['PHP_SELF']);
          $str_path_sys          = str_replace("\\", "/", getcwd()) . "/" . $sc_nm_arquivo[count($sc_nm_arquivo)-1];
      }
      //check publication with the prod
      $str_path_apl_url = $_SERVER['PHP_SELF'];
      $str_path_apl_url = str_replace("\\", '/', $str_path_apl_url);
      $str_path_apl_url = substr($str_path_apl_url, 0, strrpos($str_path_apl_url, "/"));
      $str_path_apl_url = substr($str_path_apl_url, 0, strrpos($str_path_apl_url, "/")+1);
      $str_path_apl_dir = substr($str_path_sys, 0, strrpos($str_path_sys, "/"));
      $str_path_apl_dir = substr($str_path_apl_dir, 0, strrpos($str_path_apl_dir, "/")+1);
      //check prod
      $this->sc_charset['UTF-8'] = 'utf-8';
      $this->sc_charset['ISO-2022-JP'] = 'iso-2022-jp';
      $this->sc_charset['ISO-2022-KR'] = 'iso-2022-kr';
      $this->sc_charset['ISO-8859-1'] = 'iso-8859-1';
      $this->sc_charset['ISO-8859-2'] = 'iso-8859-2';
      $this->sc_charset['ISO-8859-3'] = 'iso-8859-3';
      $this->sc_charset['ISO-8859-4'] = 'iso-8859-4';
      $this->sc_charset['ISO-8859-5'] = 'iso-8859-5';
      $this->sc_charset['ISO-8859-6'] = 'iso-8859-6';
      $this->sc_charset['ISO-8859-7'] = 'iso-8859-7';
      $this->sc_charset['ISO-8859-8'] = 'iso-8859-8';
      $this->sc_charset['ISO-8859-8-I'] = 'iso-8859-8-i';
      $this->sc_charset['ISO-8859-9'] = 'iso-8859-9';
      $this->sc_charset['ISO-8859-10'] = 'iso-8859-10';
      $this->sc_charset['ISO-8859-13'] = 'iso-8859-13';
      $this->sc_charset['ISO-8859-14'] = 'iso-8859-14';
      $this->sc_charset['ISO-8859-15'] = 'iso-8859-15';
      $this->sc_charset['WINDOWS-1250'] = 'windows-1250';
      $this->sc_charset['WINDOWS-1251'] = 'windows-1251';
      $this->sc_charset['WINDOWS-1252'] = 'windows-1252';
      $this->sc_charset['TIS-620'] = 'tis-620';
      $this->sc_charset['WINDOWS-1253'] = 'windows-1253';
      $this->sc_charset['WINDOWS-1254'] = 'windows-1254';
      $this->sc_charset['WINDOWS-1255'] = 'windows-1255';
      $this->sc_charset['WINDOWS-1256'] = 'windows-1256';
      $this->sc_charset['WINDOWS-1257'] = 'windows-1257';
      $this->sc_charset['KOI8-R'] = 'koi8-r';
      $this->sc_charset['BIG-5'] = 'big5';
      $this->sc_charset['EUC-CN'] = 'EUC-CN';
      $this->sc_charset['GB18030'] = 'GB18030';
      $this->sc_charset['GB2312'] = 'gb2312';
      $this->sc_charset['EUC-JP'] = 'euc-jp';
      $this->sc_charset['SJIS'] = 'shift-jis';
      $this->sc_charset['EUC-KR'] = 'euc-kr';
      $_SESSION['scriptcase']['charset_entities']['UTF-8'] = 'UTF-8';
      $_SESSION['scriptcase']['charset_entities']['ISO-8859-1'] = 'ISO-8859-1';
      $_SESSION['scriptcase']['charset_entities']['ISO-8859-5'] = 'ISO-8859-5';
      $_SESSION['scriptcase']['charset_entities']['ISO-8859-15'] = 'ISO-8859-15';
      $_SESSION['scriptcase']['charset_entities']['WINDOWS-1251'] = 'cp1251';
      $_SESSION['scriptcase']['charset_entities']['WINDOWS-1252'] = 'cp1252';
      $_SESSION['scriptcase']['charset_entities']['BIG-5'] = 'BIG5';
      $_SESSION['scriptcase']['charset_entities']['EUC-CN'] = 'GB2312';
      $_SESSION['scriptcase']['charset_entities']['GB2312'] = 'GB2312';
      $_SESSION['scriptcase']['charset_entities']['SJIS'] = 'Shift_JIS';
      $_SESSION['scriptcase']['charset_entities']['EUC-JP'] = 'EUC-JP';
      $_SESSION['scriptcase']['charset_entities']['KOI8-R'] = 'KOI8-R';
      if(!isset($_SESSION['scriptcase']['home']['glo_nm_path_prod']) || empty($_SESSION['scriptcase']['home']['glo_nm_path_prod']))
      {
              /*check prod*/$_SESSION['scriptcase']['home']['glo_nm_path_prod'] = $str_path_apl_url . "_lib/prod";
      }
      $str_path_web  = $_SERVER['PHP_SELF'];
      $str_path_web  = str_replace("\\", '/', $str_path_web);
      $str_path_web  = str_replace('//', '/', $str_path_web);
      $str_root      = substr($str_path_sys, 0, -1 * strlen($str_path_web));
      $path_link     = substr($str_path_web, 0, strrpos($str_path_web, '/'));
      $path_link     = substr($path_link, 0, strrpos($path_link, '/')) . '/';
      $this->nm_location  = strrpos($_SERVER['PHP_SELF'],"/") ;  
      $this->nm_location  = substr($_SERVER['PHP_SELF'], 0, $this->nm_location + 1) ;  
      $this->nm_location .= "index.php"; 
      $this->menu_sc_init = 1;
      $path_imag_cab = $path_link . "_lib/img";
      $path_imag_apl = $str_root . $path_link . "_lib/img";
      $path_libs     = $str_root . $_SESSION['scriptcase']['home']['glo_nm_path_prod'] . "/lib/php";
      $path_third    = $str_root . $_SESSION['scriptcase']['home']['glo_nm_path_prod'] . "/third";
      $path_adodb    = $str_root . $_SESSION['scriptcase']['home']['glo_nm_path_prod'] . "/third/adodb";
      $_SESSION['scriptcase']['dir_temp'] = $str_root . $_SESSION['scriptcase']['home']['glo_nm_path_imag_temp'];
      $this->path_css = $str_root . $path_link . "_lib/css/";
      $path_lib_php   = $str_root . $path_link . "_lib/lib/php";
      $this->str_lang      = (isset($_SESSION['scriptcase']['str_lang']) && !empty($_SESSION['scriptcase']['str_lang'])) ? $_SESSION['scriptcase']['str_lang'] : "pt_br";
      $this->str_conf_reg  = (isset($_SESSION['scriptcase']['str_conf_reg']) && !empty($_SESSION['scriptcase']['str_conf_reg'])) ? $_SESSION['scriptcase']['str_conf_reg'] : "pt_br";
      if (isset($_SESSION['scriptcase']['home']['session_timeout']['lang'])) {
          $this->str_lang = $_SESSION['scriptcase']['home']['session_timeout']['lang'];
      }
      elseif (!isset($_SESSION['scriptcase']['home']['actual_lang']) || $_SESSION['scriptcase']['home']['actual_lang'] != $this->str_lang) {
          $_SESSION['scriptcase']['home']['actual_lang'] = $this->str_lang;
          setcookie('sc_actual_lang_skini',$this->str_lang,'0','/');
      }
      $this->str_schema_all = (isset($_SESSION['scriptcase']['str_schema_all']) && !empty($_SESSION['scriptcase']['str_schema_all'])) ? $_SESSION['scriptcase']['str_schema_all'] : "Sc9_Lemon/Sc9_Lemon";
       if (isset($_SESSION['scriptcase']['user_logout']))
       {
           foreach ($_SESSION['scriptcase']['user_logout'] as $ind => $parms)
           {
               if (isset($_SESSION[$parms['V']]) && $_SESSION[$parms['V']] == $parms['U'])
               {
                   unset($_SESSION['scriptcase']['user_logout'][$ind]);
                   $nm_apl_dest = $parms['R'];
                   $dir = explode("/", $nm_apl_dest);
                   if (count($dir) == 1)
                   {
                       $nm_apl_dest = str_replace(".php", "", $nm_apl_dest);
                       $nm_apl_dest = $path_link . SC_dir_app_name($nm_apl_dest) . "/";
                   }
?>
                   <html>
                   <body>
                    <form name="FRedirect" method="POST" action="<?php echo $nm_apl_dest; ?>" target="<?php echo $parms['T']; ?>">
                   </form>
                   <script>
                    document.FRedirect.submit();
                   </script>
                   </body>
                   </html>
<?php
                   exit;
               }
           }
       }
      if (!function_exists("NM_is_utf8"))
      {
          include_once("../_lib/lib/php/nm_utf8.php");
      }
      if (!function_exists("SC_dir_app_ini"))
      {
          include_once("../_lib/lib/php/nm_ctrl_app_name.php");
      }
      SC_dir_app_ini('skini');
      if (!defined("SC_ERROR_HANDLER"))
      {
          define("SC_ERROR_HANDLER", 1);
          include_once(dirname(__FILE__) . "/home_erro.php");
      }
      if (isset($_GET['sc_apl_menu']))
      {
          $_SESSION['scriptcase']['sc_usa_grupo']     = $_GET['sc_usa_grupo'];
          $_SESSION['scriptcase']['sc_item_menu']     = $_GET['sc_item_menu'];
          $_SESSION['scriptcase']['sc_apl_menu']      = $_GET['sc_apl_menu'];
          $_SESSION['scriptcase']['sc_apl_menu_link'] = $_SESSION['scriptcase']['home']['sc_apl_link'];
          $_SESSION['scriptcase']['sc_ult_apl_menu']  = array();
      }
      $this->sc_menu_item   = $_SESSION['scriptcase']['sc_item_menu'];
      $this->sc_script_name = $_SESSION['scriptcase']['sc_apl_menu'];
      include("../_lib/lang/". $this->str_lang .".lang.php");
      include("../_lib/css/" . $this->str_schema_all . "_menuH.php");
      include("../_lib/lang/config_region.php");
      include("../_lib/lang/lang_config_region.php");
      $this->sc_Include($path_lib_php . "/nm_functions.php", "", "") ; 
      $this->sc_Include($path_lib_php . "/nm_api.php", "", "") ; 
      $this->sc_Include($path_lib_php . "/nm_data.class.php", "C", "nm_data") ; 
      $this->nm_data = new nm_data("pt_br");
      asort($this->Nm_lang_conf_region);
      $_SESSION['scriptcase']['charset'] = "UTF-8";
      ini_set('default_charset', $_SESSION['scriptcase']['charset']);
      $_SESSION['scriptcase']['charset_html']  = (isset($this->sc_charset[$_SESSION['scriptcase']['charset']])) ? $this->sc_charset[$_SESSION['scriptcase']['charset']] : $_SESSION['scriptcase']['charset'];
      foreach ($this->Nm_conf_reg[$this->str_conf_reg] as $ind => $dados)
      {
          if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($dados))
          {
              $this->Nm_conf_reg[$this->str_conf_reg][$ind] = sc_convert_encoding($dados, $_SESSION['scriptcase']['charset'], "UTF-8");
          }
      }
      foreach ($this->Nm_lang as $ind => $dados)
      {
          if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($ind))
          {
              $ind = sc_convert_encoding($ind, $_SESSION['scriptcase']['charset'], "UTF-8");
              $this->Nm_lang[$ind] = $dados;
          }
          if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($dados))
          {
              $this->Nm_lang[$ind] = sc_convert_encoding($dados, $_SESSION['scriptcase']['charset'], "UTF-8");
          }
      }
      if (isset($this->Nm_lang['lang_errm_dbcn_conn']))
      {
          $_SESSION['scriptcase']['db_conn_error'] = $this->Nm_lang['lang_errm_dbcn_conn'];
      }
      $this->regionalDefault();
      if (isset($_SESSION['scriptcase']['home']['session_timeout']['redir'])) {
          $SS_cod_html  = '<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
';
          $SS_cod_html .= "<HTML>\r\n";
          $SS_cod_html .= " <HEAD>\r\n";
          $SS_cod_html .= "  <TITLE></TITLE>\r\n";
          $SS_cod_html .= "   <META http-equiv=\"Content-Type\" content=\"text/html; charset=" . $_SESSION['scriptcase']['charset_html'] . "\"/>\r\n";
          if ($_SESSION['scriptcase']['proc_mobile']) {
              $SS_cod_html .= "   <meta name=\"viewport\" content=\"width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0\"/>\r\n";
          }
          $SS_cod_html .= "   <META http-equiv=\"Expires\" content=\"Fri, Jan 01 1900 00:00:00 GMT\"/>\r\n";
          $SS_cod_html .= "    <META http-equiv=\"Pragma\" content=\"no-cache\"/>\r\n";
          if ($_SESSION['scriptcase']['home']['session_timeout']['redir_tp'] == "R") {
              $SS_cod_html .= "  </HEAD>\r\n";
              $SS_cod_html .= "   <body>\r\n";
          }
          else {
              $SS_cod_html .= "    <link rel=\"shortcut icon\" href=\"../_lib/img/grp__NM__ico__NM__barraca-de-acampamento.ico\">\r\n";
              $SS_cod_html .= "    <link rel=\"stylesheet\" type=\"text/css\" href=\"../_lib/css/" . $this->str_schema_all . "_menuH.css\"/>\r\n";
              $SS_cod_html .= "    <link rel=\"stylesheet\" type=\"text/css\" href=\"../_lib/css/" . $this->str_schema_all . "_menuH" . $_SESSION['scriptcase']['reg_conf']['css_dir'] . ".css\"/>\r\n";
              $SS_cod_html .= "  </HEAD>\r\n";
              $SS_cod_html .= "   <body class=\"scMenuHPage\">\r\n";
              $SS_cod_html .= "    <table align=\"center\"><tr><td style=\"padding: 0\"><div>\r\n";
              $SS_cod_html .= "    <table class=\"scMenuHTable\" width='100%' cellspacing=0 cellpadding=0><tr class=\"scMenuHHeader\"><td class=\"scMenuHHeaderFont\" style=\"padding: 15px 30px; text-align: center\">\r\n";
              $SS_cod_html .= $this->Nm_lang['lang_errm_expired_session'] . "\r\n";
              $SS_cod_html .= "     <form name=\"Fsession_redir\" method=\"post\"\r\n";
              $SS_cod_html .= "           target=\"_self\">\r\n";
              $SS_cod_html .= "           <input type=\"button\" name=\"sc_sai_seg\" value=\"OK\" onclick=\"sc_session_redir('" . $_SESSION['scriptcase']['home']['session_timeout']['redir'] . "');\">\r\n";
              $SS_cod_html .= "     </form>\r\n";
              $SS_cod_html .= "    </td></tr></table>\r\n";
              $SS_cod_html .= "    </div></td></tr></table>\r\n";
          }
          $SS_cod_html .= "    <script type=\"text/javascript\">\r\n";
          if ($_SESSION['scriptcase']['home']['session_timeout']['redir_tp'] == "R") {
              $SS_cod_html .= "      sc_session_redir('" . $_SESSION['scriptcase']['home']['session_timeout']['redir'] . "');\r\n";
          }
          $SS_cod_html .= "      function sc_session_redir(url_redir)\r\n";
          $SS_cod_html .= "      {\r\n";
          $SS_cod_html .= "         if (window.parent && window.parent.document != window.document && typeof window.parent.sc_session_redir === 'function')\r\n";
          $SS_cod_html .= "         {\r\n";
          $SS_cod_html .= "            window.parent.sc_session_redir(url_redir);\r\n";
          $SS_cod_html .= "         }\r\n";
          $SS_cod_html .= "         else\r\n";
          $SS_cod_html .= "         {\r\n";
          $SS_cod_html .= "             if (window.opener && typeof window.opener.sc_session_redir === 'function')\r\n";
          $SS_cod_html .= "             {\r\n";
          $SS_cod_html .= "                 window.close();\r\n";
          $SS_cod_html .= "                 window.opener.sc_session_redir(url_redir);\r\n";
          $SS_cod_html .= "             }\r\n";
          $SS_cod_html .= "             else\r\n";
          $SS_cod_html .= "             {\r\n";
          $SS_cod_html .= "                 window.location = url_redir;\r\n";
          $SS_cod_html .= "             }\r\n";
          $SS_cod_html .= "         }\r\n";
          $SS_cod_html .= "      }\r\n";
          $SS_cod_html .= "    </script>\r\n";
          $SS_cod_html .= " </body>\r\n";
          $SS_cod_html .= "</HTML>\r\n";
          unset($_SESSION['scriptcase']['home']['session_timeout']);
          unset($_SESSION['sc_session']);
      }
      if (isset($SS_cod_html))
      {
          echo $SS_cod_html;
          exit;
      }
$this->str_schema_all = $STR_schema_all = (isset($_SESSION['scriptcase']['str_schema_all']) && !empty($_SESSION['scriptcase']['str_schema_all'])) ? $_SESSION['scriptcase']['str_schema_all'] : "Sc9_Lemon/Sc9_Lemon";
if (isset($_SESSION['nm_session']['user']['sec']['flag']) && $_SESSION['nm_session']['user']['sec']['flag'] == "N") 
{ 
    $_SESSION['scriptcase']['sc_apl_seg']['home'] = "on";
} 
if (!isset($_SESSION['scriptcase']['home']['session_timeout']['redir']) && (!isset($_SESSION['scriptcase']['sc_apl_seg']['home']) || $_SESSION['scriptcase']['sc_apl_seg']['home'] != "on"))
{ 
    $NM_Mens_Erro = $this->Nm_lang['lang_errm_unth_user'];
       header("X-XSS-Protection: 1; mode=block");
       header("X-Frame-Options: SAMEORIGIN");
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">

    <HTML>
     <HEAD>
      <TITLE></TITLE>
     <META http-equiv="Content-Type" content="text/html; charset=<?php echo $_SESSION['scriptcase']['charset_html'] ?>" />
      <META http-equiv="Expires" content="Fri, Jan 01 1900 00:00:00 GMT"/>      <META http-equiv="Pragma" content="no-cache"/>
 <META http <META http <META http <META http <META http      <link rel="shortcut icon" href="../_lib/img/grp__NM__ico__NM__barraca-de-acampamento.ico">
      <link rel="stylesheet" type="text/css" href="../_lib/css/<?php echo $str_schema_all ?>_menuH.css" /> 
      <link rel="stylesheet" type="text/css" href="../_lib/css/<?php echo $str_schema_all ?>_menuH<?php echo $_SESSION['scriptcase']['reg_conf']['css_dir'] ?>.css" /> 
      <link rel="stylesheet" type="text/css" href="../_lib/css/<?php echo $this->str_schema_all ?>_grid.css" /> 
      <link rel="stylesheet" type="text/css" href="../_lib/css/<?php echo $this->str_schema_all ?>_grid<?php echo $_SESSION['scriptcase']['reg_conf']['css_dir'] ?>.css" /> 
     </HEAD>
     <body>
       <table align="center" class="scGridBorder"><tr><td style="padding: 0">
       <table style="width: 100%" class="scGridTabela"><tr class="scGridFieldOdd"><td class="scGridFieldOddFont" style="padding: 15px 30px; text-align: center">
        <?php echo $NM_Mens_Erro; ?>
        <br />
        <form name="Fseg" method="post" target="_self">
         <input type="hidden" name="script_case_init" value="<?php echo NM_encode_input($script_case_init) ?>"/> 
         <input type="button" name="sc_sai_seg" value="OK" onclick="nm_saida()"> 
        </form> 
       </td></tr></table>
       </td></tr></table>
<?php
              if (isset($_SESSION['scriptcase']['nm_sc_retorno']) && !empty($_SESSION['scriptcase']['nm_sc_retorno']))
              {
?>
<br /><br /><br />
<table align="center" class="scGridBorder" style="width: 450px"><tr><td style="padding: 0">
 <table style="width: 100%" class="scGridTabela">
  <tr class="scGridFieldOdd">
   <td class="scGridFieldOddFont" style="padding: 15px 30px">
    <?php echo $this->Nm_lang['lang_errm_unth_hwto']; ?>
   </td>
  </tr>
 </table>
</td></tr></table>
<?php
              }
?>
     </body>
     <?php
     if ((isset($nmgp_outra_jan) && $nmgp_outra_jan == 'true') || (isset($_SESSION['scriptcase']['sc_outra_jan']) && ($_SESSION['scriptcase']['sc_outra_jan'] == 'menutree' || $_SESSION['scriptcase']['sc_outra_jan'] == 'menu')))
     {
       $saida_final = 'window.close();';
     }
     else
     {
       $saida_final = 'history.back();';
     }
     ?>
    <script type="text/javascript">
      function nm_saida()
      {
<?php 
             echo $saida_final;
?> 
      }
     </script> 
<?php
    exit;
} 
      if (is_file($path_lib_php . "/nm_functions.php"))  
      {  
          $this->sc_Include($path_lib_php . "/nm_functions.php", "", "") ; 
      }  
      if (is_file($path_lib_php . "/nm_api.php"))  
      {  
          $this->sc_Include($path_lib_php . "/nm_api.php", "", "") ; 
      }  
      if (is_file($path_lib_php . "/nm_data.class.php"))  
      {
          $this->sc_Include($path_lib_php . "/nm_data.class.php", "C", "nm_data") ; 
          $this->nm_data = new nm_data("pt_br");
      }
$this->sc_Include($path_libs . "/nm_sec_prod.php", "F", "nm_reg_prod") ; 
include_once($path_adodb . "/adodb.inc.php"); 
$this->sc_Include($path_libs . "/nm_ini_perfil.php", "F", "perfil_lib") ; 
 if(function_exists('set_php_timezone')) set_php_timezone('home'); 
perfil_lib($path_libs);
if (!isset($_SESSION['sc_session'][1]['SC_Check_Perfil']))
{
    if(function_exists("nm_check_perfil_exists")) nm_check_perfil_exists($path_libs, $_SESSION['scriptcase']['home']['glo_nm_path_prod']);
    $_SESSION['sc_session'][1]['SC_Check_Perfil'] = true;
}
$nm_falta_var    = ""; 
$nm_falta_var_db = ""; 
if (isset($_SESSION['scriptcase']['home']['glo_nm_conexao']) && !empty($_SESSION['scriptcase']['home']['glo_nm_conexao']))
{
    db_conect_devel($_SESSION['scriptcase']['home']['glo_nm_conexao'], $str_root . $_SESSION['scriptcase']['home']['glo_nm_path_prod'], 'skini', 2); 
}
if (isset($_SESSION['scriptcase']['home']['glo_nm_perfil']) && !empty($_SESSION['scriptcase']['home']['glo_nm_perfil']))
{
   $_SESSION['scriptcase']['glo_perfil'] = $_SESSION['scriptcase']['home']['glo_nm_perfil'];
}
if (isset($_SESSION['scriptcase']['glo_perfil']) && !empty($_SESSION['scriptcase']['glo_perfil']))
{
    $_SESSION['scriptcase']['glo_senha_protect'] = "";
    carrega_perfil($_SESSION['scriptcase']['glo_perfil'], $path_libs, "");
    if (empty($_SESSION['scriptcase']['glo_senha_protect']))
    {
        $nm_falta_var .= "Perfil=" . $_SESSION['scriptcase']['glo_perfil'] . "; ";
    }
}
if (isset($_SESSION['scriptcase']['glo_date_separator']) && !empty($_SESSION['scriptcase']['glo_date_separator']))
{
    $SC_temp = trim($_SESSION['scriptcase']['glo_date_separator']);
    if (strlen($SC_temp) == 2)
    {
       $_SESSION['scriptcase']['home']['SC_sep_date']  = substr($SC_temp, 0, 1); 
       $_SESSION['scriptcase']['home']['SC_sep_date1'] = substr($SC_temp, 1, 1); 
   }
   else
    {
       $_SESSION['scriptcase']['home']['SC_sep_date']  = $SC_temp; 
       $_SESSION['scriptcase']['home']['SC_sep_date1'] = $SC_temp; 
   }
}
if (!isset($_SESSION['scriptcase']['glo_tpbanco']))
{
    $nm_falta_var_db .= "glo_tpbanco; ";
}
else
{
    $nm_tpbanco = $_SESSION['scriptcase']['glo_tpbanco']; 
}
if (!isset($_SESSION['scriptcase']['glo_servidor']))
{
    $nm_falta_var_db .= "glo_servidor; ";
}
else
{
    $nm_servidor = $_SESSION['scriptcase']['glo_servidor']; 
}
if (!isset($_SESSION['scriptcase']['glo_banco']))
{
    $nm_falta_var_db .= "glo_banco; ";
}
else
{
    $nm_banco = $_SESSION['scriptcase']['glo_banco']; 
}
if (!isset($_SESSION['scriptcase']['glo_usuario']))
{
    $nm_falta_var_db .= "glo_usuario; ";
}
else
{
    $nm_usuario = $_SESSION['scriptcase']['glo_usuario']; 
}
if (!isset($_SESSION['scriptcase']['glo_senha']))
{
    $nm_falta_var_db .= "glo_senha; ";
}
else
{
    $nm_senha = $_SESSION['scriptcase']['glo_senha']; 
}
$nm_con_db2 = array();
$nm_database_encoding = "";
if (isset($_SESSION['scriptcase']['glo_database_encoding']))
{
    $nm_database_encoding = $_SESSION['scriptcase']['glo_database_encoding']; 
}
$nm_arr_db_extra_args = array();
if (isset($_SESSION['scriptcase']['glo_use_ssl']))
{
    $nm_arr_db_extra_args['use_ssl'] = $_SESSION['scriptcase']['glo_use_ssl']; 
}
if (isset($_SESSION['scriptcase']['glo_mysql_ssl_key']))
{
    $nm_arr_db_extra_args['mysql_ssl_key'] = $_SESSION['scriptcase']['glo_mysql_ssl_key']; 
}
if (isset($_SESSION['scriptcase']['glo_mysql_ssl_cert']))
{
    $nm_arr_db_extra_args['mysql_ssl_cert'] = $_SESSION['scriptcase']['glo_mysql_ssl_cert']; 
}
if (isset($_SESSION['scriptcase']['glo_mysql_ssl_capath']))
{
    $nm_arr_db_extra_args['mysql_ssl_capath'] = $_SESSION['scriptcase']['glo_mysql_ssl_capath']; 
}
if (isset($_SESSION['scriptcase']['glo_mysql_ssl_ca']))
{
    $nm_arr_db_extra_args['mysql_ssl_ca'] = $_SESSION['scriptcase']['glo_mysql_ssl_ca']; 
}
if (isset($_SESSION['scriptcase']['glo_mysql_ssl_cipher']))
{
    $nm_arr_db_extra_args['mysql_ssl_cipher'] = $_SESSION['scriptcase']['glo_mysql_ssl_cipher']; 
}
$nm_con_persistente = "";
$nm_con_use_schema  = "";
if (isset($_SESSION['scriptcase']['glo_use_persistent']))
{
    $nm_con_persistente = $_SESSION['scriptcase']['glo_use_persistent']; 
}
if (isset($_SESSION['scriptcase']['glo_use_schema']))
{
    $nm_con_use_schema = $_SESSION['scriptcase']['glo_use_schema']; 
}
$str_message = "<html>

<head>
    <title>{var_str_title}</title>
    <style>
        body {
            margin: 0px;
            padding: 0px;
            overflow-x: hidden;
            min-width: 320px;
            background: #FFFFFF;
            font-family: 'Lato', 'Helvetica Neue', Arial, Helvetica, sans-serif;
            font-size: 14px;
            line-height: 1.4285em;
            color: rgba(0, 0, 0, 0.87);
            font-smoothing: antialiased;
        }

        html,
        body {
            height: 100%;
        }

        body {
            margin: 0;
        }

        *,
        *:before,
        *:after {
            box-sizing: inherit;
        }

        user agent stylesheet body {
            display: block;
            margin: 8px;
        }

        html {
            font-size: 14px;
        }

        html {
            line-height: 1.15;
            -ms-text-size-adjust: 100%;
            -webkit-text-size-adjust: 100%;
        }

        *,
        *:before,
        *:after {
            box-sizing: inherit;
        }

        *,
        *:before,
        *:after {
            box-sizing: inherit;
        }

        ::selection {
            background-color: #CCE2FF;
            color: rgba(0, 0, 0, 0.87);
        }

        .ui.container {
            width: 933px;
            min-width: 992px;
            max-width: 1199px;
            margin-left: auto !important;
            margin-right: auto !important;
        }

        .ui.container {
            display: block;
            max-width: 100% !important;
        }

        *,
        *:before,
        *:after {
            box-sizing: inherit;
        }

        .ui.message:last-child {
            margin-bottom: 0em;
        }

        .ui.message:first-child {
            margin-top: 0em;
        }

        .ui.message {
            font-size: 1em;
        }

        .ui.message {
            position: relative;
            min-height: 1em;
            margin: 1em 0em;
            background: #F8F8F9;
            padding: 1em 1.5em;
            line-height: 1.4285em;
            color: rgba(0, 0, 0, 0.87);
            transition: opacity 0.1s ease, color 0.1s ease, background 0.1s ease, box-shadow 0.1s ease;
            border-radius: 0.28571429rem;
            box-shadow: 0px 0px 0px 1px rgba(34, 36, 38, 0.22) inset, 0px 0px 0px 0px rgba(0, 0, 0, 0);
        }

        article,
        aside,
        footer,
        header,
        nav,
        section {
            display: block;
        }

        *,
        *:before,
        *:after {
            box-sizing: inherit;
        }

        .ui.message> :last-child {
            margin-bottom: 0em;
        }

        .ui.message> :first-child {
            margin-top: 0em;
        }

        .ui.message .header+p {
            margin-top: 0.25em;
        }

        .ui.message p {
            opacity: 0.85;
            margin: 0.75em 0em;
        }

        p {
            margin: 0em 0em 1em;
            line-height: 1.4285em;
        }

        .ui.message .header:not(.ui) {
            font-size: 1.14285714em;
        }

        .ui.message .header {
            display: block;
            font-family: 'Lato', 'Helvetica Neue', Arial, Helvetica, sans-serif;
            font-weight: bold;
            margin: -0.14285714em 0em 1.2rem 0em;
        }

        .ui.button {
            cursor: pointer;
            display: inline-block;
            min-height: 1em;
            outline: 0;
            border: none;
            vertical-align: baseline;
            background: #e0e1e2 none;
            color: rgba(0, 0, 0, .6);
            font-family: Lato, 'Helvetica Neue', Arial, Helvetica, sans-serif;
            margin: 0 .25em 0 0;
            padding: .78571429em 1.5em .78571429em;
            text-transform: none;
            text-shadow: none;
            font-weight: 700;
            line-height: 1em;
            font-style: normal;
            text-align: center;
            text-decoration: none;
            border-radius: .28571429rem;
            box-shadow: 0 0 0 1px transparent inset, 0 0 0 0 rgba(34, 36, 38, .15) inset;
            -webkit-user-select: none;
            -moz-user-select: none;
            -ms-user-select: none;
            user-select: none;
            transition: opacity .1s ease, background-color .1s ease, color .1s ease, box-shadow .1s ease, background .1s ease;
            will-change: '';
            -webkit-tap-highlight-color: transparent;
        }
        
        .ui.button,
        .ui.buttons .button,
        .ui.buttons .or {
            font-size: 1rem;
            flex-flow: row nowrap;
            justify-content: center;
            align-items: center;
            column-gap: .5rem;
            display: flex;
        }
        
        .ui.primary.button,
        .ui.primary.buttons .button {
            background-color: #2185d0;
            color: #fff;
            text-shadow: none;
            background-image: none;
        }
        
        .ui.primary.button {
            box-shadow: 0 0 0 0 rgba(34, 36, 38, .15) inset;
        }

        [type=reset], [type=submit], button, html [type=button] {
            -webkit-appearance: button;
        }

        .icon{
            position: relative;
            width: 1.2rem;
            height: 1.2rem;
            display: block;
            color: inherit;
            background-repeat: no-repeat;
        }

        .icon.database{
            background-image: url('data:image/svg+xml,<svg xmlns=\"http://www.w3.org/2000/svg\" viewBox=\"0 0 448 512\" fill=\"%23FFFFFF\"><path d=\"M448 80v48c0 44.2-100.3 80-224 80S0 172.2 0 128V80C0 35.8 100.3 0 224 0S448 35.8 448 80zM393.2 214.7c20.8-7.4 39.9-16.9 54.8-28.6V288c0 44.2-100.3 80-224 80S0 332.2 0 288V186.1c14.9 11.8 34 21.2 54.8 28.6C99.7 230.7 159.5 240 224 240s124.3-9.3 169.2-25.3zM0 346.1c14.9 11.8 34 21.2 54.8 28.6C99.7 390.7 159.5 400 224 400s124.3-9.3 169.2-25.3c20.8-7.4 39.9-16.9 54.8-28.6V432c0 44.2-100.3 80-224 80S0 476.2 0 432V346.1z\"/></svg>');
        }
    </style>
</head>

<body>
    <div class='ui container' style='padding-top:2rem'>
        <section class='ui message'>
            <div class='content'>
                <div class='header'>
                    <h1 class='ui header'>{var_str_title}</h1>
                </div>
                <p>{var_str_message}</p>
                <p>{var_str_message_conn}</p>
                {v_str_btn_inside}
            </div>
        </section>
    </div>";
$str_message_end = "</body>
</html>";
$str_message = str_replace('{var_str_title}', $this->Nm_lang['lang_errm_cmlb_nfndtitle'], $str_message);
$str_message = str_replace('{var_str_message_conn}','', $str_message);
$str_message = str_replace('{v_str_btn_inside}', '', $str_message);
if (!empty($nm_falta_var) || !empty($nm_falta_var_db))
{
    if (empty($nm_falta_var_db))
    {
         $str_message = str_replace('{var_str_message}', $this->Nm_lang['lang_errm_glob'], $str_message);
    }
    else
    {
         $str_message = str_replace('{var_str_message}', $this->Nm_lang['lang_errm_dbcn_data'], $str_message);
    }
    echo $str_message;
    if (isset($_SESSION['scriptcase']['nm_ret_exec']) && '' != $_SESSION['scriptcase']['nm_ret_exec'])
    { 
        if (isset($_SESSION['sc_session'][1]['home']['sc_outra_jan']) && $_SESSION['sc_session'][1]['home']['sc_outra_jan'])
        {
            echo "<a href='javascript:window.close()'><img border='0' src='" . $path_imag_cab . "/scriptcase__NM__exit.gif' title='" . $this->Nm_lang['lang_btns_menu_rtrn_hint'] . "' align=absmiddle></a> \n" ; 
        } 
        else 
        { 
            echo "<a href='" . $_SESSION['scriptcase']['nm_ret_exec'] . "><img border='0' src='" . $path_imag_cab . "/scriptcase__NM__exit.gif' title='" . $this->Nm_lang['lang_btns_menu_rtrn_hint'] . "' align=absmiddle></a> \n" ; 
        } 
    } 
    echo $str_message_end;
    exit ;
} 
if (isset($_SESSION['scriptcase']['glo_db_master_usr']) && !empty($_SESSION['scriptcase']['glo_db_master_usr']))
{
    $nm_usuario = $_SESSION['scriptcase']['glo_db_master_usr']; 
}
if (isset($_SESSION['scriptcase']['glo_db_master_pass']) && !empty($_SESSION['scriptcase']['glo_db_master_pass']))
{
    $nm_senha = $_SESSION['scriptcase']['glo_db_master_pass']; 
}
if (isset($_SESSION['scriptcase']['glo_db_master_cript']) && !empty($_SESSION['scriptcase']['glo_db_master_cript']))
{
    $_SESSION['scriptcase']['glo_senha_protect'] = $_SESSION['scriptcase']['glo_db_master_cript']; 
}
$sc_tem_trans_banco = false;
$this->nm_bases_access    = array("access", "ado_access", "ace_access");
$this->nm_bases_ibase     = array("ibase", "firebird", "pdo_firebird", "borland_ibase");
$this->nm_bases_mysql     = array("mysql", "mysqlt", "mysqli", "maxsql", "pdo_mysql", "azure_mysql", "azure_mysqlt", "azure_mysqli", "azure_maxsql", "azure_pdo_mysql", "googlecloud_mysql", "googlecloud_mysqlt", "googlecloud_mysqli", "googlecloud_maxsql", "googlecloud_pdo_mysql", "amazonrds_mysql", "amazonrds_mysqlt", "amazonrds_mysqli", "amazonrds_maxsql", "amazonrds_pdo_mysql");
$this->nm_bases_postgres  = array("postgres", "postgres64", "postgres7", "pdo_pgsql", "azure_postgres", "azure_postgres64", "azure_postgres7", "azure_pdo_pgsql", "googlecloud_postgres", "googlecloud_postgres64", "googlecloud_postgres7", "googlecloud_pdo_pgsql", "amazonrds_postgres", "amazonrds_postgres64", "amazonrds_postgres7", "amazonrds_pdo_pgsql");
$this->nm_bases_sqlite    = array("sqlite", "sqlite3", "pdosqlite");
$this->nm_bases_sybase    = array("sybase", "pdo_sybase_odbc", "pdo_sybase_dblib");
$this->nm_bases_vfp       = array("vfp");
$this->nm_bases_odbc      = array("odbc");
$this->nm_bases_progress  = array("pdo_progress_odbc", "progress");
$_SESSION['scriptcase']['sc_num_page'] = 1;
$_SESSION['scriptcase']['nm_bases_security']  = "enc_nm_enc_v1DcXOZSBiZ1BYHuBODMBOV9FiV5FYDoFGHQXOH9B/Z1rYHQJeHgrKHErCDWF/VoBiDcJUZSX7Z1BYHuFaDMvOV9FeV5X/VEBiHQBiZkFGHIveD5JwHgvsHEJqH5FGVoFGHQXsDQB/DSN7HuraDMBYZSNiDurGDoXGHQBiZ1X7HINKZMXGDMveVkJqDuXKVoFGHQXsDuBqHAN7HuBqDMrYVcB/HEBmVoBqD9BsZ1F7DSrYD5rqDMrYZSJ3DurmZuJsDcBiH9BiHIrwHurqDMBODkBsH5XKDoXGHQNmH9BqHIveHQFGHgvsVkJqHEB3VoFGDcBiDQFUD1BOV5BOHgrwVcFeV5X/DoXGHQBiZ1BOHAN7HuXGHgvsHErCDuXKDoF7D9XsDQJsDSBYV5FGHgNKDkBsHEX/VEBiDcNmZ1X7HANOHuBOHgBOZSJ3DuX/VoFGHQFYDQB/HArYHQF7HgvOVcFeDurGDoXGHQXGVIJsDSvOD5JeDMveHArCDWrGVoFGHQXODQFaZ1BYHQFaDMBYVcB/HEX/VoBqD9BsZ1F7DSrYD5rqDMrYZSJGH5FYDoF7DcXOZSFGHAveV5FUHuBYVcFKDur/VoJwHQJmVIJsDSvmD5FaHgNOHEBUDWr/DoB/DcBwZSFGHANOV5FUHuNOV9FiDWXCHMFaD9JmZ1B/HIrwV5FaDErKDkBsV5FaHMJeDcBwDQFGD1veHQXGHgvsVcBOHEX7DoraHQFYH9FaHAvmZMJeHgvCHEJGDWF/VoJeD9NwDQBqHIvsV5XGDMrwDkFCDuX7VEF7D9BiH9FaHAN7D5FaDEBOZSJGH5BmDoB/D9NwZSX7D1BeV5BOHuvmVcFCDWXCVENUDcBqH9B/HABYD5JeDMzGHAFKV5XKDoF7D9XsDQJsDSBYV5FGHgNKDkFCH5FqVoBqDcNwH9B/HIveD5FaDErKZSJGH5F/DoFUHQNmDQFaHArYHQFaHgrwVcFeV5X7HIBiHQFYZkFGHIBeHQFaHgrKHArCDWF/VoBiDcJUZSX7Z1BYHuFaHuzGDkBsDWBmVEraD9JmZ1rqHINKZMFaDEvsVkJqDWXCZuB/HQJKZ9F7D1BeHQrqDMNOVIFCDuX7HMBqHQJmZ1F7Z1vmD5rqDEBOHArCDWBmDoB/D9JKDQJsZ1rwD5F7HgrKVcB/V5X7DorqD9BsH9FaHAN7V5X7DMNKZSJGDWF/VoJeD9NwDQBOZ1N7V5JeHuvmVcrsDWXCHMBiD9BsVIraD1rwV5X7HgBeHENiH5FGDoBqHQBiDuBqHArYHuJwDMvOV9BUDWXKVoF7HQBiZ1BiHAzGD5BOHgNKVkJ3HEXCHIrqHQJeDuFaHIrwHuFaHuNOZSrCH5FqDoXGHQJmZ1BiHArKV5BODEBeVkJqDWF/HMXGD9NmH9X7HAN7HurqHgvsVIBODWrmDoXGDcFYZkFGHArKV5FUDMrYZSXeV5FqHIJsD9NwDQJsHABYV5raHgvsVIFCDWJeVoraD9BsZSFaDSNOV5FaHgBeHEFiV5B3DoF7D9XsDuFaHANKV5BODMvOVcBUDWrmVoFGHQNmZ1BiDSvOD5XGHgveVkJ3DWF/VoBiDcJUZSX7Z1BYHuFaDMvsV9FeDWFYVEFGDcFYZ1FaHArYV5FUDMzGHErCDuFYHMBOHQJKDQFGD1veHQBqDMvmVcFKV5BmVoBqD9BsZkFGHArKHQraHgBeHArCV5XCHIFGHQNwDQFaDSBYHQBODMzGV9FiDWXCHIJsHQXOZkFGHArKV5FUDMrYZSXeV5FqHIJsHQJeDuBOZ1vCV5Je";
 $glo_senha_protect = (isset($_SESSION['scriptcase']['glo_senha_protect'])) ? $_SESSION['scriptcase']['glo_senha_protect'] : "S";
if (isset($_SESSION['scriptcase']['nm_sc_retorno']) && !empty($_SESSION['scriptcase']['nm_sc_retorno']) && isset($_SESSION['scriptcase']['home']['glo_nm_conexao']) && !empty($_SESSION['scriptcase']['home']['glo_nm_conexao']))
{ 
   $this->Db = db_conect_devel($_SESSION['scriptcase']['home']['glo_nm_conexao'], $str_root . $_SESSION['scriptcase']['home']['glo_nm_path_prod'], 'skini'); 
} 
else 
{ 
   $this->Db = db_conect($nm_tpbanco, $nm_servidor, $nm_usuario, $nm_senha, $nm_banco, $glo_senha_protect, "S", $nm_con_persistente, $nm_con_db2, $nm_database_encoding, $nm_arr_db_extra_args); 
} 
$this->nm_tpbanco = $nm_tpbanco; 
if (in_array(strtolower($nm_tpbanco), $this->nm_bases_ibase) && function_exists('ibase_timefmt'))
{
    ibase_timefmt('%Y-%m-%d %H:%M:%S');
} 
if (in_array(strtolower($nm_tpbanco), $this->nm_bases_sybase))
{
   $this->Db->fetchMode = ADODB_FETCH_BOTH;
   $this->Db->Execute("set dateformat ymd");
} 
//
      $this->tab_grupo[0] = "skini/";
      if ($_SESSION['scriptcase']['sc_usa_grupo'] != "S")
      {
          $this->tab_grupo[0] = "";
      }
      $_SESSION['scriptcase']['home']['contr_erro'] = 'on';
if (!isset($_SESSION['tela'])) {$_SESSION['tela'] = "";}
if (!isset($this->sc_temp_tela)) {$this->sc_temp_tela = (isset($_SESSION['tela'])) ? $_SESSION['tela'] : "";}
if (!isset($_SESSION['logged_date_login'])) {$_SESSION['logged_date_login'] = "";}
if (!isset($this->sc_temp_logged_date_login)) {$this->sc_temp_logged_date_login = (isset($_SESSION['logged_date_login'])) ? $_SESSION['logged_date_login'] : "";}
if (!isset($_SESSION['logged_user'])) {$_SESSION['logged_user'] = "";}
if (!isset($this->sc_temp_logged_user)) {$this->sc_temp_logged_user = (isset($_SESSION['logged_user'])) ? $_SESSION['logged_user'] : "";}
  if($this->sc_script_name == 'sec_Login'){
    if(isset($_COOKIE['usr_data'])){
        unset($_COOKIE['usr_data']);
    }    $this->sc_logged_out($this->sc_temp_logged_user, $this->sc_temp_logged_date_login);
}
$this->sc_temp_tela = 'welcome';
if (isset($this->sc_temp_logged_user)) {$_SESSION['logged_user'] = $this->sc_temp_logged_user;}
if (isset($this->sc_temp_logged_date_login)) {$_SESSION['logged_date_login'] = $this->sc_temp_logged_date_login;}
if (isset($this->sc_temp_tela)) {$_SESSION['tela'] = $this->sc_temp_tela;}
$_SESSION['scriptcase']['home']['contr_erro'] = 'off';
      $_SESSION['scriptcase']['sc_ult_apl_menu'] = array();
      unset($_SESSION['scriptcase']['sc_usa_grupo']);
if ($this->Db)
{
    $this->Db->Close(); 
}
      $link_url = false;
      $parms_session = "";

      if ($_SESSION['scriptcase']['sc_item_menu'] == "home")
      {
              $apl_run = $_SESSION['scriptcase']['sc_apl_menu_link'] . $this->tab_grupo[0] . SC_dir_app_name("img_menu") . "/?nm_run_menu=1&nm_apl_menu=home&script_case_init=1";
      }
      elseif (isset($_SESSION['scriptcase']['sc_def_menu']['home']))
      {
         foreach($_SESSION['scriptcase']['sc_def_menu']['home'] as $id_item => $arr_item)
         {
             if ($_SESSION['scriptcase']['sc_item_menu'] == $id_item)
             { 
                 if ($arr_item['lnk_url'])
                 { 
                    $apl_run = $arr_item['url'];
                    $link_url = true;
                 } 
                 else 
                 { 
                    $this->menu_sc_init = (isset($arr_item['sc_init'])) ? $arr_item['sc_init'] : 1;
                    $apl_run = $_SESSION['scriptcase']['sc_apl_menu_link'] . $this->tab_grupo[0] . $arr_item['url']; 
                    $parms_session = $arr_item['parm']; 
                 } 
                break; 
             } 
         }
      }
      {
      if ($_SESSION['scriptcase']['sc_item_menu'] == "item_3")
      {
          $apl_run = $_SESSION['scriptcase']['sc_apl_menu_link'] . $this->tab_grupo[0] . SC_dir_app_name("accommodation") . "/?nmgp_outra_jan=true&nm_apl_menu=home";
      }
      if ($_SESSION['scriptcase']['sc_item_menu'] == "item_4")
      {
          $apl_run = $_SESSION['scriptcase']['sc_apl_menu_link'] . $this->tab_grupo[0] . SC_dir_app_name("admin") . "/?nmgp_outra_jan=true&nm_apl_menu=home";
      }
      if ($_SESSION['scriptcase']['sc_item_menu'] == "btn_1")
      {
          $apl_run = $_SESSION['scriptcase']['sc_apl_menu_link'] . $this->tab_grupo[0] . SC_dir_app_name("home") . "/?nmgp_outra_jan=true&nm_apl_menu=home";
      }
      if ($_SESSION['scriptcase']['sc_item_menu'] == "btn_12")
      {
          $apl_run = $_SESSION['scriptcase']['sc_apl_menu_link'] . $this->tab_grupo[0] . SC_dir_app_name("rpt_costumerCheck") . "/?nm_run_menu=1&nm_apl_menu=home&script_case_init=" . $this->Gera_sc_init($this->sc_menu_item) . "";
      }
      if ($_SESSION['scriptcase']['sc_item_menu'] == "btn_6")
      {
          $apl_run = $_SESSION['scriptcase']['sc_apl_menu_link'] . $this->tab_grupo[0] . SC_dir_app_name("que_lodge_category") . "/?nm_run_menu=1&nm_apl_menu=home&script_case_init=" . $this->Gera_sc_init($this->sc_menu_item) . "";
      }
      if ($_SESSION['scriptcase']['sc_item_menu'] == "btn_7")
      {
          $apl_run = $_SESSION['scriptcase']['sc_apl_menu_link'] . $this->tab_grupo[0] . SC_dir_app_name("que_costumers") . "/?nm_run_menu=1&nm_apl_menu=home&script_case_init=" . $this->Gera_sc_init($this->sc_menu_item) . "";
      }
      if ($_SESSION['scriptcase']['sc_item_menu'] == "btn_10")
      {
          $apl_run = $_SESSION['scriptcase']['sc_apl_menu_link'] . $this->tab_grupo[0] . SC_dir_app_name("admin") . "/?nmgp_outra_jan=true&nm_apl_menu=home";
      }
      if ($_SESSION['scriptcase']['sc_item_menu'] == "btn_9")
      {
          $apl_run = $_SESSION['scriptcase']['sc_apl_menu_link'] . $this->tab_grupo[0] . SC_dir_app_name("accommodation") . "/?nmgp_outra_jan=true&nm_apl_menu=home";
      }
      if ($_SESSION['scriptcase']['sc_item_menu'] == "btn_3")
      {
          $apl_run = $_SESSION['scriptcase']['sc_apl_menu_link'] . $this->tab_grupo[0] . SC_dir_app_name("sec_change_pswd") . "/?nm_run_menu=1&nm_apl_menu=home&script_case_init=" . $this->Gera_sc_init($this->sc_menu_item) . "";
      }
      if ($_SESSION['scriptcase']['sc_item_menu'] == "btn_4")
      {
          $apl_run = $_SESSION['scriptcase']['sc_apl_menu_link'] . $this->tab_grupo[0] . SC_dir_app_name("sec_login") . "/?script_case_init=" . $_SESSION['sc_session'][1]['home']['init'] . "";
      }
      }
      if (!$link_url)
      {
          $pos = strpos($apl_run, "?");
          if ($pos !== false)
          {
              $parms = "";
              $temp = explode("&", substr($apl_run, $pos + 1));
              foreach ($temp as $cada_parm)
              {
                  $parte_parm = explode("=", $cada_parm);
                  $parms .= (!empty($parms)) ? "?@?" . $parte_parm[0] . "?#?" : $parte_parm[0] . "?#?";
                  $parms .= (isset($parte_parm[1])) ? $parte_parm[1] : "";
              }
              $apl_run =  substr($apl_run, 0, $pos);
          }
      }
      if ($parms_session != "")
      {
          $parms  = isset($parms) ? $parms : '';
          $parms  = $parms_session . (substr($parms_session, -3, 3) != '?@?' ? '?@?' : '') . $parms;
      }
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">

      <html><body>
        <form name="fmenu" method="post" action="<?php echo NM_encode_input($apl_run); ?>">
          <input type=hidden name="nmgp_parms" value="<?php  echo NM_encode_input($parms); ?>"> 
          <input type=hidden name="script_case_init" value="<?php echo $this->menu_sc_init ?>"> 
          <input type=hidden name="nm_apl_menu" value="home"> 
<?php
      if (isset($_SESSION['scriptcase']['menu_mobile']) && $_SESSION['scriptcase']['menu_mobile'] == "home")
      {
?>
          <input type=hidden name="nmgp_url_saida" value="<?php echo $this->nm_location ?>"> 
<?php
      }
?>
        </form>
      <script type="text/javascript">
      function sc_session_redir(url_redir)
      {
          if (window.parent && window.parent.document != window.document && typeof window.parent.sc_session_redir === 'function')
          {
              window.parent.sc_session_redir(url_redir);
          }
          else
          {
              if (window.opener && typeof window.opener.sc_session_redir === 'function')
              {
                  window.close();
                  window.opener.sc_session_redir(url_redir);
              }
              else
              {
                  window.location = url_redir;
              }
          }
      }
<?php
      if (isset($_SESSION['scriptcase']['menu_mobile']) && $_SESSION['scriptcase']['menu_mobile'] == "home")
      {
?>
          window.history.pushState('Object', 'home', '<?php echo $this->nm_location ?>');
<?php
      }
      if ($link_url)
      {
?>
          window.location='<?php echo $apl_run; ?>'; 
<?php
      }
      else
      {
?>
          (function() { document.fmenu.submit(); })();
<?php
      }
?>
      </script>
      </body></html>
<?php
   }
   function Gera_sc_init($apl_menu)
   {
       $this->menu_sc_init = 1;
        return  1;
   }
function sc_logged($user, $ip = '')
	{
$_SESSION['scriptcase']['home']['contr_erro'] = 'on';
  
		$str_sql = "SELECT date_login, ip FROM sec_logged WHERE login = ". $this->Db->qstr($user) ." AND sc_session <> ".$this->Db->qstr('_SC_FAIL_SC_');

		 
      $nm_select = $str_sql; 
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_select; 
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
      if ($this->data = $this->Db->Execute($nm_select)) 
      { }
      elseif (isset($GLOBALS["NM_ERRO_IBASE"]) && $GLOBALS["NM_ERRO_IBASE"] != 1)  
      { 
          $this->data = false;
          $this->data_erro = $this->Db->ErrorMsg();
      } 


    if($this->data  === FALSE || !isset($this->data->fields[0]))
		{
            $ip = ($ip == '') ? $_SERVER['REMOTE_ADDR'] : $ip;
            $this->sc_logged_in($user, $ip);
            return true;
        }
		else
		{
            if (isset($_SESSION['scriptcase']['sc_apl_conf']['sec_logged']))
{
unset($_SESSION['scriptcase']['sc_apl_conf']['sec_logged']);
}
;
            $_SESSION['scriptcase']['sc_apl_seg']['sec_logged'] = "on";;
			 if (!isset($this->Campos_Mens_erro) || empty($this->Campos_Mens_erro))
 {
$this->nmgp_redireciona_form($_SESSION['scriptcase']['sc_apl_menu_link'] . $this->tab_grupo[0] . "" . SC_dir_app_name('sec_logged') . "/", "home_form_php.php", "user?#?" . NM_encode_input($user) . "?@?","_self", 440, 630);
 };
            return false;
        }
$_SESSION['scriptcase']['home']['contr_erro'] = 'off';
}
function sc_verify_logged()
{
$_SESSION['scriptcase']['home']['contr_erro'] = 'on';
if (!isset($_SESSION['logged_date_login'])) {$_SESSION['logged_date_login'] = "";}
if (!isset($this->sc_temp_logged_date_login)) {$this->sc_temp_logged_date_login = (isset($_SESSION['logged_date_login'])) ? $_SESSION['logged_date_login'] : "";}
if (!isset($_SESSION['logged_user'])) {$_SESSION['logged_user'] = "";}
if (!isset($this->sc_temp_logged_user)) {$this->sc_temp_logged_user = (isset($_SESSION['logged_user'])) ? $_SESSION['logged_user'] : "";}
  
		$str_sql = "SELECT count(*) FROM sec_logged WHERE login = ". $this->Db->qstr($this->sc_temp_logged_user) . " AND date_login = ". $this->Db->qstr($this->sc_temp_logged_date_login) ." AND sc_session <> ".$this->Db->qstr('_SC_FAIL_SC_');
     
      $nm_select = $str_sql; 
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_select; 
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
      $this->rs_logged = array();
      if ($SCrx = $this->Db->Execute($nm_select)) 
      { 
          $SCy = 0; 
          $nm_count = $SCrx->FieldCount();
          while (!$SCrx->EOF)
          { 
                 for ($SCx = 0; $SCx < $nm_count; $SCx++)
                 { 
                        $this->rs_logged[$SCy] [$SCx] = $SCrx->fields[$SCx];
                 }
                 $SCy++; 
                 $SCrx->MoveNext();
          } 
          $SCrx->Close();
      } 
      elseif (isset($GLOBALS["NM_ERRO_IBASE"]) && $GLOBALS["NM_ERRO_IBASE"] != 1)  
      { 
          $this->rs_logged = false;
          $this->rs_logged_erro = $this->Db->ErrorMsg();
      } 

    if($this->rs_logged[0][0] != 1)
		{
			 if (isset($this->sc_temp_logged_user)) {$_SESSION['logged_user'] = $this->sc_temp_logged_user;}
 if (isset($this->sc_temp_logged_date_login)) {$_SESSION['logged_date_login'] = $this->sc_temp_logged_date_login;}
 if (!isset($this->Campos_Mens_erro) || empty($this->Campos_Mens_erro))
 {
$this->nmgp_redireciona_form($_SESSION['scriptcase']['sc_apl_menu_link'] . $this->tab_grupo[0] . "" . SC_dir_app_name('sec_Login') . "/", "home_form_php.php", "","_parent", 440, 630);
 };
        }
if (isset($this->sc_temp_logged_user)) {$_SESSION['logged_user'] = $this->sc_temp_logged_user;}
if (isset($this->sc_temp_logged_date_login)) {$_SESSION['logged_date_login'] = $this->sc_temp_logged_date_login;}
$_SESSION['scriptcase']['home']['contr_erro'] = 'off';
}
function sc_logged_in($user, $ip = '')
{
$_SESSION['scriptcase']['home']['contr_erro'] = 'on';
if (!isset($_SESSION['logged_date_login'])) {$_SESSION['logged_date_login'] = "";}
if (!isset($this->sc_temp_logged_date_login)) {$this->sc_temp_logged_date_login = (isset($_SESSION['logged_date_login'])) ? $_SESSION['logged_date_login'] : "";}
if (!isset($_SESSION['logged_user'])) {$_SESSION['logged_user'] = "";}
if (!isset($this->sc_temp_logged_user)) {$this->sc_temp_logged_user = (isset($_SESSION['logged_user'])) ? $_SESSION['logged_user'] : "";}
  
    $ip = ($ip == '') ? $_SERVER['REMOTE_ADDR'] : $ip;
    $this->sc_temp_logged_user = $user;
    $this->sc_temp_logged_date_login = microtime(true);

        $str_sql = "DELETE FROM sec_logged WHERE login = ". $this->Db->qstr($user) . " AND sc_session = ".$this->Db->qstr('_SC_FAIL_SC_')." AND ip = ".$this->Db->qstr($ip);
    
     $nm_select = $str_sql; 
         $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_select;
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
         $rf = $this->Db->Execute($nm_select);
         if ($rf === false)
         {
             echo $this->Nm_lang['lang_errm_dber'] . ": " . $this->Db->ErrorMsg();
             echo "<br>APL: home";
             echo "<br>Line: " . __LINE__;
             if ($sc_tem_trans_banco)
             {
                 $this->Db->RollbackTrans(); 
                 $sc_tem_trans_banco = false;
             }
             exit;
         }
         $rf->Close();
      

    	$str_sql = "INSERT INTO sec_logged(login, date_login, sc_session, ip) VALUES (". $this->Db->qstr($user) .", ". $this->Db->qstr($this->sc_temp_logged_date_login) .", ". $this->Db->qstr(session_id()) .", ". $this->Db->qstr($ip) .")";
    
     $nm_select = $str_sql; 
         $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_select;
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
         $rf = $this->Db->Execute($nm_select);
         if ($rf === false)
         {
             echo $this->Nm_lang['lang_errm_dber'] . ": " . $this->Db->ErrorMsg();
             echo "<br>APL: home";
             echo "<br>Line: " . __LINE__;
             if ($sc_tem_trans_banco)
             {
                 $this->Db->RollbackTrans(); 
                 $sc_tem_trans_banco = false;
             }
             exit;
         }
         $rf->Close();
      
if (isset($this->sc_temp_logged_user)) {$_SESSION['logged_user'] = $this->sc_temp_logged_user;}
if (isset($this->sc_temp_logged_date_login)) {$_SESSION['logged_date_login'] = $this->sc_temp_logged_date_login;}
$_SESSION['scriptcase']['home']['contr_erro'] = 'off';
}
function sc_logged_in_fail($user, $ip = '')
{
$_SESSION['scriptcase']['home']['contr_erro'] = 'on';
  
    $ip = ($ip == '') ? $_SERVER['REMOTE_ADDR'] : $ip;
    $user = $this->Db->qstr($user);
        $str_sql = "INSERT INTO sec_logged(login, date_login, sc_session, ip) VALUES (" . $this->Db->qstr($user) . ", " . $this->Db->qstr(microtime(true)) . ", ". $this->Db->qstr('_SC_FAIL_SC_').", " . $this->Db->qstr($ip) . ")";
    
     $nm_select = $str_sql; 
         $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_select;
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
         $rf = $this->Db->Execute($nm_select);
         if ($rf === false)
         {
             echo $this->Nm_lang['lang_errm_dber'] . ": " . $this->Db->ErrorMsg();
             echo "<br>APL: home";
             echo "<br>Line: " . __LINE__;
             if ($sc_tem_trans_banco)
             {
                 $this->Db->RollbackTrans(); 
                 $sc_tem_trans_banco = false;
             }
             exit;
         }
         $rf->Close();
      
    return true;
$_SESSION['scriptcase']['home']['contr_erro'] = 'off';
}
function sc_logged_is_blocked($ip = '')
{
$_SESSION['scriptcase']['home']['contr_erro'] = 'on';
if (!isset($_SESSION['sett_brute_force_attempts'])) {$_SESSION['sett_brute_force_attempts'] = "";}
if (!isset($this->sc_temp_sett_brute_force_attempts)) {$this->sc_temp_sett_brute_force_attempts = (isset($_SESSION['sett_brute_force_attempts'])) ? $_SESSION['sett_brute_force_attempts'] : "";}
if (!isset($_SESSION['sett_brute_force_time_block'])) {$_SESSION['sett_brute_force_time_block'] = "";}
if (!isset($this->sc_temp_sett_brute_force_time_block)) {$this->sc_temp_sett_brute_force_time_block = (isset($_SESSION['sett_brute_force_time_block'])) ? $_SESSION['sett_brute_force_time_block'] : "";}
  
    $ip = ($ip == '') ? $_SERVER['REMOTE_ADDR'] : $ip;
    $minutes_ago = strtotime("-". $this->sc_temp_sett_brute_force_time_block ." minutes");
    $str_select = "SELECT count(*) FROM sec_logged WHERE sc_session = ".$this->Db->qstr('_SC_BLOCKED_SC_')." AND ip = ".$this->Db->qstr($ip)." AND date_login > ". $this->Db->qstr($minutes_ago);
     
      $nm_select = $str_select; 
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_select; 
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
      $this->rs_logged = array();
      if ($SCrx = $this->Db->Execute($nm_select)) 
      { 
          $SCy = 0; 
          $nm_count = $SCrx->FieldCount();
          while (!$SCrx->EOF)
          { 
                 for ($SCx = 0; $SCx < $nm_count; $SCx++)
                 { 
                        $this->rs_logged[$SCy] [$SCx] = $SCrx->fields[$SCx];
                 }
                 $SCy++; 
                 $SCrx->MoveNext();
          } 
          $SCrx->Close();
      } 
      elseif (isset($GLOBALS["NM_ERRO_IBASE"]) && $GLOBALS["NM_ERRO_IBASE"] != 1)  
      { 
          $this->rs_logged = false;
          $this->rs_logged_erro = $this->Db->ErrorMsg();
      } 

    if($this->rs_logged  !== FALSE && $this->rs_logged[0][0] == 1)
        {
            $message = $this->Nm_lang['lang_user_blocked'];
                $message = sprintf($message, 10);
                
 if (!isset($this->Campos_Mens_erro)){$this->Campos_Mens_erro = "";}
 if (!empty($this->Campos_Mens_erro)){$this->Campos_Mens_erro .= "<br>";}$this->Campos_Mens_erro .= $message;
;
                return true;
        }

        $str_select = "SELECT count(*) FROM sec_logged WHERE sc_session = ".$this->Db->qstr('_SC_FAIL_SC_')." AND ip = ".$this->Db->qstr($ip)." AND date_login > ". $this->Db->qstr($minutes_ago);
         
      $nm_select = $str_select; 
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_select; 
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
      $this->rs_logged = array();
      if ($SCrx = $this->Db->Execute($nm_select)) 
      { 
          $SCy = 0; 
          $nm_count = $SCrx->FieldCount();
          while (!$SCrx->EOF)
          { 
                 for ($SCx = 0; $SCx < $nm_count; $SCx++)
                 { 
                        $this->rs_logged[$SCy] [$SCx] = $SCrx->fields[$SCx];
                 }
                 $SCy++; 
                 $SCrx->MoveNext();
          } 
          $SCrx->Close();
      } 
      elseif (isset($GLOBALS["NM_ERRO_IBASE"]) && $GLOBALS["NM_ERRO_IBASE"] != 1)  
      { 
          $this->rs_logged = false;
          $this->rs_logged_erro = $this->Db->ErrorMsg();
      } 


        if($this->rs_logged  !== FALSE && $this->rs_logged[0][0] == $this->sc_temp_sett_brute_force_attempts )
        {
            $str_sql = "INSERT INTO sec_logged(login, date_login, sc_session, ip) VALUES (".$this->Db->qstr('blocked').", ". $this->Db->qstr(microtime(true)) .", ".$this->Db->qstr('_SC_BLOCKED_SC_'). ", ". $this->Db->qstr($ip) .")";
            
     $nm_select = $str_sql; 
         $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_select;
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
         $rf = $this->Db->Execute($nm_select);
         if ($rf === false)
         {
             echo $this->Nm_lang['lang_errm_dber'] . ": " . $this->Db->ErrorMsg();
             echo "<br>APL: home";
             echo "<br>Line: " . __LINE__;
             if ($sc_tem_trans_banco)
             {
                 $this->Db->RollbackTrans(); 
                 $sc_tem_trans_banco = false;
             }
             exit;
         }
         $rf->Close();
      
            $message = $this->Nm_lang['lang_user_blocked'];
                $message = sprintf($message, $this->sc_temp_sett_brute_force_time_block);
                
 if (!isset($this->Campos_Mens_erro)){$this->Campos_Mens_erro = "";}
 if (!empty($this->Campos_Mens_erro)){$this->Campos_Mens_erro .= "<br>";}$this->Campos_Mens_erro .= $message;
;
                return true;
        }
        return false;
if (isset($this->sc_temp_sett_brute_force_time_block)) {$_SESSION['sett_brute_force_time_block'] = $this->sc_temp_sett_brute_force_time_block;}
if (isset($this->sc_temp_sett_brute_force_attempts)) {$_SESSION['sett_brute_force_attempts'] = $this->sc_temp_sett_brute_force_attempts;}
$_SESSION['scriptcase']['home']['contr_erro'] = 'off';
}
function sc_logged_out($user, $date_login = '')
{
$_SESSION['scriptcase']['home']['contr_erro'] = 'on';
if (!isset($_SESSION['logged_user'])) {$_SESSION['logged_user'] = "";}
if (!isset($this->sc_temp_logged_user)) {$this->sc_temp_logged_user = (isset($_SESSION['logged_user'])) ? $_SESSION['logged_user'] : "";}
if (!isset($_SESSION['logged_date_login'])) {$_SESSION['logged_date_login'] = "";}
if (!isset($this->sc_temp_logged_date_login)) {$this->sc_temp_logged_date_login = (isset($_SESSION['logged_date_login'])) ? $_SESSION['logged_date_login'] : "";}
  
		$date_login = ($date_login == '' ? "" : " AND date_login = ". $this->Db->qstr($date_login) ."");

		$str_sql = "SELECT sc_session FROM sec_logged WHERE login = ". $this->Db->qstr($user) ." ". $date_login . " AND sc_session <> ".$this->Db->qstr('_SC_FAIL_SC_');
     
      $nm_select = $str_sql; 
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_select; 
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
      $this->data = array();
      if ($SCrx = $this->Db->Execute($nm_select)) 
      { 
          $SCy = 0; 
          $nm_count = $SCrx->FieldCount();
          while (!$SCrx->EOF)
          { 
                 for ($SCx = 0; $SCx < $nm_count; $SCx++)
                 { 
                        $this->data[$SCy] [$SCx] = $SCrx->fields[$SCx];
                 }
                 $SCy++; 
                 $SCrx->MoveNext();
          } 
          $SCrx->Close();
      } 
      elseif (isset($GLOBALS["NM_ERRO_IBASE"]) && $GLOBALS["NM_ERRO_IBASE"] != 1)  
      { 
          $this->data = false;
          $this->data_erro = $this->Db->ErrorMsg();
      } 

    if(isset($this->data[0][0]) && !empty($this->data[0][0]))
        {
            $session_bkp = $_SESSION;
            $sessionid = session_id();
            session_write_close();

            session_id($this->data[0][0]);
			session_start();
			$_SESSION['logged_user'] = 'logout';
			session_write_close();

			session_id($sessionid);
			session_start();
			$_SESSION = $session_bkp;
		}


		$str_sql = "DELETE FROM sec_logged WHERE login = ". $this->Db->qstr($user) . " " . $date_login;
		
     $nm_select = $str_sql; 
         $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_select;
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
         $rf = $this->Db->Execute($nm_select);
         if ($rf === false)
         {
             echo $this->Nm_lang['lang_errm_dber'] . ": " . $this->Db->ErrorMsg();
             echo "<br>APL: home";
             echo "<br>Line: " . __LINE__;
             if ($sc_tem_trans_banco)
             {
                 $this->Db->RollbackTrans(); 
                 $sc_tem_trans_banco = false;
             }
             exit;
         }
         $rf->Close();
      
		 unset($_SESSION['logged_date_login']);
 unset($this->sc_temp_logged_date_login);
 unset($_SESSION['logged_user']);
 unset($this->sc_temp_logged_user);
;
if (isset($this->sc_temp_logged_date_login)) {$_SESSION['logged_date_login'] = $this->sc_temp_logged_date_login;}
if (isset($this->sc_temp_logged_user)) {$_SESSION['logged_user'] = $this->sc_temp_logged_user;}
$_SESSION['scriptcase']['home']['contr_erro'] = 'off';
}
function sc_looged_check_logout()
    {
$_SESSION['scriptcase']['home']['contr_erro'] = 'on';
if (!isset($_SESSION['usr_email'])) {$_SESSION['usr_email'] = "";}
if (!isset($this->sc_temp_usr_email)) {$this->sc_temp_usr_email = (isset($_SESSION['usr_email'])) ? $_SESSION['usr_email'] : "";}
if (!isset($_SESSION['logged_date_login'])) {$_SESSION['logged_date_login'] = "";}
if (!isset($this->sc_temp_logged_date_login)) {$this->sc_temp_logged_date_login = (isset($_SESSION['logged_date_login'])) ? $_SESSION['logged_date_login'] : "";}
if (!isset($_SESSION['logged_user'])) {$_SESSION['logged_user'] = "";}
if (!isset($this->sc_temp_logged_user)) {$this->sc_temp_logged_user = (isset($_SESSION['logged_user'])) ? $_SESSION['logged_user'] : "";}
if (!isset($_SESSION['usr_login'])) {$_SESSION['usr_login'] = "";}
if (!isset($this->sc_temp_usr_login)) {$this->sc_temp_usr_login = (isset($_SESSION['usr_login'])) ? $_SESSION['usr_login'] : "";}
  
        if(isset($this->sc_temp_logged_user) && ($this->sc_temp_logged_user == 'logout' || empty($this->sc_temp_logged_user)))
        {
             unset($_SESSION['usr_login']);
 unset($this->sc_temp_usr_login);
 unset($_SESSION['logged_user']);
 unset($this->sc_temp_logged_user);
 unset($_SESSION['logged_date_login']);
 unset($this->sc_temp_logged_date_login);
 unset($_SESSION['usr_email']);
 unset($this->sc_temp_usr_email);
;
        }
if (isset($this->sc_temp_usr_login)) {$_SESSION['usr_login'] = $this->sc_temp_usr_login;}
if (isset($this->sc_temp_logged_user)) {$_SESSION['logged_user'] = $this->sc_temp_logged_user;}
if (isset($this->sc_temp_logged_date_login)) {$_SESSION['logged_date_login'] = $this->sc_temp_logged_date_login;}
if (isset($this->sc_temp_usr_email)) {$_SESSION['usr_email'] = $this->sc_temp_usr_email;}
$_SESSION['scriptcase']['home']['contr_erro'] = 'off';
}
   function nmgp_redireciona_form($nm_apl_dest, $nm_apl_retorno, $nm_apl_parms, $nm_target="", $alt_modal=0, $larg_modal=0)
   {
      if (is_array($nm_apl_parms))
      {
          $tmp_parms = "";
          foreach ($nm_apl_parms as $par => $val)
          {
              $par = trim($par);
              $val = trim($val);
              $tmp_parms .= str_replace(".", "_", $par) . "?#?";
              if (substr($val, 0, 1) == "$")
              {
                  $tmp_parms .= $$val;
              }
              elseif (substr($val, 0, 1) == "{")
              {
                  $val        = substr($val, 1, -1);
                  $tmp_parms .= $this->$val;
              }
              elseif (substr($val, 0, 1) == "[")
              {
                  $tmp_parms .= $_SESSION['sc_session'][1]['home'][substr($val, 1, -1)];
              }
              else
              {
                  $tmp_parms .= $val;
              }
              $tmp_parms .= "?@?";
          }
          $nm_apl_parms = $tmp_parms;
      }
      $nm_apl_retorno = $_SERVER['PHP_SELF'];
      $nm_apl_retorno = str_replace("\\", '/', $nm_apl_retorno);
      $nm_apl_retorno = str_replace('//', '/', $nm_apl_retorno);
      $nm_target_form = (empty($nm_target)) ? "_self" : $nm_target;
      if (strtolower(substr($nm_apl_dest, 0, 7)) == "http://" || strtolower(substr($nm_apl_dest, 0, 8)) == "https://" || strtolower(substr($nm_apl_dest, 0, 3)) == "../")
      {
          echo "<SCRIPT type=\"text/javascript\">";
          if (strtolower($nm_target) == "_blank")
          {
              echo "window.open ('" . $nm_apl_dest . "');";
          }
          else
          {
              echo "window.location='" . $nm_apl_dest . "';";
          }
          echo "</SCRIPT>";
          exit;
      }
      $dir = explode("/", $nm_apl_dest);
      if (count($dir) == 1)
      {
          $nm_apl_dest = str_replace(".php", "", $nm_apl_dest);
          $nm_apl_dest = $_SESSION['scriptcase']['sc_apl_menu_link'] . $this->tab_grupo[0] . $nm_apl_dest . "/" . $nm_apl_dest . ".php";
      }
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">

      <HTML>
      <HEAD>
       <TITLE>Skini</TITLE>
     <META http-equiv="Content-Type" content="text/html; charset=<?php echo $_SESSION['scriptcase']['charset_html'] ?>" />
       <META http-equiv="Expires" content="Fri, Jan 01 1900 00:00:00 GMT"/>
       <META http-equiv="Last-Modified" content="<?php echo gmdate("D, d M Y H:i:s"); ?> GMT"/>
       <META http-equiv="Cache-Control" content="no-store, no-cache, must-revalidate"/>
       <META http-equiv="Cache-Control" content="post-check=0, pre-check=0"/>
       <META http-equiv="Pragma" content="no-cache"/>
      </HEAD>
      <BODY>
      <form name="Fredir" method="post" 
                            target="_self"> 
        <input type="hidden" name="nmgp_parms" value="<?php echo NM_encode_input($nm_apl_parms) ?>"/>
<?php
   if ($nm_target == "_blank")
   {
?>
         <input type="hidden" name="nmgp_outra_jan" value="true"/> 
<?php
   }
   else
   {
?>
        <input type="hidden" name="nmgp_url_saida" value="<?php echo NM_encode_input($nm_apl_retorno) ?>">
        <input type="hidden" name="script_case_init" value="1"/> 
<?php
   }
?>
      </form> 
      <SCRIPT type="text/javascript">
          window.onload = function(){
             submit_Fredir();
          };
          function submit_Fredir()
          {
              document.Fredir.target = "<?php echo $nm_target_form ?>"; 
              document.Fredir.action = "<?php echo $nm_apl_dest ?>";
              document.Fredir.submit();
          }
      </SCRIPT>
      </BODY>
      </HTML>
<?php
     if ($nm_target != "_blank")
     {
         exit;
     }
   }
   function regionalDefault()
   {
       $_SESSION['scriptcase']['reg_conf']['date_format']   = (isset($this->Nm_conf_reg[$this->str_conf_reg]['data_format']))              ?  $this->Nm_conf_reg[$this->str_conf_reg]['data_format'] : "ddmmyyyy";
       $_SESSION['scriptcase']['reg_conf']['date_sep']      = (isset($this->Nm_conf_reg[$this->str_conf_reg]['data_sep']))                 ?  $this->Nm_conf_reg[$this->str_conf_reg]['data_sep'] : "/";
       $_SESSION['scriptcase']['reg_conf']['date_week_ini'] = (isset($this->Nm_conf_reg[$this->str_conf_reg]['prim_dia_sema']))            ?  $this->Nm_conf_reg[$this->str_conf_reg]['prim_dia_sema'] : "SU";
       $_SESSION['scriptcase']['reg_conf']['time_format']   = (isset($this->Nm_conf_reg[$this->str_conf_reg]['hora_format']))              ?  $this->Nm_conf_reg[$this->str_conf_reg]['hora_format'] : "hhiiss";
       $_SESSION['scriptcase']['reg_conf']['time_sep']      = (isset($this->Nm_conf_reg[$this->str_conf_reg]['hora_sep']))                 ?  $this->Nm_conf_reg[$this->str_conf_reg]['hora_sep'] : ":";
       $_SESSION['scriptcase']['reg_conf']['time_pos_ampm'] = (isset($this->Nm_conf_reg[$this->str_conf_reg]['hora_pos_ampm']))            ?  $this->Nm_conf_reg[$this->str_conf_reg]['hora_pos_ampm'] : "right_without_space";
       $_SESSION['scriptcase']['reg_conf']['time_simb_am']  = (isset($this->Nm_conf_reg[$this->str_conf_reg]['hora_simbolo_am']))          ?  $this->Nm_conf_reg[$this->str_conf_reg]['hora_simbolo_am'] : "am";
       $_SESSION['scriptcase']['reg_conf']['time_simb_pm']  = (isset($this->Nm_conf_reg[$this->str_conf_reg]['hora_simbolo_pm']))          ?  $this->Nm_conf_reg[$this->str_conf_reg]['hora_simbolo_pm'] : "pm";
       $_SESSION['scriptcase']['reg_conf']['simb_neg']      = (isset($this->Nm_conf_reg[$this->str_conf_reg]['num_sinal_neg']))            ?  $this->Nm_conf_reg[$this->str_conf_reg]['num_sinal_neg'] : "-";
       $_SESSION['scriptcase']['reg_conf']['grup_num']      = (isset($this->Nm_conf_reg[$this->str_conf_reg]['num_sep_agr']))              ?  $this->Nm_conf_reg[$this->str_conf_reg]['num_sep_agr'] : ".";
       $_SESSION['scriptcase']['reg_conf']['dec_num']       = (isset($this->Nm_conf_reg[$this->str_conf_reg]['num_sep_dec']))              ?  $this->Nm_conf_reg[$this->str_conf_reg]['num_sep_dec'] : ",";
       $_SESSION['scriptcase']['reg_conf']['neg_num']       = (isset($this->Nm_conf_reg[$this->str_conf_reg]['num_format_num_neg']))       ?  $this->Nm_conf_reg[$this->str_conf_reg]['num_format_num_neg'] : 2;
       $_SESSION['scriptcase']['reg_conf']['monet_simb']    = (isset($this->Nm_conf_reg[$this->str_conf_reg]['unid_mont_simbolo']))        ?  $this->Nm_conf_reg[$this->str_conf_reg]['unid_mont_simbolo'] : "R$";
       $_SESSION['scriptcase']['reg_conf']['monet_f_pos']   = (isset($this->Nm_conf_reg[$this->str_conf_reg]['unid_mont_format_num_pos'])) ?  $this->Nm_conf_reg[$this->str_conf_reg]['unid_mont_format_num_pos'] : 3;
       $_SESSION['scriptcase']['reg_conf']['monet_f_neg']   = (isset($this->Nm_conf_reg[$this->str_conf_reg]['unid_mont_format_num_neg'])) ?  $this->Nm_conf_reg[$this->str_conf_reg]['unid_mont_format_num_neg'] : 13;
       $_SESSION['scriptcase']['reg_conf']['grup_val']      = (isset($this->Nm_conf_reg[$this->str_conf_reg]['unid_mont_sep_agr']))        ?  $this->Nm_conf_reg[$this->str_conf_reg]['unid_mont_sep_agr'] : ".";
       $_SESSION['scriptcase']['reg_conf']['dec_val']       = (isset($this->Nm_conf_reg[$this->str_conf_reg]['unid_mont_sep_dec']))        ?  $this->Nm_conf_reg[$this->str_conf_reg]['unid_mont_sep_dec'] : ",";
       $_SESSION['scriptcase']['reg_conf']['html_dir']      = (isset($this->Nm_conf_reg[$this->str_conf_reg]['ger_ltr_rtl']))              ?  " DIR='" . $this->Nm_conf_reg[$this->str_conf_reg]['ger_ltr_rtl'] . "'" : "";
       $_SESSION['scriptcase']['reg_conf']['css_dir']       = (isset($this->Nm_conf_reg[$this->str_conf_reg]['ger_ltr_rtl']))              ?  $this->Nm_conf_reg[$this->str_conf_reg]['ger_ltr_rtl'] : "LTR";
       $_SESSION['scriptcase']['reg_conf']['html_dir_only'] = (isset($this->Nm_conf_reg[$this->str_conf_reg]['ger_ltr_rtl']))              ?  $this->Nm_conf_reg[$this->str_conf_reg]['ger_ltr_rtl'] : "";
       $_SESSION['scriptcase']['reg_conf']['num_group_digit']       = (isset($this->Nm_conf_reg[$this->str_conf_reg]['num_group_digit']))       ?  $this->Nm_conf_reg[$this->str_conf_reg]['num_group_digit'] : "1";
       $_SESSION['scriptcase']['reg_conf']['unid_mont_group_digit'] = (isset($this->Nm_conf_reg[$this->str_conf_reg]['unid_mont_group_digit'])) ?  $this->Nm_conf_reg[$this->str_conf_reg]['unid_mont_group_digit'] : "1";
   }
}
if (!function_exists("SC_dir_app_ini"))
{
    include_once("../_lib/lib/php/nm_ctrl_app_name.php");
}
SC_dir_app_ini('skini');
$Sem_Session = (!isset($_SESSION['sc_session'])) ? true : false;
$_SESSION['scriptcase']['sem_session'] = false;
$NM_dir_atual = getcwd();
if (empty($NM_dir_atual)) {
    $str_path_sys  = (isset($_SERVER['SCRIPT_FILENAME'])) ? $_SERVER['SCRIPT_FILENAME'] : $_SERVER['ORIG_PATH_TRANSLATED'];
    $str_path_sys  = str_replace("\\", '/', $str_path_sys);
}
else {
    $sc_nm_arquivo = explode("/", $_SERVER['PHP_SELF']);
    $str_path_sys  = str_replace("\\", "/", getcwd()) . "/" . $sc_nm_arquivo[count($sc_nm_arquivo)-1];
}
$str_path_web    = $_SERVER['PHP_SELF'];
$str_path_web    = str_replace("\\", '/', $str_path_web);
$str_path_web    = str_replace('//', '/', $str_path_web);
$path_aplicacao  = substr($str_path_web, 0, strrpos($str_path_web, '/'));
$path_aplicacao  = substr($path_aplicacao, 0, strrpos($path_aplicacao, '/'));
$root            = substr($str_path_sys, 0, -1 * strlen($str_path_web));
if ($Sem_Session && (!isset($nmgp_start) || $nmgp_start != "SC")) {
    if (isset($_COOKIE['sc_apl_default_skini'])) {
        $apl_def = explode(",", $_COOKIE['sc_apl_default_skini']);
    }
    elseif (is_file($root . $_SESSION['scriptcase']['home']['glo_nm_path_imag_temp'] . "/sc_apl_default_skini.txt")) {
        $apl_def = explode(",", file_get_contents($root . $_SESSION['scriptcase']['home']['glo_nm_path_imag_temp'] . "/sc_apl_default_skini.txt"));
    }
    if (isset($apl_def)) {
        if ($apl_def[0] != "home") {
            $_SESSION['scriptcase']['sem_session'] = true;
            if (strtolower(substr($apl_def[0], 0 , 7)) == "http://" || strtolower(substr($apl_def[0], 0 , 8)) == "https://" || substr($apl_def[0], 0 , 2) == "..") {
                $_SESSION['scriptcase']['home']['session_timeout']['redir'] = $apl_def[0];
            }
            else {
                $_SESSION['scriptcase']['home']['session_timeout']['redir'] = $path_aplicacao . "/" . SC_dir_app_name($apl_def[0]) . "/index.php";
            }
            $Redir_tp = (isset($apl_def[1])) ? trim(strtoupper($apl_def[1])) : "";
            $_SESSION['scriptcase']['home']['session_timeout']['redir_tp'] = $Redir_tp;
        }
        if (isset($_COOKIE['sc_actual_lang_skini'])) {
            $_SESSION['scriptcase']['home']['session_timeout']['lang'] = $_COOKIE['sc_actual_lang_skini'];
        }
    }
}
$controle = new home_form_php();
$controle->init();
?>
