
import React, { useState } from 'react';

const Facturation = () => {
  // Estado inicial de la factura
  const [factura, setFactura] = useState({
    codigo: '',
    nombre: '',
    duiNit: '',
    telefono: '',
    correo: '',
    direccion: '',
    precio: 0,
    cantidad: 0,
    subtotal: 0,
    total: 0,
    productos: [],
  });

  // Función para actualizar el estado de la factura
  const handleChange = (event) => {
    const { name, value } = event.target;
    setFactura((prevFactura) => ({
      ...prevFactura,
      [name]: value,
    }));
  };

  // Función para calcular el subtotal y el total de la factura
  const calcularTotal = () => {
    const subtotal = factura.cantidad * factura.precio;
    const total = subtotal * 1.13; // Impuesto del 13%
    setFactura((prevFactura) => ({
      ...prevFactura,
      subtotal,
      total,
    }));
  };

  // Función para agregar un nuevo producto a la factura
  const agregarProducto = () => {
    const producto = {
      codigo: factura.codigo,
      nombre: factura.nombre,
      duiNit: factura.duiNit,
      telefono: factura.telefono,
      correo: factura.correo,
      direccion: factura.direccion,
      precio: factura.precio,
      cantidad: factura.cantidad,
    };
    setFactura((prevFactura) => ({
      ...prevFactura,
      productos: [...prevFactura.productos, producto],
    }));
  };

  return (
    <div>
      <h1>Facturación</h1>
      <label htmlFor="codigo">Código de referencia:</label>
      <input type="text" name="codigo" value={factura.codigo} onChange={handleChange} />

      <label htmlFor="nombre">Nombre del cliente:</label>
      <input type="text" name="nombre" value={factura.nombre} onChange={handleChange} />

      <label htmlFor="duiNit">DUI o NIT:</label>
      <input type="text" name="duiNit" value={factura.duiNit} onChange={handleChange} />

      <label htmlFor="telefono">Teléfono:</label>
      <input type="text" name="telefono" value={factura.telefono} onChange={handleChange} />

      <label htmlFor="correo">Correo de contacto:</label>
      <input type="text" name="correo" value={factura.correo} onChange={handleChange} />

      <label htmlFor="direccion">Dirección:</label>
      <input type="text" name="direccion" value={factura.direccion} onChange={handleChange} />

      <label htmlFor="precio">Precio especial por producto:</label>
      <input type="number" name="precio" value={factura.precio} onChange={handleChange} />

      <label htmlFor="cantidad">Cantidad de producto:</label>
      <input type="number" name="cantidad" value={factura.cantidad} onChange={handleChange} />

      <label htmlFor="producto">Tipo de producto:</label>
      <select name="producto" onChange={handleChange}>
        <option value="producto1">Producto 1</option>
        <option value="producto2">Producto 2</option>
        <option value="producto3">Producto 3</option>
      </select>

      <button onClick={calcularTotal}>Calcular total</button>

      <label htmlFor="subtotal">Subtotal:</label>
      <input type="number" name="subtotal" value={factura.subtotal} readOnly />

      <label htmlFor="total">Total:</label>
      <input type="number" name="total" value={factura.total} readOnly />

      <button onClick={agregarProducto}>Agregar producto</button>

      <h2>Productos</h2>
    <div>
        <ul>
        {factura.productos.map((producto) => (
            <li key={producto.codigo}>
                {producto.nombre} - {producto.cantidad} x ${producto.precio} = ${producto.cantidad * producto.precio}
            </li>
        ))}
    </ul>
    </div>
    </div>
  );
};

export default Facturation;
