# Diccionario de datos
## Entidades
* ***Usuario***:
    * <u>Descripción:</u> Son todas aquellas personas que pueden ingresar a la plataforma por medio del login.
    * <u>Sinónimos:</u> No aplica.
* ***Admin***:
    * <u>Descripción:</u> Son todos los <u>usuarios</u> que pueden administrar los datos de otros usuarios, puede ver los pagos hechos entre otros usuarios, puede ver los contratos realizados.
    * <u>Sinónimos:</u> Desarrollador, dueño de la plataforma, gerente, el de las lucas.
* ***Niñer@***:
    * <u>Descripción:</u> Son todos los <u>usuarios</u> que pueden ofrecer sus servicios añadiendo una descripción y un valor por hora de estos, además de un horario el cual determinará si está disponible o no, tabién pueden ser contratados y ver sus pagos.
    * <u>Sinónimos:</u> Cuidadoras, Servidoras.
*  ***Cliente***:
    * <u>Descripción:</u> Son todos los <u>usuarios</u> que pueden contratar los servicios de los usuarios tipo <u>Niñer@</u> y buscarlos en una lista y valorarlos según su concepto.
    * <u>Sinónimos:</u> Padre de familia, Madre de familia, miembro de la familia, representante legal.
* ***Horario***:
    * <u>Descripción:</u> Son las horas disponibles de un usuario tipo <u>Niñer@</u> en un día de la semana.
    * <u>Sinónimos:</u> No aplica.
* ***Contrato***:
    * <u>Descripción:</u> Son los servicios contratados de un usuario tipo <u>Cliente</u> a un usuario tipo <u>Niñer@</u>.
    * <u>Sinónimos:</u> Trabajo, servicio.
* ***Pago***:
    * <u>Descripción:</u> Son los pagos a un <u>Contrato</u> realizados por un usuario tipo <u>Cliente</u>.
    * <u>Sinónimos:</u> Transferencia, abono.
## Relaciones
* ***Establece***:
    * <u>Descripción:</u> Un usuario tipo <u>Niñer@</u> establece el horario de un día de la semana.
    * <u>Restricciones:</u> Solo puede tener un horario por cada día.
* ***Accede***:
    * <u>Descripción:</u> Un usuario tipo <u>Cliente</u> accede a un <u>Contrato</u> con un usuario tipo <u>Niñer@</u>.
    * <u>Restricciones:</u> Sin restricciones.
* ***Asignado***:
    * <u>Descripción:</u> Un usuario tipo <u>Niñer@</u> es asignado a un <u>Contrato</u>.
    * <u>Restricciones:</u> Sin restricciones.
* ***Realiza***:
    * <u>Descripción:</u> Un usuario tipo <u>Cliente</u> realiza un <u>Pago</u> por el valor total o parcial de los servicios de un <u>Contrato</u> con un usuario tipo <u>Niñer@</u>.
    * <u>Restricciones:</u> El contrato no inicia hasta que el pago sea completado.
* ***Tiene***:
    * <u>Descripción:</u> Un <u>Contrato</u> tiene <u>Pagos</u> realizados por un usuario tipo <u>Cliente</u>.
    * <u>Restricciones:</u> Sin restricciones.
* ***Termina***:
    * <u>Descripción:</u> Un usuario tipo <u>Niñer@</u> termina un <u>Contrato</u> al culminar sus servicios.
    * <u>Restricciones:</u> Sin restricciones.
* ***Califica***:
    * <u>Descripción:</u> Un usuario tipo <u>Cliente</u> califica el <u>Contrato</u> terminado por un usuario tipo <u>Niñer@</u>.
    * <u>Restricciones:</u> Solo puede calificar un <u>Contrato</u> a la vez.
