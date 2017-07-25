<?PHP
/*
Simfatic Forms Main Form processor script

This script does all the server side processing. 
(Displaying the form, processing form submissions,
displaying errors, making CAPTCHA image, and so on.) 

All pages (including the form page) are displayed using 
templates in the 'templ' sub folder. 

The overall structure is that of a list of modules. Depending on the 
arguments (POST/GET) passed to the script, the modules process in sequence. 

Please note that just appending  a header and footer to this script won't work.
To embed the form, use the 'Copy & Paste' code in the 'Take the Code' page. 
To extend the functionality, see 'Extension Modules' in the help.

*/

@ini_set("display_errors", 1);//the error handler is added later in FormProc
error_reporting(E_ALL & ~((defined('E_STRICT')?E_STRICT:0)|E_NOTICE));

require_once(dirname(__FILE__)."/includes/VolunteerApplication-lib.php");
$formproc_obj =  new SFM_FormProcessor('VolunteerApplication');
$formproc_obj->initTimeZone('default');
$formproc_obj->setFormID('444736ae-d625-4e8d-9357-c7b9bbc40e49');
$formproc_obj->setFormKey('b39950f8-fe37-463f-b08c-6e9b50ae1d45');
$formproc_obj->setLocale('en-US','M/d/yyyy');
$formproc_obj->setEmailFormatHTML(true);
$formproc_obj->EnableLogging(false);
$formproc_obj->SetDebugMode(true);
$formproc_obj->setIsInstalled(true);
$formproc_obj->SetPrintPreviewPage(sfm_readfile(dirname(__FILE__)."/templ/VolunteerApplication_print_preview_file.txt"));
$formproc_obj->SetSingleBoxErrorDisplay(true);
$formproc_obj->setFormPage(0,sfm_readfile(dirname(__FILE__)."/templ/VolunteerApplication_form_page_0.txt"));
$formproc_obj->setFormPage(1,sfm_readfile(dirname(__FILE__)."/templ/VolunteerApplication_form_page_1.txt"));
$formproc_obj->setFormPage(2,sfm_readfile(dirname(__FILE__)."/templ/VolunteerApplication_form_page_2.txt"));
$formproc_obj->AddElementInfo('totalHours','decimal','',0);
$formproc_obj->AddElementInfo('first_name','text','',0);
$formproc_obj->AddElementInfo('last_name','text','',0);
$formproc_obj->AddElementInfo('Address','text','',0);
$formproc_obj->AddElementInfo('apt_num','text','',0);
$formproc_obj->AddElementInfo('City','text','',0);
$formproc_obj->AddElementInfo('State','listbox','',0);
$formproc_obj->AddElementInfo('ZipCode','text','',0);
$formproc_obj->AddElementInfo('homeNumber','text','',0);
$formproc_obj->AddElementInfo('mobileNumber','text','',0);
$formproc_obj->AddElementInfo('workNumber','text','',0);
$formproc_obj->AddElementInfo('Email','text','',0);
$formproc_obj->AddElementInfo('DateofBirth','datepicker','',0);
$formproc_obj->AddElementInfo('areaofInterest','chk_group','',0);
$formproc_obj->AddElementInfo('otherInterest','text','',0);
$formproc_obj->AddElementInfo('startDate','datepicker','',0);
$formproc_obj->AddElementInfo('Monday','text','',0);
$formproc_obj->AddElementInfo('Tuesday','text','',0);
$formproc_obj->AddElementInfo('Wednesday','text','',0);
$formproc_obj->AddElementInfo('Thursday','text','',0);
$formproc_obj->AddElementInfo('Friday','text','',0);
$formproc_obj->AddElementInfo('satSun','text','',0);
$formproc_obj->AddElementInfo('ecName','text','',0);
$formproc_obj->AddElementInfo('ec_relation','text','',0);
$formproc_obj->AddElementInfo('ecAddress','text','',0);
$formproc_obj->AddElementInfo('ec_apt','text','',0);
$formproc_obj->AddElementInfo('ec_city','text','',0);
$formproc_obj->AddElementInfo('ec_state','listbox','',0);
$formproc_obj->AddElementInfo('ec_zip','text','',0);
$formproc_obj->AddElementInfo('ec_phone','text','',0);
$formproc_obj->AddElementInfo('ec_mobile','text','',0);
$formproc_obj->AddElementInfo('ec_work','text','',0);
$formproc_obj->AddElementInfo('initial1','text','',1);
$formproc_obj->AddElementInfo('initial2','text','',1);
$formproc_obj->AddElementInfo('initial3','text','',1);
$formproc_obj->AddElementInfo('initial4','text','',1);
$formproc_obj->AddElementInfo('SSN','decimal','',2);
$formproc_obj->AddElementInfo('fullNameAuth','text','',2);
$formproc_obj->AddElementInfo('drivers_state','listbox','',2);
$formproc_obj->AddElementInfo('dob','datepicker','',2);
$formproc_obj->AddElementInfo('drivers','text','',2);
$formproc_obj->AddDefaultValue('totalHours','0');
$formproc_obj->AddDefaultValue('first_name','First Name');
$formproc_obj->AddDefaultValue('last_name','Last Name');
$formproc_obj->AddDefaultValue('Address','Home Address');
$formproc_obj->AddDefaultValue('apt_num','Apt. #');
$formproc_obj->AddDefaultValue('City','City');
$formproc_obj->AddDefaultValue('State','000');
$formproc_obj->AddDefaultValue('ZipCode','Zip');
$formproc_obj->AddDefaultValue('homeNumber','Home Number');
$formproc_obj->AddDefaultValue('mobileNumber','Mobile Number');
$formproc_obj->AddDefaultValue('workNumber','Work Number');
$formproc_obj->AddDefaultValue('Email','Email Address');
$formproc_obj->AddDefaultValue('Monday','Monday');
$formproc_obj->AddDefaultValue('Tuesday','Tuesday');
$formproc_obj->AddDefaultValue('Wednesday','Wednesday');
$formproc_obj->AddDefaultValue('Thursday','Thursday');
$formproc_obj->AddDefaultValue('Friday','Friday');
$formproc_obj->AddDefaultValue('satSun','Saturday / Sunday');
$formproc_obj->AddDefaultValue('ecName','Full Name');
$formproc_obj->AddDefaultValue('ec_relation','Relationship');
$formproc_obj->AddDefaultValue('ecAddress','Address');
$formproc_obj->AddDefaultValue('ec_apt','Apt. #');
$formproc_obj->AddDefaultValue('ec_city','City');
$formproc_obj->AddDefaultValue('ec_state','000');
$formproc_obj->AddDefaultValue('ec_zip','Zip');
$formproc_obj->AddDefaultValue('ec_phone','Home Number');
$formproc_obj->AddDefaultValue('ec_mobile','Mobile Number');
$formproc_obj->AddDefaultValue('ec_work','Work Number');
$formproc_obj->AddDefaultValue('initial1','Jane Doe');
$formproc_obj->AddDefaultValue('initial2','Jane Doe');
$formproc_obj->AddDefaultValue('initial3','Jane Doe');
$formproc_obj->AddDefaultValue('initial4','Jane Doe');
$formproc_obj->AddDefaultValue('fullNameAuth','Full Name');
$formproc_obj->AddDefaultValue('drivers_state','000');
$formproc_obj->AddDefaultValue('drivers','Driver\'s License Number');
$formproc_obj->SetSavedMessageTemplate(sfm_readfile(dirname(__FILE__)."/templ/VolunteerApplication_saved_msg.txt"));
$formproc_obj->setFormDBLogin('localhost','anthonymatsas','909C69CF811EDAD06C5319136264CF8C','cs440team2');
$formproc_obj->SetHiddenInputTrapVarName('tb7ca3a15945318bd16a6');
$page_renderer =  new FM_FormPageDisplayModule();
$formproc_obj->addModule($page_renderer);

