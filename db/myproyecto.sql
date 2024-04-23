-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: database:3306
-- Tiempo de generación: 23-04-2024 a las 14:56:33
-- Versión del servidor: 8.3.0
-- Versión de PHP: 8.2.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `myproyecto`
--
CREATE DATABASE IF NOT EXISTS `myproyecto` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci;
USE `myproyecto`;

DELIMITER $$
--
-- Procedimientos
--
CREATE DEFINER=`root`@`%` PROCEDURE `s_abm_adma_menu_h` (IN `_abm` VARCHAR(50), INOUT `_menuhorizontalid` INT, IN `_nombremenuds` VARCHAR(250), IN `_nombregeneral` VARCHAR(300), IN `_imagenurl` VARCHAR(300), IN `_tipomenu` INT, IN `_activo` BIT, IN `_menuprincipal` BIT, IN `_frontend` BIT, IN `_backend` BIT, IN `_baja` BIT, IN `_usuarioid` INT, IN `_fecharegistro` TIMESTAMP)   BEGIN SET _fecharegistro = NOW();START TRANSACTION;if _abm = 'a' then
 insert into adma_menu_h
(nombremenuds,nombregeneral,imagenurl,tipomenu,activo,menuprincipal,frontend,backend,baja,usuarioid,fecharegistro)
select
_nombremenuds,_nombregeneral,_imagenurl,_tipomenu,_activo,_menuprincipal,_frontend,_backend,_baja,_usuarioid,_fecharegistro;
SET _menuhorizontalid= LAST_INSERT_ID();
elseif _abm = 'm' then
update adma_menu_h set 
nombremenuds=   _nombremenuds,nombregeneral=   _nombregeneral,imagenurl=   _imagenurl,tipomenu=   _tipomenu,activo=   _activo,menuprincipal=   _menuprincipal,frontend=   _frontend,backend=   _backend,baja=   _baja,usuarioid=   _usuarioid,fecharegistro=   _fecharegistro
where 
menuhorizontalid =  _menuhorizontalid;
 END IF;COMMIT;
END$$

CREATE DEFINER=`root`@`%` PROCEDURE `s_abm_adma_menu_i0` (IN `_abm` VARCHAR(50), INOUT `_itemmenuid` INT, IN `_menuid` INT, IN `_formularioid` INT, IN `_text` VARCHAR(250), IN `_navigateurl` VARCHAR(250), IN `_imagen` BIT, IN `_imageurl` VARCHAR(250), IN `_permitegif` BIT, IN `_imagengif` VARCHAR(250), IN `_tipofuncion` INT, IN `_funcionasociadagif` VARCHAR(550), IN `_grupo` VARCHAR(250), IN `_orden` INT, IN `_baja` BIT, IN `_usuarioid` INT, IN `_fecharegistro` TIMESTAMP)   BEGIN SET _fecharegistro = NOW();START TRANSACTION;if _abm = 'a' then
 insert into adma_menu_i0
(menuid,formularioid,text,navigateurl,imagen,imageurl,permitegif,imagengif,tipofuncion,funcionasociadagif,grupo,orden,baja,usuarioid,fecharegistro)
select
_menuid,_formularioid,_text,_navigateurl,_imagen,_imageurl,_permitegif,_imagengif,_tipofuncion,_funcionasociadagif,_grupo,_orden,_baja,_usuarioid,_fecharegistro;
SET _itemmenuid= LAST_INSERT_ID();
elseif _abm = 'm' then
update adma_menu_i0 set 
menuid=   _menuid,formularioid=   _formularioid,text=   _text,navigateurl=   _navigateurl,imagen=   _imagen,imageurl=   _imageurl,permitegif=   _permitegif,imagengif=   _imagengif,tipofuncion=   _tipofuncion,funcionasociadagif=   _funcionasociadagif,grupo=   _grupo,orden=   _orden,baja=   _baja,usuarioid=   _usuarioid,fecharegistro=   _fecharegistro
where 
itemmenuid =  _itemmenuid;
 END IF;COMMIT;
END$$

CREATE DEFINER=`root`@`%` PROCEDURE `s_abm_adma_persona` (IN `_abm` VARCHAR(50), INOUT `_personaid` INT, IN `_nombre` VARCHAR(100), IN `_apellido` VARCHAR(100), IN `_baja` BIT, IN `_usuarioid` INT, IN `_fecharegistro` TIMESTAMP)   BEGIN SET _fecharegistro = NOW();START TRANSACTION;if _abm = 'a' then
 insert into adma_persona
(nombre,apellido,baja,usuarioid,fecharegistro)
select
_nombre,_apellido,_baja,_usuarioid,_fecharegistro;
SET _personaid= LAST_INSERT_ID();
elseif _abm = 'm' then
update adma_persona set 
nombre=   _nombre,apellido=   _apellido,baja=   _baja,usuarioid=   _usuarioid,fecharegistro=   _fecharegistro
where 
personaid =  _personaid;
 END IF;COMMIT;
END$$

CREATE DEFINER=`root`@`%` PROCEDURE `s_abm_adma_persona_i0` (IN `_abm` VARCHAR(50), INOUT `_id` INT, IN `_personaid` INT, IN `_fecha_nacimiento` DATE, IN `_tipo_identificacionid` TINYINT, IN `_identificacionid` VARCHAR(100), IN `_sexoid` TINYINT, IN `_cuil` VARCHAR(13), IN `_estado_civil` TINYINT, IN `_baja` BIT, IN `_usuarioid` INT, IN `_fecharegistro` TIMESTAMP)   BEGIN
			 SET _fecharegistro = NOW();
			START TRANSACTION;
			if _abm = 'a' then
 insert into adma_persona_i0
(personaid,fecha_nacimiento,tipo_identificacionid,identificacionid,sexoid,cuil,estado_civil,baja,usuarioid,fecharegistro)
select
_personaid,_fecha_nacimiento,_tipo_identificacionid,_identificacionid,_sexoid,_cuil,_estado_civil,_baja,_usuarioid,_fecharegistro;
SET _id= LAST_INSERT_ID();
elseif _abm = 'm' then
update adma_persona_i0 set 
personaid=   _personaid,fecha_nacimiento=   _fecha_nacimiento,tipo_identificacionid=   _tipo_identificacionid,identificacionid=   _identificacionid,sexoid=   _sexoid,cuil=   _cuil,estado_civil=   _estado_civil,baja=   _baja,usuarioid=   _usuarioid,fecharegistro=   _fecharegistro
where 
id =  _id;
 END IF;COMMIT;
END$$

CREATE DEFINER=`root`@`%` PROCEDURE `s_abm_adma_sector` (IN `_abm` VARCHAR(50), INOUT `_sectorid` INT, IN `_sectords` VARCHAR(500), IN `_tiposectorid` INT, IN `_activo` BIT, IN `_baja` BIT, IN `_usuarioid` INT, IN `_fecharegistro` TIMESTAMP)   BEGIN
			 SET _fecharegistro = NOW();
			START TRANSACTION;
			if _abm = 'a' then
 insert into adma_sector
(sectords,tiposectorid,activo,baja,usuarioid,fecharegistro)
select
_sectords,_tiposectorid,_activo,_baja,_usuarioid,_fecharegistro;
SET _sectorid= LAST_INSERT_ID();
elseif _abm = 'm' then
update adma_sector set 
sectords=   _sectords,tiposectorid=   _tiposectorid,activo=   _activo,baja=   _baja,usuarioid=   _usuarioid,fecharegistro=   _fecharegistro
where 
sectorid =  _sectorid;
 END IF;COMMIT;
END$$

CREATE DEFINER=`root`@`%` PROCEDURE `s_abm_prueba` (IN `_abm` VARCHAR(50), INOUT `_id` INT, IN `_nombre` VARCHAR(500), IN `_baja` BIT, IN `_usuarioid` INT, IN `_fecharegistro` TIMESTAMP)   BEGIN SET _fecharegistro = NOW();START TRANSACTION;if _abm = 'a' then
 insert into prueba
(nombre,baja,usuarioid,fecharegistro)
select
_nombre,_baja,_usuarioid,_fecharegistro;
SET _id= LAST_INSERT_ID();
elseif _abm = 'm' then
update prueba set 
nombre=   _nombre,baja=   _baja,usuarioid=   _usuarioid,fecharegistro=   _fecharegistro
where 
id =  _id;
 END IF;COMMIT;
END$$

CREATE DEFINER=`root`@`%` PROCEDURE `s_abm_sema_objeto_h` (IN `_abm` VARCHAR(50), INOUT `_objetoid` INT, IN `_tipoobjetoid` INT, IN `_nombreobjetods` VARCHAR(200), IN `_formularioid` INT, IN `_menuid` INT, IN `_baja` BIT, IN `_usuarioid` INT, IN `_fecharegistro` TIMESTAMP)   BEGIN SET _fecharegistro = NOW();START TRANSACTION;if _abm = 'a' then
 insert into sema_objeto_h
(tipoobjetoid,nombreobjetods,formularioid,menuid,baja,usuarioid,fecharegistro)
select
_tipoobjetoid,_nombreobjetods,_formularioid,_menuid,_baja,_usuarioid,_fecharegistro;
SET _objetoid= LAST_INSERT_ID();
elseif _abm = 'm' then
update sema_objeto_h set 
tipoobjetoid=   _tipoobjetoid,nombreobjetods=   _nombreobjetods,formularioid=   _formularioid,menuid=   _menuid,baja=   _baja,usuarioid=   _usuarioid,fecharegistro=   _fecharegistro
where 
objetoid =  _objetoid;
 END IF;COMMIT;
END$$

CREATE DEFINER=`root`@`%` PROCEDURE `s_abm_sema_rol_h` (IN `_abm` VARCHAR(50), INOUT `_rolid` INT, IN `_rolds` VARCHAR(200), IN `_activo` BIT, IN `_baja` BIT, IN `_usuarioid` INT, IN `_fecharegistro` TIMESTAMP)   BEGIN SET _fecharegistro = NOW();START TRANSACTION;if _abm = 'a' then
 insert into sema_rol_h
(rolds,activo,baja,usuarioid,fecharegistro)
select
_rolds,_activo,_baja,_usuarioid,_fecharegistro;
SET _rolid= LAST_INSERT_ID();
elseif _abm = 'm' then
update sema_rol_h set 
rolds=   _rolds,activo=   _activo,baja=   _baja,usuarioid=   _usuarioid,fecharegistro=   _fecharegistro
where 
rolid =  _rolid;
 END IF;COMMIT;
END$$

CREATE DEFINER=`root`@`%` PROCEDURE `s_abm_sema_usuario_i0` (IN `_abm` VARCHAR(50), INOUT `_asociacionid` INT, IN `_personaid` INT, IN `_rolid` INT, IN `_baja` BIT, IN `_usuarioid` INT, IN `_fecharegistro` TIMESTAMP)   BEGIN SET _fecharegistro = NOW();START TRANSACTION;if _abm = 'a' then
 insert into sema_usuario_i0
(personaid,rolid,baja,usuarioid,fecharegistro)
select
_personaid,_rolid,_baja,_usuarioid,_fecharegistro;
SET _asociacionid= LAST_INSERT_ID();
elseif _abm = 'm' then
update sema_usuario_i0 set 
personaid=   _personaid,rolid=   _rolid,baja=   _baja,usuarioid=   _usuarioid,fecharegistro=   _fecharegistro
where 
asociacionid =  _asociacionid;
 END IF;COMMIT;
END$$

CREATE DEFINER=`root`@`%` PROCEDURE `s_abm_sema_usuario_i1` (IN `_abm` VARCHAR(50), INOUT `_perteneceid` INT, IN `_personaid` INT, IN `_sectorid` INT, IN `_activo` BIT, IN `_baja` BIT, IN `_usuarioid` INT, IN `_fecharegistro` TIMESTAMP)   BEGIN
			 SET _fecharegistro = NOW();
			START TRANSACTION;
			if _abm = 'a' then
 insert into sema_usuario_i1
(personaid,sectorid,activo,baja,usuarioid,fecharegistro)
select
_personaid,_sectorid,_activo,_baja,_usuarioid,_fecharegistro;
SET _perteneceid= LAST_INSERT_ID();
elseif _abm = 'm' then
update sema_usuario_i1 set 
personaid=   _personaid,sectorid=   _sectorid,activo=   _activo,baja=   _baja,usuarioid=   _usuarioid,fecharegistro=   _fecharegistro
where 
perteneceid =  _perteneceid;
 END IF;COMMIT;
END$$

CREATE DEFINER=`root`@`%` PROCEDURE `s_abm_serg_permisos_h` (IN `_abm` VARCHAR(50), INOUT `_permisoid` INT, IN `_objetoid` INT, IN `_rolid` INT, IN `_accionid` INT, IN `_activo` BIT, IN `_baja` BIT, IN `_usuarioid` INT, IN `_fecharegistro` TIMESTAMP)   BEGIN SET _fecharegistro = NOW();START TRANSACTION;if _abm = 'a' then
 insert into serg_permisos_h
(objetoid,rolid,accionid,activo,baja,usuarioid,fecharegistro)
select
_objetoid,_rolid,_accionid,_activo,_baja,_usuarioid,_fecharegistro;
SET _permisoid= LAST_INSERT_ID();
elseif _abm = 'm' then
update serg_permisos_h set 
objetoid=   _objetoid,rolid=   _rolid,accionid=   _accionid,activo=   _activo,baja=   _baja,usuarioid=   _usuarioid,fecharegistro=   _fecharegistro
where 
permisoid =  _permisoid;
 END IF;COMMIT;
END$$

CREATE DEFINER=`root`@`%` PROCEDURE `s_abm_syma_grilla_h` (IN `_abm` VARCHAR(50), INOUT `_id` INT, IN `_grillaid` INT, IN `_tipoconsultaid` INT, IN `_keyfieldname` VARCHAR(250), IN `_tabla` VARCHAR(250), IN `_querys` VARCHAR(255), IN `_showgroupedcolumns` BIT, IN `_showgrouppanel` BIT, IN `_showautofilterrow` BIT, IN `_grupo` VARCHAR(255), IN `_showsession` BIT, IN `_showsector` BIT, IN `_baja` BIT, IN `_usuarioid` INT, IN `_fecharegistro` TIMESTAMP)   BEGIN
			 SET _fecharegistro = NOW();
			START TRANSACTION;
			if _abm = 'a' then
 insert into syma_grilla_h
(grillaid,tipoconsultaid,keyfieldname,tabla,querys,showgroupedcolumns,showgrouppanel,showautofilterrow,grupo,showsession,showsector,baja,usuarioid,fecharegistro)
select
_grillaid,_tipoconsultaid,_keyfieldname,_tabla,_querys,_showgroupedcolumns,_showgrouppanel,_showautofilterrow,_grupo,_showsession,_showsector,_baja,_usuarioid,_fecharegistro;
SET _id= LAST_INSERT_ID();
elseif _abm = 'm' then
update syma_grilla_h set 
grillaid=   _grillaid,tipoconsultaid=   _tipoconsultaid,keyfieldname=   _keyfieldname,tabla=   _tabla,querys=   _querys,showgroupedcolumns=   _showgroupedcolumns,showgrouppanel=   _showgrouppanel,showautofilterrow=   _showautofilterrow,grupo=   _grupo,showsession=   _showsession,showsector=   _showsector,baja=   _baja,usuarioid=   _usuarioid,fecharegistro=   _fecharegistro
where 
id =  _id;
 END IF;COMMIT;
END$$

