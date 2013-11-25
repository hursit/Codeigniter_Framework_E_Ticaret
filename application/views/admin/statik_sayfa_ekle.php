
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<title>Web Wiz Rich Text Editor</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">

<link href="css_styles/RTE_toolbar_style.css" rel="stylesheet" type="text/css" />
<script language="JavaScript" src="RTE_javascript_common.asp" type="text/javascript"></script>
<script language="JavaScript" src="RTE_javascript.asp?textArea=myTextarea" type="text/javascript"></script>
<script language="JavaScript">WebWizRTEtoolbar('myForm');</script>


<meta name="description" content="Web Wiz Rich Text Editor, free WYSIWYG Eeditor for replacement of HTML text areas.">
<link href="css_styles/default_style.css" rel="stylesheet" type="text/css" />
</head>

<body OnLoad="initialiseWebWizRTE();">
 
 <div align="center"><img src="images/web_wiz_rich_text_editor.gif" alt="Web Wiz Rich Text Editor" width="416" height="58" /><br />
  <br />
  <noscript>
  You need to have Javascript enabled in your browser in order for this demo to work!!
  <br />
  <br />
  </noscript>     
  <table width="750"  border="0" cellpadding="1" cellspacing="1" bgcolor="#CCCCCC">
  <tr>
   <td bgcolor="#F4F7FB" align="left">     

     
    
      <form method="post" action="display_form_submission.asp" name="myForm" id="myForm">
      
      
      


        <textarea cols="90" rows="33" name="myTextarea" id="myTextarea">
     
        </textarea>
            
        <br />
	<div align="center">
         <input type="submit" name="Submit" id="Submit" value="Submit Form" />
         <input type="reset" name="reset" id="reset"  value="Reset Form" />
	</div>
        
        
      </form>
      
   </td>
  </tr>
</table>
<br /><span class="text" style="font-size:10px"><a href="http://www.richtexteditor.org" target="_blank" style="font-size:10px">Web Wiz Rich Text Editor</a> version 4.10<br />Copyright &copy;2001-2012 Web Wiz</span>
</div>
</body>
</html>

