
function scJQGeneralAdd() {
  scLoadScInput('input:text.sc-js-input');
  scLoadScInput('input:password.sc-js-input');
  scLoadScInput('input:checkbox.sc-js-input');
  scLoadScInput('input:radio.sc-js-input');
  scLoadScInput('select.sc-js-input');
  scLoadScInput('textarea.sc-js-input');

} // scJQGeneralAdd

function scFocusField(sField) {
  var $oField = $('#id_sc_field_' + sField);

  if (0 == $oField.length) {
    $oField = $('input[name=' + sField + ']');
  }

  if (0 == $oField.length && document.F1.elements[sField]) {
    $oField = $(document.F1.elements[sField]);
  }

  if ($("#id_ac_" + sField).length > 0) {
    if ($oField.hasClass("select2-hidden-accessible")) {
      if (false == scSetFocusOnField($oField)) {
        setTimeout(function() { scSetFocusOnField($oField); }, 500);
      }
    }
    else {
      if (false == scSetFocusOnField($oField)) {
        if (false == scSetFocusOnField($("#id_ac_" + sField))) {
          setTimeout(function() { scSetFocusOnField($("#id_ac_" + sField)); }, 500);
        }
      }
      else {
        setTimeout(function() { scSetFocusOnField($oField); }, 500);
      }
    }
  }
  else {
    setTimeout(function() { scSetFocusOnField($oField); }, 500);
  }
} // scFocusField

function scSetFocusOnField($oField) {
  if ($oField.length > 0 && $oField[0].offsetHeight > 0 && $oField[0].offsetWidth > 0 && !$oField[0].disabled) {
    $oField[0].focus();
    return true;
  }
  return false;
} // scSetFocusOnField

