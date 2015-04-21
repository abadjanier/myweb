<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
* Name:  Ion Auth Lang - Spanish
* 
* Author: Wilfrido Garc�a Espinosa
* 		  contacto@wilfridogarcia.com
*         @wilfridogarcia
* 
* Location: http://github.com/benedmunds/ion_auth/
*          
* Created:  05.04.2010 
* 
* Description:  Spanish language file for Ion Auth messages and errors
* 
*/

// Account Creation
$lang['account_creation_successful'] 	  	 = 'Cuenta creada con éxito';
$lang['account_creation_unsuccessful'] 	 	 = 'No se ha podido crear la cuenta';
$lang['account_creation_duplicate_email'] 	 = 'Email en uso o inválido';
$lang['account_creation_duplicate_username'] = 'Nombre de usuario en uso o inválido';
/*
INSERT INTO `language`( `clave`, `set`, `text`) VALUES ('account_creation_missing_default_group' ,'auth_group_err' , 'Default group is not set');
INSERT INTO `language`( `clave`, `set`, `text`) VALUES ('account_creation_invalid_default_group' ,'auth_group_err' , 'Invalid default group name set');

INSERT INTO `language`( `clave`, `set`, `text`) VALUES ('password_change_successful' ,'auth_passwd' , 'Contraseña renovada con éxito');
INSERT INTO `language`( `clave`, `set`, `text`) VALUES ('password_change_unsuccessful' ,'auth_passwd' , 'No se ha podido cambiar la contraseña');
INSERT INTO `language`( `clave`, `set`, `text`) VALUES ('forgot_password_successful' ,'auth_passwd' , 'Nueva contraseña enviada por email');
INSERT INTO `language`( `clave`, `set`, `text`) VALUES ('forgot_password_unsuccessful' ,'auth_passwd' , 'No se ha podido crear una nueva contraseña');

INSERT INTO `language`( `clave`, `set`, `text`) VALUES ('activate_successful' ,'auth_activation' , 'Cuenta activada con éxito');
INSERT INTO `language`( `clave`, `set`, `text`) VALUES ('activate_unsuccessful' ,'auth_activation' , 'No se ha podido activar la cuenta');
INSERT INTO `language`( `clave`, `set`, `text`) VALUES ('deactivate_successful' ,'auth_activation' , 'Cuenta desactivada con éxito');
INSERT INTO `language`( `clave`, `set`, `text`) VALUES ('deactivate_unsuccessful' ,'auth_activation' , 'No se ha podido desactivar la cuenta');
INSERT INTO `language`( `clave`, `set`, `text`) VALUES ('activation_email_successful' ,'auth_activation' , 'Email de activación enviado');
INSERT INTO `language`( `clave`, `set`, `text`) VALUES ('activation_email_unsuccessful' ,'auth_activation' , 'No se ha podido enviar el email de activación');

INSERT INTO `language`( `clave`, `set`, `text`) VALUES ('login_successful' ,'auth_activation' , 'Sesión iniciada con éxito');
INSERT INTO `language`( `clave`, `set`, `text`) VALUES ('login_unsuccessful' ,'auth_activation' , 'No se ha podido iniciar sesión');
INSERT INTO `language`( `clave`, `set`, `text`) VALUES ('login_unsuccessful_not_active' ,'auth_activation' , 'Account is inactive');
INSERT INTO `language`( `clave`, `set`, `text`) VALUES ('login_timeout' ,'auth_activation' , 'Temporarily Locked Out. Try again later.');
INSERT INTO `language`( `clave`, `set`, `text`) VALUES ('logout_successful' ,'auth_activation' , 'Sesión finalizada con éxito');

INSERT INTO `language`( `clave`, `set`, `text`) VALUES ('update_successful' ,'auth_update' , 'Información de la cuenta actualizada con éxito');
INSERT INTO `language`( `clave`, `set`, `text`) VALUES ('update_unsuccessful' ,'auth_update' , 'No se ha podido actualizar la información de la cuenta');
INSERT INTO `language`( `clave`, `set`, `text`) VALUES ('delete_successful' ,'auth_update' , 'Usuario eliminado');
INSERT INTO `language`( `clave`, `set`, `text`) VALUES ('delete_unsuccessful' ,'auth_update' , 'No se ha podido Eliminar el usuario');

INSERT INTO `language`( `clave`, `set`, `text`) VALUES ('group_creation_successful' ,'auth_groups' , 'El grupo se ha creado con exito');
INSERT INTO `language`( `clave`, `set`, `text`) VALUES ('group_already_exists' ,'auth_groups' , 'El grupo ya existe');
INSERT INTO `language`( `clave`, `set`, `text`) VALUES ('group_update_successful' ,'auth_groups' , 'El grupo actualizado con exito');
INSERT INTO `language`( `clave`, `set`, `text`) VALUES ('group_delete_successful' ,'auth_groups' , 'El grupo elminado');
INSERT INTO `language`( `clave`, `set`, `text`) VALUES ('group_delete_unsuccessful' ,'auth_groups' , 'No se puede eliminar el grupo elminado');
INSERT INTO `language`( `clave`, `set`, `text`) VALUES ('group_delete_notallowed' ,'auth_groups' , 'No tienes permisos para eliminar el grupo elminado');
INSERT INTO `language`( `clave`, `set`, `text`) VALUES ('group_name_required' ,'auth_groups' , 'El nombre del grupo es obligatorio');
INSERT INTO `language`( `clave`, `set`, `text`) VALUES ('group_name_required' ,'auth_groups' , 'El nombre del grupo es obligatorio');

INSERT INTO `language`( `clave`, `set`, `text`) VALUES ('email_activation_subject' ,'auth_email_activation' , 'Activación de la cuenta');
INSERT INTO `language`( `clave`, `set`, `text`) VALUES ('email_activate_heading' ,'auth_email_activation' , 'Activación de la cuenta para %s');
INSERT INTO `language`( `clave`, `set`, `text`) VALUES ('email_activate_subheading' ,'auth_email_activation' , 'Haz click en el sigiente link para %s');
INSERT INTO `language`( `clave`, `set`, `text`) VALUES ('email_activate_link' ,'auth_email_activation' , 'Activar tu cuenta');

INSERT INTO `language`( `clave`, `set`, `text`) VALUES ('email_forgotten_password_subject' ,'auth_email_forgot' , 'Verificación de contraseña olvidada');
INSERT INTO `language`( `clave`, `set`, `text`) VALUES ('email_forgot_password_heading' ,'auth_email_forgot' , 'Restablece la contraseña para %s');
INSERT INTO `language`( `clave`, `set`, `text`) VALUES ('email_forgot_password_subheading' ,'auth_email_forgot' , 'Sigue el link para para %s');
INSERT INTO `language`( `clave`, `set`, `text`) VALUES ('email_forgot_password_link' ,'auth_email_forgot' , 'Restablecer la contraseña');

INSERT INTO `language`( `clave`, `set`, `text`) VALUES ('email_new_password_subject' ,'auth_email_new' , 'Nueva Contraseña');
INSERT INTO `language`( `clave`, `set`, `text`) VALUES ('email_new_password_heading' ,'auth_email_new' , 'Nueva Contraseña para %s');
INSERT INTO `language`( `clave`, `set`, `text`) VALUES ('email_new_password_subheading' ,'auth_email_new' , 'tu nueva Contraseña es: %s');
*/

