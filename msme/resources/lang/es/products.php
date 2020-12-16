<?php
return array (
  'seo' =>
  array (
    'index' => 'Tablero - Producto - :site_name',
    'create' => 'Panel de control - Crear producto - :site_name',
    'edit' => 'Panel de control - Editar producto - :site_name',
    'edit-setting' => 'Panel de control - Configuración del producto - :site_name',
  ),
  'alert' =>
  array (
    'product-created' => 'Producto creado con éxito',
    'product-updated' => 'Producto actualizado con éxito',
    'product-deleted' => 'Producto eliminado correctamente',
    'product-attribute-added' => 'Atributo de producto agregado correctamente',
    'product-feature-ranked-up' => 'Característica del producto clasificada correctamente',
    'product-feature-ranked-down' => 'Característica del producto clasificada con éxito',
    'product-feature-deleted' => 'Característica del producto eliminada correctamente',
    'product-approved' => 'Producto ahora en estado aprobado',
    'product-disapproved' => 'Producto ahora en estado pendiente de aprobación',
    'product-suspended' => 'Producto ahora en estado suspendido',
    'product-setting-updated' => 'La configuración del producto se actualizó correctamente',
    'this-is-your-product' => 'Este es uno de sus productos.',
    'this-is-your-item' => 'Este es uno de sus listados.',
    'product-in-use' => 'Este producto se ha asignado a uno o más listados, anule su asignación del listado antes de eliminarlo.',
  ),
  'error' =>
  array (
    'user-not-exist' => 'No existe ese usuario',
    'product-attribute-not-exist' => 'El atributo del producto no existe',
    'attribute-owner-not-match-product' => 'El propietario del atributo con el propietario del producto no coincide',
    'feature-not-match-product' => 'El producto y la característica del producto no coinciden',
  ),
  'index' => 'Gestionar productos',
  'index-desc' => 'Esta página muestra todos los productos de usted y del resto de los usuarios del sitio web. Puede crear un nuevo producto, así como editar o eliminar cada producto.',
  'index-user-desc' => 'Esta página muestra todos sus productos. Puede crear un nuevo producto, así como editar o eliminar cada producto.',
  'add-product' => 'Nuevo producto',
  'show-all-users' => 'Mostrar todos los usuarios',
  'myself' => 'Yo mismo (administrador)',
  'show-all-status' => 'Mostrar todo el estado',
  'status-pending' => 'Aprobación pendiente',
  'status-approved' => 'Aprobado',
  'status-suspend' => 'Suspendido',
  'product-image' => 'Imagen',
  'product-name' => 'Nombre',
  'product-description' => 'Descripción',
  'product-price' => 'Precio',
  'product-status' => 'Estado',
  'product-owner' => 'Propietario',
  'product-status-pending' => 'Aprobación pendiente',
  'product-status-approved' => 'Aprobado',
  'product-status-suspend' => 'Suspendido',
  'create' => 'Crear nuevo producto',
  'create-desc' => 'Esta página le permite crear un nuevo producto para usted o cualquiera de los usuarios de su sitio web.',
  'form-product-image' => 'Imagen destacada',
  'form-product-image-help' => 'sugerencia de proporción mínima: 455px * 390px, y tamaño máximo de archivo: 5mb',
  'form-product-image-select-image' => 'Seleccionar imagen',
  'form-product-name' => 'nombre del producto',
  'form-product-description' => 'Descripción del producto',
  'form-product-price' => 'Precio del producto',
  'form-product-price-help' => 'en formato xx, xx.x o xx.xx, el precio no se mostrará si lo deja vacío',
  'form-product-status' => 'Estado del producto',
  'form-product-owner' => 'Dueño del producto',
  'form-product-owner-help' => 'El propietario del producto no puede cambiar después de la creación.',
  'form-product-gallery-images' => 'Galería de imágenes',
  'form-product-gallery-images-help' => 'tamaño máximo de archivo: 5 MB por imagen, máximo :gallery_photos_count imágenes, si se seleccionan más de :gallery_photos_count imágenes, se guardarán las primeras :gallery_photos_count imágenes.',
  'form-product-gallery-images-select-images' => 'Seleccionar imágenes',
  'crop-feature-image' => 'Recortar imagen de función',
  'choose-image' => 'Elegir imagen',
  'crop-image' => 'Delimitar imagen',
  'edit' => 'Editar producto',
  'edit-desc' => 'Esta página le permite editar el producto',
  'edit-item-owner-alert' => 'Está editando la lista para el usuario del sitio web (:user_name - :user_email). Todos los cambios se reflejarán en la cuenta de usuario del sitio web; edítelos con precaución.',
  'edit-owner-alert' => 'Está editando el producto para el usuario del sitio web (:user_name - :user_email). Todos los cambios se reflejarán en la cuenta de usuario del sitio web; edítelos con precaución.',
  'edit-owner-alert-view-profile' => 'Ver perfil de usuario',
  'product' => 'Producto',
  'delete-product' => 'Eliminar producto',
  'add-attributes' => 'Atributos',
  'modal-add-attribute-title' => 'Agregar atributos de producto',
  'modal-add-attribute-button' => 'Agregar atributos',
  'no-attributes' => 'No existen atributos para el propietario actual de este producto.',
  'no-attributes-user' => 'Aún no ha creado ningún atributo. Vaya a Producto&gt; Atributo&gt; Nuevo atributo para crear uno.',
  'rank-up' => 'Subir de rango',
  'rank-down' => 'Rango abajo',
  'remove' => 'Eliminar',
  'setting' => 'Configuración del producto',
  'setting-desc' => 'Esta página le permite editar las configuraciones de la función del producto',
  'max-gallery-photos' => 'Máximo Galería Fotos',
  'max-gallery-photos-help' => 'el total de fotos de la galería que se pueden cargar (mínimo: 1 máximo: 20)',
  'auto-approval' => 'Aprobar automáticamente',
  'auto-approval-help' => 'Aprobar automáticamente el envío de productos para los usuarios',
  'currency-symbol' => 'Símbolo de moneda',
  'currency-symbol-help' => 'se muestra antes del valor del precio',
  'enabled' => 'Habilitado',
  'disabled' => 'Discapacitado',
  'sidebar' =>
  array (
    'setting' => 'Ajuste',
  ),
  'product-feature' => 'Característica de producto',
  'edit-product-link' => 'Editar producto',
  'edit-item-link' => 'Editar lista',
);