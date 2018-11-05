/* Designed by Zeliha Yıldırım, Semra Erpolat Taşabat in 2018 */
/** To contact us: zlhyldrm@gmail.com **/
/**To create these tables, copy the script and run them on phpMyAdmin site.


/** The set of alternatives **/

CREATE TABLE `Talternatives` (
 `id` int(10) unsigned NOT NULL DEFAULT '0',
 `cGrAlt` varchar(50) CHARACTER SET latin5 NOT NULL,
 `cAlt` varchar(255) CHARACTER SET latin5 NOT NULL,
 `cAltAbbre` varchar(30) CHARACTER SET latin5 NOT NULL,
 `cAltExpl` varchar(1024) CHARACTER SET latin5 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1


/** The set of attributes **/


CREATE TABLE `Tattributes` (
 `id` int(10) unsigned NOT NULL DEFAULT '0',
 `cAtt` varchar(255) CHARACTER SET latin5 NOT NULL,
 `cAttAbbre` varchar(100) CHARACTER SET latin5 NOT NULL,
 PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=101 DEFAULT CHARSET=latin1


/* The values of the attributes */

CREATE TABLE `Tvalues` (
 `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
 `AltId` int(11) NOT NULL,
 `AttId` int(11) NOT NULL,
 `value` varchar(100) CHARACTER SET latin5 NOT NULL,
 PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=466 DEFAULT CHARSET=latin1

