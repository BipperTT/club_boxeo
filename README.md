<div align="center">
  <img src= "https://github.com/BipperTT/club_boxeo/assets/153605976/4dbb1c70-45f4-4b1a-94a3-276aa8f77dc7" alt= "Sogache">
</div>

<div align="center">    
    <img src= https://img.shields.io/badge/mysql-4479A1.svg?style=for-the-badge&logo=mysql&logoColor=white>
    <img src= https://img.shields.io/badge/php-%23777BB4.svg?style=for-the-badge&logo=php&logoColor=white>
    <img src= https://img.shields.io/badge/html5-%23E34F26.svg?style=for-the-badge&logo=html5&logoColor=white>
    <img src= https://img.shields.io/badge/css3-%231572B6.svg?style=for-the-badge&logo=css3&logoColor=white>
    <img src= https://img.shields.io/badge/javascript-%23323330.svg?style=for-the-badge&logo=javascript&logoColor=%23F7DF1E>
</div>

<div align="center">
    <img src= https://img.shields.io/github/repo-size/BipperTT/club_boxeo>
    <img src= https://img.shields.io/github/commit-activity/t/BipperTT/club_boxeo?color=green>
    <img src= https://img.shields.io/github/last-commit/BipperTT/club_boxeo/main?color=green>
    <img src= https://img.shields.io/badge/contributors-3-yellow>
</div>

Bienvenido al repositorio de la página web del gimnasio de boxeo Sogache. Este proyecto está diseñado para ofrecer a los usuarios la posibilidad de interactuar con el gimnasio a través de diversas funcionalidades, tales como ver información, presentar dudas, registrarse y realizar compras. Además, los entrenadores tienen herramientas para gestionar usuarios, sus pagos y el resultado de los combates.


## Índice

