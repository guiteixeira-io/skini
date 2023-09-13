<?php

if(isset($this->Ini->Nm_lang))
{
    $Nm_lang = $this->Ini->Nm_lang;
}
else
{
    $Nm_lang = $this->Nm_lang;
}


$this->nmgp_botoes['btn_1']  = 'on';
$this->arr_buttons['btn_1']['hint']             = "Cadastros";
$this->arr_buttons['btn_1']['type']             = "button";
$this->arr_buttons['btn_1']['value']            = "Cadastros";
$this->arr_buttons['btn_1']['display']          = "text_fontawesomeicon";
$this->arr_buttons['btn_1']['display_position'] = "text_right";
$this->arr_buttons['btn_1']['style']            = "danger";
$this->arr_buttons['btn_1']['image']            = "";

$this->arr_buttons['btn_1']['has_fa']           = "true";

$this->arr_buttons['btn_1']['fontawesomeicon']  = "fas fa-database";

$this->nmgp_botoes['btn_3']  = 'on';
$this->arr_buttons['btn_3']['hint']             = "Modulos";
$this->arr_buttons['btn_3']['type']             = "button";
$this->arr_buttons['btn_3']['value']            = "Apps";
$this->arr_buttons['btn_3']['display']          = "only_fontawesomeicon";
$this->arr_buttons['btn_3']['display_position'] = "text_right";
$this->arr_buttons['btn_3']['style']            = "default";
$this->arr_buttons['btn_3']['image']            = "";

$this->arr_buttons['btn_3']['has_fa']           = "true";

$this->arr_buttons['btn_3']['fontawesomeicon']  = "fas fa-th";

$this->nmgp_botoes['btn_6']  = 'on';
$this->arr_buttons['btn_6']['hint']             = "Inicio";
$this->arr_buttons['btn_6']['type']             = "button";
$this->arr_buttons['btn_6']['value']            = "Inicio";
$this->arr_buttons['btn_6']['display']          = "text_fontawesomeicon";
$this->arr_buttons['btn_6']['display_position'] = "text_right";
$this->arr_buttons['btn_6']['style']            = "default";
$this->arr_buttons['btn_6']['image']            = "";

$this->arr_buttons['btn_6']['has_fa']           = "true";

$this->arr_buttons['btn_6']['fontawesomeicon']  = "fas fa-home";

$this->nmgp_botoes['btn_9']  = 'on';
$this->arr_buttons['btn_9']['hint']             = "Admin";
$this->arr_buttons['btn_9']['type']             = "button";
$this->arr_buttons['btn_9']['value']            = "Admin";
$this->arr_buttons['btn_9']['display']          = "text_fontawesomeicon";
$this->arr_buttons['btn_9']['display_position'] = "text_right";
$this->arr_buttons['btn_9']['style']            = "default";
$this->arr_buttons['btn_9']['image']            = "";

$this->arr_buttons['btn_9']['has_fa']           = "true";

$this->arr_buttons['btn_9']['fontawesomeicon']  = "fas fa-user-cog";

$this->nmgp_botoes['btn_2']  = 'on';
$this->arr_buttons['btn_2']['hint']             = "Usuário";
$this->arr_buttons['btn_2']['type']             = "button";
$this->arr_buttons['btn_2']['value']            = "Usuário";
$this->arr_buttons['btn_2']['display']          = "only_fontawesomeicon";
$this->arr_buttons['btn_2']['display_position'] = "text_right";
$this->arr_buttons['btn_2']['style']            = "default";
$this->arr_buttons['btn_2']['image']            = "";

$this->arr_buttons['btn_2']['has_fa']           = "true";

$this->arr_buttons['btn_2']['fontawesomeicon']  = "fas fa-user-circle";

$this->nmgp_botoes['btn_7']  = 'on';
$this->arr_buttons['btn_7']['hint']             = "Alterar senha";
$this->arr_buttons['btn_7']['type']             = "button";
$this->arr_buttons['btn_7']['value']            = "Alterar senha";
$this->arr_buttons['btn_7']['display']          = "text_fontawesomeicon";
$this->arr_buttons['btn_7']['display_position'] = "text_right";
$this->arr_buttons['btn_7']['style']            = "default";
$this->arr_buttons['btn_7']['image']            = "";

$this->arr_buttons['btn_7']['has_fa']           = "true";

$this->arr_buttons['btn_7']['fontawesomeicon']  = "fas fa-key";

$this->nmgp_botoes['btn_8']  = 'on';
$this->arr_buttons['btn_8']['hint']             = "";
$this->arr_buttons['btn_8']['type']             = "button";
$this->arr_buttons['btn_8']['value']            = "" . $Nm_lang['lang_exit'] . "";
$this->arr_buttons['btn_8']['display']          = "text_fontawesomeicon";
$this->arr_buttons['btn_8']['display_position'] = "text_right";
$this->arr_buttons['btn_8']['style']            = "default";
$this->arr_buttons['btn_8']['image']            = "";

$this->arr_buttons['btn_8']['has_fa']           = "true";

$this->arr_buttons['btn_8']['fontawesomeicon']  = "fas fa-sign-out-alt";


?>