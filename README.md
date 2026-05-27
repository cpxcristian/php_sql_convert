# DUMP converter

Esta herramienta toma un archivo con contenido SQL y lo optimiza para que sea mas rapido de ejecutar:
- Cambia todos los insert individuales a multi-insert.
- Divide los insert en bloques según el usuario ingrese para que no tenga problemas en la ejecución.

## Cómo utilizar

```bash
php -S localhost:8000
```