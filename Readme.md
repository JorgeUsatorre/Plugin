# Plugin JorgeUsatorre Words

## Descripcion
El Plugin JorgeUsatorre Words es un complemento para WordPress desarrollado como parte de una prueba para el curso de desarrollo de plugins de WordPress. 
Este plugin tiene como objetivo demostrar una funcionalidad simple de reemplazo de palabras en las publicaciones y páginas de WordPress.

## Características
Reemplazo de Palabras Ofensivas: Sustituye palabras ofensivas en el contenido de las publicaciones por alternativas más neutrales.
Configuración Personalizada: Permite personalizar la lista de palabras ofensivas y sus respectivos reemplazos.

## Creación de Tabla en la Base de Datos
El plugin crea automáticamente una tabla en la base de datos llamada wordpresswords. Esta tabla contiene columnas para el ID, la palabra ofensiva (insulto), y su equivalente más sutil (sutiles).

## Inserción y Actualización de Datos
El plugin inserta o actualiza automáticamente datos en la tabla wordpresswords. Se proporciona un conjunto inicial de datos que incluye palabras ofensivas y sus sustitutos más sutiles.

## Reemplazo de Palabras Ofensivas
Cada vez que se carga contenido (post o página), el plugin busca palabras ofensivas en la tabla wordpresswords y las reemplaza por sus equivalentes sutiles.

## Instancias de Uso
El plugin se activa mediante el gancho plugins_loaded, lo que garantiza que las funciones necesarias se ejecuten cuando se inicia WordPress. Además, utiliza el filtro the_content para realizar el reemplazo de palabras ofensivas.

## Configuración
Puedes personalizar la lista de palabras ofensivas y sus reemplazos accediendo al código del plugin. Busca las variables $palabrasmalas y $palabrasbuenas en el archivo jorgeusatorre-words.php y realiza los ajustes necesarios.