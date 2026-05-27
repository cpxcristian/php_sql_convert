# MySQL Converter

## Screenshots
![](./docs/screenshot-1.png)

Esta herramienta toma un archivo con contenido SQL y lo optimiza para que sea más rápido de ejecutar:
- Convierte todos los insert individuales a multi-insert.
- Divide los insert en bloques según el usuario ingrese para que no tenga problemas en la ejecución.

## Ejecución

```bash
php -S localhost:8000
```