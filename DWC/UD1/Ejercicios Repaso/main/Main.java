package main;

import java.util.*;
import java.lang.*;
import java.io.*;

import ejercicios_1.*;
import ejercicios_2.*;

public class Main {
  public static void main(String[] args) {
    Ejercicio_1_1 ejercicio_1_1 = new Ejercicio_1_1();
    Ejercicio_1_2 ejercicio_1_2 = new Ejercicio_1_2();
    Ejercicio_2_1 ejercicio_2_1 = new Ejercicio_2_1();
    Ejercicio_2_2 ejercicio_2_2 = new Ejercicio_2_2();

    System.out.println("---------------------------------");

    System.out.println("[Ejercicio 1.1]");
    // 1.1- Con un for hacer que salgan alertas con cada mes.
    ejercicio_1_1.alertas_mes();

    System.out.println("---------------------------------");

    System.out.println("[Ejercicio 1.2]");
    // 1.2- Tiene que preguntar en un mensaje que escribas un número, después tiene
    // que mostrar el mes que le
    // corresponde a ese numero, en caso de que no exista un mes, porque el número
    // es otro, tiene que mandar
    // un mensaje diciendo que no existe.
    ejercicio_1_2.obtener_mes();

    System.out.println("---------------------------------");

    System.out.println("[Ejercicio 2.1]");
    // 2.1- Tienes que hacer un programa que reconozca si un numero es primo o no.
    ejercicio_2_1.primo_o_no();

    System.out.println("---------------------------------");

    System.out.println("[Ejercicio 2.2]");
    // 2.2- Al hilo de la práctica anterior de los meses, crea una clase Calendario,
    // que automatice crear una
    // lista de Calendarios. Cada Calendario tiene un nombre (el del mes) y una
    // lista de números, los días del mes.
    ejercicio_2_2.calendario();

    System.out.println("---------------------------------");
  }
}