function scEventControl_init(iSeqRow) {
  scEventControl_data["name" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["capacity" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["color" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["price" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["lodge" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
}

function scEventControl_active(iSeqRow) {
  if (scEventControl_data["name" + iSeqRow] && scEventControl_data["name" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["name" + iSeqRow] && scEventControl_data["name" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["capacity" + iSeqRow] && scEventControl_data["capacity" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["capacity" + iSeqRow] && scEventControl_data["capacity" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["color" + iSeqRow] && scEventControl_data["color" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["color" + iSeqRow] && scEventControl_data["color" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["price" + iSeqRow] && scEventControl_data["price" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["price" + iSeqRow] && scEventControl_data["price" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["lodge" + iSeqRow] && scEventControl_data["lodge" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["lodge" + iSeqRow] && scEventControl_data["lodge" + iSeqRow]["change"]) {
    return true;
  }
  return false;
} // scEventControl_active

function scEventControl_onFocus(oField, iSeq) {
  var fieldId, fieldName;
  fieldId = $(oField).attr("id");
  fieldName = fieldId.substr(12);
  scEventControl_data[fieldName]["blur"] = true;
  scEventControl_data[fieldName]["change"] = false;
} // scEventControl_onFocus

function scEventControl_onBlur(sFieldName) {
  scEventControl_data[sFieldName]["blur"] = false;
  if (scEventControl_data[sFieldName]["change"]) {
        if (scEventControl_data[sFieldName]["original"] == $("#id_sc_field_" + sFieldName).val() || scEventControl_data[sFieldName]["calculated"] == $("#id_sc_field_" + sFieldName).val()) {
          scEventControl_data[sFieldName]["change"] = false;
        }
  }
} // scEventControl_onBlur

function scEventControl_onChange(sFieldName) {
  scEventControl_data[sFieldName]["change"] = false;
} // scEventControl_onChange

function scEventControl_onAutocomp(sFieldName) {
  scEventControl_data[sFieldName]["autocomp"] = false;
} // scEventControl_onChange

var scEventControl_data = {};

function scJQEventsAdd(iSeqRow) {
  $('#id_sc_field_idlodgecategory' + iSeqRow).bind('change', function() { sc_cad_lodge_category_idlodgecategory_onchange(this, iSeqRow) });
  $('#id_sc_field_name' + iSeqRow).bind('blur', function() { sc_cad_lodge_category_name_onblur(this, iSeqRow) })
                                  .bind('change', function() { sc_cad_lodge_category_name_onchange(this, iSeqRow) })
                                  .bind('focus', function() { sc_cad_lodge_category_name_onfocus(this, iSeqRow) });
  $('#id_sc_field_capacity' + iSeqRow).bind('blur', function() { sc_cad_lodge_category_capacity_onblur(this, iSeqRow) })
                                      .bind('change', function() { sc_cad_lodge_category_capacity_onchange(this, iSeqRow) })
                                      .bind('focus', function() { sc_cad_lodge_category_capacity_onfocus(this, iSeqRow) });
  $('#id_sc_field_color' + iSeqRow).bind('blur', function() { sc_cad_lodge_category_color_onblur(this, iSeqRow) })
                                   .bind('change', function() { sc_cad_lodge_category_color_onchange(this, iSeqRow) })
                                   .bind('focus', function() { sc_cad_lodge_category_color_onfocus(this, iSeqRow) });
  $('#id_sc_field_price' + iSeqRow).bind('blur', function() { sc_cad_lodge_category_price_onblur(this, iSeqRow) })
                                   .bind('change', function() { sc_cad_lodge_category_price_onchange(this, iSeqRow) })
                                   .bind('focus', function() { sc_cad_lodge_category_price_onfocus(this, iSeqRow) });
  $('#id_sc_field_lodge' + iSeqRow).bind('blur', function() { sc_cad_lodge_category_lodge_onblur(this, iSeqRow) })
                                   .bind('change', function() { sc_cad_lodge_category_lodge_onchange(this, iSeqRow) })
                                   .bind('focus', function() { sc_cad_lodge_category_lodge_onfocus(this, iSeqRow) });
} // scJQEventsAdd

function sc_cad_lodge_category_idlodgecategory_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_cad_lodge_category_name_onblur(oThis, iSeqRow) {
  do_ajax_cad_lodge_category_validate_name();
  scCssBlur(oThis);
}

function sc_cad_lodge_category_name_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_cad_lodge_category_name_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_cad_lodge_category_capacity_onblur(oThis, iSeqRow) {
  do_ajax_cad_lodge_category_validate_capacity();
  scCssBlur(oThis);
}

function sc_cad_lodge_category_capacity_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_cad_lodge_category_capacity_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_cad_lodge_category_color_onblur(oThis, iSeqRow) {
  do_ajax_cad_lodge_category_validate_color();
  scCssBlur(oThis);
}

function sc_cad_lodge_category_color_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_cad_lodge_category_color_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_cad_lodge_category_price_onblur(oThis, iSeqRow) {
  do_ajax_cad_lodge_category_validate_price();
  scCssBlur(oThis);
}

function sc_cad_lodge_category_price_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_cad_lodge_category_price_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_cad_lodge_category_lodge_onblur(oThis, iSeqRow) {
  do_ajax_cad_lodge_category_validate_lodge();
  scCssBlur(oThis);
}

function sc_cad_lodge_category_lodge_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_cad_lodge_category_lodge_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function displayChange_block(block, status) {
	if ("0" == block) {
		displayChange_block_0(status);
	}
	if ("1" == block) {
		displayChange_block_1(status);
	}
	if ("2" == block) {
		displayChange_block_2(status);
	}
}

function displayChange_block_0(status) {
	displayChange_field("name", "", status);
	displayChange_field("capacity", "", status);
	displayChange_field("color", "", status);
}

function displayChange_block_1(status) {
	displayChange_field("price", "", status);
}

function displayChange_block_2(status) {
	displayChange_field("lodge", "", status);
}

function displayChange_row(row, status) {
	displayChange_field_name(row, status);
	displayChange_field_capacity(row, status);
	displayChange_field_color(row, status);
	displayChange_field_price(row, status);
	displayChange_field_lodge(row, status);
}

function displayChange_field(field, row, status) {
	if ("name" == field) {
		displayChange_field_name(row, status);
	}
	if ("capacity" == field) {
		displayChange_field_capacity(row, status);
	}
	if ("color" == field) {
		displayChange_field_color(row, status);
	}
	if ("price" == field) {
		displayChange_field_price(row, status);
	}
	if ("lodge" == field) {
		displayChange_field_lodge(row, status);
	}
}

function displayChange_field_name(row, status) {
    var fieldId;
}

function displayChange_field_capacity(row, status) {
    var fieldId;
}

function displayChange_field_color(row, status) {
    var fieldId;
}

function displayChange_field_price(row, status) {
    var fieldId;
	if ("on" == status && typeof $("#nmsc_iframe_liga_sub_lodgePrice")[0].contentWindow.scRecreateSelect2 === "function") {
		$("#nmsc_iframe_liga_sub_lodgePrice")[0].contentWindow.scRecreateSelect2();
	}
}

function displayChange_field_lodge(row, status) {
    var fieldId;
	if ("on" == status && typeof $("#nmsc_iframe_liga_cad_lodge")[0].contentWindow.scRecreateSelect2 === "function") {
		$("#nmsc_iframe_liga_cad_lodge")[0].contentWindow.scRecreateSelect2();
	}
}

function scRecreateSelect2() {
}
function scResetPagesDisplay() {
	$(".sc-form-page").show();
}

function scHidePage(pageNo) {
	$("#id_cad_lodge_category_form" + pageNo).hide();
}

function scCheckNoPageSelected() {
	if (!$(".sc-form-page").filter(".scTabActive").filter(":visible").length) {
		var inactiveTabs = $(".sc-form-page").filter(".scTabInactive").filter(":visible");
		if (inactiveTabs.length) {
			var tabNo = $(inactiveTabs[0]).attr("id").substr(26);
		}
	}
}
function scJQColorPickerAdd(iSeqRow) {
  $("#color" + iSeqRow + "_cor").ColorPicker({
    onShow: function(colpkr) {
      $(colpkr).fadeIn(500);
      return false;
    },
    onHide: function(colpkr) {
      $(colpkr).fadeOut(500);
      return false;
    },
    onChange: function(hsb, hex, rgb) {
      $("#id_sc_field_color" + iSeqRow).val("#" + hex);
    },
    onSubmit: function(hsb, hex, rgb, el) {
      $("#id_sc_field_color" + iSeqRow).val("#" + hex);
      $(el).ColorPickerHide();
    },
    onBeforeShow: function() {
      var origVal = $("#id_sc_field_color" + iSeqRow).val();
      if ("#" == origVal.substr(0, 1)) {
        origVal = origVal.substr(1);
      }
      $(this).ColorPickerSetColor(origVal);
    }
  });
} // scJQColorPickerAdd

function scJQUploadAdd(iSeqRow) {
} // scJQUploadAdd

var api_cache_requests = [];
function ajax_check_file(img_name, field  ,t, p, p_cache, iSeqRow, hasRun, img_before){
    setTimeout(function(){
        if(img_name == '') return;
        iSeqRow= iSeqRow !== undefined && iSeqRow !== null ? iSeqRow : '';
        var hasVar = p.indexOf('_@NM@_') > -1 || p_cache.indexOf('_@NM@_') > -1 ? true : false;

        p = p.split('_@NM@_');
        $.each(p, function(i,v){
            try{
                p[i] = $('[name='+v+iSeqRow+']').val();
            }
            catch(err){
                p[i] = v;
            }
        });
        p = p.join('');

        p_cache = p_cache.split('_@NM@_');
        $.each(p_cache, function(i,v){
            try{
                p_cache[i] = $('[name='+v+iSeqRow+']').val();
            }
            catch(err){
                p_cache[i] = v;
            }
        });
        p_cache = p_cache.join('');

        img_before = img_before !== undefined ? img_before : $(t).attr('src');
        var str_key_cache = '<?php echo $this->Ini->sc_page; ?>' + img_name+field+p+p_cache;
        if(api_cache_requests[ str_key_cache ] !== undefined && api_cache_requests[ str_key_cache ] !== null){
            if(api_cache_requests[ str_key_cache ] != false){
                do_ajax_check_file(api_cache_requests[ str_key_cache ], field  ,t, iSeqRow);
            }
            return;
        }
        //scAjaxProcOn();
        $(t).attr('src', '<?php echo $this->Ini->path_icones ?>/scriptcase__NM__ajax_load.gif');
        api_cache_requests[ str_key_cache ] = false;
        var rs =$.ajax({
                    type: "POST",
                    url: 'index.php?script_case_init=<?php echo $this->Ini->sc_page; ?>',
                    async: true,
                    data:'nmgp_opcao=ajax_check_file&AjaxCheckImg=' + encodeURI(img_name) +'&rsargs='+ field + '&p=' + p + '&p_cache=' + p_cache,
                    success: function (rs) {
                        if(rs.indexOf('</span>') != -1){
                            rs = rs.substr(rs.indexOf('</span>') + 7);
                        }
                        if(rs.indexOf('/') != -1 && rs.indexOf('/') != 0){
                            rs = rs.substr(rs.indexOf('/'));
                        }
                        rs = sc_trim(rs);

                        // if(rs == 0 && hasVar && hasRun === undefined){
                        //     delete window.api_cache_requests[ str_key_cache ];
                        //     ajax_check_file(img_name, field  ,t, p, p_cache, iSeqRow, 1, img_before);
                        //     return;
                        // }
                        window.api_cache_requests[ str_key_cache ] = rs;
                        do_ajax_check_file(rs, field  ,t, iSeqRow)
                        if(rs == 0){
                            delete window.api_cache_requests[ str_key_cache ];

                           // $(t).attr('src',img_before);
                            do_ajax_check_file(img_before+'_@@NM@@_' + img_before, field  ,t, iSeqRow)

                        }


                    }
        });
    },100);
}

function do_ajax_check_file(rs, field  ,t, iSeqRow){
    if (rs != 0) {
        rs_split = rs.split('_@@NM@@_');
        rs_orig = rs_split[0];
        rs2 = rs_split[1];
        try{
            if(!$(t).is('img')){

                if($('#id_read_on_'+field+iSeqRow).length > 0 ){
                                    var usa_read_only = false;

                switch(field){

                }
                     if(usa_read_only && $('a',$('#id_read_on_'+field+iSeqRow)).length == 0){
                         $(t).html("<a href=\"javascript:nm_mostra_doc('0', '"+rs2+"', 'cad_lodge_category')\">"+$('#id_read_on_'+field+iSeqRow).text()+"</a>");
                     }
                }
                if($('#id_ajax_doc_'+field+iSeqRow+' a').length > 0){
                    var target = $('#id_ajax_doc_'+field+iSeqRow+' a').attr('href').split(',');
                    target[1] = "'"+rs2+"'";
                    $('#id_ajax_doc_'+field+iSeqRow+' a').attr('href', target.join(','));
                }else{
                    var target = $(t).attr('href').split(',');
                     target[1] = "'"+rs2+"'";
                     $(t).attr('href', target.join(','));
                }
            }else{
                $(t).attr('src', rs2);
                $(t).css('display', '');
                if($('#id_ajax_doc_'+field+iSeqRow+' a').length > 0){
                    var target = $('#id_ajax_doc_'+field+iSeqRow+' a').attr('href').split(',');
                    target[1] = "'"+rs2+"'";
                    $(t).attr('href', target.join(','));
                }else{
                     var t_link = $(t).parent('a');
                     var target = $(t_link).attr('href').split(',');
                     target[0] = "javascript:nm_mostra_img('"+rs_orig+"'";
                     $(t_link).attr('href', target.join(','));
                }

            }
            eval("window.var_ajax_img_"+field+iSeqRow+" = '"+rs_orig+"';");

        } catch(err){
                        eval("window.var_ajax_img_"+field+iSeqRow+" = '"+rs_orig+"';");

        }
    }
   /* hasFalseCacheRequest = false;
    $.each(api_cache_requests, function(i,v){
        if(v == false){
            hasFalseCacheRequest = true;
        }
    });
    if(hasFalseCacheRequest == false){
        scAjaxProcOff();
    }*/
}

$(document).ready(function(){
});

function scJQPasswordToggleAdd(seqRow) {
  $(".sc-ui-pwd-toggle-icon" + seqRow).on("click", function() {
    var fieldName = $(this).attr("id").substr(17), fieldObj = $("#id_sc_field_" + fieldName), fieldFA = $("#id_pwd_fa_" + fieldName);
    if ("text" == fieldObj.attr("type")) {
      fieldObj.attr("type", "password");
      fieldFA.attr("class", "fa fa-eye sc-ui-pwd-eye");
    } else {
      fieldObj.attr("type", "text");
      fieldFA.attr("class", "fa fa-eye-slash sc-ui-pwd-eye");
    }
  });
} // scJQPasswordToggleAdd

function scJQSelect2Add(seqRow, specificField) {
} // scJQSelect2Add


function scJQElementsAdd(iLine) {
  scJQEventsAdd(iLine);
  scEventControl_init(iLine);
  scJQColorPickerAdd(iLine);
  scJQUploadAdd(iLine);
  scJQPasswordToggleAdd(iLine);
  scJQSelect2Add(iLine);
} // scJQElementsAdd

function scGetFileExtension(fileName)
{
    fileNameParts = fileName.split(".");

    if (1 === fileNameParts.length || (2 === fileNameParts.length && "" == fileNameParts[0])) {
        return "";
    }

    return fileNameParts.pop().toLowerCase();
}

function scFormatExtensionSizeErrorMsg(errorMsg)
{
    var msgInfo = errorMsg.split("||"), returnMsg = "";

    if ("err_size" == msgInfo[0]) {
        returnMsg = "<?php echo $this->Ini->Nm_lang['lang_errm_file_size'] ?>. <?php echo $this->Ini->Nm_lang['lang_errm_file_size_extension'] ?>".replace("{SC_EXTENSION}", msgInfo[1]).replace("{SC_LIMIT}", msgInfo[2]);
    } else if ("err_extension" == msgInfo[0]) {
        returnMsg = "<?php echo $this->Ini->Nm_lang['lang_errm_file_invl'] ?>";
    }

    return returnMsg;
}

