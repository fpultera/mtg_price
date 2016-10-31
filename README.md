# MTG Price

Sacamos precios de cartas sobre seller como Magic Lair o Magic4ever para realizar comparaciones.

La aplicaciones usa dos scripts en bash que corren por un id de carta, estos (dependiendo el seller) parcean desde la web los datos y lo pasan a un .json que luego es enviado a un elasticsearch, el cual realiza la indexacion de datos.

La web esta echa en html (muy basico) con un modulo de composer que es elasticsearch-php.
