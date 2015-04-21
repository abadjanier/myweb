<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
* Name:  Auth Lang - English
*
* Author: Ben Edmunds
* 		  ben.edmunds@gmail.com
*         @benedmunds
*
* Author: Daniel Davis
*         @ourmaninjapan
* 
* Author: Josue Ibarra
*         @josuetijuana
*
* Location: http://github.com/benedmunds/ion_auth/
*
* Created:  03.09.2013
*
* Description:  Spanish language file for Ion Auth example views
*SELECT *  FROM `language` WHERE `set` LIKE 'auth_login'ç
*
*/
/*

UPDATE `insomer_tyrion`.`language` SET `set` = REPLACE(`set`, 'auth_edit_passwd', 'auth') WHERE `set` LIKE '%auth_edit_passwd%' COLLATE utf8mb4_bin
UPDATE `insomer_tyrion`.`language` SET `set` = REPLACE(`set`, 'auth_forgot_passwd', 'auth') WHERE `set` LIKE '%auth_forgot_passwd%' COLLATE utf8mb4_bin
UPDATE `insomer_tyrion`.`language` SET `set` = REPLACE(`set`, 'auth_reset_passwd', 'auth') WHERE `set` LIKE '%auth_reset_passwd%' COLLATE utf8mb4_bin
UPDATE `insomer_tyrion`.`language` SET `set` = REPLACE(`set`, 'auth_act_email', 'auth') WHERE `set` LIKE '%auth_act_email%' COLLATE utf8mb4_bin
UPDATE `insomer_tyrion`.`language` SET `set` = REPLACE(`set`, 'auth_passwd_email', 'auth') WHERE `set` LIKE '%auth_passwd_email%' COLLATE utf8mb4_bin

INSERT INTO `language`( `clave`, `set`, `text`) VALUES ('error_csrf' ,'auth_err' , 'Este formulario no pasó nuestras pruebas de seguridad.');

INSERT INTO `language`( `clave`, `set`, `text`) VALUES ('login_heading' ,'auth_login' , 'Ingresar');
INSERT INTO `language`( `clave`, `set`, `text`) VALUES ('login_subheading' ,'auth_login' , 'Por favor, introduce tu email/usuario y contraseña.');
INSERT INTO `language`( `clave`, `set`, `text`) VALUES ('login_identity_label' ,'auth_login' , 'Email/Usuario:');
INSERT INTO `language`( `clave`, `set`, `text`) VALUES ('login_password_label' ,'auth_login' , 'Contraseña:');
INSERT INTO `language`( `clave`, `set`, `text`) VALUES ('login_remember_label' ,'auth_login' , 'Recuérdame:');
INSERT INTO `language`( `clave`, `set`, `text`) VALUES ('login_submit_btn' ,'auth_login' , 'Ingresar');
INSERT INTO `language`( `clave`, `set`, `text`) VALUES ('login_forgot_password' ,'auth_login' , '¿Has olvidado tu contraseña?');

INSERT INTO `language`( `clave`, `set`, `text`) VALUES ('index_heading' ,'auth_index' , '¿Has olvidado tu contraseña?');
INSERT INTO `language`( `clave`, `set`, `text`) VALUES ('index_subheading' ,'auth_index' , 'Debajo está la lista de usuarios.');
INSERT INTO `language`( `clave`, `set`, `text`) VALUES ('index_fname_th' ,'auth_index' , 'Nombre');
INSERT INTO `language`( `clave`, `set`, `text`) VALUES ('index_lname_th' ,'auth_index' , 'Apellidos');
INSERT INTO `language`( `clave`, `set`, `text`) VALUES ('index_email_th' ,'auth_index' , 'Email');
INSERT INTO `language`( `clave`, `set`, `text`) VALUES ('index_groups_th' ,'auth_index' , 'Grupos');
INSERT INTO `language`( `clave`, `set`, `text`) VALUES ('index_status_th' ,'auth_index' , 'Estado');
INSERT INTO `language`( `clave`, `set`, `text`) VALUES ('index_action_th' ,'auth_index' , 'Acción');
INSERT INTO `language`( `clave`, `set`, `text`) VALUES ('index_active_link' ,'auth_index' , 'Activo');
INSERT INTO `language`( `clave`, `set`, `text`) VALUES ('index_inactive_link' ,'auth_index' , 'Inactivo');
INSERT INTO `language`( `clave`, `set`, `text`) VALUES ('index_create_user_link' ,'auth_index' , 'Crear nuevo usuario');
INSERT INTO `language`( `clave`, `set`, `text`) VALUES ('index_create_group_link' ,'auth_index' , 'Crear nuevo grupo');

INSERT INTO `language`( `clave`, `set`, `text`) VALUES ('deactivate_heading' ,'auth_deac_user' , 'Desactivar usuario');
INSERT INTO `language`( `clave`, `set`, `text`) VALUES ('deactivate_subheading' ,'auth_deac_user' , '¿Estás seguro que quieres desactivar el usuario \'%s\'');
INSERT INTO `language`( `clave`, `set`, `text`) VALUES ('deactivate_confirm_y_label' ,'auth_deac_user' , 'Sí:');
INSERT INTO `language`( `clave`, `set`, `text`) VALUES ('deactivate_confirm_n_label' ,'auth_deac_user' , 'No:');
INSERT INTO `language`( `clave`, `set`, `text`) VALUES ('deactivate_submit_btn' ,'auth_deac_user' , 'Enviar');
INSERT INTO `language`( `clave`, `set`, `text`) VALUES ('deactivate_validation_confirm_label' ,'auth_deac_user' , 'confirmación');
INSERT INTO `language`( `clave`, `set`, `text`) VALUES ('deactivate_validation_user_id_label' ,'auth_deac_user' , 'ID de usuario');

INSERT INTO `language`( `clave`, `set`, `text`) VALUES ('create_user_heading' ,'auth_create_user' , 'Crear Usuario');
INSERT INTO `language`( `clave`, `set`, `text`) VALUES ('create_user_subheading' ,'auth_create_user' , 'Por favor, introduzce la información del usuario.');
INSERT INTO `language`( `clave`, `set`, `text`) VALUES ('create_user_fname_label' ,'auth_create_user' , 'Nombre:');
INSERT INTO `language`( `clave`, `set`, `text`) VALUES ('create_user_lname_label' ,'auth_create_user' , 'Apellidos:');
INSERT INTO `language`( `clave`, `set`, `text`) VALUES ('create_user_company_label' ,'auth_create_user' , 'Compañía:');
INSERT INTO `language`( `clave`, `set`, `text`) VALUES ('create_user_email_label' ,'auth_create_user' , 'Email:');
INSERT INTO `language`( `clave`, `set`, `text`) VALUES ('create_user_phone_label' ,'auth_create_user' , 'Teléfono:');
INSERT INTO `language`( `clave`, `set`, `text`) VALUES ('create_user_password_label' ,'auth_create_user' , 'Contraseña:');
INSERT INTO `language`( `clave`, `set`, `text`) VALUES ('create_user_password_confirm_label' ,'auth_create_user' , 'Confirmar contraseña:');
INSERT INTO `language`( `clave`, `set`, `text`) VALUES ('create_user_submit_btn' ,'auth_create_user' , 'Crear Usuario:');
INSERT INTO `language`( `clave`, `set`, `text`) VALUES ('create_user_validation_fname_label' ,'auth_create_user' , 'Nombre');
INSERT INTO `language`( `clave`, `set`, `text`) VALUES ('create_user_validation_email_label' ,'auth_create_user' , 'Apellidos');
INSERT INTO `language`( `clave`, `set`, `text`) VALUES ('create_user_validation_phone1_label' ,'auth_create_user' , 'Primera parte del número de teléfono');
INSERT INTO `language`( `clave`, `set`, `text`) VALUES ('create_user_validation_phone2_label' ,'auth_create_user' , 'Segunda parte del número de teléfono');
INSERT INTO `language`( `clave`, `set`, `text`) VALUES ('create_user_validation_phone3_label' ,'auth_create_user' , 'Tercera parte del número de teléfono');
INSERT INTO `language`( `clave`, `set`, `text`) VALUES ('create_user_validation_company_label' ,'auth_create_user' , 'Nombre de la compañía');
INSERT INTO `language`( `clave`, `set`, `text`) VALUES ('create_user_validation_password_label' ,'auth_create_user' , 'Contraseña');
INSERT INTO `language`( `clave`, `set`, `text`) VALUES ('create_user_validation_password_confirm_label' ,'auth_create_user' , 'Confirmación de Contraseña');

INSERT INTO `language`( `clave`, `set`, `text`) VALUES ('edit_user_heading' ,'auth_edit_user' , 'Editar Usuario');
INSERT INTO `language`( `clave`, `set`, `text`) VALUES ('edit_user_subheading' ,'auth_edit_user' , 'Por favor introduzca la nueva información del usuario.');
INSERT INTO `language`( `clave`, `set`, `text`) VALUES ('edit_user_fname_label' ,'auth_edit_user' , 'Nombre:');
INSERT INTO `language`( `clave`, `set`, `text`) VALUES ('edit_user_lname_label' ,'auth_edit_user' , 'Apellidos:');
INSERT INTO `language`( `clave`, `set`, `text`) VALUES ('edit_user_company_label' ,'auth_edit_user' , 'Compañía:');
INSERT INTO `language`( `clave`, `set`, `text`) VALUES ('edit_user_email_label' ,'auth_edit_user' , 'Email:');
INSERT INTO `language`( `clave`, `set`, `text`) VALUES ('edit_user_phone_label' ,'auth_edit_user' , 'Teléfono:');
INSERT INTO `language`( `clave`, `set`, `text`) VALUES ('edit_user_password_label' ,'auth_edit_user' , 'Contraseña: (si quieres cambiarla)');
INSERT INTO `language`( `clave`, `set`, `text`) VALUES ('edit_user_password_confirm_label' ,'auth_edit_user' , 'Confirmar contraseña: (si quieres cambiarla');
INSERT INTO `language`( `clave`, `set`, `text`) VALUES ('edit_user_groups_heading' ,'auth_edit_user' , 'Miembro de grupos');
INSERT INTO `language`( `clave`, `set`, `text`) VALUES ('edit_user_submit_btn' ,'auth_edit_user' , 'Miembro de grupo');
INSERT INTO `language`( `clave`, `set`, `text`) VALUES ('edit_user_validation_fname_label' ,'auth_edit_user' , 'Nombre');
INSERT INTO `language`( `clave`, `set`, `text`) VALUES ('edit_user_validation_lname_label' ,'auth_edit_user' , 'Apellidos');
INSERT INTO `language`( `clave`, `set`, `text`) VALUES ('edit_user_validation_email_label' ,'auth_edit_user' , 'Correo electrónico');
INSERT INTO `language`( `clave`, `set`, `text`) VALUES ('edit_user_validation_phone1_label' ,'auth_edit_user' , 'Primera parte del número de teléfono');
INSERT INTO `language`( `clave`, `set`, `text`) VALUES ('edit_user_validation_phone2_label' ,'auth_edit_user' , 'segunda parte del número de teléfono');
INSERT INTO `language`( `clave`, `set`, `text`) VALUES ('edit_user_validation_phone3_label' ,'auth_edit_user' , 'Tercera parte del número de teléfono');
INSERT INTO `language`( `clave`, `set`, `text`) VALUES ('edit_user_validation_company_label' ,'auth_edit_user' , 'Compañía');
INSERT INTO `language`( `clave`, `set`, `text`) VALUES ('edit_user_validation_groups_label' ,'auth_edit_user' , 'Grupos');
INSERT INTO `language`( `clave`, `set`, `text`) VALUES ('edit_user_validation_password_label' ,'auth_edit_user' , 'Contraseña');
INSERT INTO `language`( `clave`, `set`, `text`) VALUES ('edit_user_validation_password_confirm_label' ,'auth_edit_user' , 'Confirmación de contraseña');

INSERT INTO `language`( `clave`, `set`, `text`) VALUES ('create_group_title' ,'auth_create_goup' , 'Crear Grupo');
INSERT INTO `language`( `clave`, `set`, `text`) VALUES ('create_group_heading' ,'auth_create_goup' , 'Crear Grupo');
INSERT INTO `language`( `clave`, `set`, `text`) VALUES ('create_group_subheading' ,'auth_create_goup' , 'Por favor introduce la información del grupo.');
INSERT INTO `language`( `clave`, `set`, `text`) VALUES ('create_group_name_label' ,'auth_create_goup' , 'Nombre de Grupo:');
INSERT INTO `language`( `clave`, `set`, `text`) VALUES ('create_group_desc_label' ,'auth_create_goup' , 'Descripción:');
INSERT INTO `language`( `clave`, `set`, `text`) VALUES ('create_group_submit_btn' ,'auth_create_goup' , 'Crear Grupo');
INSERT INTO `language`( `clave`, `set`, `text`) VALUES ('create_group_validation_name_label' ,'auth_create_goup' , 'Nombre de Grupo');
INSERT INTO `language`( `clave`, `set`, `text`) VALUES ('create_group_validation_desc_label' ,'auth_create_goup' , 'Descripcion');

INSERT INTO `language`( `clave`, `set`, `text`) VALUES ('edit_group_title' ,'auth_edit_group' , 'Editar Grupo');
INSERT INTO `language`( `clave`, `set`, `text`) VALUES ('edit_group_saved' ,'auth_edit_group' , 'Grupo Guardado');
INSERT INTO `language`( `clave`, `set`, `text`) VALUES ('edit_group_heading' ,'auth_edit_group' , 'Editar Grupo');
INSERT INTO `language`( `clave`, `set`, `text`) VALUES ('edit_group_subheading' ,'auth_edit_group' , 'Por favor, registra la informacion del grupo.');
INSERT INTO `language`( `clave`, `set`, `text`) VALUES ('edit_group_name_label' ,'auth_edit_group' , 'Nombre de Grupo:');
INSERT INTO `language`( `clave`, `set`, `text`) VALUES ('edit_group_desc_label' ,'auth_edit_group' , 'Descripción:');
INSERT INTO `language`( `clave`, `set`, `text`) VALUES ('edit_group_submit_btn' ,'auth_edit_group' , 'Guardar Grupo');
INSERT INTO `language`( `clave`, `set`, `text`) VALUES ('edit_group_validation_name_label' ,'auth_edit_group' , 'Nombre de Grupo');
INSERT INTO `language`( `clave`, `set`, `text`) VALUES ('edit_group_validation_desc_label' ,'auth_edit_group' , 'Descripción');

INSERT INTO `language`( `clave`, `set`, `text`) VALUES ('change_password_heading' ,'auth_edit_passwd' , 'Cambiar Contraseña');
INSERT INTO `language`( `clave`, `set`, `text`) VALUES ('change_password_old_password_label' ,'auth_edit_passwd' , 'Antigua Contraseña');
INSERT INTO `language`( `clave`, `set`, `text`) VALUES ('change_password_new_password_label' ,'auth_edit_passwd' , 'Nueva Contraseña (de al menos %s caracteres de longitud):');
INSERT INTO `language`( `clave`, `set`, `text`) VALUES ('change_password_new_password_confirm_label' ,'auth_edit_passwd' , 'Confirmar Nueva Contraseña:');
INSERT INTO `language`( `clave`, `set`, `text`) VALUES ('change_password_submit_btn' ,'auth_edit_passwd' , 'Cambiar');
INSERT INTO `language`( `clave`, `set`, `text`) VALUES ('change_password_validation_old_password_label' ,'auth_edit_passwd' , 'Antigua Contraseña');
INSERT INTO `language`( `clave`, `set`, `text`) VALUES ('change_password_validation_new_password_label' ,'auth_edit_passwd' , 'Nueva Contraseña');
INSERT INTO `language`( `clave`, `set`, `text`) VALUES ('change_password_validation_new_password_confirm_label' ,'auth_edit_passwd' , 'Confirmar Nueva Contraseña');

INSERT INTO `language`( `clave`, `set`, `text`) VALUES ('forgot_password_heading' ,'auth_forgot_passwd' , 'He olvidado mi Contraseña');
INSERT INTO `language`( `clave`, `set`, `text`) VALUES ('forgot_password_subheading' ,'auth_forgot_passwd' , 'Por favor, introduce tu %s para que podamos enviarte un email para restablecer tu contraseña.');
INSERT INTO `language`( `clave`, `set`, `text`) VALUES ('forgot_password_email_label' ,'auth_forgot_passwd' , '%s');
INSERT INTO `language`( `clave`, `set`, `text`) VALUES ('forgot_password_submit_btn' ,'auth_forgot_passwd' , 'Enviar');
INSERT INTO `language`( `clave`, `set`, `text`) VALUES ('forgot_password_validation_email_label' ,'auth_forgot_passwd' , 'Correo Electrónico');
INSERT INTO `language`( `clave`, `set`, `text`) VALUES ('forgot_password_username_identity_label' ,'auth_forgot_passwd' , 'Usuario');
INSERT INTO `language`( `clave`, `set`, `text`) VALUES ('forgot_password_email_identity_label' ,'auth_forgot_passwd' , 'Email');
INSERT INTO `language`( `clave`, `set`, `text`) VALUES ('forgot_password_email_not_found' ,'auth_forgot_passwd' , 'El correo electrónico no existe.');

INSERT INTO `language`( `clave`, `set`, `text`) VALUES ('reset_password_heading' ,'auth_reset_passwd' , 'Cambiar Contraseña');
INSERT INTO `language`( `clave`, `set`, `text`) VALUES ('reset_password_new_password_label' ,'auth_reset_passwd' , 'Nueva Contraseña (de al menos %s caracteres de longitud):');
INSERT INTO `language`( `clave`, `set`, `text`) VALUES ('reset_password_new_password_confirm_label' ,'auth_reset_passwd' , 'Confirmar Nueva Contraseña:');
INSERT INTO `language`( `clave`, `set`, `text`) VALUES ('reset_password_submit_btn' ,'auth_reset_passwd' , 'Confirmar Nueva Contraseña:');
INSERT INTO `language`( `clave`, `set`, `text`) VALUES ('reset_password_validation_new_password_label' ,'auth_reset_passwd' , 'Nueva Contraseña');
INSERT INTO `language`( `clave`, `set`, `text`) VALUES ('reset_password_validation_new_password_confirm_label' ,'auth_reset_passwd' , 'Confirmar Nueva Contraseña');

INSERT INTO `language`( `clave`, `set`, `text`) VALUES ('email_activate_heading' ,'auth_act_email' , 'Activar cuenta por %s');
INSERT INTO `language`( `clave`, `set`, `text`) VALUES ('email_activate_subheading' ,'auth_act_email' , 'Por favor ingresa en este link para %s.');
INSERT INTO `language`( `clave`, `set`, `text`) VALUES ('email_activate_link' ,'auth_act_email' , 'activar tu cuenta');

INSERT INTO `language`( `clave`, `set`, `text`) VALUES ('email_forgot_password_heading' ,'auth_forgot_passwd_email' , 'Reestablecer contraseña para %s');
INSERT INTO `language`( `clave`, `set`, `text`) VALUES ('email_forgot_password_subheading' ,'auth_forgot_passwd_email' , 'Por favor ingresa en este link para %s.');
INSERT INTO `language`( `clave`, `set`, `text`) VALUES ('email_forgot_password_link' ,'auth_forgot_passwd_email' , 'Restablecer Tu Contraseña');

INSERT INTO `language`( `clave`, `set`, `text`) VALUES ('email_new_password_heading' ,'auth_passwd_email' , 'Nueva contraseña para %s');
INSERT INTO `language`( `clave`, `set`, `text`) VALUES ('email_new_password_subheading' ,'auth_passwd_email' , 'Tu contraseña ha sido restablecida a: %s');

// Errors
$lang['error_csrf'] = 'Este formulario no pasó nuestras pruebas de seguridad.';

// Login
$lang['login_heading']         = 'Ingresar';
$lang['login_subheading']      = 'Por favor, introduce tu email/usuario y contraseña.';
$lang['login_identity_label']  = 'Email/Usuario:';
$lang['login_password_label']  = 'Contraseña:';
$lang['login_remember_label']  = 'Recuérdame:';
$lang['login_submit_btn']      = 'Ingresar';
$lang['login_forgot_password'] = '¿Has olvidado tu contraseña?';

// Index
$lang['index_heading']           = 'Usuarios';
$lang['index_subheading']        = 'Debajo está la lista de usuarios.';
$lang['index_fname_th']          = 'Nombre';
$lang['index_lname_th']          = 'Apellidos';
$lang['index_email_th']          = 'Email';
$lang['index_groups_th']         = 'Grupos';
$lang['index_status_th']         = 'Estado';
$lang['index_action_th']         = 'Acción';
$lang['index_active_link']       = 'Activo';
$lang['index_inactive_link']     = 'Inactivo';
$lang['index_create_user_link']  = 'Crear nuevo usuario';
$lang['index_create_group_link'] = 'Crear nuevo grupo';

// Deactivate User
$lang['deactivate_heading']                  = 'Desactivar usuario';
$lang['deactivate_subheading']               = '¿Estás seguro que quieres desactivar el usuario \'%s\'';
$lang['deactivate_confirm_y_label']          = 'Sí:';
$lang['deactivate_confirm_n_label']          = 'No:';
$lang['deactivate_submit_btn']               = 'Enviar';
$lang['deactivate_validation_confirm_label'] = 'confirmación';
$lang['deactivate_validation_user_id_label'] = 'ID de usuario';

// Create User
$lang['create_user_heading']                           = 'Crear Usuario';
$lang['create_user_subheading']                        = 'Por favor, introduzce la información del usuario.';
$lang['create_user_fname_label']                       = 'Nombre:';
$lang['create_user_lname_label']                       = 'Apellidos:';
$lang['create_user_company_label']                     = 'Compañía:';
$lang['create_user_email_label']                       = 'Email:';
$lang['create_user_phone_label']                       = 'Teléfono:';
$lang['create_user_password_label']                    = 'Contraseña:';
$lang['create_user_password_confirm_label']            = 'Confirmar contraseña:';
$lang['create_user_submit_btn']                        = 'Crear Usuario';
$lang['create_user_validation_fname_label']            = 'Nombre';
$lang['create_user_validation_lname_label']            = 'Apellidos';
$lang['create_user_validation_email_label']            = 'Correo electrónico';
$lang['create_user_validation_phone1_label']           = 'Primera parte del número de teléfono';
$lang['create_user_validation_phone2_label']           = 'Segunda parte del número de teléfono';
$lang['create_user_validation_phone3_label']           = 'Tercera parte del número de teléfono';
$lang['create_user_validation_company_label']          = 'Nombre de la compañía';
$lang['create_user_validation_password_label']         = 'Contraseña';
$lang['create_user_validation_password_confirm_label'] = 'Confirmación de contraseña';



// Edit User
$lang['edit_user_heading']                           = 'Editar Usuario';
$lang['edit_user_subheading']                        = 'Por favor introduzca la nueva información del usuario.';
$lang['edit_user_fname_label']                       = 'Nombre:';
$lang['edit_user_lname_label']                       = 'Apellidos:';
$lang['edit_user_company_label']                     = 'Compañía:';
$lang['edit_user_email_label']                       = 'Email:';
$lang['edit_user_phone_label']                       = 'Teléfono:';
$lang['edit_user_password_label']                    = 'Contraseña: (si quieres cambiarla)';
$lang['edit_user_password_confirm_label']            = 'Confirmar contraseña: (si quieres cambiarla)';
$lang['edit_user_groups_heading']                    = 'Miembro de grupos';
$lang['edit_user_submit_btn']                        = 'Guardar Usuario';
$lang['edit_user_validation_fname_label']            = 'Nombre';
$lang['edit_user_validation_lname_label']            = 'Apellidos';
$lang['edit_user_validation_email_label']            = 'Correo electrónico';
$lang['edit_user_validation_phone1_label']           = 'Primera parte del número de teléfono';
$lang['edit_user_validation_phone2_label']           = 'Segunda parte del número de teléfono';
$lang['edit_user_validation_phone3_label']           = 'Tercera parte del número de teléfono';
$lang['edit_user_validation_company_label']          = 'Compañía';
$lang['edit_user_validation_groups_label']           = 'Grupos';
$lang['edit_user_validation_password_label']         = 'Contraseña';
$lang['edit_user_validation_password_confirm_label'] = 'Confirmación de contraseña';

// Create Group
$lang['create_group_title']                  = 'Crear Grupo';
$lang['create_group_heading']                = 'Crear Grupo';
$lang['create_group_subheading']             = 'Por favor introduce la información del grupo.';
$lang['create_group_name_label']             = 'Nombre de Grupo:';
$lang['create_group_desc_label']             = 'Descripción:';
$lang['create_group_submit_btn']             = 'Crear Grupo';
$lang['create_group_validation_name_label']  = 'Nombre de Grupo';
$lang['create_group_validation_desc_label']  = 'Descripcion';

// Edit Group
$lang['edit_group_title']                  = 'Editar Grupo';
$lang['edit_group_saved']                  = 'Grupo Guardado';
$lang['edit_group_heading']                = 'Editar Grupo';
$lang['edit_group_subheading']             = 'Por favor, registra la informacion del grupo.';
$lang['edit_group_name_label']             = 'Nombre de Grupo:';
$lang['edit_group_desc_label']             = 'Descripción:';
$lang['edit_group_submit_btn']             = 'Guardar Grupo';
$lang['edit_group_validation_name_label']  = 'Nombre de Grupo';
$lang['edit_group_validation_desc_label']  = 'Descripción';

// Change Password
$lang['change_password_heading']                               = 'Cambiar Contraseña';
$lang['change_password_old_password_label']                    = 'Antigua Contraseña:';
$lang['change_password_new_password_label']                    = 'Nueva Contraseña (de al menos %s caracteres de longitud):';
$lang['change_password_new_password_confirm_label']            = 'Confirmar Nueva Contraseña:';
$lang['change_password_submit_btn']                            = 'Cambiar';
$lang['change_password_validation_old_password_label']         = 'Antigua Contraseña';
$lang['change_password_validation_new_password_label']         = 'Nueva Contraseña';
$lang['change_password_validation_new_password_confirm_label'] = 'Confirmar Nueva Contraseña';

// Forgot Password
$lang['forgot_password_heading']                 = 'He olvidado mi Contraseña';
$lang['forgot_password_subheading']              = 'Por favor, introduce tu %s para que podamos enviarte un email para restablecer tu contraseña.';
$lang['forgot_password_email_label']             = '%s:';
$lang['forgot_password_submit_btn']              = 'Enviar';
$lang['forgot_password_validation_email_label']  = 'Correo Electrónico';
$lang['forgot_password_username_identity_label'] = 'Usuario';
$lang['forgot_password_email_identity_label']    = 'Email';
$lang['forgot_password_email_not_found']         = 'El correo electrónico no existe.';

// Reset Password
$lang['reset_password_heading']                               = 'Cambiar Contraseña';
$lang['reset_password_new_password_label']                    = 'Nueva Contraseña (de al menos %s caracteres de longitud):';
$lang['reset_password_new_password_confirm_label']            = 'Confirmar Nueva Contraseña:';
$lang['reset_password_submit_btn']                            = 'Guardar';
$lang['reset_password_validation_new_password_label']         = 'Nueva Contraseña';
$lang['reset_password_validation_new_password_confirm_label'] = 'Confirmar Nueva Contraseña';

// Activation Email
$lang['email_activate_heading']    = 'Activar cuenta por %s';
$lang['email_activate_subheading'] = 'Por favor ingresa en este link para %s.';
$lang['email_activate_link']       = 'activar tu cuenta';

// Forgot Password Email
$lang['email_forgot_password_heading']    = 'Reestablecer contraseña para %s';
$lang['email_forgot_password_subheading'] = 'Por favor ingresa en este link para %s.';
$lang['email_forgot_password_link']       = 'Restablecer Tu Contraseña';

// New Password Email
$lang['email_new_password_heading']    = 'Nueva contraseña para %s';
$lang['email_new_password_subheading'] = 'Tu contraseña ha sido restablecida a: %s';
*/