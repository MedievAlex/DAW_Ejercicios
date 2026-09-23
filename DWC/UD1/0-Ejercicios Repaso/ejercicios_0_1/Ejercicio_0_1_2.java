package ejercicios_0_1;

import java.util.*;
import java.lang.*;
import java.io.*;

import ejercicios_0_1.*;

/* 
1.2- Tiene que preguntar en un mensaje que escribas un número, después tiene que mostrar el mes que le 
    corresponde a ese numero, en caso de que no exista un mes, porque el número es otro, tiene que mandar 
    un mensaje diciendo que no existe.
*/

public class Ejercicio_0_1_2 {

  public static void obtener_mes() {
    Ejercicio_0_1_1 ejercicio_0_1_1 = new Ejercicio_0_1_1();
    ArrayList<String> meses = ejercicio_0_1_1.cargar_meses();
    int mes;

    mes = preguntar_mes();

    mostrar_mes(meses, mes);
  }

  public static int preguntar_mes() {
    Scanner scanner = new Scanner(System.in);
    int num = 0;

    System.out.print("Introduzca un Numero: ");
    num = scanner.nextInt();

    scanner.close();
    
    return num;
  }

  public static void mostrar_mes(ArrayList<String> meses, int num) {
    int mes = num - 1;

    if (num > meses.size()) {
      System.out.println("[ERROR] El mes no existe.");
    } else {
      System.out.println(meses.get(mes));
    }
  }

}