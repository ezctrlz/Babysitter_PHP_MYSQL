# Diccionario de datos
## Entidades
* ***Usuario***: Son todas aquellas personas que pueden ingresar a la plataforma por medio del login.
* ***Admin***: Son todos los <u>usuarios</u> que pueden administrar los datos de otros usuarios, puede ver los pagos hechos entre otros usuarios, puede ver los contratos realizados.
* ***Niñer@***: Son todos los <u>usuarios</u> que pueden poner ofrecer sus servicios añadiendo su experiencia y habilidades, tabién pueden ser contratados y ver sus pagos.
*  ***Cliente***: Son todos los <u>usuarios</u> que pueden contratar los servicios de los usuarios tipo <u>Niñer@</u> y buscarlos en una lista y valorarlos según su concepto.
## Relaciones
* ***Establece***: Un usuario tipo <u>Niñer@</u> establece su horario para que el sistema pueda determinar si se encuentra disponible o no.
* ***Publica***: Un usuario tipo <u>Niñer@</u> publica una descripción acerca de su trabajo y el valor de sus servicios para mostrarlos a los usuarios de tipo <u>Cliente</u> y a otros de su mismo tipo.
* ***Contrata***: Un usuario tipo <u>Cliente</u> contrata a un usuario tipo <u>Niñer@</u>.
* ***Paga***: Un usuario tipo <u>Cliente</u> paga el valor total o parcial de los servicios contratados de un usuario tipo <u>Niñer@</u>.
* ***Termina***: Un usuario tipo <u>Niñer@</u> termina un contrato al culminar sus servicios.
