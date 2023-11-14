# TPE-WEB-API

##

## Listado ordenado

### Listado ordenado de productos

- Endpoint -> `GET /api/productos?order=<>&&sort=<>`

En este endpoint se listan todos los productos que se encuentran en la base de datos. Luego de **"order="** se declara el atributo por el cual se va a ordenar la lista, acepta cualquier atributo del producto. Se le puede agregar el parametro **"sort="** para estableer si el listado sera en orden ascendente(ASC) o descendente(DESC).

#### Ejemplo

**_/api/productos?order=id&sort=DESC_**

Con estos valores la lista estara ordenada por el id de los productos de manera que el producto con el id mas alto se mostrara primero y luego ira descendiendo.
Cada producto se mostrara de la siguiente manera:

```json
{
  "id": 1,
  "nombre": "Detergente Magistral",
  "descripcion": "Detengente Magistral rinde X5 pure active",
  "precio": 799,
  "imagen": "css/img/magistral.jpg",
  "id_categoria": "1"
}
```

##

## Obtener un elemento por ID

### Obtener un producto por ID

- Endpoint -> GET /api/productos/:ID

En este endpoint se obtiene un producto determinado requiriendolo por su **id**. Si el id ingresado es inexistente se devuelve un String y un error 404;

#### Ejemplo

**_/api/productos/1_**

En este caso se retorna el producto con **id=1** en formato JSON de la siguiente manera:

```json
{
  "id": 1,
  "nombre": "Detergente Magistral",
  "descripcion": "Detengente Magistral rinde X5 pure active",
  "precio": 799,
  "imagen": "css/img/magistral.jpg",
  "id_categoria": "1"
}
```

##

## PUT

### Modificar un producto

- Endpoint -> PUT /api/productos/:ID

Este endpoint es utilizado para para actualizar o modificar los datos de un producto en particular. El producto deseado se indica con el **ID**. En el body de Postman o la aplicacion que se use para probar, se cargan los valores nuevos de dicho producto. Se deben cargar todos los datos nuevamente aun que solo se desee cambiar un solo atributo.

#### Ejemplo

**_/api/productos/1_**

Si se quisiera cambiar el precio de un producto por ejemplo, se deberian cargar, en el body, todos datos originales solo cambiandole el precio.

```json
{
  "id": 1,
  "nombre": "Detergente Magistral",
  "descripcion": "Detengente Magistral rinde X5 pure active",
  "precio": 1299, //precio modificado
  "imagen": "css/img/magistral.jpg",
  "id_categoria": "1"
}
```

Luego se envia la request. Si el producto se pudo actualizar correctamente se mostrara un 200 y un String confirmandolo.

##

## POST

### Agregar un producto

- Endpoint -> POST /api/productos

Este endpoint se utiliza para agregar un nuevo produto a la base de datos. Se debe escribir en el **body** todos los valores para los atributos del nuevo producto. Siempre en formato JSON

#### Ejemplo

**_/api/productos_**
En el body se escriben los valores del nuevo producto de la siguiente manera:

```json
{
  "id": 12,
  "nombre": "Trapo rejilla",
  "descripcion": "Trapo rejilla multiusos de cocina",
  "precio": 660,
  "imagen": "css/img/rejila.jpg",
  "id_categoria": "3"
}
```
En el caso que el producto se haya agregado correctamente se devuelve un String.

##

## DELETE

### Eliminar un producto

- Endpoint -> DELETE /api/productos/:ID

Este endpoint se utiliza para borrar productos de la base de datos. Se indica el producto con el **ID**.

#### Ejemplo

/api/productos/12

Se elimina el producto con **id=12**. El producto eliminado seria:

```json
{
  "id": 12,
  "nombre": "Trapo rejilla",
  "descripcion": "Trapo rejilla multiusos de cocina",
  "precio": 660,
  "imagen": "css/img/rejila.jpg",
  "id_categoria": "3"
}
```
La proxima vez que se obtenga la lista dicho producto no aparecera.




