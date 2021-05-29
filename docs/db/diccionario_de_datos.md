# Diccionario de datos
## Entidades
* ***Usuario***: Son todas aquellas personas que pueden ingresar a la plataforma por medio del login.
* ***Admin***: Son todos los <u>usuarios</u> que pueden administrar los datos de otros usuarios, puede ver los pagos hechos entre otros usuarios, puede ver los contratos realizados.
* ***Niñer@***: Son todos los <u>usuarios</u> que pueden ofrecer sus servicios añadiendo una descripción y un valor de estos, además de un horario el cual determinará si está disponible o no, tabién pueden ser contratados y ver sus pagos.
*  ***Cliente***: Son todos los <u>usuarios</u> que pueden contratar los servicios de los usuarios tipo <u>Niñer@</u> y buscarlos en una lista y valorarlos según su concepto.
## Relaciones
* ***Establece***: 
    * <u>Descripción:</u> Un usuario tipo <u>Niñer@</u> establece el horario de un día de la semana.
    * <u>Restricciones:</u> Solo puede tener un horario por cada día.
* ***Contrata***: 
    * <u>Descripción:</u> Un usuario tipo <u>Cliente</u> contrata a un usuario tipo <u>Niñer@</u>.
    * <u>Restricciones:</u> Sin restricciones.
* ***Paga***: 
    * <u>Descripción:</u> Un usuario tipo <u>Cliente</u> paga el valor total o parcial de los servicios contratados de un usuario tipo <u>Niñer@</u>.
    * <u>Restricciones:</u> Sin restricciones.
* ***Termina***: 
    * <u>Descripción:</u> Un usuario tipo <u>Niñer@</u> termina un contrato al culminar sus servicios.
    * <u>Restricciones:</u> Sin restricciones.