$admin_page =  new FM_AdminPageHandler();
$admin_page->SetPageTemplate(sfm_readfile(dirname(__FILE__)."/templ/VolunteerApplication_admin_page_templ.txt"));
$admin_page->SetLogin('root','EEA4364D18C846FF');
$admin_page->SetLoginTemplate(sfm_readfile(dirname(__FILE__)."/templ/VolunteerApplication_admin_page_login.txt"));
$formproc_obj->addModule($admin_page);

$validator =  new FM_FormValidator();
$validator->addValidation("totalHours","numeric","The input for  should be a valid numeric value");
$validator->addValidation("totalHours","greaterthan=0.00","The value of totalHours should be greater than 0.00");
$validator->addValidation("totalHours","required","Please fill in totalHours");
$validator->addValidation("first_name","required","Please fill in first_name");
$validator->addValidation("first_name","alnum","The input for first_name should be a valid alpha-numeric value");
$validator->addValidation("last_name","required","Please fill in last_name");
$validator->addValidation("last_name","alnum","The input for last_name should be a valid alpha-numeric value");
$validator->addValidation("Address","required","Please fill in Address");
$validator->addValidation("City","required","Please fill in City");
$validator->addValidation("State","dontselect=000","Please select an option for State");
$validator->addValidation("ZipCode","regexp=/^\\d{5}(-\\d{4})?$/","Please enter a valid input for Zip");
$validator->addValidation("ZipCode","required","Please fill in ZipCode");
$validator->addValidation("homeNumber","required","Please fill in homeNumber");
$validator->addValidation("homeNumber","numeric","The input for homeNumber should be a valid numeric value");
$validator->addValidation("mobileNumber","numeric","The input for mobileNumber should be a valid numeric value");
$validator->addValidation("mobileNumber","required","Please fill in mobileNumber");
$validator->addValidation("workNumber","numeric","The input for workNumber should be a valid numeric value");
$validator->addValidation("Email","email","The input for Email should be a valid email value");
$validator->addValidation("Email","required","Please fill in Email");
$validator->addValidation("DateofBirth","required","Please fill in DateofBirth");
$validator->addValidation("startDate","required","Please fill in startDate");
$validator->addValidation("Monday","required","Please fill in Monday");
$validator->addValidation("Tuesday","required","Please fill in Tuesday");
$validator->addValidation("Wednesday","required","Please fill in Wednesday");
$validator->addValidation("Thursday","required","Please fill in Thursday");
$validator->addValidation("Friday","required","Please fill in Friday");
$validator->addValidation("satSun","required","Please fill in satSun");
$validator->addValidation("ecName","required","Please fill in ecName");
$validator->addValidation("ec_relation","required","Please fill in ec_relation");
$validator->addValidation("ecAddress","required","Please fill in ecAddress");
$validator->addValidation("ec_city","required","Please fill in ec_city");
$validator->addValidation("ec_state","dontselect=000","Please select an option for ec_state");
$validator->addValidation("ec_zip","regexp=/^\\d{5}(-\\d{4})?$/","Please enter a valid input for Zip");
$validator->addValidation("initial1","required","Please fill in initial1");
$validator->addValidation("initial1","alpha","The input for initial1 should be a valid alphabetic value");
$validator->addValidation("initial2","required","Please fill in initial2");
$validator->addValidation("initial2","alpha","The input for initial2 should be a valid alphabetic value");
$validator->addValidation("initial3","required","Please fill in initial3");
$validator->addValidation("initial3","alpha","The input for initial3 should be a valid alphabetic value");
$validator->addValidation("initial4","required","Please fill in initial4");
$validator->addValidation("initial4","alpha","The input for initial4 should be a valid alphabetic value");
$validator->addValidation("SSN","numeric","The input for  should be a valid numeric value");
$validator->addValidation("SSN","required","Please fill in SSN");
$validator->addValidation("fullNameAuth","required","Please fill in fullNameAuth");
$validator->addValidation("drivers_state","dontselect=000","Please select an option for drivers_state");
$validator->addValidation("dob","required","Please fill in dob");
$validator->addValidation("drivers","required","Please fill in drivers");
$formproc_obj->addModule($validator);