* [Descripción del proyecto](#descripción-del-proyecto)
* [Tecnologías Utilizadas](#tecnologías-utilizadas)
* [Estructura del proyecto](#estructura-del-proyecto)
* [Índice de Archivos](#índice-de-archivos)
* [UML de Casos de Uso](#uml-de-casos-de-uso)
* [Agradecimientos](#agradecimientos)
* [Diagrama de Arquitectura](#diagrama-de-arquitectura)
* [Modelo Entidad Relación (antiguo)](#modelo-entidad-relación-antiguo)
* [Diagrama de Clases (antiguo)](#diagrama-de-clases-antiguo)
* [Agradecimientos](#agradecimientos)

## Descripción del Proyecto

### Funcionalidades para Usuarios

La página web del gimnasio de boxeo Sogache proporciona una plataforma donde los usuarios pueden:

- **Navegar por la página web:** Explorar toda la información disponible sobre el gimnasio, los entrenadores, horarios y más.
- **Presentar dudas:** Los usuarios pueden enviar consultas y dudas a través de un formulario de contacto.
- **Crear una cuenta:** Los nuevos usuarios pueden registrarse en la plataforma.
- **Iniciar sesión:** Los usuarios ya registrados pueden iniciar sesión con su cuenta.
- **Comprar una tarifa:** Los usuarios ya registrados pueden realizar compras de tarifas de entrenamiento disponibles.

### Funcionalidades para Entrenadores

Los entrenadores tienen acceso a diferentes funcionalidades:

- **Gestión de usuarios:** Crear nuevos usuarios, modificar información existente y eliminar usuarios.
- **Gestión de consultas:** Ver y eliminar las consultas enviadas por los usuarios.
- **Gestión de resultados:** Editar los resultados de los combates de los usuarios.

## Tecnologías Utilizadas

El proyecto utiliza las siguientes tecnologías:

- **API REST:** Para la comunicación entre el frontend y el backend.
- **PHP:** Para la lógica del servidor y la gestión de la base de datos.
- **HTML:** Para la estructura de las páginas web.
- **CSS:** Para el estilo y diseño de la página web.
- **JavaScript:** Para la interactividad y funcionalidades dinámicas en el frontend.

## Estructura del Proyecto

La estructura del proyecto es la siguiente:

```bash
└── club_boxeo
    ├── .vscode
    │   └── settings.json
    ├── COMPROMISOS EQUIPS.docx
    ├── api
    │   ├── ClaseGrupal.php
    │   ├── bajaUsuario.php
    │   ├── connexio.php
    │   ├── gestioUsuaris.php
    │   ├── guardar_mensaje.php
    │   ├── logOut.php
    │   ├── login.proc.php
    │   ├── procesarPago.php
    │   ├── signUp.proc.php
    │   └── verResultadosTorneo.php
    └── docs
        ├── altaUsuario.php
        ├── añadirResultado.php
        ├── bajaUsuario.php
        ├── confirmacionPago.php
        ├── confirmacionReserva.php
        ├── eliminarComentario.php
        ├── entrenadores.php
        ├── entrenoGrupal.php
        ├── formularioConfirmacion.php
        ├── formularioReserva.php
        ├── formulario_contacto.php
        ├── gestionUsuaris.php
        ├── horarios.php
        ├── img
        │   ├── Boxeo-en-Barcelona.png
        │   ├── Jerito.png
        │   ├── Karla.png
        │   ├── SOGACHE-22-5-2024.png
        │   ├── Sando.png
        │   ├── Xavi.png
        │   ├── antonioBarrul.jpg
        │   ├── box.png
        │   ├── boxboxnegro.png
        │   ├── boxeador_rojo.png
        │   ├── boxnegro.png
        │   ├── cortedepeso.png
        │   ├── cuatrocomidas.png
        │   ├── facebook.png
        │   ├── fondo_index.png
        │   ├── gimnasio.jpeg
        │   ├── horario.png
        │   ├── ico.jpeg
        │   ├── ico_nbg.png
        │   ├── ico_nbg_black.png
        │   ├── instagram.png
        │   ├── jerojerito.png
        │   ├── manuelAlcantara.jpg
        │   ├── pastor.jpeg
        │   ├── postentreno.jpg
        │   ├── preentreno.jpg
        │   ├── sobrinokiko.png
        │   ├── title.png
        │   ├── twitter.png
        │   └── xavi_moya.png
        ├── includes
        │   ├── footer.php
        │   └── nav.php
        ├── index.php
        ├── iniciarSesion.php
        ├── js
        │   └── scripts.js
        ├── modificarResultado.php
        ├── modificarUsuario.php
        ├── noticias.php
        ├── nutricional.php
        ├── registro.php
        ├── resultadosTorneo.php
        ├── sobreNosotros.php
        ├── styles
        │   ├── altaUsuario.css
        │   ├── comun.css
        │   ├── confirmacionPago.css
        │   ├── contacto.css
        │   ├── eliminarComentario.css
        │   ├── entrenadores.css
        │   ├── entrenoPrivado.css
        │   ├── gestionUsuaris.css
        │   ├── horarios.css
        │   ├── index.css
        │   ├── iniciarSesion.css
        │   ├── modificarUsuario.css
        │   ├── noticia.css
        │   ├── registro.css
        │   ├── resultados.css
        │   ├── sobreNosotros.css
        │   └── tarifa.css
        ├── tarifa.php
        └── visualizarMensaje.php
```

## Índice de Archivos

### API

- [ClaseGrupal.php](api/ClaseGrupal.php)
- [bajaUsuario.php](api/bajaUsuario.php)
- [connexio.php](api/connexio.php)
- [gestioUsuaris.php](api/gestioUsuaris.php)
- [guardar_mensaje.php](api/guardar_mensaje.php)
- [logOut.php](api/logOut.php)
- [login.proc.php](api/login.proc.php)
- [procesarPago.php](api/procesarPago.php)
- [signUp.proc.php](api/signUp.proc.php)
- [verResultadosTorneo.php](api/verResultadosTorneo.php)

### Docs

- [altaUsuario.php](docs/altaUsuario.php)
- [añadirResultado.php](docs/añadirResultado.php)
- [bajaUsuario.php](docs/bajaUsuario.php)
- [confirmacionPago.php](docs/confirmacionPago.php)
- [confirmacionReserva.php](docs/confirmacionReserva.php)
- [eliminarComentario.php](docs/eliminarComentario.php)
- [entrenadores.php](docs/entrenadores.php)
- [entrenoGrupal.php](docs/entrenoGrupal.php)
- [formularioConfirmacion.php](docs/formularioConfirmacion.php)
- [formularioReserva.php](docs/formularioReserva.php)
- [formulario_contacto.php](docs/formulario_contacto.php)
- [gestionUsuaris.php](docs/gestionUsuaris.php)
- [horarios.php](docs/horarios.php)
- [index.php](docs/index.php)
- [iniciarSesion.php](docs/iniciarSesion.php)
- [modificarResultado.php](docs/modificarResultado.php)
- [modificarUsuario.php](docs/modificarUsuario.php)
- [noticias.php](docs/noticias.php)
- [nutricional.php](docs/nutricional.php)
- [registro.php](docs/registro.php)
- [resultadosTorneo.php](docs/resultadosTorneo.php)
- [sobreNosotros.php](docs/sobreNosotros.php)
- [tarifa.php](docs/tarifa.php)
- [visualizarMensaje.php](docs/visualizarMensaje.php)

### Includes

- [footer.php](docs/includes/footer.php)
- [nav.php](docs/includes/nav.php)

### JS

- [scripts.js](docs/js/scripts.js)

### Styles

- [altaUsuario.css](docs/styles/altaUsuario.css)
- [comun.css](docs/styles/comun.css)
- [confirmacionPago.css](docs/styles/confirmacionPago.css)
- [contacto.css](docs/styles/contacto.css)
- [eliminarComentario.css](docs/styles/eliminarComentario.css)
- [entrenadores.css](docs/styles/entrenadores.css)
- [entrenoPrivado.css](docs/styles/entrenoPrivado.css)
- [gestionUsuaris.css](docs/styles/gestionUsuaris.css)
- [horarios.css](docs/styles/horarios.css)
- [index.css](docs/styles/index.css)
- [iniciarSesion.css](docs/styles/iniciarSesion.css)
- [modificarUsuario.css](docs/styles/modificarUsuario.css)
- [noticia.css](docs/styles/noticia.css)
- [registro.css](docs/styles/registro.css)
- [resultados.css](docs/styles/resultados.css)
- [sobreNosotros.css](docs/styles/sobreNosotros.css)
- [tarifa.css](docs/styles/tarifa.css)

### Otros Archivos

- [COMPROMISOS EQUIPS.docx](COMPROMISOS%20EQUIPS.docx)
- [.vscode/settings.json](.vscode/settings.json)

## UML de Casos de Uso

A continuación el diagrama de casos de uso del proyecto, donde podemos ver como los distintos actores actuan.

<div align="center">
<img alt="UML de Casos de Uso" src= "https://github.com/BipperTT/club_boxeo/assets/153605976/c542f89c-56fd-476d-8aba-516d646d5404"

>
</div>

## Diagrama de Arquitectura

Podemos apreciar el diagrama de arquitectura que representa visualmente la estructura de nuestro sitio web.

<div align="center">
<img alt="Diagrama de Arquitectura" src= "https://github.com/BipperTT/club_boxeo/assets/153605976/11a37000-b221-49f1-a8b1-a2d1d5f12e1b"

>
</div>

## Modelo Entidad Relación (antiguo)

El modelo entidad relación o ER nos ayudará a entender la estructura de la base de datos.

<div align="center">
<img alt="Modelo Entidad Relación (antiguo)" src= "https://github.com/BipperTT/club_boxeo/assets/153605976/17626e05-ef07-438b-adc4-ca4257fbaf69"

>
</div>

> [!CAUTION]
> Esta versión del modelo Entidad Relación está **desactualizada** por motivos de optimización del proyecto, es probable que no sea fiel al producto final.

## Diagrama de Clases (antiguo)

Gracias al diagrama de clases podemos entender mejor las clases y sus interacciones

<div align="center">
<img alt="Modelo de Clases (antiguo)" src= "https://github.com/BipperTT/club_boxeo/assets/153605976/95e9272d-8df8-4ce3-9579-f57ef95337e4"

>
</div>

> [!CAUTION]
> Esta versión del Diagrama de Clases está **desactualizada** por motivos de optimización del proyecto, es probable que no sea fiel al producto final.





## Agradecimientos

Muchas gracias por investigar sobre esta aplicación, si tienes alguna sugerencia se escuchará atentamente.
