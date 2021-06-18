# Niñeras proyecto inicial - Backend

Desarrollo del proyecto planteado en el canal de:

[Twitch](https://www.twitch.tv/ez_ctrl_z)

[YouTube](https://www.youtube.com/channel/UCNpnI12_Uq_aK1jqdTb2HZA)

[Discord](https://discord.gg/8rPf5Pzca9)

## Uso

### Requisitos

- Tener instalado [Xampp](https://www.apachefriends.org/), y ejecutar apache junto con mysql/mariadb.

### Pasos iniciales

- Crear la base de datos
- Ejecutar el sql inicial para la creación de las tablas que se encuentra en el archivo "[sql/create.sql](./sql/create.sql)"
- Configurar las variables de entorno sugeridas en el archivo "[.env.basic](./.env.basic)" y remplazar por los valores adecuados

### Pruebas del api

Puede encontrar ejemplos de requests en el archivo "[docs/requests.http](./docs/requests.http)", los cuales los puede ejecutar con un cliente rest como [Postman](https://www.postman.com/).

Si esta utilizando Visual Studio Code como editor, puede instalar la extesión [REST Client](https://marketplace.visualstudio.com/items?itemName=humao.rest-client), desde la cual puede ejecutar los requests directamente desde el mismo archivo.

## Licencia

[MIT](https://choosealicense.com/licenses/mit/)