CREATE DEFINER=`root`@`%` PROCEDURE `s_abm_syma_grilla_i0` (IN `_abm` VARCHAR(50), INOUT `_itemid` INT, IN `_grillaid` INT, IN `_caption` VARCHAR(250), IN `_tooltip` VARCHAR(250), IN `_visible` BIT, IN `_visibleindex` INT, IN `_width` INT, IN `_groupindex` INT, IN `_fieldname` VARCHAR(250), IN `_combolistaid` INT, IN `_html` BIT, IN `_tienecondicion` BIT, IN `_condicion` VARCHAR(500), IN `_imagen` BIT, IN `_url_imagen` VARCHAR(500), IN `_campoimagen` BIT, IN `_hiperlink` BIT, IN `_priority` INT, IN `_parametro` BIT, IN `_nombresesion` VARCHAR(250), IN `_baja` BIT, IN `_usuarioid` INT, IN `_fecharegistro` TIMESTAMP)   BEGIN
			 SET _fecharegistro = NOW();
			START TRANSACTION;
			if _abm = 'a' then
 insert into syma_grilla_i0
(grillaid,caption,tooltip,visible,visibleindex,width,groupindex,fieldname,combolistaid,html,tienecondicion,condicion,imagen,url_imagen,campoimagen,hiperlink,priority,parametro,nombresesion,baja,usuarioid,fecharegistro)
select
_grillaid,_caption,_tooltip,_visible,_visibleindex,_width,_groupindex,_fieldname,_combolistaid,_html,_tienecondicion,_condicion,_imagen,_url_imagen,_campoimagen,_hiperlink,_priority,_parametro,_nombresesion,_baja,_usuarioid,_fecharegistro;
SET _itemid= LAST_INSERT_ID();
elseif _abm = 'm' then
update syma_grilla_i0 set 
grillaid=   _grillaid,caption=   _caption,tooltip=   _tooltip,visible=   _visible,visibleindex=   _visibleindex,width=   _width,groupindex=   _groupindex,fieldname=   _fieldname,combolistaid=   _combolistaid,html=   _html,tienecondicion=   _tienecondicion,condicion=   _condicion,imagen=   _imagen,url_imagen=   _url_imagen,campoimagen=   _campoimagen,hiperlink=   _hiperlink,priority=   _priority,parametro=   _parametro,nombresesion=   _nombresesion,baja=   _baja,usuarioid=   _usuarioid,fecharegistro=   _fecharegistro
where 
itemid =  _itemid;
 END IF;COMMIT;
END$$

CREATE DEFINER=`root`@`%` PROCEDURE `s_abm_syrg_formulario_h` (IN `_abm` VARCHAR(50), INOUT `_formularioid` INT, IN `_dtsetid` INT, IN `_tipoformulario` INT, IN `_nameformulario` VARCHAR(250), IN `_alto` INT, IN `_ancho` INT, IN `_unidad_alto` INT, IN `_unidad_ancho` INT, IN `_reporteid` INT, IN `_busquedaid` INT, IN `_baja` BIT, IN `_usuarioid` INT, IN `_fecharegistro` TIMESTAMP)   BEGIN SET _fecharegistro = NOW();START TRANSACTION;if _abm = 'a' then
 insert into syrg_formulario_h
(dtsetid,tipoformulario,nameformulario,alto,ancho,unidad_alto,unidad_ancho,reporteid,busquedaid,baja,usuarioid,fecharegistro)
select
_dtsetid,_tipoformulario,_nameformulario,_alto,_ancho,_unidad_alto,_unidad_ancho,_reporteid,_busquedaid,_baja,_usuarioid,_fecharegistro;
SET _formularioid= LAST_INSERT_ID();
elseif _abm = 'm' then
update syrg_formulario_h set 
dtsetid=   _dtsetid,tipoformulario=   _tipoformulario,nameformulario=   _nameformulario,alto=   _alto,ancho=   _ancho,unidad_alto=   _unidad_alto,unidad_ancho=   _unidad_ancho,reporteid=   _reporteid,busquedaid=   _busquedaid,baja=   _baja,usuarioid=   _usuarioid,fecharegistro=   _fecharegistro
where 
formularioid =  _formularioid;
 END IF;COMMIT;
END$$

CREATE DEFINER=`root`@`%` PROCEDURE `s_abm_syrg_lista_h` (IN `_abm` VARCHAR(50), INOUT `_registroid_h` INT, IN `_listaid` INT, IN `_listads` VARCHAR(50), IN `_recordsource` VARCHAR(500), IN `_listafija` BIT, IN `_tipoconsultaid` INT, IN `_tipodatovaluemember` INT, IN `_imagen` BIT, IN `_grupo` VARCHAR(50), IN `_baja` BIT, IN `_usuarioid` INT, IN `_fecharegistro` TIMESTAMP)   BEGIN SET _fecharegistro = NOW();START TRANSACTION;if _abm = 'a' then
 insert into syrg_lista_h
(listaid,listads,recordsource,listafija,tipoconsultaid,tipodatovaluemember,imagen,grupo,baja,usuarioid,fecharegistro)
select
_listaid,_listads,_recordsource,_listafija,_tipoconsultaid,_tipodatovaluemember,_imagen,_grupo,_baja,_usuarioid,_fecharegistro;
SET _registroid_h= LAST_INSERT_ID();
elseif _abm = 'm' then
update syrg_lista_h set 
listaid=   _listaid,listads=   _listads,recordsource=   _recordsource,listafija=   _listafija,tipoconsultaid=   _tipoconsultaid,tipodatovaluemember=   _tipodatovaluemember,imagen=   _imagen,grupo=   _grupo,baja=   _baja,usuarioid=   _usuarioid,fecharegistro=   _fecharegistro
where 
registroid_h =  _registroid_h;
 END IF;COMMIT;
END$$

CREATE DEFINER=`root`@`%` PROCEDURE `s_abm_syrg_lista_i0` (IN `_abm` VARCHAR(50), INOUT `_listaitemid` INT, IN `_listaid` INT, IN `_campoid` VARCHAR(100), IN `_caption` VARCHAR(50), IN `_width` INT, IN `_valuemember` BIT, IN `_displaymember` BIT, IN `_visible` BIT, IN `_baja` BIT, IN `_usuarioid` INT, IN `_fecharegistro` TIMESTAMP)   BEGIN
			 SET _fecharegistro = NOW();
			START TRANSACTION;
			if _abm = 'a' then
 insert into syrg_lista_i0
(listaid,campoid,caption,width,valuemember,displaymember,visible,baja,usuarioid,fecharegistro)
select
_listaid,_campoid,_caption,_width,_valuemember,_displaymember,_visible,_baja,_usuarioid,_fecharegistro;
SET _listaitemid= LAST_INSERT_ID();
elseif _abm = 'm' then
update syrg_lista_i0 set 
listaid=   _listaid,campoid=   _campoid,caption=   _caption,width=   _width,valuemember=   _valuemember,displaymember=   _displaymember,visible=   _visible,baja=   _baja,usuarioid=   _usuarioid,fecharegistro=   _fecharegistro
where 
listaitemid =  _listaitemid;
 END IF;COMMIT;
END$$

CREATE DEFINER=`root`@`%` PROCEDURE `s_abm_syrg_lista_i1` (IN `_abm` VARCHAR(50), INOUT `_listaitemid` INT, IN `_listaid` INT, IN `_valuemember` VARCHAR(500), IN `_displaymember` VARCHAR(50), IN `_predeterminado` BIT, IN `_imagen` VARCHAR(500), IN `_baja` BIT, IN `_usuarioid` INT, IN `_fecharegistro` TIMESTAMP)   BEGIN SET _fecharegistro = NOW();START TRANSACTION;if _abm = 'a' then
 insert into syrg_lista_i1
(listaid,valuemember,displaymember,predeterminado,imagen,baja,usuarioid,fecharegistro)
select
_listaid,_valuemember,_displaymember,_predeterminado,_imagen,_baja,_usuarioid,_fecharegistro;
SET _listaitemid= LAST_INSERT_ID();
elseif _abm = 'm' then
update syrg_lista_i1 set 
listaid=   _listaid,valuemember=   _valuemember,displaymember=   _displaymember,predeterminado=   _predeterminado,imagen=   _imagen,baja=   _baja,usuarioid=   _usuarioid,fecharegistro=   _fecharegistro
where 
listaitemid =  _listaitemid;
 END IF;COMMIT;
END$$

--
-- Funciones
--
CREATE DEFINER=`root`@`%` FUNCTION `fcgethabilitacionmenu` (`_formularioid` INT, `_tipoobjeto` INT, `_usuarioid` INT, `_accionid` INT) RETURNS TINYINT(1) READS SQL DATA BEGIN
    DECLARE _resultado BOOLEAN;
    DECLARE _personaid INT;
    DECLARE _rolid INT;
    DECLARE _objetoid INT;

    SELECT id INTO _personaid FROM tbl_member WHERE id = _usuarioid;

    SELECT objetoid INTO _objetoid FROM sema_objeto_h WHERE baja = 0
    and  tipoobjetoid= _tipoobjeto
    AND ((formularioid = 0 and menuid = _formularioid) or(formularioid = _formularioid and menuid = 0));

    SET _resultado = FALSE;
    
    SELECT 1 INTO _resultado FROM serg_permisos_h WHERE baja = 0 AND activo = 1 
    AND objetoid = _objetoid
    AND accionid = _accionid
    AND rolid IN (SELECT sema_usuario_i0.rolid FROM sema_usuario_i0 
                  INNER JOIN sema_rol_h ON sema_rol_h.rolid = sema_usuario_i0.rolid 
                  WHERE sema_usuario_i0.baja = 0 AND sema_usuario_i0.personaid = _personaid
                  AND sema_rol_h.activo = 1);

    RETURN _resultado;
END$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `adma_menu_h`
--