// TODO Please Translate
$lang['account_creation_missing_default_group'] = 'Default group is not set';
$lang['account_creation_invalid_default_group'] = 'Invalid default group name set';


// Password
$lang['password_change_successful'] 	 	 = 'Contraseña renovada con éxito';
$lang['password_change_unsuccessful'] 	  	 = 'No se ha podido cambiar la contraseña';
$lang['forgot_password_successful'] 	 	 = 'Nueva contraseña enviada por email';
$lang['forgot_password_unsuccessful'] 	 	 = 'No se ha podido crear una nueva contraseña';

// Activation
$lang['activate_successful'] 		  	     = 'Cuenta activada con éxito';
$lang['activate_unsuccessful'] 		 	     = 'No se ha podido activar la cuenta';
$lang['deactivate_successful'] 		  	     = 'Cuenta desactivada con éxito';
$lang['deactivate_unsuccessful'] 	  	     = 'No se ha podido desactivar la cuenta';
$lang['activation_email_successful'] 	  	 = 'Email de activación enviado';
$lang['activation_email_unsuccessful']   	 = 'No se ha podido enviar el email de activación';

// Login / Logout
$lang['login_successful'] 		      	     = 'Sesión iniciada con éxito';
$lang['login_unsuccessful'] 		  	     = 'No se ha podido iniciar sesión';
$lang['login_unsuccessful_not_active'] 		 = 'Account is inactive';
$lang['login_timeout']                       = 'Temporarily Locked Out. Try again later.';
$lang['logout_successful'] 		 	         = 'Sesión finalizada con éxito';

// Account Changes
$lang['update_successful'] 		 	         = 'Información de la cuenta actualizada con éxito';
$lang['update_unsuccessful'] 		 	     = 'No se ha podido actualizar la información de la cuenta';
$lang['delete_successful'] 		 	         = 'Usuario eliminado';
$lang['delete_unsuccessful'] 		 	     = 'No se ha podido Eliminar el usuario';

// Groups
$lang['group_creation_successful']  = 'Group created Successfully';
$lang['group_already_exists']       = 'Group name already taken';
$lang['group_update_successful']    = 'Group details updated';
$lang['group_delete_successful']    = 'Group deleted';
$lang['group_delete_unsuccessful'] 	= 'Unable to delete group';
$lang['group_delete_notallowed']    = 'Can\'t delete the administrators\' group';
$lang['group_name_required'] 		= 'Group name is a required field';
// Activation Email
$lang['email_activation_subject']            = 'Activación de la cuenta';
$lang['email_activate_heading']    = 'Activate account for %s';
$lang['email_activate_subheading'] = 'Please click this link to %s.';
$lang['email_activate_link']       = 'Activate Your Account';
// Forgot Password Email
$lang['email_forgotten_password_subject']    = 'Verificación de contraseña olvidada';
$lang['email_forgot_password_heading']    = 'Reset Password for %s';
$lang['email_forgot_password_subheading'] = 'Please click this link to %s.';
$lang['email_forgot_password_link']       = 'Reset Your Password';
// New Password Email
$lang['email_new_password_subject']          = 'Nueva Contraseña';
$lang['email_new_password_heading']    = 'New Password for %s';
$lang['email_new_password_subheading'] = 'Your password has been reset to: %s';
