package ejercicios_2;

import java.util.*;
import java.lang.*;
import java.io.*;

import java.util.ArrayList;

/* 
2.1- Tienes que hacer un programa que reconozca si un numero es primo o no.
*/

public class Ejercicio_2_1 {
  public static void primo_o_no() {
    int numero = pedir_numero();
    int contador = 2;
    boolean primo = true;

    while (primo && (contador != numero)) {
      if (numero % contador == 0) {
        primo = false;
      }
      contador++;
    }

    if (primo) {
      System.out.println("Es un numero primo.");
    } else {
      System.out.println("No es un numero primo.");
    }
  }

  public static int pedir_numero() {
    Scanner scanner = new Scanner(System.in);
    int num = 0;

    System.out.print("Introduzca un Numero: ");
    num = scanner.nextInt();

    return num;
  }
}