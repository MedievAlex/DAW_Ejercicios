package ejercicios_2;

import java.util.*;
import java.lang.*;
import java.io.*;

/* 
2.2- Al hilo de la práctica anterior de los meses, crea una clase Calendario, que automatice crear una 
    lista de Calendarios. Cada Calendario tiene un nombre (el del mes) y una lista de números, los días del mes.
*/

public class Ejercicio_2_2 {
  public static void calendario() {
    Ejercicio_1_2 ejercicio_1_2 = new Ejercicio_1_2();
    Calendario calendario = new Calendario();
    int mes = 0;

    mes = ejercicio_1_2.preguntar_mes();
    calendario.identificar(mes);

    calendario.mostrar();
      
  }
}