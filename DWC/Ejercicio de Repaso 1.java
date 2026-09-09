import java.util.*;

public class Main {
  

  // Main
    public static void main(String[] args) { 
      int cantMes = 12;
  ArrayList<String> meses;
      
      meses = ini_mes();
      e1_alertas(meses);
    }

    public static ArrayList<String> ini_mes (){
      ArrayList<String> meses = new ArrayList<String>();

      meses.add("Enero");
      meses.add("Febrero");
      meses.add("Marzo");
      meses.add("Abrir");
      meses.add("Mayo");
      meses.add("Junio");
      meses.add("Julio");
      meses.add("Agosto");
      meses.add("Septiembre");
      meses.add("Octubre");
      meses.add("Noviembre");
      meses.add("Diciembre");

      return meses;
    }

  // Ejercicio 1 alerta por cada mes (Mostrarlos)
    public static void e1_alertas (ArrayList<String> meses){
        int mes = 0;

        System.out.print(meses.get(2));
      // Contador
      // Array
        
    }
}