CREATE TABLE `adma_menu_h` (
  `menuhorizontalid` int NOT NULL,
  `nombremenuds` varchar(250) DEFAULT NULL,
  `nombregeneral` varchar(300) DEFAULT NULL,
  `imagenurl` varchar(300) DEFAULT NULL,
  `tipomenu` int DEFAULT NULL,
  `activo` bit(1) DEFAULT NULL,
  `menuprincipal` bit(1) DEFAULT NULL,
  `frontend` bit(1) DEFAULT NULL,
  `backend` bit(1) DEFAULT NULL,
  `baja` bit(1) DEFAULT NULL,
  `usuarioid` int DEFAULT NULL,
  `fecharegistro` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Volcado de datos para la tabla `adma_menu_h`
--

INSERT INTO `adma_menu_h` (`menuhorizontalid`, `nombremenuds`, `nombregeneral`, `imagenurl`, `tipomenu`, `activo`, `menuprincipal`, `frontend`, `backend`, `baja`, `usuarioid`, `fecharegistro`) VALUES
(1, 'Administración de Sitio', 'Administración de Sitio', 'bx bx-sitemap', 2, b'1', b'1', b'1', b'0', b'0', 12, '2024-04-17 12:46:16'),
(2, 'Seguridad', 'Seguridad', 'bx bx-key', 3, b'1', b'1', b'1', b'0', b'0', 12, '2024-04-17 12:51:37'),
(3, 'Maestros', 'Maestros', 'bx bxs-component', 10, b'1', b'1', b'1', b'0', b'0', 12, '2024-04-18 16:40:44');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `adma_menu_i0`
--

CREATE TABLE `adma_menu_i0` (
  `itemmenuid` int NOT NULL,
  `menuid` int DEFAULT NULL,
  `formularioid` int DEFAULT NULL,
  `text` varchar(250) DEFAULT NULL,
  `navigateurl` varchar(250) DEFAULT NULL,
  `imagen` bit(1) DEFAULT NULL,
  `imageurl` varchar(250) DEFAULT NULL,
  `permitegif` bit(1) DEFAULT NULL,
  `imagengif` varchar(250) DEFAULT NULL,
  `tipofuncion` int DEFAULT NULL,
  `funcionasociadagif` varchar(550) DEFAULT NULL,
  `grupo` varchar(250) DEFAULT NULL,
  `orden` int DEFAULT NULL,
  `baja` bit(1) DEFAULT NULL,
  `usuarioid` int DEFAULT NULL,
  `fecharegistro` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Volcado de datos para la tabla `adma_menu_i0`
--

INSERT INTO `adma_menu_i0` (`itemmenuid`, `menuid`, `formularioid`, `text`, `navigateurl`, `imagen`, `imageurl`, `permitegif`, `imagengif`, `tipofuncion`, `funcionasociadagif`, `grupo`, `orden`, `baja`, `usuarioid`, `fecharegistro`) VALUES
(1, 1, 2, 'Grillas', '/proyecto/view/configuracion/syma_grilla_h/index.php', b'1', 'bx bx-grid', b'0', ' ', 1, ' ', 'ADMINISTRADOR', 0, b'0', 12, '2024-04-17 13:02:18'),
(2, 1, 23, 'segundo menu', 'sdasdasd', b'1', 'asdasdasd', b'1', 'asdasdasd', 1, 'weqwe', 'ADMINISTRADOR', 1, b'1', 2122, '2024-04-15 00:50:30'),
(3, 1, 3, 'Listas', '/proyecto/view/configuracion/syrg_lista_h/index.php', b'1', 'bx bx-list-check', b'0', ' ', 1, '  ', 'ADMINISTRADOR', 1, b'0', 12, '2024-04-17 13:02:28'),
(4, 1, 4, 'Procedimientos', ' /proyecto/view/configuracion/index.php', b'1', 'bx bx-cog', b'0', ' ', 1, ' ', 'ADMINISTRADOR', 2, b'0', 12, '2024-04-17 13:02:45'),
(5, 1, 5, 'Menú', '/proyecto/view/configuracion/adma_menu_h/index.php', b'1', 'bx bx-food-menu', b'0', ' ', 1, ' ', 'ADMINISTRADOR', 3, b'0', 12, '2024-04-18 14:07:03'),
(6, 2, 9, 'Usuarios', ' /proyecto/view/tbl_member/index.php', b'1', 'bx bx-male-female', b'0', ' ', 1, ' ', 'ADMINISTRADOR', 0, b'0', 12, '2024-04-18 16:34:20'),
(7, 3, 10, 'Personas', '/proyecto/view/adma_persona/index.php', b'1', 'bx bx-user-check', b'0', ' ', 1, ' ', 'ADMINISTRADOR', 0, b'0', 12, '2024-04-18 16:43:35'),
(8, 2, 7, 'Objecto', '/proyecto/view/seguridad/sema_objeto_h/index.php', b'1', 'bx bxs-objects-horizontal-center', b'0', ' ', 1, '1', 'SEGURIDAD', 1, b'0', 12, '2024-04-18 01:52:42'),
(9, 1, 6, 'Formularios', '/proyecto/view/configuracion/syrg_formulario_h/index.php', b'1', 'bx bx-shape-circle', b'0', ' ', 0, ' ', 'ADMINISTRADOR', 5, b'0', 12, '2024-04-18 14:07:56'),
(10, 2, 2, 'Roles', '/proyecto/view/seguridad/sema_rol_h/index.php', b'1', 'bx bxs-user-account', b'0', ' ', 1, '1', 'SEGURIDAD', 3, b'0', 12, '2024-04-16 16:46:13'),
(11, 2, 8, 'Permisos', '/proyecto/view/seguridad/serg_permisos_h/index.php', b'1', 'bx bxs-universal-access', b'0', ' ', 1, '1', 'SEGURIDAD', 4, b'0', 12, '2024-04-18 01:52:58'),
(12, 3, 11, 'Sector', '/proyecto/view/maestros/adma_sector/index.php', b'1', 'bx bx-building-house', b'0', ' ', 1, ' ', 'REGISTRACION', 1, b'0', 12, '2024-04-21 13:14:54');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `adma_persona`
--

CREATE TABLE `adma_persona` (
  `personaid` int NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `apellido` varchar(100) NOT NULL,
  `baja` bit(1) DEFAULT NULL,
  `usuarioid` int DEFAULT NULL,
  `fecharegistro` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Volcado de datos para la tabla `adma_persona`
--

INSERT INTO `adma_persona` (`personaid`, `nombre`, `apellido`, `baja`, `usuarioid`, `fecharegistro`) VALUES
(1, 'weqwe', 'qweqwe', NULL, NULL, NULL),
(2, 'MATIAS GABRIEL', 'ALONSO', NULL, NULL, NULL),
(3, 'VALENTIN', 'ALONSO', NULL, NULL, NULL),
(4, 'MARTINA', 'ALONSO', NULL, NULL, NULL),
(5, 'LUIS ALBERTO', 'ZAMBRANA', NULL, NULL, NULL),
(6, 'LUIS ALBERTO', 'ZAMBRANA', NULL, NULL, NULL),
(7, 'MARIA EUGENIA', 'ANTORENA', NULL, NULL, NULL),
(8, 'MARIA EUGENIA', 'ANTORENA', NULL, NULL, NULL),
(9, 'MARIA EUGENIA', 'ANTORENA', NULL, NULL, NULL),
(10, 'ASDASD', 'ASDASDASD', NULL, NULL, NULL),
(11, 'ASDASD', 'ASDASDASD', NULL, NULL, NULL),
(12, 'MARCOS', 'DAERF', NULL, NULL, NULL),
(13, 'LOISITO', 'LEPUESTO', NULL, NULL, NULL),
(14, 'BLANCA NORMA', 'TORRES', NULL, NULL, NULL),
(15, 'BLANCA NORMA', 'TORRES', NULL, NULL, NULL),
(16, 'BLANCA NORMA', 'TORRES', NULL, NULL, NULL),
(17, 'BLANCA NORMA', 'TORRES', NULL, NULL, NULL),
(18, 'ALBERTO', 'CASTILLO', NULL, NULL, NULL),
(19, 'CARLOS', 'GARDEL', NULL, NULL, NULL),
(20, 'CARLOS', 'GARDEL', NULL, NULL, NULL),
(21, 'CARLOS', 'GARDEL', NULL, NULL, NULL),
(22, 'MARIA EUGENIA', 'ANTORENA', NULL, NULL, NULL),
(23, 'PEPITO', 'MAS', NULL, NULL, NULL),
(24, 'MATIAS GABRIEL', 'ALONSO', b'1', NULL, NULL),
(25, 'MARIA EUGENIA', 'ANTORENA', b'1', NULL, NULL),
(26, 'VALENTIN', 'ALONSO ANTORENA', b'1', NULL, NULL),
(27, 'MARTINA', 'ALONSO ANTORENA', b'1', NULL, NULL),
(28, 'MANUEL ANGEL', 'ALONSO', b'1', NULL, NULL),
(29, 'CARLOS', 'GARDEL', b'1', NULL, NULL),
(30, 'MARTINA', 'ALONSO', b'1', NULL, NULL),
(31, 'VALENTIN', 'ALONSO', b'1', NULL, NULL),
(32, 'MATIAS GABRIEL', 'ALONSO', b'1', NULL, NULL),
(33, 'VALENTIN', 'ALONSO', b'1', NULL, NULL),
(34, 'MATIAS GABRIEL', 'ALONSO', b'1', NULL, NULL),
(35, 'MARIA EUGENIA', 'ANOTRENA', b'1', NULL, NULL),
(36, 'MATIAS GABRIEL', 'ALONSO', b'1', NULL, NULL),
(37, 'MARIA EUGENIA', 'ANTORENA', b'1', NULL, NULL),
(38, 'VALENTIN', 'ALONSO ANTORENA', b'1', NULL, NULL),
(39, 'MARTINA', 'ALONSO ANTORENA', b'1', NULL, NULL),
(40, 'MATIAS GABRIEL', 'ALONSO', b'1', NULL, NULL),
(41, 'VALENTIN', 'ALONSO ANTORENA', b'1', NULL, NULL),
(42, 'MARTINA', 'ALONSO ANTORENA', b'1', NULL, NULL),
(43, 'MATIAS GABRIEL', 'ALONSO', b'1', NULL, NULL),
(44, 'MARIA EUGENIA', 'ANTORENA', b'1', NULL, NULL),
(45, 'VALENTIN', 'ALONSO ANTORENA', b'1', NULL, NULL),
(46, 'MARTINA', 'ALONSO ANTORENA', b'1', NULL, NULL),
(47, 'BLANCA NORMA', 'TORRES', b'1', NULL, NULL),
(48, 'MANUEL ANGEL', 'ALONSO', b'1', NULL, NULL),
(49, 'MARTIN DARIO', 'ALONSO', b'1', NULL, NULL),
(50, 'LUIS ALBERTO', 'ZAMBRANA', b'1', NULL, NULL),
(51, 'LUIZ ALBERTO', 'ZAMBRANA', b'1', NULL, NULL),
(52, 'MARIA EUGENIA', 'ANTORENA', b'1', NULL, NULL),
(53, 'JULIAN ARIEL', 'MODOLO', b'1', NULL, NULL),
(54, 'ALBERTO', 'CASTILLO', b'1', NULL, NULL),
(55, 'MATIAS GABRIEL', 'ALONSO', b'1', NULL, NULL),
(56, 'ALBERTO ADRIAN hhhhh', 'CASTILLO', b'1', 2122, '2024-03-27 13:56:41'),
(57, 'LUIS', 'ZAMBRANA', b'1', NULL, NULL),
(58, 'JULIAN ARIEL', 'MODOLO', b'1', NULL, NULL),
(59, '', '', b'1', 2122, '2024-03-22 13:03:14'),
(60, 'FERNANDO', 'RODRIGUEZ', b'1', NULL, NULL),
(61, 'ALBERTO', 'CASTILLO', b'1', NULL, NULL),
(62, 'LUIS ALBERTO', 'ZAMBRANA', b'0', 2122, '2024-03-22 12:45:20'),
(63, 'LIONEL ANDRES', 'MESSI', b'0', 2122, '2024-03-22 12:52:04'),
(64, 'HORACIO', 'SANCHEZ', b'1', 2122, '2024-03-23 14:55:23'),
(65, 'LEOPOLDO', 'LOPEZ', b'0', NULL, NULL),
(66, 'PABLO', 'HERNANDEZ', b'0', NULL, '2024-03-23 14:56:53'),
(67, '', '', b'1', 2122, '2024-03-22 13:05:31'),
(68, 'PITITP', 'SDASS', b'1', NULL, NULL),
(69, 'CARLA', 'SANCHEZ', b'1', NULL, NULL),
(70, 'FERNANDO', 'RODRIGUEZ', b'0', NULL, NULL),
(71, 'prueba', 'si anda', b'1', 1, '2024-03-20 03:02:28'),
(72, 'prueba', 'sotroa', b'1', 1, '2024-03-20 03:06:25'),
(73, 'elnombre', 'elapellido', b'1', 1, '2024-03-20 05:28:13'),
(74, 'nombre', 'apellido', b'1', 1, '2024-03-20 07:55:55'),
(75, 'nombre', 'apellido', b'1', 1, '2024-03-20 08:09:52'),
(76, 'nombre', 'apellido', b'1', 1, '2024-03-20 08:13:20'),
(77, 'choto', 'tito', b'1', 12, '2024-03-20 17:37:07'),
(78, 'COSAS', 'QUE PASAN', b'1', 2122, '2024-03-23 14:58:55'),
(79, 'EL ULTIMO', 'SAMURAI', b'1', 32123, '2024-03-21 13:45:40'),
(80, 'EL PRIMER', 'SAMURAI', b'1', 32123, '2024-03-21 13:49:01'),
(81, 'MARIA', 'ANTORENA', b'1', 32123, '2024-03-21 13:49:12'),
(82, 'JULIO ', 'SOSA VENTURINI', b'0', 32123, '2024-03-21 13:50:02'),
(83, '20240321', '20240321', b'1', 20240321, '2024-03-21 14:55:47'),
(84, '20240321', '20240321', b'1', 20240321, '2024-03-21 14:56:41'),
(85, '20240321', '20240321', b'1', 20240321, '2024-03-21 15:03:36'),
(86, '20240321', '20240321', b'1', 20240321, '2024-03-21 15:19:38'),
(87, '20240321', '20240321', b'1', 20240321, '2024-03-21 15:35:14'),
(88, '20240321', '20240321', b'1', 20240321, '2024-03-21 16:03:52'),
(89, 'MARIA', 'ANTORENA', b'1', 12, '2024-03-21 16:11:31'),
(90, 'MANUEL ANGEL', 'ALONSO', b'0', 12, '2024-03-21 16:15:12'),
(91, 'MANUEL ANGEL', 'ALONSO 2', b'1', 12, '2024-03-21 16:21:52'),
(92, 'EL ULTIMO', 'SAMURAI', b'0', 12, '2024-03-21 16:22:38'),
(93, 'PIPITO', 'SOLAMENTE', b'1', 12, '2024-03-21 16:25:13'),
(94, 'JULIAN', 'MODOLO', b'1', 12, '2024-03-21 16:28:52'),
(95, 'MARIA', 'ANTORENA', b'1', 12, '2024-03-21 16:38:30'),
(96, 'EL ULTIMO', 'SAMURAI', b'0', 12, '2024-03-21 16:43:03'),
(97, 'ARMANDO ESTEBAN', 'QUITO', b'1', 2122, '2024-03-23 14:56:30'),
(98, 'EDUARDO', 'COUDET', b'0', 12, '2024-04-08 14:11:58'),
(99, 'MARIA', 'ANTORENA', b'1', 12, '2024-03-22 00:17:12'),
(100, '', '', b'1', 2122, '2024-03-22 13:05:40'),
(101, 'CHACHO (ROSARIO)', 'ALONSO', b'1', 2122, '2024-03-23 14:58:48'),
(102, 'JULIAN ARIEL', 'MODOLO', b'0', 2122, '2024-03-22 12:51:39'),
(103, 'MATIAS GABRIEL', 'COUDET', b'1', 2122, '2024-03-23 14:57:29'),
(104, 'GABRIEL', 'ASAD', b'1', 2122, '2024-04-08 14:01:05'),
(105, 'ALVARO', 'SANTANA', b'1', 2122, '2024-04-08 14:00:55');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `adma_persona_i0`
--

CREATE TABLE `adma_persona_i0` (
  `id` int NOT NULL,
  `personaid` int NOT NULL,
  `fecha_nacimiento` date NOT NULL,
  `tipo_identificacionid` tinyint NOT NULL,
  `identificacionid` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `sexoid` tinyint NOT NULL,
  `cuil` varchar(13) NOT NULL,
  `estado_civil` tinyint NOT NULL,
  `baja` bit(1) NOT NULL,
  `usuarioid` int NOT NULL,
  `fecharegistro` timestamp NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Volcado de datos para la tabla `adma_persona_i0`
--

INSERT INTO `adma_persona_i0` (`id`, `personaid`, `fecha_nacimiento`, `tipo_identificacionid`, `identificacionid`, `sexoid`, `cuil`, `estado_civil`, `baja`, `usuarioid`, `fecharegistro`) VALUES
(1, 56, '1982-01-10', 1, '28781199', 1, '20-28781199-4', 2, b'0', 0, '2024-03-12 00:10:35'),
(2, 58, '2000-07-15', 1, '11111111', 1, '20-12345678-1', 2, b'0', 0, '2024-03-11 11:27:44'),
(3, 63, '1987-07-22', 1, '40123456', 1, '20-12345678-6', 2, b'0', 0, '2024-04-13 18:44:47'),
(4, 62, '1982-03-06', 1, '12345678', 1, '20-12345678-0', 2, b'0', 0, '2024-03-07 12:43:31'),
(5, 66, '1978-01-10', 1, '1331123312', 1, '10-12314212-8', 2, b'0', 0, '2024-03-23 14:58:23'),
(6, 69, '2000-05-04', 3, '111123331', 2, '23-12312222-3', 4, b'0', 0, '2024-03-07 17:03:45'),
(7, 59, '1988-06-01', 1, '3034223121', 1, '12345678', 2, b'0', 0, '2024-03-15 18:01:16'),
(8, 70, '1988-04-22', 1, '12345678', 3, '11111111', 4, b'0', 0, '2024-03-07 17:55:05'),
(9, 61, '2024-02-26', 1, '12345678', 2, '11111111', 4, b'0', 0, '2024-03-07 18:07:03'),
(10, 96, '2024-02-29', 1, '12345678', 1, '11111111', 1, b'0', 0, '2024-03-21 16:47:03');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `adma_sector`
--

CREATE TABLE `adma_sector` (
  `sectorid` int NOT NULL,
  `sectords` varchar(500) NOT NULL,
  `tiposectorid` int DEFAULT NULL,
  `activo` bit(1) DEFAULT NULL,
  `baja` bit(1) DEFAULT NULL,
  `usuarioid` int DEFAULT NULL,
  `fecharegistro` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Volcado de datos para la tabla `adma_sector`
--

INSERT INTO `adma_sector` (`sectorid`, `sectords`, `tiposectorid`, `activo`, `baja`, `usuarioid`, `fecharegistro`) VALUES
(1, 'MESA DE ENTRADA', 1, b'1', b'0', 12, '2024-04-23 14:25:29'),
(2, 'SECRETARIA DE GOBIERNO', 1, b'1', b'0', 12, '2024-04-23 14:26:41'),
(3, 'SECRETARIA DE HACIENDA', 1, b'1', b'0', 12, '2024-04-23 14:27:10'),
(4, 'SECRETARIA DE DEPORTE Y CULTURA', 1, b'1', b'0', 12, '2024-04-23 14:27:40'),
(5, 'SECRETARIA DE DESARROLLO HUMANO', 1, b'1', b'0', 12, '2024-04-23 14:28:09'),
(6, 'SECRETARIA DE OBRAS PUBLICAS', 1, b'1', b'0', 12, '2024-04-23 14:30:15'),
(7, 'INTENDENCIA', 1, b'1', b'0', 12, '2024-04-23 14:31:14'),
(8, 'CONCEJO DELIBERANTE', 3, b'1', b'0', 12, '2024-04-23 14:31:52'),
(9, 'TRIBUNAL DE CUENTAS', 2, b'1', b'0', 12, '2024-04-23 14:32:07'),
(10, 'SECRETARIA DE PRODUCCION Y TURISMO', 1, b'1', b'0', 12, '2024-04-23 14:34:42');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `prueba`
--

CREATE TABLE `prueba` (
  `id` int NOT NULL,
  `nombre` varchar(500) DEFAULT NULL,
  `baja` bit(1) DEFAULT NULL,
  `usuarioid` int DEFAULT NULL,
  `fecharegistro` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sema_objeto_h`
--

CREATE TABLE `sema_objeto_h` (
  `objetoid` int NOT NULL,
  `tipoobjetoid` int DEFAULT NULL,
  `nombreobjetods` varchar(200) DEFAULT NULL,
  `formularioid` int DEFAULT NULL,
  `menuid` int DEFAULT NULL,
  `baja` bit(1) DEFAULT NULL,
  `usuarioid` int DEFAULT NULL,
  `fecharegistro` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Volcado de datos para la tabla `sema_objeto_h`
--

INSERT INTO `sema_objeto_h` (`objetoid`, `tipoobjetoid`, `nombreobjetods`, `formularioid`, `menuid`, `baja`, `usuarioid`, `fecharegistro`) VALUES
(2, 1, 'Administracion de Sitio', 0, 1, b'0', 12, '2024-04-17 17:46:29'),
(4, 2, 'Grillas', 2, 0, b'0', 12, '2024-04-17 17:05:17'),
(5, 1, 'Seguridad', 0, 2, b'0', 12, '2024-04-17 17:07:34'),
(6, 2, 'Listas', 3, 0, b'0', 12, '2024-04-18 01:46:20'),
(7, 2, 'Procedimientos', 4, 0, b'0', 12, '2024-04-18 01:47:10'),
(8, 2, 'Objeto', 7, 0, b'0', 12, '2024-04-18 01:53:33'),
(9, 2, 'Permisos', 8, 0, b'0', 12, '2024-04-18 01:53:56'),
(10, 3, 'Listas (Controles)', 3, 0, b'0', 12, '2024-04-18 02:48:50'),
(11, 2, 'Menú', 5, 0, b'0', 12, '2024-04-18 14:01:38'),
(12, 2, 'Formulario', 6, 0, b'0', 12, '2024-04-18 14:15:14'),
(13, 2, 'Usuarios', 9, 0, b'0', 12, '2024-04-18 16:34:51'),
(14, 1, 'Maestros', 0, 3, b'0', 12, '2024-04-18 16:42:06'),
(15, 2, 'Personas', 10, 0, b'0', 12, '2024-04-18 16:44:46'),
(16, 2, 'Sector', 11, 0, b'0', 12, '2024-04-21 13:13:04');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sema_rol_h`
--

CREATE TABLE `sema_rol_h` (
  `rolid` int NOT NULL,
  `rolds` varchar(200) DEFAULT NULL,
  `activo` bit(1) DEFAULT NULL,
  `baja` bit(1) DEFAULT NULL,
  `usuarioid` int DEFAULT NULL,
  `fecharegistro` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Volcado de datos para la tabla `sema_rol_h`
--

INSERT INTO `sema_rol_h` (`rolid`, `rolds`, `activo`, `baja`, `usuarioid`, `fecharegistro`) VALUES
(1, 'ADMINISTRADOR', b'1', b'1', 2122, '2024-04-16 13:20:38'),
(2, 'ADMINISTRADOR', b'1', b'0', 12, '2024-04-16 16:23:08'),
(3, 'USUARIO', b'1', b'0', 12, '2024-04-16 13:21:10');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sema_usuario_i0`
--

CREATE TABLE `sema_usuario_i0` (
  `asociacionid` int NOT NULL,
  `personaid` int DEFAULT NULL,
  `rolid` int DEFAULT NULL,
  `baja` bit(1) DEFAULT NULL,
  `usuarioid` int DEFAULT NULL,
  `fecharegistro` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Volcado de datos para la tabla `sema_usuario_i0`
--

INSERT INTO `sema_usuario_i0` (`asociacionid`, `personaid`, `rolid`, `baja`, `usuarioid`, `fecharegistro`) VALUES
(1, 1, 2, NULL, 12, '2024-04-16 18:10:11'),
(2, 1, 2, NULL, 12, '2024-04-16 18:11:14'),
(3, 1, 2, NULL, 12, '2024-04-16 18:13:22'),
(4, 1, 2, b'0', 12, '2024-04-16 18:14:12'),
(5, 2, 3, b'0', 12, '2024-04-17 17:53:34'),
(6, 7, 2, b'0', 12, '2024-04-20 13:24:08'),
(7, 9, 3, b'0', 12, '2024-04-22 17:59:19'),
(8, 13, 2, b'0', 12, '2024-04-23 12:25:13');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sema_usuario_i1`
--

CREATE TABLE `sema_usuario_i1` (
  `perteneceid` int NOT NULL,
  `personaid` int NOT NULL,
  `sectorid` int NOT NULL,
  `activo` bit(1) DEFAULT NULL,
  `baja` bit(1) DEFAULT NULL,
  `usuarioid` int DEFAULT NULL,
  `fecharegistro` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Volcado de datos para la tabla `sema_usuario_i1`
--

INSERT INTO `sema_usuario_i1` (`perteneceid`, `personaid`, `sectorid`, `activo`, `baja`, `usuarioid`, `fecharegistro`) VALUES
(1, 1, 1, b'1', b'0', 12, '2024-04-22 17:47:06'),
(2, 9, 2, b'1', b'0', 12, '2024-04-22 17:59:38');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `serg_permisos_h`
--

CREATE TABLE `serg_permisos_h` (
  `permisoid` int NOT NULL,
  `objetoid` int DEFAULT NULL,
  `rolid` int DEFAULT NULL,
  `accionid` int DEFAULT NULL,
  `activo` bit(1) DEFAULT NULL,
  `baja` bit(1) DEFAULT NULL,
  `usuarioid` int DEFAULT NULL,
  `fecharegistro` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Volcado de datos para la tabla `serg_permisos_h`
--

INSERT INTO `serg_permisos_h` (`permisoid`, `objetoid`, `rolid`, `accionid`, `activo`, `baja`, `usuarioid`, `fecharegistro`) VALUES
(1, 4, 2, 2, b'1', b'1', 2122, '2024-04-16 16:54:38'),
(2, 2, 2, 1, b'1', b'0', 12, '2024-04-18 13:20:17'),
(3, 4, 2, 1, b'1', b'0', 12, '2024-04-17 13:21:42'),
(4, 4, 2, 2, b'1', b'0', 12, '2024-04-17 13:22:08'),
(5, 4, 2, 3, b'1', b'0', 12, '2024-04-17 13:39:15'),
(6, 5, 2, 1, b'1', b'0', 12, '2024-04-17 17:52:37'),
(7, 8, 2, 1, b'1', b'0', 12, '2024-04-18 01:54:29'),
(8, 9, 2, 1, b'1', b'0', 12, '2024-04-18 01:54:45'),
(9, 6, 2, 1, b'1', b'0', 12, '2024-04-18 13:20:57'),
(10, 7, 2, 1, b'1', b'0', 12, '2024-04-18 12:45:47'),
(11, 10, 2, 1, b'1', b'0', 12, '2024-04-23 14:06:23'),
(12, 10, 2, 2, b'1', b'0', 12, '2024-04-23 14:06:40'),
(13, 10, 2, 3, b'1', b'0', 12, '2024-04-23 14:06:55'),
(14, 10, 2, 4, b'0', b'0', 12, '2024-04-23 13:37:02'),
(15, 11, 2, 1, b'1', b'0', 12, '2024-04-18 14:02:30'),
(16, 12, 2, 1, b'1', b'0', 12, '2024-04-18 14:16:11'),
(17, 13, 2, 1, b'1', b'0', 12, '2024-04-18 16:35:42'),
(18, 14, 2, 1, b'1', b'0', 12, '2024-04-18 16:42:38'),
(19, 15, 2, 1, b'1', b'0', 12, '2024-04-18 16:45:18'),
(20, 16, 2, 1, b'1', b'0', 12, '2024-04-21 13:13:37');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `syma_grilla_h`
--

CREATE TABLE `syma_grilla_h` (
  `id` int NOT NULL,
  `grillaid` int DEFAULT NULL,
  `tipoconsultaid` int DEFAULT NULL,
  `keyfieldname` varchar(250) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `tabla` varchar(250) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `querys` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `showgroupedcolumns` bit(1) DEFAULT b'0',
  `showgrouppanel` bit(1) DEFAULT b'0',
  `showautofilterrow` bit(1) DEFAULT b'0',
  `grupo` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `showsession` bit(1) DEFAULT b'0',
  `showsector` bit(1) DEFAULT b'0',
  `baja` bit(1) DEFAULT b'0',
  `usuarioid` int DEFAULT NULL,
  `fecharegistro` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Volcado de datos para la tabla `syma_grilla_h`
--

INSERT INTO `syma_grilla_h` (`id`, `grillaid`, `tipoconsultaid`, `keyfieldname`, `tabla`, `querys`, `showgroupedcolumns`, `showgrouppanel`, `showautofilterrow`, `grupo`, `showsession`, `showsector`, `baja`, `usuarioid`, `fecharegistro`) VALUES
(2, 1, 1, 'personaid', 'adma_persona', 'select * from adma_persona where baja = 0', b'1', b'1', b'1', 'ADMINISTRADOR', b'1', b'1', b'1', 2122, '2024-04-08 17:25:18'),
(3, 2, 1, 'personaid', 'adma_persona', 'select * from adma_persona where baja = 0 ', b'1', b'1', b'1', 'ADMINISTRADOR', b'0', b'0', b'0', 12, '2024-04-17 11:15:42'),
(4, 3, 1, 'id', 'tbl_member', 'select * from tbl_member', b'1', b'1', b'1', 'ADMINISTRADOR', b'0', b'0', b'0', 12, '2024-04-14 13:07:49'),
(5, 4, 1, 'TABLE_NAME', 'information_schema.tables', 'select * from information_schema.tables', b'1', b'1', b'1', 'ADMINISTRADOR', b'0', b'0', b'0', 12, '2024-04-09 13:53:33'),
(7, 6, 1, 'barreraid', 'adma_barrera', 'select * from adma_barrera where baja = 0', b'1', b'1', b'1', 'ADMINISTRADOR', b'1', b'1', b'0', 12, '2024-04-03 16:45:55'),
(8, 7, 1, 'id', 'syma_grilla_h', 'select * from syma_grilla_h where baja = 0', b'1', b'1', b'1', 'REGISTRACION', b'1', b'1', b'0', 12, '2024-04-08 17:37:27'),
(9, 8, 1, 'grillaid', 'syma_grilla_i0', 'select * from syma_grilla_i0', b'1', b'1', b'0', 'ADMINISTRADOR', b'0', b'0', b'0', 12, '2024-04-11 14:51:21'),
(10, 9, 1, 'registroid_h', 'syrg_lista_h', 'select * from syrg_lista_h where baja = 0 ', b'0', b'0', b'0', 'ADMINISTRADOR', b'0', b'0', b'0', 12, '2024-04-10 13:10:01'),
(11, 10, 1, 'listaid', 'syrg_lista_i0', 'select * from syrg_lista_i0 where = 0', b'0', b'0', b'0', 'ADMINISTRADOR', b'0', b'0', b'0', 12, '2024-04-11 14:52:47'),
(12, 11, 1, 'listaid', 'syrg_lista_i1', 'select * from syrg_lista_i1 where = 0', b'0', b'0', b'0', 'ADMINISTRADOR', b'0', b'0', b'0', 12, '2024-04-11 14:49:41'),
(13, 12, 1, ' menuhorizontalid', 'adma_menu_h', 'select * from adma_menu_h where baja = 0 ', b'0', b'0', b'1', 'ADMINISTRADOR', b'0', b'0', b'0', 12, '2024-04-14 13:09:48'),
(14, 13, 1, 'itemmenuid', 'adma_menu_i0', 'select * from adma_menu_i0 where baja = 0', b'0', b'0', b'0', 'ADMINISTRADOR', b'0', b'0', b'0', 12, '2024-04-14 13:12:31'),
(15, 15, 1, 'objetoid', 'sema_objeto_h', 'select * from sema_objeto_h where baja = 0', b'0', b'0', b'0', 'SEGURIDAD', b'0', b'0', b'0', 12, '2024-04-15 22:00:06'),
(16, 16, 1, 'formularioid ', 'syrg_formulario_h', 'select * from syrg_formulario_h where baja = 0', b'0', b'0', b'0', 'SEGURIDAD', b'0', b'0', b'0', 12, '2024-04-15 22:10:46'),
(17, 17, 1, 'rolid', 'sema_rol_h', 'select * from sema_rol_h where baja = 0', b'0', b'0', b'0', 'SEGURIDAD', b'0', b'0', b'0', 12, '2024-04-16 12:51:08'),
(18, 18, 1, 'permisoid', 'serg_permisos_h', 'select * from serg_permisos_h where baja = 0', b'0', b'0', b'0', 'SEGURIDAD', b'0', b'0', b'0', 12, '2024-04-16 13:56:30'),
(19, 19, 1, 'asociacionid', 'sema_usuario_i0', 'select * from sema_usuario_i0 where baja = 0', b'0', b'0', b'0', 'SEGURIDAD', b'0', b'0', b'0', 12, '2024-04-16 17:25:39'),
(20, 20, 1, 'sectorid', 'adma_sector', 'select * from adma_sector', b'0', b'0', b'0', 'REGISTRACION', b'0', b'0', b'0', 12, '2024-04-21 12:58:08'),
(21, 21, 1, 'pertenenceid', 'sema_usuario_i1', 'select * from sema_usuario_i1 where baja = 0', b'0', b'0', b'0', 'REGISTRACION', b'0', b'0', b'0', 12, '2024-04-21 13:00:07');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `syma_grilla_i0`
--

CREATE TABLE `syma_grilla_i0` (
  `itemid` int NOT NULL,
  `grillaid` int DEFAULT NULL,
  `caption` varchar(250) DEFAULT NULL,
  `tooltip` varchar(250) DEFAULT NULL,
  `visible` bit(1) DEFAULT (0),
  `visibleindex` int DEFAULT NULL,
  `width` int DEFAULT NULL,
  `groupindex` int DEFAULT NULL,
  `fieldname` varchar(250) DEFAULT NULL,
  `combolistaid` int DEFAULT NULL,
  `html` bit(1) DEFAULT (0),
  `tienecondicion` bit(1) DEFAULT (0),
  `condicion` varchar(500) DEFAULT NULL,
  `imagen` bit(1) DEFAULT (0),
  `url_imagen` varchar(500) DEFAULT NULL,
  `campoimagen` bit(1) DEFAULT (0),
  `hiperlink` bit(1) DEFAULT (0),
  `priority` int DEFAULT NULL,
  `parametro` bit(1) DEFAULT (0),
  `nombresesion` varchar(250) DEFAULT NULL,
  `baja` bit(1) DEFAULT (0),
  `usuarioid` int DEFAULT NULL,
  `fecharegistro` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Volcado de datos para la tabla `syma_grilla_i0`
--

INSERT INTO `syma_grilla_i0` (`itemid`, `grillaid`, `caption`, `tooltip`, `visible`, `visibleindex`, `width`, `groupindex`, `fieldname`, `combolistaid`, `html`, `tienecondicion`, `condicion`, `imagen`, `url_imagen`, `campoimagen`, `hiperlink`, `priority`, `parametro`, `nombresesion`, `baja`, `usuarioid`, `fecharegistro`) VALUES
(3, 1, 'PERSONAID', 'PERSONAID', b'0', 0, 100, 0, 'personaid', 0, b'0', b'0', ' ', NULL, ' ', NULL, NULL, 1, NULL, ' ', b'0', 12, '2024-04-03 13:02:14'),
(4, 1, 'NOMBRE', 'NOMBRE', b'0', 1, 100, 1, 'nombre', 0, b'0', b'0', ' ', NULL, ' ', NULL, b'0', 1, b'0', ' ', b'0', 12, '2024-04-03 13:31:33'),
(5, 1, 'NOMBRE', 'NOMBRE', b'0', 1, 100, 1, 'nombre', 0, b'0', b'0', ' ', NULL, ' ', NULL, b'0', 1, b'0', ' ', b'0', 12, '2024-04-03 13:58:09'),
(6, 1, 'NOMBRE', 'NOMBRE', b'0', 1, 100, 1, 'nombre', 0, b'0', b'0', ' ', NULL, ' ', NULL, b'0', 1, b'0', ' ', b'0', 12, '2024-04-03 13:58:49'),
(10, 1, 'OTRA VER', 'xxxx', b'0', 12, 100, 12, 'xxxx', 23, b'0', b'0', 'dsdasd', b'0', 'dsadsasdad', b'0', b'0', 0, b'0', 'aasd23123', b'0', 12, '2024-04-08 17:17:59'),
(11, 1, 'xxxx', 'xxxx', b'0', 12, 100, 12, 'xxxx', 23, b'0', b'0', 'dsdasd', b'0', 'dsadsasdad', b'0', b'0', 0, b'0', 'aasd23123', b'0', 12, '2024-04-03 14:10:03'),
(12, 7, 'asdasd', 'sdadad', b'0', 1, 221, 1, 'sdasdasd', 12, b'0', b'0', ' ', b'0', ' ', b'0', b'0', 1, b'1', 'sdadasd', b'1', 2122, '2024-04-08 17:30:44'),
(13, 7, 'asdasd', 'asdad', b'0', 22, 2111, 2, 'dasdasd', 11, b'1', b'0', ' ', b'0', ' ', b'0', b'0', 1, b'0', ' ', b'1', 2122, '2024-04-08 17:34:56'),
(14, 6, 'ID DE LA BARRERA', 'BARRERAID', b'1', 0, 100, 0, 'barreraid', 0, b'0', b'0', ' ', b'0', ' ', b'0', b'0', 1, b'0', ' ', b'0', 12, '2024-04-03 15:18:41'),
(15, 6, 'NOMBRE DE BARRERA', 'BARRERADS', b'1', 1, 100, 0, 'barrerads', 0, b'0', b'0', ' ', b'0', ' ', b'0', b'0', 1, b'0', ' ', b'0', 12, '2024-04-03 15:19:33'),
(16, 1, 'sdasd', 'asdasd', b'1', 0, 12, 23, 'sdad', 22, b'0', b'0', ' ', b'0', ' ', b'0', b'0', 0, b'0', ' ', b'0', 12, '2024-04-04 22:29:26'),
(17, 1, 'weqwe', 'qweqwe', b'1', 1, 11, 23, '21312dasdads', 23123, b'1', b'0', '1231', b'0', '123123', b'0', b'0', 123123, b'0', '123123', b'0', 12, '2024-04-04 22:30:02'),
(18, 1, '123123', '123123', b'1', 123123, 123123, 123123, '1231231', 23123, b'0', b'0', '123123', b'0', '123123', b'0', b'0', 123123123, b'0', '123123', b'0', 12, '2024-04-04 22:30:30'),
(19, 1, 'qweqwe', '23123', b'1', 123123, 123123, 1231, '123', 12313, b'1', b'0', '123123', b'0', '23', b'0', b'0', 88, b'0', '88', b'0', 12, '2024-04-04 22:31:08'),
(20, 1, '23123', '1231231', b'0', 123123, 123123, 1231233, '123123', 123, b'0', b'0', '123123', b'0', '123123', b'0', b'0', 123123, b'0', '123123', b'0', 12, '2024-04-04 22:31:43'),
(21, 2, 'ID', 'personaid', b'1', 0, 100, 1, 'personaid', 0, b'1', b'0', '3213', b'0', 'WEQWEQWEQ', b'0', b'0', 0, b'1', 'WEQWEQWE', b'0', 12, '2024-04-12 11:33:09'),
(22, 2, 'NOMBRE', 'nombre', b'1', 1, 100, 0, 'nombre', 0, b'1', b'1', ' ', b'1', ' ', b'1', b'1', 1, b'1', ' ', b'0', 12, '2024-04-07 20:49:43'),
(23, 2, 'APELLIDO', 'apellido', b'1', 2, 100, 0, 'apellido', 0, b'1', b'0', ' ', b'0', ' ', b'0', b'0', 1, b'0', ' ', b'0', 12, '2024-04-07 20:50:50'),
(24, 7, 'Id', 'Id', b'0', 0, 100, 0, 'id', 0, b'0', b'0', ' ', b'0', ' ', b'0', b'0', 1, b'0', ' ', b'0', 12, '2024-04-08 17:56:42'),
(25, 7, 'GrillaId', 'GrillaId', b'1', 1, 100, 0, 'grillaid', 0, b'0', b'0', ' ', b'0', ' ', b'0', b'0', 1, b'0', ' ', b'0', 12, '2024-04-12 16:48:51'),
(26, 7, 'TipoConsultaId', 'TipoConsultaId', b'1', 2, 100, 0, 'tipoconsultaid', 1, b'0', b'0', ' ', b'0', ' ', b'0', b'0', 1, b'0', ' ', b'0', 12, '2024-04-12 11:35:33'),
(27, 7, 'KeyFieldName ', 'KeyFieldName ', b'1', 3, 100, 0, 'keyfieldname ', 0, b'0', b'0', ' ', b'0', ' ', b'0', b'0', 1, b'0', ' ', b'0', 12, '2024-04-08 17:44:54'),
(28, 7, 'Tabla', 'Tabla', b'1', 4, 100, 0, 'tabla', 0, b'0', b'0', ' ', b'0', ' ', b'0', b'0', 1, b'0', ' ', b'0', 12, '2024-04-08 17:44:22'),
(29, 7, 'Query', 'Query', b'1', 5, 100, 0, 'querys', 0, b'0', b'0', ' ', b'0', ' ', b'0', b'0', 0, b'0', ' ', b'0', 12, '2024-04-08 17:46:18'),
(30, 7, 'ShowGroupedColumns', 'ShowGroupedColumns', b'1', 6, 100, 0, 'showgroupedcolumns', 3, b'0', b'0', ' ', b'0', ' ', b'0', b'0', 0, b'0', ' ', b'0', 12, '2024-04-12 15:15:27'),
(31, 7, 'ShowGroupPanel ', 'ShowGroupPanel ', b'1', 7, 100, 0, 'showgrouppanel ', 3, b'0', b'0', ' ', b'0', ' ', b'0', b'0', 1, b'0', ' ', b'0', 12, '2024-04-12 15:15:47'),
(32, 7, 'ShowAutoFilterRow', 'ShowAutoFilterRow', b'1', 8, 100, 0, 'showautofilterrow', 3, b'0', b'0', ' ', b'0', ' ', b'0', b'0', 1, b'0', ' ', b'0', 12, '2024-04-12 16:50:07'),
(33, 7, 'Grupo', 'Grupo', b'1', 9, 100, 0, 'grupo', 0, b'0', b'0', ' ', b'0', ' ', b'0', b'0', 1, b'0', ' ', b'0', 12, '2024-04-08 18:15:42'),
(34, 3, 'Id', 'Id', b'1', 0, 100, 0, 'id', 0, b'0', b'0', ' ', b'0', ' ', b'0', b'0', 1, b'0', ' ', b'0', 12, '2024-04-09 12:13:11'),
(35, 3, 'Nombre de Usuario', 'Nombre de Usuario', b'1', 1, 100, 0, 'username', 0, b'0', b'0', ' ', b'0', ' ', b'0', b'0', 1, b'0', ' ', b'0', 12, '2024-04-09 12:14:15'),
(36, 3, 'Nombre Persona', 'Nombre Persona', b'1', 2, 100, 0, 'name', 0, b'0', b'0', ' ', b'0', ' ', b'0', b'0', 1, b'0', ' ', b'0', 12, '2024-04-09 12:15:25'),
(37, 3, 'Fecha Creación', 'Fecha Creación', b'1', 3, 100, 0, 'create_at', 0, b'0', b'0', ' ', b'0', ' ', b'0', b'0', 1, b'0', ' ', b'0', 12, '2024-04-09 12:17:03'),
(38, 4, 'Tabla', 'Tabla', b'1', 0, 100, 0, 'TABLE_NAME', 0, b'0', b'0', ' ', b'0', ' ', b'0', b'0', 0, b'0', ' ', b'0', 12, '2024-04-09 13:53:52'),
(269, 8, 'itemid', 'itemid', b'1', 0, 100, 0, 'itemid', 0, b'0', b'0', '', b'0', '', b'0', b'0', 1, b'0', '', b'0', 12, '2024-04-10 12:55:22'),
(270, 8, 'grillaid', 'grillaid', b'0', 1, 100, 0, 'grillaid', 0, b'0', b'0', ' ', b'0', ' ', b'0', b'0', 1, b'0', ' ', b'0', 12, '2024-04-12 16:56:21'),
(271, 8, 'caption', 'caption', b'1', 2, 100, 0, 'caption', 0, b'0', b'0', '', b'0', '', b'0', b'0', 1, b'0', '', b'0', 12, '2024-04-10 12:55:22'),
(272, 8, 'tooltip', 'tooltip', b'1', 3, 100, 0, 'tooltip', 0, b'0', b'0', '', b'0', '', b'0', b'0', 1, b'0', '', b'0', 12, '2024-04-10 12:55:22'),
(273, 8, 'visible', 'visible', b'1', 4, 100, 0, 'visible', 3, b'0', b'0', ' ', b'0', ' ', b'0', b'0', 1, b'0', ' ', b'0', 12, '2024-04-12 16:57:16'),
(274, 8, 'visibleindex', 'visibleindex', b'1', 5, 100, 0, 'visibleindex', 0, b'0', b'0', '', b'0', '', b'0', b'0', 1, b'0', '', b'0', 12, '2024-04-10 12:55:22'),
(275, 8, 'width', 'width', b'1', 6, 100, 0, 'width', 0, b'0', b'0', '', b'0', '', b'0', b'0', 1, b'0', '', b'0', 12, '2024-04-10 12:55:22'),
(276, 8, 'groupindex', 'groupindex', b'1', 7, 100, 0, 'groupindex', 3, b'0', b'0', ' ', b'0', ' ', b'0', b'0', 1, b'0', ' ', b'0', 12, '2024-04-12 16:57:51'),
(277, 8, 'fieldname', 'fieldname', b'1', 8, 100, 0, 'fieldname', 0, b'0', b'0', '', b'0', '', b'0', b'0', 1, b'0', '', b'0', 12, '2024-04-10 12:55:22'),
(278, 8, 'combolistaid', 'combolistaid', b'1', 9, 100, 0, 'combolistaid', 0, b'0', b'0', '', b'0', '', b'0', b'0', 1, b'0', '', b'0', 12, '2024-04-10 12:55:22'),
(279, 8, 'html', 'html', b'1', 10, 100, 0, 'html', 3, b'0', b'0', ' ', b'0', ' ', b'0', b'0', 1, b'0', ' ', b'0', 12, '2024-04-12 16:58:43'),
(280, 8, 'tienecondicion', 'tienecondicion', b'1', 11, 100, 0, 'tienecondicion', 3, b'0', b'0', ' ', b'0', ' ', b'0', b'0', 1, b'0', ' ', b'0', 12, '2024-04-12 16:59:18'),
(281, 8, 'condicion', 'condicion', b'1', 12, 100, 0, 'condicion', 0, b'0', b'0', '', b'0', '', b'0', b'0', 1, b'0', '', b'0', 12, '2024-04-10 12:55:22'),
(282, 8, 'imagen', 'imagen', b'1', 13, 100, 0, 'imagen', 0, b'0', b'0', '', b'0', '', b'0', b'0', 1, b'0', '', b'0', 12, '2024-04-10 12:55:22'),
(283, 8, 'url_imagen', 'url_imagen', b'1', 14, 100, 0, 'url_imagen', 0, b'0', b'0', '', b'0', '', b'0', b'0', 1, b'0', '', b'0', 12, '2024-04-10 12:55:22'),
(284, 8, 'campoimagen', 'campoimagen', b'1', 15, 100, 0, 'campoimagen', 0, b'0', b'0', '', b'0', '', b'0', b'0', 1, b'0', '', b'0', 12, '2024-04-10 12:55:22'),
(285, 8, 'hiperlink', 'hiperlink', b'1', 16, 100, 0, 'hiperlink', 0, b'0', b'0', '', b'0', '', b'0', b'0', 1, b'0', '', b'0', 12, '2024-04-10 12:55:22'),
(286, 8, 'priority', 'priority', b'1', 17, 100, 0, 'priority', 0, b'0', b'0', '', b'0', '', b'0', b'0', 1, b'0', '', b'0', 12, '2024-04-10 12:55:22'),
(287, 8, 'parametro', 'parametro', b'1', 18, 100, 0, 'parametro', 0, b'0', b'0', '', b'0', '', b'0', b'0', 1, b'0', '', b'0', 12, '2024-04-10 12:55:22'),
(288, 8, 'nombresesion', 'nombresesion', b'1', 19, 100, 0, 'nombresesion', 0, b'0', b'0', '', b'0', '', b'0', b'0', 1, b'0', '', b'0', 12, '2024-04-10 12:55:22'),
(289, 8, 'baja', 'baja', b'1', 20, 100, 0, 'baja', 0, b'0', b'0', '', b'0', '', b'0', b'0', 1, b'0', '', b'0', 12, '2024-04-10 12:55:22'),
(290, 8, 'usuarioid', 'usuarioid', b'1', 21, 100, 0, 'usuarioid', 0, b'0', b'0', '', b'0', '', b'0', b'0', 1, b'0', '', b'0', 12, '2024-04-10 12:55:22'),
(291, 8, 'fecharegistro', 'fecharegistro', b'1', 22, 100, 0, 'fecharegistro', 0, b'0', b'0', '', b'0', '', b'0', b'0', 1, b'0', '', b'0', 12, '2024-04-10 12:55:22'),
(292, 9, 'registroid_h', 'registroid_h', b'0', 0, 100, 0, 'registroid_h', 0, b'0', b'0', ' ', b'0', ' ', b'0', b'0', 1, b'0', ' ', b'0', 12, '2024-04-10 23:28:07'),
(293, 9, 'listaid', 'listaid', b'1', 1, 100, 0, 'listaid', 0, b'0', b'0', '', b'0', '', b'0', b'0', 1, b'0', '', b'0', 12, '2024-04-10 13:34:10'),
(294, 9, 'listads', 'listads', b'1', 2, 100, 0, 'listads', 0, b'0', b'0', '', b'0', '', b'0', b'0', 1, b'0', '', b'0', 12, '2024-04-10 13:34:10'),
(295, 9, 'recordsource', 'recordsource', b'1', 3, 100, 0, 'recordsource', 0, b'0', b'0', '', b'0', '', b'0', b'0', 1, b'0', '', b'0', 12, '2024-04-10 13:34:10'),
(296, 9, 'listafija', 'listafija', b'1', 4, 100, 0, 'listafija', 3, b'0', b'0', ' ', b'0', ' ', b'0', b'0', 1, b'0', ' ', b'0', 12, '2024-04-12 15:12:13'),
(297, 9, 'tipoConsultaid', 'tipoConsultaid', b'1', 5, 100, 0, 'tipoConsultaid', 1, b'0', b'0', ' ', b'0', '  ', b'0', b'0', 1, b'0', ' ', b'0', 12, '2024-04-12 14:53:07'),
(298, 9, 'tipodatovaluemember', 'tipodatovaluemember', b'1', 6, 100, 0, 'tipodatovaluemember', 2, b'0', b'0', ' ', b'0', ' ', b'0', b'0', 1, b'0', ' ', b'0', 12, '2024-04-12 15:08:25'),
(299, 9, 'imagen', 'imagen', b'1', 7, 100, 0, 'imagen', 0, b'0', b'0', '', b'0', '', b'0', b'0', 1, b'0', '', b'0', 12, '2024-04-10 13:34:10'),
(300, 9, 'grupo', 'grupo', b'1', 8, 100, 0, 'grupo', 0, b'0', b'0', '', b'0', '', b'0', b'0', 1, b'0', '', b'0', 12, '2024-04-10 13:34:10'),
(301, 9, 'baja', 'baja', b'0', 9, 100, 0, 'baja', 0, b'0', b'0', ' ', b'0', ' ', b'0', b'0', 1, b'0', ' ', b'0', 12, '2024-04-10 23:28:41'),
(302, 9, 'usuarioid', 'usuarioid', b'1', 10, 100, 0, 'usuarioid', 0, b'0', b'0', '', b'0', '', b'0', b'0', 1, b'0', '', b'0', 12, '2024-04-10 13:34:10'),
(303, 9, 'fecharegistro', 'fecharegistro', b'1', 11, 100, 0, 'fecharegistro', 0, b'0', b'0', '', b'0', '', b'0', b'0', 1, b'0', '', b'0', 12, '2024-04-10 13:34:10'),
(304, 10, 'listaitemid', 'listaitemid', b'1', 0, 100, 0, 'listaitemid', 0, b'0', b'0', '', b'0', '', b'0', b'0', 1, b'0', '', b'0', 12, '2024-04-10 13:37:46'),
(305, 10, 'listaid', 'listaid', b'1', 1, 100, 0, 'listaid', 0, b'0', b'0', '', b'0', '', b'0', b'0', 1, b'0', '', b'0', 12, '2024-04-10 13:37:46'),
(306, 10, 'campoid', 'campoid', b'1', 2, 100, 0, 'campoid', 0, b'0', b'0', '', b'0', '', b'0', b'0', 1, b'0', '', b'0', 12, '2024-04-10 13:37:46'),
(307, 10, 'caption', 'caption', b'1', 3, 100, 0, 'caption', 0, b'0', b'0', '', b'0', '', b'0', b'0', 1, b'0', '', b'0', 12, '2024-04-10 13:37:46'),
(308, 10, 'width', 'width', b'1', 4, 100, 0, 'width', 0, b'0', b'0', '', b'0', '', b'0', b'0', 1, b'0', '', b'0', 12, '2024-04-10 13:37:46'),
(309, 10, 'valuemember', 'valuemember', b'1', 5, 100, 0, 'valuemember', 3, b'0', b'0', ' ', b'0', ' ', b'0', b'0', 1, b'0', ' ', b'0', 12, '2024-04-12 18:09:20'),
(310, 10, 'displaymember', 'displaymember', b'1', 6, 100, 0, 'displaymember', 3, b'0', b'0', ' ', b'0', ' ', b'0', b'0', 1, b'0', ' ', b'0', 12, '2024-04-12 18:10:03'),
(311, 10, 'visible', 'visible', b'1', 7, 100, 0, 'visible', 3, b'0', b'0', ' ', b'0', ' ', b'0', b'0', 1, b'0', ' ', b'0', 12, '2024-04-12 18:10:42'),
(312, 10, 'baja', 'baja', b'1', 8, 100, 0, 'baja', 0, b'0', b'0', '', b'0', '', b'0', b'0', 1, b'0', '', b'0', 12, '2024-04-10 13:37:46'),
(313, 10, 'usuarioid', 'usuarioid', b'1', 9, 100, 0, 'usuarioid', 0, b'0', b'0', '', b'0', '', b'0', b'0', 1, b'0', '', b'0', 12, '2024-04-10 13:37:46'),
(314, 10, 'fecharegistro', 'fecharegistro', b'1', 10, 100, 0, 'fecharegistro', 0, b'0', b'0', '', b'0', '', b'0', b'0', 1, b'0', '', b'0', 12, '2024-04-10 13:37:46'),
(315, 11, 'listaitemid', 'listaitemid', b'1', 0, 100, 0, 'listaitemid', 0, b'0', b'0', '', b'0', '', b'0', b'0', 1, b'0', '', b'0', 12, '2024-04-10 15:02:18'),
(316, 11, 'listaid', 'listaid', b'0', 1, 100, 0, 'listaid', 0, b'0', b'0', ' ', b'0', ' ', b'0', b'0', 1, b'0', ' ', b'0', 12, '2024-04-12 17:37:06'),
(317, 11, 'valuemember', 'valuemember', b'1', 2, 100, 0, 'valuemember', 0, b'0', b'0', '', b'0', '', b'0', b'0', 1, b'0', '', b'0', 12, '2024-04-10 15:02:18'),
(318, 11, 'displaymember', 'displaymember', b'1', 3, 100, 0, 'displaymember', 0, b'0', b'0', '', b'0', '', b'0', b'0', 1, b'0', '', b'0', 12, '2024-04-10 15:02:18'),
(319, 11, 'predeterminado', 'predeterminado', b'1', 4, 100, 0, 'predeterminado', 3, b'0', b'0', ' ', b'0', ' ', b'0', b'0', 1, b'0', ' ', b'0', 12, '2024-04-12 17:41:52'),
(320, 11, 'imagen', 'imagen', b'1', 5, 100, 0, 'imagen', 0, b'0', b'0', '', b'0', '', b'0', b'0', 1, b'0', '', b'0', 12, '2024-04-10 15:02:18'),
(321, 11, 'baja', 'baja', b'0', 6, 100, 0, 'baja', 0, b'0', b'0', ' ', b'0', ' ', b'0', b'0', 1, b'0', ' ', b'0', 12, '2024-04-12 17:45:29'),
(322, 11, 'usuarioid', 'usuarioid', b'0', 7, 100, 0, 'usuarioid', 0, b'0', b'0', ' ', b'0', ' ', b'0', b'0', 1, b'0', ' ', b'0', 12, '2024-04-12 17:45:03'),
(323, 11, 'fecharegistro', 'fecharegistro', b'0', 8, 100, 0, 'fecharegistro', 0, b'0', b'0', ' ', b'0', ' ', b'0', b'0', 1, b'0', ' ', b'0', 12, '2024-04-12 17:43:50'),
(324, NULL, 'PERSONA', NULL, b'1', NULL, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, b'0', 12, '2024-04-11 15:09:15'),
(325, 12, 'menuhorizontalid', 'menuhorizontalid', b'1', 0, 100, 0, 'menuhorizontalid', 0, b'0', b'0', '', b'0', '', b'0', b'0', 1, b'0', '', b'0', 12, '2024-04-14 13:09:57'),
(326, 12, 'nombremenuds', 'nombremenuds', b'1', 1, 100, 0, 'nombremenuds', 0, b'0', b'0', '', b'0', '', b'0', b'0', 1, b'0', '', b'0', 12, '2024-04-14 13:09:58'),
(327, 12, 'nombregeneral', 'nombregeneral', b'1', 2, 100, 0, 'nombregeneral', 0, b'0', b'0', '', b'0', '', b'0', b'0', 1, b'0', '', b'0', 12, '2024-04-14 13:09:58'),
(328, 12, 'imagenurl', 'imagenurl', b'1', 3, 100, 0, 'imagenurl', 0, b'0', b'0', '', b'0', '', b'0', b'0', 1, b'0', '', b'0', 12, '2024-04-14 13:09:58'),
(329, 12, 'formulario', 'tipomenu', b'1', 4, 100, 0, 'tipomenu', 8, b'0', b'0', ' ', b'0', ' ', b'0', b'0', 1, b'0', ' ', b'0', 12, '2024-04-17 12:47:04'),
(330, 12, 'activo', 'activo', b'1', 5, 100, 0, 'activo', 3, b'0', b'0', ' ', b'0', ' ', b'0', b'0', 1, b'0', ' ', b'0', 12, '2024-04-15 17:55:08'),
(331, 12, 'menuprincipal', 'menuprincipal', b'1', 6, 100, 0, 'menuprincipal', 0, b'0', b'0', '', b'0', '', b'0', b'0', 1, b'0', '', b'0', 12, '2024-04-14 13:09:58'),
(332, 12, 'frontend', 'frontend', b'1', 7, 100, 0, 'frontend', 0, b'0', b'0', '', b'0', '', b'0', b'0', 1, b'0', '', b'0', 12, '2024-04-14 13:09:58'),
(333, 12, 'backend', 'backend', b'1', 8, 100, 0, 'backend', 0, b'0', b'0', '', b'0', '', b'0', b'0', 1, b'0', '', b'0', 12, '2024-04-14 13:09:58'),
(334, 12, 'baja', 'baja', b'1', 9, 100, 0, 'baja', 0, b'0', b'0', '', b'0', '', b'0', b'0', 1, b'0', '', b'0', 12, '2024-04-14 13:09:58'),
(335, 12, 'usuarioid', 'usuarioid', b'1', 10, 100, 0, 'usuarioid', 0, b'0', b'0', '', b'0', '', b'0', b'0', 1, b'0', '', b'0', 12, '2024-04-14 13:09:58'),
(336, 12, 'fecharegistro', 'fecharegistro', b'1', 11, 100, 0, 'fecharegistro', 0, b'0', b'0', '', b'0', '', b'0', b'0', 1, b'0', '', b'0', 12, '2024-04-14 13:09:58'),
(337, 13, 'itemmenuid', 'itemmenuid', b'1', 0, 100, 0, 'itemmenuid', 0, b'0', b'0', '', b'0', '', b'0', b'0', 1, b'0', '', b'0', 12, '2024-04-14 13:12:41'),
(338, 13, 'menuid', 'menuid', b'1', 1, 100, 0, 'menuid', 0, b'0', b'0', '', b'0', '', b'0', b'0', 1, b'0', '', b'0', 12, '2024-04-14 13:12:41'),
(339, 13, 'formularioid', 'formularioid', b'1', 2, 100, 0, 'formularioid', 0, b'0', b'0', '', b'0', '', b'0', b'0', 1, b'0', '', b'0', 12, '2024-04-14 13:12:41'),
(340, 13, 'text', 'text', b'1', 3, 100, 0, 'text', 0, b'0', b'0', '', b'0', '', b'0', b'0', 1, b'0', '', b'0', 12, '2024-04-14 13:12:41'),
(341, 13, 'navigateurl', 'navigateurl', b'1', 4, 100, 0, 'navigateurl', 0, b'0', b'0', '', b'0', '', b'0', b'0', 1, b'0', '', b'0', 12, '2024-04-14 13:12:41'),
(342, 13, 'imagen', 'imagen', b'1', 5, 100, 0, 'imagen', 0, b'0', b'0', '', b'0', '', b'0', b'0', 1, b'0', '', b'0', 12, '2024-04-14 13:12:41'),
(343, 13, 'imageurl', 'imageurl', b'1', 6, 100, 0, 'imageurl', 0, b'0', b'0', '', b'0', '', b'0', b'0', 1, b'0', '', b'0', 12, '2024-04-14 13:12:41'),
(344, 13, 'permitegif', 'permitegif', b'1', 7, 100, 0, 'permitegif', 0, b'0', b'0', '', b'0', '', b'0', b'0', 1, b'0', '', b'0', 12, '2024-04-14 13:12:41'),
(345, 13, 'imagengif', 'imagengif', b'1', 8, 100, 0, 'imagengif', 0, b'0', b'0', '', b'0', '', b'0', b'0', 1, b'0', '', b'0', 12, '2024-04-14 13:12:41'),
(346, 13, 'tipofuncion', 'tipofuncion', b'1', 9, 100, 0, 'tipofuncion', 0, b'0', b'0', '', b'0', '', b'0', b'0', 1, b'0', '', b'0', 12, '2024-04-14 13:12:41'),
(347, 13, 'funcionasociadagif', 'funcionasociadagif', b'1', 10, 100, 0, 'funcionasociadagif', 0, b'0', b'0', '', b'0', '', b'0', b'0', 1, b'0', '', b'0', 12, '2024-04-14 13:12:41'),
(348, 13, 'grupo', 'grupo', b'1', 11, 100, 0, 'grupo', 0, b'0', b'0', '', b'0', '', b'0', b'0', 1, b'0', '', b'0', 12, '2024-04-14 13:12:41'),
(349, 13, 'orden', 'orden', b'1', 12, 100, 0, 'orden', 0, b'0', b'0', '', b'0', '', b'0', b'0', 1, b'0', '', b'0', 12, '2024-04-14 13:12:41'),
(350, 13, 'baja', 'baja', b'1', 13, 100, 0, 'baja', 0, b'0', b'0', '', b'0', '', b'0', b'0', 1, b'0', '', b'0', 12, '2024-04-14 13:12:41'),
(351, 13, 'usuarioid', 'usuarioid', b'1', 14, 100, 0, 'usuarioid', 0, b'0', b'0', '', b'0', '', b'0', b'0', 1, b'0', '', b'0', 12, '2024-04-14 13:12:41'),
(352, 13, 'fecharegistro', 'fecharegistro', b'1', 15, 100, 0, 'fecharegistro', 0, b'0', b'0', '', b'0', '', b'0', b'0', 1, b'0', '', b'0', 12, '2024-04-14 13:12:41'),
(353, 15, 'objetoid', 'objetoid', b'1', 0, 100, 0, 'objetoid', 0, b'0', b'0', '', b'0', '', b'0', b'0', 1, b'0', '', b'0', 12, '2024-04-15 22:00:08'),
(354, 15, 'tipoobjetoid', 'tipoobjetoid', b'1', 1, 100, 0, 'tipoobjetoid', 4, b'0', b'0', ' ', b'0', ' ', b'0', b'0', 1, b'0', ' ', b'0', 12, '2024-04-17 17:04:53'),
(355, 15, 'nombreobjetods', 'nombreobjetods', b'1', 2, 100, 0, 'nombreobjetods', 0, b'0', b'0', '', b'0', '', b'0', b'0', 1, b'0', '', b'0', 12, '2024-04-15 22:00:08'),
(356, 15, 'formularioid', 'formularioid', b'1', 3, 100, 0, 'formularioid', 0, b'0', b'0', '', b'0', '', b'0', b'0', 1, b'0', '', b'0', 12, '2024-04-15 22:00:08'),
(357, 15, 'menuid', 'menuid', b'1', 4, 100, 0, 'menuid', 0, b'0', b'0', '', b'0', '', b'0', b'0', 1, b'0', '', b'0', 12, '2024-04-15 22:00:08'),
(358, 15, 'baja', 'baja', b'1', 5, 100, 0, 'baja', 0, b'0', b'0', '', b'0', '', b'0', b'0', 1, b'0', '', b'0', 12, '2024-04-15 22:00:08'),
(359, 15, 'usuarioid', 'usuarioid', b'1', 6, 100, 0, 'usuarioid', 0, b'0', b'0', '', b'0', '', b'0', b'0', 1, b'0', '', b'0', 12, '2024-04-15 22:00:08'),
(360, 15, 'fecharegistro', 'fecharegistro', b'1', 7, 100, 0, 'fecharegistro', 0, b'0', b'0', '', b'0', '', b'0', b'0', 1, b'0', '', b'0', 12, '2024-04-15 22:00:08'),
(361, 16, 'formularioid', 'formularioid', b'1', 0, 100, 0, 'formularioid', 0, b'0', b'0', '', b'0', '', b'0', b'0', 1, b'0', '', b'0', 12, '2024-04-15 22:10:55'),
(362, 16, 'dtsetid', 'dtsetid', b'1', 1, 100, 0, 'dtsetid', 0, b'0', b'0', '', b'0', '', b'0', b'0', 1, b'0', '', b'0', 12, '2024-04-15 22:10:55'),
(363, 16, 'tipoformulario', 'tipoformulario', b'1', 2, 100, 0, 'tipoformulario', 0, b'0', b'0', '', b'0', '', b'0', b'0', 1, b'0', '', b'0', 12, '2024-04-15 22:10:55'),
(364, 16, 'nameformulario', 'nameformulario', b'1', 3, 100, 0, 'nameformulario', 0, b'0', b'0', '', b'0', '', b'0', b'0', 1, b'0', '', b'0', 12, '2024-04-15 22:10:55'),
(365, 16, 'alto', 'alto', b'1', 4, 100, 0, 'alto', 0, b'0', b'0', '', b'0', '', b'0', b'0', 1, b'0', '', b'0', 12, '2024-04-15 22:10:55'),
(366, 16, 'ancho', 'ancho', b'1', 5, 100, 0, 'ancho', 0, b'0', b'0', '', b'0', '', b'0', b'0', 1, b'0', '', b'0', 12, '2024-04-15 22:10:55'),
(367, 16, 'unidad_alto', 'unidad_alto', b'1', 6, 100, 0, 'unidad_alto', 0, b'0', b'0', ' ', b'0', ' ', b'0', b'0', 1, b'0', ' ', b'0', 12, '2024-04-16 11:54:09'),
(368, 16, 'unidad_ancho', 'unidad_ancho', b'1', 7, 100, 0, 'unidad_ancho', 0, b'0', b'0', '', b'0', '', b'0', b'0', 1, b'0', '', b'0', 12, '2024-04-15 22:10:55'),
(369, 16, 'reporteid', 'reporteid', b'1', 8, 100, 0, 'reporteid', 0, b'0', b'0', '', b'0', '', b'0', b'0', 1, b'0', '', b'0', 12, '2024-04-15 22:10:55'),
(370, 16, 'busquedaid', 'busquedaid', b'1', 9, 100, 0, 'busquedaid', 0, b'0', b'0', '', b'0', '', b'0', b'0', 1, b'0', '', b'0', 12, '2024-04-15 22:10:55'),
(371, 16, 'baja', 'baja', b'1', 10, 100, 0, 'baja', 0, b'0', b'0', '', b'0', '', b'0', b'0', 1, b'0', '', b'0', 12, '2024-04-15 22:10:55'),
(372, 16, 'usuarioid', 'usuarioid', b'1', 11, 100, 0, 'usuarioid', 0, b'0', b'0', '', b'0', '', b'0', b'0', 1, b'0', '', b'0', 12, '2024-04-15 22:10:55'),
(373, 16, 'fecharegistro', 'fecharegistro', b'1', 12, 100, 0, 'fecharegistro', 0, b'0', b'0', '', b'0', '', b'0', b'0', 1, b'0', '', b'0', 12, '2024-04-15 22:10:55'),
(374, 17, 'rolid', 'rolid', b'1', 0, 100, 0, 'rolid', 0, b'0', b'0', '', b'0', '', b'0', b'0', 1, b'0', '', b'0', 12, '2024-04-16 12:51:16'),
(375, 17, 'rolds', 'rolds', b'1', 1, 100, 0, 'rolds', 0, b'0', b'0', '', b'0', '', b'0', b'0', 1, b'0', '', b'0', 12, '2024-04-16 12:51:16'),
(376, 17, 'activo', 'activo', b'1', 2, 100, 0, 'activo', 3, b'0', b'0', ' ', b'0', ' ', b'0', b'0', 1, b'0', ' ', b'0', 12, '2024-04-16 13:22:03'),
(377, 17, 'baja', 'baja', b'0', 3, 100, 0, 'baja', 0, b'0', b'0', ' ', b'0', ' ', b'0', b'0', 1, b'0', ' ', b'0', 12, '2024-04-16 13:22:36'),
(378, 17, 'usuarioid', 'usuarioid', b'0', 4, 100, 0, 'usuarioid', 0, b'0', b'0', ' ', b'0', ' ', b'0', b'0', 1, b'0', ' ', b'0', 12, '2024-04-16 13:23:09'),
(379, 17, 'fecharegistro', 'fecharegistro', b'0', 5, 100, 0, 'fecharegistro', 0, b'0', b'0', ' ', b'0', ' ', b'0', b'0', 1, b'0', ' ', b'0', 12, '2024-04-16 13:23:25'),
(380, 18, 'permisoid', 'permisoid', b'1', 0, 100, 0, 'permisoid', 0, b'0', b'0', '', b'0', '', b'0', b'0', 1, b'0', '', b'0', 12, '2024-04-16 13:56:35'),
(381, 18, 'objetoid', 'objetoid', b'1', 1, 100, 0, 'objetoid', 5, b'0', b'0', ' ', b'0', ' ', b'0', b'0', 1, b'0', ' ', b'0', 12, '2024-04-16 14:45:58'),
(382, 18, 'rolid', 'rolid', b'1', 2, 100, 0, 'rolid', 6, b'0', b'0', ' ', b'0', ' ', b'0', b'0', 1, b'0', ' ', b'0', 12, '2024-04-16 14:46:29'),
(383, 18, 'accionid', 'accionid', b'1', 3, 100, 0, 'accionid', 7, b'0', b'0', ' ', b'0', ' ', b'0', b'0', 1, b'0', ' ', b'0', 12, '2024-04-16 14:46:53'),
(384, 18, 'activo', 'activo', b'1', 4, 100, 0, 'activo', 3, b'0', b'0', ' ', b'0', ' ', b'0', b'0', 1, b'0', ' ', b'0', 12, '2024-04-16 14:48:36'),
(385, 18, 'baja', 'baja', b'0', 5, 100, 0, 'baja', 0, b'0', b'0', ' ', b'0', ' ', b'0', b'0', 1, b'0', ' ', b'0', 12, '2024-04-16 14:48:59'),
(386, 18, 'usuarioid', 'usuarioid', b'0', 6, 100, 0, 'usuarioid', 0, b'0', b'0', ' ', b'0', ' ', b'0', b'0', 1, b'0', ' ', b'0', 12, '2024-04-16 14:49:26'),
(387, 18, 'fecharegistro', 'fecharegistro', b'0', 7, 100, 0, 'fecharegistro', 0, b'0', b'0', ' ', b'0', ' ', b'0', b'0', 1, b'0', ' ', b'0', 12, '2024-04-16 14:49:44'),
(388, 19, 'asociacionid', 'asociacionid', b'1', 0, 100, 0, 'asociacionid', 0, b'0', b'0', '', b'0', '', b'0', b'0', 1, b'0', '', b'0', 12, '2024-04-16 17:25:45'),
(389, 19, 'personaid', 'personaid', b'0', 1, 100, 0, 'personaid', 0, b'0', b'0', ' ', b'0', ' ', b'0', b'0', 1, b'0', ' ', b'0', 12, '2024-04-22 16:57:35'),
(390, 19, 'rolid', 'rolid', b'1', 2, 100, 0, 'rolid', 6, b'0', b'0', ' ', b'0', ' ', b'0', b'0', 1, b'0', ' ', b'0', 12, '2024-04-22 16:49:14'),
(391, 19, 'baja', 'baja', b'0', 3, 100, 0, 'baja', 0, b'0', b'0', ' ', b'0', ' ', b'0', b'0', 1, b'0', ' ', b'0', 12, '2024-04-22 16:49:32'),
(392, 19, 'usuarioid', 'usuarioid', b'0', 4, 100, 0, 'usuarioid', 0, b'0', b'0', ' ', b'0', ' ', b'0', b'0', 1, b'0', ' ', b'0', 12, '2024-04-22 16:49:53'),
(393, 19, 'fecharegistro', 'fecharegistro', b'0', 5, 100, 0, 'fecharegistro', 0, b'0', b'0', '  ', b'0', '  ', b'0', b'0', 1, b'0', '  ', b'0', 12, '2024-04-22 16:56:11'),
(394, 20, 'sectorid', 'sectorid', b'1', 0, 100, 0, 'sectorid', 0, b'0', b'0', '', b'0', '', b'0', b'0', 1, b'0', '', b'0', 12, '2024-04-21 12:58:17'),
(395, 20, 'sectords', 'sectords', b'1', 1, 100, 0, 'sectords', 0, b'0', b'0', '', b'0', '', b'0', b'0', 1, b'0', '', b'0', 12, '2024-04-21 12:58:17'),
(396, 20, 'tipo sector', 'tiposectorid', b'1', 2, 100, 0, 'tiposectorid', 9, b'0', b'0', ' ', b'0', ' ', b'0', b'0', 1, b'0', ' ', b'0', 12, '2024-04-21 13:49:43'),
(397, 20, 'activo', 'activo', b'1', 3, 100, 0, 'activo', 3, b'0', b'0', ' ', b'0', ' ', b'0', b'0', 1, b'0', ' ', b'0', 12, '2024-04-21 13:51:45'),
(398, 20, 'baja', 'baja', b'0', 4, 100, 0, 'baja', 0, b'0', b'0', ' ', b'0', ' ', b'0', b'0', 1, b'0', ' ', b'0', 12, '2024-04-21 13:51:03'),
(399, 20, 'usuarioid', 'usuarioid', b'0', 5, 100, 0, 'usuarioid', 0, b'0', b'0', ' ', b'0', ' ', b'0', b'0', 1, b'0', ' ', b'0', 12, '2024-04-21 13:50:11'),
(400, 20, 'fecharegistro', 'fecharegistro', b'0', 6, 100, 0, 'fecharegistro', 0, b'0', b'0', ' ', b'0', ' ', b'0', b'0', 1, b'0', ' ', b'0', 12, '2024-04-21 13:50:31'),
(401, 21, 'perteneceid', 'perteneceid', b'1', 0, 100, 0, 'perteneceid', 0, b'0', b'0', '', b'0', '', b'0', b'0', 1, b'0', '', b'0', 12, '2024-04-21 13:00:10'),
(402, 21, 'personaid', 'personaid', b'0', 1, 100, 0, 'personaid', 0, b'0', b'0', '  ', b'0', ' ', b'0', b'0', 1, b'0', ' ', b'0', 12, '2024-04-22 16:46:44'),
(403, 21, 'sector', 'sectorid', b'1', 2, 100, 0, 'sectorid', 10, b'0', b'0', ' ', b'0', ' ', b'0', b'0', 1, b'0', ' ', b'0', 12, '2024-04-22 17:48:27'),
(404, 21, 'activo', 'activo', b'1', 3, 100, 0, 'activo', 3, b'0', b'0', ' ', b'0', ' ', b'0', b'0', 1, b'0', ' ', b'0', 12, '2024-04-22 16:47:14'),
(405, 21, 'baja', 'baja', b'0', 4, 100, 0, 'baja', 0, b'0', b'0', ' ', b'0', ' ', b'0', b'0', 1, b'0', ' ', b'0', 12, '2024-04-22 16:47:34'),
(406, 21, 'usuarioid', 'usuarioid', b'0', 5, 100, 0, 'usuarioid', 0, b'0', b'0', ' ', b'0', ' ', b'0', b'0', 1, b'0', ' ', b'0', 12, '2024-04-22 16:47:54'),
(407, 21, 'fecharegistro', 'fecharegistro', b'0', 6, 100, 0, 'fecharegistro', 0, b'0', b'0', ' ', b'0', ' ', b'0', b'0', 1, b'0', ' ', b'0', 12, '2024-04-22 16:48:21');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `syrg_formulario_h`
--

CREATE TABLE `syrg_formulario_h` (
  `formularioid` int NOT NULL,
  `dtsetid` int DEFAULT NULL,
  `tipoformulario` int DEFAULT NULL,
  `nameformulario` varchar(250) DEFAULT NULL,
  `alto` int DEFAULT NULL,
  `ancho` int DEFAULT NULL,
  `unidad_alto` int DEFAULT NULL,
  `unidad_ancho` int DEFAULT NULL,
  `reporteid` int DEFAULT NULL,
  `busquedaid` int DEFAULT NULL,
  `baja` bit(1) DEFAULT NULL,
  `usuarioid` int DEFAULT NULL,
  `fecharegistro` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Volcado de datos para la tabla `syrg_formulario_h`
--

INSERT INTO `syrg_formulario_h` (`formularioid`, `dtsetid`, `tipoformulario`, `nameformulario`, `alto`, `ancho`, `unidad_alto`, `unidad_ancho`, `reporteid`, `busquedaid`, `baja`, `usuarioid`, `fecharegistro`) VALUES
(1, 2, 1, 'El Formulario', 123, 231, 2, 1, 0, 0, b'1', 2122, '2024-04-16 12:32:00'),
(2, 0, 2, 'Grilla', 123, 231, 2, 1, 0, 0, b'0', 12, '2024-04-18 01:44:48'),
(3, 0, 2, 'Listas', 0, 0, 1, 1, 0, 0, b'0', 12, '2024-04-18 01:45:00'),
(4, 0, 2, 'Procedimientos', 0, 0, 0, 0, 0, 0, b'0', 12, '2024-04-18 01:45:11'),
(5, 0, 2, 'Menú', 0, 0, 0, 0, 0, 0, b'0', 12, '2024-04-18 01:44:01'),
(6, 0, 2, 'Formulario', 0, 0, 0, 0, 0, 0, b'0', 12, '2024-04-18 01:49:00'),
(7, 0, 2, 'Objeto', 0, 0, 0, 0, 0, 0, b'0', 12, '2024-04-18 01:50:59'),
(8, 0, 2, 'Permisos', 0, 0, 0, 0, 0, 0, b'0', 12, '2024-04-18 01:52:01'),
(9, 0, 2, 'Usuarios', 0, 0, 0, 0, 0, 0, b'0', 12, '2024-04-18 16:33:48'),
(10, 0, 2, 'Personas', 0, 0, 0, 0, 0, 0, b'0', 12, '2024-04-18 16:44:12'),
(11, 0, 2, 'Sector', 0, 0, 0, 0, 0, 0, b'0', 12, '2024-04-21 13:07:36');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `syrg_lista_h`
--

CREATE TABLE `syrg_lista_h` (
  `registroid_h` int NOT NULL,
  `listaid` int NOT NULL,
  `listads` varchar(50) DEFAULT NULL,
  `recordsource` varchar(500) DEFAULT NULL,
  `listafija` bit(1) DEFAULT NULL,
  `tipoconsultaid` int DEFAULT NULL,
  `tipodatovaluemember` int DEFAULT NULL,
  `imagen` bit(1) DEFAULT NULL,
  `grupo` varchar(50) DEFAULT NULL,
  `baja` bit(1) DEFAULT NULL,
  `usuarioid` int DEFAULT NULL,
  `fecharegistro` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Volcado de datos para la tabla `syrg_lista_h`
--

INSERT INTO `syrg_lista_h` (`registroid_h`, `listaid`, `listads`, `recordsource`, `listafija`, `tipoconsultaid`, `tipodatovaluemember`, `imagen`, `grupo`, `baja`, `usuarioid`, `fecharegistro`) VALUES
(1, 1, 'TIPOS DE CONEXION', '   SELECT * FROM tipo_conexion', b'0', 1, 1, b'0', 'ADMINISTRACION', b'0', 12, '2024-04-12 11:56:50'),
(5, 2, 'TIPO DATO', ' ', b'1', 1, 1, b'0', 'ADMINISTRADOR', b'0', 12, '2024-04-10 18:23:38'),
(6, 3, 'BOOLEANO', ' ', b'1', 1, 1, b'0', 'ADMINISTRADOR', b'0', 12, '2024-04-12 18:05:38'),
(7, 4, 'Tipo de Formulario', ' ', b'1', 1, 1, b'0', 'ADMINISTRADOR', b'0', 12, '2024-04-16 10:19:54'),
(8, 5, 'Lista de objetos', 'select * from sema_objeto_h where baja = 0', b'0', 1, 1, b'0', 'SEGURIDAD', b'0', 12, '2024-04-16 14:05:15'),
(9, 6, 'Roles', 'select * from sema_rol_h where baja = 0', b'0', 1, 1, b'0', 'SEGURIDAD', b'0', 12, '2024-04-16 14:30:06'),
(10, 7, 'Acción', ' ', b'1', 1, 1, b'0', 'SEGURIDAD', b'0', 12, '2024-04-16 14:32:15'),
(11, 8, 'Listado de Formularios', 'select * from syrg_formulario_h where baja = 0', b'0', 1, 1, b'0', 'ADMINISTRADOR', b'0', 12, '2024-04-17 12:38:44'),
(12, 9, 'Tipo de Sector', ' ', b'1', 1, 1, b'0', 'REGISTRACION', b'0', 12, '2024-04-21 13:28:01'),
(13, 10, 'Sectores Cargados', 'select * from adma_sector where baja = 0', b'0', 1, 1, b'0', 'REGISTRACION', b'0', 12, '2024-04-22 17:07:43');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `syrg_lista_i0`
--

CREATE TABLE `syrg_lista_i0` (
  `listaitemid` int NOT NULL,
  `listaid` int DEFAULT NULL,
  `campoid` varchar(100) DEFAULT NULL,
  `caption` varchar(50) DEFAULT NULL,
  `width` int DEFAULT NULL,
  `valuemember` bit(1) DEFAULT NULL,
  `displaymember` bit(1) DEFAULT NULL,
  `visible` bit(1) DEFAULT NULL,
  `baja` bit(1) DEFAULT NULL,
  `usuarioid` int DEFAULT NULL,
  `fecharegistro` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Volcado de datos para la tabla `syrg_lista_i0`
--

INSERT INTO `syrg_lista_i0` (`listaitemid`, `listaid`, `campoid`, `caption`, `width`, `valuemember`, `displaymember`, `visible`, `baja`, `usuarioid`, `fecharegistro`) VALUES
(1, 1, 'personaid', 'PERSONA', 100, b'1', b'1', b'1', b'1', 2122, '2024-04-11 16:36:26'),
(2, 1, 'id', 'ID', 100, b'1', b'0', b'1', b'0', 12, '2024-04-11 17:46:36'),
(3, 1, 'conexion', 'Tipo de Conexion', 100, b'0', b'1', b'1', b'0', 12, '2024-04-11 17:47:02'),
(4, 5, 'objetoid', 'objetoid', 100, b'1', b'0', b'0', b'0', 12, '2024-04-16 14:51:37'),
(5, 5, 'nombreobjetods', 'nombreobjetods', 100, b'0', b'1', b'1', b'0', 12, '2024-04-16 14:43:32'),
(6, 6, 'rolid', 'rolid', 100, b'1', b'0', b'0', b'0', 12, '2024-04-16 14:30:52'),
(7, 6, 'rolds', 'rolds', 100, b'0', b'1', b'1', b'0', 12, '2024-04-16 14:31:06'),
(8, 8, 'formularioid', 'formularioid', 100, b'1', b'0', b'0', b'0', 12, '2024-04-17 12:39:51'),
(9, 8, 'nameformulario', 'nameformulario', 100, b'0', b'1', b'1', b'0', 12, '2024-04-17 12:40:21'),
(10, 10, 'sectorid', 'sectorid', 100, b'1', b'0', b'0', b'0', 12, '2024-04-22 17:08:16'),
(11, 10, 'sectords', 'sectords', 100, b'0', b'1', b'1', b'0', 12, '2024-04-22 17:08:34');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `syrg_lista_i1`
--

CREATE TABLE `syrg_lista_i1` (
  `listaitemid` int NOT NULL,
  `listaid` int DEFAULT NULL,
  `valuemember` varchar(500) DEFAULT NULL,
  `displaymember` varchar(50) DEFAULT NULL,
  `predeterminado` bit(1) DEFAULT NULL,
  `imagen` varchar(500) DEFAULT NULL,
  `baja` bit(1) DEFAULT NULL,
  `usuarioid` int DEFAULT NULL,
  `fecharegistro` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Volcado de datos para la tabla `syrg_lista_i1`
--

INSERT INTO `syrg_lista_i1` (`listaitemid`, `listaid`, `valuemember`, `displaymember`, `predeterminado`, `imagen`, `baja`, `usuarioid`, `fecharegistro`) VALUES
(1, 2, '1', 'Int', b'1', 'ingrese imagen', b'0', 12, '2024-04-12 18:03:50'),
(2, 2, '2', 'String', b'0', 'ingrese imagen', b'0', 12, '2024-04-12 18:04:02'),
(3, 3, '0', 'NO', b'1', '0', b'1', 2122, '2024-04-12 17:51:56'),
(4, 3, '1', 'SI', b'0', '0', b'1', 2122, '2024-04-12 17:52:22'),
(5, 3, '0', 'NO', b'1', 'ingresamos imagen', b'0', 12, '2024-04-12 17:51:31'),
(6, 3, '1', 'SI', b'0', 'ingresamos imagen', b'0', 12, '2024-04-12 17:52:11'),
(7, 4, '1', 'Menú Principal', b'0', '  ', b'0', 12, '2024-04-17 16:58:44'),
(8, 4, '2', 'Sub Menú', b'0', ' ', b'0', 12, '2024-04-17 16:59:28'),
(9, 7, '1', 'Abrir', b'1', ' ', b'0', 12, '2024-04-16 14:32:46'),
(10, 7, '2', 'Nuevo', b'0', ' ', b'0', 12, '2024-04-16 14:33:01'),
(11, 7, '3', 'Editar', b'0', ' ', b'0', 12, '2024-04-16 14:33:16'),
(12, 7, '4', 'Borrar', b'0', ' ', b'0', 12, '2024-04-16 14:33:30'),
(13, 4, '3', 'Controles de Grilla', b'0', ' ', b'0', 12, '2024-04-17 16:59:50'),
(14, 9, '1', 'EJECUTIVO', b'1', ' ', b'0', 12, '2024-04-23 14:08:36'),
(15, 9, '2', 'TRIBUNAL DE CUENTAS', b'0', ' ', b'0', 12, '2024-04-23 14:08:58'),
(16, 9, '3', 'CONCEJO DELIBERANTE', b'0', ' ', b'0', 12, '2024-04-23 14:09:27');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_member`
--

CREATE TABLE `tbl_member` (
  `id` int NOT NULL,
  `username` varchar(255) NOT NULL,
  `name` varchar(30) NOT NULL,
  `password` varchar(200) NOT NULL,
  `create_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tbl_member`
--

INSERT INTO `tbl_member` (`id`, `username`, `name`, `password`, `create_at`) VALUES
(1, 'matute', 'EL PIPITO ADMINISTRADOR', '$2y$10$Bb.cExfy0508op908H2j2.n/O7VSdAWVHrNpn4GPyW8UZa1j3I6be', '2024-03-16 22:22:04'),
(2, 'user', 'USUARIO', '$2y$10$NQpirEAPx4Hl0880pIy6a.SIjQsbVw0zp/ohIudxq3i.HytDPZ5aW', '2024-04-17 17:53:21'),
(7, 'martu', 'MARTINA ALONSO', '$2y$10$fS91LwvTqUhC8bNQO5Ff1enig6Wor9Z3eKvhfpgdvW5BjJxS1NiQ.', '2024-04-22 17:57:50'),
(8, 'valentito', 'VALENTIN ALONSO', '$2y$10$4lIArbkmYiqur5KxgO9FoOM7fTq6BisDyeBussqmQDTsXX1SiYEdC', '2024-03-14 12:20:06'),
(9, 'euge', 'MARIA', '$2y$10$wb3.fd7HVGaVkF1LOpufh.ymir674M8eLaPK.qJfnOVge6iTidBlG', '2024-04-22 17:59:02'),
(10, 'juliancito', 'JULIAN', '$2y$10$AyZJNloOUDFPtPiXTsjCGuwjeef930zqncRpymipORBx4.N7LmP6O', '2024-03-15 10:54:46'),
(11, 'martin.dario.alonso@gmail.com', 'MARTIN DARIO ALONSO', '$2y$10$PPVFdx/msE3Kp753m5TNr.dhYVO4ugVR5iYyQZbEFiVhEZ3uGllIa', '2024-03-15 18:00:04'),
(12, 'choto', 'el chotazo', '$2y$10$fvKMZSjl7jt379N1fm4OtOYYf7SJqgPSGHq4jH56FcTBLFnLOcy4W', '2024-03-22 13:16:57'),
(13, 'zambranita', 'LUIS ALBERTO ZAMBRANA', '$2y$10$30AiUr8BAjtDQEvX7c737uuBvxir/l3WbC0GAlSqWi9HpPMDv10bq', '2024-04-23 12:24:48');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_conexion`
--

CREATE TABLE `tipo_conexion` (
  `id` int NOT NULL,
  `conexion` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Volcado de datos para la tabla `tipo_conexion`
--

INSERT INTO `tipo_conexion` (`id`, `conexion`) VALUES
(1, 'MySQL'),
(2, 'Oracle'),
(3, 'SqlServer');

-- --------------------------------------------------------

--
-- Estructura Stand-in para la vista `v_Sy_Tablas`
-- (Véase abajo para la vista actual)
--
CREATE TABLE `v_Sy_Tablas` (
`TablaId` varchar(64)
,`Posicion` int unsigned
,`CampoId` varchar(64)
,`Tipo` longtext
,`Longitud` bigint
,`DecPrecision` bigint unsigned
,`DecEscala` bigint unsigned
,`Identidad` int
);

-- --------------------------------------------------------

--
-- Estructura para la vista `v_Sy_Tablas`
--
DROP TABLE IF EXISTS `v_Sy_Tablas`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`%` SQL SECURITY DEFINER VIEW `v_Sy_Tablas`  AS SELECT `information_schema`.`cols`.`TABLE_NAME` AS `TablaId`, `information_schema`.`cols`.`ORDINAL_POSITION` AS `Posicion`, `information_schema`.`cols`.`COLUMN_NAME` AS `CampoId`, `information_schema`.`cols`.`DATA_TYPE` AS `Tipo`, `information_schema`.`cols`.`CHARACTER_MAXIMUM_LENGTH` AS `Longitud`, `information_schema`.`cols`.`NUMERIC_PRECISION` AS `DecPrecision`, `information_schema`.`cols`.`NUMERIC_SCALE` AS `DecEscala`, (case `information_schema`.`cols`.`COLUMN_KEY` when 'PRI' then 1 else 0 end) AS `Identidad` FROM `information_schema`.`COLUMNS` AS `cols` ORDER BY `information_schema`.`cols`.`TABLE_NAME` ASC, `information_schema`.`cols`.`ORDINAL_POSITION` ASC ;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `adma_menu_h`
--
ALTER TABLE `adma_menu_h`
  ADD PRIMARY KEY (`menuhorizontalid`);

--
-- Indices de la tabla `adma_menu_i0`
--
ALTER TABLE `adma_menu_i0`
  ADD PRIMARY KEY (`itemmenuid`);

--
-- Indices de la tabla `adma_persona`
--
ALTER TABLE `adma_persona`
  ADD PRIMARY KEY (`personaid`);

--
-- Indices de la tabla `adma_persona_i0`
--
ALTER TABLE `adma_persona_i0`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `adma_sector`
--
ALTER TABLE `adma_sector`
  ADD PRIMARY KEY (`sectorid`);

--
-- Indices de la tabla `prueba`
--
ALTER TABLE `prueba`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `sema_objeto_h`
--
ALTER TABLE `sema_objeto_h`
  ADD PRIMARY KEY (`objetoid`);

--
-- Indices de la tabla `sema_rol_h`
--
ALTER TABLE `sema_rol_h`
  ADD PRIMARY KEY (`rolid`);

--
-- Indices de la tabla `sema_usuario_i0`
--
ALTER TABLE `sema_usuario_i0`
  ADD PRIMARY KEY (`asociacionid`);

--
-- Indices de la tabla `sema_usuario_i1`
--
ALTER TABLE `sema_usuario_i1`
  ADD PRIMARY KEY (`perteneceid`);

--
-- Indices de la tabla `serg_permisos_h`
--
ALTER TABLE `serg_permisos_h`
  ADD PRIMARY KEY (`permisoid`);

--
-- Indices de la tabla `syma_grilla_h`
--
ALTER TABLE `syma_grilla_h`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `syma_grilla_i0`
--
ALTER TABLE `syma_grilla_i0`
  ADD PRIMARY KEY (`itemid`);

--
-- Indices de la tabla `syrg_formulario_h`
--
ALTER TABLE `syrg_formulario_h`
  ADD PRIMARY KEY (`formularioid`);

--
-- Indices de la tabla `syrg_lista_h`
--
ALTER TABLE `syrg_lista_h`
  ADD PRIMARY KEY (`registroid_h`);

--
-- Indices de la tabla `syrg_lista_i0`
--
ALTER TABLE `syrg_lista_i0`
  ADD PRIMARY KEY (`listaitemid`);

--
-- Indices de la tabla `syrg_lista_i1`
--
ALTER TABLE `syrg_lista_i1`
  ADD PRIMARY KEY (`listaitemid`);

--
-- Indices de la tabla `tbl_member`
--
ALTER TABLE `tbl_member`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `tipo_conexion`
--
ALTER TABLE `tipo_conexion`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `adma_menu_h`
--
ALTER TABLE `adma_menu_h`
  MODIFY `menuhorizontalid` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `adma_menu_i0`
--
ALTER TABLE `adma_menu_i0`
  MODIFY `itemmenuid` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT de la tabla `adma_persona`
--
ALTER TABLE `adma_persona`
  MODIFY `personaid` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=106;

--
-- AUTO_INCREMENT de la tabla `adma_persona_i0`
--
ALTER TABLE `adma_persona_i0`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de la tabla `adma_sector`
--
ALTER TABLE `adma_sector`
  MODIFY `sectorid` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de la tabla `prueba`
--
ALTER TABLE `prueba`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `sema_objeto_h`
--
ALTER TABLE `sema_objeto_h`
  MODIFY `objetoid` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT de la tabla `sema_rol_h`
--
ALTER TABLE `sema_rol_h`
  MODIFY `rolid` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `sema_usuario_i0`
--
ALTER TABLE `sema_usuario_i0`
  MODIFY `asociacionid` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `sema_usuario_i1`
--
ALTER TABLE `sema_usuario_i1`
  MODIFY `perteneceid` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `serg_permisos_h`
--
ALTER TABLE `serg_permisos_h`
  MODIFY `permisoid` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT de la tabla `syma_grilla_h`
--
ALTER TABLE `syma_grilla_h`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT de la tabla `syma_grilla_i0`
--
ALTER TABLE `syma_grilla_i0`
  MODIFY `itemid` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=408;

--
-- AUTO_INCREMENT de la tabla `syrg_formulario_h`
--
ALTER TABLE `syrg_formulario_h`
  MODIFY `formularioid` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT de la tabla `syrg_lista_h`
--
ALTER TABLE `syrg_lista_h`
  MODIFY `registroid_h` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT de la tabla `syrg_lista_i0`
--
ALTER TABLE `syrg_lista_i0`
  MODIFY `listaitemid` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT de la tabla `syrg_lista_i1`
--
ALTER TABLE `syrg_lista_i1`
  MODIFY `listaitemid` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT de la tabla `tbl_member`
--
ALTER TABLE `tbl_member`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT de la tabla `tipo_conexion`
--
ALTER TABLE `tipo_conexion`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
