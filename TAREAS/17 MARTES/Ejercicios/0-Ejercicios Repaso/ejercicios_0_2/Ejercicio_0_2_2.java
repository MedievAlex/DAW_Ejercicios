package ejercicios_0_2;

import java.util.*;

import ejercicios_0_1.Ejercicio_0_1_2;

import java.lang.*;
import java.io.*;

/* 
2.2- Al hilo de la práctica anterior de los meses, crea una clase Calendario, que automatice crear una 
    lista de Calendarios. Cada Calendario tiene un nombre (el del mes) y una lista de números, los días del mes.
*/

public class Ejercicio_0_2_2 {
  public static void calendario() {
    Ejercicio_0_1_2 ejercicio_0_1_2 = new Ejercicio_0_1_2();
    Calendario calendario = new Calendario();
    int mes = 0;

    mes = ejercicio_0_1_2.preguntar_mes();
    calendario.identificar(mes);

    calendario.mostrar();

  }
}