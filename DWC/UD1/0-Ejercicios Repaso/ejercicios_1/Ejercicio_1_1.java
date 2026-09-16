package ejercicios_1;

import java.util.*;
import java.lang.*;
import java.io.*;

import java.util.ArrayList;

/* 
1.1- Con un for hacer que salgan alertas con cada mes.
*/

public class Ejercicio_1_1 {

  public static void alertas_mes() {
    ArrayList<String> meses = cargar_meses();

    for (int i = 0; i < meses.size(); i++) {
      System.out.println(meses.get(i));
    }
  }

  public static ArrayList<String> cargar_meses() {
    ArrayList<String> meses = new ArrayList<String>();

    meses.add(0, "Enero");
    meses.add(1, "Febrero");
    meses.add(2, "Marzo");
    meses.add(3, "Abril");
    meses.add(4, "Mayo");
    meses.add(5, "Junio");
    meses.add(6, "Julio");
    meses.add(7, "Agosto");
    meses.add(8, "Septiembre");
    meses.add(9, "Octubre");
    meses.add(10, "Noviembre");
    meses.add(11, "Diciembre");

    return meses;
  }
}