$s_db_handler =  new FM_SimpleDB('VolunteerApplicationNEW');
$s_db_handler->AddField('_sfm_form_submision_time_','DATETIME','FormSubmissionTime');
$s_db_handler->AddField('_sfm_visitor_ip_','VARCHAR(45)','VisitorsIP');
$s_db_handler->AddField('_sfm_unique_id_','VARCHAR(35)','UniqueID');
$s_db_handler->AddField('totalHours','DOUBLE');
$s_db_handler->AddField('first_name','VARCHAR(100)');
$s_db_handler->AddField('last_name','VARCHAR(100)');
$s_db_handler->AddField('Address','VARCHAR(100)');
$s_db_handler->AddField('apt_num','VARCHAR(100)');
$s_db_handler->AddField('City','VARCHAR(100)');
$s_db_handler->AddField('State','VARCHAR(100)');
$s_db_handler->AddField('ZipCode','VARCHAR(100)');
$s_db_handler->AddField('homeNumber','VARCHAR(100)');
$s_db_handler->AddField('mobileNumber','VARCHAR(100)');
$s_db_handler->AddField('workNumber','VARCHAR(100)');
$s_db_handler->AddField('Email','VARCHAR(100)');
$s_db_handler->AddField('DateofBirth','DATE');
$s_db_handler->AddField('areaofInterest','VARCHAR(100)');
$s_db_handler->AddField('otherInterest','VARCHAR(100)');
$s_db_handler->AddField('startDate','DATE');
$s_db_handler->AddField('Monday','VARCHAR(100)');
$s_db_handler->AddField('Tuesday','VARCHAR(100)');
$s_db_handler->AddField('Wednesday','VARCHAR(100)');
$s_db_handler->AddField('Thursday','VARCHAR(100)');
$s_db_handler->AddField('Friday','VARCHAR(100)');
$s_db_handler->AddField('satSun','VARCHAR(100)');
$s_db_handler->AddField('ecName','VARCHAR(100)');
$s_db_handler->AddField('ec_relation','VARCHAR(100)');
$s_db_handler->AddField('ecAddress','VARCHAR(100)');
$s_db_handler->AddField('ec_apt','VARCHAR(100)');
$s_db_handler->AddField('ec_city','VARCHAR(100)');
$s_db_handler->AddField('ec_state','VARCHAR(100)');
$s_db_handler->AddField('ec_zip','VARCHAR(100)');
$s_db_handler->AddField('ec_phone','VARCHAR(100)');
$s_db_handler->AddField('ec_mobile','VARCHAR(100)');
$s_db_handler->AddField('ec_work','VARCHAR(100)');
$s_db_handler->AddField('initial1','VARCHAR(100)');
$s_db_handler->AddField('initial2','VARCHAR(100)');
$s_db_handler->AddField('initial3','VARCHAR(100)');
$s_db_handler->AddField('initial4','VARCHAR(100)');
$s_db_handler->AddField('SSN','VARCHAR(100)');
$s_db_handler->AddField('fullNameAuth','VARCHAR(100)');
$s_db_handler->AddField('drivers_state','VARCHAR(100)');
$s_db_handler->AddField('dob','DATE');
$s_db_handler->AddField('drivers','VARCHAR(100)');
$formproc_obj->addModule($s_db_handler);

$tupage =  new FM_ThankYouPage(sfm_readfile(dirname(__FILE__)."/templ/VolunteerApplication_thank_u.txt"));
$formproc_obj->addModule($tupage);

$uniqueid_s =  new FM_ShortUniqueID('VolunteerApplicationNEW');
$formproc_obj->AddExtensionModule($uniqueid_s);
$page_renderer->SetFormValidator($validator);
$formproc_obj->ProcessForm();

?>