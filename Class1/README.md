## Objetivo

Entender la diferencia entre TDD, realización de pruebas unitarias y PHPUnit.

## Contenido 
 

Muchas veces como desarrolladores nos enfocamos en mejorar nuestras habilidades para ser más efectivos, buscando escribir código más rápidamente, utilizando herramientas que nos permitan crear más código rápidamente para poder cumplir plazos o poder lograr esa aplicación que teníamos en nuestra mente. En lo que no nos enfocamos es en como lo hacemos, nuestra manera natural de programar muchas veces viene dictada por un enfoque algorítmico estructurado, pero ¿ que es esto ? Imagina por un segundo como he ido escribiendo este propio documento que ahora mismo tu lees, primero he creado el fichero con un fin en mente, el de expresar las ideas de una primera lección de un curso de phpunit, luego para comenzar a redactarhe sentado las bases de mi fichero, esto es las secciones ( Divide y vencerás ) he escrito Objetivo, Contenido y Ejercicios segmentando así el trabajo que quiero realizar, luego he redactado un objetivo claro que me permita enfocarme en el contenido, lugar donde explicaré definiciones y relaciones así hasta llegar completar dicha sección, en pocas palabras, he ido haciendo una cosa a la vez encapsuladamente en vez de tratarlo como un conjunto siguiento una aproximación algorítmica de seguimiento de pasos, como si estuviese programando de manera estructuradad, sin la presencia de objetos, tomemos un mejor ejemplo, el ejemplo que en las mayorías de las universidades y cursos de programación utilizan para enseñar a programar, el ejemplo del algoritmo para cambiar una llanta, si no conoces este ejercicio detén en esta línea e intentar llevarlo a cabo antes de ver el que propong a continuación y trata de crear el tuyo , esto es, una serie de pasos que seguirías para cambiar la llante pinchada de tu coche: 

1. Detengo el coche 
2. Verifico que en el maletero tengo un "gato" , la llave de cruz y una llanta en condiciones para cambiar. 
3. Entro en el coche
4. Activo el freno de mano.
5. Salgo del Coche.
6. Aflojo las tuercas de llanta mala.
7. Coloco el gato en posicion
8. Elevo el coche con el gato.
9. Saco las turecas de la llanta
10. Saco la llanta 
11. Subo la llanta nueva 
12. Coloco las tuercas
13. Giro las tuercas hasta que la llanta se vea correctamente calzada
14. Bajo el coche al suelo con el gato
15. Aprieto las tuercas de la llanta en diagonal un poco cada una a la vez 
16. Recojo la llanta, el gato y la llave de cruz en el maletero. 
17. doy por finalizada la operación. 

Seguro que si comparas este algoritmo con el que has pensado o el que conocías verás muchas similitudes y diferencias, en algunos casos hasta te preguntarás porque un determinado paso existe o descubrirás el riesgo en el que te has puesto más de una vez al cambiar la llanta a tu manera en la vida real, si lo analizamos un poco más veremos como en algunos pasos
hacemos más de una cosa a la vez, como en el paso uno por ejemplo y como este algoritmo puede incluso ser mejorado y alterado en el orden de los pasos para ahorrar más tiempo de 
ejecución, ahora bien, si intentamos comparar este ejercicio seguro que veremos muchas similitudes con lo manera en la que programamos logrando pequeños objetivos cada vez pero siguiendo una historia sin detenernos a ver su congruencia, yendo incluso un poco más allá, no pensamos las posibilidades antes de hacer sino que dividimos en secciones organizamos y llevamos a cabo, una vez que una sección en nuestra mente es creada es de alguna manera plasmada asegurando así su existencia sin siquiera preguntarnos ¿ como puedo verificar que esto siempre se cumple o existe ?.
 
Esta es la diferencia entre una programación estructurada u oop basada en algoritmos secuenciales y la programación ( TDD ), en Test Driven Development, tu desarrollo está guiado
por pruebas, antes de crear una solución de un paso en concreto, has de crear una prueba que, de pasarla confirmaría que dicho paso ha sido solucionado con el funcionamiento esperado, pero aun más, te permita volver a ejecutar dicha prueba cuando la solución este compartiendo con otros entes o funcionando en otros escenarios complicando su ecosistema. Volvamos por un segundo al algoritmo de la llanta y veamos como desde el paso 2 ya nuestro programa o algoritmo falla, hemos verificado que tenemos un gato, una llave de cruz y una llanta en condiciones pero nunca la hemos sacado del maletero, ahora pensemos, cuantas veces cuando programamos en nuestro día a día hemos pensado y programado en secuencial olvidando cosasa nuestro paso ?   

Si queremos realizar pruebas unitarias sobre un código ya escrito lo podemos llevar a cabo pero no dejará de ser eso, una prueba unitaria,  podríamos coger un metodo de nuestro programa denominado pullOutTire (Sacar llanta) y crear una prueba unitaria sobre el mismo que verifique que el coche ahora tiene una llanta menos, si por el contrario quisieramos hacer TDD, este método no tendría que existir, tal vez ni siquiera su clase y tendriamos una prueba que verifique que existe y es accesible, esta prueba fallaría ( Estado rojo ), creariamos el código necesario y volveríamos a ejecutar nuestro test, esta vez nuestra prueba pasaría ( Estado Verde )  pero estaríamos validando solo su existencia todavía nos falta validar que este método actua sobre un coche , para ello crearíamos una prueba nueva en la que nos aseguraramos que el método pullOutTire puede recibir un coche como argumento, una vez más nuestra prueba fallaría y tendríamos que crear el código necesario para asegurarnos que estamos recibiendo un coche al cual sacarle la llanta, una vez creado el código estaríamos en ( Estado verde ) en el cual podemos hacer dos cosas, seguir generando pruebas o mejorando nuestra prueba verde Actual hasta llevarla a Azul, en el estado azul podemos refactorizar nuestro código, asegurarnos que la convención de nombres y checkstyle se cumple o incluso refactorizamos para simplificar nuestra solución.

## Ejercicios 

Cree el método pullOutTire de la clase Repairment que actúa sobre argumentos de tipo Car ( Coche )usando TDD. Las clases Repairment y Car deberán ser parte de la clase 1, recuerde que, crear con TDD significa crear primero las pruebas necesarias para luego crear el código mínimo necesario.

## Por donde empezar 

Para preparar su entorno para trabajar debe posicionarse en el folder base de este proyecto y ejecutar:
    $ composer install

Una vez instaladas las dependencias, he dejado un test de prueba para que pueda ejecutar PHPUnit por primera vez y verificar como se crea un test con este software, para ejecutarlo:

    $ phpunit --bootstrap=vendor/autoload.php Tests/* --colors 

donde --bootstrap lo que permite es que phpunit pueda aprovecharse del autoloader que composer genera con lo cual te olvidas de tener que hacer un include más, a partir de este momento trabajaremos con Namespaces e iremos agregando reglas de autoloading en nuestro fichero composer.json a medida que vayamos desarrollando el curso, revise ahora mismo el fichero composer.json para entender lo que hace el autoloader.

  



